<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fresh Cycle</title>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('panel/css/style.css')); ?>">
    <link rel="icon" type="image/x-icon" href="<?php echo e(asset('panel/image/logo.png')); ?>">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" /> 

</head>

<body>

    <!-- Header Section -->
    <?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Hero Section -->
    <!-- Hero Section -->
<section class="relative h-screen bg-fixed bg-center bg-cover" style="background-image: url('<?php echo e(asset('panel/image/banner.jpg')); ?>');">
    <!-- Background Overlay -->
    <div class="absolute inset-0 bg-black bg-opacity-50 pointer-events-none"></div>

    <!-- Hero Content -->
    <div class="relative z-0 flex flex-col items-center justify-center h-full px-6 text-center text-white pointer-events-none">
        <h1 class="text-5xl font-extrabold sm:text-6xl md:text-7xl animate-fade-in-down pointer-events-auto">
            Join Us in Stopping Food Waste
        </h1>
        <p class="mt-6 text-xl sm:text-2xl max-w-3xl animate-fade-in-up pointer-events-auto">
            Through our <span class="font-semibold text-green-400">Shop</span>, <span class="font-semibold text-yellow-400">Donations</span>, <span class="font-semibold text-blue-400">Consultancy</span>, and <span class="font-semibold text-gray-400">Blog</span>, we aim to reduce food waste and create a sustainable future.
        </p>
        <div class="mt-8 space-x-4 animate-fade-in-up pointer-events-auto">
            <a href="/shop" class="px-8 py-3 text-lg font-medium bg-green-600 rounded-lg hover:bg-green-700">Shop Now</a>
            <a href="/donate" class="px-8 py-3 text-lg font-medium bg-yellow-500 rounded-lg hover:bg-yellow-600">Donate</a>
            <a href="/consultant" class="px-8 py-3 text-lg font-medium bg-blue-600 rounded-lg hover:bg-blue-700">Consultancy</a>
            <a href="/blog" class="px-8 py-3 text-lg font-medium bg-gray-600 rounded-lg hover:bg-gray-700">Read Blog</a>
        </div>
    </div>
