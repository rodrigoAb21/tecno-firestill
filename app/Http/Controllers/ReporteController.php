<?php

namespace App\Http\Controllers;

use App\Utils\Colors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReporteController extends Controller
{
    public function reporteSitio(){
        $casos = DB::table('contador')
            ->select('caso_uso', DB::raw('SUM(contador) as visitas'))
            ->groupBy('caso_uso')
            ->orderBy('visitas','desc')
            ->get();

        $total = 0;
        foreach ($casos as $caso){
            $total = $total + $caso->visitas;
        }

        return view('vistas.reportes.reporteSitio',[
            'casos' => $casos,
            'colors' => Colors::$COLORS1,
            'total' => $total,
        ]);
    }

    public function reporteVenta(){
        $ventas = DB::table('nota_venta')
            ->join('detalle_nota_venta','detalle_nota_venta.nota_venta_id', 'nota_venta.id')
            ->join('producto','detalle_nota_venta.producto_id', 'producto.id')
            ->select('producto.nombre','producto.id', DB::raw('SUM(detalle_nota_venta.cantidad) as ventas'))
            ->groupBy('producto.nombre', 'producto.id')
            ->orderBy('ventas', 'desc')
            ->take(5)
            ->get();
        return view('vistas.reportes.reporteVenta',[
            'ventas' => $ventas,
            'colors' => Colors::$COLORS2,
        ]);
    }
}
