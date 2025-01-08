<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Services & Request Form</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white-100">
<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Services Section -->
    <div class="relative bg-cover bg-center h-96" style="background-image: url('<?php echo e(asset('panel/image/cons.png')); ?>');">
    </div>

    <div class="container mx-auto mt-10 p-8">
        <p class="text-center text-lg text-gray-700 leading-relaxed">
            Supporting a wide range of <span class="text-green-600 font-semibold">clients</span>, our team of interdisciplinary experts is equipped to provide both technical and marketing solutions. These include:
        </p>
        <!-- List of Services --> 
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10 mt-16">
            <div class="flex items-center space-x-6 p-8 bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow">
                <img src="<?php echo e(asset('panel/image/Feasibility.jpg')); ?>" alt="Feasibility Icon" class="w-20 h-20 object-cover">
                <div>
                    <h3 class="text-2xl font-bold text-green-600 mb-2">Feasibility</h3>
                    <p class="text-gray-600">Assessing the practicality and potential of your projects.</p>
                </div>
            </div>

            <div class="flex items-center space-x-6 p-8 bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow">
                <img src="<?php echo e(asset('panel/image/farmdesign.jpg')); ?>" alt="Farm Designs Icon" class="w-20 h-20 object-cover">
                <div>
                    <h3 class="text-2xl font-bold text-green-600 mb-2">Farm Designs</h3>
                    <p class="text-gray-600">Providing expert advice on efficient and sustainable farm layouts.</p>
                </div>
            </div>

            <div class="flex items-center space-x-6 p-8 bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow">
                <img src="<?php echo e(asset('panel/image/local.webp')); ?>" alt="Local Food Planning Icon" class="w-20 h-20 object-cover">
                <div>
                    <h3 class="text-2xl font-bold text-green-600 mb-2">Local Food Planning</h3>
                    <p class="text-gray-600">Helping develop local food systems and supply chains.</p>
                </div>
            </div>

            <div class="flex items-center space-x-6 p-8 bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow">
                <img src="<?php echo e(asset('panel/image/due.jpg')); ?>" alt="Due Diligence Icon" class="w-20 h-20 object-cover">
                <div>
                    <h3 class="text-2xl font-bold text-green-600 mb-2">Due Diligence</h3>
                    <p class="text-gray-600">Conducting evaluations for potential investments or projects.</p>
                </div>
            </div>

            <div class="flex items-center space-x-6 p-8 bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow">
                <img src="<?php echo e(asset('panel/image/sus.webp')); ?>" alt="Sustainability Consulting Icon" class="w-20 h-20 object-cover">
                <div>
                    <h3 class="text-2xl font-bold text-green-600 mb-2">Sustainability and Environmental Consulting</h3>
                    <p class="text-gray-600">Promoting sustainable practices to reduce environmental impact.</p>
                </div>
            </div>

            <div class="flex items-center space-x-6 p-8 bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow">
                <img src="<?php echo e(asset('panel/image/agr.webp')); ?>" alt="AgriTech Implementation Icon" class="w-20 h-20 object-cover">
                <div>
                    <h3 class="text-2xl font-bold text-green-600 mb-2">Agricultural Technology Implementation</h3>
                    <p class="text-gray-600">Integrating technology to enhance agricultural productivity.</p>
                </div>
            </div>

            <div class="flex items-center space-x-6 p-8 bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow">
                <img src="<?php echo e(asset('panel/image/pr.webp')); ?>" alt="Project Management Icon" class="w-20 h-20 object-cover">
                <div>
                    <h3 class="text-2xl font-bold text-green-600 mb-2">Project Management</h3>
                    <p class="text-gray-600">Managing projects from inception to successful completion.</p>
                </div>
            </div>

            <div class="flex items-center space-x-6 p-8 bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow">
                <img src="<?php echo e(asset('panel/image/ed.webp')); ?>" alt="Education & Workshops Icon" class="w-20 h-20 object-cover">
                <div>
                    <h3 class="text-2xl font-bold text-green-600 mb-2">Education and Workshops</h3>
                    <p class="text-gray-600">Delivering training programs to share knowledge and skills.</p>
                </div>
            </div>
        </div>


    </div>

    <!-- Request Form Section -->
    <div class="container mx-auto mt-16 p-8 bg-white shadow-lg rounded-xl max-w-4xl">
        <h2 class="text-3xl font-bold mb-6 text-center">Getting To Know You</h2>
        <p class="text-center text-gray-600 mb-8">Help us get to know you better by telling us more about you and providing us with the best way to reach you. We respect your privacy.</p>

        <!-- Form Starts -->
        <form action="<?php echo e(route('services.store')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>

            <!-- Step 1: Personal Information -->
            <div class="mb-4">
                <label for="first_name" class="block font-medium mb-1">First Name</label>
                <input type="text" id="first_name" name="first_name" placeholder="Enter your first name" value="<?php echo e(old('first_name')); ?>"
                    class="w-full border border-gray-300 px-3 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label for="last_name" class="block font-medium mb-1">Last Name</label>
                <input type="text" id="last_name" name="last_name" placeholder="Enter your last name" value="<?php echo e(old('last_name')); ?>"
                    class="w-full border border-gray-300 px-3 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label for="email" class="block font-medium mb-1">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" value="<?php echo e(old('email')); ?>"
                    class="w-full border border-gray-300 px-3 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label for="phone_number" class="block font-medium mb-1">Phone Number</label>
                <input type="text" id="phone_number" name="phone_number" placeholder="Enter your phone number" value="<?php echo e(old('phone_number')); ?>"
                    class="w-full border border-gray-300 px-3 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label for="city" class="block font-medium mb-1">City</label>
                <input type="text" id="city" name="city" placeholder="Enter your city" value="<?php echo e(old('city')); ?>"
                    class="w-full border border-gray-300 px-3 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label for="state" class="block font-medium mb-1">State</label>
                <input type="text" id="state" name="state" placeholder="Enter your state" value="<?php echo e(old('state')); ?>"
                    class="w-full border border-gray-300 px-3 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label for="country" class="block font-medium mb-1">Country</label>
                <input type="text" id="country" name="country" placeholder="Enter your country" value="<?php echo e(old('country')); ?>"
                    class="w-full border border-gray-300 px-3 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label for="company_name" class="block font-medium mb-1">Company Name</label>
                <input type="text" id="company_name" name="company_name" placeholder="Enter your company name" value="<?php echo e(old('company_name')); ?>"
                    class="w-full border border-gray-300 px-3 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label for="company_description" class="block font-medium mb-1">Company Description</label>
                <textarea id="company_description" name="company_description" placeholder="Describe your company"
                    class="w-full border border-gray-300 px-3 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"><?php echo e(old('company_description')); ?></textarea>
            </div>

            <div class="mb-4">
                <label for="heard_about_us" class="block font-medium mb-1">How Did You Hear About Us?</label>
                <input type="text" id="heard_about_us" name="heard_about_us" placeholder="e.g., Social Media, Friend" value="<?php echo e(old('heard_about_us')); ?>"
                    class="w-full border border-gray-300 px-3 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Services of Interest -->
