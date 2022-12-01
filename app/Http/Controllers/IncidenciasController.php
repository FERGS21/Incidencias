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
    public function vista2()
    {
        $tipo_evidencia= DB::select('SELECT * from inc_tipo_evidencia ORDER by nombre_evidencia ASC');
         //dd($tipo_evidencia);
         return view('incidencias.cargar_evidencia', compact ('tipo_evidencia'));
   
    }
    public function vista3(){
        return view('incidencias.historial_oficio');
    }
    public function vista4(){
        return view('incidencias.historial_evidencias');
    }
    public function vista5(){
        return view('incidencias.validar_oficios');
    }
    public function validar_oficios(Request $request){

    }
    public function historial_oficios(Request $request){

    }
    public function historial_evidencias(Request $request){

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



    public function guardar_evidencia(Request $request)
    { 
    $maximo= DB::selectOne('select max(id_evid) maximo FROM inc_evidencias'); 
  
    if($maximo->maximo==null){
     $maximo=1;
    
    }else{
        $maximo= $maximo->maximo+1;
    }
    $file=$request->file('arch_evidencia');
   
    $documento=$request->file('arch_evidencia');
    $id_tipo_evid=$request->input('id_tipo_evid');
    $name="evidencia_incidencia_".$maximo.".".$file->getClientOriginalExtension();
    $file->move(public_path().'/incidencias/', $name);

        DB::table('inc_evidencias')->insert([
            'id_evid'=>$maximo,
            'id_tipo_evid' => $id_tipo_evid,
            'arch_evidencia' => $name,  
        ]);
     return redirect('/incidencias/editar_evidencia/'.$maximo);
    }
    public function editar_evidencia ($maximo){
    
    $evidencia= DB::selectOne('select inc_evidencias.*,inc_tipo_evidencia.nombre_evidencia FROM inc_tipo_evidencia, inc_evidencias WHERE inc_evidencias.id_tipo_evid = inc_tipo_evidencia.id_tipo_evid AND inc_evidencias.id_evid='.$maximo);
    //dd($maximo);
    return view('incidencias.editar_evidencia',compact ('evidencia'));
}
public function modificar_evidencia($id_evid){
    $evidencia= DB::selectOne('select inc_evidencias.*,inc_tipo_evidencia.nombre_evidencia FROM inc_tipo_evidencia, inc_evidencias WHERE inc_evidencias.id_tipo_evid = inc_tipo_evidencia.id_tipo_evid AND inc_evidencias.id_evid='.$id_evid);
    $tipo_evidencia= DB::select('SELECT * from inc_tipo_evidencia ORDER by nombre_evidencia ASC');
    //dd($evidencia);
    return view('incidencias.partials_mod_evidencia',compact('evidencia','tipo_evidencia'));
}

    }
