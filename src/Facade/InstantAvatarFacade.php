<?php namespace Vinicius73\IAvatar\Facade;

use Illuminate\Support\Facades\Facade;

class InstantAvatarFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'iavatar';
    }
}