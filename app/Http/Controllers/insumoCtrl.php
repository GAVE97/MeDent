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
        return view('indexInsumo', compact('Insumos'));
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
            $newInsumo = new insumo();
            $newInsumo->Nombre = $request->input('Nombre');
            $newInsumo->Tipo = $request->input('Tipo');
            $newInsumo->Cantidad = $request->input('Cantidad');
            $newInsumo->Caducidad = $request->input('Caducidad');
            $newInsumo->save();

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
        $Insumo=insumo::find($id);
        return view('showInsumo', compact('Insumo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Insumo=insumo::find($id);
        return view('editInsumo', compact('Insumo'));
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
        $Insumo = insumo::find($id);
        $Insumo->delete();
        $Insumo = insumo::all();
        return view('Nav');
    }
}
