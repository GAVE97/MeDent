@extends('layouts.appComun')
@section('title', 'Todos los servicio')

@section('search')
<form action="{{route('filtrarServicios')}}" class="form-inline my-2 my-lg-0" method="POST">
	@csrf
  <input class="form-control mr-sm-2" name="valor" id="valor" type="search" placeholder="Filtrar por..." aria-label="Search" aling="center">
  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
</form>
@endsection

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