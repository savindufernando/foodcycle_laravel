<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\FoodController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\Storage\AuthController as StorageAuthController;
use App\Http\Controllers\Delivery\AuthController as DeliveryAuthController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Auth\PasswordResetLinkController;

// Comment out or remove this route if you don't need it
Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');

use App\Http\Controllers\NewsletterController;
// Route to display the newsletter subscription form
Route::get('/newsletter', [NewsletterController::class, 'showForm'])->name('newsletter.form');
Route::post('/newsletter/subscribe', [NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');
Route::get('/newsletter/subscribe', [NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');
Route::get('/newsletter/unsubscribe/{token}', [NewsletterController::class, 'unsubscribe'])->name('newsletter.unsubscribe');
Route::get('/teacher/newsletter', [NewsletterController::class, 'showSubscribers'])->name('teacher.newsletter.form');
Route::post('/teacher/newsletter/send', [NewsletterController::class, 'sendNewsletter'])->name('teacher.newsletter.send');


use App\Http\Controllers\BloggerAuthController;
use App\Http\Controllers\BlogController;

//Consultant
use App\Http\Controllers\ConsultantAuthController;

Route::get('/consultant/register', [ConsultantAuthController::class, 'registerForm'])->name('consultant.registerForm');
Route::post('/consultant/register', [ConsultantAuthController::class, 'register'])->name('consultant.register');

Route::get('/consultant/login', [ConsultantAuthController::class, 'loginForm'])->name('consultant.loginForm');
Route::post('/consultant/login', [ConsultantAuthController::class, 'login'])->name('consultant.login');

Route::post('/consultant/logout', [ConsultantAuthController::class, 'logout'])->name('consultant.logout');

Route::middleware('auth:consultants')->group(function () {
    Route::get('/consultant/dashboard', function () {
        return view('consultant.dashboard');
    })->name('consultant.dashboard');
});
Route::middleware('auth:consultants')->group(function () {
    Route::get('/consultant/profile', [ConsultantAuthController::class, 'viewProfile'])->name('consultant.profile');
    Route::post('/consultant/profile', [ConsultantAuthController::class, 'updateProfile'])->name('consultant.updateProfile');
    Route::put('/consultant/profile', [ConsultantAuthController::class, 'updateProfile'])->name('consultant.updateProfile');
    Route::post('/consultant/delete-account', [ConsultantAuthController::class, 'deleteAccount'])->name('consultant.deleteAccount');
});
// Public route
Route::get('/consultant/public-info', [ConsultantAuthController::class, 'publicInfo'])->name('consultant.publicInfo');

//Request
use App\Http\Controllers\RequestController;

Route::get('/services', [RequestController::class, 'index'])->name('services.index');
Route::post('/services/request', [RequestController::class, 'store'])->name('services.store');
Route::get('/services/request', [RequestController::class, 'store'])->name('services.store');
// Route::middleware('auth:consultants')->get('/consultant/requests', [RequestController::class, 'showAll'])->name('consultant.requests');
// Route::middleware('auth:consultants')->post('/consultant/requests/{id}/select', [RequestController::class, 'select'])->name('requests.select');
Route::middleware('auth:consultants')->group(function () {
    Route::post('/requests/{id}/accept', [RequestController::class, 'accept'])->name('requests.accept');
    Route::post('/requests/{id}/unaccept', [RequestController::class, 'unaccept'])->name('requests.unaccept');

});
Route::get('/fetch-requests', [RequestController::class, 'fetchAllRequests'])->name('fetch.requests');

Route::middleware('auth:consultants')->group(function () {
    Route::get('/consultant/dashboard', [RequestController::class, 'showAll'])->name('consultant.dashboard');
});

//

// Guest Routes for Blogger Authentication
Route::prefix('blogger')->name('blogger.')->middleware('guest:blogger')->group(function () {
    Route::get('login', [BloggerAuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [BloggerAuthController::class, 'login']);
    Route::get('signup', [BloggerAuthController::class, 'showSignupForm'])->name('signup');
    Route::post('signup', [BloggerAuthController::class, 'register']);
});

// Authenticated Blogger Routes
Route::prefix('blogger')->name('blogger.')->middleware('auth:blogger')->group(function () {
    Route::post('logout', [BloggerAuthController::class, 'logout'])->name('logout');
    Route::get('logout', [BloggerAuthController::class, 'logout'])->name('logout');
    Route::get('dashboard', [BloggerAuthController::class, 'dashboard'])->name('dashboard');
    Route::get('my-posts', [BlogController::class, 'myPosts'])->name('my-posts');
    Route::get('profile', [BloggerAuthController::class, 'profile'])->name('profile'); // Show profile
    Route::post('profile', [BloggerAuthController::class, 'updateProfile'])->name('profile.update'); // Update profile
});

// Public and Authenticated Blog Routes
Route::prefix('blogs')->name('blogs.')->group(function () {
    // Public Routes
    Route::get('/', [BlogController::class, 'index'])->name('index'); // List all blogs
    Route::get('{id}', [BlogController::class, 'show'])->name('show'); // View a single blog
    Route::get('/recent-blogs', [BlogController::class, 'recentBlogs'])->name('blogs.recent');

    // Authenticated Routes
    Route::middleware('auth:blogger')->group(function () {
        // Route::get('create', [BlogController::class, 'create'])->name('create'); // Create blog form
        Route::post('store', [BlogController::class, 'store'])->name('store');   // Store blog
        Route::get('{id}/edit', [BlogController::class, 'edit'])->name('edit'); // Edit blog form
        Route::put('{id}', [BlogController::class, 'update'])->name('update'); // Update blog
        Route::delete('{id}', [BlogController::class, 'destroy'])->name('destroy'); // Delete blog
    });
});
Route::middleware(['auth:blogger'])->group(function () {
    Route::get('blogs/{id}/edit', [BlogController::class, 'edit'])->name('blogs.edit');
    Route::put('blogs/{id}', [BlogController::class, 'update'])->name('blogs.update');
});

// Comments routes
Route::middleware('auth:blogger')->group(function () {
    Route::post('/blogs/{id}/comment', [BlogController::class, 'comment'])->name('blogs.comment');
    Route::put('/comments/{id}', [BlogController::class, 'updateComment'])->name('comments.update');
    Route::delete('/comments/{id}', [BlogController::class, 'destroyComment'])->name('comments.destroy');
});

Route::middleware('auth:blogger')->group(function () {
    Route::post('blogs/{id}/like', [BlogController::class, 'like'])->name('blogs.like');
});
Route::middleware('auth:blogger')->group(function () {
    Route::get('create', [BlogController::class, 'create'])->name('blogs.create');
    Route::get('store', [BlogController::class, 'store'])->name('store');
});

// Route::get('blogs', [BlogController::class, 'index'])->name('blogs.index');

//


Route::middleware('guest:donation')->prefix('donation')->name('donation.')->group(function() {
    Route::get('{id}/donationForm', [DonationController::class, 'donationForm'])->name('donationForm');
    Route::get('login', [DonationController::class, 'showLoginForm'])->name('login');
    Route::post('login', [DonationController::class, 'login']);
    Route::get('signup', [DonationController::class, 'showSignupForm'])->name('signup');
    Route::post('signup', [DonationController::class, 'store']);
});

// Authenticated users should not be able to access the login or signup page
Route::middleware('auth:donation')->prefix('donation')->name('donation.')->group(function() {
    Route::get('dashboard', [DonationController::class, 'dashboard'])->name('dashboard');
    Route::get('view-donations', [DonationController::class, 'viewDonations'])->name('viewDonations');
    Route::get('logout', [DonationController::class, 'logout'])->name('logout');
});


//Delivery
Route::middleware('guest:delivery')->prefix('delivery')->name('delivery.')->group(function() {
    Route::get('signup', [DeliveryAuthController::class, 'showSignupForm'])->name('signup');
    Route::post('signup', [DeliveryAuthController::class, 'register']);
    Route::get('login', [DeliveryAuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [DeliveryAuthController::class, 'login']);
});

Route::middleware('auth:delivery')->prefix('delivery')->name('delivery.')->group(function() {
    Route::post('logout', [DeliveryAuthController::class, 'logout'])->name('logout');
    Route::get('dashboard', [DeliveryAuthController::class, 'dashboard'])->name('dashboard');
});



// storage provider
Route::prefix('storage')->name('storage.')->group(function () {
    Route::middleware('guest:storage')->group(function () {
        Route::get('signup', [StorageAuthController::class, 'showSignupForm'])->name('signup');
        Route::post('signup', [StorageAuthController::class, 'register']);
        Route::get('login', [StorageAuthController::class, 'showLoginForm'])->name('login');
        Route::post('login', [StorageAuthController::class, 'login']);
    });

    Route::middleware('auth:storage')->group(function () {
        Route::post('logout', [StorageAuthController::class, 'logout'])->name('logout');
        Route::get('dashboard', [StorageAuthController::class, 'dashboard'])->name('dashboard');
    });
});

Route::get('/donation', [DonationController::class, 'index'])->name('index');

Route::post('/donation-request', [DonationController::class, 'rqstore'])->name('donation.request.store');
Route::delete('/donation/{id}', [DonationController::class, 'destroy'])->name('donation.destroy');
Route::patch('/donation/{id}/complete', [DonationController::class, 'markAsCompleted'])->name('donation.complete');
Route::post('/fetch-food-requests', [DonationController::class, 'fetchFoodRequests'])->name('fetch.food.requests');

Route::get('/fetch-food-requests', [DonationController::class, 'fetchFoodRequests']);
Route::post('/submit-donation', [DonationController::class, 'storeDonation']);
Route::post('/donor-save', [DonationController::class, 'donorStore'])->name('donation.donor.store');

Route::patch('/donors/{id}/deliver', [DonationController::class, 'setAsDelivered'])->name('donors.deliver');



//service
Route::get('/service', [ServiceController::class, 'index'])->name('service.index');
Route::get('/service/storage', [ServiceController::class, 'storage'])->name('service.storage');
Route::get('/service/delivery', [ServiceController::class, 'delivery'])->name('service.delivery');


// Show the cart
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::delete('/cart/{cartId}', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');
Route::get('/checkout', [PaymentController::class, 'checkout'])->name('checkout');
Route::post('/process-payment', [PaymentController::class, 'processPayment'])->name('process.payment');
Route::get('/order-confirmation/{payment}/{finalTotal}', [PaymentController::class, 'orderConfirmation'])->name('order.confirmation');

//shop
Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');
Route::get('shop/product/{id}', [ShopController::class, 'show'])->name('shop.product.show');
Route::post('shop/add-to-cart/{id}', [ShopController::class, 'addToCart'])->name('shop.addToCart');
Route::post('/shop/add-to-cart/{productId}', [ShopController::class, 'addToCart'])->name('shop.addToCart');


// Route::get('/', function () {
//     return view('home');
// })->name('home');
use App\Http\Controllers\Admin\ProductController;
use App\Models\Blog;

Route::get('/', function () {
    $flashSales = app(ProductController::class)->flashSales();
    $recentBlogs = Blog::latest()->take(6)->get(); // Fetch 6 most recent blogs
    return view('home', compact('flashSales', 'recentBlogs'));
})->name('home');

use App\Http\Controllers\ContactController;

Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');
Route::get('/teacher/contacts', [ContactController::class, 'viewContacts'])->name('teacher.contacts');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
require __DIR__.'/admin-auth.php';
require __DIR__.'/teacher-auth.php';
