@extends('layouts.app')
@section('title', 'Registro de Oficios enviados')
@section('content')
    <style type="text/css">

        .btn-circle {

            width: 25px;
            height: 25px;
            text-align: center;
            padding: 3px 0;
            font-size: 12px;
            line-height: 1.428571429;
            border-radius: 15px ;
        }
    </style>
    <main class="col-md-12">
        <div class="row">
            <div class="col-md-9 col-md-offset-1">
                <ul class="nav nav-tabs">
                    <li class="active" ><a href="#">Historial de oficios recibidos</a>
                    </li>
                     <li  > <a href="{{url('/incidencias/validar_oficios')}}">Oficios recibidos para validacion</a></li>
                </ul>
                <br>
            </div>
        </div>

        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <table id="paginar_table" class="table table-bordered table-resposive">
                    <thead>
                     <tr>
                        <th>Numero</th>
                        <th>Nombre del solicitante</th>
                        <th>Fecha de oficio</th>
                        <th>Articulo</th>
                        <th>Motivo</th>
                        <th>Estantus</th>
                     </tr>
                    </thead>
                    <tbody>
                        @foreach($solicitudes as $solicitud)
                            @if($solicitud->id_estado_solicitud==2)
                            <tr>
                                <th>{{$solicitud->id_solicitud}}</th>
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
                                    @for( $articulo=1; $articulo <=10 ; $articulo++)
                                        @if($solicitud->id_articulo == $articulo)
                                            {{$solicitud->motivo_oficio}}
                                        @endif
                                    @endfor
                                </th>
                                <th>Aceptado</th>
                            </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>



@endsection