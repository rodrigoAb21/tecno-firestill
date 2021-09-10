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

    public function reporteVenta(Request $request){
        $fecha_min = (int) date("Y", strtotime(DB::table('nota_venta')->min('fecha')));
        $fecha_max = (int) date("Y", strtotime(DB::table('nota_venta')->max('fecha')));
        $anos = [];
        for ($i = $fecha_min; $i <= $fecha_max; $i++) {
            array_push($anos, $i);
        }

        $ano_select = ($request->ano) ? $request->ano : date('Y');

        $ventasAno = $this->getVentasAno($ano_select);
        $ene = $this->getVentasMesAno('01', $ano_select);
        $feb = $this->getVentasMesAno('02', $ano_select);
        $mar = $this->getVentasMesAno('03', $ano_select);
        $abr = $this->getVentasMesAno('04', $ano_select);
        $may = $this->getVentasMesAno('05', $ano_select);
        $jun = $this->getVentasMesAno('06', $ano_select);
        $jul = $this->getVentasMesAno('07', $ano_select);
        $ago = $this->getVentasMesAno('08', $ano_select);
        $sep = $this->getVentasMesAno('09', $ano_select);
        $oct = $this->getVentasMesAno('10', $ano_select);
        $nov = $this->getVentasMesAno('11', $ano_select);
        $dic = $this->getVentasMesAno('12', $ano_select);


        return view('vistas.reportes.reporteVenta',[
            'ventasAno' => $ventasAno,
            'ene' => $ene,
            'feb' => $feb,
            'mar' => $mar,
            'abr' => $abr,
            'may' => $may,
            'jun' => $jun,
            'jul' => $jul,
            'ago' => $ago,
            'sep' => $sep,
            'oct' => $oct,
            'nov' => $nov,
            'dic' => $dic,
            'colors' => Colors::$COLORS2,
            'anos' => $anos,
            'ano' => $ano_select,
        ]);


    }

    public function getVentasAno($ano){
        $ventas = DB::table('nota_venta')
            ->join('detalle_nota_venta','detalle_nota_venta.nota_venta_id', 'nota_venta.id')
            ->join('producto','detalle_nota_venta.producto_id', 'producto.id')
            ->whereYear('nota_venta.fecha', $ano)
            ->where('producto.deleted_at', '=', null)
            ->where('nota_venta.deleted_at', '=', null)
            ->select('producto.nombre','producto.id', DB::raw('SUM(detalle_nota_venta.cantidad) as ventas'))
            ->groupBy('producto.nombre', 'producto.id')
            ->orderBy('ventas', 'desc')
            ->take(5)
            ->get();

        return $ventas;
    }

    public function getVentasMesAno($mes, $ano) {
        $ventas = DB::table('nota_venta')
            ->join('detalle_nota_venta','detalle_nota_venta.nota_venta_id', 'nota_venta.id')
            ->join('producto','detalle_nota_venta.producto_id', 'producto.id')
            ->where('producto.deleted_at', '=', null)
            ->where('nota_venta.deleted_at', '=', null)
            ->whereYear('nota_venta.fecha', $ano)
            ->whereMonth('nota_venta.fecha', $mes)
            ->select('producto.nombre','producto.id', DB::raw('SUM(detalle_nota_venta.cantidad) as ventas'))
            ->groupBy('producto.nombre', 'producto.id')
            ->orderBy('ventas', 'desc')
            ->take(5)
            ->get();

        return $ventas;
    }
}
