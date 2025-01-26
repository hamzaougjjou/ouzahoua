<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SellerController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/logic', [CategoryController::class, "index"]);


Route::get('/', [HomeController::class, "index"])->name("home");

Route::get('/shop', [ProductController::class, "index"])->name("shop");
Route::get('/products', [ProductController::class, "index"])->name("products");
Route::get('/shop/{slug}', [ProductController::class, "show"])->name("products.show");
Route::get('/products/{slug}', [ProductController::class, "show"])->name("products.show");
Route::get('/offers', [ProductController::class, "offers"])->name("offers");

Route::get('/notifications', [NotificationController::class, "index"])->name("notifications");

Route::get('/categories/{slug}', [CategoryController::class, "show"])->name("categories.show");
Route::get('/cart', [CartController::class, "index"])->name("cart");

Route::get('/contact', [ContactController::class, "index"])->name("contact");

Route::post('/newsletter-subscribe', [NewsletterController::class, 'subscribe'])->name('newsletter.store');

Route::post('/reviews/store', [ReviewController::class, 'store'])->name('reviews.store');
Route::get('/payment', [PaymentController::class, 'index'])->name('payment');
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');

Route::get('/about', function () {
    return view('about'); })->name("about");

Route::get('/shipping-returns', function () {
    return view('shipping-returns'); });

Route::get('/privacy-policy', function () {
    return view(view: 'privacy'); });


    Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');


Route::get('/test', function () {
    return view('test'); })->name("test");




    Route::get('/sell-with-us', [SellerController::class, "index"])->name("seller.index");
    Route::get('/sell-with-us/join', [SellerController::class, "create"])->name("seller.create");
    Route::post('/sell-with-us/join', [SellerController::class, "store"])->name("seller.store");









Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
require __DIR__ . '/payment.php';
