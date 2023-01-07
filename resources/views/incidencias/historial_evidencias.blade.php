@extends('layouts.app')
@section('title', 'Incidencias')
@section('content')
    
<main class="col-md-12">
<div class="row">
        <div class="col-md-5 col-md-offset-4">
    <div class="panel panel-info">
        <div class="panel-heading">
          <h3 class="panel-title text-center">HISTORIAL DE EVIDENCIAS ENVIADAS ENVIADOS</h3>
        </div>
    </div>  
  </div>
  </div>
  <form id="form_guardar_solicitud" action="{{url("/incidencias/historial_evidencias")}}" method="POST" role="form" >
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
    <table id="tabla_envio" class="table table-bordered table-resposive">
                          <thead >                                     
                            <th>No.</th> 
                            <th> Nombre del solicitante</th>
                            <th>Tipo de evidencia</th> 
                            <th>Fecha de envio de evidencia</th> 
                            <th>Ver evidencia</th>                    
                          </thead>
                          <tbody>
                            @foreach ($evid as $evidencia)
                              <tr>

                                <td>{{$evidencia->id_evid}}</td>
                                <td>{{$evidencia->nombre}}</td>
                                <td>{{$evidencia->nombre_evidencia}}</td>
                                <td> 
                                  @if($evidencia->id_evid == $evidencia->id_evid )
                                      {{$evidencia->fecha_envio}}
                                  @endif
                                </td>
                                <th>
                                  <a  target="_blank" href="{{$evidencia->arch_evidencia}}" class="btn btn-primary"> <i class=" glyphicon glyphicon-book em128" title="Ver PDF"> </i> Ver evidencia </a>
                                </th>
                              </tr>
                            @endforeach
                          </tbody>
                        </table>
    </div>
  </div>

  </main>
@endsection