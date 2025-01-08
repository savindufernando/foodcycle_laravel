<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogs</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <!-- Include Header -->
    <?php echo $__env->make('layouts.bheader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Container -->
    <div class="container mx-auto px-4 py-8">
        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <?php if(auth()->guard('blogger')->check()): ?>
                <!-- If the user is logged in, show the link to the dashboard -->
                <a href="<?php echo e(route('blogger.dashboard')); ?>" 
                class="px-4 py-2 bg-green-500 text-white font-semibold rounded-lg hover:bg-green-700">
                    Create a Blog about Agriculture
                </a>
            <?php else: ?>
                <!-- If the user is a guest, show the link to the login page -->
                <a href="<?php echo e(route('blogger.login')); ?>" 
                class="px-4 py-2 bg-green-500 text-white font-semibold rounded-lg hover:bg-green-700">
                    Create a Blog about Agriculture
                </a>
            <?php endif; ?>
        </div>


        <h1 class="text-4xl font-bold text-green-500 mb-8 text-center">Blogs</h1>

        <!-- Blog Grid -->
        <div class="grid grid-cols-1 gap-10 md:grid-cols-2 lg:grid-cols-3">
            <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="bg-white shadow-lg rounded-lg overflow-hidden transition-transform transform hover:scale-105 hover:shadow-xl">
                    <!-- Blog Image -->
                    <?php if($blog->photos1): ?>
                        <img src="<?php echo e(asset('storage/' . $blog->photos1)); ?>" 
                             alt="<?php echo e($blog->title); ?>" 
                             class="w-full h-64 object-cover">
                    <?php endif; ?>

                    <!-- Blog Content -->
                    <div class="p-6">
                        <h2 class="text-lg font-semibold text-gray-800 hover:text-orange-500">
                            <a href="<?php echo e(route('blogs.show', $blog->id)); ?>"><?php echo e($blog->title); ?></a>
                        </h2>
                        <p class="text-sm text-gray-600 mt-3 leading-6">
                            <?php echo e(Str::limit(strip_tags($blog->content), 120)); ?>

                        </p>
                        <div class="mt-4 flex justify-between items-center">
                            <!-- Read More Button -->
                            <a href="<?php echo e(route('blogs.show', $blog->id)); ?>" 
                               class="px-4 py-2 text-sm font-medium text-white bg-green-500 rounded-lg hover:bg-green-600 transition">
                                Read More...
                            </a>
                            <!-- Metadata -->
                            <span class="text-xs text-gray-500">
                                <?php echo e($blog->created_at->format('M d, Y')); ?>

                            </span>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <!-- Pagination -->
        <div class="mt-8">
            <?php echo e($blogs->links()); ?>

        </div>
    </div>

    <!-- Footer Section -->
    <footer class="bg-gray-800 py-6 text-white mt-10">
        <div class="container mx-auto px-4 grid grid-cols-1 md:grid-cols-3 gap-6">
            <div>
                <h3 class="text-lg font-semibold mb-2">Social Media</h3>
                <a href="#" class="block text-gray-400 hover:text-white">Facebook</a>
                <a href="#" class="block text-gray-400 hover:text-white">WhatsApp</a>
                <a href="#" class="block text-gray-400 hover:text-white">Instagram</a>
            </div>
            <div>
                <h3 class="text-lg font-semibold mb-2">Links</h3>
                <a href="/" class="block text-gray-400 hover:text-white">Home</a>
                <a href="/shop" class="block text-gray-400 hover:text-white">Shop</a>
                <a href="/donation" class="block text-gray-400 hover:text-white">Donation</a>
                <a href="/about" class="block text-gray-400 hover:text-white">About Us</a>
            </div>
            <div>
                <h3 class="text-lg font-semibold mb-2">Subscribe</h3>
                <form action="#" method="POST" class="space-y-2">
                    <input type="email" class="w-full px-4 py-2 text-black rounded-lg" placeholder="Your Email">
                    <textarea class="w-full px-4 py-2 text-black rounded-lg" placeholder="Message"></textarea>
                    <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-700">Submit</button>
                </form>
            </div>
        </div>
        <p class="text-center text-gray-400 mt-6">© 2024, Food Cycle</p>
    </footer>

</body>
</html>
<?php /**PATH C:\Users\savin\Desktop\foodcycle\resources\views/blogs/index.blade.php ENDPATH**/ ?>