<?php

namespace App\Http\Controllers;
use App\Incidencias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Redirect;
use Session;




class IncidenciasController extends Controller
{
    
    public function vista()
    {
        $articulos= DB::select('SELECT * from inc_articulos ORDER by nombre_articulo ASC');
       // dd($articulos);
       $id_usuario = Session::get('usuario_alumno');
       $id_personal = DB::SelectOne('SELECT * FROM `gnral_personales` WHERE tipo_usuario='.$id_usuario.'');
       $id_personal = $id_personal->id_personal;
        $id_periodo = Session::get('periodotrabaja');
        $estado_profesor = DB::SelectOne('SELECT COUNT(gnral_personales.id_personal) contar 
        from gnral_personales, gnral_horarios, gnral_periodo_carreras WHERE 
        gnral_horarios.id_personal = gnral_personales.id_personal AND 
        gnral_horarios.id_periodo_carrera = gnral_periodo_carreras.id_periodo_carrera AND gnral_personales.id_personal = '.$id_personal.' 
        AND gnral_periodo_carreras.id_periodo = '.$id_periodo.'');
        if($estado_profesor->contar == 0){
            $estado_profesor=0;
            $array_carreras=0;
        }else{
            $estado_profesor=1;
            $carreras = DB::Select('SELECT gnral_periodo_carreras.id_carrera
            from gnral_personales, gnral_horarios, gnral_periodo_carreras WHERE 
            gnral_horarios.id_personal = gnral_personales.id_personal AND 
            gnral_horarios.id_periodo_carrera = gnral_periodo_carreras.id_periodo_carrera AND gnral_personales.id_personal='.$id_personal.' 
            AND gnral_periodo_carreras.id_periodo ='.$id_periodo.'');
            $array_carreras=array();
            
            foreach($carreras as $carrera){
                $nombre_jefe=DB::SelectOne('SELECT gnral_personales.id_personal,gnral_personales.nombre 
                FROM gnral_personales, gnral_jefes_periodos WHERE gnral_jefes_periodos.id_personal=gnral_personales.id_personal 
                AND gnral_jefes_periodos.id_carrera='.$carrera->id_carrera.' and gnral_jefes_periodos.id_periodo='.$id_periodo.'');
            $dat['id_personal']=$nombre_jefe->id_personal;
            $dat['nombre']=$nombre_jefe->nombre;
            array_push($array_carreras, $dat);
            }

        }
    return view('incidencias.agregar', compact('articulos', 'estado_profesor', 'array_carreras'));
    }
    
    public function vista2()
    {
        $tipo_evidencia= DB::select('SELECT * from inc_tipo_evidencia ORDER by nombre_evidencia ASC');
         //dd($tipo_evidencia);
         return view('incidencias.cargar_evidencia', compact ('tipo_evidencia'));
   
    }
    public function vista3(){
        $solicitud = DB:: table ('inc_solicitudes')
        ->join('inc_articulos','inc_solicitudes.id_articulo','=','inc_articulos.id_articulo')
        ->select('inc_solicitudes.*', 'inc_articulos.*')    
        ->get();
        return view('incidencias.historial_oficio', compact('solicitud'));
        /*$usuario=DB:: table('user')*/
        
    }
    public function vista4(){
        $evid = DB:: table ('inc_evidencias')
        ->join('inc_tipo_evidencia','inc_evidencias.id_tipo_evid','=','inc_tipo_evidencia.id_tipo_evid')
        ->select('inc_evidencias.*', 'inc_tipo_evidencia.*')    
        ->get();
        return view('incidencias.historial_evidencias', compact('evid'));
    }
    public function vista5(){
        $solicitudes = DB:: table ('inc_solicitudes')
        ->join('inc_articulos','inc_solicitudes.id_articulo','=','inc_articulos.id_articulo')
        ->join('gnral_personales','inc_solicitudes.id_personal','=','gnral_personales.id_personal')
        ->select('inc_solicitudes.*', 'inc_articulos.*', 'gnral_personales.*')    
        ->get();
       return view('incidencias.validar_oficios', compact('solicitudes'));
    }
    public function vista6(){
        $histSol = DB:: table ('inc_solicitudes')
        ->join ('inc_articulos', 'inc_solicitudes.id_articulo','=','inc_articulos.id_articulo')
        ->select('inc_solicitudes.*', 'inc_articulos.*')
        ->get();
        return view('incidencias.historial_docentesSo', compact ('histSol'));
    }
    public function vista7(){
        $histEvi = DB:: table ('inc_evidencias')
        ->join ('inc_tipo_evidencia', 'inc_evidencias.id_tipo_evid','=','inc_tipo_evidencia.id_tipo_evid')
        ->select('inc_evidencias.*', 'inc_tipo_evidencia.*')
        ->get();
        return view('incidencias.historial_docentesEv', compact ('histEvi'));
    }
    public function vista8(){
        return view('incidencias.articulos_evidencia');
    }
    public function articulos_evidencia(Request $request){

    }
    public function historial_docentesSo(Request $request){
        
    }
    public function historial_docentesEv(Request $request){

    }
    public function validar_oficios(Request $request){

    }
    public function historial_oficios(Request $request){
    
    }
    public function historial_evidencias(Request $request){

    }
    public function index(){
        $historial = DB::table('inc_solicitudes')->paginate(10);
        return view ('inc_solicitudes.index',['historial'=> $historial]);
    }
    public function guardar_mod_evidencia(Request $request, $id_evid){
        $documento=$request->file('arch_evidencia');
        $id_tipo_evid=$request->input('id_tipo_evid');
        $name="evidencia_incidencia_".$id_evid.".".$documento->getClientOriginalExtension();
        $documento->move(public_path().'/incidencias/', $name);
    
            DB::table('inc_evidencias')->where('id_evid', $id_evid)
            ->update([
                'id_tipo_evid' => $id_tipo_evid,
                'arch_evidencia' => $name,  
            ]);
         return redirect('/incidencias/editar_evidencia/'.$id_evid);
    }
    public function guardar_incidencia_solicitada(Request $request){
        //dd($request);
        $id_usuario = Session::get('usuario_alumno');
        $id_personal = DB::SelectOne('SELECT * FROM `gnral_personales` WHERE tipo_usuario='.$id_usuario.'');
        $id_personal = $id_personal->id_personal;
        $id_estado_solicitud="1";
        
        //dd($estado_profesor);
       $id_articulo = $request->input('id_articulo');
       $estado_profesor = $request->input('estado_profesor');
       if($estado_profesor==0){
        $id_pers = DB::SelectOne('SELECT id_personal FROM `adscripcion_personal` WHERE id_personal='.$id_personal.'');
        $id_jefe= DB::SelectOne('SELECT * FROM `gnral_unidad_personal` WHERE `id_unidad_persona` ='.$id_pers->id_unidad_persona.'') ;
        $id_jefe_finan = DB::SelectOne('SELECT * FROM `gnral_unidad_personal` WHERE `id_unidad_admin` = 22 '); 
        $id_jefe_a=$id_jefe_finan->id_personal;
        $id_jefe=$id_jefe->id_personal;
       }
       else{
        $id_jefe_academ = DB::SelectOne('SELECT * FROM `gnral_unidad_personal` WHERE `id_unidad_admin` = 22 '); 
        $id_jefe_a=$id_jefe_academ->id_personal;
        $id_jefe = $request->input('id_jefe');
        
       }
       //////////articulo 56///////////////
        if($id_articulo ==2){
        $fecha_req = $request->input('fecha_req');
        $motivo_oficio = $request->input('motivo_oficio');
        
        //$usuario = DB::select("Consulta de usuario logeado");
        DB::table('inc_solicitudes')->insert([
            'id_articulo' => $id_articulo,
            'fecha_req' => $fecha_req,
            'motivo_oficio' => $motivo_oficio,  
            'id_personal' =>$id_personal,
            'id_jefe' =>$id_jefe,
            'id_estado_solicitud'=>$id_estado_solicitud,
        ]);
        }else{
        }
        //////articulo 61///////////////
        if($id_articulo ==4){
            $fecha_req = $request->input('fecha_req');
            $motivo_oficio = $request->input('motivo_oficio');


            DB::table('inc_solicitudes')->insert([
                'id_articulo' => $id_articulo,
                'fecha_req' => $fecha_req,
                'motivo_oficio' => $motivo_oficio,
                'id_personal' =>$id_personal,
                'id_estado_solicitud'=>$id_estado_solicitud,
            ]);
        }else{
        }
        ////////////////articulo 64/////////////
        if($id_articulo ==5){
            $fecha_req=$request->input('fecha_req');
            $motivo_oficio = $request->input('motivo_oficio');
            $hora_e=$request->input('hora_e');
            $hora_st=$request->input('hora_st');

            DB::table('inc_solicitudes')->insert([
                'id_articulo'=>$id_articulo,
                'fecha_req'=>$fecha_req,
                'motivo_oficio' => $motivo_oficio,
                'hora_e'=>$hora_e,
                'hora_st'=>$hora_st,
                'id_personal' =>$id_personal,
                'id_jefe' =>$id_jefe,
                'id_estado_solicitud'=>$id_estado_solicitud,
            ]); 
        }else{
        } 
        //////art68diaeconomico/////
        if($id_articulo ==6){
            $fecha_req=$request->input('fecha_req');
            $motivo_oficio = $request->input('motivo_oficio');

            DB::table('inc_solicitudes')->insert([
                'id_articulo'=>$id_articulo,
                'fecha_req'=>$fecha_req,
                'motivo_oficio' => $motivo_oficio,
                'id_personal' =>$id_personal,
                'id_jefe' =>$id_jefe,
                'id_estado_solicitud'=>$id_estado_solicitud,
            ]); 
        }else{
        } 
        /////////art 68 mediass jornadas//////////////
        if($id_articulo ==10){
            $fecha_req=$request->input('fecha_req');
            $motivo_oficio = $request->input('motivo_oficio');
            $hora_e1=$request->input('hora_e1');
            $hora_s1=$request->input('hora_s1');

            DB::table('inc_solicitudes')->insert([
                'id_articulo'=>$id_articulo,
                'fecha_req'=>$fecha_req,
                'motivo_oficio' => $motivo_oficio,
                'hora_e1'=>$hora_e1,
                'hora_s1'=>$hora_s1,
                'id_personal' =>$id_personal,
                'id_jefe' =>$id_jefe,
                'id_estado_solicitud'=>$id_estado_solicitud,
                
            ]); 
        }else{
        }
         /////////art 68 dia economico//////////////
         if($id_articulo ==7){
            $fecha_req=$request->input('fecha_req');
            $motivo_oficio = $request->input('motivo_oficio');
            
            DB::table('inc_solicitudes')->insert([
                'id_articulo'=>$id_articulo,
                'fecha_req'=>$fecha_req,  
                'motivo_oficio' => $motivo_oficio,  
                'id_personal' =>$id_personal,
                'id_jefe' =>$id_jefe_a,
                'id_estado_solicitud'=>$id_estado_solicitud,
            ]); 
        }else{
        } 
        ///////////////art 73//////////
        if($id_articulo ==8){
            $fecha_req=$request->input('fecha_req');
            $fecha_invac=$request->input('fecha_invac');
            $fecha_tervac=$request->input('fecha_tervac');
            $motivo_oficio = $request->input('motivo_oficio');
            
            DB::table('inc_solicitudes')->insert([
                'id_articulo'=>$id_articulo,
                'fecha_req'=>$fecha_req,
                'motivo_oficio' => $motivo_oficio,
                'fecha_invac'=>$fecha_invac,
                'fecha_tervac'=>$fecha_tervac,
                'id_personal' =>$id_personal,
                'id_estado_solicitud'=>$id_estado_solicitud,
            ]); 
        }else{
        } 
        ////art44 diaeconomico////
        if($id_articulo ==1){
            $fecha_req=$request->input('fecha_req');
            $motivo_oficio = $request->input('motivo_oficio');
            DB::table('inc_solicitudes')->insert([
                'id_articulo'=>$id_articulo,
                'fecha_req'=>$fecha_req,
                'motivo_oficio' => $motivo_oficio,
                'id_personal' =>$id_personal,
                'id_jefe' =>$id_jefe,
                'id_estado_solicitud'=>$id_estado_solicitud,
            ]); 
        }else{
        } 
        ///////art 44 medias jornadas////
        if($id_articulo ==9){
            $fecha_req=$request->input('fecha_req');
            $motivo_oficio = $request->input('motivo_oficio');
            $hora_e2=$request->input('hora_e2');
            $hora_s2=$request->input('hora_s2');

            DB::table('inc_solicitudes')->insert([
                'id_articulo'=>$id_articulo,
                'fecha_req'=>$fecha_req,
                'motivo_oficio' => $motivo_oficio,
                'hora_e2'=>$hora_e2,
                'hora_s2'=>$hora_s2,
                'id_personal' =>$id_personal,
                'id_jefe' =>$id_jefe,
                'id_estado_solicitud'=>$id_estado_solicitud,
                //////a
            ]); 
        }else{
        } 
        return Redirect::to('/incidencias/historial_docentesSo');
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


public function consultar_jefes(){
    $id_usuario = Session::get('usuario_alumno');
    $id_personal = DB::SelectOne('SELECT * FROM `gnral_personales` WHERE tipo_usuario='.$id_usuario.'');
    $id_personal = $id_personal->id_personal;
    $id_periodo = Session::get('periodotrabaja');
    $carreras = DB::Select('SELECT gnral_periodo_carreras.id_carrera
    from gnral_personales, gnral_horarios, gnral_periodo_carreras WHERE 
    gnral_horarios.id_personal = gnral_personales.id_personal AND 
    gnral_horarios.id_periodo_carrera = gnral_periodo_carreras.id_periodo_carrera AND gnral_personales.id_personal='.$id_personal.' 
    AND gnral_periodo_carreras.id_periodo ='.$id_periodo.'');
    $array_carreras=array();
    
    foreach($carreras as $carrera){
        $nombre_jefe=DB::SelectOne('SELECT gnral_personales.id_personal,gnral_personales.nombre 
        FROM gnral_personales, gnral_jefes_periodos WHERE gnral_jefes_periodos.id_personal=gnral_personales.id_personal 
        AND gnral_jefes_periodos.id_carrera='.$carrera->id_carrera.' and gnral_jefes_periodos.id_periodo='.$id_periodo.'');
    $dat['id_personal']=$nombre_jefe->id_personal;
    $dat['nombre']=$nombre_jefe->nombre;
    array_push($array_carreras, $dat);
    }
    return $array_carreras;
    

}
public function aceptadojefe($id_solicitud_oficio){
    DB::update('UPDATE `inc_solicitudes` SET `id_estado_solicitud` = 2 WHERE `inc_solicitudes`.`id_solicitud` = '.$id_solicitud_oficio.'');
    return redirect('/incidencias/validar_oficios');
}
public function rechazadojefe($id_solicitud_oficio){
    DB::update('UPDATE `inc_solicitudes` SET `id_estado_solicitud` = 3 WHERE `inc_solicitudes`.`id_solicitud` = '.$id_solicitud_oficio.'');
    return redirect('/incidencias/validar_oficios');
}
public function validacion_historial(){
    $solicitudes = DB:: table ('inc_solicitudes')
    ->join('inc_articulos','inc_solicitudes.id_articulo','=','inc_articulos.id_articulo')
    ->join('gnral_personales','inc_solicitudes.id_personal','=','gnral_personales.id_personal')
    ->select('inc_solicitudes.*', 'inc_articulos.*', 'gnral_personales.*')    
    ->get();
    return view('incidencias.validacion_historial',compact('solicitudes'));
}
public function ver($id_oficio){
    //mostar la solicitud por comisionado

    $oficios=DB::selectOne('select gnral_personales.nombre, inc_solicitudes.motivo_oficio, inc_articulos.descripcion_art, inc_articulos.nombre_articulo 
    FROM inc_solicitudes, inc_articulos, gnral_personales
    WHERE inc_solicitudes.id_personal=gnral_personales.id_personal and inc_solicitudes.id_articulo=inc_articulos.id_articulo and id_solicitud='.$id_oficio.'');
    //dd($oficios);
    return view('incidencias.modal_ver',compact('oficios'));
}
}
