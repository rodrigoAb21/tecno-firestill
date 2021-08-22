<?php

namespace App\Http\Controllers;

use App\Modelos\BajaProducto;
use App\Modelos\Categoria;
use App\Modelos\DetalleIngresoProducto;
use App\Modelos\IngresoProducto;
use App\Modelos\Producto;
use App\Modelos\Proveedor;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Input;

class InventarioController extends Controller
{
    /**
     *************************************************************************
     * Clase.........: InventarioController
     * Tipo..........: Controlador (MVC)
     * Descripción...: Clase que contiene funciones y metodos para gestionar
     * los productos.
     * Fecha.........: 03-MAR-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */


    /**
     *************************************************************************
     * Nombre........: index
     * Tipo..........: Funcion
     * Entrada.......: Ninguna
     * Salida........: Vista y una lista paginada de productos
     * Descripcion...: Una lista de productos que será mostrado en una vista
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */
    public function index(){
        return view('vistas.inventario.index',
            [
                'productos' => Producto::paginate(5),
            ]);
    }


    /**
     *************************************************************************
     * Nombre........: create
     * Tipo..........: Funcion
     * Entrada.......: Ninguna
     * Salida........: Vista con dos listas, una de monedas y otra sucursales
     * Descripcion...: Muestra la vista con el formulario para la creacion de
     * un nuevo producto
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */
    public function create(){
        return view('vistas.inventario.create',
            [
                'categorias' => Categoria::all(),
            ]);
    }



    /**
     *************************************************************************
     * Nombre........: store
     * Tipo..........: Funcion
     * Entrada.......: Solicitud HTTP
     * Salida........: Ninguna, solo redirecciona a la url de 'productos'
     * Descripcion...: Crea un nuevo producto con los datos obtenidos de la
     * solicitud HTTP.
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpg,jpeg,bmp,png',
            'descripcion' => 'nullable|string|max:255',
            'precio' => 'required|numeric|min:0',
            'categoria_id' => 'required|numeric|min:1',
        ]);

        $producto = new Producto();
        $producto->nombre = $request['nombre'];
        $producto->foto = $request['foto'];
        if (Input::hasFile('foto')) {
            $file = Input::file('foto');
            $file->move(public_path() . '/img/productos/',
                $file->getClientOriginalName());
            $producto->foto = $file->getClientOriginalName();
        }else{
            $producto->foto = 'default.png';
        }
        $producto->descripcion = $request['descripcion'];
        $producto->cantidad = 0;
        $producto->precio = $request['precio'];
        $producto->categoria_id = $request['categoria_id'];
        $producto->save();

        return redirect('inventario');
    }


    /**
     *************************************************************************
     * Nombre........: edit
     * Tipo..........: Funcion
     * Entrada.......: int: id del producto que se quiere editar
     * Salida........: Una vista con el producto que se quiere editar
     * Descripcion...: Obtiene el producto buscandolo por su id, y lo muestra
     * en un formulario con sus datos para poder ser editado.
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */
    public function edit($id)
    {
        return view('vistas.inventario.edit',
            [
                'producto' => Producto::findOrFail($id),
                'categorias' => Categoria::all(),
            ]);
    }

    /**
     *************************************************************************
     * Nombre........: update
     * Tipo..........: Funcion
     * Entrada.......: Solicitud HTTP y un int:id
     * Salida........: Ninguna, solo redirecciona a la url de 'productos'
     * Descripcion...: Obtiene el producto a través de su id, y reemplaza
     * todos sus datos con los que se encuentra en la solicitud HTTP
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nombre' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpg,jpeg,bmp,png',
            'descripcion' => 'nullable|string|max:255',
            'precio' => 'required|numeric|min:0',
            'categoria_id' => 'required|numeric|min:1',
        ]);

        $producto = Producto::findOrFail($id);
        $producto->nombre = $request['nombre'];
        if (Input::hasFile('foto')) {
            $file = Input::file('foto');
            $file->move(public_path() . '/img/productos/',
                $file->getClientOriginalName());
            $producto->foto = $file->getClientOriginalName();
        }
        $producto->descripcion = $request['descripcion'];
        $producto->precio = $request['precio'];
        $producto->categoria_id = $request['categoria_id'];
        $producto->update();

        return redirect('inventario');
    }

    /**
     *************************************************************************
     * Nombre........: destroy
     * Tipo..........: Funcion
     * Entrada.......: int:id del producto
     * Salida........: Ninguna, solo redirecciona a la url 'productos'
     * Descripcion...: Obtiene el producto, lo elimina (softDelete) y
     * redirecciona a la url 'productos'.
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */
    public function show($id)
    {
        return view('vistas.inventario.show',
            [
                'producto' => Producto::findOrFail($id),
            ]);
    }

