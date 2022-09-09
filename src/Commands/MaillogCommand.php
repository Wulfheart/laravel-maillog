<?php

namespace Wulfheart\Maillog\Commands;

use Illuminate\Console\Command;

class MaillogCommand extends Command
{
    public $signature = 'laravel-maillog';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
