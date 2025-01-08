<?php echo $__env->make('admin.layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <main class="flex-1 p-6 ml-64 overflow-y-auto"> 
            <section class="w-full p-8 bg-white rounded-lg shadow-lg">
                <h1 class="relative mb-6 text-2xl font-semibold text-center">
                    <span class="absolute left-0 w-16 transform -translate-y-1/2 border-t-2 border-red-500 top-1/2"></span>
                    Add Products
                    <span class="absolute right-0 w-16 transform -translate-y-1/2 border-t-2 border-red-500 top-1/2"></span>
                </h1>
                <form action="<?php echo e(route('admin.storeproduct')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <!-- Product Name and Category -->
                    <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Product Name</label>
                            <input type="text" name="name" id="name"  class="block w-full px-4 py-2 mt-1 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" required>
                        </div>
                        <div>
                            <label for="category" class="block text-sm font-medium text-gray-700">Product Category</label>
                            <select name="category" id="category" class="block w-full px-4 py-2 mt-1 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                                <option value="human">Human Food</option>
                                <option value="animal">Animal Food</option>
                                <option value="fertilizer">Fertilizer Food</option>
                                <!-- Add more options as needed -->
                            </select>
                        </div>
                    </div>
                    <!-- Product Price and Stock -->
                    <div class="grid grid-cols-1 gap-4 mt-4 md:grid-cols-2">
                        <div>
                            <label for="price" class="block text-sm font-medium text-gray-700">Product Price</label>
                            <input type="number" name="price" id="price" value="1" min="1"  class="block w-full px-4 py-2 mt-1 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" required>
                        </div>
                        <div>
                            <label for="stock" class="block text-sm font-medium text-gray-700">Product Stock</label>
                            <input type="number" name="stock" id="stock" value="1" min="1"  class="block w-full px-4 py-2 mt-1 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" required>
                        </div>
                    </div>
                    <!-- Product Expiry in Days -->
                    <div class="mt-4">
                        <label for="expiry_days" class="block text-sm font-medium text-gray-700">Product Expiry (in Days)</label>
                        <input type="number" id="expiry_days" min="0" value="0" class="block w-full px-4 py-2 mt-1 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <!-- Display Expiry in Hours (Read-Only, Sent to Database) -->
                    <div class="mt-4">
                        <label for="expiry_hours" class="block text-sm font-medium text-gray-700">Product Expiry (in Hours)</label>
                        <input type="number" name="expiry_hours" id="expiry_hours" readonly class="block w-full px-4 py-2 mt-1 border border-gray-300 rounded-md bg-green-100 text-gray-700" required>
                    </div>
                    <!-- Product Description -->
                    <div class="mt-4">
                        <label for="description" class="block text-sm font-medium text-gray-700">Product Description</label>
                        <textarea name="description" id="description" rows="4" class="block w-full px-4 py-2 mt-1 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"></textarea>
                    </div>
                    <!-- Product Image -->
                    <div class="mt-4">
                        <label for="image" class="block text-sm font-medium text-gray-700">Product Image</label>
                        <input type="file" name="image" id="image" class="block w-full px-4 py-2 mt-1 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <!-- Submit Button -->
                    <div class="mt-6 text-center">
                        <button type="submit" class="px-6 py-2 font-semibold text-white bg-green-500 rounded-md hover:bg-green-600 focus:ring-2 focus:ring-green-400 focus:ring-offset-2">
                            Add Product
                        </button>
                    </div>
                </form>
            </section>
        </main>
        
    </div>

    <!-- Fixed Footer Section -->
    <footer class="fixed bottom-0 left-0 w-full py-4 text-center text-white bg-green-700">
        <p>&copy; 2024 Food Cycle. All rights reserved.</p>
    </footer>
    
    <!-- Custom JavaScript -->
    <script src="<?php echo e(asset('panel/js/script.js')); ?>"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const expiryDaysInput = document.querySelector('#expiry_days');
            const expiryHoursInput = document.querySelector('#expiry_hours');

            expiryDaysInput.addEventListener('input', function() {
                const days = parseInt(this.value) || 0;
                const totalHours = days * 24;
                expiryHoursInput.value = totalHours;
            });

            function startCountdown(hours) {
                let countdownHours = hours;
                const interval = setInterval(() => {
                    if (countdownHours > 0) {
                        countdownHours--;
                        expiryHoursInput.value = countdownHours;
                    } else {
                        clearInterval(interval);
                        alert('Product has expired!');
                    }
                }, 3600000); // 3600000 ms = 1 hour
            }

            // Initialize countdown if there's an initial value
            if (expiryHoursInput.value > 0) {
                startCountdown(parseInt(expiryHoursInput.value));
            }
        });
    </script>
</body>

</html>
<?php /**PATH C:\Users\savin\Desktop\foodcycle\resources\views/admin/addproduct.blade.php ENDPATH**/ ?>