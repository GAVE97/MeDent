<?php

namespace App\Http\Controllers;

use App\Models\equipo;
use App\Models\servicio;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class equipoCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $Equipos=equipo::all();
        
        if(! $request->user()){
            Toastr::warning('Es necesario iniciar sesión para validar el acceso a los datos', 'Acceso denegado');
            return view('auth.login');
        } elseif($request->user()->authorizeRole('Admin')) {
            return view('indexEquipo', compact('Equipos'));
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
            Toastr::warning('Es necesario iniciar sesión para validar el acceso a los datos, en caso de no estar registrado es necesario hacer clic en la esquina ruperior derecha en "Registrar"', 'Acceso denegado');
            return view('auth.login');
        } elseif($request->user()->authorizeRole('Admin')) {
            return view('newEquipo');
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
        if($request->hasFile('imagenEquipo')){
            $file = $request->file('imagenEquipo');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/imgInv/', $name);
        }
            $newEquipo = new equipo();
            $newEquipo->Nombre = $request->input('Nombre');
            $newEquipo->Area = $request->input('Area');
            $newEquipo->Tipo = $request->input('Tipo');
            $newEquipo->Marca = $request->input('Marca');
            $newEquipo->Modelo = $request->input('Modelo');
            $newEquipo->Num_de_serie = $request->input('Num_de_serie');
            $newEquipo->Ubicacion = $request->input('Ubicacion');
            $newEquipo->Estatus = $request->input('Estatus'); 
            $newEquipo->vencimientoGarantia = $request->input('vencimientoGarantia');
            $newEquipo->Consumo_electrico = $request->input('Consumo_electrico');
            $newEquipo->imagenEquipo = $request->input('imagenEquipo');
            $newEquipo->imagenEquipo = $name;
            $newEquipo->save();
            Toastr::success('Los datos del equipo fueron guardados satisfactoriamente', 'Creado con exito!!');
        return view('indexEquipo');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        if(! $request->user()){
            Toastr::warning('Es necesario iniciar sesión para validar el acceso a los datos', 'Acceso denegado');
            return view('auth.login');
        } elseif($request->user()->authorizeRole('Admin')) {
            $Equipo=equipo::find($id);
            return view('showEquipo', compact('Equipo'));
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
            $Equipo=equipo::find($id);
            return view('editEquipo', compact('Equipo'));
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
        $Equipo = equipo::find($id);
        $Equipo->fill($request->except('imagenEquipo'));
        if($request->hasFile('imagenEquipo')){
            $file = $request->file('imagenEquipo');
            $name = time().$file->getClientOriginalName();
            $Equipo->imagenEquipo = $name;
            $file->move(public_path().'/imgInv/', $name);
        }
        $Equipo->save();
        Toastr::success('El equipo ha sido actualizado con exito', 'Editado con exito!!');
        return view('indexEquipo');
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
            $Equipo = equipo::find($id);
            $Equipo->delete();
            Toastr::success('El equipo ha sido eliminado con exito', 'Eliminado con exito!!');
            return view('indexEquipo');
        } else {
            Toastr::error('Su perfil de usuario no cumple con los permisos requeridos para ver el inventario de equipos.', 'Acceso denegado');
            return view('Nav'); 
        }

    }
}
