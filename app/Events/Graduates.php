<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class Graduates implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

  public $id;

  public function __construct($user_id)
  {
    $this->id = $user_id;      
  }

  public function broadcastOn()
  {
      return new PrivateChannel('graduate.'.$this->id);
  }
}