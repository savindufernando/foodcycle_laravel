<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fresh Cycle</title>
     <link rel="stylesheet" type="text/css" href="{{ asset('panel/css/style.css') }}">

     <!-- Tailwind CSS -->
     <script src="https://cdn.tailwindcss.com"></script>

    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('panel/css/style.css') }}">

     <!-- Font Awesome -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" /> 

</head>
<body class="overflow-hidden">
        
        <!-- Header Section -->
        @include('layouts.header')

        <!-- Main content -->
        <section class="flex items-center justify-center h-screen bg-center bg-cover" style="background-image: url('{{ asset('panel/image/login.png') }}');" >
                <div class="absolute inset-0 bg-black/60"></div>
                
                <!-- Main content with form and image -->
                <div class="relative z-10 flex flex-col w-full max-w-4xl mb-16 overflow-hidden bg-white rounded-lg shadow-lg md:flex-row bg-opacity-80 backdrop">
                        <!-- Left side - Login form -->
                        <div class="w-full p-8 md:w-1/2">
                                <h2 class="mb-4 text-3xl font-bold">Admin Login</h2>
                                

                                <x-auth-session-status class="mb-4" :status="session('status')" />
                                
                                <!-- Form -->
                                <form method="POST" action="{{ route('teacher.login') }}">

                                        @csrf

                                        <!-- Email Address -->
                                        <div class="mb-4">
                                                <x-input-label for="email" :value="__('Email')" class="block text-gray-700" />
                                                <x-text-input id="email" class="w-full p-3 mt-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Username Or Email" />
                                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                        </div>


                                        <!-- Password -->
                                        <div class="mb-4">
                                                <x-input-label for="password" :value="__('Password')" class="block text-gray-700"/>

                                                <x-text-input id="password" class="w-full p-3 mt-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                                                                type="password"
                                                                                name="password"
                                                                                required autocomplete="current-password" placeholder="Password"/>

                                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                        </div>


                                        <!-- Remember Me -->
                                        <div class="flex items-center justify-between mb-4">
                                                <label for="remember_me" class="flex items-cente">
                                                        <input id="remember_me" type="checkbox" class="text-blue-500 form-checkbox" name="remember">
                                                        <span class="ml-2 text-gray-600">{{ __('Remember me') }}</span>
                                                </label>
                                                @if (Route::has('password.request'))
                                                        <a class="text-gray-500 hover:underline" href="{{ route('password.request') }}">
                                                                {{ __('Forgot your password?') }}
                                                        </a>
                                                @endif
                                        </div>

                                        <!-- Login Button -->
                                        <button type="submit" class="w-full py-3 font-bold text-white transition duration-300 bg-blue-600 rounded-lg hover:bg-blue-700">
                                                {{ __('Log in') }}
                                        </button>
                                </form>

                                
                        </div>

                        <!-- Right side - Background image -->
                        <div class="hidden w-0 rounded-lg md:block md:w-1/2">
                                <img src="{{ asset('panel/image/login.png') }}" alt="Field Image" class="object-cover w-full h-full rounded-r-lg">
                          </div> 
                </div>
    </section>
    

<!-- Custom JS -->
<script src="{{ asset('panel/js/script.js') }}"></script>


</body>
</html>