    /**
     *************************************************************************
     * Nombre........: destroy
     * Tipo..........: Funcion
     * Entrada.......: int:id del producto
     * Salida........: Ninguna, solo redirecciona a la url 'productos'
     * Descripcion...: Obtiene el producto, lo elimina (softDelete) y
     * redirecciona a la url 'productos'.
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */
    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();

        return redirect('inventario');
    }


    // ------------------------------------------------------------------------
    // --------------------------BAJAS--------------------------------------
    // ------------------------------------------------------------------------


    /**
     *************************************************************************
     * Nombre........:
     * Tipo..........: Funcion
     * Entrada.......:
     * Salida........:
     * Descripcion...:
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */
    public function listaBajas()
    {
        return view('vistas.inventario.listaBajas',
            ['bajas' => BajaProducto::paginate(5)]);
    }

    /**
     *************************************************************************
     * Nombre........:
     * Tipo..........: Funcion
     * Entrada.......:
     * Salida........:
     * Descripcion...:
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */
    public function nuevaBaja($id)
    {
        return view('vistas.inventario.nuevaBaja', [
            'producto' => Producto::findOrFail($id),
        ]);
    }

    /**
     *************************************************************************
     * Nombre........:
     * Tipo..........: Funcion
     * Entrada.......:
     * Salida........:
     * Descripcion...:
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */
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

    /**
     *************************************************************************
     * Nombre........:
     * Tipo..........: Funcion
     * Entrada.......:
     * Salida........:
     * Descripcion...:
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */
    public function anularBaja($id)
    {

        $baja = BajaProducto::findOrFail($id);
            $producto = Producto::withTrashed()->findOrFail($baja->producto_id);
            $producto->cantidad = $producto->cantidad + $baja->cantidad;
            $producto->update();
        $baja->delete();

        return redirect('inventario/listaBajas');
    }




    // ------------------------------------------------------------------------
    // --------------------------INGRESOS--------------------------------------
    // ------------------------------------------------------------------------

    /**
     *************************************************************************
     * Nombre........:
     * Tipo..........: Funcion
     * Entrada.......:
     * Salida........:
     * Descripcion...:
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */
    public function listaIngresos()
    {
        return view('vistas.inventario.listaIngresos',
            [
                'ingresos' => IngresoProducto::
                orderBy('id', 'desc')->paginate(5),
            ]);
    }

    /**
     *************************************************************************
     * Nombre........:
     * Tipo..........: Funcion
     * Entrada.......:
     * Salida........:
     * Descripcion...:
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */
    public function nuevoIngreso()
    {
        return view('vistas.inventario.nuevoIngreso', [
            'productos' => Producto::all(),
            'proveedores' => Proveedor::all(),
        ]);
    }

    /**
     *************************************************************************
     * Nombre........:
     * Tipo..........: Funcion
     * Entrada.......:
     * Salida........:
     * Descripcion...:
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */
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

    /**
     *************************************************************************
     * Nombre........:
     * Tipo..........: Funcion
     * Entrada.......:
     * Salida........:
     * Descripcion...:
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */
    public function verIngreso($id)
    {
        return view('vistas.inventario.verIngreso', [
            'ingreso' => IngresoProducto::findOrFail($id),
        ]);
    }

    /**
     *************************************************************************
     * Nombre........:
     * Tipo..........: Funcion
     * Entrada.......:
     * Salida........:
     * Descripcion...:
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */
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

    public function reporte(){
        $pdf = PDF::loadView('vistas.inventario.reporte',[ 'productos' => Producto::all()->sortBy('categoria_id')])->setPaper('letter', 'portrait');
        return $pdf->download('inventario_'.date('d-m-Y_H_i_s').'.pdf');
    }
}
