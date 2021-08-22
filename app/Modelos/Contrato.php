<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contrato extends Model
{
    /**
     *************************************************************************
     * Clase.........: Contrato
     * Tipo..........: Modelo (MVC)
     * Descripción...: Clase que representa a la tabla "contrato" en la BD.
     * Fecha.........: 10-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */

    protected $table = 'contrato';
    protected $primaryKey = 'id';
    public $timestamps = false;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'fecha_inicio',
        'fecha_fin',
        'periodo',
        'documento',
        'edicion',
        'estado',
        'cliente_id',
        'empleado_id',
        ];

    public function cliente(){
        return $this->belongsTo('App\Modelos\Cliente', 'cliente_id', 'id')->withTrashed();
    }

    public function empleado(){
        return $this->belongsTo('App\Modelos\Empleado', 'empleado_id', 'id')->withTrashed();
    }

    public function sucursales(){
        return $this->hasMany(Sucursal::class);
    }
}
