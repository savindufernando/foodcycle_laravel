<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-Dashboard</title>

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
                <a href="/" class="font-semibold text-black hover:text-green-800">Home</a>
                <a href="/shop" class="font-semibold text-black hover:text-green-800">Shop</a>
                <a href="/Donation" class="font-semibold text-black hover:text-green-800">Donation</a>
                <a href="/service" class="font-semibold text-black hover:text-green-800">Services</a>
                <a href="#" class="font-semibold text-black hover:text-green-800">Contact Us</a>
            </nav>

            <!-- Seller Button and Icons -->
            <div class="flex items-center space-x-4">
                @if (Route::has('admin.register'))              
                <a href="{{ route('admin.register') }}" class="px-4 py-2 text-white bg-green-600 rounded">Seller</a>
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
            <a href="/Donation" class="block py-2 text-black">Donation</a>
            <a href="/service" class="block py-2 text-black">Services</a>
            <a href="#" class="block py-2 text-black">Contact Us</a>
        </div>
    </header>

    <!-- Layout -->
    <div class="flex flex-1 pt-24">
        <!-- Sidebar -->
        <aside class="fixed top-16 left-0 flex flex-col justify-between w-64 h-[calc(100vh-7rem)] bg-white shadow pt-10">
            <!-- Navigation Links -->
            <nav class="p-6 space-y-4">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center text-gray-600 hover:text-green-600">
                    <i class="mr-3 fas fa-home"></i> Dashboard
                </a>
                <a href="{{ route('admin.viewproduct') }}" class="flex items-center text-gray-600 hover:text-green-600">
                    <i class="mr-3 fas fa-shopping-cart"></i> View Products
                </a>
                <a href="ViewAdmin" class="flex items-center text-gray-600 hover:text-green-600">
                    <i class="mr-3 fa-solid fa-clipboard"></i> Orders
                </a>

                <a href="{{ route('admin.expiredproducts') }}" class="flex items-center text-gray-600 hover:text-green-600">
                    <i class="mr-3 fas fa-shopping-cart"></i> Expired Products
                </a>
            </nav>

            <!-- Logout Button -->
            <div class="p-6">
                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="flex items-center justify-center w-full px-4 py-2 text-white bg-red-500 rounded hover:bg-red-600">
                        <i class="mr-2 fas fa-sign-out-alt"></i> <!-- Icon placed inside the button -->
                        Logout
                    </button>
                </form>
            </div>
        </aside>