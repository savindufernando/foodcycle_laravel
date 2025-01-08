<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Successful</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="flex items-center justify-center min-h-screen bg-gradient-to-r from-blue-500 to-purple-600">
        <div class="max-w-xl mx-auto overflow-hidden bg-white shadow-2xl rounded-2xl">
            <!-- Header -->
            <div class="p-6 text-center text-white bg-gradient-to-r from-green-400 to-blue-500">
                <img src="https://img.icons8.com/fluency/96/000000/checked.png" alt="Success Icon" class="mx-auto mb-4">
                <h1 class="text-2xl font-extrabold">Payment Successful</h1>
                <p class="text-lg font-medium">Thank you for your payment!</p>
            </div>

            <!-- Body -->
            <div class="p-8">
                <p class="mb-6 text-lg text-gray-700">
                    Hello <span class="font-semibold text-gray-900">{{ $payment->name }}</span>,
                    <br>We’re delighted to let you know that your payment has been processed successfully. Below are the details:
                </p>

                <!-- Details Section -->
                <div class="p-6 space-y-4 rounded-lg shadow-sm bg-gray-50">
                    <div class="flex justify-between">
                        <span class="font-medium text-gray-500">Name:</span>
                        <span class="font-bold text-gray-800">{{ $payment->name }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="font-medium text-gray-500">Email:</span>
                        <span class="font-bold text-gray-800">{{ $payment->email }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="font-medium text-gray-500">Address:</span>
                        <span class="font-bold text-gray-800">{{ $payment->address }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="font-medium text-gray-500">City:</span>
                        <span class="font-bold text-gray-800">{{ $payment->city }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="font-medium text-gray-500">Phone:</span>
                        <span class="font-bold text-gray-800">{{ $payment->phone }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="font-medium text-gray-500">Postal Code:</span>
                        <span class="font-bold text-gray-800">{{ $payment->postal_code }}</span>
                    </div>
                    <div class="flex justify-between pt-4 mt-4 border-t">
                        <span class="font-medium text-gray-500">Total Price:</span>
                        <span class="text-lg font-extrabold text-gray-900">Rs.{{ number_format($finalTotal, 2) }}</span>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="p-6 text-center bg-gray-100">
                <p class="mb-4 text-gray-600">
                    We appreciate your business and look forward to serving you again.
                </p>
                
            </div>
        </div>
    </div>
</body>
</html>
