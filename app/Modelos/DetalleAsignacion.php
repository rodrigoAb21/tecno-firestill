<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetalleAsignacion extends Model
{
    /**
     *************************************************************************
     * Clase.........: DetalleAsignacion
     * Tipo..........: Modelo (MVC)
     * Descripción...: Clase que representa a la tabla
     * "detalle_asignacion" en la BD.
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */

    protected $table = 'detalle_asignacion';
    protected $primaryKey = 'id';
    public $timestamps = false;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'cantidad',
        'herramienta_id',
        'asignacion_herramienta_id',
    ];

    public function herramienta(){
        return $this->belongsTo('App\Modelos\Herramienta', 'herramienta_id', 'id')->withTrashed();
    }
}
