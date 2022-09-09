<?php

namespace Wulfheart\Maillog\Listeners;

use Illuminate\Mail\Events\MessageSending;
use Illuminate\Mail\Events\MessageSent;
use Wulfheart\Maillog\Email;

class SaveMail
{
    public function handle(MessageSent $event): void
    {
        $email = Email::fromSymfonyMail($event->message);
        $email->save();
    }

}