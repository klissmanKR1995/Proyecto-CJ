<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\valorescatalagos;

class valores_catalogosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
         $valorescatalagos = valorescatalagos::all();
        
         if($request->ajax()){
            return valorescatalagos::where('user_id', auth()->id())->get();
        }else{
            return view('home', compact('valorescatalagos'));
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
        $valorescatalagos = new valorescatalagos();
        $valorescatalagos->id_catalogo = $request->id_catalogo;
        $valorescatalagos->valor_variable = $request->valor_variable;
        $valorescatalagos->user_id = auth()->id();
        $valorescatalagos->save();

        return $valorescatalagos;
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
        $valorescatalagos = valorescatalagos::find($id);
        $valorescatalagos->id_catalogo = $request->id_catalogo;
        $valorescatalagos->valor_variable = $request->valor_variable;
        $valorescatalagos->save();
        return $valorescatalagos;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $valorescatalagos = valorescatalagos::find($id);
        $valorescatalagos->delete();
    }
}
