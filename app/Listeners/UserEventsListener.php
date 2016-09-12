<?php

namespace App\Listeners;

use App\Events\SendWelcomeEmail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserEventsListener
{
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
     * @param  SendWelcomeEmail  $event
     * @return void
     */
    public function handle(SendWelcomeEmail $event)
    {
        //
    }
}
