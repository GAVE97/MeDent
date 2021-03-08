<?php

namespace App\Http\Controllers;

use App\Models\cita;
use Illuminate\Http\Request;
use App\Models\servicio;
use Brian2694\Toastr\Facades\Toastr;

class citaCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(! $request->user()){
            Toastr::warning('Es necesario iniciar sesión para validar el acceso a los datos', 'Acceso denegado');
            return view('auth.login');
        } elseif($request->user()->authorizeRole('Admin')) {
          $Citas=cita::all();
        return view('indexCita', compact('Citas'));  
        } else {
            Toastr::error('Su perfil de usuario no cumple con los permisos requeridos para ver el inventario de equipos.', 'Acceso denegado');
            return view('Nav'); 
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if(! $request->user()){
            Toastr::warning('Es necesario iniciar sesión para validar el acceso a los datos', 'Acceso denegado');
            return view('auth.login');
        } elseif($request->user()->authorizeRole('Admin')) {
            return view('newCita'); 
        } else {
            Toastr::error('Su perfil de usuario no cumple con los permisos requeridos para ver el inventario de equipos.', 'Acceso denegado');
            return view('Nav'); 
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newCita = new cita();
        $newCita->Paciente = $request->input('Paciente');
        $newCita->Telefono = $request->input('Telefono');
        $newCita->Tipo_de_cita = $request->input('Tipo_de_cita');
        $newCita->Fecha = $request->input('Fecha');
        $newCita->save();
        Toastr::success('Los datos de la cita fueron guardados satisfactoriamente', 'Creado con exito!!');
        return view('indexCita');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $Cita=cita::find($id);
        if($request->user()->name == $Cita->Paciente){
            return('Prueba exitosa');
        }
        elseif(! $request->user()){
            Toastr::warning('Es necesario iniciar sesión para validar el acceso a los datos', 'Acceso denegado');
            return view('auth.login');
        } elseif($request->user()->authorizeRole('Admin')) {
            return view('showCita', compact('Cita'));  
        } else {
            Toastr::error('Su perfil de usuario no cumple con los permisos requeridos para ver el inventario de equipos.', 'Acceso denegado');
            return view('Nav'); 
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        if(! $request->user()){
            Toastr::warning('Es necesario iniciar sesión para validar el acceso a los datos', 'Acceso denegado');
            return view('auth.login');
        } elseif($request->user()->authorizeRole('Admin')) {
            $Cita=cita::find($id);
            return view('editCita', compact('Cita'));  
        } else {
            Toastr::error('Su perfil de usuario no cumple con los permisos requeridos para ver el inventario de equipos.', 'Acceso denegado');
            return view('Nav'); 
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Cita = cita::find($id);
        $Cita->fill($request);
        $Cita->save();
        Toastr::success('Los datos de la cita fueron editados satisfactoriamente', 'Editado con exito!!');
        return view('Nav');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if(! $request->user()){
            Toastr::warning('Es necesario iniciar sesión para validar el acceso a los datos', 'Acceso denegado');
            return view('auth.login');
        } elseif($request->user()->authorizeRole('Admin')) {
            $Cita = cita::find($id);
            $Cita->delete();Toastr::success('La cita fue eliminada satisfactoriamente', 'Eliminado con exito!!');
            return view('Nav');  
        } else {
            Toastr::error('Su perfil de usuario no cumple con los permisos requeridos para ver el inventario de equipos.', 'Acceso denegado');
            return view('Nav'); 
        }
        
    }
}
