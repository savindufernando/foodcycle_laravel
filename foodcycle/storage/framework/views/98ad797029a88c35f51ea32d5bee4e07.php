<?php echo $__env->make('admin.layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- Main Content -->
<main class="container mx-auto p-8">
    <h1 class="mb-6 text-3xl font-bold text-center">Expired Products</h1>

    <?php if($expiredProducts->isEmpty()): ?>
        <p class="text-center text-gray-600">No expired products available at the moment.</p>
    <?php else: ?>
        <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
            <?php $__currentLoopData = $expiredProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="p-4 bg-white border rounded-lg shadow-md">
                    <!-- Product Image -->
                    <img src="<?php echo e(asset('storage/' . $product->image)); ?>" alt="<?php echo e($product->name); ?>" class="w-full h-48 object-cover rounded">
                    
                    <!-- Product Details -->
                    <div class="mt-4">
                        <h2 class="text-xl font-semibold"><?php echo e($product->name); ?></h2>
                        <p class="text-gray-500">Category: <?php echo e(ucfirst($product->category)); ?></p>
                        <p class="mt-2 text-lg font-bold text-red-600">Expired Price: Rs. <?php echo e(number_format($product->price, 2)); ?></p>
                    </div>

                    <!-- Expired Status -->
                    <div class="mt-4">
                        <span class="block px-4 py-2 text-white bg-gray-500 rounded text-center">
                            Expired
                        </span>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php endif; ?>
</main>

<!-- Fixed Footer Section -->
<footer class="fixed bottom-0 left-0 w-full py-4 text-center text-white bg-green-700">
        <p>&copy; 2024 Food Cycle. All rights reserved.</p>
    </footer>

</body>
</html>
<?php /**PATH C:\Users\savin\Desktop\foodcycle\resources\views/admin/expiredproducts.blade.php ENDPATH**/ ?>