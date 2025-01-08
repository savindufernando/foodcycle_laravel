<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Newsletters</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }
    </style>
</head>
<body class="flex flex-col min-h-screen bg-gray-100 font-poppins">

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
        <aside class="sidebar w-64 bg-green-50 shadow">
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
                    <i class="mr-3 fas fa-paper-plane"></i> Manage Newsletters
                </a>
            </nav>

            <!-- Logout Button -->
            <div class="p-6">
                <form id="logout-form" action="{{ route('teacher.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="flex items-center justify-center w-full px-4 py-2 text-white bg-red-500 rounded hover:bg-red-600">
                        <i class="mr-2 fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-8">
            <!-- Send Newsletter Form -->
            <section class="mb-8">
            <h2 class="text-xl font-bold mb-4">Send a Newsletter</h2>

            <!-- Form -->
            <form action="{{ route('teacher.newsletter.send') }}" method="POST" class="space-y-4">
                @csrf
                <textarea id="content" name="content" rows="10" class="w-full border border-gray-300 rounded-md p-3 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Write your newsletter here..." required></textarea>

                <button type="submit" class="px-6 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Send Newsletter</button>
            </form>

            <!-- Preview Section -->
            <div class="mt-8">
                <h3 class="text-lg font-bold mb-2">Newsletter Preview</h3>
                <div id="preview" class="p-4 border border-gray-300 rounded-md bg-gray-50 text-gray-700">
                    <p class="text-sm italic text-gray-500">Your newsletter content will appear here...</p>
                </div>
            </div>
        </section>


            <!-- View Subscribers Section -->
            <section>
                <h2 class="text-xl font-bold mb-4">View All Subscribers</h2>
                <table class="w-full border-collapse border border-gray-300">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="border border-gray-300 p-3">ID</th>
                            <th class="border border-gray-300 p-3">Email</th>
                            <th class="border border-gray-300 p-3">Subscribed At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($subscribers as $subscriber)
                            <tr class="text-center">
                                <td class="border border-gray-300 p-3">{{ $subscriber->id }}</td>
                                <td class="border border-gray-300 p-3">{{ $subscriber->email }}</td>
                                <td class="border border-gray-300 p-3">{{ $subscriber->created_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </section>
        </main>
    </div>

    <!-- Include footer -->
    @include('layouts.footer')
    <script>
    // Get the textarea and preview div
    const contentInput = document.getElementById('content');
    const previewDiv = document.getElementById('preview');

    // Update preview as the user types
    contentInput.addEventListener('input', function () {
        const content = contentInput.value.trim();
        if (content) {
            previewDiv.innerHTML = content.replace(/\n/g, '<br>'); // Replace newlines with <br>
        } else {
            previewDiv.innerHTML = '<p class="text-sm italic text-gray-500">Your newsletter content will appear here...</p>';
        }
    });
</script>
</body>
</html>
