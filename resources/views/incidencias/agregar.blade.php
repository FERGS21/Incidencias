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
  <form action="{{url("/incidencias/guardar_incidencia")}}" method="POST" role="form" >

  <div class="row">
  <div class="col-md-8 col-md-offset-2">
            <label>Motivo del oficio de incidencias </label>
             <textarea class="form-control" id="id_motivo" name="motivo_oficio" rows="3" placeholder="Ingresa el motivo del (Utilizar letras mayusculas y minusculas), por ejemplo: Faltar 25 y 26 de Octubre" style=""></textarea>
            </div>
            </div>
            
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
                         <input class="form-control datepicker fecha_req"   type="text"  id="fecha_r" name="fecha_req" data-date-format="yyyy/mm/dd" placeholder="AAAA/MM/DD" >
                     </div>
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
  <div class="row">
  
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
    <label for="fecha_tervac">.Fecha de termino de  vacaciones</label>
                     <div class="form-group">
                         <input class="form-control datepicker fecha_tervac"   type="text"  id="fecha_tervac" name="fecha_tervac" data-date-format="yyyy/mm/dd" placeholder="AAAA/MM/DD" >
                     </div>
                     </div>               
</div>
</div>
                     {{------BOToN---}}
<div class="row" style="display: inline" id="solicitar">
               
                <div class="col-md-2 col-md-offset-4">
                    <button id="guardar_solicitud" type="submit" class="btn btn-success btn-lg">Solicitar</button>
                </div>
                <div class="col-md-2 col-md-offset-1">
                    <button id="imprimir_solicitud" type="submit" class="btn btn-success btn-lg">Imprimir</button>
              </div>

</form> 
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
     }
     
   });
     
   $('#hora_e').pickatime({
                format: 'HH:i',
     });
     $('#hora_st').pickatime({
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
  });

</script>
</main>

@endsection
