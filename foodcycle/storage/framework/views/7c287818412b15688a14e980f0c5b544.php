<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Consultants</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<body class="bg-gray-50 font-sans leading-relaxed">

    <!-- Header Section -->
    <header class="w-full bg-green-600 text-white py-12">
        <div class="container mx-auto text-center">
            <h1 class="text-4xl font-extrabold">Become a Consultant</h1>
            <p class="mt-3 text-lg">Join us and make a difference by offering your expertise!</p>
        </div>
    </header>

    <!-- About Section -->
    <section class="container mx-auto mt-16 px-6">
        <div class="bg-white shadow-md rounded-xl p-10 text-center">
            <div class="flex items-center justify-center mb-6">
                <i class="fas fa-user-tie text-green-600 text-5xl mr-4"></i>
                <h2 class="text-3xl font-bold text-gray-800">Who Are Consultants?</h2>
            </div>
            <p class="text-gray-600 text-lg leading-relaxed">
                Consultants are professionals who offer expert advice in various fields. Whether it's agriculture, technology, business, or sustainability, our consultants provide valuable guidance to help clients solve problems, improve processes, and achieve their goals.
            </p>
        </div>
    </section>

    <!-- Skills Section -->
    <section class="container mx-auto mt-16 px-6">
        <div class="bg-white shadow-md rounded-xl p-10 text-center">
            <div class="flex items-center justify-center mb-6">
                <i class="fas fa-cogs text-green-600 text-5xl mr-4"></i>
                <h2 class="text-3xl font-bold text-gray-800">What Skills Do Our Consultants Have?</h2>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-8 mt-8">
                <!-- Skill Item -->
                <div class="flex items-center">
                    <i class="fas fa-check-circle text-green-600 text-3xl mr-4"></i>
                    <p class="text-gray-600 text-lg">
                        <span class="font-semibold">Feasibility Consulting:</span> Helping clients assess the viability of projects and ideas.
                    </p>
                </div>
                <!-- Skill Item -->
                <div class="flex items-center">
                    <i class="fas fa-check-circle text-green-600 text-3xl mr-4"></i>
                    <p class="text-gray-600 text-lg">
                        <span class="font-semibold">Farm Designing:</span> Providing expert advice on efficient and sustainable farm layouts.
                    </p>
                </div>
                <!-- Skill Item -->
                <div class="flex items-center">
                    <i class="fas fa-check-circle text-green-600 text-3xl mr-4"></i>
                    <p class="text-gray-600 text-lg">
                        <span class="font-semibold">Transport and Storage Solutions:</span> Guiding clients on effective supply chain management.
                    </p>
                </div>
                <!-- Skill Item -->
                <div class="flex items-center">
                    <i class="fas fa-check-circle text-green-600 text-3xl mr-4"></i>
                    <p class="text-gray-600 text-lg">
                        <span class="font-semibold">Business Strategy:</span> Assisting clients with long-term planning and growth strategies.
                    </p>
                </div>
                <!-- Skill Item -->
                <div class="flex items-center">
                    <i class="fas fa-check-circle text-green-600 text-3xl mr-4"></i>
                    <p class="text-gray-600 text-lg">
                        <span class="font-semibold">Education and Workshops:</span> Delivering training programs and workshops to share knowledge and skills.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section class="container mx-auto mt-16 px-6 text-center">
        <div class="bg-green-100 shadow-md rounded-xl p-10">
            <div class="flex flex-col items-center">
                <i class="fas fa-bullhorn text-green-600 text-5xl mb-6"></i>
                <h2 class="text-3xl font-bold text-green-700 mb-4">Ready to Become a Consultant?</h2>
                <p class="text-gray-700 text-lg mb-8">
                    If you have the expertise and the passion to guide others, join us as a consultant and start making an impact today.
                </p>
                <a href="<?php echo e(route('consultant.loginForm')); ?>" class="px-10 py-4 bg-green-600 text-white rounded-lg hover:bg-green-700 text-lg font-medium">
                    Register as a Consultant
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="w-full bg-gray-800 text-white py-6 mt-16">
        <div class="container mx-auto text-center">
            <p>&copy; 2025 Your Company Name. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>
<?php /**PATH C:\Users\savin\Desktop\foodcycle\resources\views/consultant/public-info.blade.php ENDPATH**/ ?>