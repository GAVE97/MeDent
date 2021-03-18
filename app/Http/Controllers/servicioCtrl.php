<?php

namespace App\Http\Controllers;

use App\Models\servicio;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class servicioCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $Servicios=servicio::all();
            return view('indexServicio', compact('Servicios'));   
        
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
            return view('newServicio');  
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
        if($request->hasFile('imagenServicio')){
            $file = $request->file('imagenServicio');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/imgSrv/', $name);
        }
            $newServicio = new servicio();
            $newServicio->Nombre_serv = $request->input('Nombre_serv');
            $newServicio->Descripcion = $request->input('Descripcion');
            $newServicio->Precio = $request->input('Precio');//gregarlo como boton en el frm y como campo en elmigration
            $newServicio->imagenServicio = $name;
            $newServicio->save();
            Toastr::success('Los datos del servicio fueron guardados satisfactoriamente', 'Creado con exito!!');
        return view('indexServicio');
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
            $Servicio=servicio::find($id);
            return view('showServicio',compact('Servicio'));  
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
            $Servicio=servicio::find($id);
            return view('editServicio', compact('Servicio'));  
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
        $Servicio = servicio::find($id);
        $Servicio->fill($request->except('imagenServicio'));
        if($request->hasFile('imagenServicio')){
            $file = $request->file('imagenServicio');
            $name = time().$file->getClientOriginalName();
            $Servicio->imagenServicio = $name;
            $file->move(public_path().'/imgSrv/', $name);
        }
        $Servicio->save();
        Toastr::success('Los datos del servicio fueron editados satisfactoriamente', 'Editado con exito!!');
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
            $Servicio = servicio::find($id);
            $Servicio->delete();
            Toastr::success('Los datos del servicio fueron guardados satisfactoriamente', 'Eliminado con exito!!');
            return view('Nav');  
        } else {
            Toastr::error('Su perfil de usuario no cumple con los permisos requeridos para ver el inventario de equipos.', 'Acceso denegado');
            return view('Nav'); 
        }
        
    }

    public function filtrarServicios(Request $request)
    {
        $valor = $request->valor;
        $Servicios = servicio::where('Nombre_serv','LIKE',$request->valor)->orWhere('Descripcion','LIKE',$request->valor)->orWhere('Precio','LIKE',$request->valor)->get();
        return view('indexServicio',compact('Servicios'));
    }
}
