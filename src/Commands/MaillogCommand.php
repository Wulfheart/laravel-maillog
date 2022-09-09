<?php

namespace Wulfheart\Maillog\Commands;

use Illuminate\Console\Command;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use Wulfheart\Maillog\Email;

class MaillogCommand extends Command
{
    public $signature = 'maillog {amount?}';

    public $description = 'Sends some random emails';

    public function handle(): int
    {
        $amount = $this->argument('amount') ?? 1_000;
        $this->withProgressBar(range(1, $amount), function () {
            $email = new Email(
                fake()->dateTimeBetween('-1 year')->format("Y-m-d H:i:s"),
                fake()->email,
                fake()->email,
                null,
                null,
                fake()->sentence(3),
                fake()->paragraphs(3, true),
                null,
                fake()->realText(1000),
            );
            $email->save();
        });

        $this->comment('All done');

        return self::SUCCESS;
    }
}
