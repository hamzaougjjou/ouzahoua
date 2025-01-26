<?php

namespace App\Http\Controllers\API\ADMIN;

use App\Http\Controllers\Controller;
use App\Models\Serial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class SerialController extends Controller
{
    

     /**
     * Store a single serial or multiple serials.
     */
    public function store(Request $request)
    {

        // return  $request;
        // Validation for serial data
        $validator = Validator::make($request->all(), [
            'serials' => 'required|array',
            // 'serials.*' => 'required|json',
            'product_id' => 'required|exists:products,id'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // return $request->serials;

        // Iterate over each serial and store them in the database
        foreach ($request->serials as $item){
            Serial::create([
                'publisher_id' => null,
                'serial_schema' => $item,
                'product_id' => $request->product_id
            ]);
        }

        return response()->json(['message' => 'Serial(s) stored successfully.'], 200);
    }
    
}
