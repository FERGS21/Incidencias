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
    <div class="col-md-8 col-md-offset-2">
                <table id="tabla_envio" class="table table-bordered table-resposive">
                    <thead>
                    <tr class="text-center">
                        <th class="text-center">Numero</th>
                        <th class="text-center">Nombre del solicitante</th>
                        <th class="text-center">Fecha  oficio</th>
                        <th class="text-center">Ver oficio</th>
                        <th class="text-center">Evaluar oficio</th>
                    </tr>
                    </thead>
                </table>
    </div>
  </div>

  </main>
@endsection