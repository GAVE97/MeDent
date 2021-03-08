<?php

namespace App\Http\Controllers;

use App\Models\insumo;
use Illuminate\Http\Request;
use App\Models\servicio;
use Brian2694\Toastr\Facades\Toastr;

class insumoCtrl extends Controller
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
            $Insumos=insumo::all();
            return view('indexInsumo', compact('Insumos'));  
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
            return view('newInsumo');  
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
            $newInsumo = new insumo();
            $newInsumo->Nombre = $request->input('Nombre');
            $newInsumo->Tipo = $request->input('Tipo');
            $newInsumo->Cantidad = $request->input('Cantidad');
            $newInsumo->Caducidad = $request->input('Caducidad');
            $newInsumo->save();
            Toastr::success('Los datos del insumo fueron guardados satisfactoriamente', 'Creado con exito!!');
        return view('indexInsumo');
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
            $Insumo=insumo::find($id);
            return view('showInsumo', compact('Insumo'));  
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
            $Insumo=insumo::find($id);
            return view('editInsumo', compact('Insumo')); 
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
        $Insumo = insumo::find($id);
        $Insumo->fill($request);
        $Insumo->save();
        Toastr::success('Los datos del insumo fueron editados satisfactoriamente', 'Editado con exito!!');
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
            $Insumo = insumo::find($id);
            $Insumo->delete();
            Toastr::success('El insumo fue eliminado satisfactoriamente', 'Eliminado con exito!!');
            return view('Nav');  
        } else {
            Toastr::error('Su perfil de usuario no cumple con los permisos requeridos para ver el inventario de equipos.', 'Acceso denegado');
            return view('Nav'); 
        }
        
    }
}
