<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Storage Provider Register</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
</head>

<body class="text-gray-900 bg-gray-100">

  <!-- Header -->
  <header class="fixed top-0 z-50 w-full py-4 text-white bg-black">
    <div class="flex items-center justify-between max-w-6xl px-4 mx-auto md:px-8">
      <div class="text-lg font-bold">Storage Provider</div>
      <!-- Desktop Navigation -->
      <nav class="hidden space-x-8 md:flex">
        <a href="{{ route('service.delivery') }}" class="hover:underline">Delivery</a>
        <a href="{{ route('service.storage') }}" class="hover:underline">Storage</a>
        <a href="/" class="hover:underline">Home</a>
      </nav>
      <!-- Mobile Menu Button -->
      <button id="menu-button" class="md:hidden focus:outline-none">
        <svg class="w-6 h-6" fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"/>
        </svg>
      </button>
    </div>
    <!-- Mobile Navigation -->
    <nav id="mobile-menu" class="hidden p-4 space-y-4 text-white bg-black md:hidden">
      <a href="{{ route('service.delivery') }}" class="block hover:underline">Delivery</a>
      <a href="{{ route('service.storage') }}" class="block hover:underline">Storage</a>
      <a href="/" class="block hover:underline">Home</a>
    </nav>
  </header>

  <!-- Main Content Section -->
  <section class="flex items-center justify-center min-h-screen pt-16 bg-gray-100">
    <!-- Main content with form and image -->
    <div class="relative z-10 flex flex-col w-full max-w-4xl overflow-hidden bg-white rounded-lg shadow-lg md:flex-row">
      <!-- Left side - Login form -->
      <div class="w-full p-8 md:w-1/2">
        <h2 class="mb-4 text-3xl font-bold">Storage Provider Register</h2>
  
        <form action="{{ route('storage.signup') }}" method="POST">
            @csrf
    
            <!-- Name -->
            <div>
                <label for="name" class="block text-gray-700">Name</label>
                <input id="name" type="text" name="name" class="w-full p-3 mt-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" required autofocus autocomplete="name">
            </div>
    
            <!-- Email Address -->
            <div class="mt-4">
                <label for="email" class="block text-gray-700">Email</label>
                <input id="email" type="email" name="email" class="w-full p-3 mt-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" required>
            </div>
    
            <!-- Password -->
            <div class="mt-4">
                <label for="password" class="block text-gray-700">Password</label>
                <input id="password" type="password" name="password" class="w-full p-3 mt-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" required>
            </div>
    
            <!-- Confirm Password -->
            <div class="mt-4">
                <label for="password_confirmation" class="block text-gray-700">Confirm Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" class="w-full p-3 mt-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" required>
            </div>
    
            <div class="flex items-center justify-between mt-4">
                <a class="text-sm text-gray-600 underline hover:text-gray-900" href="{{ route('storage.login') }}">Already registered?</a>
                <button type="submit" class="px-6 py-2 font-bold text-white bg-blue-600 rounded-lg hover:bg-blue-700">Register</button>
            </div>
        </form>
      </div>
  
      <!-- Right side - Background image -->
      <div class="hidden w-0 rounded-lg md:block md:w-1/2">
        <img src="{{ asset('panel/image/login.png') }}" alt="Field Image" class="object-cover w-full h-full rounded-r-lg">
      </div>
    </div>
  </section>

</body>
</html>
