<?php echo $__env->make('teacher.layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- Main Content -->
<main class="flex-1 p-6 ml-64 overflow-y-auto">
    <div class="container mx-auto px-4 py-4">
        <h1 class="text-2xl font-bold text-gray-700 mb-4">Manage Blogs</h1>

        <!-- Success Message -->
        <?php if(session('success')): ?>
            <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <!-- Pending Blogs Section -->
        <h2 class="text-xl font-semibold text-yellow-600 mb-4">Pending Blogs</h2>
        <?php if($pendingBlogs->isEmpty()): ?>
            <p class="text-gray-600 mb-8">No pending blogs available.</p>
        <?php else: ?>
            <table class="table-auto w-full bg-white shadow-md rounded mb-8">
                <thead class="bg-yellow-500 text-white">
                    <tr>
                        <th class="px-4 py-2">Title</th>
                        <th class="px-4 py-2">Author</th>
                        <th class="px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $pendingBlogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="border-b">
                            <td class="px-4 py-2"><?php echo e($blog->title); ?></td>
                            <td class="px-4 py-2"><?php echo e($blog->blogger->name ?? 'Unknown'); ?></td>
                            <td class="px-4 py-2 flex space-x-2">
                                <!-- View Blog Button -->
                                <button onclick="showBlogModal(<?php echo e($blog->id); ?>)" 
                                    class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                                    View Blog
                                </button>
                                <!-- Approve Button -->
                                <form action="<?php echo e(route('teacher.blogs.approve', $blog->id)); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">
                                        Approve
                                    </button>
                                </form>

                                <!-- Reject Button -->
                                <form action="<?php echo e(route('teacher.blogs.reject', $blog->id)); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <input type="text" name="reason" placeholder="Rejection Reason" class="border px-2 py-1 rounded">
                                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded">
                                        Reject
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        <?php endif; ?>

        <!-- Approved Blogs Section -->
        <h2 class="text-xl font-semibold text-green-600 mb-4">Approved Blogs</h2>
        <?php if($approvedBlogs->isEmpty()): ?>
            <p class="text-gray-600 mb-8">No approved blogs available.</p>
        <?php else: ?>
            <table class="table-auto w-full bg-white shadow-md rounded mb-8">
                <thead class="bg-green-500 text-white">
                    <tr>
                        <th class="px-4 py-2">Title</th>
                        <th class="px-4 py-2">Author</th>
                        <th class="px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $approvedBlogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="border-b">
                            <td class="px-4 py-2"><?php echo e($blog->title); ?></td>
                            <td class="px-4 py-2"><?php echo e($blog->blogger->name ?? 'Unknown'); ?></td>
                            <td class="px-4 py-2 flex space-x-2">
                                <!-- View Blog Button -->
                                <a href="<?php echo e(route('teacher.blogs.show', $blog->id)); ?>" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                                    View Blog
                                </a>
                                <!-- Mark as Pending Button -->
                                <form action="<?php echo e(route('teacher.blogs.pending', $blog->id)); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded">
                                        Mark as Pending
                                    </button>
                                </form>

                                <!-- Reject Button -->
                                <form action="<?php echo e(route('teacher.blogs.reject', $blog->id)); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <input type="text" name="reason" placeholder="Rejection Reason" class="border px-2 py-1 rounded">
                                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded">
                                        Reject
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        <?php endif; ?>

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
<script>
    // Function to show the blog modal with dynamic data
    function showBlogModal(blogId) {
        fetch(`/teacher/blogs/${blogId}/show`) // Correct endpoint for the route
            .then(response => response.json())
            .then(data => {
                document.getElementById('blog-title').textContent = data.title;
                document.getElementById('blog-content').textContent = data.content;
                document.getElementById('blog-photos').innerHTML = `
                    ${data.photos1 ? `<img src="/storage/${data.photos1}" class="mb-2 rounded w-full">` : ''}
                    ${data.photos2 ? `<img src="/storage/${data.photos2}" class="rounded w-full">` : ''}
                `;
                document.getElementById('blog-modal').classList.remove('hidden');
            })
            .catch(error => console.error('Error fetching blog:', error));
    }


    // Function to close the modal
    function closeBlogModal() {
        document.getElementById('blog-modal').classList.add('hidden');
    }
</script><?php /**PATH C:\Users\savin\Desktop\foodcycle\resources\views/teacher/blogs/index.blade.php ENDPATH**/ ?>