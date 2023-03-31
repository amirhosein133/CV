<?php

namespace App\Notifications\Channel;

use Ghasedak\Exceptions\ApiException;
use Ghasedak\Exceptions\HttpException;
use Ghasedak\GhasedakApi;
use Illuminate\Notifications\Notification;
use mysql_xdevapi\Exception;

class ghasedakSms
{
    public function send($notifiable, Notification $notification)
    {
        if (!method_exists($notification, 'toGhasedakSms')) {
            throw  new Exception('not found function');
        }
        $message = $notification->toGhasedakSms($notifiable)['text'];
        $receptor = $notification->phoneNumber;
        $apiKey = config('services.ghasedak.key');
        try {
            $lineNumber = "100005858";
            $api = new GhasedakApi($apiKey);
            $api->SendSimple($receptor, $message, $lineNumber);
        } catch (ApiException $e) {
            throw $e;
        } catch (HttpException $e) {
            throw $e;
        }
    }

}
