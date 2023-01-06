@extends('layouts.app')
@section('title','Incidencias')
@section('content')

<main class="col-md-12">
    <div class="row"> <form id="form_historial_solicitud" action="{{url("")}}" method="POST" role="form" >
        <div class="col-md-5 col-md-offset-4">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title text-center">HISTORIAL DE OFICIOS DOCENTES</h3>
                </div>
            </div>  
        </div>
  </div>
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
    <tbody>
    <table id="tabla_historial_docentes" class="table table-bordered table-resposive">
                            <thead >                                     
                                    <th>No.</th> 
                                    <th>Articulo aplicado</th>
                                    <th>Motivo de oficio</th>
                                    <th>Fecha solicitada</th>
                                    <th>Estado de oficio</th>
                            </thead>
                            <tbody>
                            @foreach ($histSol as $hist)
                         <tr>
                            <td>{{$hist->id_solicitud}}</td>
                            <td>{{$hist->nombre_articulo}}</td>
                            <td>{{$hist->motivo_oficio}}</td>
                            <td>{{$hist->fecha_req}}</td>
                            <!--
                            @if($hist->id_estado_solicitud==1)
                                <td>Enviado</td>
                            @endif
                            @if($hist->id_estado_solicitud==2)
                                <td>Autorizado</td>
                            @endif
                            @if($hist->id_estado_solicitud==3)
                                <td>Rechazado</td>
                            @endif-->
                            <td>
                             <button id="{{$hist->id_solicitud}}" class="btn btn-primary ver_solicitud"> Ver solicitud </button>
                            </td>
                            
                        </tr>
                        @endforeach


</table>
</div>
</div>
<div class="modal fade" id="modal_ver" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header bg-info">
           <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title text-center" id="myModalLabel">EDITAR EVIDENCIA</h4>
        </div>
      <div class="modal-body">
    <div id="contenedor_ver">
            </div>
                </div> <!-- modal body  -->
                    <div class="modal-footer">
                    
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                       
                        <button type="button" id="guardar_mod"class="btn btn-primary" >Guardar</button>
                   </div>
 
                </div>
            </div>
</div>

<script>
$(document).ready(function(){
      //modal para evidencia
    $(".ver_solicitud").click(function(){
        //alert("HOLA");
    var id_solicitud = $(this).attr('id');
    $.get("/incidencias/historial_docentesSo/ver_oficio/"+id_solicitud,function(request){
    $("#contenedor_ver").html(request);
    $("#modal_ver").modal('show');
    });
  }); 
});   
</script>
</main>


@endsection
