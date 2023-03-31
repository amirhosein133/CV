<?php

namespace App\Providers;

use App\Event\RegisteredEvent;
use App\Event\CreateCommentEvent;
use App\Event\LoginEvent;
use App\Events\SendUserEvent;
use App\Listener\SendEmailVerificationNotification;
use App\Listener\SendEmailCreateComment;
use App\Listener\sendEmailAuthentication;
use App\Listeners\SendMessageForUser;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        RegisteredEvent::class => [
            SendEmailVerificationNotification::class
        ],
        LoginEvent::class => [
            sendEmailAuthentication::class
        ],
        CreateCommentEvent::class => [
            SendEmailCreateComment::class
        ],
        SendUserEvent::class => [
            SendMessageForUser::class
        ],

    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
