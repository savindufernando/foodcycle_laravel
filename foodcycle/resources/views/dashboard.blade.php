{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fixed Sidebar with Fixed Footer</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Link -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;800&display=swap" rel="stylesheet">

    <!-- Icon Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
</head>

<body class="flex flex-col min-h-screen bg-gray-100 font-poppins">
    <!-- Header Section -->
    <header class="fixed top-0 z-10 w-full bg-white shadow">
        <div class="flex items-center justify-between w-full px-6 mx-auto bg-white backdrop-blur-md">
            <!-- Logo and Branding -->
            <div class="flex items-center space-x-3">
                <img src="{{ asset('panel/image/logo.png') }}" alt="Food Cycle Logo" class="w-24 h-auto">
            </div>

            <!-- Navigation -->
            <nav class="relative hidden space-x-6 md:flex">
                <a href="/" class="font-semibold text-green-600 hover:text-green-800">Home</a>
                <a href="/shop" class="font-semibold text-black hover:text-green-800">Shop</a>
                <div class="relative dropdown">
                    <button id="dropdown-button" class="text-black hover:text-green-800 focus:outline-none" aria-expanded="false">
                        <a href="#" class="font-semibold text-black hover:text-green-800 ">Donation</a>
                    </button>
                    <div id="dropdown-menu" class="absolute right-0 hidden w-48 mt-2 bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5" aria-labelledby="dropdown-button">
                        <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Food Donation</a>
                        <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Money Donation</a>
                    </div>
                </div>
                <a href="#" class="font-semibold text-black hover:text-green-800">About Us</a>
                <a href="#" class="font-semibold text-black hover:text-green-800">Contact Us</a>
            </nav>

            <!-- Seller Button and Icons -->
            <div class="flex items-center space-x-4">
                @if (Route::has('admin.register'))              
                <a href="{{ route('admin.register') }}" class="px-4 py-2 text-white bg-green-500 rounded hover:bg-green-600">Seller</a>
                @endif
                <div class="relative items-center hidden space-x-4 md:flex navIcon">
                    <a href="#"><i class="fas fa-bell hover:text-green-800"></i></a>
                    <div class="relative dropdown">
                        <button id="dropdown-nav" class="text-black hover:text-green-800 focus:outline-none" aria-expanded="false">
                            <i class="fa-regular fa-circle-user fa-lg"></i>
                        </button>
                        
                        <!-- Dropdown Menu for User Profile -->
                        <div id="dropdown-menu1" class="absolute right-0 hidden w-48 mt-2 bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5" role="menu" aria-orientation="vertical" aria-labelledby="dropdown-nav">
                            @auth
                                <!-- If the user is authenticated, show their name and sign out option -->
                                <span class="block px-4 py-2 font-serif text-lg text-red-500">Hi, {{ Auth::user()->name }}</span>
                                <a href="{{ route('admin.profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Profile</a>
                                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: inline;">
                                    @csrf
                                    <button class="block w-full px-4 py-2 text-sm text-left text-gray-700 hover:bg-gray-100" type="submit">Logout</button>
                                </form>
                            @else
                                <!-- If the user is not authenticated, show login and guest info -->
                                <span class="block px-4 py-2 font-serif text-lg text-red-500">Hi, Guest</span>
                                <a href="{{ route('login') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Login</a>
                            @endauth
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
            <a href="/" class="block py-2 text-black">Home</a>
            <a href="/shop" class="block py-2 text-black">Shop</a>
            <a href="#" class="block py-2 text-black">Donation</a>
            <a href="#" class="block py-2 text-black">About Us</a>
            <a href="#" class="block py-2 text-black">Contact Us</a>
        </div>
    </header>

    <!-- Layout -->
    <div class="flex flex-1 pt-24">
        <!-- Sidebar -->
        <aside class="fixed top-16 left-0 flex flex-col justify-between w-64 h-[calc(100vh-7rem)] bg-white shadow pt-10">
            <!-- Navigation Links -->
            <nav class="p-6 space-y-4">
                <a href="dashboard" class="flex items-center text-gray-600 hover:text-green-600">
                    <i class="mr-3 fas fa-home"></i> Dashboard
                </a>
                <a href="viewproduct" class="flex items-center text-gray-600 hover:text-green-600">
                    <i class="mr-3 fas fa-shopping-cart"></i> View Products
                </a>
                <a href="ViewAdmin" class="flex items-center text-gray-600 hover:text-green-600">
                    <i class="mr-3 fas fa-user"></i> Admins
                </a>
            </nav>

            <!-- Logout Button -->
            <div class="p-6">
                <a href="logout" class="flex items-center justify-center w-full px-4 py-2 text-white bg-red-500 rounded hover:bg-red-600">
                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <i class="mr-2 fas fa-sign-out-alt"></i>
                        <button type="submit">Logout</button>
                    </form>
                </a>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6 ml-64 overflow-y-auto">
            <header class="flex items-center justify-between pb-4 mb-4 border-b">
                <h1 class="text-2xl font-semibold text-gray-700">Admin Dashboard</h1>
            </header>

        
            <!-- Orders Table -->
            <div class="mt-6 bg-white rounded-lg shadow-md">
                <div class="p-6">
                    <h2 class="mb-4 text-xl font-semibold text-gray-700">Products</h2>
                    <div class="h-64 overflow-y-scroll border border-gray-200 rounded-lg">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="text-gray-700 bg-gray-100 border-b border-gray-200">
                                    <th class="px-6 py-3 ">Seller</th>
                                    <th class="px-6 py-3 ">Item</th>
                                    <th class="px-6 py-3 ">Quantity</th>
                                    <th class="px-6 py-3 ">Quality Level</th>
                                    <th class="px-6 py-3 ">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="px-6 py-3 text-gray-700">Hirusha Gamage</td>
                                    <td class="px-6 py-3 text-gray-700">Carrot</td>
                                    <td class="px-6 py-3 text-gray-700">50Kg</td>
                                    <td class="px-6 py-3 text-gray-700">Human Consumption</td>
                                    <td class="px-6 py-3 text-gray-700">
                                        <button class="px-4 py-2 mr-2 text-white bg-green-500 rounded hover:bg-green-600">Approve</button>
                                    </td>
                                </tr>
                                
                                <!-- Additional rows can be added here -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>    
        </main>
    </div>

    <!-- Fixed Footer Section -->
    <footer class="fixed bottom-0 left-0 w-full py-4 text-center text-white bg-green-700">
        <p>&copy; 2024 Your Company. All rights reserved.</p>
    </footer>
    
    <!-- Custom JavaScript -->
    <script src="{{ asset('panel/js/script.js') }}"></script>
</body>

</html>

 --}}
