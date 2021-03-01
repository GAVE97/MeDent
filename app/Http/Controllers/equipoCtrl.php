<?php

namespace App\Http\Controllers;

use App\Models\equipo;
use App\Models\servicio;
use Illuminate\Http\Request;

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
        $Servicios=servicio::all();
        
        if(! $request->user()){
            return view('welcome', compact('Servicios'));
        } elseif($request->user()->authorizeRole('Admin')) {
            return view('indexEquipo', compact('Equipos'));
        } else {
            return view('Nav'); 
        }
    }

    /**
     * 
     * 
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('newEquipo');
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

        return view('Nav');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Equipo=equipo::find($id);
        return view('showEquipo', compact('Equipo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Equipo=equipo::find($id);
        return view('editEquipo', compact('Equipo'));
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
        $Equipo = equipo::find($id);
        //dd($Equipo);
        $Equipo->delete();
        $Equipo = equipo::all();
        return view('Nav');
    }
}
