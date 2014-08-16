<?php namespace Vinicius73\LaravelInstantAvatar\Facade;

use Illuminate\Support\Facades\Facade;

class InstantAvatarFacade extends Facade
{
    protected static function getFacadeAccessor() { return 'vinicius73.instantavatar'; }
}