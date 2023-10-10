<?php

namespace Joisar\Totp;

use Illuminate\Support\Facades\Facade;

class TotpFacade extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return Generator::class;
    }
}
