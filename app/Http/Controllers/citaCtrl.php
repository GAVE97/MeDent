<?php

namespace App\Http\Controllers;

use App\Models\cita;
use Illuminate\Http\Request;

class citaCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Citas=cita::all();
        return view('indexCita', compact('Citas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('newCita');
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
        $newCita->Tipo_de_cita = $request->input('Tipo_de_cita');
        $newCita->Fecha = $request->input('Fecha');
        $newCita->save();
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
        $Cita=cita::find($id);
        return view('showCita', compact('Cita'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Cita=cita::find($id);
        return view('editCita', compact('Cita'));
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
        $Cita = cita::find($id);
        $Cita->delete();
        $Cita = cita::all();
        return view('Nav');
    }
}
