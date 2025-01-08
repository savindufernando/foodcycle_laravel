<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subscribe to Our Newsletter</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }
    </style>
</head>
<body class="bg-white-100">

    <!-- Include header -->
    <?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <br>

    <!-- Newsletter Section -->
    <div class="min-h-screen flex items-center justify-center">
        <div class="container mx-auto px-6 py-12 bg-white shadow-lg rounded-lg max-w-lg">
            <!-- Newsletter Image -->
            <img src="<?php echo e(asset('panel/image/newsletter.png')); ?>" alt="Newsletter Icon" class="w-auto mx-auto mb-6">

            <!-- Title -->
            <h1 class="text-2xl font-bold mb-4 text-center">Subscribe To Our Newsletter</h1>

            <!-- Description -->
            <p class="text-gray-600 text-sm leading-relaxed mb-6 text-center">
                FoodCycle Consulting is committed to protecting and respecting your privacy. We’ll only use your personal information to administer your account and provide the products and services you requested. From time to time, we would like to contact you about our products and services, as well as other content that may be of interest to you. Please tick below if you consent to us contacting you for this purpose.
            </p>

            <!-- Form -->
            <form action="<?php echo e(route('newsletter.subscribe')); ?>" method="POST" class="space-y-4">
                <?php echo csrf_field(); ?>

                <!-- Email input -->
                <div>
                    <input type="email" id="email" name="email" placeholder="Enter your email" value="<?php echo e(old('email')); ?>" required 
                        class="w-full border border-gray-300 rounded-md p-3 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                    <!-- Error message for email -->
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="text-red-600 text-sm mt-1"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <!-- Consent checkbox -->
                <div class="flex items-start space-x-2">
                    <input type="checkbox" name="consent" id="consent" <?php echo e(old('consent') ? 'checked' : ''); ?> required 
                        class="mt-1 border-gray-300 rounded text-blue-500 focus:ring-blue-500 <?php $__errorArgs = ['consent'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                    <label for="consent" class="text-sm text-gray-700">
                        I agree to receive communications from Agritecture.
                    </label>
                </div>
                <!-- Error message for consent -->
                <?php $__errorArgs = ['consent'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="text-red-600 text-sm mt-1"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                <!-- Privacy notice -->
                <p class="text-xs text-gray-500">
                    You may unsubscribe from these communications at any time. For more information, please review our Privacy Policy.
                </p>

                <!-- Submit button -->
                <button type="submit" 
                    class="w-full bg-blue-500 text-white py-2 px-4 rounded-md font-medium hover:bg-blue-600 transition">
                    Subscribe
                </button>

                <!-- Success or error message display -->
                <div class="message mt-4">
                    <?php if(session('success')): ?>
                        <p class="text-green-600 text-sm"><?php echo e(session('success')); ?></p>
                    <?php endif; ?>

                    <?php if(session('error')): ?>
                        <p class="text-red-600 text-sm"><?php echo e(session('error')); ?></p>
                    <?php endif; ?>
                </div>
            </form>
        </div>
    </div>
    <br>

    <!-- Include footer -->
    <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</body>
</html>
<?php /**PATH C:\Users\savin\Desktop\foodcycle\resources\views/newsletter.blade.php ENDPATH**/ ?>