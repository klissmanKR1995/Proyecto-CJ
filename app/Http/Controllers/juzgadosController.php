<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;
use App\juzgados;
//use App\distritos;


class juzgadosController extends Controller
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
        if($request->ajax()){
            return json_encode(DB::table('juzgados')
            ->join('distritos', 'juzgados.id_distrito', '=', 'distritos.id_distrito')
            ->select('juzgados.*', 'distritos.nombre_distrito')
            ->orderBy('nombre_juzgado', 'asc')
            ->paginate(5));
        }else{
            return view('home', compact('juzgados'));
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
        $juzgados = new juzgados();
        $juzgados->nombre_juzgado = $request->nombre_juzgado;
        $juzgados->estatus = $request->estatus;
        $juzgados->id_distrito= $request->id_distrito;
        $juzgados->user_id = auth()->id();
        $juzgados->save();

        return $juzgados;
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
        $juzgados = juzgados::find($id);
        $juzgados->nombre_juzgado = $request->nombre_juzgado;
        $juzgados->estatus = $request->estatus;
        $juzgados->id_distrito = $request->id_distrito;
        $juzgados->save();
        return $juzgados;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $juzgados = juzgados::find($id);
        $juzgados->delete();
    }

    public function searchNombreJuzgado(Request $request)
    {
        $status = false;
        $juzgados = DB::table('juzgados')
            ->select('id_juzgado')
            ->where('nombre_juzgado',$request->nombre_juzgado)
            ->get();
        if ($juzgados->count() == 0)
            $status = false;
        else
            $status = true;
        
        return json_encode(array('status' => $status));
    }
}
