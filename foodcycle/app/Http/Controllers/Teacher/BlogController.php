<?php

namespace App\Http\Controllers\Teacher;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    // Display all blogs categorized by status
    public function index()
    {
        // Fetch blogs by status
        $pendingBlogs = Blog::where('status', 'pending')->orderBy('created_at', 'desc')->get();
        $approvedBlogs = Blog::where('status', 'approved')->orderBy('created_at', 'desc')->get();
        $rejectedBlogs = Blog::where('status', 'rejected')->orderBy('created_at', 'desc')->get();

        // Fetch all blogs (regardless of status)
        $allBlogs = Blog::orderBy('created_at', 'desc')->get();

        // Pass data to the view
        return view('teacher.blogs.index', compact('pendingBlogs', 'approvedBlogs', 'rejectedBlogs', 'allBlogs'));
    }


    // Approve a blog
    public function approve($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->update(['status' => 'approved']);
        return redirect()->back()->with('success', 'Blog approved successfully!');
    }

    // Reject a blog
    public function reject(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);
        $blog->update([
            'status' => 'rejected',
            'rejection_reason' => $request->input('reason'),
        ]);

        return redirect()->back()->with('success', 'Blog rejected successfully!');
    }

    // Delete a blog
    public function delete($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();

        return redirect()->back()->with('success', 'Blog deleted successfully!');
    }
    // Mark blog as pending
    public function markAsPending($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->update(['status' => 'pending']);
        return redirect()->back()->with('success', 'Blog marked as pending successfully!');
    }


    public function getBlog($id)
    {
        $blog = Blog::findOrFail($id);

        return response()->json([
            'title' => $blog->title,
            'content' => $blog->content,
            'photos1' => $blog->photos1, // Ensure these are valid paths
            'photos2' => $blog->photos2,
        ]);
    }

    public function show($id)
    {
        $blog = Blog::with('blogger')->findOrFail($id); // Fetch blog with blogger details
        return response()->json($blog); // Return blog as JSON for use in your modal
    }





}

