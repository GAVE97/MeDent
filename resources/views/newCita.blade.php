@extends('layouts.appComun')
@section('title', 'Agendar una cita')

@section('scripts')

@endsection
@section('content')

<!-- INDICACIONES DE LA VISTA-->
<div class="container-sm alert alert-primary" role="alert">
  <h4 class="alert-heading">AGENDAR UNA NUEVA CITA</h4>
  <p> Usted puede agendar su propia cita en los dias y horarios disponibles</p>
  <hr>
  <p class="mb-0"> ¡Sea cuidadoso! verifique los datos antes de guardar.</p>
</div>

<!-- Formulario para agregar equipo -->
<form class="form-group" method="POST" action="/Citas" enctype="multipart/form-data">
@csrf

<!-- Información del equipo-->
<div class="container-sm">
    
    <div class="col"> 
        
        <label class="mt-2">Número telefónico</label>
        <input type="string" name="Telefono" pattern="[0-9]*" class="form-control" placeholder="Coloque su número telefonico para contactarlo" required>

        <label class="mt-2">Razon de la cita</label>
        <input type="string" name="Tipo_de_cita" pattern="[A-Z a-z áéíóúÑñüäàè\s]*"  class="form-control" placeholder="Consulta, caries, extracción" required>
        
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