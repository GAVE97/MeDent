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
        return view('showServicio', compact('Servicios'));
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
            $newServicio->Mnto = $request->input('Mnto');
            $newServicio->porcentUso = $request->input('porcentUso');
            $newServicio->prioridad = $request->input('prioridad');//gregarlo como boton en el frm y como campo en elmigration
            $newServicio->imagenServicio = $name;
            $newServicio->save();

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
