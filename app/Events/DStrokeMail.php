<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Hoursused;

class DStrokeMail
{
    use InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Hoursused $hoursused)
    {
        $this->hoursused = $hoursused;
        $this->lessonhours_id = $hoursused->lessonhours_id;
        $this->date_time = $hoursused->date_time;
        $this->usednumberofhours = $hoursused->numberofhours;
        $this->packnumberofhours = $hoursused->lessonhours->packages->numberofhours;
        $this->comments = $hoursused->comments;
        $this->player = $hoursused->lessonhours->players->getFullName($hoursused->lessonhours->players_id);
        $this->email = $hoursused->lessonhours->players->users->email;
        
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
