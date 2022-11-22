<?php

namespace App\Http\Controllers;
use App\Incidencias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Redirect;

class IncidenciasController extends Controller
{
    public function vista()
    {
        $articulos= DB::select('SELECT * from inc_articulos ORDER by nombre_articulo ASC');
       // dd($articulos);
        return view('incidencias.agregar', compact('articulos'));
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
       //////////articulo 56///////////////
        if($id_articulo ==2){
        $fecha_req = $request->input('fecha_req');

        DB::table('inc_solicitudes')->insert([
            'id_articulo' => $id_articulo,
            'fecha_req' => $fecha_req,    
        ]);
        }else{
        }
        //////articulo 61///////////////
        if($id_articulo ==4){
            $fecha_req = $request->input('fecha_req');

            DB::table('inc_solicitudes')->insert([
                'id_articulo' => $id_articulo,
                'fecha_req' => $fecha_req,
            ]);
        }else{
        }
        ////////////////articulo 64/////////////
        if($id_articulo ==5){
            $fecha_req=$request->input('fecha_req');
            $hora_e=$request->input('hora_e');
            $hora_st=$request->input('hora_st');

            DB::table('inc_solicitudes')->insert([
                'id_articulo'=>$id_articulo,
                'fecha_req'=>$fecha_req,
                'hora_e'=>$hora_e,
                'hora_st'=>$hora_st,
            ]); 
        }else{
        } 
        //////art68diaeconomico/////
        if($id_articulo ==6){
            $fecha_req=$request->input('fecha_req');

            DB::table('inc_solicitudes')->insert([
                'id_articulo'=>$id_articulo,
                'fecha_req'=>$fecha_req,
            ]); 
        }else{
        } 
        /////////art 68 mediass jornadas//////////////
        if($id_articulo ==10){
            $fecha_req=$request->input('fecha_req');
            $hora_e1=$request->input('hora_e1');
            $hora_s1=$request->input('hora_s1');

            DB::table('inc_solicitudes')->insert([
                'id_articulo'=>$id_articulo,
                'fecha_req'=>$fecha_req,
                'hora_e1'=>$hora_e1,
                'hora_s1'=>$hora_s1,
            ]); 
        }else{
        } 

         /////////art 68 dia economico//////////////
         if($id_articulo ==7){
            $fecha_req=$request->input('fecha_req');
            
            DB::table('inc_solicitudes')->insert([
                'id_articulo'=>$id_articulo,
                'fecha_req'=>$fecha_req,
                
            ]); 
        }else{
        } 
        ///////////////art 73//////////
        if($id_articulo ==8){
            $fecha_req=$request->input('fecha_req');
            $fecha_invac=$request->input('fecha_invac');
            $fecha_tervac=$request->input('fecha_tervac');
            
            DB::table('inc_solicitudes')->insert([
                'id_articulo'=>$id_articulo,
                'fecha_req'=>$fecha_req,
                'fecha_invac'=>$fecha_invac,
                'fecha_tervac'=>$fecha_tervac,

            ]); 
        }else{
        } 
        ////art44 diaeconomico////
        if($id_articulo ==1){
            $fecha_req=$request->input('fecha_req');
            
            DB::table('inc_solicitudes')->insert([
                'id_articulo'=>$id_articulo,
                'fecha_req'=>$fecha_req,
                
            ]); 
        }else{
        } 
        ///////art 44 medias jornadas////
        if($id_articulo ==9){
            $fecha_req=$request->input('fecha_req');
            $hora_e2=$request->input('hora_e2');
            $hora_s2=$request->input('hora_s2');

            DB::table('inc_solicitudes')->insert([
                'id_articulo'=>$id_articulo,
                'fecha_req'=>$fecha_req,
                'hora_e2'=>$hora_e2,
                'hora_s2'=>$hora_s2,
            ]); 
        }else{
        } 
        return Redirect::to('/incidencias/solicitar_oficio');
        }



public function vista2()
    {
        $tipo_evidencia= DB::select('SELECT * from inc_tipo_evidencia ORDER by nombre_evidencia ASC');
        return view('incidencias.cargar_evidencia', compact ('tipo_evidencia'));
    }
    public function cargar_evidencia(Request $request)
    { 
        $id_tipo_evid = $request->input('id_tipo_evid');
       if($id_tipo_evid ==1){
        $archivo= $request->input('arch_evidencia');
     
        DB::table('inc_evidencias')->insert([
            'id_evid' => $id_evid,
            'arch_evidencia' => $archivo,
        ]);
}   
    }
}
