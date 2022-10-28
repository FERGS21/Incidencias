@extends('layouts.app')
@section('title', 'Incidencias')
@section('content')
    
<main class="col-md-12">
<div class="row">
        <div class="col-md-5 col-md-offset-4">
    <div class="panel panel-info">
        <div class="panel-heading">
          <h3 class="panel-title text-center">SOLICITUD DE OFICIOS</h3>
        </div>
    </div>  
  </div>
  </div>
  <form id="form_guardar_solicitud" action="{{url("/incidencias/guardar_incidencia_solicitada")}}" method="POST" role="form" >
  {{ csrf_field() }}
  <div class="row">
  <div class="col-md-3 col-md-offset-2">
    <div class= "dropdown">
        <label for="Tipo_of">Tipo de articulo/clausula aplicada </label>
        <select class="form-control" placeholder="Seleciona una opción" id="id_articulo" name="id_articulo" required>
              <option disabled selected hidden> Selecciona una opción </option>
                @foreach($articulos as $articulo)
                <option value="{{$articulo->id_articulo}}" data-art="{{$articulo->nombre_articulo}}"> {{$articulo->nombre_articulo}} </option>
                @endforeach
             </select>
              </div>
            </div>
            <div class="col-md-3 col-md-offset-2">
    <label for="fecha_req">Fecha requerida</label>
                     <div class="form-group">
                         <input class="form-control datepicker fecha_req"   type="text"  id="fecha_req" name="fecha_req" data-date-format="yyyy/mm/dd" placeholder="AAAA/MM/DD" >
                     </div>
                     </div>
            </div>
  <div class="row">
  <div class="col-md-8 col-md-offset-2">
            <label>Motivo del oficio de incidencias </label>
            <textarea class="form-control" id="motivo_oficio" name="motivo_oficio" rows="3" placeholder="Ingresa el motivo del (Utilizar letras mayusculas y minusculas), por ejemplo: Faltar 25 y 26 de Octubre" style=""></textarea>
            </div>
            </div>
            

            {{-----------ARTICULO 64°-----------}}
<div style="display: none;" id="articulo_64">
<div class="row">
  <div class="col-md-2 col-md-offset-2">
  <label for="horario entrada">Horario de entrada</label><br>
                     <div class="form-group">
                             <input id="hora_e" class="form-control time" type="text" name="hora_e" placeholder="HORA" />
                     </div>
</div>
<div class="col-md-2 col-md-offset-1">
  <label for="hora salida tarde">Horario de llegada tarde</label><br>
                     <div class="form-group">
                             <input id="hora_st" class="form-control time" type="text" name="hora_st" placeholder="HORA" />
                     </div>
                    
                     </div>
</div>
</div>
{{--------ARTICULO 73°----------}}
<div style="display: none;" id="articulo_73">
<div class="row">
<div class="col-md-3 col-md-offset-2">
    <label for="fecha_invac">Fecha de inicio vacaciones</label>
                     <div class="form-group">
                         <input class="form-control datepicker fecha_invac"   type="text"  id="fecha_invac" name="fecha_invac" data-date-format="yyyy/mm/dd" placeholder="AAAA/MM/DD" >
                     </div>
                     </div>
<div class="col-md-3 col-md-offset-1">
    <label for="fecha_tervac">Fecha de termino de  vacaciones</label>
                     <div class="form-group">
                         <input class="form-control datepicker fecha_tervac"   type="text"  id="fecha_tervac" name="fecha_tervac" data-date-format="yyyy/mm/dd" placeholder="AAAA/MM/DD" >
                     </div>
                     </div>               
