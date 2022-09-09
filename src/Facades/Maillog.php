<?php

namespace Wulfheart\Maillog\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Wulfheart\Maillog\Maillog
 */
class Maillog extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Wulfheart\Maillog\Maillog::class;
    }
}
