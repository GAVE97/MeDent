@extends('layouts.appComun')
@section('title', 'Todas las citas')

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