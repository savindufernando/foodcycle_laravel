<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogger Sign-Up</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
</head>
<body class="bg-gray-100">
    <!-- Header Section -->
    <?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="flex items-center justify-center min-h-screen pt-6">
        <!-- Sign-Up Form Card -->
        <div class="w-full max-w-3xl p-8 bg-white rounded-lg shadow-md">
            <!-- Back to Sign-In Option -->
            <div class="text-right">
                <p class="text-gray-700">
                    Already have an account?
                    <a href="<?php echo e(route('blogger.login')); ?>" class="font-medium text-green-500 hover:text-green-700">
                        Log in
                    </a>
                </p>
            </div>
            <h2 class="mb-6 text-3xl font-bold text-center text-gray-800">Blogger Sign-Up</h2>

            <form method="POST" action="<?php echo e(route('blogger.signup')); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>

                <!-- Validation Errors -->
                <?php if($errors->any()): ?>
                    <div class="mb-4">
                        <ul class="list-disc list-inside text-red-600">
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <!-- Personal Information -->
                <h3 class="mb-4 text-xl font-bold text-gray-700">1. Personal Information</h3>
                <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                    <div>
                        <label for="name" class="block mb-2 font-medium text-gray-700">Full Name</label>
                        <input id="name" name="name" type="text" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-teal-500">
                    </div>
                    <div>
                        <label for="email" class="block mb-2 font-medium text-gray-700">Email Address</label>
                        <input id="email" name="email" type="email" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-teal-500">
                    </div>
                    <div>
                        <label for="address" class="block mb-2 font-medium text-gray-700">Address</label>
                        <input id="address" name="address" type="text" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-teal-500">
                    </div>
                    <div>
                        <label for="job_title" class="block mb-2 font-medium text-gray-700">Job Title</label>
                        <input id="job_title" name="job_title" type="text" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-teal-500">
                    </div>
                    <div>
                        <label for="location" class="block mb-2 font-medium text-gray-700">Location</label>
                        <input id="location" name="location" type="text" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-teal-500">
                    </div>
                </div>

                <!-- Profile Picture -->
                <h3 class="mt-8 mb-4 text-xl font-bold text-gray-700">2. Profile Picture</h3>
                <div>
                    <label for="profile_pic" class="block mb-2 font-medium text-gray-700">Upload Profile Picture</label>
                    <input id="profile_pic" name="profile_pic" type="file" accept=".jpg,.png"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-teal-500">
                </div>

                <!-- Biography -->
                <h3 class="mt-8 mb-4 text-xl font-bold text-gray-700">3. Biography</h3>
                <div>
                    <label for="description" class="block mb-2 font-medium text-gray-700">Short Bio</label>
                    <textarea id="description" name="description" rows="3" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-teal-500"></textarea>
                </div>

                <!-- Password Setup -->
                <h3 class="mt-8 mb-4 text-xl font-bold text-gray-700">4. Password Setup</h3>
                <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                    <div>
                        <label for="password" class="block mb-2 font-medium text-gray-700">Password</label>
                        <input id="password" name="password" type="password" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-teal-500">
                    </div>
                    <div>
                        <label for="password_confirmation" class="block mb-2 font-medium text-gray-700">Confirm Password</label>
                        <input id="password_confirmation" name="password_confirmation" type="password" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-teal-500">
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="mt-8">
                    <button type="submit"
                        class="w-full px-4 py-2 font-medium text-white bg-green-500 rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-opacity-50">
                        Register
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Footer Section -->
    <div class="mt-10">
        <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</body>
</html>
<?php /**PATH C:\Users\savin\Desktop\foodcycle\resources\views/blogger/signup.blade.php ENDPATH**/ ?>