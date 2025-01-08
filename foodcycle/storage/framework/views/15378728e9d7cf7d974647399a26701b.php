<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Blog</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-6">Create New Blog Post</h1>

        <?php if($errors->any()): ?>
            <div class="mb-4 text-red-600">
                <ul class="list-disc list-inside">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <form action="<?php echo e(route('blogs.store')); ?>" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-md">
            <?php echo csrf_field(); ?>
            <!-- Blog Title -->
            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
            <input type="text" name="title" id="title" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>

            <!-- Blog Content -->
            <label for="content" class="block text-sm font-medium text-gray-700 mt-4">Content</label>
            <textarea name="content" id="editor" rows="10" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required></textarea>

            <!-- Photos -->
            <div class="mt-4">
                <label for="photos1" class="block text-sm font-medium text-gray-700">Photo 1 (optional)</label>
                <input
                    type="file"
                    id="photos1"
                    name="photos1"
                    accept=".jpg,.jpeg,.png"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                >
            </div>

            <!-- Submit Button -->
            <div class="mt-6">
                <button
                    type="submit"
                    class="px-4 py-2 bg-blue-500 text-white font-medium rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
                    Create Blog
                </button>
            </div>
        </form>

    <!-- Include CKEditor Script -->
    <script src="https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('editor');
    </script>

    </div>
</body>
</html>
<?php /**PATH C:\Users\savin\Desktop\foodcycle\resources\views/blogs/create.blade.php ENDPATH**/ ?>