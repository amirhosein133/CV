<?php

namespace App\Listener;

use App\Event\CreateCommentEvent;
use App\Mail\CreateCommentForArticleMail;
use App\Mail\CreateMessageForAdminMail;
use App\Models\BaseModel;
use App\Notifications\CreateCommentNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class SendEmailCreateComment implements ShouldQueue
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
     * @param \App\Event\CreateCommentEvent $event
     * @return void
     */
    public function handle(CreateCommentEvent $event)
    {
        switch ($event->type) {
            case (BaseModel::TYPE_COMMENT):
                Mail::to($event->model->user->email)->send(new CreateCommentForArticleMail());
                break;
            case(BaseModel::TYPE_CONNECTION):
            {
                Mail::to($event->model->email)->send(new CreateMessageForAdminMail());
                break;
            }
            case(BaseModel::TYPE_ARTICLE):
            {
                Mail::to($event->model->email)->send(new CreateMessageForAdminMail());
                break;
            }
            case(BaseModel::TYPE_PROJECT):
            {
                Mail::to($event->model->email)->send(new CreateMessageForAdminMail());
                break;
            }
        }

    }
}
