<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultant Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">
    <!-- Header -->
    <header class="bg-blue-600 text-white py-4 shadow-md">
            <div class="container mx-auto px-4 flex justify-between items-center">
                <h1 class="text-2xl font-bold">Consultant Profile</h1>
                <a href="{{ route('consultant.dashboard') }}" class="bg-white text-blue-600 px-4 py-2 rounded hover:bg-gray-200">
                    Back to Dashboard
                </a>
            </div>
            <style>
            .custom-translate {
                position: relative;
                display: inline-block;
            }

            .custom-translate select {
                appearance: none;
                background-color: transparent;
                border: 1px solid #ddd;
                padding: 8px 32px 8px 16px;
                border-radius: 4px;
                cursor: pointer;
                font-size: 14px;
            }

            .custom-translate select:focus {
                outline: none;
                border-color: #4a8;
            }

            #google_translate_element {
                display: none;
            }
            .goog-te-banner-frame {
                display: none !important;
            }
            .goog-logo-link {
                display: none !important;
            }
            .goog-te-gadget span {
                display: none !important;
            }
        </style>

        <div class="custom-translate">
            <select id="language-select" onchange="changeLanguage(this.value)">
                <option value="en">English</option>
                <option value="si">Sinhala</option>
                <option value="ta">Tamil</option>
            </select>
        </div>

        <div id="google_translate_element"></div>

        <script type="text/javascript">
            function googleTranslateElementInit() {
                new google.translate.TranslateElement({
                    pageLanguage: 'en',
                    includedLanguages: 'en,si,ta,es,fr,it,de,ja,ko,pt,ru,zh-CN',
                    layout: google.translate.TranslateElement.InlineLayout.HORIZONTAL,
                    autoDisplay: false,
                    multilanguagePage: true,
                }, 'google_translate_element');
            }
            function hideGoogleTranslateToolbar() {
                var translateFrame = document.querySelector('.goog-te-banner-frame');
                if (translateFrame) {
                    translateFrame.style.display = 'none';
                }
                var translateElement = document.querySelector('#google_translate_element');
                if (translateElement) {
                    translateElement.style.display = 'none';
                }
            }

            document.addEventListener('DOMContentLoaded', function() {
                hideGoogleTranslateToolbar();
            });

            function changeLanguage(langCode) {
                var select = document.querySelector('select.goog-te-combo');
                if (select) {
                    select.value = langCode;
                    select.dispatchEvent(new Event('change'));
                }
            }
        </script>

        <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
        </header>
    <div class="container mx-auto mt-10 p-8 bg-white shadow-md rounded-lg">
        <h1 class="text-2xl font-bold mb-6">Consultant Profile</h1>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <!-- Profile Form -->
        <form action="{{ route('consultant.updateProfile') }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Name -->
            <div class="mb-4">
                <label for="name" class="block font-medium mb-1">Name</label>
                <input type="text" id="name" name="name" value="{{ $consultant->name }}" 
                    class="w-full border border-gray-300 px-3 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Address -->
            <div class="mb-4">
                <label for="address" class="block font-medium mb-1">Address</label>
                <input type="text" id="address" name="address" value="{{ $consultant->address }}" 
                    class="w-full border border-gray-300 px-3 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Province -->
            <div class="mb-4">
                <label for="province" class="block font-medium mb-1">Province</label>
                <select id="province" name="province" 
                    class="w-full border border-gray-300 px-3 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="Central" {{ $consultant->province == 'Central' ? 'selected' : '' }}>Central</option>
                    <option value="Eastern" {{ $consultant->province == 'Eastern' ? 'selected' : '' }}>Eastern</option>
                    <option value="North Central" {{ $consultant->province == 'North Central' ? 'selected' : '' }}>North Central</option>
                    <option value="Northern" {{ $consultant->province == 'Northern' ? 'selected' : '' }}>Northern</option>
                    <option value="North Western" {{ $consultant->province == 'North Western' ? 'selected' : '' }}>North Western</option>
                    <option value="Sabaragamuwa" {{ $consultant->province == 'Sabaragamuwa' ? 'selected' : '' }}>Sabaragamuwa</option>
                    <option value="Southern" {{ $consultant->province == 'Southern' ? 'selected' : '' }}>Southern</option>
                    <option value="Uva" {{ $consultant->province == 'Uva' ? 'selected' : '' }}>Uva</option>
                    <option value="Western" {{ $consultant->province == 'Western' ? 'selected' : '' }}>Western</option>
                </select>
            </div>

            <!-- Contact Number -->
            <div class="mb-4">
                <label for="contact_no" class="block font-medium mb-1">Contact Number</label>
                <input type="text" id="contact_no" name="contact_no" value="{{ $consultant->contact_no }}" 
                    class="w-full border border-gray-300 px-3 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block font-medium mb-1">Email</label>
                <input type="email" id="email" name="email" value="{{ $consultant->email }}" 
                    class="w-full border border-gray-300 px-3 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Education -->
            <div class="mb-4">
                <label for="education" class="block font-medium mb-1">Education</label>
                <input type="text" id="education" name="education" value="{{ $consultant->education }}" 
                    class="w-full border border-gray-300 px-3 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Qualifications -->
            <div class="mb-4">
                <label for="qualifications" class="block font-medium mb-1">Qualifications</label>
                <input type="text" id="qualifications" name="qualifications" value="{{ $consultant->qualifications }}" 
                    class="w-full border border-gray-300 px-3 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Skills and Sub-Skills -->
            <!-- Skills and Sub-Skills -->
            <div class="mb-4">
                <label class="block font-medium mb-1">Skills</label>
                @php
                    $selectedSkills = json_decode($consultant->skills, true) ?? [];
                    $selectedSubSkills = json_decode($consultant->sub_skills, true) ?? [];
                @endphp

                <div class="space-y-4">
                    <!-- Feasibility -->
                    <div>
                        <label class="inline-flex items-center">
                            <input type="checkbox" name="skills[]" value="Feasibility" {{ in_array('Feasibility', $selectedSkills) ? 'checked' : '' }}> Feasibility
                        </label>
                        <div class="ml-6">
                            <label><input type="checkbox" name="sub_skills[]" value="Economic" {{ in_array('Economic', $selectedSubSkills) ? 'checked' : '' }}> Economic</label><br>
                            <label><input type="checkbox" name="sub_skills[]" value="Operational" {{ in_array('Operational', $selectedSubSkills) ? 'checked' : '' }}> Operational</label><br>
                            <label><input type="checkbox" name="sub_skills[]" value="Technical" {{ in_array('Technical', $selectedSubSkills) ? 'checked' : '' }}> Technical</label><br>
                            <label><input type="checkbox" name="sub_skills[]" value="Financial" {{ in_array('Financial', $selectedSubSkills) ? 'checked' : '' }}> Financial</label><br>
                            <label><input type="checkbox" name="sub_skills[]" value="Market Analysis" {{ in_array('Market Analysis', $selectedSubSkills) ? 'checked' : '' }}> Market Analysis</label><br>
                            <label><input type="checkbox" name="sub_skills[]" value="Regulatory Compliance" {{ in_array('Regulatory Compliance', $selectedSubSkills) ? 'checked' : '' }}> Regulatory Compliance</label>
                        </div>
                    </div>

                    <!-- Farm Designs -->
                    <div>
                        <label class="inline-flex items-center">
                            <input type="checkbox" name="skills[]" value="Farm Designs" {{ in_array('Farm Designs', $selectedSkills) ? 'checked' : '' }}> Farm Designs
                        </label>
                        <div class="ml-6">
                            <label><input type="checkbox" name="sub_skills[]" value="Paddy field systems" {{ in_array('Paddy field systems', $selectedSubSkills) ? 'checked' : '' }}> Paddy field systems</label><br>
                            <label><input type="checkbox" name="sub_skills[]" value="Chena cultivation" {{ in_array('Chena cultivation', $selectedSubSkills) ? 'checked' : '' }}> Chena cultivation</label><br>
                            <label><input type="checkbox" name="sub_skills[]" value="Kandyan forest garden" {{ in_array('Kandyan forest garden', $selectedSubSkills) ? 'checked' : '' }}> Kandyan forest garden</label><br>
                            <label><input type="checkbox" name="sub_skills[]" value="Tank cascade systems" {{ in_array('Tank cascade systems', $selectedSubSkills) ? 'checked' : '' }}> Tank cascade systems</label><br>
                            <label><input type="checkbox" name="sub_skills[]" value="Home gardens" {{ in_array('Home gardens', $selectedSubSkills) ? 'checked' : '' }}> Home gardens</label><br>
                            <label><input type="checkbox" name="sub_skills[]" value="Plantation agriculture" {{ in_array('Plantation agriculture', $selectedSubSkills) ? 'checked' : '' }}> Plantation agriculture</label>
                        </div>
                    </div>

                    <!-- Local Food Planning -->
                    <div>
                        <label class="inline-flex items-center">
                            <input type="checkbox" name="skills[]" value="Local Food Planning" {{ in_array('Local Food Planning', $selectedSkills) ? 'checked' : '' }}> Local Food Planning
                        </label>
                        <div class="ml-6">
                            <label><input type="checkbox" name="sub_skills[]" value="Local food network design" {{ in_array('Local food network design', $selectedSubSkills) ? 'checked' : '' }}> Local food network design</label><br>
                            <label><input type="checkbox" name="sub_skills[]" value="Supply chain optimization" {{ in_array('Supply chain optimization', $selectedSubSkills) ? 'checked' : '' }}> Supply chain optimization</label><br>
                            <label><input type="checkbox" name="sub_skills[]" value="Farm to market logistics" {{ in_array('Farm to market logistics', $selectedSubSkills) ? 'checked' : '' }}> Farm to market logistics</label><br>
                            <label><input type="checkbox" name="sub_skills[]" value="Food security planning" {{ in_array('Food security planning', $selectedSubSkills) ? 'checked' : '' }}> Food security planning</label>
                        </div>
                    </div>

                    <!-- Due Diligence -->
                    <div>
                        <label class="inline-flex items-center">
                            <input type="checkbox" name="skills[]" value="Due Diligence" {{ in_array('Due Diligence', $selectedSkills) ? 'checked' : '' }}> Due Diligence
                        </label>
                        <div class="ml-6">
                            <label><input type="checkbox" name="sub_skills[]" value="Agricultural Risk Assessment" {{ in_array('Agricultural Risk Assessment', $selectedSubSkills) ? 'checked' : '' }}> Agricultural Risk Assessment</label><br>
                            <label><input type="checkbox" name="sub_skills[]" value="Financial Due Diligence" {{ in_array('Financial Due Diligence', $selectedSubSkills) ? 'checked' : '' }}> Financial Due Diligence</label><br>
                            <label><input type="checkbox" name="sub_skills[]" value="Environmental Impact Analysis" {{ in_array('Environmental Impact Analysis', $selectedSubSkills) ? 'checked' : '' }}> Environmental Impact Analysis</label><br>
                            <label><input type="checkbox" name="sub_skills[]" value="Regulatory Compliance" {{ in_array('Regulatory Compliance', $selectedSubSkills) ? 'checked' : '' }}> Regulatory Compliance</label>
                        </div>
                    </div>

                    <!-- Sustainability and Environmental Consulting -->
                    <div>
                        <label class="inline-flex items-center">
                            <input type="checkbox" name="skills[]" value="Sustainability and Environmental Consulting" {{ in_array('Sustainability and Environmental Consulting', $selectedSkills) ? 'checked' : '' }}> Sustainability and Environmental Consulting
                        </label>
                        <div class="ml-6">
                            <label><input type="checkbox" name="sub_skills[]" value="Sustainable Farming Practices" {{ in_array('Sustainable Farming Practices', $selectedSubSkills) ? 'checked' : '' }}> Sustainable Farming Practices</label><br>
                            <label><input type="checkbox" name="sub_skills[]" value="Organic Farming Consulting" {{ in_array('Organic Farming Consulting', $selectedSubSkills) ? 'checked' : '' }}> Organic Farming Consulting</label><br>
                            <label><input type="checkbox" name="sub_skills[]" value="Environmental Policy Development" {{ in_array('Environmental Policy Development', $selectedSubSkills) ? 'checked' : '' }}> Environmental Policy Development</label><br>
                            <label><input type="checkbox" name="sub_skills[]" value="Agroforestry Design" {{ in_array('Agroforestry Design', $selectedSubSkills) ? 'checked' : '' }}> Agroforestry Design</label>
                        </div>
                    </div>

                    <!-- Agricultural Technology Implementation -->
                    <div>
                        <label class="inline-flex items-center">
                            <input type="checkbox" name="skills[]" value="Agricultural Technology Implementation" {{ in_array('Agricultural Technology Implementation', $selectedSkills) ? 'checked' : '' }}> Agricultural Technology Implementation
                        </label>
                        <div class="ml-6">
                            <label><input type="checkbox" name="sub_skills[]" value="Precision Agriculture Technology" {{ in_array('Precision Agriculture Technology', $selectedSubSkills) ? 'checked' : '' }}> Precision Agriculture Technology</label><br>
                            <label><input type="checkbox" name="sub_skills[]" value="IoT Integration in Farming" {{ in_array('IoT Integration in Farming', $selectedSubSkills) ? 'checked' : '' }}> IoT Integration in Farming</label><br>
                            <label><input type="checkbox" name="sub_skills[]" value="Smart Irrigation Systems" {{ in_array('Smart Irrigation Systems', $selectedSubSkills) ? 'checked' : '' }}> Smart Irrigation Systems</label><br>
                            <label><input type="checkbox" name="sub_skills[]" value="Agri-Tech Solution Deployment" {{ in_array('Agri-Tech Solution Deployment', $selectedSubSkills) ? 'checked' : '' }}> Agri-Tech Solution Deployment</label>
                        </div>
                    </div>

                    <!-- Project Management -->
                    <div>
                        <label class="inline-flex items-center">
                            <input type="checkbox" name="skills[]" value="Project Management" {{ in_array('Project Management', $selectedSkills) ? 'checked' : '' }}> Project Management
                        </label>
                        <div class="ml-6">
                            <label><input type="checkbox" name="sub_skills[]" value="Agricultural Project Planning" {{ in_array('Agricultural Project Planning', $selectedSubSkills) ? 'checked' : '' }}> Agricultural Project Planning</label><br>
                            <label><input type="checkbox" name="sub_skills[]" value="Resource Allocation" {{ in_array('Resource Allocation', $selectedSubSkills) ? 'checked' : '' }}> Resource Allocation</label><br>
                            <label><input type="checkbox" name="sub_skills[]" value="Timeline Management" {{ in_array('Timeline Management', $selectedSubSkills) ? 'checked' : '' }}> Timeline Management</label><br>
                            <label><input type="checkbox" name="sub_skills[]" value="Cost Control & Budgeting" {{ in_array('Cost Control & Budgeting', $selectedSubSkills) ? 'checked' : '' }}> Cost Control & Budgeting</label>
                        </div>
                    </div>

                    <!-- Education and Workshops -->
                    <div>
                        <label class="inline-flex items-center">
                            <input type="checkbox" name="skills[]" value="Education and Workshops" {{ in_array('Education and Workshops', $selectedSkills) ? 'checked' : '' }}> Education and Workshops
                        </label>
                        <div class="ml-6">
                            <label><input type="checkbox" name="sub_skills[]" value="Agricultural Training & Facilitation" {{ in_array('Agricultural Training & Facilitation', $selectedSubSkills) ? 'checked' : '' }}> Agricultural Training & Facilitation</label><br>
                            <label><input type="checkbox" name="sub_skills[]" value="Workshop Development & Delivery" {{ in_array('Workshop Development & Delivery', $selectedSubSkills) ? 'checked' : '' }}> Workshop Development & Delivery</label><br>
                            <label><input type="checkbox" name="sub_skills[]" value="Curriculum Design for Agriculture" {{ in_array('Curriculum Design for Agriculture', $selectedSubSkills) ? 'checked' : '' }}> Curriculum Design for Agriculture</label><br>
                            <label><input type="checkbox" name="sub_skills[]" value="Capacity Building" {{ in_array('Capacity Building', $selectedSubSkills) ? 'checked' : '' }}> Capacity Building</label>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="block font-medium mb-1">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter new password (optional)" 
                    class="w-full border border-gray-300 px-3 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Confirm Password -->
            <div class="mb-4">
                <label for="password_confirmation" class="block font-medium mb-1">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm new password (optional)" 
                    class="w-full border border-gray-300 px-3 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end">
                <button type="submit" 
                    class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 focus:outline-none">Update Profile</button>
            </div>
        </form>
        <!-- Delete Account -->
        <form action="{{ route('consultant.deleteAccount') }}" method="POST" class="mt-6">
                @csrf
                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded">
                    Delete Account
                </button>
            </form>
    </div>

</body>
</html>
