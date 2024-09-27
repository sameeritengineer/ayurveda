<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderConfirmationMail as OrderMail;

class OrderConfirmationMailJob implements ShouldQueue // Renamed to avoid confusion with the Mailable
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $order;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($order)
    {
        $this->order = $order; // Corrected variable assignment
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
       
        if (is_string($this->order->order_address)) {
            $this->order->order_address = json_decode($this->order->order_address, true);
        }

        // Send email to the user
        Mail::to($this->order->order_address['email'])->send(new OrderMail($this->order));

        // Send email to the admin
        Mail::to(env('ADMIN_EMAIL'))->send(new OrderMail($this->order, true)); 
    }
}
