@extends('layouts.appComun')
@section('title', 'Agregar servicio')

@section('content')

<!-- INDICACIONES DE LA VISTA-->
<div class="container-sm alert alert-primary" role="alert">
  <h4 class="alert-heading">AÑADIR UN NUEVO EQUIPO DENTAL</h4>
  <p> EN esta seccion se deberan agregar los datos de un servicio nuevo que se ofresca a los pacientes</p>
  <hr>
  <p class="mb-0"> ¡Sea cuidadoso! verifique los datos antes de guardar.</p>
</div>

<!-- Formulario para agregar equipo -->
<form class="form-group" method="POST" action="/Equipos" enctype="multipart/form-data">
@csrf

<!-- Información del equipo-->
<div class="container-sm">
    
    <div class="row">
    <div class="col"> 

        <label class="mt-2">Nombre</label>
        <input type="string" name="Nombre" pattern="[A-Z a-z áéíóúÑñüäàè\s]*"  class="form-control" placeholder="Nombre del equipo" required>
        
        <label class="mt-2">Área</label>
        <input type="string" name="Area" pattern="[A-Z a-z 0-9 áéíóúÑñüäàè\s]*"  class="form-control" placeholder="Área de asignada para el equipo" required>
        
        <label class="mt-2">Tipo de equipo</label>
        <input type="string" name="Tipo" pattern="[a-zA-Z0-9._%+-  áéíóúÑñüäàè\s]*"  class="form-control" placeholder="Tipo de equipo" required>

        <label class="mt-2">Marca</label>
        <input type="string" name="Marca" pattern="[a-zA-Z0-9._%+-  áéíóúÑñüäàè\s]*"  class="form-control" placeholder="Marca del equipo" required>

        <label class="mt-2">Modelo</label>
        <input type="string" name="Modelo" pattern="[a-zA-Z0-9._%+-  áéíóúÑñüäàè\s]*" class="form-control" placeholder="Modelo del equipo" required>
    
    </div>
    <div class="col">

        <label class="mt-2">Número de serie</label>
        <input type="string" name="Num_de_serie" pattern="[A-Z a-z 0-9 áéíóúÑñüäàè\s]*"  class="form-control" placeholder="Número de serie proporcionado por el fabricante" required>

        <label class="mt-2">Ubicación</label>
        <input type="string" name="Ubicacion" pattern="[A-Za-z0-9._%+-  áéíóúÑñüäàè\s]*"  class="form-control" placeholder="Ubicación física en el centro de atención sanitaria" required>

        <label class="mt-2">Estatus operativo</label> <!-- que tenga dos opciones -->
        
        <div class="row ml-4 mb-2">
            <div class="col mt-2">
                <input class="form-check-input" type="radio" name="Estatus" value="Activo" checked required>
                <label class="form-check-label" for="exampleActivo">Activo</label>
            </div>
            <div class="col mt-2">
                <input class="form-check-input" type="radio" name="Estatus"  value="Inactivo" required>
                <label class="form-check-label" for="exampleInactivo">Inactivo</label>
            </div>
        </div>

        <label class="mt-2">Garantía</label> <!-- que tenga fecha -->
        <div class="row ml-2 mb-2">
        <label for="start">Fecha de vencimiento de la Garantia:</label>
        <input type="date" min=
        <?php 
        echo date('Y-m-d'); 
        ?> id="start" name="vencimientoGarantia" required>
       </div>



        <label class="mt-2">Alimentación</label> <!-- que tenga opciones 220-110-380 -->
        <form class="form-inline">
        <label class="mr-4" for="inlineFormCustomSelectPref">Preferente</label>
        <select class="custom-select mr-sm-4" type="string" name="Consumo_electrico" id="inlineFormCustomSelectPref" required>
         <option value="110V">110V</option>
         <option value="220V">220V</option>
         <option value="380V">380V</option>
         <option value="N/A">No aplicable</option>
         </select>

    
    </div>
    </div> 
      
    <!-- Guardado de imagen del equipo -->
    <div class="row justify-content-md-center">
    <div class="col-md-auto" aling="text-center"><br/>
        <label>Foto del equipo</label> <br/>
    </div>           
    </div>

    <div class="row justify-content-md-center">
    <div class="col-md-auto" aling="text-center">
        <input type="file" name="imagenEquipo" required> <br/> <br/>
    </div>           
    </div>

    <div class="row justify-content-md-center">
    <div class="col-md-auto" aling="text-center">
        <button type="submit" class="btn btn-primary">Guardar</button>   
    </div>           
    </div>
</div>
</form>
@endsection