<?php

namespace App\Http\Controllers;

use App\Modelos\BajaProducto;
use App\Modelos\Categoria;
use App\Modelos\Cliente;
use App\Modelos\Contrato;
use App\Modelos\DetalleIngresoProducto;
use App\Modelos\DetalleNotaVenta;
use App\Modelos\Equipo;
use App\Modelos\FichaTecnica;
use App\Modelos\IngresoProducto;
use App\Modelos\MarcaClasificacion;
use App\Modelos\NotaVenta;
use App\Modelos\Producto;
use App\Modelos\Proveedor;
use App\Modelos\Servicio;
use App\Modelos\Sucursal;
use App\Modelos\TipoClasificacion;
use App\Modelos\Trabajador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Integer;
use function Sodium\add;

class BusquedaController extends Controller
{
    public $datos = [];
    public $vacio=true;
    public function buscar(Request $request)
    {
        $palabra= $request['textoBusqueda'];

        $this->buscarBajaProducto($palabra);
        $this->buscarCategoria($palabra);
        $this->buscarCliente($palabra);
        $this->buscarContrato($palabra);
        $this->buscarDetalleIngresoProducto($palabra);
        $this->buscarDetalleNotaVenta($palabra);
        $this->buscarEquipo($palabra);
        $this->buscarIngresoProducto($palabra);
        $this->buscarMarcaClasificacion($palabra);
        $this->buscarNotaVenta($palabra);
        $this->buscarProducto($palabra);
        $this->buscarProveedor($palabra);
        $this->buscarServicio($palabra);
        $this->buscarSucursal($palabra);
        $this->buscarTipoClasificacion($palabra);
        $this->buscarTrabajador($palabra);

        return view('vistas.busqueda.index',
            [
                'datos' => $this->datos,
                'vacio' => $this->vacio,
                'textoBusqueda' => $palabra
            ]);

    }

    public function buscarBajaProducto($palabra)
    {
        $resultados = DB::table('baja_producto')->
        where('id', (int)$palabra)
            //->orWhere('fecha', $palabra)
            ->orWhere('motivo', 'like', '%' . $palabra . '%')
            ->orWhere('cantidad', (int)$palabra)
            ->orWhere('producto_id', (int)$palabra)
            ->get();
        $resultadoModelo=[];
        foreach ($resultados as $resultado){
            $resultadoModelo[]= BajaProducto::find($resultado->id);
            $this->vacio=false;
        }
        $this->datos['bajaProducto'][]=$resultadoModelo;
    }

    public function buscarCategoria($palabra)
    {
        $resultados = DB::table('categoria')->
        where('id', (int)$palabra)
            ->orWhere('nombre', 'like', '%' . $palabra . '%')
            ->get();
        $resultadoModelo=[];
        foreach ($resultados as $resultado){
            $resultadoModelo[]= Categoria::find($resultado->id);
            $this->vacio=false;
        }
        $this->datos['categoria'][]=$resultadoModelo;
    }

    public function buscarCliente($palabra)
    {
        $resultados = DB::table('cliente')->
                where('id', (int)$palabra)
            ->orWhere('nombre_empresa', 'like', '%' . $palabra . '%')
            ->orWhere('nit', $palabra)
            ->orWhere('email', 'like', '%' . $palabra . '%')
            ->orWhere('email_encargado', 'like', '%' . $palabra . '%')
            ->orWhere('telefono_empresa', $palabra)
            ->orWhere('email_encargado', 'like', '%' . $palabra . '%')
            ->orWhere('direccion', 'like', '%' . $palabra . '%')
            ->orWhere('nombre_encargado', 'like', '%' . $palabra . '%')
            ->orWhere('cargo_encargado', 'like', '%' . $palabra . '%')
            ->orWhere('telefono_encargado', $palabra)
            ->get();
        $resultadoModelo=[];
        foreach ($resultados as $resultado){
            $resultadoModelo[]= Cliente::find($resultado->id);
            $this->vacio=false;
        }
        $this->datos['cliente'][]=$resultadoModelo;
    }

    public function buscarContrato($palabra)
    {
        $resultados = DB::table('contrato')->
                where('id', (int)$palabra)
            //->orWhere('fecha_inicio', $palabra)
            //->orWhere('fecha_fin', $palabra)
            //->orWhere('periodo', (int)$palabra)
            //->orWhere('documento', 'like', '%' . $palabra . '%')
            //->orWhere('estado', $palabra)
            ->orWhere('cliente_id', (int)$palabra)
            ->orWhere('trabajador_id', (int)$palabra)
            ->get();
        $resultadoModelo=[];
        foreach ($resultados as $resultado){
            $resultadoModelo[]= Contrato::find($resultado->id);
            $this->vacio=false;
        }
        $this->datos['contrato'][]=$resultadoModelo;
    }


