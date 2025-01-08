<?php echo $__env->make('admin.layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="container mx-auto p-8">
    <h1 class="mb-6 text-3xl font-bold text-center">Edit Product</h1>

    <?php if(session('success')): ?>
        <div class="mb-4 text-green-600"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <form action="<?php echo e(route('admin.updateproduct', $product->id)); ?>" method="POST" enctype="multipart/form-data" class="bg-white p-8 rounded-lg shadow-md max-w-4xl mx-auto">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <!-- Product Name -->
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Product Name</label>
            <input type="text" name="name" id="name" value="<?php echo e(old('name', $product->name)); ?>" class="block w-full px-4 py-2 mt-1 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" required>
        </div>

        <!-- Product Category -->
        <div class="mb-4">
            <label for="category" class="block text-sm font-medium text-gray-700">Product Category</label>
            <select name="category" id="category" class="block w-full px-4 py-2 mt-1 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                <option value="human" <?php echo e(old('category', $product->category) == 'human' ? 'selected' : ''); ?>>Human Food</option>
                <option value="animal" <?php echo e(old('category', $product->category) == 'animal' ? 'selected' : ''); ?>>Animal Food</option>
                <option value="fertilizer" <?php echo e(old('category', $product->category) == 'fertilizer' ? 'selected' : ''); ?>>Fertilizer</option>
            </select>
        </div>

        <!-- Product Price -->
        <div class="mb-4">
            <label for="price" class="block text-sm font-medium text-gray-700">Product Price</label>
            <input type="number" name="price" id="price" value="<?php echo e(old('price', $product->price)); ?>" min="1" class="block w-full px-4 py-2 mt-1 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" required>
        </div>

        <!-- Product Stock -->
        <div class="mb-4">
            <label for="stock" class="block text-sm font-medium text-gray-700">Product Stock</label>
            <input type="number" name="stock" id="stock" value="<?php echo e(old('stock', $product->stock)); ?>" min="1" class="block w-full px-4 py-2 mt-1 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" required>
        </div>

 <!-- Expiry Hours -->
<div class="mb-4">
    <label for="expiry_hours" class="block text-sm font-medium text-gray-700">Expiry Hours</label>
    <input type="number" step="0.01" name="expiry_hours" id="expiry_hours" value="<?php echo e(old('expiry_hours', $product->expiry_hours)); ?>" min="0" class="block w-full px-4 py-2 mt-1 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" required>
    <span id="error-message" class="text-red-500 text-sm hidden">Minutes must be between 0 and 59!</span>
</div>

<script>
    document.getElementById('expiry_hours').addEventListener('input', function () {
        const value = parseFloat(this.value);
        if (!isNaN(value)) {
            const fractionalPart = value % 1; // Get fractional part (e.g., .59)
            const minutes = Math.round(fractionalPart * 100); // Convert fractional part to minutes

            if (minutes >= 60) {
                document.getElementById('error-message').classList.remove('hidden');
            } else {
                document.getElementById('error-message').classList.add('hidden');
            }
        }
    });
</script>



        <!-- Product Description -->
        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">Product Description</label>
            <textarea name="description" id="description" rows="4" class="block w-full px-4 py-2 mt-1 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"><?php echo e(old('description', $product->description)); ?></textarea>
        </div>

        <!-- Product Image -->
        <div class="mb-4">
            <label for="image" class="block text-sm font-medium text-gray-700">Product Image</label>
            <input type="file" name="image" id="image" class="block w-full px-4 py-2 mt-1 border border-gray-300 rounded-md">
            <?php if($product->image): ?>
                <img src="<?php echo e(asset('storage/' . $product->image)); ?>" alt="<?php echo e($product->name); ?>" class="w-32 mt-4">
            <?php endif; ?>
        </div>

        <!-- Submit Button -->
        <div class="mt-6 text-center">
            <button type="submit" class="px-6 py-2 font-semibold text-white bg-green-500 rounded-md hover:bg-green-600 focus:ring-2 focus:ring-green-400 focus:ring-offset-2">
                Update Product
            </button>
        </div>
    </form>
</div>
<?php /**PATH C:\Users\savin\Desktop\foodcycle\resources\views/admin/editproduct.blade.php ENDPATH**/ ?>