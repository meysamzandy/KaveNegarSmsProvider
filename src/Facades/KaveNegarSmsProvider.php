<?php

namespace MeysamZnd\KaveNegarSmsProvider\Facades;

use Illuminate\Support\Facades\Facade;

class KaveNegarSmsProvider extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'kave-negar-sms-provider';
    }
}