</section>

    <!-- Features Section -->
    <section class="py-20 bg-gray-100">
        <div class="max-w-6xl px-4 mx-auto text-center">
            <h2 class="text-4xl font-bold text-green-600">Our Features</h2>
            <p class="mt-4 text-lg text-gray-600">
                Explore our key services to help stop food waste and promote sustainability.
            </p>
            <div class="grid grid-cols-1 gap-8 mt-12 sm:grid-cols-2 lg:grid-cols-4">
                <!-- Shop Feature -->
                <div class="p-6 bg-white rounded-lg shadow hover:shadow-lg">
                    <div class="mb-4 text-green-600">
                        <i class="fas fa-shopping-cart text-4xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold">Shop</h3>
                    <p class="mt-2 text-gray-600">Buy fresh and surplus food at affordable prices.</p>
                </div>
                <!-- Donation Feature -->
                <div class="p-6 bg-white rounded-lg shadow hover:shadow-lg">
                    <div class="mb-4 text-yellow-500">
                        <i class="fas fa-hand-holding-heart text-4xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold">Donation</h3>
                    <p class="mt-2 text-gray-600">Support food donation programs to help those in need.</p>
                </div>
                <!-- Consultancy Feature -->
                <div class="p-6 bg-white rounded-lg shadow hover:shadow-lg">
                    <div class="mb-4 text-blue-600">
                        <i class="fas fa-user-tie text-4xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold">Consultancy</h3>
                    <p class="mt-2 text-gray-600">Get expert advice on reducing food waste.</p>
                </div>
                <!-- Blog Feature -->
                <div class="p-6 bg-white rounded-lg shadow hover:shadow-lg">
                    <div class="mb-4 text-gray-600">
                        <i class="fas fa-blog text-4xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold">Blog</h3>
                    <p class="mt-2 text-gray-600">Read articles and insights on sustainability.</p>
                </div>
            </div>
        </div>
    </section>
    <br>
    <h1 class="text-4xl font-extrabold text-green-600 mb-8 text-center">Flash Sales</h1>

    <?php if($flashSales->isEmpty()): ?>
        <p class="text-center text-gray-600">No flash sales available at the moment. Please check back later!</p>
    <?php else: ?>
        <div class="overflow-x-auto">
            <div class="flex space-x-8 px-4">
                <?php $__currentLoopData = $flashSales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="relative min-w-[250px] bg-white border border-gray-200 rounded-lg shadow-md overflow-hidden">
                        <!-- 30% Discount Badge -->
                        <div class="absolute top-2 left-2 px-2 py-1 text-sm font-semibold text-white bg-red-500 rounded-md">
                            30% OFF
                        </div>

                        <!-- Product Image -->
                        <img src="<?php echo e(asset('storage/' . $product->image)); ?>" alt="<?php echo e($product->name); ?>" class="w-full h-48 object-cover">

                        <!-- Product Details -->
                        <div class="p-4">
                            <h2 class="text-lg font-semibold text-gray-800"><?php echo e($product->name); ?></h2>
                            <p class="text-sm text-gray-500">Category: <?php echo e(ucfirst($product->category)); ?></p>
                            <p class="mt-2 text-xl font-bold text-green-600">Rs. <?php echo e(number_format($product->flash_sale_price, 2)); ?></p>
                            <p class="text-sm line-through text-gray-400">Rs. <?php echo e(number_format($product->price, 2)); ?></p>
                            <p class="mt-1 text-sm text-gray-700">Seller: <?php echo e($product->admin->name); ?></p>

                            <!-- Buy Now Button -->
                            <div class="mt-4 text-center">
                                <a href="<?php echo e(route('shop.product.show', $product->id)); ?>" class="px-4 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-600">
                                    Buy Now
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    <?php endif; ?>
    <!-- Categories Section -->
    <section class="py-16 bg-gray-100">
        <div class="mx-auto text-center space">
            <h3 class="mb-2 text-xl italic text-green-600">Featured Categories</h3>
            <h2 class="mb-8 text-4xl font-bold">Sells Products</h2>
            <div class="grid grid-cols-1 gap-8 md:grid-cols-3">
                <!-- Human Donations -->
                <button>
                    <div class="flex flex-col items-center">
                        <div class="p-2 bg-yellow-200 rounded-full">
                            <div class="p-8 bg-yellow-200 border-2 border-yellow-500 rounded-full">
                                <i class="text-4xl text-slate-700 fas fa-utensils"></i>
                            </div>
                        </div>
                        <h4 class="text-xl font-semibold">Human Donations</h4>
                    </div>
                </button>

                <!-- Animal Feed -->
                <button>
                    <div class="flex flex-col items-center">
                        <div class="p-2 bg-green-400 rounded-full">
                            <div class="p-8 bg-green-400 border-2 border-green-600 rounded-full">
                                <i class="text-4xl text-slate-700 fas fa-paw"></i>
                            </div>
                        </div>
                        <h4 class="text-xl font-semibold">Animal Feed</h4>
                    </div>
                </button>
                
                <!-- Fertilizer -->
                <button>
                    <div class="flex flex-col items-center">
                        <div class="p-2 rounded-full bg-stone-300">
                            <div class="p-8 border-2 rounded-full border-stone-400 bg-stone-300">
                                <i class="text-4xl text-slate-700 fas fa-seedling"></i>
                            </div>
                        </div>
                        <h4 class="text-xl font-semibold">Fertilizer</h4>
                    </div>
                </button>
            </div>
        </div>
    </section>
    <?php echo $__env->make('blogs.partials.recent', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    
    <!-- Vision and Mission Section -->
    <section class="bg-[#c5d7b6] p-12 mx-auto">
        <div class="grid  grid-cols-1 md:grid-cols-[1fr_auto_1fr] gap-14">
        
            <!-- Vision Section -->
            <div class="md:text-left md:pr-4">
                <h2 class="mb-2 text-2xl font-semibold text-center">Our Vision</h2>
                <p class="text-lg leading-relaxed text-center text-gray-800 " style="text-align: justify;">
                    "To create a sustainable future where no vegetable is wasted, transforming leftovers into valuable resources for people, animals, and the planet."
                </p>
            </div>
    
            <div class="items-center justify-center hidden md:flex">
                <div class="w-px h-40 bg-gray-500"></div>
            </div>
    
            <!-- Mission Section -->
            <div class="md:text-left md:pl-4">
                <h2 class="mb-2 text-2xl font-semibold text-center">Our Mission</h2>
                <p class="leading-relaxed text-gray-800 xt-center t ext-lg md:pr-10" style="text-align: justify;">
                    "Our mission is to reduce vegetable waste by connecting surplus produce to consumers, farmers, and eco-conscious communities. We aim to repurpose leftovers for human consumption, animal feed, and natural fertilizers, fostering a circular economy that benefits both people and the environment."
                </p>
            </div>
        
        </div>
    </section>
    
    <!-- About Us Section -->
    <section class="py-16 " id="about-section">
        <div class="grid items-center grid-cols-1 gap-8 mx-auto max-w-7xl md:grid-cols-2">
            <div class="p-4">
                <img src="<?php echo e(asset('panel/image/market.jpg')); ?>" alt="About Us Image" class="w-full h-auto rounded-lg shadow-lg">
            </div>
            
            <div class="p-8">
                <h2 class="mb-4 text-3xl font-bold text-gray-800">About Us</h2>
                <p class="mb-4 text-lg text-gray-600">
                By repurposing vegetables that would otherwise be discarded, we offer a sustainable solution that benefits everyone. Whether it's perfectly good produce for human consumption, nutritional feed for animals, or organic waste for creating natural fertilizers, we ensure that every vegetable finds its purpose.
                </p>
                <p class="text-lg text-gray-600">
                Our platform connects local farmers, businesses, and consumers to help reduce food waste while fostering a greener, more sustainable future.
                </p>
            </div>
        </div>
    </section>
    <!-- Contact Page Section -->
    <section class="py-10 bg-white-100"id="contact-section">
        <!-- Contact Information Section -->
        <div class="max-w-6xl mx-auto mt-10 text-center px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-center mb-8">
            <div class="flex-grow h-1 bg-red-500"></div>
            <h2 class="px-4 text-2xl font-semibold">Contact Us</h2>
            <div class="flex-grow h-1 bg-red-500"></div>
        </div>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                <!-- Address Box -->
                <div class="p-6 bg-white rounded-lg shadow">
                    <div class="flex items-center mb-4">
                        <i class="text-2xl text-green-600 fas fa-map-marker-alt"></i>
                        <h3 class="ml-4 text-lg font-bold">Address</h3>
                    </div>
                    <p>77/1, Liberty Nest Road, Kothalawala, Kaduwela</p>
                </div>
                <!-- Email Box -->
                <div class="p-6 bg-white rounded-lg shadow">
                    <div class="flex items-center mb-4">
                        <i class="text-2xl text-green-600 fas fa-envelope"></i>
                        <h3 class="ml-4 text-lg font-bold">Mail</h3>
                    </div>
                    <p><a href="mailto:hello@saaraketha.com" class="text-blue-500">hello@saaraketha.com</a></p>
                </div>
                <!-- Phone Number Box -->
                <div class="p-6 bg-white rounded-lg shadow">
                    <div class="flex items-center mb-4">
                        <i class="text-2xl text-green-600 fas fa-phone-alt"></i>
                        <h3 class="ml-4 text-lg font-bold">Phone Number</h3>
                    </div>
                    <p>+94-7623680 / +94 761234560</p>
                </div>
            </div>
        </div><br>
        <!-- Form and Map Section -->
        <div class="max-w-6xl mx-auto grid grid-cols-1 sm:grid-cols-2 gap-8 items-center px-4 sm:px-6 lg:px-8">
            <!-- Google Map -->
            <div class="w-full h-80 sm:h-96">
                <iframe 
                    width="100%" 
                    height="100%" 
                    frameborder="0" 
                    style="border:0" 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31686.79920714215!2d79.87031705000001!3d6.906185!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae25960c041b86b%3A0xa91509b5ae3ec7f8!2sAPIIT%20Sri%20Lanka!5e0!3m2!1sen!2slk!4v1673110202736!5m2!1sen!2slk" 
                    allowfullscreen>
                </iframe>
            </div>

            <!-- Contact Form -->
            <div class="p-6 bg-white rounded-lg shadow">
                <h2 class="mb-4 text-2xl font-semibold text-center text-green-600">Contact Us</h2>
                <form action="<?php echo e(route('contact.submit')); ?>" method="POST" class="space-y-4">
                    <?php echo csrf_field(); ?>
                    <div>
                        <label for="name" class="block mb-2 font-medium">Name:</label>
                        <input type="text" id="name" name="name" required class="w-full p-3 border border-gray-300 rounded">
                    </div>
                    <div>
                        <label for="email" class="block mb-2 font-medium">Email:</label>
                        <input type="email" id="email" name="email" required class="w-full p-3 border border-gray-300 rounded">
                    </div>
                    <div>
                        <label for="subject" class="block mb-2 font-medium">Subject:</label>
                        <input type="text" id="subject" name="subject" required class="w-full p-3 border border-gray-300 rounded">
                    </div>
                    <div>
                        <label for="message" class="block mb-2 font-medium">Message:</label>
                        <textarea id="message" name="message" rows="5" required class="w-full p-3 border border-gray-300 rounded"></textarea>
                    </div>
                    <button type="submit" class="w-full px-4 py-2 text-white bg-green-600 rounded hover:bg-green-700">
                        Send
                    </button>
                </form>
            </div>
        </div>
    </section>
    <!-- Partners Section -->
    <section class="w-full mx-auto text-center"> 
        <div class="flex items-center justify-center mb-8">
            <div class="flex-grow h-1 bg-red-500"></div>
            <h2 class="px-4 text-2xl font-semibold">Partners</h2>
            <div class="flex-grow h-1 bg-red-500"></div>
        </div>
        
        <!-- Partner logos -->
        <div class="flex items-center justify-center space-x-56">
            <div class="w-40">
                <img src="<?php echo e(asset('panel/image/Partner1.jpeg')); ?>" alt="Finlays Logo" class="mx-auto mb-4"> 
            </div>
            <div class="w-36">
                <img src="<?php echo e(asset('panel/image/Partner2.jpeg')); ?>" alt="Logicare Logo" class="mx-auto mb-4"> 
            </div>
        </div>
    </section>

    <!-- Footer Section -->
    <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Custom JavaScript -->
    <script src="<?php echo e(asset('panel/js/script.js')); ?>"></script>
    <!-- Custom JavaScript -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        <?php $__currentLoopData = $flashSales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            let countdown<?php echo e($product->id); ?> = <?php echo e($product->remaining_hours * 3600 + $product->remaining_minutes * 60); ?>; // Convert to seconds
            const interval<?php echo e($product->id); ?> = setInterval(() => {
                if (countdown<?php echo e($product->id); ?> > 0) {
                    countdown<?php echo e($product->id); ?>--;
                    const hours = Math.floor(countdown<?php echo e($product->id); ?> / 3600);
                    const minutes = Math.floor((countdown<?php echo e($product->id); ?> % 3600) / 60);
                    const seconds = Math.floor(countdown<?php echo e($product->id); ?> % 60);
                    document.querySelector('#countdown-<?php echo e($product->id); ?>').textContent = `${hours}h ${minutes}mins ${seconds}s`;
                } else {
                    clearInterval(interval<?php echo e($product->id); ?>);
                    document.querySelector('#countdown-<?php echo e($product->id); ?>').textContent = 'Expired';
                }
            }, 1000); // Update every second
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    });
</script>

</body>
</html>
<?php /**PATH C:\Users\savin\Desktop\foodcycle\resources\views/home.blade.php ENDPATH**/ ?>