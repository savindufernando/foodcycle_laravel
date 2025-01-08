<?php echo $__env->make('teacher.layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- Main Content -->
<main class="flex-1 p-6 ml-64 overflow-y-auto">
    
    <!-- Header Section -->
    <div class="flex items-center justify-between">
        <h1 class="text-2xl font-bold">Admin Management</h1>
        <button id="openModal" class="px-4 py-2 text-white bg-green-600 rounded hover:bg-green-700">Add Admin</button>
    </div>

    <!-- Modal Structure -->
    <div id="teacherModal" class="fixed inset-0 flex items-center justify-center hidden bg-gray-900 bg-opacity-50">
        <div class="w-1/3 p-6 bg-white rounded shadow-lg">
            <h2 class="mb-4 text-xl font-bold text-gray-800">Add Admin</h2>

            <!-- Add Admin Form -->
            <form id="addTeacherForm" action="<?php echo e(route('teacher.accounts.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="mb-4">
                    <label for="name" class="block mb-1 font-medium text-gray-700">Name</label>
                    <input type="text" id="name" name="name" class="w-full px-4 py-2 border rounded focus:ring focus:ring-green-300 focus:outline-none" required>
                </div>

                <div class="mb-4">
                    <label for="email" class="block mb-1 font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email" class="w-full px-4 py-2 border rounded focus:ring focus:ring-green-300 focus:outline-none" required>
                </div>

                <div class="mb-4">
                    <label for="password" class="block mb-1 font-medium text-gray-700">Password</label>
                    <input type="password" id="password" name="password" class="w-full px-4 py-2 border rounded focus:ring focus:ring-green-300 focus:outline-none" required>
                </div>

                <div class="mb-4">
                    <label for="password_confirmation" class="block mb-1 font-medium text-gray-700">Re-password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="w-full px-4 py-2 border rounded focus:ring focus:ring-green-300 focus:outline-none" required>
                </div>

                <div class="flex justify-between">
                    <button type="submit" class="px-4 py-2 text-white bg-blue-600 rounded hover:bg-blue-700">Add Admin</button>
                    <button type="button" id="closeModal" class="px-4 py-2 text-white bg-red-600 rounded hover:bg-red-700">Cancel</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Admin List Table -->
    <div class="mt-6 overflow-hidden bg-white rounded shadow-lg">
        <table class="w-full text-left border-collapse">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 border">Name</th>
                    <th class="px-4 py-2 border">Email</th>
                    <th class="px-4 py-2 border">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teacher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 border"><?php echo e($teacher->name); ?></td>
                        <td class="px-4 py-2 border"><?php echo e($teacher->email); ?></td>
                        <td class="px-4 py-2 border">
                            <!-- Delete Button -->
                            <form action="<?php echo e(route('teacher.accounts.destroy', $teacher->id)); ?>" method="POST" style="display: inline-block;">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="px-4 py-2 text-white bg-red-600 rounded hover:bg-red-700">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</main>

<!-- Footer Section -->
<footer class="fixed bottom-0 left-0 w-full py-4 text-center text-white bg-green-700">
    <p>&copy; 2024 Food Cycle. All rights reserved.</p>
</footer>

<!-- Custom JavaScript -->
<script src="<?php echo e(asset('panel/js/script.js')); ?>"></script>

<script>
// Open the modal when the 'Add Teacher' button is clicked
document.getElementById('openModal').addEventListener('click', function() {
    document.getElementById('teacherModal').classList.remove('hidden');
});

// Close the modal when the 'Cancel' button is clicked
document.getElementById('closeModal').addEventListener('click', function() {
    document.getElementById('teacherModal').classList.add('hidden');
});

// Optionally, you can add the form submission handling if needed for AJAX
document.getElementById('addTeacherForm').addEventListener('submit', function(e) {
    e.preventDefault(); // Prevent the default form submission
    var form = e.target;

    // Make a POST request to store the teacher
    fetch(form.action, {
        method: 'POST',
        body: new FormData(form),
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Reload the page to reflect changes
            window.location.reload();
        } else {
            alert('There was an error adding the teacher.');
        }
    })
    .catch(error => console.error('Error:', error));
});
</script>

</body>
</html>
<?php /**PATH C:\Users\savin\Desktop\foodcycle\resources\views/teacher/accounts/index.blade.php ENDPATH**/ ?>