<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\valorescatalagos;

class valores_catalogosController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $valorescatalagos = valorescatalagos::all();
        
        if($request->ajax()){
            return DB::table('valores_catalagos')
            ->join('catalogos', 'valores_catalagos.id_catalogo', '=', 'catalogos.id_catalogo')
            ->select('valores_catalagos.*', 'catalogos.nombre_variable')
            ->orderBy('id_catalogo', 'desc')
            ->get();        
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
