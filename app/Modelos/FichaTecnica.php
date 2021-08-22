<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FichaTecnica extends Model
{
    /**
     *************************************************************************
     * Clase.........: FichaTecnica
     * Tipo..........: Modelo (MVC)
     * Descripción...: Clase que representa a la tabla "ficha_tecnica" en la BD.
     * Fecha.........: 07-MAR-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */

    protected $table = 'ficha_tecnica';
    protected $primaryKey = 'id';
    public $timestamps = false;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'fecha',
        'eCanioPesca',
        'eZuncho',
        'eChasis',
        'eRueda',
        'eRosca',
        'eManguera',
        'eValvula',
        'eTobera',
        'eRobinete',
        'ePalanca',
        'eManometro',
        'eVastago',
        'eDifusor',
        'eDisco',
        'carga',
        'observacion',
        'resultado',
        'empleado_id',
        'equipo_id',
    ];

    public function equipo(){
        return $this->belongsTo('App\Modelos\Equipo', 'equipo_id', 'id')->withTrashed();
    }

    public function empleado(){
        return $this->belongsTo('App\Modelos\Empleado', 'empleado_id', 'id')->withTrashed();
    }
}
