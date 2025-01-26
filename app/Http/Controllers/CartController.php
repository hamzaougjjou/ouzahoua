<?php

namespace App\Http\Controllers;


use App\Models\Cart;
// use Gloudemans\Shoppingcart\Cart;
// use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return view("cart");
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'cart' => 'required|array'
        ]);
        $cart = Cart::create([
            'cart' => $validated['cart'],
            'user_id' => Auth::check() ? Auth::id() : null, // Set user_id to null if not authenticated
            'is_auth' => Auth::check(), // Set is_auth to true if the user is authenticated, false otherwise
        ]);

        return response()->json([
            "success" => true,
            'message' => 'cart created successfully',
            'cart' => $cart
        ], 200);
    }

    /**
     * Display the specified cart.
     */
    public function show(Cart $cart)
    {
        return response()->json($cart);
    }

    /**
     * Update the specified cart in storage.
     */
    public function update(Request $request, Cart $cart)
    {
        $validated = $request->validate([
            'cart' => 'array',
        ]);

        $cart->update($validated);
        return response()->json($cart);
    }

    /**
     * Remove the specified cart from storage.
     */
    public function destroy(Cart $cart)
    {
        $cart->delete();

        return response()->json(['message' => 'Cart deleted successfully']);
    }

    // public function addAjax(Request $request)
    // {
    //     // Get product by ID
    //     $product = Product::findOrFail($request->product_id);

    //     // Get the cart from session or create an empty array
    //     $cart = session()->get('cart', []);

    //     // If product already in cart, increase quantity
    //     if (isset($cart[$product->id])) {
    //         $cart[$product->id]['quantity']++;
    //     } else {
    //         // Add product to cart
    //         $cart[$product->id] = [
    //             'name' => $product->name,
    //             'quantity' => 1,
    //             'price' => $product->price
    //         ];
    //     }

    //     // Store the updated cart in session
    //     session()->put('cart', $cart);

    //     // dd( $cart );

    //     return redirect()->back()->with('success', 'Product added to cart!');
    // }


}