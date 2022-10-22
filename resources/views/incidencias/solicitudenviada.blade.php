@extends('layouts.app')
@section('title', 'Incidencias')
@section('content')

<main class="col-md-12">
        <div class="row">
            <div class="col-md-9 col-md-offset-1">
            <ul class="nav nav-tabs">
                <li>
                    <a href="{{url('/incidencias/oficio_enviado')}}">SOLICITUD DE OFICIOS</a>
                </li>
                <li class="active"><a href="#">Oficios enviados</a></li>

            </ul>
                <br>
            </div>
        </div>
</main>
@endsection