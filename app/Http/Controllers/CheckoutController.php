<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Models\Product;
use App\Services\OrderService;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{

    protected $orderService;




    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $product = Product::where("slug", $request->product)->first();

        if (!$product)
            return view("checkout");
        return view("checkout")->with(compact("product"));
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
    public function store(OrderRequest $request)
    {
        // dd($request);
        $orderService = new OrderService();
        $order = $orderService->createOrder($request);
        if (!$order) {
            return back()->with("order_error", "لم يتم تأكيد طلبيتكم")
                ->with('source', $request->product ? "product" : "cart");
        }
        return back()->with("order_completed", "لقد ثم تأكيد طلبيتكم")
            ->with('source', $request->product ? "product" : "cart");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
