<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Non-Profit Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
</head>
<body class="bg-gray-50 min-h-screen flex flex-col">

    <!-- Header Section -->
    <header class="py-4 bg-white shadow-sm">
        <div class="container mx-auto px-4 flex items-center justify-between">
            <a href="{{ route('donation.dashboard') }}" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600 text-sm md:text-base">Requests</a>
            <h1 class="text-lg md:text-xl font-bold text-gray-800">
                Welcome, <span class="text-green-500">{{ auth()->guard('donation')->user()->orgname }}</span>
            </h1>
            <a href="{{ route('donation.logout') }}" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600 text-sm md:text-base">Logout</a>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow container mx-auto px-4 py-6">
        {{-- Self Dropoff Section --}}
        <section class="mb-12">
            <h2 class="text-xl md:text-2xl font-bold text-white mb-4 p-4 bg-green-400 rounded">Self Dropoff Donations</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($donors as $donor)
                    @if (Str::startsWith($donor->schedule, 'Drop-off Scheduled:'))
                        <div class="p-6 bg-white rounded-lg shadow-md border border-gray-200 hover:shadow-lg transition">
                        {{-- Food Request Section --}}
                        @if ($donor->foodRequest)
                        <div class="mb-4 p-4 bg-blue-50 border-l-4 border-blue-400 rounded">
                            <p class="text-sm text-blue-700"><strong>Campaign:</strong> {{ $donor->foodRequest->title }}</p>
                            <p class="text-sm text-blue-700"><strong>Request Date:</strong> {{ $donor->foodRequest->created_at->format('d M, Y') }}</p>
                        </div>
                        @endif

                            {{-- Donor Details --}}
                            <h3 class="text-lg font-semibold text-gray-800 mb-4">Donor Details</h3>
                            <div class="space-y-2 text-gray-600">
                                <p><strong>Name:</strong> {{ $donor->donor_name }}</p>
                                <p><strong>Email:</strong> <a href="mailto:{{ $donor->donor_email }}" class="text-blue-500 hover:underline">{{ $donor->donor_email }}</a></p>
                                <p><strong>Phone:</strong> <a href="tel:{{ $donor->phone_number }}" class="text-blue-500 hover:underline">{{ $donor->phone_number }}</a></p>
                            </div>

                            {{-- Items --}}
                            <div class="mt-4">
                                <p class="font-medium text-gray-800">Items:</p>
                                <ul class="list-disc list-inside text-gray-600 mt-2">
                                    @if (is_array($donor->items))
                                        @foreach ($donor->items as $item)
                                            <li>{{ $item['name'] }} - {{ $item['quantity'] }}</li>
                                        @endforeach
                                    @else
                                        <li>No items provided</li>
                                    @endif
                                </ul>
                            </div>

                            {{-- Delivery Status --}}
                            <div class="mt-4">
                                <p>
                                    <strong>Delivery Status:</strong>
                                    @if ($donor->delivery_status)
                                    <span class="text-green-600 font-semibold">Delivered</span>
                                    @else
                                    <span class="text-red-600 font-semibold">Pending</span>
                                    @endif
                                </p>
                            </div>

                            {{-- Mark as Delivered --}}
                            <form action="{{ route('donors.deliver', $donor->id) }}" method="POST" class="mt-4">
                                @csrf
                                @method('PATCH')
                                @if (!$donor->delivery_status==1)
                                    <button type="submit" 
                                            class="w-full px-4 py-2 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-600 transition">
                                        Set as Delivered
                                    </button>
                                @else
                                    <button type="button" 
                                            class="w-full px-4 py-2 bg-gray-400 text-white font-semibold rounded-lg shadow-md cursor-not-allowed" 
                                            disabled>
                                        Already Delivered
                                    </button>
                                @endif
                            </form>
                        </div>
                    @endif
                @endforeach
            </div>
        </section>

        {{-- Pickup Requested Section --}}
        <section>
            <h2 class="text-xl md:text-2xl font-bold text-white mb-4 p-4 bg-green-400 rounded">Pickup Requested Donations</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($donors as $donor)
                    @if (!Str::startsWith($donor->schedule, 'Drop-off Scheduled:'))
                        <div class="p-6 bg-white rounded-lg shadow-md border border-gray-200 hover:shadow-lg transition">
                            {{-- Food Request Section --}}
                        @if ($donor->foodRequest)
                        <div class="mb-4 p-4 bg-blue-50 border-l-4 border-blue-400 rounded">
                            <p class="text-sm text-blue-700"><strong>Campaign:</strong> {{ $donor->foodRequest->title }}</p>
                            <p class="text-sm text-blue-700"><strong>Request Date:</strong> {{ $donor->foodRequest->created_at->format('d M, Y') }}</p>
                        </div>
                        @endif

                            {{-- Donor Details --}}
                            <h3 class="text-lg font-semibold text-gray-800 mb-4">Donor Details</h3>
                            <div class="space-y-2 text-gray-600">
                                <p><strong>Name:</strong> {{ $donor->donor_name }}</p>
                                <p><strong>Email:</strong> <a href="mailto:{{ $donor->donor_email }}" class="text-blue-500 hover:underline">{{ $donor->donor_email }}</a></p>
                                <p><strong>Phone:</strong> <a href="tel:{{ $donor->phone_number }}" class="text-blue-500 hover:underline">{{ $donor->phone_number }}</a></p>
                            </div>

                            {{-- Items --}}
                            <div class="mt-4">
                                <p class="font-medium text-gray-800">Items:</p>
                                <ul class="list-disc list-inside text-gray-600 mt-2">
                                    @if (is_array($donor->items))
                                        @foreach ($donor->items as $item)
                                            <li>{{ $item['name'] }} - {{ $item['quantity'] }}</li>
                                        @endforeach
                                    @else
                                        <li>No items provided</li>
                                    @endif
                                </ul>
                            </div>

                            {{-- Address --}}
                            <div class="mt-4">
                                <p><strong>Address:</strong> <span class="text-gray-600">{{ $donor->schedule }}</span></p>
                            </div>
                            {{-- Delivery Status --}}
                            <div class="mt-4">
                                <p>
                                    <strong>Delivery Status:</strong>
                                    @if ($donor->delivery_status==1)
                                    <span class="text-green-600 font-semibold">Delivered</span>
                                    @else
                                    <span class="text-red-600 font-semibold">Pending</span>
                                    @endif
                                </p>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="py-4 bg-gray-200 text-center text-gray-600">
        © 2024 Food Cycle. All rights reserved.
    </footer>
</body>
</html>
