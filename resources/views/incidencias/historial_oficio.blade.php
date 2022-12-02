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
        <table id="tabla_envio" class="table table-bordered table-resposive">
            <thead>
                <tr class="text-center">
                    <th class="text-center">Numero de oficio</th>
                    <th class="text-center">Articulo aplicado</th>
                    <th class="text-center">Descripcion del articulo</th>
                    <th class="text-center">Fecha requerida oficio</th>
                    <th class="text-center">Estado de oficio</th>
                    <th class="text-center">Imprimir</th>
                </tr>
                <tr>
                    <th></th>
      
                    <th></th>
                    <th></th>
                    <th>
                        
                    </th>
                    <th>
                        <td> 
                            <button type="button" class="btn btn-primary center" onclick="window.open('{{url('pdfregistroincidencia')}}')">Imprimir</button>
                        </td>
                    </th>
                </tr>
            </thead>

        </table>
    </div>
  </div>
  </main>
 
@endsection