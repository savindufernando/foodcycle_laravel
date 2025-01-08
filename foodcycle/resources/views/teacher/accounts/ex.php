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
                                <button onclick="showBlogModal({{ $blog->id }})" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                                    View Blog
                                </button>

                                <!-- Approve Button -->
                                <form action="{{ route('teacher.blogs.approve', $blog->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">
                                        Approve
                                    </button>
                                </form>

                                <!-- Reject Button -->
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

        <!-- Approved Blogs Section -->
        <h2 class="text-xl font-semibold text-green-600 mb-4">Approved Blogs</h2>
        @if ($approvedBlogs->isEmpty())
            <p class="text-gray-600 mb-8">No approved blogs available.</p>
        @else
            <table class="table-auto w-full bg-white shadow-md rounded mb-8">
                <thead class="bg-green-500 text-white">
                    <tr>
                        <th class="px-4 py-2">Title</th>
                        <th class="px-4 py-2">Author</th>
                        <th class="px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($approvedBlogs as $blog)
                        <tr class="border-b">
                            <td class="px-4 py-2">{{ $blog->title }}</td>
                            <td class="px-4 py-2">{{ $blog->blogger->name ?? 'Unknown' }}</td>
                            <td class="px-4 py-2 flex space-x-2">
                                <!-- View Blog Button -->
                                <button onclick="showBlogModal({{ $blog->id }})" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                                    View Blog
                                </button>

                                <!-- Mark as Pending Button -->
                                <form action="{{ route('teacher.blogs.pending', $blog->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded">
                                        Mark as Pending
                                    </button>
                                </form>

                                <!-- Reject Button -->
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

        <!-- Blog Modal -->
        <div id="blog-modal" class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center hidden">
            <div class="bg-white p-6 rounded shadow-md w-2/3">
                <h2 id="blog-title" class="text-xl font-bold mb-4"></h2>
                <p id="blog-content" class="text-gray-700 mb-4"></p>
                <div id="blog-photos" class="mb-4"></div>
                <button onclick="closeBlogModal()" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded">Close</button>
            </div>
        </div>
    </div>
</main>

<!-- Footer Section -->
<footer class="fixed bottom-0 left-0 w-full py-4 text-center text-white bg-green-700">
    <p>&copy; 2024 Food Cycle. All rights reserved.</p>
</footer>

<!-- Custom JavaScript -->
<script src="{{ asset('panel/js/script.js') }}"></script>

<script>
// Open the modal when the 'Add Teacher' button is clicked
document.getElementById('openModal').addEventListener('click', function() {
    document.getElementById('teacherModal').classList.remove('hidden');
});

// Close the modal when the 'Cancel' button is clicked
document.getElementById('closeModal').addEventListener('click', function() {
    document.getElementById('teacherModal').classList.add('hidden');
});

// Optionally, you can add the form submission handling if needed for AJAX
document.getElementById('addTeacherForm').addEventListener('submit', function(e) {
    e.preventDefault(); // Prevent the default form submission
    var form = e.target;

    // Make a POST request to store the teacher
    fetch(form.action, {
        method: 'POST',
        body: new FormData(form),
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Reload the page to reflect changes
            window.location.reload();
        } else {
            alert('There was an error adding the teacher.');
        }
    })
    .catch(error => console.error('Error:', error));
});
</script>

</body>
</html>
