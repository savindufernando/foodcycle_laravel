<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fresh Cycle - Marketplace</title>

    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('panel/css/style.css')); ?>">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
</head>

<body class="flex flex-col min-h-screen text-gray-800 bg-gray-100">

    <!-- Header Section -->
    <?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Cart Page -->
    <div class="container flex-grow p-6 mx-auto">

        <h2 class="mb-8 text-3xl font-bold">Your Shopping Cart</h2>

        <?php if($cartItems->isEmpty()): ?>
            <div class="text-center">
                <p class="text-xl text-gray-600">Your cart is empty!</p>
            </div>
        <?php else: ?>
            <!-- Cart Items Table -->
            <div class="p-4 overflow-x-auto bg-white rounded-lg shadow-lg">
                <table class="min-w-full table-auto">
                    <thead>
                        <tr class="text-left border-b">
                            <th class="px-4 py-2 font-medium text-gray-700">Product</th>
                            <th class="px-4 py-2 font-medium text-gray-700">Price</th>
                            <th class="px-4 py-2 font-medium text-gray-700">Quantity</th>
                            <th class="px-4 py-2 font-medium text-gray-700">Total</th>
                            <th class="px-4 py-2 font-medium text-gray-700"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $totalAmount = 0; ?>
                        <?php $__currentLoopData = $cartItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cartItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $itemTotal = $cartItem->quantity * $cartItem->product->price;
                                $totalAmount += $itemTotal;
                            ?>
                            <tr class="border-b">
                                <td class="flex items-center px-4 py-2">
                                    <img src="<?php echo e(asset('storage/' . $cartItem->product->image)); ?>" alt="<?php echo e($cartItem->product->name); ?>" class="object-cover w-16 h-16 mr-4 rounded-lg">
                                    <?php echo e($cartItem->product->name); ?>

                                </td>
                                <td class="px-4 py-2 text-gray-600">Rs.<?php echo e($cartItem->product->price); ?></td>
                                <td class="px-4 py-2 text-gray-600"><?php echo e($cartItem->quantity); ?></td>
                                <td class="px-4 py-2 text-gray-600">Rs.<?php echo e($itemTotal); ?></td>
                                <td class="px-4 py-2">
                                    <form action="<?php echo e(route('cart.remove', $cartItem->id)); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="text-red-500 hover:text-red-700">Remove</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>

            <!-- Cart Summary -->
            <div class="flex justify-between p-6 mt-8 bg-gray-100 rounded-lg shadow-lg">
                <div>
                    <h3 class="text-lg font-semibold">Cart Summary</h3>
                    <p class="mt-2 text-gray-600">Total Items: <?php echo e($cartItems->count()); ?></p>
                    <p class="mt-2 text-lg font-semibold text-gray-700">Total Amount: Rs.<?php echo e($totalAmount); ?></p>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="/shop" class="inline-block px-6 py-2 text-gray-700 bg-gray-300 rounded-md hover:bg-gray-400">Continue Shopping</a>
                    <a href="<?php echo e(route('checkout')); ?>" class="inline-block px-6 py-2 text-white bg-green-600 rounded-md hover:bg-green-700">Checkout</a>

                </div>
            </div>
        <?php endif; ?>
    </div>

    <!-- Footer Section -->
    <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

   <!-- Custom JavaScript -->
    <script src="<?php echo e(asset('panel/js/script.js')); ?>"></script>

</body>
</html>
<?php /**PATH C:\Users\savin\Desktop\foodcycle\resources\views/cart.blade.php ENDPATH**/ ?>