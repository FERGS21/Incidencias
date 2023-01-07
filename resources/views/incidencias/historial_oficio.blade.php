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
            <div class="col-md-10 col-md-offset-1">
                <table id="table_enviado1" class="table table-bordered table-resposive">
                    <thead>
                     <tr>
                                    <th>No.</th> 
                                    <th>Nombre del Solicitante</th>
                                    <th>Articulo aplicado</th>
                                    <th>Descripcion de articulo</th>
                                    <th> Fecha requerida</th>
                                    <th> Motivo del oficio</th>  
                                    <th>Imprimir</th>   
                     </tr>
                    </thead>
                    <tbody>
                        
                        @foreach($solicitud as $solicita)
                        @if( $solicita->id_estado_solicitud==2)
                        <tr>
                            <th>{{ $solicita->id_solicitud}}</th>
                            <th>{{$solicita->nombre}}</th>
                            <th>
                                @for($articulo=1; $articulo<=10; $articulo++)
                                    @if($solicita->id_articulo==$articulo)
                                        {{$solicita->nombre_articulo}}
                                    @endif
                                @endfor
                            </th>
                            <th>
                                @for($articulo=1; $articulo<=10; $articulo++)
                                    @if($solicita->id_articulo==$articulo)
                                        {{$solicita->descripcion_art}}
                                    @endif
                                @endfor     
                            </th>
                            <th>
                                @for($articulo=1; $articulo<=10; $articulo++)
                                    @if($solicita->id_articulo==$articulo)
                                        {{$solicita->fecha_req}}
                                    @endif
                                @endfor
                            </th>
                            <th>
                                @for($articulo=1; $articulo<=10; $articulo++)
                                    @if($solicita->id_articulo==$articulo)
                                        {{$solicita->motivo_oficio}}
                                    @endif
                                @endfor
                            </th>
                            <th>
                                @if($solicita->id_articulo==1 || $solicita->id_articulo==9)
                                <button type="button" class="btn btn-primary center" onclick="window.open('{{url('pdfregistroincidencia',['id_solicitud'=>$solicita->id_solicitud])}}')">Imprimir</button>
                                @endif
                                @if($solicita->id_articulo==2 || $solicita->id_articulo==4 || $solicita->id_articulo==5 ||$solicita->id_articulo==6  || $solicita->id_articulo==7 || $solicita->id_articulo==8 || $solicita->id_articulo==10)
                                <button type="button" class="btn btn-primary center" onclick="window.open('{{url('pdfregistroincidencia1',['id_solicitud'=>$solicita->id_solicitud])}}')">Imprimir</button>
                                @endif
                            </th>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
</main>

@endsection