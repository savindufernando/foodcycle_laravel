<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delivery Provider Login</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />

    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('panel/css/style.css') }}">
</head>

<body class="text-gray-900 bg-gray-100">

  <!-- Header -->
  <header class="fixed top-0 z-50 w-full py-4 text-white bg-black">
    <div class="flex items-center justify-between max-w-6xl px-4 mx-auto md:px-8">
      <div class="text-lg font-bold">Delivery Provider</div>
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
  <section class="flex items-center justify-center min-h-screen pt-16 bg-gray-100 bg-center bg-cover">
    <!-- Main content with form and image -->
    <div class="relative z-10 flex flex-col w-full max-w-4xl overflow-hidden bg-white rounded-lg shadow-lg md:flex-row">
      <!-- Left side - Login form -->
      <div class="w-full p-8 md:w-1/2">
        <h2 class="mb-4 text-3xl font-bold">Delivery Provider Login</h2>
  
        <x-auth-session-status class="mb-4" :status="session('status')" />
  
        <!-- Form -->
        <form action="{{ route('delivery.login') }}" method="POST">
          @csrf
  
          <!-- Email Address -->
          <div class="mb-4">
            <x-input-label for="email" :value="__('Email')" class="block text-gray-700" />
            <x-text-input id="email" class="w-full p-3 mt-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" 
              type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Username Or Email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
          </div>
  
          <!-- Password -->
          <div class="mb-4">
            <x-input-label for="password" :value="__('Password')" class="block text-gray-700" />
            <x-text-input id="password" class="w-full p-3 mt-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" 
              type="password" name="password" required autocomplete="current-password" placeholder="Password"/>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
          </div>
  
          <!-- Remember Me -->
          <div class="flex items-center justify-between mb-4">
            <label for="remember_me" class="flex items-center">
              <input id="remember_me" type="checkbox" class="text-blue-500 form-checkbox" name="remember">
              <span class="ml-2 text-gray-600">{{ __('Remember me') }}</span>
            </label>
          </div>
          <p class="mb-6 text-gray-600">Don't have an account? <a class="text-blue-500" href="{{ route('delivery.signup') }}">
            {{ __('Create an account') }}
          </a></p>
  
          <!-- Login Button -->
          <button type="submit" class="w-full py-3 font-bold text-white transition duration-300 bg-blue-600 rounded-lg hover:bg-blue-700">
            {{ __('Log in') }}
          </button>
        </form>
      </div>
  
      <!-- Right side - Background image -->
      <div class="hidden w-0 rounded-lg md:block md:w-1/2">
        <img src="{{ asset('panel/image/login.png') }}" alt="Login Background" class="object-cover w-full h-full rounded-r-lg">
      </div>
    </div>
  </section>
  
  <!-- Custom JS -->
  <script src="{{ asset('panel/js/script.js') }}"></script>

</body>
</html>
