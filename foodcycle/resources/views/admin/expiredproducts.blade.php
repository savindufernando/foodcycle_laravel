@include('admin.layouts.sidebar')

<!-- Main Content -->
<main class="container mx-auto p-8">
    <h1 class="mb-6 text-3xl font-bold text-center">Expired Products</h1>

    @if ($expiredProducts->isEmpty())
        <p class="text-center text-gray-600">No expired products available at the moment.</p>
    @else
        <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
            @foreach ($expiredProducts as $product)
                <div class="p-4 bg-white border rounded-lg shadow-md">
                    <!-- Product Image -->
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover rounded">
                    
                    <!-- Product Details -->
                    <div class="mt-4">
                        <h2 class="text-xl font-semibold">{{ $product->name }}</h2>
                        <p class="text-gray-500">Category: {{ ucfirst($product->category) }}</p>
                        <p class="mt-2 text-lg font-bold text-red-600">Expired Price: Rs. {{ number_format($product->price, 2) }}</p>
                    </div>

                    <!-- Expired Status -->
                    <div class="mt-4">
                        <span class="block px-4 py-2 text-white bg-gray-500 rounded text-center">
                            Expired
                        </span>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</main>

<!-- Fixed Footer Section -->
<footer class="fixed bottom-0 left-0 w-full py-4 text-center text-white bg-green-700">
        <p>&copy; 2024 Food Cycle. All rights reserved.</p>
    </footer>

</body>
</html>
