<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Food Donation Platform</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
  <link rel="icon" type="image/x-icon" href="{{ asset('panel/image/logo.png') }}">
</head>
<body class="bg-gray-50 text-gray-800 font-sans">
    <!-- Header Section -->
    @include('layouts.header')
  <!-- Banner Section -->
  <section class="relative bg-cover bg-center h-96" style="background-image: url('{{ asset('panel/image/donationBanner.jpg') }}');">
    <div class="absolute inset-0 bg-white bg-opacity-60"></div>
    <div class="absolute inset-0 flex flex-col justify-center items-center text-center px-6">
      <h1 class="text-green-800 text-5xl font-extrabold mb-4">
        End Hunger Together
      </h1>
      <p class="text-gray-700 text-lg max-w-xl mb-6 leading-relaxed">
        Join our mission to reduce food waste and feed the hungry. Together, we can make a difference.
      </p>
      <!-- Buttons -->
    <div class="flex space-x-10">
      <a href="#donate-section" class="bg-green-500 text-white px-8 py-4 rounded-lg font-bold shadow-md hover:bg-green-700 transition-all duration-300">
        Donate Now
      </a>
      <a href="#registration_section" class="bg-green-500 text-white px-8 py-4 rounded-lg font-bold shadow-md hover:bg-green-600 transition-all duration-300">
        Request Food
      </a>
    </div>
  </div>
</section>
    </div>
  </section>

  <!-- About Section -->
  <section class="bg-white py-16 px-6">
    <div class="container mx-auto">
      <h2 class="text-4xl font-extrabold text-center text-green-800 mb-8">What We Do</h2>
      <div class="max-w-4xl mx-auto text-center">
        <p class="text-lg text-gray-700 mb-6 leading-relaxed">
          Our platform bridges the gap between food donors and non-profit organizations to fight hunger and reduce food waste. By ensuring surplus food reaches those in need, we aim to create a more sustainable and compassionate community.
        </p>
      </div>
    </div>
  </section>

  <!-- How It Works Section -->
  <section class="bg-gray-100 py-16 px-6">
    <div class="container mx-auto">
      <h2 class="text-4xl font-extrabold text-center text-green-800 mb-12">How It Works</h2>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto">
        <div class="bg-white p-8 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 transform hover:scale-105">
          <div class="mb-6 text-center">
            <i class="fa-solid fa-user-plus text-gray-500 text-5xl"></i>
          </div>
          <h3 class="text-2xl font-bold text-green-600 mb-4">Step 1: Sign Up</h3>
          <p class="text-gray-700">
            Food donors and non-profit organizations register on our platform to get started.
          </p>
        </div>
        <div class="bg-white p-8 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 transform hover:scale-105">
          <div class="mb-6 text-center">
            <i class="fa-solid fa-handshake text-gray-500 text-5xl"></i>
          </div>
          <h3 class="text-2xl font-bold text-green-600 mb-4">Step 2: Connect</h3>
          <p class="text-gray-700">
            Non-profits request food based on their needs, and donors donate surplus food 
          </p>
        </div>
        <div class="bg-white p-8 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 transform hover:scale-105">
          <div class="mb-6 text-center">
            <i class="fa-solid fa-truck text-gray-500 text-5xl"></i>
          </div>
          <h3 class="text-2xl font-bold text-green-600 mb-4">Step 3: Deliver</h3>
          <p class="text-gray-700">
            We facilitate the connection to ensure timely and efficient food deliveries.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- Why Join Us Section -->
  <section class="bg-white py-16 px-6">
    <div class="container mx-auto">
      <h2 class="text-4xl font-extrabold text-center text-green-800 mb-12">Why Join Us?</h2>
      <div class="space-y-6 max-w-4xl mx-auto">
        <div class="bg-gray-50 p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 flex items-center">
          <i class="fa-solid fa-leaf text-green-600 text-3xl mr-4"></i>
          <p class="text-gray-700">Reduce food waste and support sustainability efforts.</p>
        </div>
        <div class="bg-gray-50 p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 flex items-center">
          <i class="fa-solid fa-hand-holding-heart text-green-600 text-3xl mr-4"></i>
          <p class="text-gray-700">Make a direct impact in addressing hunger and food insecurity.</p>
        </div>
        <div class="bg-gray-50 p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 flex items-center">
          <i class="fa-solid fa-people-group text-green-600 text-3xl mr-4"></i>
          <p class="text-gray-700">Be part of a community working toward a compassionate society.</p>
        </div>
        <div class="bg-gray-50 p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 flex items-center">
          <i class="fa-solid fa-truck text-green-600 text-3xl mr-4"></i>
          <p class="text-gray-700">Streamlined process for efficient food donation and distribution.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Registration Section -->
