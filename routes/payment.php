<?php

use App\Http\Controllers\GooglePayPaymentController;
use App\Http\Controllers\StripePaymentController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PayPalController;

Route::post('/paypal', [PayPalController::class, 'paypal'])->name('paypal');
Route::get('/paypal/success', [PayPalController::class, 'success'])->name('paypal.success');
Route::get('/paypal/cancel', [PayPalController::class, 'cancel'])->name('paypal.cancel');

Route::post('/stripe', [StripePaymentController::class, 'stripe'])->name('stripe');
Route::get('/stripe/success', [PayPalController::class, 'success'])->name('stripe.success');


Route::post('/googlr-pay', [GooglePayPaymentController::class, 'googlePay'])->name('googlePay');