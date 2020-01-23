<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use App\Exports\JuiciosExport;
use App\juicios;

class juiciosController extends Controller
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
            return (DB::table('juicios')
            ->join('materias', 'juicios.id_materia', '=', 'materias.id_materia')
            ->select('juicios.*', 'materias.nombre_materia')
            ->orderBy('nombre_juicio', 'asc')
            ->paginate(5));
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

    public function exportPdf()
    {
        $juicios = DB::table('juicios')
                       ->join('materias', 'juicios.id_materia', '=', 'materias.id_materia')
                       ->select('juicios.*', 'materias.nombre_materia')
                       ->get();
        
        $pdf = PDF::loadView('pdf.juicios', compact('juicios'));


        return $pdf->download('consulta-juicios.pdf');
    }

    public function exportExcel()
    {
        
        
        return Excel::download(new JuiciosExport, 'juicios.xlsx');
       
    }

    public function juiciosAll()
    {
        return (
            juicios::all()
        );
    }

    public function searchNombreJuicio(Request $request)
    {
        $status = false;
        $juicios = DB::table('juicios')
            ->select('id_juicio')
            ->where('nombre_juicio',$request->nombre_juicio)
            ->get();
        if ($juicios->count() == 0)
            $status = false;
        else
            $status = true;
        
        return json_encode(array('status' => $status));
    }
}
