<?php

namespace Vendor\Portal;

use Illuminate\Support\Facades\Facade;

class PortalFacade extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return Generator::class;
    }
}
