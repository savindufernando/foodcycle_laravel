<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subscribe to Our Newsletter</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }
    </style>
</head>
<body class="bg-white-100">

    <!-- Include header -->
    @include('layouts.header')
    <br>

    <!-- Newsletter Section -->
    <div class="min-h-screen flex items-center justify-center">
        <div class="container mx-auto px-6 py-12 bg-white shadow-lg rounded-lg max-w-lg">
            <!-- Newsletter Image -->
            <img src="{{ asset('panel/image/newsletter.png') }}" alt="Newsletter Icon" class="w-auto mx-auto mb-6">

            <!-- Title -->
            <h1 class="text-2xl font-bold mb-4 text-center">Subscribe To Our Newsletter</h1>

            <!-- Description -->
            <p class="text-gray-600 text-sm leading-relaxed mb-6 text-center">
                FoodCycle Consulting is committed to protecting and respecting your privacy. We’ll only use your personal information to administer your account and provide the products and services you requested. From time to time, we would like to contact you about our products and services, as well as other content that may be of interest to you. Please tick below if you consent to us contacting you for this purpose.
            </p>

            <!-- Form -->
            <form action="{{ route('newsletter.subscribe') }}" method="POST" class="space-y-4">
                @csrf

                <!-- Email input -->
                <div>
                    <input type="email" id="email" name="email" placeholder="Enter your email" value="{{ old('email') }}" required 
                        class="w-full border border-gray-300 rounded-md p-3 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 @error('email') border-red-500 @enderror">
                    <!-- Error message for email -->
                    @error('email')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Consent checkbox -->
                <div class="flex items-start space-x-2">
                    <input type="checkbox" name="consent" id="consent" {{ old('consent') ? 'checked' : '' }} required 
                        class="mt-1 border-gray-300 rounded text-blue-500 focus:ring-blue-500 @error('consent') border-red-500 @enderror">
                    <label for="consent" class="text-sm text-gray-700">
                        I agree to receive communications from Agritecture.
                    </label>
                </div>
                <!-- Error message for consent -->
                @error('consent')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror

                <!-- Privacy notice -->
                <p class="text-xs text-gray-500">
                    You may unsubscribe from these communications at any time. For more information, please review our Privacy Policy.
                </p>

                <!-- Submit button -->
                <button type="submit" 
                    class="w-full bg-blue-500 text-white py-2 px-4 rounded-md font-medium hover:bg-blue-600 transition">
                    Subscribe
                </button>

                <!-- Success or error message display -->
                <div class="message mt-4">
                    @if(session('success'))
                        <p class="text-green-600 text-sm">{{ session('success') }}</p>
                    @endif

                    @if(session('error'))
                        <p class="text-red-600 text-sm">{{ session('error') }}</p>
                    @endif
                </div>
            </form>
        </div>
    </div>
    <br>

    <!-- Include footer -->
    @include('layouts.footer')

</body>
</html>
