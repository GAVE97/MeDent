<?php

namespace App\Http\Controllers;

use App\Models\equipo;
use Illuminate\Http\Request;

class equipoCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Equipos=equipo::all();
        return view('showEquipo', compact('Equipos'));
    }

    /**
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
            $file->move(public_path().'/imgSrv/', $name);
        }
            $newEquipo = new equipo();
            $newEquipo->Mnto = $request->input('Mnto');
            $newEquipo->porcentUso = $request->input('porcentUso');
            $newEquipo->prioridad = $request->input('prioridad');//gregarlo como boton en el frm y como campo en elmigration
            $newEquipo->imagenEquipo = $name;
            $newEquipo->save();

        $Equipos = Equipo::all();
        return view('Nav.Navegacion');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
