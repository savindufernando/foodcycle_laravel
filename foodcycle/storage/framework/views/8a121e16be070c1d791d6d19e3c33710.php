<header class="relative z-10 w-full"> 
    <div class="flex items-center justify-between w-full px-6 mx-auto bg-white backdrop-blur-md">
        <!-- Logo and Branding -->
        <div class="flex items-center space-x-3">
            <img src="<?php echo e(asset('panel/image/logo.png')); ?>" alt="Food Cycle Logo" class="w-24 h-auto">
        </div>

        <!-- Navigation -->
        <nav class="hidden space-x-6 md:flex font-mono">
            <!-- Main Links -->
            <a href="/" class="text-lg font-semibold transition hover:text-green-700 <?php echo e(request()->is('/') ? 'text-green-500' : 'text-gray-800'); ?>">Home</a>
            <a href="/#about-section" id="aboutUsLink" class="text-lg font-semibold transition hover:text-green-700">About</a>
            <a href="/shop" class="text-lg font-semibold transition hover:text-green-700 <?php echo e(request()->is('shop') ? 'text-green-500' : 'text-gray-800'); ?>">Shop</a>
            <a href="/donation" class="text-lg font-semibold transition hover:text-green-700 <?php echo e(request()->is('donation') ? 'text-green-500' : 'text-gray-800'); ?>">Donation</a>

            <!-- Services Dropdown -->
            <div class="relative">
                <button id="servicesDropdown" class="text-lg font-semibold transition hover:text-green-700 focus:outline-none">Services</button>
                <div id="servicesMenu" class="absolute hidden w-56 mt-2 bg-white rounded-md shadow-lg">
                    <a href="/services" class="block px-4 py-2 text-sm text-gray-800 transition hover:bg-gray-100">Consulting Services</a>
                    <a href="/service" class="block px-4 py-2 text-sm text-gray-800 transition hover:bg-gray-100">Transport and Storage Services</a>
                    <a href="<?php echo e(route('consultant.publicInfo')); ?>"  class="block px-4 py-2 text-sm text-gray-800 transition hover:bg-gray-100">Join with us</a>
                    <a href="#" class="block px-4 py-2 text-sm text-gray-800 transition hover:bg-gray-100">Portfolio</a>
                </div>
            </div>

            <!-- Education Dropdown -->
            <div class="relative">
                <button id="educationDropdown" class="text-lg font-semibold transition hover:text-green-700 focus:outline-none">Education</button>
                <div id="educationMenu" class="absolute hidden w-56 mt-2 bg-white rounded-md shadow-lg">
                    <a href="<?php echo e(route('blogs.index')); ?>" class="block px-4 py-2 text-sm text-gray-800 transition hover:bg-gray-100">Blog</a>
                    <a href="<?php echo e(route('newsletter.form')); ?>" class="block px-4 py-2 text-sm text-gray-800 transition hover:bg-gray-100">Newsletter</a>
                    <a href="#" class="block px-4 py-2 text-sm text-gray-800 transition hover:bg-gray-100">Research</a>
                </div>
            </div>

            <a href="/#contact-section" class="text-lg font-semibold transition hover:text-green-700">Contact Us</a>
        </nav>
        <!-- Google Translate -->
        <!-- <div class="flex items-center space-x-4 p-4 bg-gray-50 rounded-lg shadow-lg">
            <div id="google_translate_element" class="p-2 border border-gray-300 rounded-lg bg-white shadow-md text-gray-700"></div>
        </div> -->
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
        <!-- Seller Button and Icons -->
        <div class="flex items-center space-x-4">
            <?php if(Route::has('admin.register')): ?>              
            <a href="<?php echo e(route('admin.register')); ?>" class="px-4 py-2 text-white bg-green-500 rounded hover:bg-green-600">Seller</a>
            <?php endif; ?>
            <div class="relative items-center hidden space-x-4 md:flex navIcon">
                <a href="#"><i class="fas fa-bell hover:text-green-800"></i></a>
                <a href="<?php echo e(route('cart.index')); ?>"><i class="fas fa-shopping-cart hover:text-green-800"></i></a>
                <div class="relative dropdown">
                    <button id="dropdown-nav" class="text-black hover:text-green-800 focus:outline-none" aria-expanded="false">
                        <i class="fa-regular fa-circle-user fa-lg"></i>
                    </button>

                    <!-- Dropdown Menu for User Profile -->
                    <div id="dropdown-menu1" class="absolute right-0 hidden w-48 mt-2 bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5" role="menu" aria-orientation="vertical" aria-labelledby="dropdown-nav">
                        <?php if(auth()->guard()->check()): ?>
                            <span class="block px-4 py-2 font-serif text-lg text-red-500">Hi, <?php echo e(Auth::user()->name); ?></span>
                            <a href="<?php echo e(route('profile.edit')); ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Profile</a>
                            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: inline;">
                                <?php echo csrf_field(); ?>
                                <button class="block w-full px-4 py-2 text-sm text-left text-gray-700 hover:bg-gray-100" type="submit">Logout</button>
                            </form>
                        <?php else: ?>
                            <span class="block px-4 py-2 font-serif text-lg text-red-500">Hi, Guest</span>
                            <a href="<?php echo e(route('login')); ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Login</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="flex items-center md:hidden">
                <button class="px-4 py-2 text-white bg-green-500 rounded-lg hover:bg-green-600" onclick="toggleMobileMenu()">
                    <i class="fa-solid fa-bars"></i>
                </button>
            </div>    
        </div>
    </div>
    
    <!-- Mobile Menu (hidden by default) -->
    <div id="mobileMenu" class="hidden p-4 bg-gray-100 md:hidden">
        <a href="/" class="block py-2 <?php echo e(request()->is('/') ? 'text-green-500' : 'text-black'); ?>">Home</a>
        <a href="#" class="block py-2">About</a>
        <a href="/shop" class="block py-2 <?php echo e(request()->is('shop') ? 'text-green-500' : 'text-black'); ?>">Shop</a>
        <a href="/donation" class="block py-2 <?php echo e(request()->is('donation') ? 'text-green-500' : 'text-black'); ?>">Donation</a>
        <a href="/services" class="block py-2">Consulting Services</a>
        <a href="/service" class="block py-2">Transport and Storage Services</a>
        <a href="#" class="block py-2">Portfolio</a>
        <a href="<?php echo e(route('blogs.index')); ?>" class="block py-2">Blog</a>
        <a href="#" class="block py-2">Newsletter</a>
        <a href="#" class="block py-2">Research</a>
        <a href="#" class="block py-2">Contact Us</a>
    </div>
