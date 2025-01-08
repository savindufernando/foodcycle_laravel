@include('teacher.layouts.sidebar')

<!-- Main Content -->
<main class="flex-1 p-6 ml-64 overflow-y-auto">
<div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold text-gray-700 mb-4">Manage Blogs</h1>

        <!-- Success Message -->
        @if (session('success'))
            <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- Pending Blogs Section -->
        <h2 class="text-xl font-semibold text-yellow-600 mb-4">Pending Blogs</h2>
        @if ($pendingBlogs->isEmpty())
            <p class="text-gray-600 mb-8">No pending blogs available.</p>
        @else
            <table class="table-auto w-full bg-white shadow-md rounded mb-8">
                <thead class="bg-yellow-500 text-white">
                    <tr>
                        <th class="px-4 py-2">Title</th>
                        <th class="px-4 py-2">Author</th>
                        <th class="px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pendingBlogs as $blog)
                        <tr class="border-b">
                            <td class="px-4 py-2">{{ $blog->title }}</td>
                            <td class="px-4 py-2">{{ $blog->blogger->name ?? 'Unknown' }}</td>
                            <td class="px-4 py-2 flex space-x-2">
                                <!-- View Blog Button -->
                                <a href="{{ route('teacher.blogs.show', $blog->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                                    View Blog
                                </a>
                                <form action="{{ route('teacher.blogs.approve', $blog->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">
                                        Approve
                                    </button>
                                </form>
                                <form action="{{ route('teacher.blogs.reject', $blog->id) }}" method="POST">
                                    @csrf
                                    <input type="text" name="reason" placeholder="Rejection Reason" class="border px-2 py-1 rounded">
                                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded">
                                        Reject
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        <!-- Blog Popup Section -->
        @isset($blog)
            <div class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center">
                <div class="bg-white p-6 rounded shadow-md w-2/3">
                    <h2 class="text-xl font-bold mb-4">{{ $blog->title }}</h2>
                    <p class="text-gray-700 mb-4">{{ $blog->content }}</p>
                    <div class="mb-4">
                        @if ($blog->photos1)
                            <img src="{{ asset('storage/' . $blog->photos1) }}" alt="Photo 1" class="mb-2 rounded">
                        @endif
                        @if ($blog->photos2)
                            <img src="{{ asset('storage/' . $blog->photos2) }}" alt="Photo 2" class="rounded">
                        @endif
                    </div>
                    <a href="{{ route('teacher.blogs.pending') }}" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded">
                        Close
                    </a>
                </div>
            </div>
        @endisset
    </div>
</main>

<!-- Footer Section -->
<footer class="fixed bottom-0 left-0 w-full py-4 text-center text-white bg-green-700">
    <p>&copy; 2024 Food Cycle. All rights reserved.</p>
</footer>