<div class="mb-4">
    <h2 class="font-medium mb-4 text-xl">Services of Interest</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <div>
            <label><input type="checkbox" name="services_of_interest[]" value="Feasibility" <?php echo e(in_array('Feasibility', old('services_of_interest', [])) ? 'checked' : ''); ?>> Feasibility</label>
        </div>
        <div>
            <label><input type="checkbox" name="services_of_interest[]" value="Farm Designs" <?php echo e(in_array('Farm Designs', old('services_of_interest', [])) ? 'checked' : ''); ?>> Farm Designs</label>
        </div>
        <div>
            <label><input type="checkbox" name="services_of_interest[]" value="Local Food Planning" <?php echo e(in_array('Local Food Planning', old('services_of_interest', [])) ? 'checked' : ''); ?>> Local Food Planning</label>
        </div>
        <div>
            <label><input type="checkbox" name="services_of_interest[]" value="Due Diligence" <?php echo e(in_array('Due Diligence', old('services_of_interest', [])) ? 'checked' : ''); ?>> Due Diligence</label>
        </div>
        <div>
            <label><input type="checkbox" name="services_of_interest[]" value="Sustainability and Environmental Consulting" <?php echo e(in_array('Sustainability and Environmental Consulting', old('services_of_interest', [])) ? 'checked' : ''); ?>> Sustainability and Environmental Consulting</label>
        </div>
        <div>
            <label><input type="checkbox" name="services_of_interest[]" value="Agricultural Technology Implementation" <?php echo e(in_array('Agricultural Technology Implementation', old('services_of_interest', [])) ? 'checked' : ''); ?>> Agricultural Technology Implementation</label>
        </div>
        <div>
            <label><input type="checkbox" name="services_of_interest[]" value="Project Management" <?php echo e(in_array('Project Management', old('services_of_interest', [])) ? 'checked' : ''); ?>> Project Management</label>
        </div>
        <div>
            <label><input type="checkbox" name="services_of_interest[]" value="Education and Workshops" <?php echo e(in_array('Education and Workshops', old('services_of_interest', [])) ? 'checked' : ''); ?>> Education and Workshops</label>
        </div>
    </div>
</div>


            <div class="mb-4">
                <label for="project_location" class="block font-medium mb-1">Project Location</label>
                <input type="text" id="project_location" name="project_location" placeholder="Enter project location" value="<?php echo e(old('project_location')); ?>"
                    class="w-full border border-gray-300 px-3 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label for="project_start_date" class="block font-medium mb-1">Project Start Date</label>
                <input type="date" id="project_start_date" name="project_start_date" value="<?php echo e(old('project_start_date')); ?>"
                    class="w-full border border-gray-300 px-3 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label for="project_description" class="block font-medium mb-1">Project Description</label>
                <textarea id="project_description" name="project_description" placeholder="Describe your project"
                    class="w-full border border-gray-300 px-3 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"><?php echo e(old('project_description')); ?></textarea>
            </div>

            <div class="mb-4">
                <label for="uploaded_file" class="block font-medium mb-1">Upload File (optional)</label>
                <input type="file" id="uploaded_file" name="uploaded_file" class="w-full border border-gray-300 px-3 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 focus:outline-none">Submit Request</button>
            </div>
        </form>
    </div><br>
    <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html>
<?php /**PATH C:\Users\savin\Desktop\foodcycle\resources\views/services/index.blade.php ENDPATH**/ ?>