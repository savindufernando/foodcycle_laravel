<header class="relative z-10 w-full bg-white shadow-lg">
    <div class="flex items-center justify-between px-6 py-2 mx-auto">
        <!-- Logo -->
        <div class="flex items-center">
            <img src="{{ asset('panel/image/AgriBlogs.png') }}" alt="AgriBlogs Logo" class="w-25 h-20 " href="{{ route('blogs.index') }}">
        </div>

        <!-- Navigation -->
        <nav class="hidden space-x-6 md:flex font-mono">
            <!-- Main Links -->
            <a href="/" class="text-lg font-semibold transition hover:text-green-700 {{ request()->is('/') ? 'text-green-500' : 'text-gray-800' }}">Home</a>
            <a href="/#about-section" class="text-lg font-semibold transition hover:text-green-700">About</a>
            <a href="/shop" class="text-lg font-semibold transition hover:text-green-700 {{ request()->is('shop') ? 'text-green-500' : 'text-gray-800' }}">Shop</a>
            <a href="/donation" class="text-lg font-semibold transition hover:text-green-700 {{ request()->is('donation') ? 'text-green-500' : 'text-gray-800' }}">Donation</a>

            <!-- Services Dropdown -->
            <div class="relative">
                <button id="servicesDropdown" class="text-lg font-semibold transition hover:text-green-700 focus:outline-none">Services</button>
                <div id="servicesMenu" class="absolute hidden w-56 mt-2 bg-white rounded-md shadow-lg">
                    <a href="/services" class="block px-4 py-2 text-sm text-gray-800 transition hover:bg-gray-100">Consulting Services</a>
                    <a href="/service" class="block px-4 py-2 text-sm text-gray-800 transition hover:bg-gray-100">Transport and Storage Services</a>
                    <a href="#" class="block px-4 py-2 text-sm text-gray-800 transition hover:bg-gray-100">Portfolio</a>
                </div>
            </div>

            <!-- Education Dropdown -->
            <div class="relative">
                <button id="educationDropdown" class="text-lg font-semibold transition hover:text-green-700 focus:outline-none">Education</button>
                <div id="educationMenu" class="absolute hidden w-56 mt-2 bg-white rounded-md shadow-lg">
                    <a href="{{ route('blogs.index') }}" class="block px-4 py-2 text-sm text-gray-800 transition hover:bg-gray-100">Blog</a>
                    <a href="#" class="block px-4 py-2 text-sm text-gray-800 transition hover:bg-gray-100">Newsletter</a>
                    <a href="#" class="block px-4 py-2 text-sm text-gray-800 transition hover:bg-gray-100">Research</a>
                </div>
            </div>

            <a href="/#contact-section" class="text-lg font-semibold transition hover:text-green-700">Contact Us</a>
        </nav>
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
        <!-- User Actions -->
<div class="flex items-center space-x-4">
    @auth('blogger')
        <!-- Dropdown for logged-in blogger -->
        <div class="relative">
            <button id="dropdownNav" onclick="toggleDropdown()" class="flex items-center space-x-2 text-black hover:text-green-800">
                <i class="fa-regular fa-circle-user fa-lg"></i> Author: 
                <span class="font-medium">{{ Auth::guard('blogger')->user()->name }}</span>
            </button>
            <!-- Dropdown Menu -->
            <div id="dropdownMenu" class="absolute right-0 hidden w-48 mt-2 bg-white rounded-lg shadow-lg">
                <a href="{{ route('blogger.dashboard') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Dashboard</a>
                <a href="{{ route('blogger.profile') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                <form method="POST" action="{{ route('blogger.logout') }}">
                    @csrf
                    <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Logout</button>
                </form>
            </div>
        </div>
    @else
        <!-- Be a Blogger Button -->
        <a href="{{ route('blogger.login') }}" class="px-4 py-1.5 text-sm bg-green-500 text-white font-semibold rounded-lg hover:bg-green-700">
            Be a Blogger
        </a>
    @endauth
</div>

<!-- JavaScript to toggle the dropdown -->
<script>
    function toggleDropdown() {
        const menu = document.getElementById('dropdownMenu');
        menu.classList.toggle('hidden');
    }
</script>


        <!-- Mobile Menu Button -->
        <div class="flex items-center md:hidden">
            <button class="px-3 py-2 text-white bg-green-500 rounded-lg hover:bg-green-600" onclick="toggleMobileMenu()">
                <i class="fa-solid fa-bars"></i>
            </button>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobileMenu" class="hidden bg-gray-100 md:hidden">
        <a href="/" class="block px-4 py-2 text-black hover:text-green-500 {{ request()->is('/') ? 'text-green-500' : '' }}">Home</a>
        <a href="/shop" class="block px-4 py-2 text-black hover:text-green-500 {{ request()->is('shop') ? 'text-green-500' : '' }}">Shop</a>
        <a href="/donation" class="block px-4 py-2 text-black hover:text-green-500 {{ request()->is('donation') ? 'text-green-500' : '' }}">Donation</a>
        <a href="{{ route('blogs.index') }}" class="block px-4 py-2 text-black hover:text-green-500 {{ request()->is('blogs') ? 'text-green-500' : '' }}">Blogs</a>
        <a href="/about" class="block px-4 py-2 text-black hover:text-green-500 {{ request()->is('about') ? 'text-green-500' : '' }}">About Us</a>
        @auth('blogger')
            <a href="{{ route('blogger.dashboard') }}" class="block px-4 py-2 text-black hover:text-green-500">Dashboard</a>
            <a href="{{ route('blogger.profile') }}" class="block px-4 py-2 text-black hover:text-green-500">Profile</a>
            <form method="POST" action="{{ route('blogger.logout') }}">
                @csrf
                <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Logout</button>
            </form>
        @else
            <a href="{{ route('blogger.login') }}" class="block px-4 py-2 text-center text-white bg-green-500 rounded-lg hover:bg-green-700">Be a Blogger</a>
        @endauth
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
