<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donation;
use App\Models\foodReqests;
use App\Models\donor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DonationController extends Controller
{
     // Show index page
     public function index()
     {
        // Fetch all food requests
        $foodRequests = foodReqests::where('completed', false)->get();

         return view('Donation.index', compact('foodRequests'));  
     }
 
     // Show donation form page
     public function donationForm($id)
     {
        // Fetch the specific food request by ID
        $foodRequest = foodReqests::find($id);
    
        if (!$foodRequest) {
            return redirect()->route('Donation.index')->with('error', 'Food request not found.');
        }
         return view('Donation.donationForm', compact('foodRequest')); 
     }

     /**
      * Display the signup page.
      */
     public function showSignupForm()
     {
         return view('Donation.auth.SignUp');
     }


    // Handle user registration
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:donations,email',
            'password' => 'required|min:8',
            'organization_name' => 'required|string|max:255',
            'registration_number' => 'required|string|max:255|unique:donations,regno',
        ]);
        // Create the donation record
        $data = new Donation; // Corrected from `donations` to `Donation`
    
        $data->orgname = $request->organization_name;
        $data->regno = $request->registration_number;
        $data->orgtype = $request->organization_type;
        $data->regdate = $request->date_of_registration;
        $data->authority = $request->registration_authority;
        $data->name = $request->contact_person_name;
        $data->position = $request->contact_person_position;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->office_address;
        $data->description = $request->mission;
        $data->beneficiaries = $request->beneficiaries;
        $data->region = $request->regions;
        $data->url = $request->website;

        $file = $request->file('registration_certificate'); // Ensure you use the file() method
        $filename = $request->organization_name . '.' . $file->getClientOriginalExtension(); // Fix typo in method name
        $file->move(public_path('registration_certificates'), $filename); // Save the file to a directory
        $data->regcertificate = $filename; // Save the filename in the database
        
    
        // This line is incorrect in your code. Assuming you want to store a hashed password:
        $data->password = bcrypt($request->password); // Corrected from `$password->password`
    
        $data->save();
    
        // Redirect to sign-in page with success message
        return redirect()->route('donation.login')->with('success', 'Registration successful! Please log in.');
    }


    public function showLoginForm()
    {
        if (Auth::guard('donation')->check()) {
            return redirect()->route('donation.dashboard');
        }

        return view('Donation.auth.SignIn');
    }

    public function login(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to authenticate the user with the donation guard
        if (Auth::guard('donation')->attempt($request->only('email', 'password'))) {
            // Regenerate the session
            $request->session()->regenerate();

            // Redirect to the dashboard
            return redirect()->route('donation.dashboard');
        }

        // Redirect back with an error message if authentication fails
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput();
    }

    // Show the dashboard
    public function dashboard()
    {
        // Get the logged-in user's organization name
        $orgName = auth()->guard('donation')->user()->orgname;

        // Fetch only the requests for the logged-in user's organization
        $requests = foodReqests::where('organization_name', $orgName)->get();

        // Ensure the user is authenticated
        $user = Auth::guard('donation')->user();
        if (!$user) {
            return redirect()->route('donation.login')->with('error', 'You need to be logged in to access the dashboard.');
        }
        return view('Donation.dashboard', compact('requests'));
    }

    public function viewDonations()
    {
        // Get the authenticated user's organization name
        $orgName = auth()->guard('donation')->user()->orgname;

        // Fetch donors whose related food requests match the organization name
        $donors = Donor::with(['foodRequest' => function ($query) use ($orgName) {
            $query->where('organization_name', $orgName);
        }])
            ->whereHas('foodRequest', function ($query) use ($orgName) {
                $query->where('organization_name', $orgName);
            })
            ->get(['id', 'donor_name', 'donor_email', 'phone_number', 'items', 'schedule', 'food_request_id'])
            ->map(function ($donor) {
                $donor->items = is_array($donor->items) ? $donor->items : json_decode($donor->items, true) ?? [];
                return $donor;
            });


        $user = Auth::guard('donation')->user();
        if (!$user) {
            return redirect()->route('donation.login')->with('error', 'You need to be logged in to access the dashboard.');
        }
        return view('Donation.viewDonations', compact('donors'));
    }

    // Handle user logout
    public function logout()
    {
        Auth::guard('donation')->logout();
        return redirect()->route('donation.login')->with('success', 'You have been logged out.');
    }

    public function rqstore(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'type' => 'required|string',
            'title' => 'required|string',
            'purpose' => 'required|string',
            'beneficiaries' => 'required|string',
        ]);
    
        // Create a new food request record
        $data = new foodReqests; 
        
        $data->type = $request->type;
        $data->title = $request->title;
        $data->purpose = $request->purpose;
        $data->beneficiaries = $request->beneficiaries;
        $data->organization_name = $request->orgname;
        $data->Org_location = $request->orglocation;
        $data->completed = false; // Default status

        $data->save();
    
        return redirect()->back();
    }

    public function destroy($id)
    {
        $request = foodReqests::findOrFail($id); // Find the request by ID
        $request->delete(); // Delete the request
        return redirect()->back();
    }

    public function markAsCompleted($id)
    {
        $request = foodReqests::findOrFail($id); // Find the donation request by ID
        $request->update(['completed' => true]); // Update the status to completed
        return redirect()->back();
    }
    
    public function fetchFoodRequests(Request $request)
    {
        $location = $request->get('location');
        $foodRequests = foodReqests::where('location', $location)->get();
        return response()->json($foodRequests);
    }

    public function donorStore(Request $request)
    {
        

        // Save the donor details
        $data = new donor;

        $data->food_request_id = $request->requestID;
        $data->location = $request->orgLocation;
        $data->donor_name = $request->summaryName;
        $data->donor_email = $request->summaryEmail;
        $data->phone_number = $request->summaryContact;
        $data->schedule = $request->summaryPickup;
        $data->items = $request->donationItems;
        $data->delivery_status = false;

        $data->save();


        return redirect()->back();
    }

    public function setAsDelivered($id)
    {
        // Find the donor
        $donor = donor::findOrFail($id);

        // Check if schedule starts with "Drop-off Scheduled:"
        if (!str_starts_with($donor->schedule, 'Drop-off Scheduled:')) {
            return back()->with('error', 'Delivery can only be set for schedules starting with "Drop-off Scheduled:".');
        }

        // Update delivery_status to true
        $donor->update([
            'delivery_status' => true,
        ]);

        return redirect()->back();
    }

}


