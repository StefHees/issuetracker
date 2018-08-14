<?php

namespace App\Listeners;

use App\Events\IssueModified;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class IssueModifiedSendMail
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
     * @param  IssueModified  $event
     * @return void
     */
    public function handle(IssueModified $event)
    {
        //
        \Mail::to(auth()->user())->send(new \App\Mail\IssueModified($event->issue));
    }
}
