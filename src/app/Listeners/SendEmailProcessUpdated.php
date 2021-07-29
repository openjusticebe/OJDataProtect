<?php

namespace App\Listeners;

use App\Events\ProcessUpdatedEvent;
use App\Mail\ProcessUpdatedMail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendEmailProcessUpdated
{
    /**
    * Handle the event.
    *
    * @param  SendEmailProcessUpdated  $event
    * @return void
    */
    public function handle(UserAddedToCollectionEvent $event)
    {
        Log::info('Process ' . $event->process->name . 'from' . $event->organisation->name .  ' has been updated ');

        Mail::to($event->user->email)->send(new ProcessUpdatedMail($event));
    }
}
