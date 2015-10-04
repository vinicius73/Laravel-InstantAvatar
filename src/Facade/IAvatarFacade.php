<?php namespace Vinicius73\IAvatar\Facade;

use Illuminate\Support\Facades\Facade;

class IAvatarFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'iavatar';
    }
}