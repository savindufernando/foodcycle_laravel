<?php echo $__env->make('admin.layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- Main Content -->
        <main class="flex-1 p-6 ml-64 overflow-y-auto">
            <header class="flex items-center justify-between pb-4 mb-4 border-b">
                <h1 class="text-2xl font-semibold text-gray-700">Seller Dashboard</h1>
                <a href="<?php echo e(route('admin.addproduct')); ?>" class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-600">
                    <i class="mr-2 fas fa-plus"></i> Add Product
                </a>
            </header>

            <!-- Dashboard Cards -->
            <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
                <div class="p-6 text-center bg-white rounded shadow">
                    <h3 class="text-gray-600">Total Orders</h3>
                    <p class="text-2xl font-semibold">0</p>
                </div>
                <div class="p-6 text-center bg-white rounded shadow">
                    <h3 class="text-gray-600">Active Products</h3>
                    <p class="text-2xl font-semibold">0</p>
                </div>
                <div class="p-6 text-center bg-white rounded shadow">
                    <h3 class="text-gray-600">Total Revenue</h3>
                    <p class="text-2xl font-semibold text-yellow-500">Rs. 0.00</p>
                </div>
            </div>

            <!-- Orders Table -->
            <div class="mt-6 bg-white rounded-lg shadow-md">
                <div class="p-6">
                    <h2 class="mb-4 text-xl font-semibold text-gray-700">Orders</h2>
                    <div class="h-64 overflow-y-scroll border border-gray-200 rounded-lg">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="text-gray-700 bg-gray-100 border-b border-gray-200">
                                    <th class="px-6 py-3 ">Customer Name</th>
                                    <th class="px-6 py-3 ">Item</th>
                                    <th class="px-6 py-3 ">Quantity</th>
                                    <th class="px-6 py-3 ">Quality Level</th>
                                    <th class="px-6 py-3 ">Prices</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="px-6 py-3 text-gray-700">Hirusha Gamage</td>
                                    <td class="px-6 py-3 text-gray-700">Carrot</td>
                                    <td class="px-6 py-3 text-gray-700">50Kg</td>
                                    <td class="px-6 py-3 text-gray-700">Human Consumption</td>
                                    <td class="px-6 py-3 font-semibold text-green-500">Rs. 3000</td>
                                </tr>
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="px-6 py-3 text-gray-700">Hirusha Gamage</td>
                                    <td class="px-6 py-3 text-gray-700">Carrot</td>
                                    <td class="px-6 py-3 text-gray-700">50Kg</td>
                                    <td class="px-6 py-3 text-gray-700">Human Consumption</td>
                                    <td class="px-6 py-3 font-semibold text-green-500">Rs. 5000</td>
                                </tr>
                                <!-- Additional rows can be added here -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>    
        </main>
    </div>

    <!-- Fixed Footer Section -->
    <footer class="fixed bottom-0 left-0 w-full py-4 text-center text-white bg-green-700">
        <p>&copy; 2024 Food Cycle. All rights reserved.</p>
    </footer>
    
    <!-- Custom JavaScript -->
    <script src="<?php echo e(asset('panel/js/script.js')); ?>"></script>
</body>
</html>
<?php /**PATH C:\Users\savin\Desktop\foodcycle\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>