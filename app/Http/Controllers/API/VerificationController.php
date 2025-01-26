<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\VerifyEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class VerificationController extends Controller
{
    /**
     * Verify email with verification code and email.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function verifyEmail(Request $request)
    {
        // Validate the incoming request
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email', 'exists:users,email'],
            'verification_code' => ['required', 'numeric', 'digits:6'],
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first(),
            ], 422);
        }

        // Get the user by email
        $user = User::where('email', $request->email)->first();

        // Check if the verification code matches
        if ($user && $user->verification_code == $request->verification_code) {

            // Check if the verification code is within the 10-minute limit
            $createdAt = Carbon::parse($user->email_verification_code_created_at);
            if (Carbon::now()->diffInMinutes($createdAt) > 10) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'The verification code has expired. Please request a new one.',
                ], 400);
            }

            // Update the user's verification code and set email_verified_at
            $user->verification_code = null;
            $user->email_verification_code_created_at = null;
            $user->email_verified_at = now();  // Mark email as verified
            $user->save();

            // Send notification
            $user->notify(new VerifyEmail());

            return response()->json([
                'status' => 'success',
                'message' => 'Email verified successfully.',
            ], 200);
        }

        // If verification code doesn't match
        return response()->json([
            'status' => 'error',
            'message' => 'Invalid verification code.',
        ], 400);
    }
}
