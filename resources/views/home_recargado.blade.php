@extends('layouts.app')
@section('title', 'Inicio')
@section('content')
<?php
	$men=Session::get('men');
	$fecha=Session::get('fecha');
	$profesor_men=session()->has('profesor_men')?session()->has('profesor_men'):false;
     $jefe_division=session()->has('jefe_division')?session()->has('jefe_division'):false;
     $directivo=session()->has('directivo')?session()->has('directivo'):false;
            
?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
				@if($jefe_division == true || $directivo == true)
					<div class="panel panel-success">
					<div class="panel-heading" style="text-align: center">ATENCION: !!!!El modulo de RETICULA y DOCENTE se cambio a Generales en el submenu ACADEMICO!!</div>
					</div>
				@endif
            	@if($profesor_men==true)
	                <div class="panel-heading">{{$men}}</div>
	                <div class="panel-heading">NOTA:
	                	La última fecha de liberación de Actividades Complementarias es el {{$fecha}}</div>
            	@else
            		<div class="panel-heading">{{$men}}</div>
            	@endif
            </div>
        </div>
    </div>
</div>
@endsection
