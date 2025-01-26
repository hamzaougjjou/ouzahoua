<?php

use App\Http\Controllers\API\VisitorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\VerificationController;
use App\Http\Controllers\CartController;


Route::post('/verify-email', [VerificationController::class, 'verifyEmail']);
Route::post('/cart/add-ajax', [CartController::class, 'addAjax'])->name('cart.add.ajax');

Route::controller(VisitorController::class)->group(function () {
    Route::post('track-visits', action: 'trackVisit');
});



// Route to store the cart (POST request)
Route::post('/carts', [CartController::class, 'store'])->name('carts.store');

// // Route to show the cart (GET request)
// Route::get('/carts/{id}', [CartController::class, 'show'])->name('carts.show');

// // Route to update the cart (PUT or PATCH request)
// Route::put('/carts/{id}', [CartController::class, 'update'])->name('carts.update');

// // Route to delete the cart (DELETE request)
// Route::delete('/carts/{id}', [CartController::class, 'destroy'])->name('carts.destroy');


Route::group([
    'prefix' => 'admin'
    ], function () {


    Route::group([

        'middleware' => 'api',
        'prefix' => 'auth'

    ], function () {

        Route::post('login', 'AuthController@login');
        Route::post('logout', 'AuthController@logout');
        Route::post('refresh', 'AuthController@refresh');
        Route::post('me', 'AuthController@me');

    }); //'middleware' => 'api',

}); //'prefix' => 'admin'


require __DIR__ . '/admin_api.php';
require __DIR__ . '/seller_api.php';