    public function buscarDetalleIngresoProducto($palabra)
    {
        $resultados = DB::table('detalle_ingreso_producto')->
        where('id', (int)$palabra)
            ->orWhere('costo', (float)$palabra)
            ->orWhere('cantidad', (int)$palabra)
            ->orWhere('producto_id', (int)$palabra)
            ->orWhere('ingreso_producto_id', (int)$palabra)
            ->get();
        $resultadoModelo=[];
        foreach ($resultados as $resultado){
            $resultadoModelo[]= DetalleIngresoProducto::find($resultado->id);
            $this->vacio=false;
        }
        $this->datos['detalleIngresoProducto'][]=$resultadoModelo;
    }

    public function buscarDetalleNotaVenta($palabra)
    {
        $resultados = DB::table('detalle_nota_venta')->
        where('id', (int)$palabra)
            ->orWhere('cantidad', (int)$palabra)
            ->orWhere('precio', (int)$palabra)
            ->orWhere('nota_venta_id', (int)$palabra)
            ->orWhere('producto_id', (int)$palabra)
            ->get();
        $resultadoModelo=[];
        foreach ($resultados as $resultado){
            $resultadoModelo[]= DetalleNotaVenta::find($resultado->id);
            $this->vacio=false;
        }
        $this->datos['detalleNotaVenta'][]=$resultadoModelo;
    }

    public function buscarEquipo($palabra){
        $resultados = DB::table('equipo')->
        where('id', (int)$palabra)
            ->orWhere('nro_serie', $palabra)
            ->orWhere('descripcion', 'like','%'.$palabra.'%')
            ->orWhere('ubicacion','like','%'.$palabra.'%')
            ->orWhere('sucursal_id',(int)$palabra)
            ->orWhere('tipo_clasificacion_id',(int)$palabra)
            ->orWhere('marca_clasificacion_id',(int)$palabra)
            ->get();
        $resultadoModelo=[];
        foreach ($resultados as $resultado){
            $resultadoModelo[]= Equipo::find($resultado->id);
            $this->vacio=false;
        }
        $this->datos['equipo'][]=$resultadoModelo;
    }
    // public function buscarFichaTecnica($palabra){}

    public function buscarIngresoProducto($palabra)
    {
        $resultados = DB::table('ingreso_producto')->
        where('id', (int)$palabra)
            //->orWhere('fecha', $palabra)
            ->orWhere('nro_factura', $palabra)
            ->orWhere('foto_factura', $palabra)
            ->orWhere('total', (float)$palabra)
            ->orWhere('proveedor_id', (int)$palabra)
            ->get();
        $resultadoModelo=[];
        foreach ($resultados as $resultado){
            $resultadoModelo[]= IngresoProducto::find($resultado->id);
            $this->vacio=false;
        }
        $this->datos['ingresoProducto'][]=$resultadoModelo;
    }


    public function buscarMarcaClasificacion($palabra)
    {
        $resultados = DB::table('marca_clasificacion')->
                where('id',(int)$palabra)
            ->orWhere('nombre', 'like', '%' . $palabra . '%')
            ->get();
        $resultadoModelo=[];
        foreach ($resultados as $resultado){
            $resultadoModelo[]= MarcaClasificacion::find($resultado->id);
            $this->vacio=false;
        }
        $this->datos['marcaClasificacion'][]=$resultadoModelo;
    }

    public function buscarNotaVenta($palabra)
    {
        $resultados = DB::table('nota_venta')->
                where('id', (int)$palabra)
            //->orWhere('fecha', $palabra)
            ->orWhere('total', (float)$palabra)
            ->orWhere('trabajador_id', (int)$palabra)
            ->orWhere('cliente_id', (int)$palabra)
            ->get();
        $resultadoModelo=[];
        foreach ($resultados as $resultado){
            $resultadoModelo[]= NotaVenta::find($resultado->id);
            $this->vacio=false;
        }
        $this->datos['notaVenta'][]=$resultadoModelo;
    }

