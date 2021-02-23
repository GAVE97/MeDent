@extends('layouts.appComun')
@section('title', 'Mostrar insumo')

@section('content')
<div class="row justify-content-md-center">
    <div class="col align-self-center">
        <h5 class="">{{$Insumo->Nombre}}</h5>
        <p class=""> Tipo: {{$Insumo->Tipo}}<br> Cantidad: {{$Insumo->Cantidad}}<br>Caducidad: {{$Insumo->Caducidad}}<br></p>
    </div>
    <div class="col align-self-end">
        <a href="/Insumos/{{$Insumo->id}}/edit" class="btn btn-primary mx-2 my-2 mb-2">Editar</a>

            <form class="form-group" method="POST" action="/Insumos/{{$Insumo->id}}" enctype="multipart/form-data">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger mx-2 my-2 mt-2">Eliminar</button>
            </form>
    </div>
</div>
@endsection