<?php
namespace Laravel\Tooma\Api\Facades;

use Illuminate\Support\Facades\Facade;
class ToomaFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'TOOMA';
    }
}