<?php

namespace App\Http\Controllers\API\ADMIN;

use App\Http\Controllers\Controller;
use App\Models\ProductType;
use Illuminate\Http\Request;

class ProductTypeController extends Controller
{
    //
    public function index()
    {
        $product_types = ProductType::all();

        return response()->json([
            "success" => true,
            "message" => 'product types retrieved successfully',
            "product_types" => $product_types,
        ], 200);

    }
}
