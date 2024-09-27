<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderStatusMail extends Mailable
{
    use Queueable, SerializesModels;
    protected $order;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order)
    {
        $this->order = $order; 
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
        
        return $this->view('email.order_status')
                    ->with(['order' => $this->order])
                    ->subject('Order status');
    }
}
