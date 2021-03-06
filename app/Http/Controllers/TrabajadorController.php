<?php

namespace App\Http\Controllers;

use App\Modelos\Contador;
use App\Modelos\Trabajador;
use App\Utils\Utils;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TrabajadorController extends Controller
{
    public function index(){

        $contador = Contador::findOrFail(Utils::$TRABAJADORES_INDEX);
        $contador->increment('contador',1);

        return view('vistas.trabajadores.index',
            [
                'trabajadores' => Trabajador::orderBy('id', 'desc')->paginate(10),
                'contador' => $contador,
            ]);
    }


    /**
     *************************************************************************
     * Nombre........: create
     * Tipo..........: Funcion
     * Entrada.......: Ninguna
     * Salida........: Vista con dos listas, una de monedas y otra sucursales
     * Descripcion...: Muestra la vista con el formulario para la creacion de
     * un nuevo trabajador
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */
    public function create(){

        $contador = Contador::findOrFail(Utils::$TRABAJADORES_REGISTRAR);
        $contador->increment('contador',1);

        return view('vistas.trabajadores.create', [
            'tipos' => Trabajador::$TIPOS_DE_USUARIO,
            'contador' => $contador,
        ]);
    }

    /**
     *************************************************************************
     * Nombre........: store
     * Tipo..........: Funcion
     * Entrada.......: Solicitud HTTP
     * Salida........: Ninguna, solo redirecciona a la url de 'trabajadores'
     * Descripcion...: Crea un nuevo trabajador con los datos obtenidos de la
     * solicitud HTTP.
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required|max:255',
            'apellido' => 'required|max:255',
            'carnet' => 'required|string|max:10',
            'telefono' => 'nullable|digits_between:7,8',
            'direccion' => 'nullable|max:255',
            'email' => 'required|max:255|email|unique:trabajador',
            'tipo' => 'required|max:255',
        ]);

        $trabajador = new Trabajador();
        $trabajador->nombre = $request['nombre'];
        $trabajador->apellido = $request['apellido'];
        $trabajador->carnet = $request['carnet'];
        $trabajador->telefono = $request['telefono'];
        $trabajador->direccion = $request['direccion'];
        $trabajador->email = $request['email'];
        $trabajador->password = bcrypt($request['carnet']);
        $trabajador->tipo = $request['tipo'];
        $trabajador->save();

        DB::table('config')->insert([
            'tema' => 2,
            'noche' => false,
            'trabajador_id' => $trabajador->id
        ]);

        return redirect('trabajadores');
    }

    /**
     *************************************************************************
     * Nombre........: edit
     * Tipo..........: Funcion
     * Entrada.......: int: id del trabajador que se quiere editar
     * Salida........: Una vista con el trabajador que se quiere editar
     * Descripcion...: Obtiene el trabajador buscandolo por su id, y lo muestra
     * en un formulario con sus datos para poder ser editado.
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */
    public function edit($id)
    {
        $contador = Contador::findOrFail(Utils::$TRABAJADORES_EDITAR);
        $contador->increment('contador',1);

        return view('vistas.trabajadores.edit',
            [
                'trabajador' => Trabajador::findOrFail($id),
                'tipos' => Trabajador::$TIPOS_DE_USUARIO,
                'contador' => $contador,
            ]);
    }

    /**
     *************************************************************************
     * Nombre........: show
     * Tipo..........: Funcion
     * Entrada.......: int: id del trabajador que se quiere ver
     * Salida........: Una vista con el trabajador.
     * Descripcion...: Obtiene el trabajador y muestra todos sus datos en
     * una vista.
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */
    public function show($id)
    {
        $contador = Contador::findOrFail(Utils::$TRABAJADORES_VER);
        $contador->increment('contador',1);

        return view('vistas.trabajadores.show',
            [
                'trabajador' => Trabajador::findOrFail($id),
                'contador' => $contador,
            ]);
    }

    /**
     *************************************************************************
     * Nombre........: update
     * Tipo..........: Funcion
     * Entrada.......: Solicitud HTTP y un int:id
     * Salida........: Ninguna, solo redirecciona a la url de 'trabajadores'
     * Descripcion...: Obtiene el trabajador a trav??s de su id, y reemplaza todos
     * sus datos con los que se encuentra en la solicitud HTTP
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nombre' => 'required|max:255',
            'apellido' => 'required|max:255',
            'carnet' => 'required|string|max:10',
            'telefono' => 'nullable|digits_between:7,8',
            'direccion' => 'nullable|max:255',
            'email' => 'required|max:255|email',
            'password' => 'nullable|string|max:255',
            'tipo' => 'required|max:255',
        ]);

        $trabajador = Trabajador::findOrFail($id);
        $trabajador->nombre = $request['nombre'];
        $trabajador->apellido = $request['apellido'];
        $trabajador->carnet = $request['carnet'];
        $trabajador->telefono = $request['telefono'];
        $trabajador->direccion = $request['direccion'];
        $trabajador->email = $request['email'];
        if (trim($request['password']) != ''){
            $trabajador->password = bcrypt($request['password']);
        }
        $trabajador->tipo = $request['tipo'];
        $trabajador->update();

        return redirect('trabajadores');
    }

    /**
     *************************************************************************
     * Nombre........: destroy
     * Tipo..........: Funcion
     * Entrada.......: int: id del trabajador
     * Salida........: Ninguna, solo redirecciona a la url 'trabajadores'
     * Descripcion...: Obtiene el trabajador, lo elimina (softDelete) y
     * redirecciona a la url 'trabajadores'.
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */
    public function destroy($id)
    {
        $trabajador = Trabajador::findOrFail($id);
        $trabajador->delete();

        return redirect('trabajadores');
    }
}
