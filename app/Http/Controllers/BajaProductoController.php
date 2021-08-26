<?php

namespace App\Http\Controllers;

use App\Modelos\BajaProducto;
use App\Modelos\Contador;
use App\Modelos\Producto;
use App\Utils\Utils;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class BajaProductoController extends Controller
{
    public function listaBajas()
    {

        $contador = Contador::findOrFail(Utils::$BAJAS_INDEX);
        $contador->increment('contador',1);

        return view('vistas.inventario.listaBajas',[
            'bajas' => BajaProducto::paginate(5),
            'contador' => $contador,
        ]);
    }

    public function nuevaBaja($id)
    {

        $contador = Contador::findOrFail(Utils::$PRODUCTOS_BAJA);
        $contador->increment('contador',1);

        return view('vistas.inventario.nuevaBaja', [
            'producto' => Producto::findOrFail($id),
            'contador' => $contador,
        ]);
    }

    public function darBaja(Request $request)
    {
        $this->validate($request, [
            'fecha' => 'required|date',
            'motivo' => 'required|string|max:255',
            'cantidad' => 'required|numeric|min:1',
            'producto_id' => 'required|numeric|min:1',
        ]);

        $baja = new BajaProducto();
        $baja->fecha = $request['fecha'];
        $baja->motivo = $request['motivo'];
        $baja->cantidad = $request['cantidad'];
        $baja->producto_id = $request['producto_id'];
        $baja->save();

        $producto = Producto::findOrFail($request['producto_id']);
        $producto->cantidad = $producto->cantidad - $baja->cantidad;
        $producto->update();

        return redirect('inventario/listaBajas');
    }


    public function anularBaja($id)
    {

        $baja = BajaProducto::findOrFail($id);
        $producto = Producto::withTrashed()->findOrFail($baja->producto_id);
        $producto->cantidad = $producto->cantidad + $baja->cantidad;
        $producto->update();
        $baja->delete();

        return redirect('inventario/listaBajas');
    }



}
