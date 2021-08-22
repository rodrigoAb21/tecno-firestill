<?php

namespace App\Http\Controllers;

use App\Modelos\Empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    /**
     *************************************************************************
     * Clase.........: EmpleadoController
     * Tipo..........: Controlador (MVC)
     * Descripción...: Clase que contiene funciones y metodos para gestionar los
     * empleados.
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */
    
    /**
     *************************************************************************
     * Nombre........: index
     * Tipo..........: Funcion
     * Entrada.......: Ninguna
     * Salida........: Vista y una lista paginada de empleados
     * Descripcion...: Una lista de empleados que será mostrado en una vista
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */
    public function index(){
        return view('vistas.empleados.index',
            [
                'empleados' => Empleado::paginate(5),
            ]);
    }


    /**
     *************************************************************************
     * Nombre........: create
     * Tipo..........: Funcion
     * Entrada.......: Ninguna
     * Salida........: Vista con dos listas, una de monedas y otra sucursales
     * Descripcion...: Muestra la vista con el formulario para la creacion de
     * un nuevo empleado
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */
    public function create(){
        return view('vistas.empleados.create', [
            'tipos' => Empleado::$TIPOS_DE_USUARIO,
        ]);
    }

    /**
     *************************************************************************
     * Nombre........: store
     * Tipo..........: Funcion
     * Entrada.......: Solicitud HTTP
     * Salida........: Ninguna, solo redirecciona a la url de 'empleados'
     * Descripcion...: Crea un nuevo empleado con los datos obtenidos de la
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
            'email' => 'required|max:255|email|unique:empleado',
            'password' => 'nullable|string|max:255',
            'tipo' => 'required|max:255',
        ]);

        $empleado = new Empleado();
        $empleado->nombre = $request['nombre'];
        $empleado->apellido = $request['apellido'];
        $empleado->carnet = $request['carnet'];
        $empleado->telefono = $request['telefono'];
        $empleado->direccion = $request['direccion'];
        $empleado->email = $request['email'];
        $empleado->password = bcrypt($request['password']);
        $empleado->tipo = $request['tipo'];
        $empleado->save();

        return redirect('empleados');
    }

    /**
     *************************************************************************
     * Nombre........: edit
     * Tipo..........: Funcion
     * Entrada.......: int: id del empleado que se quiere editar
     * Salida........: Una vista con el empleado que se quiere editar
     * Descripcion...: Obtiene el empleado buscandolo por su id, y lo muestra
     * en un formulario con sus datos para poder ser editado.
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */
    public function edit($id)
    {
        return view('vistas.empleados.edit',
            [
                'empleado' => Empleado::findOrFail($id),
                'tipos' => Empleado::$TIPOS_DE_USUARIO,
            ]);
    }

    /**
     *************************************************************************
     * Nombre........: show
     * Tipo..........: Funcion
     * Entrada.......: int: id del empleado que se quiere ver
     * Salida........: Una vista con el empleado.
     * Descripcion...: Obtiene el empleado y muestra todos sus datos en
     * una vista.
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */
    public function show($id)
    {
        return view('vistas.empleados.show',
            [
                'empleado' => Empleado::findOrFail($id),
            ]);
    }

    /**
     *************************************************************************
     * Nombre........: update
     * Tipo..........: Funcion
     * Entrada.......: Solicitud HTTP y un int:id
     * Salida........: Ninguna, solo redirecciona a la url de 'empleados'
     * Descripcion...: Obtiene el empleado a través de su id, y reemplaza todos
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

        $empleado = Empleado::findOrFail($id);
        $empleado->nombre = $request['nombre'];
        $empleado->apellido = $request['apellido'];
        $empleado->carnet = $request['carnet'];
        $empleado->telefono = $request['telefono'];
        $empleado->direccion = $request['direccion'];
        $empleado->email = $request['email'];
        if (trim($request['password']) != ''){
            $empleado->password = bcrypt($request['password']);
        }
        $empleado->tipo = $request['tipo'];
        $empleado->update();

        return redirect('empleados');
    }

    /**
     *************************************************************************
     * Nombre........: destroy
     * Tipo..........: Funcion
     * Entrada.......: int: id del empleado
     * Salida........: Ninguna, solo redirecciona a la url 'empleados'
     * Descripcion...: Obtiene el empleado, lo elimina (softDelete) y
     * redirecciona a la url 'empleados'.
     * Fecha.........: 07-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */
    public function destroy($id)
    {
        $empleado = Empleado::findOrFail($id);
        $empleado->delete();

        return redirect('empleados');
    }
}
