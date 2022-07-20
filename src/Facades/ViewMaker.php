<?php

namespace Ribafs\ViewMaker\Facades;

use Illuminate\Support\Facades\Facade;

class ViewMaker extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'view-maker';
    }
}
