@extends('layouts.appComun')
@section('title', 'Agregar servicio')

@section('content')

<!-- INDICACIONES DE LA VISTA-->
<div class="container-sm alert alert-primary" role="alert">
  <h4 class="alert-heading">AÑADIR UN NUEVO INSUMO DENTAL</h4>
  <p> En esta seccion se deberan agregar los insumos que son utilizadons en la clinica</p>
  <hr>
  <p class="mb-0"> ¡Sea cuidadoso! verifique los datos antes de guardar.</p>
</div>

<!-- Formulario para agregar equipo -->
<form class="form-group" method="POST" action="/Insumos" enctype="multipart/form-data">
@csrf

<!-- Información del equipo-->
<div class="container-sm">
    
    <div class="col"> 
        <label class="mt-2">Nombre</label>
        <input type="string" name="Nombre" pattern="[A-Z a-z áéíóúÑñüäàè\s]*"  class="form-control" placeholder="Nombre del insumo" required>
        
        <label class="mt-2">Tipo</label>
        <input type="string" name="Tipo" pattern="[A-Z a-z áéíóúÑñüäàè\s]*"  class="form-control" placeholder="Tipo de insumo" required>
        
        <label class="mt-2">Cantidad</label>
        <input type="string" name="Cantidad" pattern="[0-9]*"  class="form-control" placeholder="Cantidad (piezas, mililitros, miligramos, etc.)" required>
        
        <label class="mt-2">Caducidad</label> <!-- que tenga fecha -->
        <div class="row ml-2 mb-2">
        <input type="date" min=<?php echo date('Y-m-d'); ?> id="start" name="Caducidad" required>

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