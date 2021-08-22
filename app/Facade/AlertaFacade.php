<?php

namespace App\Facade;

use Illuminate\Support\Facades\Facade;

class AlertaFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return "Alerta";
    }
}