<?php

namespace App\Event;

use App\Models\Article;
use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CreateCommentEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $model;
    public $type;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($model, $type)
    {
        $this->model = $model;
        $this->type = $type;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
