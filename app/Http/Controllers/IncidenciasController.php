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
public function store(Request $request)
    {
       /* $incidencias = new Incidencias;
        $incidencias->motivo_oficio = $request->input('motivo_oficio');
        $incidencias->tipo_articulo = $request-> select('id_articulo');
        $incidencias->fecha_requerida = $request->select('fecha_req');
        $incidencias-> save();
        */
        Incidencias:: create($request->all());
        return 'Completado';   
    }
    public function guardar_incidencia_solicitada(Request $request){
        //dd($request);
       $id_articulo = $request->input('id_articulo');
       if($id_articulo ==2){
        $fecha_req = $request->input('fecha_req');
        $motivo_oficio = $request->input('motivo_oficio');

        DB::table('inc_solicitudes')->insert([
            'id_articulo' => $id_articulo,
            'fecha_req' => $fecha_req,
            'motivo_oficio' => $motivo_oficio,
        ]);


       }
    }

}
