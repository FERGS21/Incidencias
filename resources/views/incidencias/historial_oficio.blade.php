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
                                    <th>Articulo</th>
                                    <th> Descripción Articulo </th>
                                    <th> Fecha requerida</th>
                                    <th> Ver oficio</th>  
                                    <th> Estado de oficio</th> 
                                    <th>Imprimir</th>                        
                              </thead>
                              <tbody>
                            @foreach ($solicitud as $solicita)
                            <tr>
                                <td>{{ $solicita->id_solicitud}}</td>
                                <td> {{$solicita->nombre_articulo}}</td>
                                <td> 
                                    @if($solicita->id_articulo==1)
                                    {{$solicita->descripcion_art}}
                                    @endif
                                </td>
                                <td>
                                    
                                    @if($solicita->id_articulo == 1)
                                        {{$solicita->fecha_req}}
                                    @elseif($solicita->id_articulo ==2)
                                        {{$solicita->fecha_req}}
                                    @endif
                                
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            @endforeach
                            
                            </tbody>
                        </table>
    </div>
  </div>
  </main>
 
@endsection