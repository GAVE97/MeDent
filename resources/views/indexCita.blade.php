@extends('layouts.appComun')
@section('title', 'Todas las citas')

@section('search')
<form action="{{route('filtrarCitas')}}" class="form-inline my-2 my-lg-0" method="POST">
	@csrf
  <input class="form-control mr-sm-2" name="valor" id="valor" type="search" placeholder="Filtrar por..." aria-label="Search" aling="center">
  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
</form>
@endsection

@section('content')
<!-- aqui va la secion de promocion de los servicios-->
<div class="row justify-content-md-center">
    @foreach($Citas as $Cita)
        <div class="card text-center w-75 ml-3 mr-3 mb-3 mt-3">
        <div class="card-header"><h4>CITA PENDIENTE</h4></div>
            <div class="card-body">
                <h5 class="card-title">Paciente: {{$Cita->Paciente}}</h5>
                <p class="card-text"> Tipo de cita: {{$Cita->Tipo_de_cita}}<br>Número del paciente: {{$Cita->Telefono}}<br>Fecha y hora de la cita: {{$Cita->Fecha}}<br></p>
                <a href="/Citas/{{$Cita->id}}" class="btn btn-primary">Mas opciones...</a>
            </div>
        </div>
    @endforeach  
</div>
@endsection