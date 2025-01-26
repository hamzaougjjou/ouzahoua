<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function __construct( Request $request)
    {
        // Dynamically choose the guard based on the request
        if ($request->is('api/*')) {
            $user = Auth::guard('api')->user(); // JWT Authenticated
        } else {
            $user = Auth::guard('web')->user(); // Session Authenticated
        }

    }
}

