@extends('layouts.app')
@section('title', 'Incidencias')
@section('content')
    
<main class="col-md-12">
<div class="row">
        <div class="col-md-5 col-md-offset-4">
    <div class="panel panel-info">
        <div class="panel-heading">
          <h3 class="panel-title text-center">VALIDAR OFICIOS DE INCIDENCIAS</h3>
        </div>
    </div>  
  </div>
</div>
  <form id="form_guardar_solicitud" action="{{url("/incidencias/validar_oficios")}}" method="POST" role="form" >
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
                <table id="tabla_envio" class="table table-bordered table-resposive">
                    <thead>
                    <tr class="text-center">
                        <th class="text-center">Numero</th>
                        <th class="text-center">Nombre del solicitante</th>
                        <th class="text-center">Fecha  oficio</th>
                        <th class="text-center">Ver oficio</th>
                        <th class="text-center">Evaluar oficio</th>
                    </tr>
                    <tr>
                    <th></th>
                    <th></th>
                    <th>
                      <td class="text-center">
                      <button class="btn btn-primary edita" id=""><i class="glyphicon glyphicon-list"></i></button>
                     </td>
                    </th>
                      <td class="text-center">
                      <button type="button" class="btn btn-info btn-circle" onclick="window.location='{{ url('') }}'" title="Autorizar"><i class="glyphicon glyphicon-ok"></i></button>
                                        <button type="button" class="btn btn-warning btn-circle" onclick="window.location='{{ url('' ) }}'" title="Rechazar"><i class="glyphicon glyphicon-remove"></i></button>
                      </td>
                 
                    </tr>
                    </thead>
                </table>
    </div>
  </div>
//*CONTENEDOR-MODAL*//
<div class="modal fade" id="modal_mostrar_oficio" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-info">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title text-center" id="myModalLabel">DATOS DEL OFICIO</h4>
                    </div>
                    <div class="modal-body">

                        <div id="contenedor_mostrar_oficio">

                        </div>
                    </div> <!-- modal body  -->

                    <div class="modal-footer">

                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    </div>

                </div>
            </div>
        </div>
  </main>
  {{ csrf_field() }}
  
@endsection