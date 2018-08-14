<?php

namespace App\Listeners;

use App\Events\UserModified;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserModifiedSendMail
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
        //$event->task
        //var_dump($event->task);
        \Mail::to(auth()->user())->send(new \App\Mail\UserModified($event->user));
    }
}
