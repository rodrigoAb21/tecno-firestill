<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ConfigController extends Controller
{
    public function cambiarTema($tema){
        DB::table('config')->where('trabajador_id', '=', Auth::user()->id)->update(['tema' => $tema]);
        return redirect('/');
    }

    public function cambiarModo($modo){
        if ($modo == 'dia'){
            DB::table('config')->where('trabajador_id', '=', Auth::user()->id)->update(['noche' => false]);
        } else {
            DB::table('config')->where('trabajador_id', '=', Auth::user()->id)->update(['noche' => true]);
        }
        return redirect('/');
    }
}
