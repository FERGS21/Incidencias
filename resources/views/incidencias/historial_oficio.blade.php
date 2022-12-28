@extends('layouts.app')
@section('title', 'Incidencias')
@section('content')
   
<main class="col-md-12">
    <div class="row"> <form id="form_guardar_solicitud" action="{{url("/incidencias/historial_oficios")}}" method="POST" role="form" >
        <div class="col-md-5 col-md-offset-4">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title text-center">HISTORIAL DE OFICIOS ENVIADOS</h3>
                </div>
            </div>  
        </div>
  </div>
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
    <tbody>
    <table id="tabla_envio" class="table table-bordered table-resposive">
                                <thead >                                     
                                    <th>No.</th> 
                                    <th>Nombre del Solicitante</th>
                                    <th>Articulo aplicado</th>
                                    <th> Descripción Articulo </th>
                                    <th> Fecha requerida</th>
                                    <th> Motivo del oficio</th>  
                                    <th>Imprimir</th>                        
                              </thead>
                              <tbody>
                            @foreach ($solicitud as $solicita)
                            <tr>
                                <td>{{ $solicita->id_solicitud}}</td>
                                <td></td>
                                <td> {{$solicita->nombre_articulo}}</td>
                                <td> 
                                    @if($solicita->id_articulo==1)
                                    {{$solicita->descripcion_art}}
                                    @endif
                                    @if($solicita->id_articulo==2)
                                    {{$solicita->descripcion_art}}
                                    @endif
                                    @if($solicita->id_articulo==3)
                                    {{$solicita->descripcion_art}}
                                    @endif
                                    @if($solicita->id_articulo==4)
                                    {{$solicita->descripcion_art}}
                                    @endif
                                    @if($solicita->id_articulo==5)
                                    {{$solicita->descripcion_art}}
                                    @endif
                                    @if($solicita->id_articulo==6)
                                    {{$solicita->descripcion_art}}
                                    @endif
                                    @if($solicita->id_articulo==7)
                                    {{$solicita->descripcion_art}}
                                    @endif
                                    @if($solicita->id_articulo==8)
                                    {{$solicita->descripcion_art}}
                                    @endif
                                    @if($solicita->id_articulo==9)
                                    {{$solicita->descripcion_art}}
                                    @endif
                                    @if($solicita->id_articulo==10)
                                    {{$solicita->descripcion_art}}
                                    @endif
                                </td>
                                <td>
                                    @if($solicita->id_articulo == 1)
                                        {{$solicita->fecha_req}}
                                    @endif
                                    @if($solicita->id_articulo == 2)
                                        {{$solicita->fecha_req}}
                                    @endif
                                    @if($solicita->id_articulo == 4)
                                        {{$solicita->fecha_req}}
                                    @endif
                                    @if($solicita->id_articulo == 5)
                                        {{$solicita->fecha_req}}
                                    @endif
                                    @if($solicita->id_articulo == 6)
                                        {{$solicita->fecha_req}}
                                    @endif
                                    @if($solicita->id_articulo == 7)
                                        {{$solicita->fecha_req}}
                                    @endif
                                    @if($solicita->id_articulo == 8)
                                        {{$solicita->fecha_req}}
                                    @endif
                                    @if($solicita->id_articulo == 9)
                                        {{$solicita->fecha_req}}
                                    @endif
                                    @if($solicita->id_articulo == 10)
                                        {{$solicita->fecha_req}}
                                    @endif
                                
                                </td>
                               
                                <td>
                                @if($solicita->id_articulo == 1)
                                        {{$solicita->motivo_oficio}}
                                @endif
                                @if($solicita->id_articulo == 2)
                                        {{$solicita->motivo_oficio}}
                                @endif
                                @if($solicita->id_articulo == 3)
                                        {{$solicita->motivo_oficio}}
                                @endif
                                @if($solicita->id_articulo == 4)
                                        {{$solicita->motivo_oficio}}
                                @endif
                                @if($solicita->id_articulo == 5)
                                        {{$solicita->motivo_oficio}}
                                @endif
                                @if($solicita->id_articulo == 6)
                                        {{$solicita->motivo_oficio}}
                                @endif
                                @if($solicita->id_articulo == 7)
                                        {{$solicita->motivo_oficio}}
                                @endif
                                @if($solicita->id_articulo == 8)
                                        {{$solicita->motivo_oficio}}
                                @endif
                                @if($solicita->id_articulo == 9)
                                        {{$solicita->motivo_oficio}}
                                @endif
                                @if($solicita->id_articulo == 10)
                                        {{$solicita->motivo_oficio}}
                                @endif
                                </td>
                                <td><button type="button" class="btn btn-primary center" onclick="window.open('{{url('pdfregistroincidencia')}}')">Imprimir</button></td>

                            </tr>
                            @endforeach
                            
                            </tbody>
                        </table>
    </div>
  </div>
  </main>
 
@endsection