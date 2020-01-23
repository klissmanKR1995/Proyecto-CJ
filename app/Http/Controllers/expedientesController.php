<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use App\Exports\ExpedientesExport;
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
        
        if($request->ajax()){
            return DB::table('expedientes')
            ->join('juicios', 'expedientes.id_juicio', '=', 'juicios.id_juicio')
            ->join('materias', 'expedientes.id_materia', '=', 'materias.id_materia')
            ->join('juzgados', 'expedientes.id_juzgado', '=', 'juzgados.id_juzgado')
            ->select('expedientes.*', 'juicios.nombre_juicio', 'materias.nombre_materia', 'juzgados.nombre_juzgado')
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
        $expedientes->id_materia = $request->id_materia;
        $expedientes->id_juzgado = $request->id_juzgado;
        $expedientes->nombre_actor = $request->nombre_actor;
        $expedientes->nombre_demandado = $request->nombre_demandado;
        $expedientes->fecha_en_tribunal = $request->fecha_en_tribunal;
        $expedientes->fecha_en_juzgado = $request->fecha_en_juzgado;
        $expedientes->id_juicio = $request->id_juicio;
        $expedientes->user_id = auth()->id();
        $expedientes->save();

        //return $expedientes;

        return DB::table('expedientes')
            ->join('juicios', 'expedientes.id_juicio', '=', 'juicios.id_juicio')
            ->join('materias', 'expedientes.id_materia', '=', 'materias.id_materia')
            ->join('juzgados', 'expedientes.id_juzgado', '=', 'juzgados.id_juzgado')
            ->select('expedientes.*', 'juicios.nombre_juicio', 'materias.nombre_materia', 'juzgados.nombre_juzgado')
            ->where('id_expediente', $expedientes->id_expediente)
            ->orderBy('numero_expediente', 'asc')
            ->get(); 
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
        $expedientes->id_materia = $request->id_materia;
        $expedientes->id_juzgado = $request->id_juzgado;
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


    public function exportPdf()
    {
        $expedientes = DB::table('expedientes')
                        ->join('juicios', 'expedientes.id_juicio', '=', 'juicios.id_juicio')
                        ->join('materias', 'expedientes.id_materia', '=', 'materias.id_materia')
                        ->join('juzgados', 'expedientes.id_juzgado', '=', 'juzgados.id_juzgado')
                        ->select('expedientes.*', 'juicios.nombre_juicio', 'materias.nombre_materia', 'juzgados.nombre_juzgado')
                       ->get();
        
        $pdf = PDF::loadView('pdf.expedientes', compact('expedientes'));


        return $pdf->setPaper('a4', 'landscape')
                   ->download('consulta-expedientes.pdf');
    }

    public function exportExcel()
    {
        
        
        return Excel::download(new ExpedientesExport, 'Expedientes.xlsx');
       
    }

    public function expedientesAll()
    {
        return  DB::table('expedientes')->select('id_expediente', 'numero_expediente')->whereNotExists(function($query)
            {
                $query->select(DB::raw(1))
                      ->from('ejemplos')
                      ->whereRaw('expedientes.id_expediente = ejemplos.id_expediente');
            })
            ->get();
    }

    public function searchNombreExpdiente(Request $request)
    {
        $status = false;
        $expedientes = DB::table('expedientes')
            ->select('id_expediente')
            ->where('numero_expediente',$request->numero_expediente)
            ->get();
        if ($expedientes->count() == 0)
            $status = false;
        else
            $status = true;
        
        return json_encode(array('status' => $status));
    }

    
}
