<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Blog - {{ $blog->title }}</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- CKEditor -->
    <script src="https://cdn.ckeditor.com/4.20.2/standard/ckeditor.js"></script>
</head>
<body class="bg-gray-100">

    <!-- Header -->
    @include('layouts.bheader')

    <!-- Edit Blog Form -->
    <div class="container mx-auto px-4 py-8">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h1 class="text-2xl font-bold mb-6">Edit Blog</h1>

            <form action="{{ route('blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Blog Title -->
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" name="title" id="title" value="{{ $blog->title }}" required
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">

                <!-- Blog Content -->
                <label for="content" class="block text-sm font-medium text-gray-700 mt-4">Content</label>
                <textarea name="content" id="editor" rows="10"
                          class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ $blog->content }}</textarea>

                <!-- CKEditor Initialization -->
                <script>
                    CKEDITOR.replace('editor');
                </script>

                <!-- Blog Photo -->
                <label for="photos1" class="block text-sm font-medium text-gray-700 mt-4">Photo (optional)</label>
                @if ($blog->photos1)
                    <div class="mt-2">
                        <img src="{{ asset('storage/' . $blog->photos1) }}" alt="{{ $blog->title }}" class="w-32 h-32 object-cover rounded">
                    </div>
                @endif
                <input type="file" name="photos1" id="photos1" accept="image/*"
                       class="mt-2 block w-full border-gray-300 rounded-md shadow-sm">

                <!-- Submit Button -->
                <button type="submit"
                        class="mt-6 px-6 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-all">
                    Update Blog
                </button>
            </form>
        </div>
    </div>

</body>
</html>
