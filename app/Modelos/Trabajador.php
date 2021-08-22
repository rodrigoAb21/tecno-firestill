<?php

namespace App\Modelos;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Trabajador extends User
{
    public static $TIPOS_DE_USUARIO = ['Administrador', 'Tecnico'];
}

