<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Support\Facades\URL;
use App\Notifications\CustomResetPasswordNotification;
use App\Services\TwilioService;
class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = ['name', 'email', 'password'];
    protected $hidden = ['password', 'remember_token'];
    protected $casts = ['email_verified_at' => 'datetime'];

    public function sendPasswordResetNotification($token)
    {
        \Log::info("sendPasswordResetNotification called for user: {$this->email}");

        // Construct the reset URL
        $resetUrl = URL::to('/password/reset/' . $token . '?email=' . urlencode($this->email));

        // Send the email notification
        $this->notify(new CustomResetPasswordNotification($token));

        // Log the reset URL for debugging
        \Log::info("Password Reset Link: " . $resetUrl);

        // Get the phone number and country code from the session
        $phone = session('password_reset_country_code') . session('password_reset_phone');
        
        // Prepare the data for the SMS template
        $data = [
            'resetUrl' => $resetUrl, // Pass the reset URL to the template
        ];

        // Log before sending SMS
        \Log::info("Sending SMS to $phone with data: ", $data);

        // Send the SMS using your TwilioService
        app(TwilioService::class)->sendSmsWithTemplate($phone, 'password_reset', $data);
    }

    
}
