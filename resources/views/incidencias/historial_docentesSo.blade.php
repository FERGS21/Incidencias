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
                                    <th>Descripción Articulo </th>
                                    <th>Fecha solicitada</th>
                                    <th>Solicitado a</th>
                                    <th>Estado de oficio</th>
                            </thead>
                            <tbody>
                         
                         <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td> </td>
                        </tr>
                      


</table>
</div>
</div>
  </main>


@endsection
