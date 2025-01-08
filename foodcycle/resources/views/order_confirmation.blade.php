<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Confirmation</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        .fade-in {
            animation: fadeIn 1s ease-in-out;
        }
        .glow {
            box-shadow: 0 0 20px rgba(59, 130, 246, 0.6);
        }
        .gradient-border {
            border: 2px solid;
            border-image: linear-gradient(to right, #4f46e5, #6d28d9) 1;
        }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen bg-gradient-to-br from-indigo-500 via-purple-600 to-pink-500">
    <div class="max-w-lg p-8 mx-auto bg-white rounded-lg shadow-xl fade-in gradient-border">
        <!-- Header Section -->
        <div class="flex flex-col items-center mb-8">
            <img src="https://img.icons8.com/fluency/96/000000/checked.png" alt="Success Icon" class="mb-4">
            <h1 class="text-4xl font-extrabold text-gray-800">Payment Successful!</h1>
            <p class="mt-2 text-lg text-center text-gray-600">Thank you for your purchase, <strong>{{ $payment->name }}</strong>!</p>
            <p class="text-center text-gray-500">A payment to <strong>Stripe</strong> will appear on your statement.</p>
        </div>
        
        <!-- Payment Details Section -->
        <div class="p-6 mb-6 rounded-lg shadow-md bg-gray-50">
            <p class="mb-4 text-lg font-semibold text-gray-700">Payment Details:</p>
            <div class="flex items-center justify-between mb-3">
                <span class="text-gray-500">Order ID:</span>
                <span class="font-medium text-gray-800">{{ $payment->id }}</span>
            </div>
            <div class="flex items-center justify-between mb-3">
                <span class="text-gray-500">Amount Paid:</span>
                <span class="font-medium text-gray-800">Rs.{{ number_format($finalTotal, 2) }}</span>
            </div>
            <div class="flex items-center justify-between">
                <span class="text-gray-500">Payment Method:</span>
                <span class="font-medium text-gray-800">{{ $payment->payment_method }}</span>
            </div>
        </div>

        <!-- Call-to-Action Button -->
        <form action="{{ route('home') }}" method="GET">
            @csrf
            <button type="submit" class="w-full px-6 py-3 text-white transition duration-300 ease-in-out bg-blue-600 rounded-lg shadow-md hover:bg-blue-700 focus:ring focus:ring-blue-300 focus:outline-none">
                Return to Home
            </button>
        </form>
    </div>
</body>
</html>
