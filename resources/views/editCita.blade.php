@extends('layouts.appComun')
@section('title', 'Editar cita')

@section('content')
<!-- INDICACIONES DE LA VISTA-->
<div class="container-sm alert alert-primary" role="alert">
  <h4 class="alert-heading">EDITAR CITA</h4>
  <p> Usted puede agendar su propia cita en los dias y horarios disponibles</p>
  <hr>
  <p class="mb-0"> ¡Sea cuidadoso! verifique los datos antes de guardar.</p>
</div>

<!-- Formulario para agregar equipo -->
<form class="form-group" method="POST" action="/Citas/{{$Cita->id}}" enctype="multipart/form-data">
@method('PUT')
@csrf

<!-- Información del equipo-->
<div class="container-sm">
    
    <div class="col"> 
        <label class="mt-2">Nombre del paciente</label>
        <input type="string" name="Paciente" pattern="[A-Z a-z 0-9 áéíóúÑñüäàè\s]*" class="form-control" value="Paciente" required>

        <label class="mt-2">Razon de la cita</label>
        <input type="string" name="Tipo_de_cita" pattern="[A-Z a-z áéíóúÑñüäàè\s]*"  class="form-control" value="Tipo_de_cita" required>
        
        <label class="mt-2">Fecha y hora</label>
        <input size="16" name="Fecha" type="datetime-local" class="form-control" required>
        <br/><br/><br/>
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