</div>
</div>
{{------CLAUSULA 44° DE CON SINDICATO------}}
<div style="display: none;" id="articulo_44">
<div class="row">
<div class="col-md-3 col-md-offset-2">
    <label for="fecha_invac">Año de ingreso a la institución</label>
    <textarea class="form-control" id="id_año_institución" name="Ingreso a la institución"  placeholder="AÑO"></textarea>
            </div>
            </div>
            </div>
{{------ARTICULO 68° DE SIN SINDICATO------}}
<div style="display: none;" id="articulo_68">
<div class="row">
<div class="col-md-3 col-md-offset-2">
    <label for="fecha_invac">Año de ingreso a la institución</label>
    <textarea class="form-control" id="id_año_institución" name="Ingreso a la institución"  placeholder="AÑO"></textarea>
            </div>
            </div>
            </div>
{{------ARTICULO 68° 1/2 JORNADA SIN SINDICATO------}}
<div style="display: none;" id="articulo_681">
<div class="row">
  <div class="col-md-2 col-md-offset-2">
  <label for="horario entrada">Horario de entrada</label><br>
                     <div class="form-group">
                             <input id="hora_e1" class="form-control time" type="text" name="hora_1" placeholder="HORA" />
                     </div>
</div>
<div class="col-md-2 col-md-offset-1">
  <label for="hora salida tarde">Horario de salida</label><br>
                     <div class="form-group">
                             <input id="hora_s1" class="form-control time" type="text" name="hora_s1" placeholder="HORA" />
                     </div>
                    
                     </div>
</div>
</div>
{{------CLAUSULA 44° 1/2 JORNADA CON SINDICATO------}}
<div style="display: none;" id="articulo_441">
<div class="row">
  <div class="col-md-2 col-md-offset-2">
  <label for="horario entrada">Horario de entrada</label><br>
                     <div class="form-group">
                             <input id="hora_e2" class="form-control time" type="text" name="hora_e2" placeholder="HORA" />
                     </div>
</div>
<div class="col-md-2 col-md-offset-1">
  <label for="hora salida tarde">Horario de salida</label><br>
                     <div class="form-group">
                             <input id="hora_s2" class="form-control time" type="text" name="hora_s1" placeholder="HORA" />
                     </div>
                    
                     </div>
</div>
</div>
{{------ARTICULO 56°------}}
<div style="display: none;" id="articulo_56">
</div>
{{------ARTICULO 58°------}}
<div style="display: none;" id="articulo_58">
</div>
{{------ARTICULO 69°------}}
<div style="display: none;" id="articulo_69">
</div>


</form> 
<div class="row" style="display: inline" id="solicitar">
                <div class="col-md-2 col-md-offset-4">

                    <button id="enviar_solicitud" type="button" class="btn btn-success btn-lg">Guardar</button>
                  </div>
                <div class="col-md-2 col-md-offset-1">
                    <button id="imprimir_solicitud" type="submit" class="btn btn-success btn-lg">Imprimir</button>
              </div>

