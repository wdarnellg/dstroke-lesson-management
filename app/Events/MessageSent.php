<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Lessonhours;

class MessageSent
{
    use InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
     public function __construct(Lessonhours $lessonhours)
    {
        $lessonhours = Lessonhours::with('players', 'packages')->get();
        dd($lessonhours);
        $this->lessonhours = $lessonhours; 
        $this->player = $lessonhours->players->getFullName($lessonhours->players_id);
        $this->email = $lessonhours->players->users->email;
        $this->package = $lessonhours->packages->name;
        
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
