<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    //
    public function index(Request $request)
    {
        $product_id = $request->input("product");
        if ($product_id) {
            $product = Product::find($product_id);
            if ($product) {
                $product->quantity = 1;
                return view("payment")
                    ->with(compact("product"));
            }
        }
        return view("payment");
    }
}
