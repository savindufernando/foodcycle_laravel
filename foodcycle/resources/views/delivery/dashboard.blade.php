<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delivery Provider Dashboard</title>
    

       <!-- Tailwind CSS -->
       <script src="https://cdn.tailwindcss.com"></script>

       <!-- Font Link -->
       <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;800&display=swap" rel="stylesheet">
   
       <!-- Icon Link -->
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
     
</head>
<body class="font-sans bg-gray-50">
    <div class="max-w-screen-lg p-5 mx-auto mt-10 bg-white rounded-md shadow-md">
        <!-- Header -->
        <div class="flex items-center justify-between mb-5">
            <h1 class="text-xl font-bold text-gray-800">Food Cycle Delivery</h1>
            <div class="flex items-center space-x-4">
                <a href="#" class="text-gray-600 hover:text-gray-800">Earnings</a>
                <a href="#" class="text-gray-600 hover:text-gray-800">Invoices</a>
                <a href="#" class="text-gray-600 hover:text-gray-800">Invoice settings</a>
                <a href="#" class="text-gray-600 hover:text-gray-800">Banking</a>
                <div class="relative items-center hidden space-x-4 md:flex navIcon">
                    <a href="#"><i class="fas fa-bell hover:text-green-800"></i></a>
                    <div class="relative dropdown">
                        <button id="dropdown-nav" class="text-black hover:text-green-800 focus:outline-none" aria-expanded="false">
                            <i class="fa-regular fa-circle-user fa-lg"></i>
                        </button>
                        
                        <!-- Dropdown Menu for User Profile -->
                        <div id="dropdown-menu1" class="absolute right-0 hidden w-48 mt-2 bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5" role="menu" aria-orientation="vertical" aria-labelledby="dropdown-nav">
                            @auth
                                <!-- If the user is authenticated, show their name and sign out option -->
                                <span class="block px-4 py-2 font-serif text-lg text-red-500">Hi, {{ Auth::user()->name }}</span>
                                <form id="logout-form" action="{{ route('delivery.logout') }}" method="POST" style="display: inline;">
                                    @csrf
                                    <button class="block w-full px-4 py-2 text-sm text-left text-gray-700 hover:bg-gray-100" type="submit">Logout</button>
                                </form>
                            @else
                                <!-- If the user is not authenticated, show login and guest info -->
                                <span class="block px-4 py-2 font-serif text-lg text-red-500">Hi, Guest</span>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navigation -->
        <div class="flex justify-start pb-3 mb-5 space-x-8 border-b border-gray-200">
            <a href="#" class="text-gray-600 hover:text-gray-800">Weekly Statements</a>
            <a href="#" class="text-gray-600 border-b-2 border-gray-800 hover:text-gray-800">Activity</a>
        </div>

        <!-- Activity Details -->
        <h2 class="mb-4 text-lg font-medium text-gray-700">Activity Details</h2>
        <div class="p-4 mb-5 bg-gray-100 rounded-md">
            <label for="search-week" class="block mb-1 font-medium text-gray-600">Search by week</label>
            <input id="search-week" type="text" value="Nov 11, 2024 – Nov 18, 2024" 
                   class="w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:ring focus:ring-gray-300 focus:outline-none">
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full text-left border border-collapse border-gray-200">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 text-gray-600 border border-gray-200">Event</th>
                        <th class="px-4 py-2 text-gray-600 border border-gray-200">Date & Time</th>
                        <th class="px-4 py-2 text-gray-600 border border-gray-200">Earnings</th>
                        <th class="px-4 py-2 text-gray-600 border border-gray-200">View</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="4" class="py-4 text-center text-gray-500">No earnings activity in the selected timeframe.</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>

<script>
        // Dropdown toggle functionality
        document.getElementById('dropdown-nav').addEventListener('click', function () {
            const dropdownMenu = document.getElementById('dropdown-menu1');
            dropdownMenu.classList.toggle('hidden');
        });
    
        // Close dropdown if clicked outside
        document.addEventListener('click', function (event) {
            const dropdownButton = document.getElementById('dropdown-nav');
            const dropdownMenu = document.getElementById('dropdown-menu1');
            if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
                dropdownMenu.classList.add('hidden');
            }
        });
</script>

