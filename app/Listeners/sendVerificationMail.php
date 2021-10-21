<?php

namespace App\Listeners;

use App\Events\onVerify;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class sendVerificationMail
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
     * @param  onVerify  $event
     * @return void
     */
    public function handle(onVerify $event)
    {
        //
    }
}
