<?php

namespace App\Listeners;

use Mail;
use App\Events\CheckoutEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Mail\Guest\OrderCustomerMail;

class CheckoutListener implements ShouldQueue
{
    use InteractsWithQueue;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  CheckoutEvent  $event
     * @return void
     */
    public function handle(CheckoutEvent $event)
    {
        $order = $event->order;
        $email = $order->customer_email;
        $name = $order->customer_name;

        Mail::to($email,$name)
            ->send(new OrderCustomerMail($order,$name));
    }
}