    public function buscarProducto($palabra)
    {
        $resultados = DB::table('producto')->
        where('id', (int)$palabra)
           // ->orWhere('nombre', 'like', '%' . $palabra . '%')
            //->orWhere('foto', 'like', '%' . $palabra . '%')
            //->orWhere('descripcion', 'like', '%' . $palabra . '%')
            //->orWhere('precio', (double)$palabra)
            //->orWhere('cantidad', $palabra)
            //->orWhere('categoria_id', (int)$palabra)
            ->get();
        $resultadoModelo=[];
        foreach ($resultados as $resultado){
            $resultadoModelo[]= Producto::find($resultado->id);
            $this->vacio=false;
        }
        $this->datos['producto'][]=$resultadoModelo;
    }


    public function buscarProveedor($palabra)
    {
        $resultados = DB::table('proveedor')->
        where('id', (int)$palabra)
            ->orWhere('nombre', 'like', '%' . $palabra . '%')
            ->orWhere('nit', $palabra)
            ->orWhere('email', 'like', '%' . $palabra . '%')
            //->orWhere('direccion', 'like', '%' . $palabra . '%')
            ->orWhere('telefono', $palabra)
            ->orWhere('informacion', 'like', '%' . $palabra . '%')
            ->orWhere('titular', 'like', '%' . $palabra . '%')
            ->orWhere('banco', 'like', '%' . $palabra . '%')
            ->orWhere('sucursal', 'like', '%' . $palabra . '%')
            ->orWhere('nro_cuenta', $palabra)
            ->orWhere('moneda', 'like', '%' . $palabra . '%')
            ->orWhere('tipo_identificacion', $palabra)
            ->orWhere('nro_identificacion', $palabra)
            ->get();
        $resultadoModelo=[];
        foreach ($resultados as $resultado){
            $resultadoModelo[]= Proveedor::find($resultado->id);
            $this->vacio=false;
        }
        $this->datos['proveedor'][]=$resultadoModelo;
    }

    public function buscarServicio($palabra)
    {
        $resultados = DB::table('servicio')->
                where('id', (int)$palabra)
            ->orWhere('nombre', 'like', '%' . $palabra . '%')
            ->orWhere('precio', (float)$palabra)
            ->orWhere('nota_venta_id', (int)$palabra)
            ->get();
        $resultadoModelo=[];
        foreach ($resultados as $resultado){
            $resultadoModelo[]= Servicio::find($resultado->id);
            $this->vacio=false;
        }
        $this->datos['servicio'][]=$resultadoModelo;
    }

    public function buscarSucursal($palabra)
    {
        $resultados = DB::table('sucursal')->
        where('id', (int)$palabra)
            ->orWhere('nombre', 'like', '%' . $palabra . '%')
            ->orWhere('direccion', 'like', '%' . $palabra . '%')
            ->orWhere('contrato_id', (int)$palabra)
            ->get();
        $resultadoModelo=[];
        foreach ($resultados as $resultado){
            $resultadoModelo[]= Sucursal::find($resultado->id);
            $this->vacio=false;
        }
        $this->datos['sucursal'][]=$resultadoModelo;
    }

    public function buscarTipoClasificacion($palabra)
    {
        $resultados = DB::table('tipo_clasificacion')->
                where('id', (int)$palabra)
            ->orWhere('nombre', 'like', '%' . $palabra . '%')
            ->get();
        $resultadoModelo=[];
        foreach ($resultados as $resultado){
            $resultadoModelo[]= TipoClasificacion::find($resultado->id);
            $this->vacio=false;
        }
        $this->datos['tipoClasificacion'][]=$resultadoModelo;
    }

    public function buscarTrabajador($palabra)
    {
        $resultados = DB::table('trabajador')->
        where('id', (int)$palabra)
            ->orWhere('nombre', 'like', '%' . $palabra . '%')
            ->orWhere('apellido', 'like', '%' . $palabra . '%')
            ->orWhere('carnet', $palabra)
            ->orWhere('telefono', $palabra)
            //->orWhere('edad', $palabra)
            ->orWhere('direccion', 'like', '%' . $palabra . '%')
            ->orWhere('tipo', 'like', '%' . $palabra . '%')
            ->orWhere('email', 'like', '%' . $palabra . '%')
            ->orWhere('password', $palabra)
            ->get();
        $resultadoModelo=[];
        foreach ($resultados as $resultado){
            $resultadoModelo[]= Trabajador::find($resultado->id);
            $this->vacio=false;
        }
        $this->datos['trabajador'][]=$resultadoModelo;
    }

}
