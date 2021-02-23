@extends('layouts.appComun')
@section('title', 'Mostrar servicio')

@section('content')

<div class="row justify-content-md-center">
    <div class="col">
        <img src="../../imgSrv/{{$Servicio->imagenServicio}}" height="500" width="500" alt="Imagen no soportada por el navegador">
    </div>
    <div class="col align-self-center">
        <h5 class="">{{$Servicio->Nombre_serv}}</h5>
        <p class=""> Descripción: {{$Servicio->Descripcion}}<br>
                                                        Costo: ${{$Servicio->Precio}}<br>        
        </p>
    </div>
    <div class="col align-self-end">
        <a href="/Servicios/{{$Servicio->id}}/edit" class="btn btn-primary mx-2 my-2 mb-2">Editar</a>

            <form class="form-group" method="POST" action="/Servicios/{{$Servicio->id}}" enctype="multipart/form-data">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger mx-2 my-2 mt-2">Eliminar</button>
            </form>
    </div>
</div>
@endsection