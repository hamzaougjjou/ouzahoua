<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Traits\SlugTrait;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    use SlugTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $q = request('q');  // Retrieves the 'q' query parameter from the URL

        // If the 'q' parameter is present, search by name or description
        if ($q) {
            $products = Product::where('name', 'like', '%' . $q . '%')
                ->orWhere('description', 'like', '%' . $q . '%')
                ->get(); // Adjust pagination as necessary
        } else {
            // If no search query, display all products
            $products = Product::paginate(16);
        }

        return view("products")
            ->with(compact("products"))
        ;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        //
        $product = Product::where("slug", $slug)->first();
        // $product = Product::inRandomOrder()->get()->first();

        if (!$product) {
            abort(404);
        }

        $related_products = $this->getRelatedProducts($product);

        // dd( $product );

        return view("product_item")
            ->with(compact("product", "related_products"));
    }



    function getRelatedProducts(Product $product)
    {
        // Get products from the same category
        $categoryProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->limit(6)
            ->get();

        // If less than 6 products found in the same category
        if ($categoryProducts->count() < 6) {
            $needed = 6 - $categoryProducts->count();

            // Get products that have similar words in the name or description
            $similarProducts = Product::where('id', '!=', $product->id)
                ->limit($needed)
                ->get();

            // Merge similar products with the category products
            $categoryProducts = $categoryProducts->merge($similarProducts);
        }

        // If still less than 6, fill with random products
        if ($categoryProducts->count() < 6) {
            $needed = 6 - $categoryProducts->count();

            // Get random products to fill the remaining slots
            $randomProducts = Product::where('id', '!=', $product->id)
                ->inRandomOrder()
                ->limit($needed)
                ->get();

            // Merge random products
            $categoryProducts = $categoryProducts->merge($randomProducts);
        }

        // Return exactly 6 products
        return $categoryProducts->take(6);
    }



    public function offers()
    {

        $q = request('q');  // Retrieves the 'q' query parameter from the URL

        // If the 'q' parameter is present, search by name or description
        if ($q) {
            $products = Product::
                where("discount_price", "!=", null)
                ->where('name', 'like', '%' . $q . '%')
                ->orWhere('description', 'like', '%' . $q . '%')
                ->get(); // Adjust pagination as necessary
        } else {
            // If no search query, display all products
            $products = Product::
                where("discount_price", "!=", null)
                ->paginate(16);
        }

        return view("offers")
            ->with(compact("products"))
            ->with("currency", "ر.س")
        ;
    }


}
