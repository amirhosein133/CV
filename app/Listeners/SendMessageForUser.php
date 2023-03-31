<?php

namespace App\Listeners;

use App\Events\SendUserEvent;
use App\Mail\SendUser;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendMessageForUser implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\SendUserEvent  $event
     * @return void
     */
    public function handle(SendUserEvent $event)
    {
        Mail::to($event->model->email)->send(new SendUser());
    }
}
