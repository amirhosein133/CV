<?php

namespace App\Listener;

use App\Event\RegisteredEvent;
use App\Mail\SendCodeMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendEmailVerificationNotification implements ShouldQueue
{
    use InteractsWithQueue;

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
     * @param \App\Event\RegisteredEvent $event
     * @return void
     */
    public function handle(RegisteredEvent $event)
    {
        Mail::to($event->user->email)->send(new SendCodeMail($event->code));
    }
}
