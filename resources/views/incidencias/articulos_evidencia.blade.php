@extends('layouts.app')
@section('title','Incidencias')
@section('content')

<main class="col-md-12">
    <div class="row"> <form id="form_historial_solicitud" action="{{url("")}}" method="POST" role="form" >
        <div class="col-md-5 col-md-offset-4">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title text-center">ARTICULOS QUE NECESITAN EVIDENCIA</h3>
                </div>
            </div>  
        </div>
  </div>
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
    <tbody>
    <table id="tabla_articulos_evidencia" class="table table-bordered table-resposive">
                            <thead >                                     
                                    <th>No.</th> 
                                    <th> Articulo que necesita evidencia</th>
                                    <th>Agregar evidencia</th>
                            <tbody>
                            <tr>
                            <td>1</td>
                            <td>Artículo 56°-Titulación o Grado</td>
                            <td> <a class="btn btn-primary" href="{{url('incidencias/cargar_evidencia')}}">Agregar</a> </td>
                        </tr>
</table>
</div>
</div>                       

  </main>


@endsection