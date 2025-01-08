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

<body class="text-gray-800 bg-gray-100">

    <!-- Header Section -->
    <?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Product Section -->
    <main class="max-w-6xl p-8 mx-auto my-10 bg-white rounded-lg shadow-lg">
        <!-- Stylish Back Button -->
        <div class="mb-6">
            <a href="<?php echo e(route('shop.index')); ?>" class="inline-flex items-center px-4 py-2 text-white transition duration-300 ease-in-out transform bg-blue-600 rounded-full hover:bg-blue-700 hover:scale-105">
                <i class="mr-2 fas fa-arrow-left"></i> Go Back
            </a>
        </div>

        <!-- Product Details -->
        <div class="md:flex md:space-x-8">
            <!-- Product Image -->
            <div class="flex justify-center md:w-1/2">
                <img src="<?php echo e(asset('storage/' . $product->image)); ?>" alt="<?php echo e($product->name); ?>" class="object-cover rounded-lg shadow-lg h-80">
            </div>

            <!-- Product Info -->
            <div class="md:w-1/2">
                <h1 class="text-3xl font-semibold text-gray-800"><?php echo e($product->name); ?></h1>

                <!-- Flash Sale Badge -->
                <?php if($product->is_flash_sale): ?>
                    <div class="mt-2 px-3 py-1 text-sm font-semibold text-white bg-red-500 rounded-md inline-block">
                        Flash Sale -30%
                    </div>
                <?php endif; ?>

                <!-- Price Section -->
                <div class="mt-2">
                    <span class="text-2xl font-bold text-green-600">
                        Rs.<?php echo e($product->is_flash_sale ? number_format($product->flash_sale_price, 2) : number_format($product->price, 2)); ?>

                    </span>
                    <?php if($product->is_flash_sale): ?>
                        <span class="ml-2 text-red-500 line-through">Rs.<?php echo e(number_format($product->price, 2)); ?></span>
                    <?php endif; ?>
                </div>

                <p class="mt-4 text-gray-600"><?php echo e($product->description); ?></p>
                <p class="mt-4 text-gray-500">Category: <span class="font-medium text-gray-800"><?php echo e($product->category); ?></span></p>

                <!-- Add to Cart -->
                <form action="<?php echo e(route('shop.addToCart', $product->id)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="flex items-center mt-4">
                        <label for="quantity" class="mr-2 text-gray-700">Quantity:</label>
                        <input type="number" name="quantity" id="quantity" value="1" min="1" class="w-16 p-2 border border-gray-300 rounded-md">
                    </div>
                    <button type="submit" class="w-full py-2 mt-4 text-white bg-green-500 rounded-md hover:bg-green-600">
                        Add to Cart
                    </button>
                </form>
            </div>
        </div>

        <!-- Tabs Section -->
        <div class="mt-10">
            <div class="flex space-x-4 border-b">
                <button id="description-tab" class="px-4 py-2 font-semibold text-green-600 border-b-2 border-green-600">
                    Description
                </button>
                <button id="reviews-tab" class="px-4 py-2 font-semibold text-gray-600 hover:text-green-600">
                    Reviews (0)
                </button>
            </div>

            <div id="description-content" class="mt-6">
                <p class="text-gray-600">
                    <?php echo e($product->description); ?>

                </p>
            </div>
            <div id="reviews-content" class="hidden mt-6">
                <p class="text-gray-600">There are no reviews yet. Be the first to review this product!</p>
                <form class="mt-4">
                    <textarea rows="4" class="w-full p-2 border border-gray-300 rounded" placeholder="Write your review here..."></textarea>
                    <button class="px-4 py-2 mt-2 text-white bg-green-600 rounded hover:bg-green-700">Submit Review</button>
                </form>
            </div>
        </div>
    </main>

    <!-- Footer Section -->
    <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Custom JavaScript -->
    <script src="<?php echo e(asset('panel/js/script.js')); ?>"></script>
    
</body>
</html>
<?php /**PATH C:\Users\savin\Desktop\foodcycle\resources\views/product/show.blade.php ENDPATH**/ ?>