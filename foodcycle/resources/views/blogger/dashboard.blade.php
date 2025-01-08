<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogger Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .sidebar {
            height: 100vh;
            width: 16rem;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #1F2937;
            color: white;
            z-index: 10;
            padding-top: 4rem;
        }

        .content {
            margin-left: 16rem;
            padding: 6rem 2rem 2rem;
        }

        .header {
            height: 5rem;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background-color: white;
            z-index: 20;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 0 2rem;
        }

    </style>
</head>
<body class="bg-gray-100">

    <!-- Header -->
    <div class="header flex justify-between items-center">
         <!-- Logo -->
         <div class="flex items-center">
            <img src="{{ asset('panel/image/AgriBlogs.png') }}" alt="AgriBlogs Logo" class="w-25 h-20 " href="{{ route('blogs.index') }}">
        </div>
        <!-- Navigation -->
        <nav class="hidden space-x-6 md:flex font-mono">
            <!-- Main Links -->
            <a href="/" class="text-lg font-semibold transition hover:text-green-700 {{ request()->is('/') ? 'text-green-500' : 'text-gray-800' }}">Home</a>
            <a href="#" class="text-lg font-semibold transition hover:text-green-700">About</a>
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

            <a href="#" class="text-lg font-semibold transition hover:text-green-700">Contact Us</a>
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
        <div class="flex items-center space-x-4">
            @auth('blogger')
                <div class="relative">
                    <button onclick="toggleDropdown()" class="flex items-center space-x-2">
                        <i class="fa-regular fa-circle-user fa-lg"></i>
                        <span class="font-medium">{{ Auth::guard('blogger')->user()->name }}</span>
                    </button>
                    <div id="dropdownMenu" class="absolute hidden right-0 w-48 mt-2 bg-white rounded-lg shadow-lg">
                        <a href="{{ route('blogger.dashboard') }}" class="block px-4 py-2">Dashboard</a>
                        <a href="{{ route('blogger.profile') }}" class="block px-4 py-2">Profile</a>
                        <form method="POST" action="{{ route('blogger.logout') }}">
                            @csrf
                            <button type="submit" class="block w-full text-left px-4 py-2">Logout</button>
                        </form>
                    </div>
                </div>
            @else
                <a href="{{ route('blogger.login') }}" class="px-4 py-1.5 bg-green-500 text-white rounded-lg hover:bg-green-700">
                    Be a Blogger
                </a>
            @endauth
        </div>
    </div>

    <button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
    <span class="sr-only">Open sidebar</span>
    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
    <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
    </svg>
    </button>

    <aside id="default-sidebar" class="fixed top-20 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
        <ul class="space-y-2 font-medium">
            <li>
                <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                    <path d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z"/>
                </svg>
                <span class="flex-1 ms-3 whitespace-nowrap">All Posts</span>
                <span class="inline-flex items-center justify-center px-2 ms-3 text-sm font-medium text-gray-800 bg-gray-100 rounded-full dark:bg-gray-700 dark:text-gray-300">Pro</span>
                </a>
            </li>
            <li>
                <a href="{{ route('blogger.my-posts') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="m17.418 3.623-.018-.008a6.713 6.713 0 0 0-2.4-.569V2h1a1 1 0 1 0 0-2h-2a1 1 0 0 0-1 1v2H9.89A6.977 6.977 0 0 1 12 8v5h-2V8A5 5 0 1 0 0 8v6a1 1 0 0 0 1 1h8v4a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-4h6a1 1 0 0 0 1-1V8a5 5 0 0 0-2.582-4.377ZM6 12H4a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Z"/>
                </svg>
                <span class="flex-1 ms-3 whitespace-nowrap">My Posts</span>
                <span class="inline-flex items-center justify-center w-3 h-3 p-3 ms-3 text-sm font-medium text-blue-800 bg-blue-100 rounded-full dark:bg-blue-900 dark:text-blue-300">3</span>
                </a>
            </li>
            <li>
                <a href="{{ route('blogger.profile') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                    <path d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z"/>
                </svg>
                <span class="flex-1 ms-3 whitespace-nowrap">Profile</span>
                </a>
            </li>
            <li>
                <a href="{{ route('blogger.logout') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 16">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 8h11m0 0L8 4m4 4-4 4m4-11h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-3"/>
                </svg><span class="flex-1 ms-3 whitespace-nowrap"><form method="POST" action="{{ route('blogger.logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left py-2 hover:bg-gray-700 rounded-lg"> Logout</button>
                        </form></span>
                
                </a>
            </li>
        </ul>
    </div>
    </aside>

    <!-- Main Content -->
    <div class="content">
        <!-- Search Bar and Header -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-4xl font-bold text-green-500">All Blogs</h1>

            <!-- Search Bar -->
            <form action="{{ route('blogs.index') }}" method="GET" class="flex items-center">
                <input 
                    type="text" 
                    name="search" 
                    value="{{ request('search') }}" 
                    placeholder="Search blogs..." 
                    class="px-4 py-2 border rounded-l-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                />
                <button 
                    type="submit" 
                    class="px-4 py-2 bg-green-500 text-white rounded-r-lg hover:bg-green-700"
                >
                    Search
                </button>
            </form>

            <!-- Create New Post Button -->
            <a href="{{ route('blogs.create') }}" class="px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-700 ml-4">
                Create New Post
            </a>
        </div>

        <!-- Blog Cards -->
        @if($blogs->isEmpty())
            <p class="text-gray-600">No approved blogs available.</p>
        @else
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
                @foreach($blogs as $blog)
                    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                        @if($blog->photos1)
                            <img src="{{ asset('storage/' . $blog->photos1) }}" alt="{{ $blog->title }}" class="w-full h-40 object-cover">
                        @endif
                        <div class="p-4">
                            <h2 class="text-lg font-semibold">{{ $blog->title }}</h2>
                            <p class="text-sm mt-2">{{ Str::limit(strip_tags($blog->content), 80) }}</p>
                            <div class="mt-4 flex justify-between items-center">
                                <a href="{{ route('blogs.show', $blog->id) }}" class="text-blue-500 hover:underline">Read More</a>
                                <span class="text-xs text-gray-500">By: {{ $blog->blogger->name }} on {{ $blog->created_at->format('M d, Y') }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        <!-- Pagination -->
        <div class="mt-8">
            {{ $blogs->links() }}
        </div>
    </div>


    <script>
        function toggleDropdown() {
            document.getElementById('dropdownMenu').classList.toggle('hidden');
        }
    </script>
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
    });</script>
</body>
</html>
