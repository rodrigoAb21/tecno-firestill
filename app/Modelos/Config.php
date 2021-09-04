<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    protected $table = 'config';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'theme',
        'sidebar',
        'topbar',
        'font',
        'font_size',
        'trabajador_id',
    ];
}
