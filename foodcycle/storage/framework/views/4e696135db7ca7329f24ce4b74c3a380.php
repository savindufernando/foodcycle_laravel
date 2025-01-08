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

    <!-- Hero/Banner Section -->
    <section class="relative bg-gradient-to-r from-teal-500 to-lime-400 h-[200px] flex items-center justify-center text-white">
        <h1 class="text-4xl font-extrabold drop-shadow-md">Welcome to Food Cycle Marketplace</h1>
        <div class="absolute text-sm bottom-4 right-4">Find fresh and organic products easily</div>
    </section>
    
    <!-- Filter & Search Section -->
    <section class="flex flex-col items-center p-6 mx-4 space-y-6 -translate-y-8 bg-white rounded-md shadow-lg md:flex-row md:justify-between md:space-y-0">
        <!-- Filter Button -->
        <button onclick="toggleSidebar()" class="px-6 py-2 text-sm text-white bg-green-600 rounded-lg shadow-md hover:bg-green-700">
            <i class="fa-solid fa-filter"></i> Filters
        </button>

        <!-- Search Bar -->
        <div class="relative flex items-center w-full max-w-lg mx-4">
            <form method="GET" action="<?php echo e(route('shop.index')); ?>" class="flex w-full">
                <!-- Input Field -->
                <input 
                    type="text" 
                    name="search" 
                    value="<?php echo e(request('search')); ?>" 
                    placeholder="Search for products..." 
                    class="w-full py-3 pl-4 pr-12 text-sm border rounded-full shadow-sm focus:ring-2 focus:ring-green-500"
                >
                <!-- Search Button -->
                <button 
                    type="submit" 
                    class="absolute inset-y-0 flex items-center text-gray-400 right-3 hover:text-green-500"
                >
                    <i class="fa-solid fa-search"></i>
                </button>
            </form>
        </div>

        <!-- Sort Dropdown -->
        <form method="GET" action="<?php echo e(route('shop.index')); ?>" class="inline">
            <input type="hidden" name="search" value="<?php echo e(request('search')); ?>">
            <select 
                name="sort" 
                onchange="this.form.submit()" 
                class="px-6 py-3 text-sm bg-white border rounded-lg shadow-md focus:ring-2 focus:ring-green-500"
            >
                <option value="" <?php echo e(!request('sort') ? 'selected' : ''); ?>>Sort by Price</option>
                <option value="low-high" <?php echo e(request('sort') == 'low-high' ? 'selected' : ''); ?>>Low to High</option>
                <option value="high-low" <?php echo e(request('sort') == 'high-low' ? 'selected' : ''); ?>>High to Low</option>
            </select>
        </form>
    </section>

    <section class="relative flex flex-col mx-4 mb-6 space-y-6 md:flex-row md:space-y-0 md:space-x-6">
        <!-- Sidebar Filters -->
        <aside id="filter-sidebar" class="w-full p-4 bg-white rounded-lg shadow-md md:w-1/6">
            <h2 class="pb-2 mb-4 text-xl font-bold border-b">Filters</h2>
            <form method="GET" action="<?php echo e(route('shop.index')); ?>">
                <div class="space-y-4">
                    <!-- For Humans -->
                    <div>
                        <button type="button" onclick="toggleDropdown('human')" class="flex justify-between w-full p-2 text-sm bg-green-100 rounded-md hover:bg-green-200">
                            For Humans <span id="human-arrow" class="text-gray-600">▼</span>
                        </button>
                        <div id="human-dropdown" class="hidden mt-2 ml-4 space-y-2">
                            <label class="block">
                                <input 
                                    type="checkbox" 
                                    name="filter[]" 
                                    value="human" 
                                    class="mr-2" 
                                    <?php echo e(request('filter') && in_array('human', request('filter')) ? 'checked' : ''); ?>>
                                Human Food
                            </label>
                        </div>
                    </div>
    
                    <!-- For Animals -->
                    <div>
                        <button type="button" onclick="toggleDropdown('animals')" class="flex justify-between w-full p-2 text-sm bg-green-100 rounded-md hover:bg-green-200">
                            For Animals <span id="animals-arrow" class="text-gray-600">▼</span>
                        </button>
                        <div id="animals-dropdown" class="hidden mt-2 ml-4 space-y-2">
                            <label class="block">
                                <input 
                                    type="checkbox" 
                                    name="filter[]" 
                                    value="animal" 
                                    class="mr-2" 
                                    <?php echo e(request('filter') && in_array('animal', request('filter')) ? 'checked' : ''); ?>>
                                Animal Feed
                            </label>
                        </div>
                    </div>
    
                    <!-- Fertilizer -->
                    <div>
                        <button type="button" onclick="toggleDropdown('fertilizer')" class="flex justify-between w-full p-2 text-sm bg-green-100 rounded-md hover:bg-green-200">
                            Fertilizer <span id="fertilizer-arrow" class="text-gray-600">▼</span>
                        </button>
                        <div id="fertilizer-dropdown" class="hidden mt-2 ml-4 space-y-2">
                            <label class="block">
                                <input 
                                    type="checkbox" 
                                    name="filter[]" 
                                    value="fertilizer" 
                                    class="mr-2" 
                                    <?php echo e(request('filter') && in_array('fertilizer', request('filter')) ? 'checked' : ''); ?>>
                                Fertilizer
                            </label>
                        </div>
                    </div>
                </div>
    
                <!-- Apply Button -->
                <button 
                    type="submit" 
                    class="px-4 py-2 mt-4 text-white rounded bg-gradient-to-r from-indigo-500 to-blue-500 hover:from-indigo-400 hover:to-blue-400">
                    Apply Filters
                </button>
            </form>
        </aside>
    
        <!-- Product Grid -->
        <div class="grid grid-cols-2 gap-8 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-4 xl:grid-cols-5">
            <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <a href="<?php echo e(route('shop.product.show', $product->id)); ?>" class="relative transition-transform bg-white border border-gray-200 rounded-lg shadow-lg hover:shadow-xl hover:scale-105">
                <!-- Flash Sale Badge -->
                <?php if($product->is_flash_sale): ?>
                    <div class="absolute top-2 left-2 px-2 py-1 text-sm font-semibold text-white bg-red-500 rounded-md">
                        Flash Sale -30%
                    </div>
                <?php endif; ?>

                <!-- Image Section -->
                <div class="relative w-full h-48 overflow-hidden rounded-t-lg">
                    <img src="<?php echo e(asset('storage/' . $product->image)); ?>" alt="<?php echo e($product->name); ?>" class="object-cover w-full h-full">
                </div>

                <!-- Product Info Section -->
                <div class="p-3">
                    <h3 class="text-base font-semibold text-gray-800 truncate"><?php echo e($product->name); ?></h3>
                    <p class="text-sm text-gray-600"><?php echo e($product->category); ?></p>
                    <p class="mt-2 font-bold text-green-600">
                        Rs.<?php echo e($product->is_flash_sale ? $product->flash_sale_price : $product->price); ?>

                        <?php if($product->is_flash_sale): ?>
                            <span class="ml-2 line-through text-red-500">Rs.<?php echo e($product->price); ?></span>
                        <?php endif; ?>
                    </p>
                </div>
            </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <p>No products found for the selected filters.</p>
            <?php endif; ?>
        </div>
    </section>
    
    <!-- Footer Section -->
    <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Custom JavaScript -->
    <script src="<?php echo e(asset('panel/js/script.js')); ?>"></script>
    
</body>
</html>
<?php /**PATH C:\Users\savin\Desktop\foodcycle\resources\views/shop.blade.php ENDPATH**/ ?>