<?php echo $__env->make('admin.layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Main Content -->
    <main class="flex-1 p-6 ml-64 overflow-y-auto">
        <div class="container p-8 mx-auto">
            <h1 class="mb-6 text-3xl font-bold">Manage Your Products</h1>

            <?php if(session('success')): ?>
                <div class="mb-4 text-green-600"><?php echo e(session('success')); ?></div>
            <?php endif; ?>

            <!-- Product Table -->
            <div class="p-4 bg-white rounded-lg shadow-md">
                <table class="w-full border-collapse">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="p-4 text-left">Name</th>
                            <th class="p-4 text-left">Category</th>
                            <th class="p-4 text-left">Price</th>
                            <th class="p-4 text-left">Stock</th>
                            <th class="p-4 text-left">Expiry Countdown</th>
                            <th class="p-4 text-left">Status</th>
                            <th class="p-4 text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="border-b">
                                <td class="p-4"><?php echo e($product->name); ?></td>
                                <td class="p-4"><?php echo e(ucfirst($product->category)); ?></td>
                                <td class="p-4">Rs. <?php echo e($product->price); ?></td>
                                <td class="p-4"><?php echo e($product->stock); ?></td>
                                <td class="p-4">
                                    <span id="countdown-<?php echo e($product->id); ?>" class="px-2 py-1 text-white bg-green-500 rounded">
                                        <?php echo e($product->remaining_hours); ?>h
                                    </span>
                                </td>
                                <td class="p-4"><?php echo e($product->status); ?></td>
                                <td class="p-4 space-x-2">
                                    <!-- Edit Button -->
                                    <a href="<?php echo e(route('admin.editproduct', $product->id)); ?>" 
                                        class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-600">Edit</a>
                                    <!-- Delete Form -->
                                    <form action="<?php echo e(route('admin.deleteproduct', $product->id)); ?>" method="POST" class="inline">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" 
                                                class="px-4 py-2 text-white bg-red-500 rounded hover:bg-red-600">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <!-- Fixed Footer Section -->
    <footer class="fixed bottom-0 left-0 w-full py-4 text-center text-white bg-green-700">
        <p>&copy; 2024 Food Cycle. All rights reserved.</p>
    </footer>

    <!-- Custom JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="<?php echo e(asset('panel/js/script.js')); ?>"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                let countdown<?php echo e($product->id); ?> = <?php echo e($product->remaining_hours * 3600); ?>; // Convert hours to seconds
                const interval<?php echo e($product->id); ?> = setInterval(() => {
                    if (countdown<?php echo e($product->id); ?> > 0) {
                        countdown<?php echo e($product->id); ?>--;
                        const hours = Math.floor(countdown<?php echo e($product->id); ?> / 3600);
                        const minutes = Math.floor((countdown<?php echo e($product->id); ?> % 3600) / 60);
                        const seconds = Math.floor(countdown<?php echo e($product->id); ?> % 60);
                        document.querySelector('#countdown-<?php echo e($product->id); ?>').textContent = `${hours}h ${minutes}mins ${seconds}s`;
                    } else {
                        clearInterval(interval<?php echo e($product->id); ?>);
                        document.querySelector('#countdown-<?php echo e($product->id); ?>').textContent = 'Expired';
                    }
                }, 1000); // 1 second in milliseconds
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        });
    </script>

</body>
</html>
<?php /**PATH C:\Users\savin\Desktop\foodcycle\resources\views/admin/viewproduct.blade.php ENDPATH**/ ?>