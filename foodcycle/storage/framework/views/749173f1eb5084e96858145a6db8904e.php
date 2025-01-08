<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultant Registration</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<body class="bg-white-100">
    <!-- Register Link -->
    <p class="mt-6 text-center text-gray-600">
    Already have an account? 
                <a href="<?php echo e(route('consultant.loginForm')); ?>" class="text-green-600 hover:underline">Log in</a>
            </p>
    <div class="container mx-auto mt-10 p-8 bg-white shadow-lg rounded-xl max-w-4xl">
            <!-- Back Button -->
            <div class="container mx-auto mt-6 px-6 flex items-center justify-between">
                <!-- Centered Heading -->
                <h1 class="text-2xl font-bold text-center w-full">Register as a Consultant</h1>
                
                <!-- Back Button aligned to the right -->
                <a href="javascript:history.back()" class="inline-flex items-center px-4 py-2 bg-blue-200 text-gray-700 rounded-lg shadow hover:bg-blue-300 hover:text-gray-900 ml-auto">
                    <i class="fas fa-arrow-left mr-2"></i> Back
                </a>
            </div>


        <form action="<?php echo e(route('consultant.register')); ?>" method="POST" id="registration-form" class="space-y-6">
            <?php echo csrf_field(); ?>

            <!-- Display global error message -->
            <?php if($errors->any()): ?>
                <div class="mb-6 p-4 bg-red-100 text-red-700 rounded">
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>

            <!-- Step 1: Personal Information -->
            <div id="step-1" class="step">
                <h2 class="text-xl font-semibold mb-4">Step 1: Personal Information</h2>

                <div class="mb-4">
                    <label for="name" class="block font-medium mb-1">Name</label>
                    <input type="text" id="name" name="name" value="<?php echo e(old('name')); ?>" placeholder="Enter your name" 
                        class="w-full border border-gray-300 px-3 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="text-red-500 text-sm"><?php echo e($message); ?></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="mb-4">
                    <label for="address" class="block font-medium mb-1">Address</label>
                    <input type="text" id="address" name="address" value="<?php echo e(old('address')); ?>" placeholder="Enter your address" 
                        class="w-full border border-gray-300 px-3 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="text-red-500 text-sm"><?php echo e($message); ?></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="mb-4">
                    <label for="education" class="block font-medium mb-1">Education Qualifications</label>
                    <input type="text" id="education" name="education" value="<?php echo e(old('education')); ?>" placeholder="Enter your education" 
                        class="w-full border border-gray-300 px-3 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <?php $__errorArgs = ['education'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="text-red-500 text-sm"><?php echo e($message); ?></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="mb-4">
                    <label for="qualifications" class="block font-medium mb-1">Professional Qualifications</label>
                    <input type="text" id="qualifications" name="qualifications" value="<?php echo e(old('qualifications')); ?>" placeholder="Enter your qualifications" 
                        class="w-full border border-gray-300 px-3 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <?php $__errorArgs = ['qualifications'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="text-red-500 text-sm"><?php echo e($message); ?></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="mb-4">
                    <label for="province" class="block font-medium mb-1">Province</label>
                    <select id="province" name="province" 
                        class="w-full border border-gray-300 px-3 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="" disabled selected>Select your province</option>
                        <option value="Central" <?php echo e(old('province') == 'Central' ? 'selected' : ''); ?>>Central</option>
                        <option value="Eastern" <?php echo e(old('province') == 'Eastern' ? 'selected' : ''); ?>>Eastern</option>
                        <option value="North Central" <?php echo e(old('province') == 'North Central' ? 'selected' : ''); ?>>North Central</option>
                        <option value="Northern" <?php echo e(old('province') == 'Northern' ? 'selected' : ''); ?>>Northern</option>
                        <option value="North Western" <?php echo e(old('province') == 'North Western' ? 'selected' : ''); ?>>North Western</option>
                        <option value="Sabaragamuwa" <?php echo e(old('province') == 'Sabaragamuwa' ? 'selected' : ''); ?>>Sabaragamuwa</option>
                        <option value="Southern" <?php echo e(old('province') == 'Southern' ? 'selected' : ''); ?>>Southern</option>
                        <option value="Uva" <?php echo e(old('province') == 'Uva' ? 'selected' : ''); ?>>Uva</option>
                        <option value="Western" <?php echo e(old('province') == 'Western' ? 'selected' : ''); ?>>Western</option>
                    </select>
                    <?php $__errorArgs = ['province'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="text-red-500 text-sm"><?php echo e($message); ?></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="mb-4">
                    <label for="contact_no" class="block font-medium mb-1">Contact Number</label>
                    <input type="text" id="contact_no" name="contact_no" value="<?php echo e(old('contact_no')); ?>" placeholder="Enter your contact number" 
                        class="w-full border border-gray-300 px-3 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <?php $__errorArgs = ['contact_no'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="text-red-500 text-sm"><?php echo e($message); ?></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="mb-4">
                    <label for="email" class="block font-medium mb-1">Email</label>
                    <input type="email" id="email" name="email" value="<?php echo e(old('email')); ?>" placeholder="Enter your email" 
                        class="w-full border border-gray-300 px-3 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="text-red-500 text-sm"><?php echo e($message); ?></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="mb-4">
                    <label for="password" class="block font-medium mb-1">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password" 
                        class="w-full border border-gray-300 px-3 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="text-red-500 text-sm"><?php echo e($message); ?></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="mb-4">
                    <label for="password_confirmation" class="block font-medium mb-1">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm your password" 
                        class="w-full border border-gray-300 px-3 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div class="flex justify-end">
                    <button type="button" id="next-to-step-2" 
                        class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none">Next</button>
                </div>
            </div>

            <!-- Step 2: Skills Selection -->
            <div id="step-2" class="step hidden">
                <h2 class="text-xl font-semibold mb-4">Step 2: Select Your Skills</h2>

                <div class="space-y-6">
                <!-- Feasibility -->
                <div>
                    <label class="inline-flex items-center">
                        <input type="checkbox" name="skills[]" value="Feasibility" class="main-skill form-checkbox" data-target="feasibility-sub-skills">
                        <span class="ml-2 font-semibold">Feasibility</span>
                    </label>
                    <div id="feasibility-sub-skills" class="ml-6 mt-2 sub-skills space-y-2 hidden">
                        <label class="block"><input type="checkbox" name="sub_skills[]" value="Economic" class="form-checkbox"> Economic</label>
                        <label class="block"><input type="checkbox" name="sub_skills[]" value="Operational" class="form-checkbox"> Operational</label>
                        <label class="block"><input type="checkbox" name="sub_skills[]" value="Technical" class="form-checkbox"> Technical</label>
                        <label class="block"><input type="checkbox" name="sub_skills[]" value="Financial" class="form-checkbox"> Financial</label>
                        <label class="block"><input type="checkbox" name="sub_skills[]" value="Market Analysis" class="form-checkbox"> Market Analysis</label>
                        <label class="block"><input type="checkbox" name="sub_skills[]" value="Regulatory Compliance" class="form-checkbox"> Regulatory Compliance</label>
                    </div>
                </div>

                <!-- Farm Designs -->
                <div>
                    <label class="inline-flex items-center">
                        <input type="checkbox" name="skills[]" value="Farm Designs" class="main-skill form-checkbox" data-target="farm-designs-sub-skills">
                        <span class="ml-2 font-semibold">Farm Designs</span>
                    </label>
                    <div id="farm-designs-sub-skills" class="ml-6 mt-2 sub-skills space-y-2 hidden">
                        <label class="block"><input type="checkbox" name="sub_skills[]" value="Paddy field systems" class="form-checkbox"> Paddy field systems</label>
                        <label class="block"><input type="checkbox" name="sub_skills[]" value="Chena cultivation" class="form-checkbox"> Chena cultivation</label>
                        <label class="block"><input type="checkbox" name="sub_skills[]" value="Kandyan forest garden" class="form-checkbox"> Kandyan forest garden</label>
                        <label class="block"><input type="checkbox" name="sub_skills[]" value="Tank cascade systems" class="form-checkbox"> Tank cascade systems</label>
                        <label class="block"><input type="checkbox" name="sub_skills[]" value="Home gardens" class="form-checkbox"> Home gardens</label>
                        <label class="block"><input type="checkbox" name="sub_skills[]" value="Plantation agriculture" class="form-checkbox"> Plantation agriculture</label>
                    </div>
                </div>

                <!-- Local Food Planning -->
                <div>
                    <label class="inline-flex items-center">
                        <input type="checkbox" name="skills[]" value="Local Food Planning" class="main-skill form-checkbox" data-target="local-food-sub-skills">
                        <span class="ml-2 font-semibold">Local Food Planning</span>
                    </label>
                    <div id="local-food-sub-skills" class="ml-6 mt-2 sub-skills space-y-2 hidden">
                        <label class="block"><input type="checkbox" name="sub_skills[]" value="Local food network design" class="form-checkbox"> Local food network design</label>
                        <label class="block"><input type="checkbox" name="sub_skills[]" value="Supply chain optimization" class="form-checkbox"> Supply chain optimization</label>
                        <label class="block"><input type="checkbox" name="sub_skills[]" value="Farm to market logistics" class="form-checkbox"> Farm to market logistics</label>
                        <label class="block"><input type="checkbox" name="sub_skills[]" value="Food security planning" class="form-checkbox"> Food security planning</label>
                    </div>
                </div>

                <!-- Due Diligence -->
                <div>
                    <label class="inline-flex items-center">
                        <input type="checkbox" name="skills[]" value="Due Diligence" class="main-skill form-checkbox" data-target="due-diligence-sub-skills">
                        <span class="ml-2 font-semibold">Due Diligence</span>
                    </label>
                    <div id="due-diligence-sub-skills" class="ml-6 mt-2 sub-skills space-y-2 hidden">
                        <label class="block"><input type="checkbox" name="sub_skills[]" value="Agricultural Risk Assessment" class="form-checkbox"> Agricultural Risk Assessment</label>
                        <label class="block"><input type="checkbox" name="sub_skills[]" value="Financial Due Diligence" class="form-checkbox"> Financial Due Diligence</label>
                        <label class="block"><input type="checkbox" name="sub_skills[]" value="Environmental Impact Analysis" class="form-checkbox"> Environmental Impact Analysis</label>
                        <label class="block"><input type="checkbox" name="sub_skills[]" value="Regulatory Compliance" class="form-checkbox"> Regulatory Compliance</label>
                    </div>
                </div>

                <!-- Sustainability and Environmental Consulting -->
                <div>
                    <label class="inline-flex items-center">
                        <input type="checkbox" name="skills[]" value="Sustainability and Environmental Consulting" class="main-skill form-checkbox" data-target="sustainability-sub-skills">
                        <span class="ml-2 font-semibold">Sustainability and Environmental Consulting</span>
                    </label>
                    <div id="sustainability-sub-skills" class="ml-6 mt-2 sub-skills space-y-2 hidden">
                        <label class="block"><input type="checkbox" name="sub_skills[]" value="Sustainable Farming Practices" class="form-checkbox"> Sustainable Farming Practices</label>
                        <label class="block"><input type="checkbox" name="sub_skills[]" value="Organic Farming Consulting" class="form-checkbox"> Organic Farming Consulting</label>
                        <label class="block"><input type="checkbox" name="sub_skills[]" value="Environmental Policy Development" class="form-checkbox"> Environmental Policy Development</label>
                        <label class="block"><input type="checkbox" name="sub_skills[]" value="Agroforestry Design" class="form-checkbox"> Agroforestry Design</label>
                    </div>
                </div>

                <!-- Agricultural Technology Implementation -->
                <div>
                    <label class="inline-flex items-center">
                        <input type="checkbox" name="skills[]" value="Agricultural Technology Implementation" class="main-skill form-checkbox" data-target="tech-sub-skills">
                        <span class="ml-2 font-semibold">Agricultural Technology Implementation</span>
                    </label>
                    <div id="tech-sub-skills" class="ml-6 mt-2 sub-skills space-y-2 hidden">
                        <label class="block"><input type="checkbox" name="sub_skills[]" value="Precision Agriculture Technology" class="form-checkbox"> Precision Agriculture Technology</label>
                        <label class="block"><input type="checkbox" name="sub_skills[]" value="IoT Integration in Farming" class="form-checkbox"> IoT Integration in Farming</label>
                        <label class="block"><input type="checkbox" name="sub_skills[]" value="Smart Irrigation Systems" class="form-checkbox"> Smart Irrigation Systems</label>
                        <label class="block"><input type="checkbox" name="sub_skills[]" value="Agri-Tech Solution Deployment" class="form-checkbox"> Agri-Tech Solution Deployment</label>
                    </div>
                </div>

                <!-- Project Management -->
                <div>
                    <label class="inline-flex items-center">
                        <input type="checkbox" name="skills[]" value="Project Management" class="main-skill form-checkbox" data-target="project-management-sub-skills">
                        <span class="ml-2 font-semibold">Project Management</span>
                    </label>
                    <div id="project-management-sub-skills" class="ml-6 mt-2 sub-skills space-y-2 hidden">
                        <label class="block"><input type="checkbox" name="sub_skills[]" value="Agricultural Project Planning" class="form-checkbox"> Agricultural Project Planning</label>
                        <label class="block"><input type="checkbox" name="sub_skills[]" value="Resource Allocation" class="form-checkbox"> Resource Allocation</label>
                        <label class="block"><input type="checkbox" name="sub_skills[]" value="Timeline Management" class="form-checkbox"> Timeline Management</label>
                        <label class="block"><input type="checkbox" name="sub_skills[]" value="Cost Control & Budgeting" class="form-checkbox"> Cost Control & Budgeting</label>
                    </div>
                </div>

                <!-- Education and Workshops -->
                <div>
                    <label class="inline-flex items-center">
                        <input type="checkbox" name="skills[]" value="Education and Workshops" class="main-skill form-checkbox" data-target="education-sub-skills">
                        <span class="ml-2 font-semibold">Education and Workshops</span>
                    </label>
                    <div id="education-sub-skills" class="ml-6 mt-2 sub-skills space-y-2 hidden">
                        <label class="block"><input type="checkbox" name="sub_skills[]" value="Agricultural Training & Facilitation" class="form-checkbox"> Agricultural Training & Facilitation</label>
                        <label class="block"><input type="checkbox" name="sub_skills[]" value="Workshop Development & Delivery" class="form-checkbox"> Workshop Development & Delivery</label>
                        <label class="block"><input type="checkbox" name="sub_skills[]" value="Curriculum Design for Agriculture" class="form-checkbox"> Curriculum Design for Agriculture</label>
                        <label class="block"><input type="checkbox" name="sub_skills[]" value="Capacity Building" class="form-checkbox"> Capacity Building</label>
                    </div>
                </div>
            </div>

                <div class="flex justify-between">
                    <button type="button" id="back-to-step-1" 
                        class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 focus:outline-none">Back</button>
                    <button type="submit" 
                        class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 focus:outline-none">Submit Registration</button>
                </div>
            </div>
        </form>
    </div><br>
    <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script>
    document.addEventListener('DOMContentLoaded', () => {
        // Get all main skill checkboxes
        const mainSkills = document.querySelectorAll('.main-skill');

        // Loop through each main skill checkbox
        mainSkills.forEach(mainSkill => {
            const targetId = mainSkill.getAttribute('data-target'); // Get the associated sub-skills container ID
            const subSkillsContainer = document.getElementById(targetId);

            // Check initial state to show or hide sub-skills if already checked
            if (mainSkill.checked) {
                subSkillsContainer.classList.remove('hidden');
            }

            mainSkill.addEventListener('change', function () {
                if (this.checked) {
                    subSkillsContainer.classList.remove('hidden');
                } else {
                    subSkillsContainer.classList.add('hidden');
                    // Uncheck all sub-skills when hiding the container
                    subSkillsContainer.querySelectorAll('input[type="checkbox"]').forEach(subSkill => subSkill.checked = false);
                }
            });
        });
    });
</script>
    <script>
        // Handle step navigation
        document.getElementById('next-to-step-2').addEventListener('click', function () {
            document.getElementById('step-1').classList.add('hidden');
            document.getElementById('step-2').classList.remove('hidden');
        });

        document.getElementById('back-to-step-1').addEventListener('click', function () {
            document.getElementById('step-2').classList.add('hidden');
            document.getElementById('step-1').classList.remove('hidden');
        });
    </script>
    <script>
    document.addEventListener('DOMContentLoaded', () => {
        // Get all main skill checkboxes
        const mainSkills = document.querySelectorAll('.main-skill');

        // Loop through each main skill checkbox
        mainSkills.forEach(mainSkill => {
            mainSkill.addEventListener('change', function () {
                const targetId = this.getAttribute('data-target'); // Get the associated sub-skills container ID
                const subSkills = document.querySelectorAll(`#${targetId} input[type="checkbox"]`);

                if (this.checked) {
                    // Check all sub-skills when the main skill is checked
                    subSkills.forEach(subSkill => subSkill.checked = true);
                } else {
                    // Uncheck all sub-skills when the main skill is unchecked
                    subSkills.forEach(subSkill => subSkill.checked = false);
                }
            });
        });
    });
</script>


</body>
</html>
<?php /**PATH C:\Users\savin\Desktop\foodcycle\resources\views/consultant/register.blade.php ENDPATH**/ ?>