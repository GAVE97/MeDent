<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use App\Models\servicio;
use Brian2694\Toastr\Facades\Toastr;

class RoleUserCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$request->user()->authorizeRole(['superAdmin', 'Ingeniero']);
        $Users = User::all();   
        return view('allUsers', compact('Users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //$request->user()->authorizeRole(['superAdmin', 'Ingeniero']); //Atorización de role
        $Users = User::all();   
        return view('newRoleUser', compact('Users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $UsersNumb = $request->input('user_id');
        $role = $request->input('role_id');
        //dd($UsersNumb);
        foreach($UsersNumb as $Numb){
        User::find($Numb)->roles()->attach($role);
        }
        return view('Nav');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id) //Funcion sin usar, no es necesario mostrar a detalle cada uno de los roles-usuario relación
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $request->user()->authorizeRole('superAdmin'); // aún no se ha probado
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
    public function destroy(Request $request, $id)
    {
        //
    }
}
