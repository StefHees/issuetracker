<?php

namespace App\Listeners;

use App\Events\UserModified;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserModifiedSendNotification
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
     * @param  UserModified  $event
     * @return void
     */
    public function handle(UserModified $event)
    {
        //
        session()->flash('success', 'User modified');
    }
}
