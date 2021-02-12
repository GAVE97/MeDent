<?php

namespace App\Http\Controllers;

use App\Models\insumo;
use Illuminate\Http\Request;

class insumoCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Insumos=insumo::all();
        return view('showInsumo', compact('Insumos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('newInsumo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('imagenInsumo')){
            $file = $request->file('imagenInsumo');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/imgSrv/', $name);
        }
            $newInsumo = new insumo();
            $newInsumo->Mnto = $request->input('Mnto');
            $newInsumo->porcentUso = $request->input('porcentUso');
            $newInsumo->prioridad = $request->input('prioridad');//gregarlo como boton en el frm y como campo en elmigration
            $newInsumo->imagenInsumo = $name;
            $newInsumo->save();

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
