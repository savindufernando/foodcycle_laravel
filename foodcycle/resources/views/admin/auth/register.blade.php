<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Fresh Cycle</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('panel/css/style.css') }}">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
</head>
<body class="overflow-hidden">

        <!-- Header Section -->
        @include('layouts.header')
        
        <section class="flex items-center justify-center h-screen bg-center bg-cover" style="background-image: url('{{ asset('panel/image/login.png') }}');">
                <div class="absolute inset-0 bg-black/60"></div>
            
                <!-- Sign Up Form Container -->
                <div class="relative z-10 flex flex-col w-full max-w-4xl mb-20 bg-white rounded-lg shadow-lg md:flex-row bg-opacity-80 backdrop">
                        <!-- Left Side - Form -->
                        <div class="w-full p-8 md:w-1/2">
                            <h2 class="mb-4 text-3xl font-bold text-gray-900">Register As a Seller</h2>
                            <p class="mb-6 text-gray-600">Already have an account? <a class="text-blue-500" href="{{ route('admin.login') }}">
                                {{ __('Log in') }}
                            </a> </p>

                            <!-- Form Fields -->
                            <form method="POST" action="{{ route('admin.register') }}">
                                @csrf
                                    
                                    <!-- Name -->
                                    <div class="mb-4">
                                        <input id="name" class="w-full p-3 mt-1 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Name" />
                                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                    </div>
                                    
                                    
                                    <!-- Email Address -->
                                    <div class="mt-4">
                                       
                                        <input id="email" class="w-full p-3 mt-1 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="Username Or Email" />
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    </div>

                                    <!-- Password -->
                                    <div class="mt-4">
                                       

                                        <input id="password" class="w-full p-3 mt-1 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" placeholder="Password"
                                                        type="password"
                                                        name="password"
                                                        required autocomplete="new-password" />

                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                    </div>

                                    <!-- Confirm Password -->
                                    <div class="my-4">
       

                                        <input id="password_confirmation" class="w-full p-3 mt-1 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" placeholder="Re-Password"
                                                        type="password"
                                                        name="password_confirmation" required autocomplete="new-password" />

                                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                    </div>      
                                    
                                    <button type="submit" class="w-full py-3 font-bold text-white transition duration-300 bg-green-600 rounded-lg hover:bg-green-700 ">
                                        {{ __('Sign Up') }}
                                    </button>
            
                            </form>
                        </div>

                        <!-- Right side - Background image -->
                        <div class="hidden w-0 rounded-lg md:block md:w-1/2">
                                <img src="{{ asset('panel/image/login.png') }}" alt="Field Image" class="object-cover w-full h-full rounded-r-lg">
                        </div> 
             </div>
    </section>

        <!--Custom js-->
        <script src="{{ asset('panel/js/script.js') }}"></script>
</body>
</html>


