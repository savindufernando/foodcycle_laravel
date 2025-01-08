<h1 class="text-4xl font-extrabold text-green-600 mb-8 text-center">Recent Blogs</h1>

<div class="overflow-hidden">
    <div class="flex gap-6 overflow-x-auto px-4 py-6 scrollbar-hide">
        <?php $__currentLoopData = $recentBlogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="min-w-[300px] max-w-[300px] bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 overflow-hidden">
                <!-- Blog Image -->
                <div class="w-full h-48 overflow-hidden">
                    <?php if($blog->photos1): ?>
                        <img src="<?php echo e(asset('storage/' . $blog->photos1)); ?>" alt="<?php echo e($blog->title); ?>" class="w-full h-full object-cover">
                    <?php else: ?>
                        <div class="w-full h-full bg-gray-200 flex items-center justify-center text-gray-500">
                            No Image Available
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Blog Content -->
                <div class="p-4">
                    <h3 class="text-lg font-semibold text-gray-800 hover:text-green-600 transition">
                        <a href="<?php echo e(route('blogs.show', $blog->id)); ?>"><?php echo e($blog->title); ?></a>
                    </h3>
                    <p class="text-sm text-gray-600 mt-2 leading-relaxed">
                        <?php echo e(Str::limit(strip_tags($blog->content), 80)); ?>

                    </p>
                    <div class="mt-4 flex justify-between items-center">
                        <!-- Read More Button -->
                        <a href="<?php echo e(route('blogs.show', $blog->id)); ?>" class="px-4 py-2 bg-green-500 text-white text-sm font-medium rounded-lg hover:bg-green-600 transition">
                            Read More
                        </a>
                        <!-- Blog Date -->
                        <span class="text-xs text-gray-500"><?php echo e($blog->created_at->format('M d, Y')); ?></span>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const slider = document.getElementById('slider');
        const leftArrow = document.getElementById('slider-left');
        const rightArrow = document.getElementById('slider-right');

        const scrollAmount = 300; // Adjust the scroll amount as needed

        leftArrow.addEventListener('click', () => {
            slider.scrollBy({
                left: -scrollAmount,
                behavior: 'smooth',
            });
        });

        rightArrow.addEventListener('click', () => {
            slider.scrollBy({
                left: scrollAmount,
                behavior: 'smooth',
            });
        });
    });
</script>
<?php /**PATH C:\Users\savin\Desktop\foodcycle\resources\views/blogs/partials/recent.blade.php ENDPATH**/ ?>