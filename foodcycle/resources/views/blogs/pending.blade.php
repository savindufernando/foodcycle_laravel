<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pending Blogs</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold text-gray-700 mb-4">Pending Blogs</h1>
        <table class="table-auto w-full bg-white shadow-md rounded mb-8">
            <thead class="bg-yellow-500 text-white">
                <tr>
                    <th class="px-4 py-2">Title</th>
                    <th class="px-4 py-2">Author</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($blogs as $blog)
                    <tr class="border-b">
                        <td class="px-4 py-2">{{ $blog->title }}</td>
                        <td class="px-4 py-2">{{ $blog->blogger->name }}</td>
                        <td class="px-4 py-2 flex space-x-2">
                            <form action="{{ route('teacher.blogs.approve', $blog->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">Approve</button>
                            </form>
                            <form action="{{ route('teacher.blogs.reject', $blog->id) }}" method="POST">
                                @csrf
                                <input type="text" name="reason" placeholder="Reason for rejection" class="border px-2 py-1 rounded">
                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded">Reject</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
