<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\ejemplo;

class ejemploController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      
        if($request->ajax()){
            return DB::table('ejemplos')
            ->join('expedientes', 'ejemplos.id_expediente', '=', 'expedientes.id_expediente')
            ->select('ejemplos.*', 'expedientes.numero_expediente')
            ->orderBy('numero_expediente', 'asc')
            ->get();        
        }else{
            return view('home', compact('ejemplos'));
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
        $modulouno = new ejemplo();
        $modulouno->id_expediente = $request->id_expediente;
        $modulouno->municipios = $request->municipios;
        $modulouno->estados= $request->estados;
        $modulouno->user_id = auth()->id();
        $modulouno->save();

        return $modulouno;
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
        $modulouno = ejemplo::find($id);
        $modulouno->id_expediente = $request->id_expediente;
        $modulouno->municipios = $request->municipios;
        $modulouno->estados = $request->estados;
        $modulouno->save();
        return $modulouno;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $modulouno = ejemplo::find($id);
        $modulouno->delete();
    }
}
