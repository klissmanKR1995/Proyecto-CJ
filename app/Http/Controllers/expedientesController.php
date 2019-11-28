<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\expedientes;
//use App\juicios;


class expedientesController extends Controller
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
        $expedientes = expedientes::all();
        
        if($request->ajax()){
            return DB::table('expedientes')
            ->join('juicios', 'expedientes.id_juicio', '=', 'juicios.id_juicio')
            ->select('expedientes.*', 'juicios.nombre_juicio')
            ->orderBy('numero_expediente', 'asc')
            ->get();        
        }else{
            return view('home', compact('expedientes'));
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
        $expedientes = new expedientes();
        $expedientes->numero_expediente = $request->numero_expediente;
        $expedientes->nombre_actor = $request->nombre_actor;
        $expedientes->nombre_demandado = $request->nombre_demandado;
        $expedientes->fecha_en_tribunal = $request->fecha_en_tribunal;
        $expedientes->fecha_en_juzgado = $request->fecha_en_juzgado;
        $expedientes->id_juicio = $request->id_juicio;
        $expedientes->nombre_juicio = $request->nombre_juicio;
        $expedientes->user_id = auth()->id();
        $expedientes->save();

        return $expedientes;
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
        $expedientes = expedientes::find($id);
        $expedientes->numero_expediente = $request->numero_expediente;
        $expedientes->nombre_actor = $request->nombre_actor;
        $expedientes->nombre_demandado = $request->nombre_demandado;
        $expedientes->fecha_en_tribunal = $request->fecha_en_tribunal;
        $expedientes->fecha_en_juzgado = $request->fecha_en_juzgado;
        $expedientes->id_juicio = $request->id_juicio;
        $expedientes->save();
        return $expedientes;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $expedientes = expedientes::find($id);
        $expedientes->delete();
    }
}
