<?php

namespace App\Http\Controllers;
use App\Models\Comment;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    // Show all blogs for guests
    public function index(Request $request)
    {
        $query = Blog::with('blogger')->where('status', 'approved');

        // Check if a search term is provided
        if ($request->has('search') && !empty($request->search)) {
            $query->where('title', 'like', '%' . $request->search . '%')
                ->orWhere('content', 'like', '%' . $request->search . '%');
        }

        $blogs = $query->latest()->paginate(10);

        return view('blogs.index', compact('blogs'));
    }


    // Show a single blog
    public function show($id)
    {
        $blog = Blog::with('blogger')->findOrFail($id);
        
        // Fetch the 4 most recent approved blogs
        $recentBlogs = Blog::where('status', 'approved')->latest()->take(4)->get();

        return view('blogs.show', compact('blog', 'recentBlogs'));
    }




    // Show create blog form (for bloggers)
    public function create()
    {
        return view('blogs.create');
    }

    // Store a new blog (for bloggers)
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'photos1' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $blog = new Blog();
        $blog->title = $request->title;
        $blog->content = $request->content;
        $blog->blogger_id = Auth::id();
        $blog->status = 'pending';

        // Handle file upload for photos1
        if ($request->hasFile('photos1')) {
            $blog->photos1 = $request->file('photos1')->store('blogs', 'public');
        }

        $blog->save();

        return redirect()->route('blogger.my-posts')->with('success', 'Blog created successfully and is awaiting approval!');
    }

    // Approve a blog (for admin/teacher)
    public function approve($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->update(['status' => 'approved']);
        return redirect()->back()->with('success', 'Blog approved successfully!');
    }

    // Reject a blog (for admin/teacher)
    public function reject(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);
        $blog->update([
            'status' => 'rejected',
            'rejection_reason' => $request->input('reason'),
        ]);
        return redirect()->back()->with('success', 'Blog rejected successfully!');
    }

    // Show edit blog form (for bloggers)
    public function edit($id)
    {
        $blog = Blog::where('blogger_id', Auth::id())->findOrFail($id);
        return view('blogs.edit', compact('blog'));
    }

    // Update an existing blog (for bloggers)
    public function update(Request $request, $id)
    {
        $blog = Blog::where('blogger_id', Auth::id())->findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'photos1' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $blog->title = $request->title;
        $blog->content = $request->content;

        // Handle file upload for photos1
        if ($request->hasFile('photos1')) {
            $blog->photos1 = $request->file('photos1')->store('blogs', 'public');
        }

        $blog->save();

        return redirect()->route('blogger.dashboard')->with('success', 'Blog updated successfully!');
    }


    // Delete a blog (for bloggers)
    public function destroy($id)
    {
        $blog = Blog::where('blogger_id', Auth::id())->findOrFail($id);
        $blog->delete();

        return redirect()->route('blogger.dashboard')->with('success', 'Blog deleted successfully!');
    }

    // Show all posts by the logged-in blogger
    public function myPosts()
    {
        $blogs = Auth::guard('blogger')->user()->blogs()->latest()->get();

        // Filter blogs by status
        $approvedBlogs = $blogs->filter(function ($blog) {
            return $blog->status === 'approved';
        });

        $pendingBlogs = $blogs->filter(function ($blog) {
            return $blog->status === 'pending';
        });

        $rejectedBlogs = $blogs->filter(function ($blog) {
            return $blog->status === 'rejected';
        });

        return view('blogger.my-posts', compact('approvedBlogs', 'pendingBlogs', 'rejectedBlogs'));
    }

    // Show pending blogs (for admin/teacher review)
    public function pendingBlogs()
    {
        $blogs = Blog::where('status', 'pending')->latest()->paginate(10);
        return view('blogs.pending', compact('blogs'));
    }

    // Add a new comment
    public function comment(Request $request, $id)
    {
        // Validate the comment input
        $request->validate([
            'comment' => 'required|string|max:255',
        ]);

        // Find the blog by ID
        $blog = Blog::findOrFail($id);

        // Create a new comment
        $comment = $blog->comments()->create([
            'comment' => $request->input('comment'),
            'blogger_id' => Auth::id(),
        ]);

        // Return a JSON response with the new comment and updated comment count
        return response()->json([
            'success' => true,
            'comment' => [
                'id' => $comment->id,
                'comment' => $comment->comment,
                'blogger_name' => $comment->blogger->name,
                'created_at' => $comment->created_at->format('M d, Y'),
            ],
            'comment_count' => $blog->comments()->count(),
        ]);
    }

    // Update a comment
    public function updateComment(Request $request, $id)
    {
        $request->validate([
            'comment' => 'required|string|max:255',
        ]);

        $comment = Comment::where('id', $id)
                    ->where('blogger_id', Auth::guard('blogger')->id())
                    ->firstOrFail();

        $comment->update([
            'comment' => $request->input('comment'),
        ]);

        return redirect()->back()->with('success', 'Comment updated successfully!');
    }

    // Delete a comment
    public function destroyComment($id)
    {
        $comment = Comment::where('id', $id)
                    ->where('blogger_id', Auth::guard('blogger')->id())
                    ->firstOrFail();

        $comment->delete();

        return redirect()->back()->with('success', 'Comment deleted successfully!');
    }


    // Like or unlike a blog
    public function like($id)
    {
        $blog = Blog::findOrFail($id);
        $user = Auth::user();

        // Check if the user has already liked the blog
        $existingLike = $blog->likes()->where('blogger_id', $user->id)->first();

        if ($existingLike) {
            // If the user has already liked, unlike it
            $existingLike->delete();
            $liked = false;
        } else {
            // Otherwise, add a new like
            $blog->likes()->create([
                'blogger_id' => $user->id,
            ]);
            $liked = true;
        }

        // Return the updated like count and like status
        return response()->json([
            'likes' => $blog->likes()->count(),
            'liked' => $liked,
        ]);
    }
    public function getMostLikedBlogs()
    {
        $mostLikedBlogs = Blog::withCount('likes')
            ->orderBy('likes_count', 'desc')
            ->take(4)
            ->get();

        return view('blogs.partials.mostlike', compact('mostLikedBlogs'));
    }

}
