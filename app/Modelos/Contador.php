<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Contador extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'contador';
    public $timestamps = false;
    protected $fillable = [
        'caso_uso',
        'accion',
        'contador'
    ];
}
