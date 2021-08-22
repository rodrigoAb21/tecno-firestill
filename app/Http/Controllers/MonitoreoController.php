<?php

namespace App\Http\Controllers;

use App\Modelos\Cliente;
use App\Modelos\Contrato;
use App\Modelos\Empleado;
use App\Modelos\Equipo;
use App\Modelos\FichaTecnica;
use App\Modelos\MarcaClasificacion;
use App\Modelos\Sucursal;
use App\Modelos\TipoClasificacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use LaravelQRCode\Facades\QRCode;

class MonitoreoController extends Controller
{
    //-----------------------------------------------------------------------
    //-----------------------------CONTRATOS---------------------------------
    //-----------------------------------------------------------------------

    public function listaContratos(){
        $this->actualizarEstados();
        return view('vistas.imonitoreo.listaContratos', [
            'contratos' => Contrato::paginate(5),
        ]);
    }

    public function actualizarEstados(){
        $hoy = date('Y-m-d');
        $contratos = Contrato::
            where('estado','=', 'Vigente')
            ->where('fecha_fin', '<', $hoy)
            ->get();
        foreach ($contratos as $contrato){
            $contrato->estado = 'Finalizado';
            $contrato->update();
        }
    }

    public function nuevoContrato(){
        return view('vistas.imonitoreo.nuevoContrato',[
            'clientes' => Cliente::all(),
            'empleados' => Empleado::all(),
        ]);
    }

    public function guardarContrato(Request $request){
        $this->validate($request, [
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date',
            'periodo' => 'required|numeric|min:1',
            'cliente_id' => 'required|numeric|min:1',
            'empleado_id' => 'required|numeric|min:1',
            'documento' => 'nullable|file|mimes:doc,docx,pdf,txt',
        ]);

        $contrato = new Contrato();
        $contrato->fecha_inicio = $request['fecha_inicio'];
        $contrato->fecha_fin = $request['fecha_fin'];
        $contrato->estado = "Vigente";
        $contrato->edicion = true;
        $contrato->periodo = $request['periodo'];
        if (Input::hasFile('documento')) {
            $file = Input::file('documento');
            $file->move(public_path().'/contrato/', $file->getClientOriginalName());
            $contrato->documento = $file->getClientOriginalName();
        }else{
            $contrato->documento = 'default.png';
        }
        $contrato->cliente_id = $request['cliente_id'];
        $contrato->empleado_id = $request['empleado_id'];
        $contrato->save();

        return redirect('imonitoreo/listaContratos');
    }

    public function verContrato($id){
        return view('vistas.imonitoreo.verContrato',[
            'contrato' => Contrato::findOrFail($id),
            'clientes' => Cliente::all(),
            'empleados' => Empleado::all(),
        ]);
    }

    public function editarContrato($id){
        return view('vistas.imonitoreo.editarContrato',[
            'contrato' => Contrato::findOrFail($id),
            'clientes' => Cliente::all(),
            'empleados' => Empleado::all(),
        ]);
    }

    public function actualizarContrato(Request $request, $id){
        $this->validate($request, [
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date',
            'periodo' => 'required|numeric|min:1',
            'cliente_id' => 'required|numeric|min:1',
            'empleado_id' => 'required|numeric|min:1',
            'documento' => 'nullable|file|mimes:doc,docx,pdf,txt',
        ]);

        $contrato = Contrato::findOrFail($id);
        $contrato->fecha_inicio = $request['fecha_inicio'];
        $contrato->fecha_fin = $request['fecha_fin'];
        $contrato->periodo = $request['periodo'];
        if (Input::hasFile('documento')) {
            $file = Input::file('documento');
            $file->move(public_path().'/contrato/', $file->getClientOriginalName());
            $contrato->documento = $file->getClientOriginalName();
        }
        $contrato->cliente_id = $request['cliente_id'];
        $contrato->empleado_id = $request['empleado_id'];
        $contrato->update();

        return redirect('imonitoreo/editarContrato/'.$id);
    }

    public function eliminarContrato($id){
        $contrato = Contrato::findOrFail($id);
        $contrato->delete();

        return redirect('imonitoreo/listaContratos');
    }

    public function finalizarEdicion($id){
        $contrato = Contrato::findOrFail($id);
        $contrato->edicion = false;
        $contrato->update();

        return redirect('imonitoreo/listaContratos');
    }
    //-----------------------------------------------------------------------
    //---------------------------SUCURSALES----------------------------------
    //-----------------------------------------------------------------------


    public function guardarSucursal(Request $request){
        $this->validate($request, [
            'nombre' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'contrato_id' => 'required|numeric|min:1',
        ]);

        $sucursal = new Sucursal();
        $sucursal->nombre = $request['nombre'];
        $sucursal->direccion = $request['direccion'];
        $sucursal->contrato_id = $request['contrato_id'];
        $sucursal->save();

        return redirect('imonitoreo/editarContrato/'.$request['contrato_id']);
    }

    public function verSucursal($id){
        return view('vistas.imonitoreo.verSucursal',[
            'sucursal' => Sucursal::findOrFail($id),
        ]);
    }

    public function editarSucursal($id){
        return view('vistas.imonitoreo.editarSucursal',[
            'sucursal' => Sucursal::findOrFail($id),
        ]);
    }

