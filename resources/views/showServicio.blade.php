@extends('layouts.appComun')
@section('title', 'Agregar servicio')

@section('content')

<!-- INDICACIONES DE LA VISTA-->
<div class="container-sm alert alert-primary" role="alert">
  <h4 class="alert-heading">AÑADIR UN NUEVO SERVICIO DENTAL</h4>
  <p> EN esta seccion se deberan agregar los datos de un servicio nuevo que se ofresca a los pacientes</p>
  <hr>
  <p class="mb-0"> ¡Sea cuidadoso! verifique los datos antes de guardar.</p>
</div>

<!-- Formulario para agregar equipo -->
<form class="form-group" method="POST" action="/Servicios" enctype="multipart/form-data">
@csrf

<!-- Información del equipo-->
<div class="container-sm">
    
    <div class="col"> 
        <label class="mt-2">Nombre del servicio</label>
        <input type="string" name="ID_inventario" pattern="[A-Z a-z 0-9 áéíóúÑñüäàè\s]*" class="form-control" placeholder="Número de identificación de inventario" required>

        <label class="mt-2">Descripción</label>
        <input type="string" name="Nombre" pattern="[A-Z a-z áéíóúÑñüäàè\s]*"  class="form-control" placeholder="Nombre del equipo" required>
        
        <label class="mt-2">Precio</label>
        <input type="string" name="Area" pattern="[0-9]"  class="form-control" placeholder="Área de asignada para el equipo" required>
        
        <div class="row justify-content-md-center">
            <div class="col-md-auto" aling="text-center"><br/>
                <label>Imagen del servicio</label> <br/>
                <input type="file" name="imagenEquipo" required><br/><br/>
            </div>           
        </div>
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