@extends('layouts.appComun')
@section('title', 'Vista de navegación')

@section('content')
<div class="col align-self-center">
    <dic class="row justify-content-md-center">
        <!--  Create   -->
        <a href="{{route('Servicios.create')}}" class="btn btn-primary my-2 mx-2 mt-2 mb-2">Agregar un nuevo servicios</a></br>
        <a href="{{route('Citas.create')}}" class="btn btn-primary my-2 mx-2 mt-2 mb-2">Agendar una nueva citas</a></br>
        <a href="{{route('Insumos.create')}}" class="btn btn-primary my-2 mx-2 mt-2 mb-2">Agregar nuevo insumo al inventario</a></br>
        <a href="{{route('Equipos.create')}}" class="btn btn-primary my-2 mx-2 mt-2 mb-2">Añadir un equipo al inventario</a></br>
    </dic>
    <dic class="row justify-content-md-center">
        <!--  Index   -->
        <a href="{{route('Servicios.index')}}" class="btn btn-primary my-2 mx-2 mt-2 mb-2">Todos los servicios</a></br>
        <a href="{{route('Citas.index')}}" class="btn btn-primary my-2 mx-2 mt-2 mb-2">Lista de citas</a></br>
        <a href="{{route('Insumos.index')}}" class="btn btn-primary my-2 mx-2 mt-2 mb-2">Inventario de insumos</a></br>
        <a href="{{route('Equipos.index')}}" class="btn btn-primary my-2 mx-2 mt-2 mb-2">Inventario de quipos</a></br>
    </dic>
</div>
@endsection