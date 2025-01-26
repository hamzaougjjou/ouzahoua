<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\VerificationCodeMail;
use App\Models\User;
use App\Notifications\CreateAccount;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */

    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */

    public function store(Request $request): RedirectResponse
    {

        $validator = Validator::make($request->all(), [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'min:6'],
            'confirm_password' => ['required', 'min:6', "same:password"],
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors(provider: $validator)
                ->withInput();
        }

        // Generate a random verification code ( e.g., a 6-digit code )
        $verificationCode = rand(100000, 999999);
        // Send the email
        Mail::to($request->email)->send(new VerificationCodeMail($verificationCode));




        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'birth_day' => $request->birth_day,
            'gender' => $request->gender,
            'email' => $request->email,
            'password' => Hash::make($request->password),

            'verification_code' => $verificationCode,
            'email_verification_code_created_at' => now(),
        ]);

        event(new Registered($user));

        Auth::login(user: $user);

        // Send notification
        $user->notify(new CreateAccount());

        return redirect()
            ->route("home")
            ->with('register_success', 'Registration successful! Please check your email for the verification code.');

    }
}
