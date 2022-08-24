<?php

namespace App\Listeners;

use App\Events\OrderShipped;
use App\Models\Order;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendShipmentNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public $order;
    public function __construct(Order $order)
    {
       $this->order=$order;
       var_dump($order);
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\OrderShipped  $event
     * @return void
     */
    public function handle(OrderShipped $event)
    {
        var_dump($event);
    }
}
