<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
</head>
<body class="bg-gray-100">
     <!-- Header Section -->
     @include('layouts.header')
    <div class="flex items-center justify-center min-h-screen">
        <!-- Login Card -->
        <div class="w-full max-w-md p-6 bg-white rounded-lg shadow-md">
            <h2 class="mb-6 text-2xl font-bold text-center text-gray-800">Sign In to Your Account</h2>
            <form action="{{ route('donation.login') }}" method="POST">
                <!-- CSRF Token -->
                <!-- Uncomment the line below in a Laravel app -->
                @csrf
                <!-- Email Field -->
                <div class="mb-4">
                    <label for="email" class="block mb-2 font-medium text-gray-700">Email</label>
                    <input
                        id="email"
                        name="email"
                        type="email"
                        required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent"
                        placeholder="Enter your email"
                    />
                </div>

                <!-- Password Field -->
                <div class="mb-4">
                    <label for="password" class="block mb-2 font-medium text-gray-700">Password</label>
                    <input
                        id="password"
                        name="password"
                        type="password"
                        required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent"
                        placeholder="Enter your password"
                    />
                    @if($errors->has('email'))
                       <div class="text-red-600 text-sm mt-1">{{ $errors->first('email') }}</div>
                    @endif
                </div>

                <!-- Submit Button -->
                <button
                    type="submit"
                    class="w-full px-4 py-2 font-medium text-white bg-green-500 rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-opacity-50"
                >
                    Sign In
                </button>
            </form>

            <!-- Additional Links -->
            <div class="mt-6 text-center">
                <p class="text-sm text-gray-700">
                    Don't have an account? 
                    <a href="{{ route('donation.signup') }}" class="text-teal-600 hover:underline">Register</a>
                </p>
                <p class="mt-2 text-sm text-gray-700">
                    <a href="/password/reset" class="text-teal-600 hover:underline">Forgot your password?</a>
                </p>
            </div>
        </div>
    </div>
    <!-- Footer Section -->
    <div class="mt-10">
        @include('layouts.footer')
    </div>
</body>
</html>
