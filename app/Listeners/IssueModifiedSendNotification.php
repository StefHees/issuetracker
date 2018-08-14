<?php

namespace App\Listeners;

use App\Events\IssueModified;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class IssueModifiedSendNotification
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
        session()->flash('success', 'Issue modified');
    }
}
