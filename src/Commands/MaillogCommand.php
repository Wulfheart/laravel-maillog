<?php

namespace Wulfheart\Maillog\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Date;
use Symfony\Component\Mime\Email;

class MaillogCommand extends Command
{
    public $signature = 'maillog';

    public $description = 'Sends some random emails';

    public function handle(): int
    {
        Carbon::setTestNow(fake()->dateTimeBetween('-1 year', 'now'));

        $this->comment('All done');

        return self::SUCCESS;
    }
}
