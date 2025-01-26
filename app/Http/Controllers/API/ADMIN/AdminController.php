<?php

namespace App\Http\Controllers\API\ADMIN;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User; // Assuming admins are stored in the users table
use Tymon\JWTAuth\Facades\JWTAuth;
use Validator;

class AdminController extends Controller
{


    //get all admins in the systeme ( users with role admin )
    public function index(Request $request)
    {
        $query = User::where('role', 'admin'); // Adjust this if you're using a roles relationship or pivot table

        // Check for search input in first_name or last_name
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('first_name', 'like', "%{$search}%")
                    ->orWhere('last_name', 'like', "%{$search}%");
            });
        }

        // Get results with optional pagination
        $admins = $query->get(); // Use ->paginate(10) for pagination if desired

        return response()->json([
            "success" => true,
            "message" => 'admins retrieved successfully',
            "admins" => $admins
        ], 200);

    }

    /**
     * Admin Login
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {

        // Manually handle validation using Validator
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // If validation fails, return a custom error response
        if ($validator->fails()) {
            return response()->json([
                'error' => 'Validation Error',
                'messages' => $validator->errors(),
            ], 422);
        }


        // Find the admin by email
        $user = User::where('email', $request->email)
            ->where('role', 'admin')
            ->first();

        // If admin not found or password doesn't match
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        // Create JWT Token for the authenticated admin
        if (!$token = JWTAuth::fromUser($user)) {
            return response()->json(['error' => 'Could not create token'], 500);
        }

        // Get the token's expiration time (in minutes)
        $tokenTTL = JWTAuth::factory()->getTTL(); // Returns the TTL in minutes


        // Return the token, user, and expiration time as part of the response
        return response()->json([
            "success" => true,
            "auth" => [
                'token' => $token,
            ],
            'user' => $user,
            'token_expiration' => $tokenTTL,
        ]);
    }
}
