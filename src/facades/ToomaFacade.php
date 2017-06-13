<?php
namespace Tooma\Laravel\Api\Facades;

use Illuminate\Support\Facades\Facade;
class ToomaFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'TOOMA';
    }
}