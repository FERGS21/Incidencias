<?php

namespace App\Http\Controllers;
use App\Incidencias;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IncidenciasController extends Controller
{
    public function vista()
    {
        $articulos= DB::select('SELECT * from inc_articulos ORDER by nombre_articulo ASC');
       // dd($articulos);
        return view('incidencias.agregar', compact('articulos'));
    }
    public function create(Requiest $request)
    {
        $incidencias = new Incidencias();
        $incidencias -> descripcion = $request -> descripcion;
        $incidencias -> id_oficio_personal = $request -> id_oficio_personal;

        $incidencias -> save();

        return redirect('/solicitar');
        
    }
    public function vista2()
    {
        $tipo_evidencia= DB::select('SELECT * from inc_tipo_evidencia ORDER by nombre_evidencia ASC');
        return view('incidencias.cargar_evidencia', compact ('tipo_evidencia'));
    }
    public function cargar(Requiest $request)
    {
        $incidencias = new Incidencias();
        $incidencias -> archivo = $request -> archivo;
        $incidencias -> id_tipo_evidencia = $request -> id_tipo_evidencia;

        $incidencias -> save();

        return redirect('/cargar_evidencia');   
    }


}
