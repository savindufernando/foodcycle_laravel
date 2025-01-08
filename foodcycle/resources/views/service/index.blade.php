<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Cycle - Services</title>

    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('panel/css/style.css') }}">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
</head>

<body class="text-gray-800 bg-gray-100">

    <!-- Header Section -->
    @include('layouts.header')

  <!-- Hero Section -->
  <section class="relative text-white bg-green-500">
    <div class="flex flex-col items-center px-6 py-16 mx-auto text-center max-w-7xl">
      <h1 class="mb-4 text-4xl font-bold">Reducing Food Waste, One Connection at a Time</h1>
      <p class="max-w-2xl mb-6 text-lg">
        Join us in creating a sustainable world where no edible food is wasted. Be a part of the movement to connect markets, transport providers, and storage facilities for a meaningful impact.
      </p>
      <a href="#get-involved" class="px-6 py-3 text-green-600 transition bg-white rounded-lg shadow-md hover:bg-gray-100">
        Get Involved
      </a>
    </div>
    
  </section>

  <!-- Main Content -->
  <main class="py-12">
    <div class="px-6 mx-auto max-w-7xl">
      <!-- Who We Are Section -->
      <div class="grid items-center gap-8 mb-16 lg:grid-cols-2">
        <div>
          <h2 class="mb-4 text-3xl font-bold text-gray-800">Who We Are</h2>
          <p class="text-gray-700">
            We are a community-driven initiative committed to reducing food waste by connecting markets with surplus food
            to those who can transport and store it efficiently. By creating a platform that bridges the gap, we aim to
            ensure that perfectly good food doesn’t go to waste and reaches those in need.
          </p>
        </div>
        <div>
            <img src="{{ asset('panel/image/ServiceBanner.jpg') }}" alt="Who We Are" class="rounded-lg shadow-md">
        </div>
      </div>

      <!-- Vision and Mission Section -->
      <div class="grid gap-8 lg:grid-cols-2">
        <!-- Vision -->
        <div class="p-6 bg-white rounded-lg shadow-md">
          <h3 class="mb-4 text-xl font-semibold text-gray-800">Our Vision</h3>
          <p class="text-gray-700">
            Our vision is a sustainable world where no edible food is wasted. We strive to bring markets, transport
            providers, storage facilities, and charities together under one roof to create a meaningful impact.
          </p>
        </div>

        <!-- Mission -->
        <div class="p-6 bg-white rounded-lg shadow-md">
          <h3 class="mb-4 text-xl font-semibold text-gray-800">Our Mission</h3>
          <ul class="space-y-2 text-gray-700 list-disc list-inside">
            <li>Minimize Food Waste: Provide a simple solution for markets to list excess food supplies.</li>
            <li>Empower Collaboration: Connect businesses and individuals with transport and storage solutions.</li>
            <li>Support Communities: Channel unused food to those who need it the most.</li>
          </ul>
        </div>
      </div>

      <!-- Get Involved Section -->
      <section id="get-involved" class="mt-16">
        <h2 class="mb-8 text-3xl font-bold text-center text-gray-800">Get Involved</h2>
        <div class="grid gap-8 lg:grid-cols-2">
          <!-- Transport Provider -->
          <div class="p-6 bg-white rounded-lg shadow-md">
            <h3 class="mb-4 text-xl font-semibold text-gray-800">Be a Transport Provider</h3>
            <p class="mb-4 text-gray-700">
              If you own or manage a transportation service, you can play a crucial role in this mission:
            </p>
            <ul class="space-y-2 text-gray-700 list-disc list-inside">
              <li>View and accept transport requests from local markets.</li>
              <li>Help deliver food to storage facilities or charities.</li>
              <li>Support a cause while growing your business network.</li>
            </ul>
            <a href="{{ route('service.delivery') }}" class="inline-block px-4 py-2 mt-4 text-white transition bg-green-500 rounded-lg hover:bg-green-600">
              Join as Transport Provider
            </a>
          </div>

          <!-- Storage Provider -->
          <div class="p-6 bg-white rounded-lg shadow-md">
            <h3 class="mb-4 text-xl font-semibold text-gray-800">Be a Storage Provider</h3>
            <p class="mb-4 text-gray-700">
              Do you have extra storage space? Join us to:
            </p>
            <ul class="space-y-2 text-gray-700 list-disc list-inside">
              <li>Offer refrigerated or dry storage for excess food.</li>
              <li>Collaborate with markets and transport providers.</li>
              <li>Reduce waste while optimizing your facility's usage.</li>
            </ul>
            <a href="{{ route('service.storage') }}" class="inline-block px-4 py-2 mt-4 text-white transition bg-green-500 rounded-lg hover:bg-green-600">
              Join as Storage Provider
            </a>
          </div>
        </div>
      </section>
    </div>
  </main>

  <!-- Footer -->
  @include('layouts.footer')
  
</body>
</html>
