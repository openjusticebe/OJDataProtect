<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ProcessUpdatedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user;
    public $organisation;

    /**
    * Create a new event instance.
    *
    * @return void
    */
    public function __construct($user, $organisation)
    {
        $this->user = $user;
        $this->organisation = $organisation;
    }
}
