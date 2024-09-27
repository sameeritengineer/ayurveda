<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $order;
    protected $isAdmin;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order, $isAdmin = false)
    {
        $this->order = $order; 
        $this->isAdmin = $isAdmin; 
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
        if (is_string($this->order->order_address)) {
            $this->order->order_address = json_decode($this->order->order_address, true);
        }

       
        if (is_string($this->order->shpping_method)) {
            $this->order->shpping_method = json_decode($this->order->shpping_method, true);
        }

       
        if (is_string($this->order->coupon)) {
            $this->order->coupon = json_decode($this->order->coupon, true);
        }

       
        if ($this->isAdmin) {
            $subject = 'New Order Arrived';
            $orderConfirmationMsg = 'A new order has been placed by the user.'; // Admin
        } else {
            $subject = 'Order Placed Successfully';
            $orderConfirmationMsg = 'Thank you for your order!'; // User
        }

        return $this->view('email.order_place')
                    ->with(['order' => $this->order, 'orderConfirmationMsg' => $orderConfirmationMsg])
                    ->subject($subject);
    }
}
