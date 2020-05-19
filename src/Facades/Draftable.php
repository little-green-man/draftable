<?php

namespace LittleGreenMan\Draftable\Facades;

use Illuminate\Support\Facades\Facade;

class Draftable extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'draftable';
    }
}
