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
                            
                            @if($hist->id_estado_solicitud==1)
                                <td>Enviado</td>
                            @endif
                            @if($hist->id_estado_solicitud==2)
                                <td>Autorizado</td>
                            @endif
                            @if($hist->id_estado_solicitud==3)
                                <td>Rechazado</td>
                            @endif
                            
                        </tr>
                        @endforeach


</table>
</div>
</div>
  </main>


@endsection
