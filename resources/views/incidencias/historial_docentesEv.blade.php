@extends('layouts.app')
@section('title','Incidencias')
@section('content')

<main class="col-md-12">
    <div class="row"> <form id="form_historial_solicitud" action="{{url("")}}" method="POST" role="form" >
        <div class="col-md-5 col-md-offset-4">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title text-center">HISTORIAL DE EVIDENCIAS DOCENTES</h3>
                </div>
            </div>  
        </div>
  </div>

  <div class="row">
    <div class="col-md-8 col-md-offset-2">
        <table id="tabla_historial_docentes" class="table table-bordered table-resposive" align="center">
                <thead >                                     
                    <th>No.</th> 
                    <th>Evidencia aplicada</th>
                    <th>Fecha de envio</th>    
                    <th>Ver evidencia</th>                   
                </thead>
                <tbody>
                @foreach ($histEvi as $evidhist)
                    <tr>
                        <td>{{$evidhist->id_evid}} </td>
                        <td>{{$evidhist->nombre_evidencia}}</td>
                        <td> @if($evidhist->id_evid == $evidhist->id_evid )
                                      {{$evidhist->fecha_envio}}
                                  @endif
                        </td>
                        <th>
                            <a  target="_blank" href="{{$evidhist->arch_evidencia}}" class="btn btn-primary"> <i class=" glyphicon glyphicon-book em128" title="Ver PDF"> </i> Ver evidencia </a>
                        </th>

                    </tr>
                @endforeach
            <tbody>
        </table>
    </div>
  </div>
</main>
@endsection