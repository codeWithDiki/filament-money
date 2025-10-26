<?php

namespace CodeWithDiki\FilamentMoney\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \CodeWithDiki\FilamentMoney\FilamentMoney
 */
class FilamentMoney extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \CodeWithDiki\FilamentMoney\FilamentMoney::class;
    }
}
