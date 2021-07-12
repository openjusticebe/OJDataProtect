<?php

namespace App\Mail;

use App\Events\ProcessUpdatedEvent;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ProcessUpdated extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(ProcessUpdatedEvent $event)
    {
        $this->event = $event;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.process-updated')
        ->subject('[' . config('app.name') . '] Process updated')
        ->with('event', $this->event);
    }
}