    public function actualizarSucursal(Request $request, $id){
        $this->validate($request, [
            'nombre' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
        ]);
        $sucursal = Sucursal::findOrFail($id);
        $sucursal->nombre = $request['nombre'];
        $sucursal->direccion = $request['direccion'];
        $sucursal->update();

        return redirect('imonitoreo/editarSucursal/'.$id);
    }

    public function eliminarSucursal($id){
        $sucursal = Sucursal::findOrFail($id);
        $contrato_id = $sucursal->contrato_id;
        $sucursal->delete();

        return redirect(('imonitoreo/editarContrato/'.$contrato_id));
    }
    //-----------------------------------------------------------------------
    //-----------------------------EQUIPO------------------------------------
    //-----------------------------------------------------------------------

    public function nuevoEquipo($sucursal_id){
        return view('vistas.imonitoreo.nuevoEquipo',[
            'sucursal_id' => $sucursal_id,
            'marcas' => MarcaClasificacion::all(),
            'tipos' => TipoClasificacion::all(),
            'unidades' => Equipo::$UNIDAD_MEDIDA,
        ]);
    }
    public function guardarEquipo(Request $request){
        $this->validate($request, [
            'nro_serie' => 'required|numeric',
            'descripcion' => 'nullable|string|max:255',
            'ubicacion' => 'nullable|string|max:255',
            'unidad_medida' => 'required|string|max:255',
            'ano_fabricacion' => 'required|numeric|digits:4',
            'capacidad' => 'required|numeric|min:1',
            'sucursal_id' => 'required|numeric|min:1',
            'tipo_clasificacion_id' => 'required|numeric|min:1',
            'marca_clasificacion_id' => 'required|numeric|min:1',
        ]);

        $equipo = new Equipo();
        $equipo->nro_serie = $request['nro_serie'];
        $equipo->descripcion = $request['descripcion'];
        $equipo->ubicacion = $request['ubicacion'];
        $equipo->unidad_medida = $request['unidad_medida'];
        $equipo->ano_fabricacion = $request['ano_fabricacion'];
        $equipo->capacidad = $request['capacidad'];
        $equipo->presion_min = 60;
        $equipo->presion_max = 100;
        $equipo->sucursal_id = $request['sucursal_id'];
        $equipo->tipo_clasificacion_id = $request['tipo_clasificacion_id'];
        $equipo->marca_clasificacion_id = $request['marca_clasificacion_id'];
        if ($equipo->save()){
            $direccion = public_path('img/equipos/codigos/'.$equipo->id.'.png');
            $datos = $equipo->id;
            QRCode::text($datos)->setSize(10)->setOutfile($direccion)->png();
        }

        return redirect('imonitoreo/editarSucursal/'.$request['sucursal_id']);
    }
    public function verEquipo($id){
        return view('vistas.imonitoreo.verEquipo',[
            'equipo' => Equipo::findOrFail($id),
            'marcas' => MarcaClasificacion::all(),
            'tipos' => TipoClasificacion::all(),
            'unidades' => Equipo::$UNIDAD_MEDIDA,
        ]);
    }
    public function editarEquipo($id){
        return view('vistas.imonitoreo.editarEquipo',[
            'equipo' => Equipo::findOrFail($id),
            'marcas' => MarcaClasificacion::all(),
            'tipos' => TipoClasificacion::all(),
            'unidades' => Equipo::$UNIDAD_MEDIDA,
        ]);
    }
    public function actualizarEquipo(Request $request, $id){
        $this->validate($request, [
            'nro_serie' => 'required|numeric',
            'descripcion' => 'nullable|string|max:255',
            'ubicacion' => 'nullable|string|max:255',
            'unidad_medida' => 'required|string|max:255',
            'ano_fabricacion' => 'required|numeric|digits:4',
            'capacidad' => 'required|numeric|min:1',
            'tipo_clasificacion_id' => 'required|numeric|min:1',
            'marca_clasificacion_id' => 'required|numeric|min:1',
        ]);

        $equipo = Equipo::findOrFail($id);
        $equipo->nro_serie = $request['nro_serie'];
        $equipo->descripcion = $request['descripcion'];
        $equipo->ubicacion = $request['ubicacion'];
        $equipo->unidad_medida = $request['unidad_medida'];
        $equipo->ano_fabricacion = $request['ano_fabricacion'];
        $equipo->capacidad = $request['capacidad'];
        $equipo->tipo_clasificacion_id = $request['tipo_clasificacion_id'];
        $equipo->marca_clasificacion_id = $request['marca_clasificacion_id'];
        $equipo->save();

        return redirect('imonitoreo/editarSucursal/'.$equipo->sucursal_id);
    }

    public function eliminarEquipo($id){

        $equipo = Equipo::findOrFail($id);
        $sucursal_id = $equipo->sucursal_id;
        $equipo->delete();

        return redirect(('imonitoreo/editarSucursal/'.$sucursal_id));

    }



    //-----------------------------------------------------------------------
    //-----------------------------FICHAS TECNICAS------------------------------------
    //-----------------------------------------------------------------------

    public function listarFichas($id){
        return view('vistas.imonitoreo.listarFichas',
        [
            'equipo' => Equipo::findOrFail($id),
            'fichas' => FichaTecnica::where('equipo_id', '=', $id)->orderByDesc('id')->get(),
        ]);
    }
    public function verFicha($id){
        return view('vistas.imonitoreo.verFicha', [
            'ficha' => FichaTecnica::findOrFail($id),
        ]);
    }
}
