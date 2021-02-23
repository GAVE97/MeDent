@extends('layouts.appComun')
@section('title', 'Editar servicio')

@section('content')
<!-- INDICACIONES DE LA VISTA-->
<div class="container-sm alert alert-primary" role="alert">
  <h4 class="alert-heading">EDITAR UN SERVICIO DENTAL</h4>
  <p> EN esta seccion se deberan agregar los cambios a los datos de un servicio existente que se ofresca a los pacientes</p>
  <hr>
  <p class="mb-0"> ¡Sea cuidadoso! verifique los datos antes de guardar.</p>
</div>

<!-- Formulario para agregar equipo -->
<form class="form-group" method="POST" action="/Servicios/{{$Servicio->id}}" enctype="multipart/form-data">
@method('PUT')
@csrf
<!-- Información del equipo-->
<div class="container-sm">
    
    <div class="col"> 
        <label class="mt-2">Nombre del servicio</label>
        <input type="string" name="Nombre_serv" pattern="[A-Z a-z 0-9 áéíóúÑñüäàè\s]*" class="form-control" value="{{$Servicio->Nombre_serv}}" required>

        <label class="mt-2">Descripción</label>
        <input type="string" name="Descripcion" pattern="[A-Z a-z áéíóúÑñüäàè\s]*"  class="form-control" value="{{$Servicio->Descripcion}}"  required>
        
        <label class="mt-2">Precio</label>
        <input type="string" name="Precio" pattern="[0-9]{1,20}"  class="form-control" value="{{$Servicio->Precio}}" required>
        
        <div class="row justify-content-md-center">
            <div class="col-md-auto" aling="text-center"><br/>
                <label>Imagen del servicio</label> <br/>
                <input type="file" name="imagenServicio"><br/><br/>
            </div>           
        </div>
        <!-- Guardado de imagen del equipo -->
        <div class="row justify-content-md-center">
            <div class="col-md-auto"  >
                <button type="submit" class="btn btn-primary">Guardar</button>   
            </div>           
        </div>
    </div>
</div>
</form>
@endsection