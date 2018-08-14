<?php

namespace App\Listeners;

use App\Events\IssueCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class IssueCreatedSendMail
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
     * @param  IssueCreated  $event
     * @return void
     */
    public function handle(IssueCreated $event)
    {
        //$event->task
        //var_dump($event->task);
        \Mail::to(auth()->user())->send(new \App\Mail\IssueCreated($event->issue));
    }
}
