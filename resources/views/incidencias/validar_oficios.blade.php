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
    <div class="col-md-10 col-md-offset-1">
                <table id="tabla_envio" class="table table-bordered table-resposive">
                    <thead>
                    <tr class="text-center">
                        <th class="text-center">Numero</th>
                        <th class="text-center">Nombre del solicitante</th>
                        <th class="text-center">Fecha  oficio</th>
                        <th class="text-center">Motivo del oficio</th>
                        <th class="text-center">Ver oficio</th>
                        <th class="text-center">Evaluar oficio</th>
                    </tr>
                    @foreach($solicitudes as $solicitud)
                    <tr>
                      
                      <th>{{$solicitud->id_solicitud}} </th>
                      <th>{{$solicitud->nombre}}</th>
                      <th>
                       @for( $articulo=1; $articulo <=10 ; $articulo++)
                                    @if($solicitud->id_articulo == $articulo)
                                        {{$solicitud->fecha_req}}
                                    @endif
                        @endfor
                      </th>
                      <th>
                        @for( $articulo=1; $articulo <=10 ; $articulo++)
                      
                          @if($articulo==$solicitud->id_articulo)
                            {{$solicitud->descripcion_art}}
                          @endif
                        @endfor  
                      </th>
                      <th>
                      @for( $articulo=1; $articulo <=10 ; $articulo++)
                                 @if($solicitud->id_articulo == 1)
                                        {{$solicitud->motivo_oficio}}
                                @endif
                      @endfor
                      </th>

                      </th>
                        <td class="text-center">
                          <button type="button" class="btn btn-info btn-circle" onclick="window.location='{{ url('/oficios/aceptadojefe/', $solicitud->id_solicitud) }}'" title="Autorizar"><i class="glyphicon glyphicon-ok"></i></button>
                          <button type="button" class="btn btn-warning btn-circle" onclick="window.location='{{ url('/oficios/rechazadojefe/', $solicitud->id_solicitud ) }}'" title="Rechazar"><i class="glyphicon glyphicon-remove"></i></button>
                        </td>
                    </tr>
                    @endforeach
                    </thead>
                </table>
    </div>
  </div>


  </main>
  {{ csrf_field() }}
  
@endsection