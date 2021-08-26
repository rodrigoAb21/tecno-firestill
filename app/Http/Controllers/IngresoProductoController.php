<?php

namespace App\Http\Controllers;

use App\Modelos\Contador;
use App\Modelos\IngresoProducto;
use App\Modelos\Producto;
use App\Modelos\Proveedor;
use App\Utils\Utils;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class IngresoProductoController extends Controller
{
    public function listaIngresos()
    {
        $contador = Contador::findOrFail(Utils::$INGRESOS_INDEX);
        $contador->increment('contador',1);

        return view('vistas.inventario.listaIngresos',
            [
                'ingresos' => IngresoProducto::
                orderBy('id', 'desc')->paginate(5),
                'contador' => $contador,
            ]);
    }

    public function nuevoIngreso()
    {
        $contador = Contador::findOrFail(Utils::$INGRESOS_REGISTRAR);
        $contador->increment('contador',1);

        return view('vistas.inventario.nuevoIngreso', [
            'productos' => Producto::all(),
            'proveedores' => Proveedor::all(),
            'contador' => $contador,
        ]);
    }

    public function guardarIngreso(Request $request)
    {
        $this->validate($request, [
            'fecha' => 'required|date',
            'proveedor_id' => 'required|numeric|min:1',
            'nro_factura' => 'nullable|numeric|min:0',
            'foto_factura' => 'nullable|image|mimes:jpg,jpeg,bmp,png',
            'total' => 'required|numeric|min:0',
            'idProductoT' => 'required|array|min:1',
            'idProductoT.*' => 'required|numeric|min:1',
            'cantidadT' => 'required|array|min:1',
            'cantidadT.*' => 'required|numeric|min:1',
            'costoT' => 'required|array|min:1',
            'costoT.*' => 'required|numeric|min:0',
        ]);

        try {
            DB::beginTransaction();
            $ingreso = new IngresoProducto();
            $ingreso->fecha = $request['fecha'];
            $ingreso->total = $request['total'];
            if (Input::hasFile('foto_factura')) {
                $file = Input::file('foto_factura');
                $file->move(public_path() . '/img/ingresoProducto/',
                    $file->getClientOriginalName());
                $ingreso->foto_factura = $file->getClientOriginalName();
            }else{
                $ingreso->foto_factura = 'default.png';
            }
            $ingreso->nro_factura = $request['nro_factura'];
            $ingreso->proveedor_id = $request['proveedor_id'];
            $ingreso->save();

            $idProductos = $request->get('idProductoT');
            $cant = $request->get('cantidadT');
            $costos = $request->get('costoT');
            $cont = 0;


            while ($cont < count($idProductos)) {
                $detalle = new DetalleIngresoProducto();
                $detalle->cantidad = $cant[$cont];
                $detalle->costo = $costos[$cont];
                $detalle->producto_id = $idProductos[$cont];
                $detalle->ingreso_producto_id = $ingreso->id;
                $detalle->save();

                $producto =
                    Producto::findOrfail($detalle->producto_id);
                $producto->cantidad =
                    $producto->cantidad + $detalle->cantidad;
                $producto->update();

                $cont = $cont + 1;
            }

            DB::commit();

        } catch (Exception $e) {

            DB::rollback();

        }

        return redirect('inventario/listaIngresos');
    }

    public function verIngreso($id)
    {
        $contador = Contador::findOrFail(Utils::$INGRESOS_VER);
        $contador->increment('contador',1);

        return view('vistas.inventario.verIngreso', [
            'ingreso' => IngresoProducto::findOrFail($id),
            'contador' => $contador,
        ]);
    }

    public function eliminarIngreso($id)
    {

        try {
            DB::beginTransaction();
            $ingreso = IngresoProducto::findOrFail($id);
            foreach ($ingreso->detalles as $detalle) {
                $producto = Producto::withTrashed()->findOrFail($detalle->producto_id);
                $producto->cantidad = $producto->cantidad - $detalle->cantidad;
                $producto->update();
            }
            $ingreso->delete();
            DB::commit();
            return redirect('inventario/listaIngresos');
        }catch (QueryException $e) {
            DB::rollback();
            return redirect('inventario/listaIngresos')->with(['message' => 'No es posible eliminar el ingreso']);
        }

    }
}
