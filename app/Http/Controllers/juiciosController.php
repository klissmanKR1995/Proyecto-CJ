<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\juicios;

class juiciosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index(Request $request)
    {
        $juicios = juicios::all();
        
         if($request->ajax()){
            return juicios::where('user_id', auth()->id())->get();
        }else{
            return view('home', compact('juicios'));
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
        $juicios = new juicios();
        $juicios->nombre_juicio = $request->nombre_juicio;
        $juicios->estatus = $request->estatus;
        $juicios->id_materia= $request->id_materia;
        $juicios->user_id = auth()->id();
        $juicios->save();

        return $juicios;
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
        $juicios = juicios::find($id);
        $juicios->nombre_juicio = $request->nombre_juicio;
        $juicios->estatus = $request->estatus;
        $juicios->id_materia = $request->id_materia;
        $juicios->save();
        return $juicios;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $juicios = juicios::find($id);
        $juicios->delete();
    }
}
