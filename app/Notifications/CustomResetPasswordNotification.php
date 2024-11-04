<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\URL;

class CustomResetPasswordNotification extends Notification
{
    protected $token;
   

    public function __construct($token)
    {
        $this->token = $token;
       
    }

    public function toMail($notifiable)
    {
        $resetUrl = URL::to('/password/reset/' . $this->token . '?email=' . urlencode($notifiable->email));

        return (new MailMessage)
            ->subject('Reset Password Notification')
            ->line('You requested a password reset. Click the button below to reset your password.')
            ->action('Reset Password', $resetUrl)
            ->line('If you did not request a password reset, please ignore this message.');
    }

    
    public function via($notifiable)
    {
        return ['mail']; 
    }
}

