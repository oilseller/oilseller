<?php

namespace OilSeller;

use Illuminate\Support\Facades\Facade;

class OilSeller extends Facade
{
    public static function getFacadeAccessor()
    {
        return 'oilseller';
    }
}