</header>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const dropdowns = [
            { trigger: "servicesDropdown", menu: "servicesMenu" },
            { trigger: "educationDropdown", menu: "educationMenu" },
        ];

        dropdowns.forEach(({ trigger, menu }) => {
            const triggerElement = document.getElementById(trigger);
            const menuElement = document.getElementById(menu);

            // Toggle dropdown menu visibility on click
            triggerElement.addEventListener("click", () => {
                menuElement.classList.toggle("hidden");
            });

            // Close dropdown menu when clicking outside
            document.addEventListener("click", (event) => {
                if (!triggerElement.contains(event.target) && !menuElement.contains(event.target)) {
                    menuElement.classList.add("hidden");
                }
            });
        });

        // Dropdown for user menu
        const dropdownNav = document.getElementById("dropdown-nav");
        const dropdownMenu = document.getElementById("dropdown-menu1");

        dropdownNav.addEventListener("click", () => {
            dropdownMenu.classList.toggle("hidden");
        });

        document.addEventListener("click", (event) => {
            if (!dropdownNav.contains(event.target) && !dropdownMenu.contains(event.target)) {
                dropdownMenu.classList.add("hidden");
            }
        });
    });
</script>
    <?php /**PATH C:\Users\savin\Desktop\foodcycle\resources\views/layouts/header.blade.php ENDPATH**/ ?>