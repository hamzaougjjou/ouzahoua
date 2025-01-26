<?php

use App\Http\Controllers\API\ADMIN\CourseItemController;
use App\Http\Controllers\API\ADMIN\MediaController;
use App\Http\Controllers\API\ADMIN\ProductTypeController;
use App\Http\Controllers\API\ADMIN\SerialController;
use App\Http\Controllers\API\ADMIN\UserController;
use App\Http\Controllers\API\ADMIN\AdminController;
use App\Http\Controllers\API\ADMIN\ConversationController;
use App\Http\Controllers\API\ADMIN\HomeController as AdminHomeController;
use App\Http\Controllers\API\ADMIN\MessageController;
use App\Http\Controllers\API\ADMIN\SliderController;
use App\Http\Controllers\API\ADMIN\ProductController;
use App\Http\Controllers\API\ADMIN\CategoryController;
use App\Http\Controllers\API\ADMIN\AnlyticsController;
use App\Http\Controllers\API\ADMIN\OrderController;
use App\Http\Controllers\API\ADMIN\StoreController;



use Illuminate\Support\Facades\Route;

// Example admin login route
Route::post('admin/login', [AdminController::class, 'login']);
Route::get('admin/store', [StoreController::class, 'getInfo']);


// Admin routes with prefix '/admin' and JWT authentication middleware
Route::group(['prefix' => 'admin', 'middleware' => ['jwt.auth', 'admin']], function () {

    Route::controller(AdminHomeController::class)->group(function () {
        Route::get('home/info', 'index');
        Route::get('home/best-selling', 'bestSellingProducts');
        Route::get('home/orders', 'orders');
        Route::get('home/users', 'users');
    });

    Route::controller(AnlyticsController::class)->group(function () {
        Route::get('anlytics/users', 'users');
        Route::get('anlytics/orders', 'orders');
        Route::get('anlytics/visitors', 'visitors');
        Route::get('anlytics/visitors-by-country', 'visitorsByCounry');
        Route::get('anlytics/sales', 'sales');
    });

    Route::get('admins', [AdminController::class, 'index']);

    Route::post('/store/update', action: [StoreController::class, 'update']);


    Route::get('/conversations', [ConversationController::class, 'conversations']);
    Route::get('/conversations/{id}', [ConversationController::class, 'show']);

    Route::get('/messages/{conversation_id}', [MessageController::class, 'messages']);
    Route::post('/conversations/send-message', [MessageController::class, 'sendMessage']);

    Route::controller(UserController::class)->group(function () {
        Route::get('users', 'index');
        Route::put('/user/toggle-status/{id}', 'toggleUserStatus');
    });


    Route::controller(OrderController::class)->group(function () {
        Route::get('orders', 'index');
        Route::get('orders/{id}', 'show');
        Route::put('/orders/{order}/status', 'updateStatus');

    });

    Route::controller(CategoryController::class)->group(function () {
        Route::get('categories', 'index');
        Route::post('categories', 'store');
        Route::delete('categories/{id}', 'destroy');
        Route::get('categories/{id}', 'show');
        Route::put('categories/{id}', 'update');
        Route::get('parents-categories', action: 'parentsCategories');
        Route::get('categories/{parent_id}/sub-categories', action: 'getSubCategories');
    });

    Route::controller(ProductController::class)->group(function () {
        Route::get('products', 'index');
        Route::post('products', 'store');
        Route::get('products-type/{product_type_id}', 'productsBySerialId');
        Route::put('/products/{id}/update-file', 'updateFileUrl');
        Route::put('/products/{id}/update-serial', 'updateSerial');

    });

    Route::controller(ProductTypeController::class)->group(function () {
        Route::get('product-types', 'index');
    });

    Route::controller(CourseItemController::class)->group(function () {
        Route::get('/course-items/product_id', 'index');  // get all course item 
        Route::post('/course-items/{product_id}', 'store');  // Add a new course item
        Route::delete('/course-items/{item}', 'destroy');  // Delete a course item
    });

    Route::controller(SerialController::class)->group(function () {
        Route::post('/serials', 'store');
    });

    Route::controller(MediaController::class)->group(function () {
        // Fetch all media folders
        Route::get('media/folders', 'folders');
        // Fetch all media files
        Route::get('media/files', 'files');
        // Store a new media file or folder
        Route::post('media', 'store');
        // Show details of a specific media file or folder
        Route::get('media/{id}', 'show');
        // Update the name or details of a specific media file or folder
        Route::put('media/{id}', 'update');
        // Delete a media file or folder
        Route::delete('media/{id}', 'destroy');
    });



Route::get('/sliders', [SliderController::class, 'index']);
Route::post('/sliders', [SliderController::class, 'store']);
Route::put('/sliders/{id}', [SliderController::class, 'update']);
Route::delete('/sliders/{id}', [SliderController::class, 'destroy']);


});





