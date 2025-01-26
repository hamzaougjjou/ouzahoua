<?php

namespace App\Providers;

use App\Models\Shipping;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use App\Models\Store;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $shipping = Shipping::first();
        $store = Store::first(); // Retrieves the store with ID 1
        $global_categories = Category::where('parent_id', '=', null)->get(); // Retrieve categories from the database
        View::share([
            'global_categories' => $global_categories,
            "store" => $store,
            "shipping" => $shipping
        ]); // Share data globally with all views
    }

}
