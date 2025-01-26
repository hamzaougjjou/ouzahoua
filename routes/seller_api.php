<?php

use Illuminate\Support\Facades\Route;



Route::group(['middleware' => ['api', 'seller']], function () {
    Route::get("seller-testing", function () {
        return "seller-testing sdjnfsopd sd fisdfpisdpfispi isd fpisdf";
    });
});
