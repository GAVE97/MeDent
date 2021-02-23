@extends('layouts.appComun')
@section('title', 'Agregar servicio')

@section('content')
@section('content')
<!-- aqui va la secion de promocion de los servicios-->
<div class="row justify-content-md-center">
    <div class="card text-center w-75 ml-3 mr-3 mb-3 mt-3">
        <div class="card-header"><h4>CITA PENDIENTE</h4></div>
        <div class="card-body">
            <h5 class="card-title">Paciente: {{$Cita->Paciente}}</h5>
            <p class="card-text"> Tipo de cita: {{$Cita->Tipo_de_cita}}<br>Fecha y hora de la cita: {{$Cita->Fecha}}<br></p>
            <a href="/Citas/{{$Cita->id}}/edit" class="btn btn-primary">Editar</a>
                <form class="form-group" method="POST" action="/Citas/{{$Cita->id}}" enctype="multipart/form-data">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger mt-2">Eliminar</button>
                </form>
        </div>
    </div> 
</div>
@endsection
@endsection