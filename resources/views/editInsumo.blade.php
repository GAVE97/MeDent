@extends('layouts.appComun')
@section('title', 'Editar insumo')

@section('content')
<!-- INDICACIONES DE LA VISTA-->
<div class="container-sm alert alert-primary" role="alert">
  <h4 class="alert-heading">EDITAR INSUMO DENTAL</h4>
  <p> En esta seccion se deberan editar los insumos que son utilizadons en la clinica</p>
  <hr>
  <p class="mb-0"> ¡Sea cuidadoso! verifique los datos antes de guardar.</p>
</div>

<!-- Formulario para agregar equipo -->
<form class="form-group" method="POST" action="/Insumos/{{$Insumo->id}}" enctype="multipart/form-data">
@method('PUT')
@csrf
<!-- Información del equipo-->
<div class="container-sm">
    
    <div class="col"> 
        <label class="mt-2">Nombre</label>
        <input type="string" name="Nombre" pattern="[A-Z a-z áéíóúÑñüäàè\s]*"  class="form-control" value="{{$Insumo->Nombre}}" required>
        
        <label class="mt-2">Tipo</label>
        <input type="string" name="Tipo" pattern="[A-Z a-z áéíóúÑñüäàè\s]*"  class="form-control" value="{{$Insumo->Tipo}}" required>
        
        <label class="mt-2">Cantidad</label>
        <input type="string" name="Cantidad" pattern="[0-9]*"  class="form-control" value="{{$Insumo->Cantidad}}" required>
        
        <label class="mt-2">Caducidad</label> <!-- que tenga fecha -->
        <div class="row ml-2 mb-2">
        <input type="date" min=
        <?php 
        echo date('Y-m-d'); 
        ?> id="start" name="Caducidad" value="{{$Insumo->Caducidad}}" required>

        <!-- Guardado de imagen del equipo -->
        <div class="row justify-content-md-center">
            <div class="col-md-auto" aling="text-center">
                <button type="submit" class="btn btn-primary">Guardar</button>   
            </div>           
        </div>
    </div>
</div>
</form>
@endsection