@extends('layouts.app')
@section('title', 'Incidencias')
@section('content')
    
<main class="col-md-12">

   <?php $jefe_division=session()->has('jefe_division')?session()->has('jefe_division'):false;
 $directivo=session()->has('directivo')?session()->has('directivo'):false;
 $consultas=session()->has('consultas')?session()->has('consultas'):false;
    $jefe_personal=session()->has('personal')?session()->has('personal'):false;?>


<div class="row">
        <div class="col-md-5 col-md-offset-4">
    <div class="panel panel-info">
        <div class="panel-heading">
          <h3 class="panel-title text-center">SOLICITUD DE OFICIOS</h3>
        </div>
    </div>  
  </div>

  <div class="col-md-10 col-md-offset-1">
        <form action="/create" method="POST">
            {{csrf_field()}}
            <label>Motivo del oficio de incidencias </label>
             <textarea class="form-control" id="id_motivo" name="motivo_oficio" rows="3" placeholder="Ingresa el motivo del (Utilizar letras mayusculas y minusculas), por ejemplo: Faltar 25 y 26 de Octubre" style=""></textarea>
            </div>
            <br></br>
            <br></br>
            <br></br>
            <br></br>
            
          
            <div class="col-md-10 col-md-offset-1">
            <label >Fecha de solicitud del oficio</label>
            <input type="date"  id="" name="fecha_solicitud" > </input>
</div><br>
<br></br>

            <div class="col-md-5 col-md-offset-1">
            <label for="Tipo_of">Tipo de articulo/clausula aplicada </label>
                <select name="tipo_articulo" id="yipo_articulo" class="form-control" required>
                    <option disabled selected>Selecciona...</option>
                    <option value="1">Cláusula 44°-Día económico para personas con sindicato</option>
                    <option value="2">Artículo 56°-Titulación o Grado</option>
                    <option value="3">Artículo 58°-Lactancia</option>
                    <option value="4">Artículo 61°-Día sin goce de sueldo</option>
                    <option value="5">Artículo 64°-Retardo (Checar despues de la hora)</option>
                    <option value="6">Artículo 68°-Día económico para personas sin sindicato</option>
                    <option value="7">Artículo 69°-Omisión de entrada/salida</option>
                    <option value="8">Artículo 73°-Dias con vacaciones no disfrutadas</option>
                    <option value="9">Artículo 73°-Dias con vacaciones no disfrutadas</option
</select>
                  </div>                            
            <br><br>
            <center>
            <button   class="btn btn-success btn-lg" type="submit" >Solicitar</button>
            </center>
            <br></br>
        </form>
   
  </div>
</div>	
</main>

@endsection
