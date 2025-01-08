<h1 class="text-4xl font-bold text-green-500 mb-6">Most Liked Blogs</h1>

<div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-4">
    <?php $__currentLoopData = $mostLikedBlogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <?php if($blog->photos1): ?>
                <img src="<?php echo e(asset('storage/' . $blog->photos1)); ?>" alt="<?php echo e($blog->title); ?>" class="w-full h-40 object-cover">
            <?php else: ?>
                <div class="w-full h-40 flex items-center justify-center bg-gray-200 text-gray-600">
                    No Image Available
                </div>
            <?php endif; ?>
            <div class="p-4">
                <h3 class="text-lg font-semibold"><?php echo e($blog->title); ?></h3>
                <p class="text-sm text-gray-600 mt-2"><?php echo e(Str::limit(strip_tags($blog->content), 80)); ?></p>
                <a href="<?php echo e(route('blogs.show', $blog->id)); ?>" class="text-blue-500 hover:underline">Read More</a>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php /**PATH C:\Users\savin\Desktop\foodcycle\resources\views/blogs/partials/mostlike.blade.php ENDPATH**/ ?>