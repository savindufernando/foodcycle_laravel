<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultant Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
@include('layouts.bheader')
<body class="bg-gray-100">
    <div class="flex items-center justify-center min-h-screen">
        <div class="w-full max-w-sm p-6 bg-white rounded-lg shadow-lg">
            <!-- Heading -->
            <h1 class="mb-6 text-2xl font-bold text-center text-green-600">Login as a Consultant</h1>
            
            <!-- Login Form -->
            <form action="{{ route('consultant.login') }}" method="POST" class="space-y-4">
                @csrf
                <!-- Email Field -->
                <div>
                    <label for="email" class="block mb-2 font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email" placeholder="Email" required 
                           class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-green-600">
                </div>

                <!-- Password Field -->
                <div>
                    <label for="password" class="block mb-2 font-medium text-gray-700">Password</label>
                    <input type="password" id="password" name="password" placeholder="Password" required 
                           class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-green-600">
                </div>

                <!-- Submit Button -->
                <div>
                    <button type="submit" 
                            class="w-full px-4 py-2 text-white bg-green-600 rounded hover:bg-green-700 focus:outline-none">
                        Login
                    </button>
                </div>
            </form>

            <!-- Register Link -->
            <p class="mt-6 text-center text-gray-600">
                Don't have an account? 
                <a href="{{ route('consultant.registerForm') }}" class="text-green-600 hover:underline">Register here</a>
            </p>
        </div>
    </div>
</body>
</html>
