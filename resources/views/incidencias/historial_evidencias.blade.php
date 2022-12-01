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
                  <thead>
                    <tr class="text-center">
                        <th class="text-center">Numero de evidencia</th>
                        <th class="text-center">Tipo de evidencia</th>
                        <th class="text-center">Fecha de envio de evidencia</th>
                        <th class="text-center">Archivo enviado</th>
                    </tr>
                  </thead>
                </table>
    </div>
  </div>

  </main>
@endsection