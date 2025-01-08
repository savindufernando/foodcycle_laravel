<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Submissions</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Link -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;800&display=swap" rel="stylesheet">

    <!-- Icon Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />

    <!-- Custom Styles -->
    <style>
        .table th, .table td {
            vertical-align: middle;
        }

        .sidebar {
            width: 250px;
            min-height: 100vh;
        }
    </style>
</head>

<body class="flex flex-col min-h-screen bg-black-100 font-poppins">
    <!-- Header Section -->
    <header class="fixed top-0 z-10 w-full bg-white shadow">
        <div class="flex items-center justify-between w-full px-6 mx-auto bg-white backdrop-blur-md">
            <!-- Logo and Branding -->
            <div class="flex items-center space-x-3">
                <img src="{{ asset('panel/image/admin.png') }}" alt="Food Cycle Logo" class="w-48 h-auto">
            </div>

            <!-- Navigation -->
            <nav class="hidden space-x-6 md:flex font-mono">
                <a href="/" class="text-lg font-semibold transition hover:text-green-700">Home</a>
                <a href="#" class="text-lg font-semibold transition hover:text-green-700">About</a>
                <a href="/shop" class="text-lg font-semibold transition hover:text-green-700">Shop</a>
                <a href="/donation" class="text-lg font-semibold transition hover:text-green-700">Donation</a>
                <a href="#" class="text-lg font-semibold transition hover:text-green-700">Contact Us</a>
            </nav>

            <!-- User Icon -->
            <div class="flex items-center space-x-4">
                <a href="#"><i class="fas fa-bell hover:text-green-800"></i></a>
                <div class="relative">
                    <button id="dropdown-nav" class="text-black hover:text-green-800">
                        <i class="fa-regular fa-circle-user fa-lg"></i>
                    </button>
                    <div id="dropdown-menu1" class="absolute right-0 hidden w-48 mt-2 bg-white rounded-md shadow-lg">
                        @auth
                            <span class="block px-4 py-2 font-serif text-lg text-red-500">Hi, {{ Auth::user()->name }}</span>
                            <a href="{{ route('admin.profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                            <form id="logout-form" action="{{ route('teacher.logout') }}" method="POST">
                                @csrf
                                <button class="block w-full px-4 py-2 text-sm text-left text-gray-700 hover:bg-gray-100" type="submit">Logout</button>
                            </form>
                        @else
                            <span class="block px-4 py-2 font-serif text-lg text-red-500">Hi, Guest</span>
                            <a href="{{ route('login') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Login</a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Layout -->
    <div class="flex flex-1 pt-24">
        <!-- Sidebar -->
        <aside class="sidebar bg-green-50 shadow">
            <nav class="p-6 space-y-4">
                <a href="/teacher/dashboard" class="flex items-center text-gray-600 hover:text-green-600">
                    <i class="mr-3 fas fa-cutlery"></i> Manage Products
                </a>
                <a href="/teacher/blogs/pending" class="flex items-center text-gray-600 hover:text-green-600">
                    <i class="mr-3 fas fa-book"></i> Manage Blogs
                </a>
                <a href="{{ route('teacher.contacts') }}" class="flex items-center text-gray-600 hover:text-green-600">
                    <i class="mr-3 fas fa-envelope"></i> View Contact Submissions
                </a>
                <a href="{{ route('teacher.accounts.index') }}" class="flex items-center text-gray-600 hover:text-green-600">
                    <i class="mr-3 fas fa-user"></i> Manage Admins
                </a>
                <a href="{{ route('teacher.newsletter.form') }}" class="flex items-center text-gray-600 hover:text-green-600">
                    <i class="mr-3 fas fa-paper-plane"></i> Manage News Letters
                </a>
            </nav>

            <!-- Logout Button -->
            <div class="p-10">
                <form id="logout-form" action="{{ route('teacher.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="flex items-center justify-center w-full px-4 py-2 text-white bg-red-500 rounded hover:bg-red-600">
                        <i class="mr-2 fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-10">
            <div class="container">
                <h1 class="mb-4 text-2xl font-semibold">Contact Submissions</h1>

                @if($contacts->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="table-auto w-full border-collapse border border-gray-300">
                            <thead>
                                <tr class="bg-gray-200">
                                    <th class="border border-gray-300 px-4 py-2">#</th>
                                    <th class="border border-gray-300 px-4 py-2">Name</th>
                                    <th class="border border-gray-300 px-4 py-2">Email</th>
                                    <th class="border border-gray-300 px-4 py-2">Subject</th>
                                    <th class="border border-gray-300 px-4 py-2">Message</th>
                                    <th class="border border-gray-300 px-4 py-2">Submitted At</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($contacts as $contact)
                                    <tr>
                                        <td class="border border-gray-300 px-4 py-2">{{ $loop->iteration }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $contact->name }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $contact->email }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $contact->subject }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $contact->message }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $contact->created_at->format('d-m-Y H:i') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination Links -->
                    <div class="mt-4">
                        {{ $contacts->links() }}
                    </div>
                @else
                    <div class="p-4 text-center text-yellow-600 bg-yellow-100 border border-yellow-300 rounded">
                        No contact submissions found.
                    </div>
                @endif
            </div>
        </main>
    </div>

    <!-- Script -->
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const dropdownNav = document.getElementById("dropdown-nav");
            const dropdownMenu = document.getElementById("dropdown-menu1");

            dropdownNav.addEventListener("click", () => {
                dropdownMenu.classList.toggle("hidden");
            });

            document.addEventListener("click", (event) => {
                if (!dropdownNav.contains(event.target) && !dropdownMenu.contains(event.target)) {
                    dropdownMenu.classList.add("hidden");
                }
            });
        });
    </script>
</body>
</html>
