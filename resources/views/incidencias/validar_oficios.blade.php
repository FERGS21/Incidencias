@extends('layouts.app')
@section('title', 'Incidencias')
@section('content')
    
<main class="col-md-12">
          <div class="row">
            <div class="col-md-9 col-md-offset-1">
                <ul class="nav nav-tabs">
                    <li>
                        <a href="{{url('/incidencias/validar_oficios/historial')}}">Historial de Oficios recibidos</a>
                    </li>
                    <li class="active" ><a href="#">Oficios recibidos para validacion</a></li>
               </ul>
                
            </div>
        </div>
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
                        <th class="text-center">Articulo</th>
                        <th class="text-center">Ver oficio</th>
                        <th class="text-center">Evaluar oficio</th>
                    </tr>
                    @foreach($solicitudes as $solicitud)
                    @if($solicitud->id_estado_solicitud==1)
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
                            {{$solicitud->nombre_articulo}}
                          @endif
                        @endfor  
                      </th>

                      <th>
                      <button id="{{$solicitud->id_solicitud}}" class="btn btn-primary ver_solicitud"> Editar </button>
                      </th>
                         
                      <th>
                          
                          <button type="button" class="btn btn-info btn-circle" onclick="window.location='{{ url('/incidencias/historial_docentesSo/oficio/aceptado', $solicitud->id_solicitud) }}'" title="Autorizar"><i class="glyphicon glyphicon-ok"></i></button>

                          <button type="button" class="btn btn-warning btn-circle" onclick="window.location='{{ url('/incidencias/historial_docentesSo/oficio/rechazado', $solicitud->id_solicitud ) }}'" title="Rechazar"><i class="glyphicon glyphicon-remove"></i></button>
                          
                        </th>
                    </tr>
                    @endif
                    @endforeach
                    </thead>
                </table>
        </div>
    </div>
  </main>

  
@endsection