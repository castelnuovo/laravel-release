<?php

namespace Castelnuovo\LaravelRelease\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Castelnuovo\LaravelRelease\LaravelRelease
 */
class LaravelRelease extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Castelnuovo\LaravelRelease\LaravelRelease::class;
    }
}
