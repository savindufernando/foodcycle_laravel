<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delivery Provider</title>

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
    <div class="flex items-center justify-between max-w-6xl mx-auto">
      <div class="text-lg font-bold">Delivery Provider</div>
      <nav>           
        <ul class="flex space-x-8">                                                               
          <li><a href="{{ route('service.delivery') }}" class="hover:underline">Delivery</a></li>
          <li><a href="{{ route('service.storage') }}" class="hover:underline">Storage</a></li>
          <li><a href="/" class="hover:underline">Home</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <!-- Hero Section -->
  <section class="py-12 text-white bg-black">
    <div class="max-w-6xl mx-auto space-y-6 text-center">
      <h1 class="text-4xl font-bold">Deliver with Food Cycle</h1>
      <p class="text-lg">No boss. Flexible schedule. Quick pay.<br>
        Now you can make money by delivering food orders that people crave using the Food Cycle Website—all while exploring your city.</p>
      <div class="space-x-4">
        <a href="{{ route('delivery.signup') }}" class="px-6 py-3 font-bold text-black bg-white rounded-md">Sign up to deliver</a>
        <a href="{{ route('delivery.login') }}" class="text-white underline">Already have an account? Sign in</a>
      </div>
    </div>
  </section>

  <!-- Features Section -->
  <section class="py-12 bg-gray-50">
    <div class="max-w-6xl mx-auto text-center">
      <h2 class="mb-8 text-2xl font-bold">Make money on the go</h2>
      <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
        <div class="space-y-4">
          <i class="fa-solid fa-clock fa-2xl"></i>
          <h3 class="font-bold">Your vehicle, your time</h3>
          <p>Grab your car, bike, scooter, or even shoes and deliver whenever you want—for an hour, a weekend, or throughout the week.</p>
        </div>
        <div class="space-y-4">
          <i class="fa-solid fa-money-bill fa-2xl"></i>
          <h3 class="font-bold">Weekly payments</h3>
          <p>Get paid once a week and easily keep track of money you’ve made within the driver app.</p>
        </div>
        <div class="space-y-4">
          <i class="fa-solid fa-location-dot fa-2xl"></i>
          <h3 class="font-bold">Enjoy your city</h3>
          <p>Between picking up and dropping off deliveries, it’s just you and the road—relax, bump your music, and enjoy cruising around town.</p>
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

</body>
</html>
