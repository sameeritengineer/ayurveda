<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderStatusMail;

class OrderStatusMailJob implements ShouldQueue
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
        Mail::to($this->order->order_address['email'])->send(new OrderStatusMail($this->order));

    }
    
}
