<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Non-Profit Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
    </style>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
</head>
<body class="bg-gray-100">
    <!-- Header Section -->
    <div class="py-4 text-black bg-white">
        <div class="container flex items-center justify-between mx-auto">
            <a href="{{ route('donation.viewDonations') }}" class="px-4 py-2 bg-green-500 rounded hover:bg-green-600 text-white">Donations</a>
            <h1 class="text-xl font-bold">Welcome,  <span class="text-green-500">{{ auth()->guard('donation')->user()->orgname}}</span></h1>
            <a href="{{ route('donation.logout') }}" class="px-4 py-2 bg-red-500 rounded hover:bg-red-600 text-white">
                Logout
            </a>
        </div>
    </div>

    <div class="container py-8 mx-auto">
        <h1 class="mb-6 text-3xl font-bold text-center text-green-500">Manage Your Donation Requests</h1>

        <!-- Add Donation Request Form -->
        <div class="p-6 mb-8 bg-white rounded-lg shadow-md">
            <h2 class="mb-4 text-xl font-bold text-gray-800">Add a Donation Request</h2>
            <form id="donationForm" action="{{ route('donation.request.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                    <div>
                        <label for="type" class="block mb-2 font-medium text-gray-700">Donation Type</label>
                        <select id="type" name="type" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-teal-500">
                            <option value="">Select Type</option>
                            <option value="Human">Human</option>
                            <option value="Animal">Animal</option>
                        </select>
                    </div>
                    <div>
                        <label for="title" class="block mb-2 font-medium text-gray-700">Title of the Donation Campaign</label>
                        <input id="title" name="title" type="text" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-teal-500">
                    </div>
                    <div class="md:col-span-2">
                        <label for="purpose" class="block mb-2 font-medium text-gray-700">Purpose/Goal</label>
                        <textarea id="purpose" name="purpose" rows="3" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-teal-500"></textarea>
                    </div>
                    <div class="md:col-span-2">
                        <label for="beneficiaries" class="block mb-2 font-medium text-gray-700">Target Beneficiaries</label>
                        <input id="beneficiaries" name="beneficiaries" type="text" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-teal-500">
                    </div>
                    <input type="hidden" name="orgname" value="{{ auth()->guard('donation')->user()->orgname ?? '' }}" />
                    <input type="hidden" name="orglocation" value="{{ auth()->guard('donation')->user()->region ?? '' }}" />
                </div>
                <button type="submit"
                    class="px-4 py-2 mt-6 text-white bg-green-500 rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">
                    Add Request
                </button>
            </form>
        </div>

        <!-- Donation Requests Table -->
        <div class="p-6 bg-white rounded-lg shadow-md">
            <h2 class="mb-4 text-xl font-bold text-gray-800">Donation Requests</h2>
            <table class="w-full border border-collapse border-gray-300 table-auto">
                <thead class="text-white bg-green-500">
                    <tr>
                        <th class="px-4 py-2">Type</th>
                        <th class="px-4 py-2">Title</th>
                        <th class="px-4 py-2">Status</th>
                        <th class="px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody id="donationTableBody">
                    @foreach ($requests as $request)
                    <tr>
                        <td class="px-4 py-2">{{ $request->type }}</td>
                        <td class="px-4 py-2">{{ $request->title }}</td>
                        <td class="px-4 py-2">{{ $request->completed ? 'Completed' : 'Pending' }}</td>
                        <td class="px-4 py-2">
                            <form action="{{ route('donation.destroy', $request->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                class="px-4 py-2 text-white bg-red-500 rounded hover:bg-red-600 disabled:opacity-50"
                                @if($request->completed) disabled @endif>
                                Remove
                                </button>
                            </form>
                            <form action="{{ route('donation.complete', $request->id) }}" method="POST" class="inline">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-600 disabled:opacity-50"
                                @if($request->completed) disabled @endif>
                                Complete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
<!-- Footer -->
<footer class="py-4 bg-green-200 text-center text-black">
        © 2024 Food Cycle. All rights reserved.
</footer>
</body>
</html>
