<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use App\Services\TwilioService;
use \App\Models\User;
use Illuminate\Support\Facades\URL;
class PasswordResetLinkController extends Controller
{
    protected $twilioService;

    public function __construct(TwilioService $twilioService)
    {
        $this->twilioService = $twilioService;
    }

    /**
     * Display the password reset link request view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.forgot-password');
    }

    /**
     * Handle an incoming password reset link request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
     
    public function store(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'phone' => ['required', 'string', 'max:15'],
            'country_code' => ['required', 'string', 'max:5'],
        ]);

        $user = User::where('email', $request->input('email'))->first();

        if (!$user) {
            return back()->withErrors(['email' => 'User not found']);
        }

        // Store phone and country code in session temporarily
        session([
            'password_reset_phone' => $request->phone,
            'password_reset_country_code' => $request->country_code,
        ]);

        $token = Password::createToken($user);
        $user->sendPasswordResetNotification($token);

        return back()->with('status', 'Password reset link sent to email and SMS');
    }
    
    
    
}
