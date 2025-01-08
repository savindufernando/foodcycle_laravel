<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Blogs</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <!-- Include Header -->
    <?php echo $__env->make('layouts.bheader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    <!-- Drawer Toggle Button -->
    <button id="drawerToggle" class="fixed top-4 left-4 z-50 p-2 bg-green-500 text-white rounded-full shadow-lg focus:outline-none hover:bg-green-600">
        <i class="fa fa-bars fa-lg"></i>
    </button>

    <!-- Drawer Sidebar -->
    <div id="drawerSidebar" class="fixed inset-y-0 left-0 z-40 w-64 bg-white shadow-lg transform -translate-x-full transition-transform duration-300">
    <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
        <ul class="space-y-2 font-medium">
            <li>
                <a href="<?php echo e(route('blogger.dashboard')); ?>" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                    <path d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z"/>
                </svg>
                <span class="flex-1 ms-3 whitespace-nowrap">All Posts</span>
                <span class="inline-flex items-center justify-center px-2 ms-3 text-sm font-medium text-gray-800 bg-gray-100 rounded-full dark:bg-gray-700 dark:text-gray-300">Pro</span>
                </a>
            </li>
            <li>
                <a href="<?php echo e(route('blogger.my-posts')); ?>" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="m17.418 3.623-.018-.008a6.713 6.713 0 0 0-2.4-.569V2h1a1 1 0 1 0 0-2h-2a1 1 0 0 0-1 1v2H9.89A6.977 6.977 0 0 1 12 8v5h-2V8A5 5 0 1 0 0 8v6a1 1 0 0 0 1 1h8v4a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-4h6a1 1 0 0 0 1-1V8a5 5 0 0 0-2.582-4.377ZM6 12H4a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Z"/>
                </svg>
                <span class="flex-1 ms-3 whitespace-nowrap">My Posts</span>
                <span class="inline-flex items-center justify-center w-3 h-3 p-3 ms-3 text-sm font-medium text-blue-800 bg-blue-100 rounded-full dark:bg-blue-900 dark:text-blue-300">3</span>
                </a>
            </li>
            <li>
                <a href="<?php echo e(route('blogger.profile')); ?>" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                    <path d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z"/>
                </svg>
                <span class="flex-1 ms-3 whitespace-nowrap">Profile</span>
                </a>
            </li>
            <li>
                <a href="<?php echo e(route('blogger.logout')); ?>" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 16">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 8h11m0 0L8 4m4 4-4 4m4-11h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-3"/>
                </svg><span class="flex-1 ms-3 whitespace-nowrap"><form method="POST" action="<?php echo e(route('blogger.logout')); ?>">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="w-full text-left py-2 hover:bg-gray-700 rounded-lg"> Logout</button>
                        </form></span>
                
                </a>
            </li>
        </ul>
    </div>
    </div>

    <div class="container mx-auto px-4 py-8">
        <h1 class="text-4xl font-bold text-green-500 mb-8 text-center">My Blog Posts</h1>

        <!-- Search and Filter Section -->
        <div class="flex justify-between items-center mb-6">
            <input type="text" id="searchInput" placeholder="Search by title..." 
                   class="w-1/2 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
            
            <div class="space-x-4">
                <button onclick="filterBlogs('approved')" class="px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-700">Approved</button>
                <button onclick="filterBlogs('pending')" class="px-4 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-700">Pending</button>
                <button onclick="filterBlogs('rejected')" class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-700">Rejected</button>
                <button onclick="filterBlogs('all')" class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-700">All</button>
            </div>
        </div>

        <!-- Blog Sections -->
        <div id="blogContainer" class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
            <!-- Approved Blogs -->
            <?php $__currentLoopData = $approvedBlogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="bg-white shadow-lg rounded-lg overflow-hidden blog-card approved">
                    <img src="<?php echo e(asset('storage/' . $blog->photos1)); ?>" alt="<?php echo e($blog->title); ?>" class="w-full h-40 object-cover">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-800"><?php echo e($blog->title); ?></h3>
                        <p class="text-sm text-gray-600 mt-2"><?php echo e(Str::limit(strip_tags($blog->content), 80)); ?></p>
                        <div class="mt-4 flex justify-between items-center">
                            <a href="<?php echo e(route('blogs.show', $blog->id)); ?>" class="text-green-500 hover:underline">View</a>
                            <span class="text-xs text-gray-500"><?php echo e($blog->created_at->format('M d, Y')); ?></span>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <!-- Pending Blogs -->
            <?php $__currentLoopData = $pendingBlogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="bg-white shadow-lg rounded-lg overflow-hidden blog-card pending">
                    <img src="<?php echo e(asset('storage/' . $blog->photos1)); ?>" alt="<?php echo e($blog->title); ?>" class="w-full h-40 object-cover">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-800"><?php echo e($blog->title); ?></h3>
                        <p class="text-sm text-gray-600 mt-2"><?php echo e(Str::limit(strip_tags($blog->content), 80)); ?></p>
                        <div class="mt-4 flex justify-between items-center">
                            <a href="<?php echo e(route('blogs.show', $blog->id)); ?>" class="text-yellow-500 hover:underline">View</a>
                            <span class="text-xs text-gray-500"><?php echo e($blog->created_at->format('M d, Y')); ?></span>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <!-- Rejected Blogs -->
            <?php $__currentLoopData = $rejectedBlogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="bg-white shadow-lg rounded-lg overflow-hidden blog-card rejected">
                    <img src="<?php echo e(asset('storage/' . $blog->photos1)); ?>" alt="<?php echo e($blog->title); ?>" class="w-full h-40 object-cover">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-800"><?php echo e($blog->title); ?></h3>
                        <p class="text-sm text-red-600 mt-2">Reason: <?php echo e($blog->rejected_reason); ?></p>
                        <p class="text-sm text-gray-600 mt-2"><?php echo e(Str::limit(strip_tags($blog->content), 80)); ?></p>
                        <div class="mt-4 flex justify-between items-center">
                            <a href="<?php echo e(route('blogs.show', $blog->id)); ?>" class="text-red-500 hover:underline">View</a>
                            <span class="text-xs text-gray-500"><?php echo e($blog->created_at->format('M d, Y')); ?></span>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>

    <!-- Footer -->
    <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- JavaScript for Search and Filter -->
    <script>
        function filterBlogs(status) {
            const allBlogs = document.querySelectorAll('.blog-card');
            allBlogs.forEach(blog => {
                if (status === 'all') {
                    blog.classList.remove('hidden');
                } else if (!blog.classList.contains(status)) {
                    blog.classList.add('hidden');
                } else {
                    blog.classList.remove('hidden');
                }
            });
        }

        document.getElementById('searchInput').addEventListener('input', function () {
            const query = this.value.toLowerCase();
            const allBlogs = document.querySelectorAll('.blog-card');
            allBlogs.forEach(blog => {
                const title = blog.querySelector('h3').innerText.toLowerCase();
                if (title.includes(query)) {
                    blog.classList.remove('hidden');
                } else {
                    blog.classList.add('hidden');
                }
            });
        });
    </script>
    <script>
        const drawerToggle = document.getElementById('drawerToggle');
        const drawerSidebar = document.getElementById('drawerSidebar');

        drawerToggle.addEventListener('click', () => {
            drawerSidebar.classList.toggle('-translate-x-full');
        });

        // Close the drawer when clicking outside
        document.addEventListener('click', (e) => {
            if (!drawerSidebar.contains(e.target) && !drawerToggle.contains(e.target)) {
                drawerSidebar.classList.add('-translate-x-full');
            }
        });
    </script>


</body>
</html>
<?php /**PATH C:\Users\savin\Desktop\foodcycle\resources\views/blogger/my-posts.blade.php ENDPATH**/ ?>