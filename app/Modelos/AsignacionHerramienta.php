<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AsignacionHerramienta extends Model
{
    /**
     *************************************************************************
     * Clase.........: AsignacionHerramienta
     * Tipo..........: Modelo (MVC)
     * Descripción...: Clase que representa a la tabla
     * "asignacion_herramienta" en la BD.
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */

    protected $table = 'asignacion_herramienta';
    protected $primaryKey = 'id';
    public $timestamps = false;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'fecha',
        'empleado_id',
    ];

    public function empleado(){
        return $this->belongsTo('App\Modelos\Empleado', 'empleado_id', 'id')->withTrashed();
    }
    public function detalles(){
        return $this->hasMany(DetalleAsignacion::class);
    }
}
