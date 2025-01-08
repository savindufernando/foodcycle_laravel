<?php

namespace App\Http\Controllers;

use App\Models\Request as ServiceRequest;
use Illuminate\Http\Request;
use App\Mail\RequestAcceptedMail;
use Illuminate\Support\Facades\Mail;
use App\Mail\ConsultationRequestMail;

class RequestController extends Controller
{
    public function index()
    {
        return view('services.index');
    }

    public function store(Request $request)
    {
        \Log::info('Incoming Request Data: ', $request->all());

        // Validate the request
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'social_media_bio' => 'nullable|string',
            'phone_number' => 'required|string|max:20',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'country' => 'required|string|max:100',
            'company_name' => 'required|string|max:255',
            'company_website' => 'nullable|url',
            'company_description' => 'required|string|max:1000',
            'heard_about_us' => 'nullable|string|max:255',
            'services_of_interest' => 'required|array',
            'project_location' => 'required|string|max:255',
            'project_start_date' => 'required|date',
            'project_description' => 'required|string|max:2000',
            'uploaded_file' => 'nullable|file|mimes:pdf,doc,docx,jpg,png|max:2048',
        ]);

        \Log::info('Validated Data: ', $validated);

        $path = $request->file('uploaded_file') 
            ? $request->file('uploaded_file')->store('uploads', 'public') 
            : null;

        try {
            ServiceRequest::create(array_merge($validated, [
                'services_of_interest' => json_encode($request->services_of_interest),
                'uploaded_file_path' => $path,
            ]));

            // Send email notification
            Mail::to($validated['email'])->send(new ConsultationRequestMail($validated));

            \Log::info('Request saved and email sent successfully.');
            return back()->with('success', 'Request submitted successfully. A confirmation email has been sent.');
        } catch (\Exception $e) {
            \Log::error('Error while saving request: ' . $e->getMessage());
            return back()->with('error', 'Failed to submit request. Please try again.');
        }
    }



    // Show all requests to the consultant
    // public function showAll()
    // {
    //     $requests = ServiceRequest::all(); // Fetch all requests
    //     return view('consultant.requests', compact('requests')); // Pass requests to the view
    // }

    public function showAll()
    {
        // Get the logged-in consultant's ID
        $consultantId = auth()->id();

        // Get pending requests that match the consultant's skills
        $consultant = auth()->user();
        $consultantSkills = json_decode($consultant->skills, true);

        // Filter pending requests (if needed, for other purposes)
        $pendingRequests = ServiceRequest::where('status', 'pending')
            ->get()
            ->filter(function ($request) use ($consultantSkills) {
                $requestedSkills = json_decode($request->services_of_interest, true);
                return !empty(array_intersect($requestedSkills, $consultantSkills));
            });

        // Get accepted requests assigned to the logged-in consultant
        $acceptedRequests = ServiceRequest::where('consultant_id', $consultantId)
            ->where('status', 'accepted')
            ->get();

        return view('consultant.requests', compact('pendingRequests', 'acceptedRequests'));
    }



    public function fetchAllRequests()
    {
        // Fetch all requests from the 'requests' table
        $requests = ServiceRequest::all();

        // Return requests to a view or as JSON
        return view('consultant.requests', compact('requests'));
    }

    public function accept($id)
    {
        // Find the request by ID or throw a 404 if not found
        $request = ServiceRequest::findOrFail($id);

        // Check if the request has already been accepted by another consultant
        if ($request->status === 'accepted') {
            return back()->with('error', 'This request has already been accepted by another consultant.');
        }

        // Update the request with the current consultant's ID and set the status to 'accepted'
        $request->update([
            'status' => 'accepted',
            'consultant_id' => auth()->id(), // Assuming the logged-in user is the consultant
        ]);

        // Get the logged-in consultant's details
        $consultant = auth()->user();

        // Prepare request details for the email
        $requestDetails = $request->only(['first_name', 'last_name', 'email']);

        // Send the email to the user who submitted the request
        Mail::to($request->email)->send(new RequestAcceptedMail($consultant, $requestDetails));

        return back()->with('success', 'Request accepted successfully, and an email has been sent to the requester.');
    }


    public function assignConsultant($id)
    {
        $consultantId = auth('consultants')->id();
        
        $request = ServiceRequest::findOrFail($id);
        $request->update(['consultant_id' => $consultantId, 'status' => 'accepted']);

        return back()->with('success', 'Request assigned and accepted successfully.');
    }


    public function unaccept(Request $request, $id)
    {
        // Find the request or throw a 404 error if not found
        $serviceRequest = ServiceRequest::findOrFail($id);

        // Check if the logged-in consultant is the one who accepted the request
        if ($serviceRequest->consultant_id !== auth()->id()) {
            return back()->with('error', 'You are not authorized to unaccept this request.');
        }

        // Get the reason from the request input
        $reason = $request->input('reason');

        // Log the unaccept reason (optional)
        \Log::info("Unaccept Reason for Request $id by Consultant ID " . auth()->id() . ": $reason");

        // Update the request status to 'pending' and remove consultant_id
        $serviceRequest->update([
            'status' => 'pending',
            'consultant_id' => null,
        ]);

        // Send email notification to the requester
        try {
            \Mail::to($serviceRequest->email)->send(new \App\Mail\UnacceptRequestMail($serviceRequest, $reason));
        } catch (\Exception $e) {
            \Log::error('Failed to send unaccept email: ' . $e->getMessage());
        }

        return back()->with('success', 'Request unaccepted successfully.');
    }



}
