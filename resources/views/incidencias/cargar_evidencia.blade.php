@extends('layouts.app')
@section('title', 'Incidencias')
@section('content')
<main class="col-md-12">

   
<div class="row">
    <div class="col-md-5 col-md-offset-4">
     <div class="panel panel-info">
        <div class="panel-heading">
          <h1 class="panel-title text-center">SUBIR EVIDENCIA</h1>
        </div>
     </div>  
    </div>
    <form action="{{url("/incidencias/guardar_evidencia")}}" method="POST" role="form" >

    <div class="row">
     <div class="col-md-10 col-md-offset-2">
        <label>Instrucciones: </label><br>
        <label> Para poder subir la evidencia correspondiente es necesario que su archivo, que desea subir este en formato PDF y que este legible.</label>
    </div>

    /*<div class="row">
            <div class="col-md-5 col-md-offset-3">
            <div class= "dropdown">
              <label for="Tipo_evi">Tipo de evidencia </label>
              <select class="form-control" placeholder="Seleciona una opción" id="id_tipo_evid" name="id_tipo_evid" required>
              <option disabled selected hidden> Selecciona una opción </option>
              @foreach($tipo_evidencia as $tipo_evidencia)
                <option value="{{$tipo_evidencia->id_tipo_evid}}" data-evid="{{$tipo_evidencia->nombre_evidencia}}"> {{$tipo_evidencia->nombre_evidencia}} </option>
                @endforeach
                </select>
                
              </div>
            </div>
            <div class="row">              
    <div class="col-md-5 col-md-offset-3">
                    <span><label for="archivo_subir">Archivo a subir:</label>
                    <input  class="form-control" accept="application/pdf" type="file" name="archivo" required>
                </div> 
                </div> 
        </div>
    
    <div class="row" style="display: inline" id="subir">
                <br>
                <div class="col-md-4 col-md-offset-5 m">
                    <button id="subir_evidencia" type="submit" class="btn btn-success btn-lg">Subir evidencia</button>
                </div>

            </div>
 </form>
</div>
</div>	            
</main>
@endsection