<section id="registration_section" class="bg-gradient-to-b from-green-50 to-gray-50 py-16 px-6">
  <div class="container mx-auto text-center">
    <!-- Heading -->
    <h2 class="text-4xl font-extrabold text-green-800 mb-6">Your Organization Can Make a Difference</h2>
    <!-- Description -->
    <p class="text-lg text-gray-700 max-w-3xl mx-auto mb-8 leading-relaxed">
      We are proud to partner with registered non-profit organizations dedicated to creating a hunger-free world. 
      By registering with us, you can submit food requests and help distribute resources where they are needed most.
      <br><br>
      <span class="text-green-600 font-bold">Not registered yet?</span> Take the first step today. Create an account and join a growing community of organizations working together to fight hunger and reduce food waste.
    </p>
    <!-- Call to Action -->
    <div class="flex justify-center space-x-4">
      <a href="{{ route('donation.signup') }}" class="bg-green-600 text-white px-8 py-4 rounded-lg font-bold shadow-md hover:bg-green-700 transition-all duration-300">
        Signup
      </a>
      <a href="{{ route('donation.login') }}" class="bg-white border border-green-600 text-green-600 px-8 py-4 rounded-lg font-bold shadow-md hover:bg-green-100 transition-all duration-300">
        Login
      </a>
    </div>
  </div>
</section>


  <!-- Donation Section -->
<section id="donate-section" class="bg-gray-100 py-16 text-gray-700 text-center">
  <div class="container mx-auto">
    <h2 class="text-4xl font-extrabold mb-6 text-green-800">Your Contribution Matters</h2>
    <p class="text-lg max-w-3xl mx-auto mb-8 leading-relaxed">
      We appreciate your generosity in supporting our mission. Currently, we operate in <span class="font-bold text-green-600">Kandy</span> and <span class="font-bold text-green-600">Colombo</span>. Expansion plans are underway. We admire your patience!
    </p>
    <div class="container">
      <h1 class="text-2xl font-bold text-green-800 mb-4">Food Requests</h1>
      <div class="overflow-x-auto shadow-lg rounded-lg bg-white">
        <table class="table-auto w-full text-left border-collapse">
          <thead>
            <tr class="bg-green-600 text-white text-center">
              <th class="px-6 py-3 font-semibold">Organization Name</th>
              <th class="px-6 py-3 font-semibold">Location</th>
              <th class="px-6 py-3 font-semibold">Type</th>
              <th class="px-6 py-3 font-semibold">Title</th>
              <th class="px-6 py-3 font-semibold">Purpose</th>
              <th class="px-6 py-3 font-semibold">Beneficiaries</th>
              <th class="px-6 py-3 font-semibold text-center"></th>
            </tr>
          </thead>
          <tbody>
            @foreach($foodRequests as $request)
            <tr class="odd:bg-gray-50 even:bg-gray-100 hover:bg-green-50">
              <td class="px-6 py-4">{{ $request->organization_name }}</td>
              <td class="px-6 py-4">{{ $request->Org_location }}</td>
              <td class="px-6 py-4">{{ $request->type }}</td>
              <td class="px-6 py-4">{{ $request->title }}</td>
              <td class="px-6 py-4">{{ $request->purpose }}</td>
              <td class="px-6 py-4">{{ $request->beneficiaries }}</td>
              <td class="px-6 py-4 text-center">
                <a href="{{ route('donation.donationForm', ['id' => $request->id]) }}" class="bg-green-600 text-white px-4 py-2 rounded-lg font-semibold shadow-md hover:bg-green-700 transition-all text-sm">
                  Donate
                </a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>
  <!-- Footer Section -->
  @include('layouts.footer')
</body>

</body>
</html>
