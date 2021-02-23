@extends('layouts.appComun')
@section('title', 'Todos los insumos')

@section('content')
<!-- aqui va la secion de promocion de los servicios-->
<div class="row justify-content-md-center">
    @foreach($Insumos as $Insumo)
    <div class="card textcenter w-50 ml-3 mr-3 mb-3 mt-3" style="max-width: 540px;">
            <div class="row no-gutters">
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{$Insumo->Nombre}}</h5>
                        <p class="card-text"> Tipo: {{$Insumo->Tipo}}<br>Cantidad: {{$Insumo->Cantidad}}<br>Caducidad: {{$Insumo->Caducidad}}<br></p>
                        <a href="/Insumos/{{$Insumo->id}}" class="btn btn-primary">Ir al Insumo</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach  
</div>
@endsection