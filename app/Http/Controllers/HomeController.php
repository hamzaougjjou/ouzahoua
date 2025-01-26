<?php

namespace App\Http\Controllers;

use App\Enums\SliderLocation;
use App\Models\Category;
use App\Models\Faq;
use App\Models\HomeReview;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(Request $request)
    {

        $sliders = Slider::getSliderByLocation( SliderLocation::HOME->value );
        $reviews = HomeReview::get();

        $category_search_slug = $request->input("category");

        $faqs = Faq::where("is_visible", true)
            ->get(["question", "answer"]);


        return view("home")
            ->with(compact(
                "reviews",
                "faqs"
            ))
            ->with("featured_products", $this->featuredProducts())
            ->with("best_selling_products", $this->bestSelling())
            ->with("offers", $this->offerProducts())
            ->with("sliders", $sliders );
    }

    public function featuredProducts()
    {
        $products = Product::where("featured", true)->limit(4)
            ->withCount('reviews')
            ->get();
        if (!$products)
            return [];
        return $products;
    }
    public function offerProducts()
    {
        $products = Product::
            where("discount_price", "!=", null)
            ->limit(3)
            ->get();
        if (!$products)
            return [];
        return $products;
    }
    public function bestSelling()
    {
        $products = Product::inRandomOrder()
            ->limit(3)
            ->get();
        if (!$products)
            return [];
        return $products;
    }
}


