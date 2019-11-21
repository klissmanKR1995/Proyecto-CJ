<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\distritos;



class distritosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index(Request $request)
    {
        $distritos = distritos::all();
        
         if($request->ajax()){
            return distritos::where('user_id', auth()->id())->get();
        }else{
            return view('home', compact('distritos'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $distritos = new distritos();
        $distritos->nombre_distrito = $request->nombre_distrito;
        $distritos->estatus = $request->estatus;
        $distritos->user_id = auth()->id();
        $distritos->save();

        return $distritos;
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
        $distritos = distritos::find($id);
        $distritos->nombre_distrito = $request->nombre_distrito;
        $distritos->estatus = $request->estatus;
        $distritos->save();
        return $distritos;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $distritos = distritos::find($id);
        $distritos->delete();
    }
}
