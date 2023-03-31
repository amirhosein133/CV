<?php

namespace App\Notifications;

use App\Notifications\Channel\ghasedakSms;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendSmsNotification extends Notification
{
    use Queueable;

    public $code;
    public $phoneNumber;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($code, $phoneNumber)
    {
        $this->code = $code;
        $this->phoneNumber = $phoneNumber;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [ghasedakSms::class];
    }

    public function toGhasedakSms($notifiable)
    {
        return [
            "text" => "این کد {$this->code}احراز هویت شما می باشد."
        ];
    }


}
