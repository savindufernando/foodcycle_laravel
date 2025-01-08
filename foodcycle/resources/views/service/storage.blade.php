<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Storage Provider</title>

    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('panel/css/style.css') }}">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
</head>

<body class="text-gray-900 bg-gray-100">

  <!-- Header -->
  <header class="py-4 text-white bg-black">
    <div class="flex items-center justify-between max-w-6xl px-4 mx-auto md:px-8">
      <div class="text-lg font-bold">Storage Provider</div>
      <!-- Desktop Navigation -->
      <nav class="hidden space-x-8 md:flex">
        <a href="{{ route('service.delivery') }}" class="hover:underline">Delivery</a>
        <a href="{{ route('service.storage') }}" class="hover:underline">Storage</a>
        <a href="/" class="hover:underline">Home</a>
      </nav>
      <!-- Mobile Menu Button -->
      <button id="menu-button" class="md:hidden focus:outline-none">
        <svg class="w-6 h-6" fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"/>
        </svg>
      </button>
    </div>
    <!-- Mobile Navigation -->
    <nav id="mobile-menu" class="hidden p-4 space-y-4 text-white bg-black md:hidden">
      <a href="#" class="block hover:underline">Delivery</a>
      <a href="#" class="block hover:underline">Storage</a>
      <a href="#" class="block hover:underline">Home</a>
    </nav>
  </header>

  <!-- Hero Section -->
  <section class="px-4 py-12 text-white bg-black md:px-8">
    <div class="max-w-6xl mx-auto space-y-6 text-center">
      <h1 class="text-3xl font-bold md:text-4xl">Be a Storage Provider</h1>
      <p class="text-base md:text-lg">If you have cold storage to store foods, you can earn money with us, fill your details and join with us!</p>
      <div class="space-y-4 md:space-x-4">
          <a href="{{ route('storage.signup') }}" 
            class="block px-6 py-3 font-bold text-black bg-white rounded-md md:inline-block">
              Sign up to Storage
          </a>
          <a href="{{ route('storage.login') }}" 
            class="block text-white underline md:inline-block">
              Already have an account? Sign in
          </a>
      </div>
    </div>
  </section>

  <!-- Features Section -->
  <section class="px-4 py-12 bg-gray-50 md:px-8">
    <div class="max-w-6xl mx-auto text-center">
      <h2 class="mb-8 text-2xl font-bold">Make money on the go</h2>
      <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
        <div class="space-y-4">
          <i class="fa-solid fa-clock fa-2xl"></i>
          <h3 class="font-bold">Your storage, your time</h3>
          <p>Store foods and wait for the delivery and pickups.</p>
        </div>
        <div class="space-y-4">
          <i class="fa-solid fa-money-bill fa-2xl"></i>
          <h3 class="font-bold">Weekly payments</h3>
          <p>Get paid once a week and easily keep track of money you’ve made within the driver app.</p>
        </div>
        <div class="space-y-4">
          <i class="fa-solid fa-location-dot fa-2xl"></i>
          <h3 class="font-bold">Enter your city</h3>
          <p>Between pickups and drop-offs, enjoy your time exploring your city.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
 <footer class="py-10 text-gray-300 bg-black rounded-t-3xl">
  <div class="container flex flex-col justify-between px-4 mx-auto md:flex-row md:px-10">
      <!-- Social Media Section -->
      <div class="mb-8 md:mb-0">
          <h3 class="mb-4 text-lg font-semibold text-white">SOCIAL MEDIA</h3>
          <ul>
              <li class="flex items-center mb-2">
                  <i class="mr-2 text-white fab fa-facebook"></i>
                  <a href="#" class="hover:text-white">Foot Cycle</a>
              </li>
              <li class="flex items-center mb-2">
                  <i class="mr-2 text-white fab fa-whatsapp"></i>
                  <a href="tel:+9476453400" class="hover:text-white">+94 76453400</a>
              </li>
              <li class="flex items-center mb-2">
                  <i class="mr-2 text-white fab fa-instagram"></i>
                  <a href="#" class="hover:text-white">Foot_Cycle</a>
              </li>
          </ul>
      </div>

      <!-- Links Section -->
      <div class="mb-8 md:mb-0">
          <h3 class="mb-4 text-lg font-semibold text-white">LINKS</h3>
          <ul>
              <li><a href="#" class="hover:text-white">Home</a></li>
              <li><a href="#" class="hover:text-white">Shop</a></li>
              <li><a href="#" class="hover:text-white">Donation</a></li>
              <li><a href="#" class="hover:text-white">Seller</a></li>
          </ul>
      </div>

      <!-- Services Section -->
      <div class="mb-8 md:mb-0">
          <h3 class="mb-4 text-lg font-semibold text-white">SERVICES</h3>
          <ul>
              <li><a href="#" class="hover:text-white">Storage</a></li>
              <li><a href="#" class="hover:text-white">Delivery</a></li>
          </ul>
      </div>

      <!-- Contact Form Section -->
      <div class="w-full md:w-1/3">
          <form class="flex flex-col">
              <input type="email" placeholder="Email Address" class="p-2 mb-4 text-gray-700 placeholder-gray-600 bg-gray-300 rounded">
              <textarea placeholder="Message" class="p-2 mb-4 text-gray-700 placeholder-gray-600 bg-gray-300 rounded"></textarea>
              <button class="self-end py-2 text-white bg-green-500 rounded w-36 hover:bg-green-600">Submit</button>
          </form>
      </div>
  </div>

  <!-- Footer Bottom Text -->
  <div class="pt-4 mt-10 text-center text-gray-500 border-t-2 border-white">
      © 2024, Food Cycle
  </div>
</footer>

  <script>
    const menuButton = document.getElementById('menu-button');
    const mobileMenu = document.getElementById('mobile-menu');

    menuButton.addEventListener('click', () => {
      mobileMenu.classList.toggle('hidden');
    });
  </script>

</body>
</html>