</div>
<script>
   $(document).ready( function() {
   $("#id_articulo").change(function(){
    var id_articulo=$(this).val();
     if(id_articulo == 5){
      $("#articulo_64").css("display", "block");
      $("#articulo_73").css("display", "none");
     }
      if(id_articulo == 8){
      $("#articulo_73").css("display", "block");
      $("#articulo_64").css("display", "none");
      $("#articulo_44").css("display", "none");
      $("#articulo_68").css("display", "none");
      $("#articulo_681").css("display", "none");
      $("#articulo_441").css("display", "none");
      }
      if (id_articulo == 1){
        $("#articulo_44").css("display", "block");
        $("#articulo_64").css("display", "none");
        $("#articulo_73").css("display", "none");
      }
      if (id_articulo == 6){
        $("#articulo_68").css("display", "block");
        $("#articulo_64").css("display", "none");
        $("#articulo_73").css("display", "none");
        $("#articulo_44").css("display", "none");
      }
      if (id_articulo == 10){
        $("#articulo_681").css("display", "block");
        $("#articulo_64").css("display", "none");
        $("#articulo_73").css("display", "none");
        $("#articulo_44").css("display", "none");
        $("#articulo_68").css("display", "none");
      }
      if (id_articulo == 9){
        $("#articulo_441").css("display", "block");
        $("#articulo_64").css("display", "none");
        $("#articulo_73").css("display", "none");
        $("#articulo_44").css("display", "none");
        $("#articulo_68").css("display", "none");
        $("#articulo_681").css("display", "none");
      }
      if (id_articulo == 2){
        $("#articulo_441").css("display", "none");
        $("#articulo_64").css("display", "none");
        $("#articulo_73").css("display", "none");
        $("#articulo_44").css("display", "none");
        $("#articulo_68").css("display", "none");
        $("#articulo_681").css("display", "none");
      }
      if (id_articulo == 3){
        $("#articulo_441").css("display", "none");
        $("#articulo_64").css("display", "none");
        $("#articulo_73").css("display", "none");
        $("#articulo_44").css("display", "none");
        $("#articulo_68").css("display", "none");
        $("#articulo_681").css("display", "none");
        $("#articulo_56").css("display", "none");
      }
      if (id_articulo == 7){
        $("#articulo_441").css("display","none");
        $("#articulo_64").css("display", "none");
        $("#articulo_73").css("display", "none");
        $("#articulo_44").css("display", "none");
        $("#articulo_68").css("display", "none");
        $("#articulo_681").css("display","none");
        $("#articulo_56").css("display", "none");
        $("#articulo_58").css("display", "none");
      }

   });

   $('#hora_e').pickatime({
                format: 'HH:i',
     });
     $('#hora_st').pickatime({
                format: 'HH:i',
     });
     $('#hora_e1').pickatime({
                format: 'HH:i',
     });
     $('#hora_s1').pickatime({
                format: 'HH:i',
     });
     $('#hora_e2').pickatime({
                format: 'HH:i',
     });
     $('#hora_s2').pickatime({
                format: 'HH:i',
     });
     $( '.fecha_req').datepicker({
                pickTime: false,
                autoclose: true,
                language: 'es',
                startDate: '+0d',
            }).on('changeDate',
                function (selected) {
                    $('.fecha_req').datepicker('setStartDate', getDate(selected));
                });
                $( '.fecha_invac').datepicker({
                pickTime: false,
                autoclose: true,
                language: 'es',
                startDate: '+0d',
            }).on('changeDate',
                function (selected) {
                    $('.fecha_invac').datepicker('setStartDate', getDate(selected));
                });
                $( '.fecha_tervac').datepicker({
                pickTime: false,
                autoclose: true,
                language: 'es',
                startDate: '+0d',
            }).on('changeDate',
                function (selected) {
                    $('.fecha_tervac').datepicker('setStartDate', getDate(selected));
                });

    $("#enviar_solicitud").click(function(){
     
      
      var id_articulo = $('#id_articulo').val();
     //alert (id_articulo);
     if(id_articulo == null)
     {
      swal
      ({
        position: "top",
        type: "error",
        title: "Selecciona articulo",
        showConfirmButton: false,
        timer: 3500
      });
     }
     else{
      if(id_articulo == 2){
        var fecha_req = $('#fecha_req').val();
        if(fecha_req == ''){
          swal({
        position: "top",
        type: "error",
        title: "Elige fecha solicitada",
        showConfirmButton: false,
        timer: 3500
      });
        }else{
          var motivo_oficio = $('#motivo_oficio').val();
          if(motivo_oficio == ''){
            swal({
        position: "top",
        type: "error",
        title: "Elige fecha solicitada",
        showConfirmButton: false,
        timer: 3500
      });
          }else{
               $("#form_guardar_solicitud").submit();
              $("#enviar_solicitud").attr("disableb", true);
            swal({
        position: "top",
        type: "success",
        title: "Registro exitoso",
        showConfirmButton: false,
        timer: 3500
            });
          }
        }
       
      }else{

      }
    }
      

    });
                
  });
</script>
</main>
@endsection

