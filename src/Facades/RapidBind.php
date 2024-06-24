<?php

namespace DeGraciaMathieu\RapidBind\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \DeGraciaMathieu\RapidBind\RapidBind
 */
class RapidBind extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \DeGraciaMathieu\RapidBind\RapidBind::class;
    }
}
