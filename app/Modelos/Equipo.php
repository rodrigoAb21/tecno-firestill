<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Equipo extends Model
{
    /**
     *************************************************************************
     * Clase.........: Equipo
     * Tipo..........: Modelo (MVC)
     * Descripción...: Clase que representa a la tabla "equipo" en la BD.
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */

    protected $table = 'equipo';
    protected $primaryKey = 'id';
    public $timestamps = false;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'nro_serie',
        'descripcion',
        'ubicacion',
        'unidad_medida',
        'ano_fabricacion',
        'sucursal_id',
        'tipo_clasificacion_id',
        'marca_clasificacion_id',
    ];

    public function tipo(){
        return $this->belongsTo('App\Modelos\TipoClasificacion', 'tipo_clasificacion_id', 'id')->withTrashed();
    }
    public function marca(){
        return $this->belongsTo('App\Modelos\MarcaClasificacion', 'marca_clasificacion_id', 'id')->withTrashed();
    }

    static public $UNIDAD_MEDIDA = [
        'Kg',
        'Lt',
        ];

}
