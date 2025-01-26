<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NewsletterController extends Controller
{
    public function subscribe(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:newsletters,email'
        ]);

        // Check if the validation fails
        if ($validator->fails()) {
            // Redirect back with validation errors
            return redirect()->back()->withErrors($validator)
                ->withInput()
                ->withFragment('news-letter-container');
        }

        try {
            // Create a new subscriber
            Newsletter::create([
                'email' => $request->email
            ]);

            // Redirect back with success message
            return redirect()->back()->with('newsletter_success', 'You are now subscribed to our newsletter')->withFragment('news-letter-container');

        } catch (\Exception $e) {
            // Handle any errors, like database failures
            return redirect()->back()->with('newsletter_error', 'An error occurred. Please try again.')
                ->withFragment('news-letter-container');

        }
    }

}
