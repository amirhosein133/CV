<?php

namespace App\Listener;

use App\Event\LoginEvent;
use App\Mail\SendCodeMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class sendEmailAuthentication
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
     * @param \App\Event\LoginEvent $event
     * @return void
     */
    public function handle(LoginEvent $event)
    {
        Mail::to($event->user->email)->send(new SendCodeMail($event->code));
    }
}
