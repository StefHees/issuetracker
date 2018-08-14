<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\IssueCreated' => [
            'App\Listeners\IssueCreatedSendMail',
            'App\Listeners\IssueCreatedSendNotification',
        ],
        'App\Events\IssueModified' => [
            'App\Listeners\IssueModifiedSendMail',
            'App\Listeners\IssueModifiedSendNotification',
        ],
        'App\Events\IssueDeleted' => [
            'App\Listeners\IssueDeletedSendMail',
            'App\Listeners\IssueDeletedSendNotification',
        ],
        'App\Events\UserCreated' => [
            'App\Listeners\UserCreatedSendMail',
            'App\Listeners\UserCreatedSendNotification',
        ],
        'App\Events\UserModified' => [
            'App\Listeners\UserModifiedSendMail',
            'App\Listeners\UserModifiedSendNotification',
        ],
        'App\Events\UserDeleted' => [
            'App\Listeners\UserDeletedSendMail',
            'App\Listeners\UserDeletedSendNotification',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
