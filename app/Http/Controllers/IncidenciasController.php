<?php

namespace App\Http\Controllers;
use App\Incidencias;

use Illuminate\Http\Request;


class IncidenciasController extends Controller
{
    public function vista()
    {
        return view('incidencias/agregar');
    }
    public function create(Requiest $request)
    {
        $incidencias = new Incidencias();
        $incidencias -> descripcion = $request -> descripcion;
        $incidencias -> archivo = $request -> archivo;
        $incidencias -> id_oficio_personal = $request -> id_oficio_personal;

        $incidencias -> save();

        return redirect('/solicitar');
        return redirect('/subir_evidencia');
    }
}
