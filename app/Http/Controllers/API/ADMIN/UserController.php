<?php

namespace App\Http\Controllers\API\ADMIN;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //get all users 
    public function index(Request $request)
    {
        $q = $request->input("search_query");

        if (!$q)
            $q = '';

        $users = User::where("role", 'user')
            ->where("first_name", 'like', "%" . $q . "%")
            ->orWhere("last_name", 'like', "%" . $q . "%")
            ->paginate(20);

        foreach ($users as $user) {
            # code...
            $user->joined_at = $user->created_at->diffForHumans();
            $user->name = $user->name;
        }

        return response()->json([
            "success" => true,
            "message" => 'users retrieved successfully',
            "users" => $users
        ], 200);
    }

    /**
     * Toggle the user status (enable/disable).
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function toggleUserStatus($id)
    {
        // Find the user by ID
        $user = User::find($id);

        // Check if user exists
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User not found',
            ], 404);
        }

        // Toggle the disabled_at field
        if ($user->disabled_at) {
            // Enable the user (set disabled_at to null)
            $user->disabled_at = null;
            $message = 'User account enabled successfully.';
        } else {
            // Disable the user (set disabled_at to current timestamp)
            $user->disabled_at = now();
            $message = 'User account disabled successfully.';
        }

        // Save the user record
        $user->save();

        return response()->json([
            'success' => true,
            'message' => $message,
            'user' => $user,
        ]);
    }

}
