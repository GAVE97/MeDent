@extends('layouts.appComun')
@section('title', 'Todos los servicio')



@section('content')
<!-- aqui va la secion de promocion de los servicios-->
<div class="row justify-content-md-center">
    @foreach($Servicios as $Servicio)
        <div class="card ml-3 mr-3 mb-3 mt-3" style="max-width: 540px;">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="../imgSrv/{{$Servicio->imagenServicio}}" class="card-img" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{$Servicio->Nombre_serv}}</h5>
                        <p class="card-text"> Descripción: {{$Servicio->Descripcion}}<br>Costo: ${{$Servicio->Precio}}<br></p>
                        <a href="/Servicios/{{$Servicio->id}}" class="btn btn-primary">Ir al servicio</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach  
</div>
@endsection