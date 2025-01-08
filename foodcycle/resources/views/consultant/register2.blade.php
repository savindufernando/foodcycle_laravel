<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultant Registration</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .hidden { display: none; }
    </style>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <div class="w-full max-w-4xl bg-white shadow-lg rounded-lg p-8">
        <h1 class="text-3xl font-bold mb-6 text-center text-green-600">Register as a Consultant</h1>

        <!-- Form 1: Personal Information -->
        <form id="form-1" class="space-y-4">
            <h2 class="text-xl font-semibold text-gray-700">Step 1: Personal Information</h2>

            <div>
                <label for="name" class="block font-medium">Name</label>
                <input type="text" id="name" name="name" placeholder="Enter your name" class="w-full px-4 py-2 border rounded-lg" required>
            </div>

            <div>
                <label for="address" class="block font-medium">Address</label>
                <input type="text" id="address" name="address" placeholder="Enter your address" class="w-full px-4 py-2 border rounded-lg" required>
            </div>

            <div>
                <label for="province" class="block font-medium">Province</label>
                <select id="province" name="province" class="w-full px-4 py-2 border rounded-lg" required>
                    <option value="" disabled selected>Select your province</option>
                    <option value="Central">Central</option>
                    <option value="Eastern">Eastern</option>
                    <option value="North Central">North Central</option>
                    <option value="Northern">Northern</option>
                    <option value="North Western">North Western</option>
                    <option value="Sabaragamuwa">Sabaragamuwa</option>
                    <option value="Southern">Southern</option>
                    <option value="Uva">Uva</option>
                    <option value="Western">Western</option>
                </select>
            </div>

            <div>
                <label for="contact_no" class="block font-medium">Contact Number</label>
                <input type="text" id="contact_no" name="contact_no" placeholder="Enter your contact number" class="w-full px-4 py-2 border rounded-lg" required>
            </div>

            <div>
                <label for="email" class="block font-medium">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" class="w-full px-4 py-2 border rounded-lg" required>
            </div>

            <div>
                <label for="password" class="block font-medium">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" class="w-full px-4 py-2 border rounded-lg" required>
            </div>

            <div>
                <label for="password_confirmation" class="block font-medium">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm your password" class="w-full px-4 py-2 border rounded-lg" required>
            </div>

            <button type="button" id="next-button" class="w-full px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-700">
                Next Step: Select Skills
            </button>
        </form>

        <!-- Form 2: Skills Selection (Hidden by Default) -->
        <form id="form-2" action="{{ route('consultant.register') }}" method="POST" class="hidden space-y-6 mt-8">
            @csrf
            <h2 class="text-xl font-semibold text-gray-700">Step 2: Select Your Skills</h2>

            <!-- Main Skills with Sub-Skills -->
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

            <form action="{{ route('consultant.register') }}" method="POST">
                @csrf
                <!-- All form fields -->
                <button type="submit">Register</button>
            </form>

        </form>
    </div>

    <!-- JavaScript for Multi-Step Form and Skill Toggle -->
    <script>
        // Handle step transition
        document.getElementById('next-button').addEventListener('click', function () {
            const form1 = document.getElementById('form-1');
            const form2 = document.getElementById('form-2');

            if (form1.checkValidity()) {
                form1.classList.add('hidden');
                form2.classList.remove('hidden');
            } else {
                form1.reportValidity();
            }
        });

        // Handle skill toggle
        document.querySelectorAll('.main-skill').forEach(skill => {
            skill.addEventListener('change', function() {
                const target = document.getElementById(this.dataset.target);
                if (this.checked) {
                    target.classList.remove('hidden');
                } else {
                    target.classList.add('hidden');
                    target.querySelectorAll('input[type="checkbox"]').forEach(subSkill => subSkill.checked = false);
                }
            });
        });
    </script>

</body>
</html>
