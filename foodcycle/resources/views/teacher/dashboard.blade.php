@include('teacher.layouts.sidebar')

<!-- Main Content -->
<main class="flex-1 p-6 ml-64 overflow-y-auto">
    <header class="flex items-center justify-between pb-4 mb-4 border-b">
        <h1 class="text-2xl font-semibold text-gray-700">Admin Dashboard</h1>
    </header>

    <!-- Products Table -->
    <div class="mt-6 bg-white rounded-lg shadow-md">
        <div class="p-6">
            <h2 class="mb-4 text-xl font-semibold text-gray-700">Products</h2>

            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            <div class="h-64 overflow-y-scroll border border-gray-200 rounded-lg">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="text-gray-700 bg-gray-100 border-b border-gray-200">
                            <th class="px-6 py-3">Product Name</th>
                            <th class="px-6 py-3">Category</th>
                            <th class="px-6 py-3">Price</th>
                            <th class="px-6 py-3">Added By</th>
                            <th class="px-6 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-6 py-3 text-gray-700">{{ $product->name }}</td>
                            <td class="px-6 py-3 text-gray-700">{{ $product->category }}</td>
                            <td class="px-6 py-3 text-gray-700">Rs.{{ $product->price }}</td>
                            <td class="px-6 py-3 text-gray-700">{{ $product->admin ? $product->admin->name : 'Unknown' }}</td>
                            <td class="px-6 py-3 text-gray-700">
                                <!-- Approve Button -->
                                <form action="{{ route('teacher.approve', $product->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    <button type="submit" class="px-4 py-2 mr-2 text-white bg-green-500 rounded hover:bg-green-600">Approve</button>
                                </form>

                                <!-- Reject Button -->
                                <form action="{{ route('teacher.reject', $product->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    <button type="submit" onclick="return confirm('Are you sure you want to reject this product?')" class="px-4 py-2 mr-2 text-white bg-yellow-500 rounded hover:bg-yellow-600">Reject</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<!-- Footer Section -->
<footer class="fixed bottom-0 left-0 w-full py-4 text-center text-white bg-green-700">
    <p>&copy; 2024 Food Cycle. All rights reserved.</p>
</footer>

<!-- Custom JavaScript -->
<script src="{{ asset('panel/js/script.js') }}"></script>
</body>
</html>
