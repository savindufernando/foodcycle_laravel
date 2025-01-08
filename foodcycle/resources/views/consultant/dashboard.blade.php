<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultant Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        function showPopup(requestId) {
            const modal = document.getElementById('cancel-modal-' + requestId);
            modal.classList.remove('hidden');
        }

        function closePopup(requestId) {
            const modal = document.getElementById('cancel-modal-' + requestId);
            modal.classList.add('hidden');
        }
    </script>
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex flex-col">
        <!-- Header -->
        <header class="bg-blue-600 text-white py-4 shadow-md">
            <div class="container mx-auto px-4 flex justify-between items-center">
                <h1 class="text-2xl font-bold">Consultant Dashboard</h1>
                <form action="{{ route('consultant.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded">Logout</button>
                </form>
            </div>
        </header>

        <!-- Main Content -->
        <main class="container mx-auto px-4 py-8">
            <h2 class="text-xl font-semibold text-gray-700 mb-4">Service Requests</h2>

            <!-- Success Message -->
            @if (session('success'))
                <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Requests List -->
            @if ($requests->isEmpty())
                <p class="text-gray-600">No service requests found.</p>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($requests as $request)
                        <div class="bg-white shadow-md rounded p-4 relative">
                            <h3 class="text-lg font-semibold text-gray-800">
                                {{ $request->first_name }} {{ $request->last_name }}
                            </h3>
                            <p class="text-sm text-gray-600"><strong>Email:</strong> {{ $request->email }}</p>
                            <p class="text-sm text-gray-600"><strong>Phone:</strong> {{ $request->phone_number }}</p>
                            <p class="text-sm text-gray-600"><strong>City:</strong> {{ $request->city }}, {{ $request->state }}</p>
                            <p class="text-sm text-gray-600"><strong>Country:</strong> {{ $request->country }}</p>
                            <p class="text-sm text-gray-600"><strong>Company Name:</strong> {{ $request->company_name }}</p>
                            <p class="text-sm text-gray-600"><strong>Company Website:</strong> {{ $request->company_website }}</p>
                            <p class="text-sm text-gray-600"><strong>Description:</strong> {{ $request->company_description }}</p>
                            <p class="text-sm text-gray-600"><strong>How Did You Hear About Us:</strong> {{ $request->heard_about_us }}</p>
                            <p class="text-sm text-gray-600"><strong>Services of Interest:</strong> {{ $request->services_of_interest }}</p>
                            <p class="text-sm text-gray-600"><strong>Project Location:</strong> {{ $request->project_location }}</p>
                            <p class="text-sm text-gray-600"><strong>Start Date:</strong> {{ $request->project_start_date }}</p>
                            <p class="text-sm text-gray-600"><strong>Project Description:</strong> {{ $request->project_description }}</p>
                            <p class="text-sm text-gray-600"><strong>Status:</strong>
                                <span class="{{ $request->status === 'pending' ? 'text-yellow-500' : 'text-green-500' }}">
                                    {{ ucfirst($request->status) }}
                                </span>
                            </p>

                            <!-- Buttons -->
                            @if ($request->status === 'pending')
                                <form action="{{ route('requests.accept', $request->id) }}" method="POST" class="mt-4">
                                    @csrf
                                    <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">
                                        Accept Request
                                    </button>
                                </form>
                            @else
                                <button type="button" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded mt-4" onclick="showPopup({{ $request->id }})">
                                    Unaccept Request
                                </button>

                                <!-- Popup Modal -->
                                <div id="cancel-modal-{{ $request->id }}" class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center hidden">
                                    <div class="bg-white p-6 rounded shadow-md w-2/3">
                                        <h2 class="text-lg font-bold mb-4">Unaccept Request</h2>
                                        <p class="mb-4"><strong>Request Details:</strong></p>
                                        <p><strong>Name:</strong> {{ $request->first_name }} {{ $request->last_name }}</p>
                                        <p><strong>Email:</strong> {{ $request->email }}</p>
                                        <p><strong>Phone:</strong> {{ $request->phone_number }}</p>
                                        <p><strong>Project Description:</strong> {{ $request->project_description }}</p>
                                        <form action="{{ route('requests.unaccept', $request->id) }}" method="POST" class="mt-4">
                                            @csrf
                                            <textarea name="reason" placeholder="Reason for unaccepting..." class="w-full border border-gray-300 p-2 rounded mb-4" required></textarea>
                                            <div class="flex justify-end">
                                                <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded mr-2" onclick="closePopup({{ $request->id }})">Cancel</button>
                                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            @endif
        </main>
    </div>
</body>
</html>
