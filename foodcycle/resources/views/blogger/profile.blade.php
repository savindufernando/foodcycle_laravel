<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogger Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">

    <!-- Header -->
    @include('layouts.bheader')

    <!-- Profile Banner Section -->
    <div class="relative bg-green-500 h-48">
        <div class="absolute bottom-4 left-4 flex items-center space-x-4">
            @if($blogger->profile_pic)
                <img src="{{ asset('storage/' . $blogger->profile_pic) }}" alt="Profile Picture" class="w-24 h-24 rounded-full border-4 border-white shadow-md">
            @else
                <div class="w-24 h-24 rounded-full bg-gray-300 flex items-center justify-center border-4 border-white shadow-md">
                    <span class="text-gray-600 font-bold">N/A</span>
                </div>
            @endif
            <h1 class="text-2xl font-bold text-white">{{ $blogger->name }}</h1>
        </div>
    </div>

    <!-- Profile Edit Section -->
    <main class="container mx-auto p-6">
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h2 class="text-3xl font-bold mb-6">Edit Profile</h2>

            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('blogger.profile.update') }}" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <!-- Full Name -->
                <div>
                    <label for="name" class="block font-medium text-gray-700">Full Name</label>
                    <input type="text" name="name" id="name" value="{{ $blogger->name }}" required
                           class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-500">
                </div>

                <!-- Address -->
                <div>
                    <label for="address" class="block font-medium text-gray-700">Address</label>
                    <input type="text" name="address" id="address" value="{{ $blogger->address }}"
                           class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-500">
                </div>

                <!-- Job Title -->
                <div>
                    <label for="job_title" class="block font-medium text-gray-700">Job Title</label>
                    <input type="text" name="job_title" id="job_title" value="{{ $blogger->job_title }}"
                           class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-500">
                </div>

                <!-- Location -->
                <div>
                    <label for="location" class="block font-medium text-gray-700">Location</label>
                    <input type="text" name="location" id="location" value="{{ $blogger->location }}"
                           class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-500">
                </div>

                <!-- Biography -->
                <div>
                    <label for="description" class="block font-medium text-gray-700">Biography</label>
                    <textarea name="description" id="description" rows="5"
                              class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-500">{{ $blogger->description }}</textarea>
                </div>

                <!-- Profile Picture -->
                <div>
                    <label for="profile_pic" class="block font-medium text-gray-700">Profile Picture</label>
                    <input type="file" name="profile_pic" id="profile_pic" class="mt-1 w-full px-4 py-2 border rounded-lg">
                    @if($blogger->profile_pic)
                        <div class="mt-4">
                            <img src="{{ asset('storage/' . $blogger->profile_pic) }}" alt="Profile Picture" class="w-32 h-32 rounded-full">
                        </div>
                    @endif
                </div>

                <!-- Submit Button -->
                <button type="submit" class="px-6 py-2 bg-green-500 text-white rounded-lg hover:bg-green-700">
                    Update Profile
                </button>
            </form>
        </div>
    </main>
</div>

    <!-- Footer Section -->
    @include('layouts.footer')
</body>
</html>
