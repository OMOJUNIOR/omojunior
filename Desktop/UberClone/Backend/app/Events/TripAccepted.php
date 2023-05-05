<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Trip;

class TripAccepted
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $trip; // available on the event instance

    private $user;

    /**
     * Create a new event instance.
     */
    public function __construct(Trip $trip, $user)
    {
        $this->trip = $trip;
        $this->user = $user;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        // broadcast to the passenger about their trip being accepted by a driver
        return [
            new Channel('passenger.' . $this->user->id), 
        ];
    }
}
