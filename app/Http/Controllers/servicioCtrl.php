<?php

namespace App\Http\Controllers;

use App\Models\servicio;
use Illuminate\Http\Request;

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
    public function create()
    {
        return view('newServicio');
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
        return view('welcome');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Servicio=servicio::find($id);
        //dd($Servicios);
        return view('showServicio',compact('Servicio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $Servicio=servicio::find($id);
        return view('editServicio', compact('Servicio'));
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
        return view('Nav');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Servicio = servicio::find($id);
        $Servicio->delete();
        $Servicio = servicio::all();
        return view('Nav');
    }
}
