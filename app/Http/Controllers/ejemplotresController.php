<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use App\Exports\EjemploTresExport;
use App\ejemplotres;

class ejemplotresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            return (DB::table('ejemplo_tres')
            ->join('expedientes', 'ejemplo_tres.id_expediente', '=', 'expedientes.id_expediente')
            ->select('ejemplo_tres.*', 'expedientes.numero_expediente')
            ->orderBy('numero_expediente', 'asc')
            ->paginate(5));
        }else{
            return view('home', compact('ejemplo_tres'));
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
        $modulotres = new ejemplotres();
        $modulotres->id_expediente = $request->id_expediente;
        $modulotres->fecha_juez_emplazamiento = $request->fecha_juez_emplazamiento;
        $modulotres->mecanismos_realizar_emplazamiento= $request->mecanismos_realizar_emplazamiento;
        $modulotres->pais_emplazamiento = $request->pais_emplazamiento;
        $modulotres->estado_emplazamiento= $request->estado_emplazamiento;
        $modulotres->municipio_emplazamiento= $request->municipio_emplazamiento;
        $modulotres->codigo_postal= $request->codigo_postal;
        $modulotres->numero_visitas= $request->numero_visitas;
        $modulotres->se_realizo= $request->se_realizo;
        $modulotres->mecanismos_realizacion_emplazamiento= $request->mecanismos_realizacion_emplazamiento;
        $modulotres->si_fecha= $request->si_fecha;
        $modulotres->no_motivos= $request->no_motivos;
        $modulotres->contestacion_demanda= $request->contestacion_demanda;
        $modulotres->fecha_declaracion_rebeldia= $request->fecha_declaracion_rebeldia;
        $modulotres->si_contesta_demanda= $request->si_contesta_demanda;
        $modulotres->fecha_contestacion_demanda= $request->fecha_contestacion_demanda;
        $modulotres->reconviene_demanda= $request->reconviene_demanda;
        $modulotres->fecha_reconvencion_demanda= $request->fecha_reconvencion_demanda;
        $modulotres->contesta_reconvencion= $request->contesta_reconvencion;
        $modulotres->numero_total_acuerdos= $request->numero_total_acuerdos;
        $modulotres->user_id = auth()->id();
        $modulotres->save();

        return $modulotres;
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
        $modulotres = ejemplotres::find($id);
        $modulotres->id_expediente = $request->id_expediente;
        $modulotres->fecha_juez_emplazamiento = $request->fecha_juez_emplazamiento;
        $modulotres->mecanismos_realizar_emplazamiento= $request->mecanismos_realizar_emplazamiento;
        $modulotres->pais_emplazamiento = $request->pais_emplazamiento;
        $modulotres->estado_emplazamiento= $request->estado_emplazamiento;
        $modulotres->municipio_emplazamiento= $request->municipio_emplazamiento;
        $modulotres->codigo_postal= $request->codigo_postal;
        $modulotres->numero_visitas= $request->numero_visitas;
        $modulotres->se_realizo= $request->se_realizo;
        $modulotres->mecanismos_realizacion_emplazamiento= $request->mecanismos_realizacion_emplazamiento;
        $modulotres->si_fecha= $request->si_fecha;
        $modulotres->no_motivos= $request->no_motivos;
        $modulotres->contestacion_demanda= $request->contestacion_demanda;
        $modulotres->fecha_declaracion_rebeldia= $request->fecha_declaracion_rebeldia;
        $modulotres->si_contesta_demanda= $request->si_contesta_demanda;
        $modulotres->fecha_contestacion_demanda= $request->fecha_contestacion_demanda;
        $modulotres->reconviene_demanda= $request->reconviene_demanda;
        $modulotres->fecha_reconvencion_demanda= $request->fecha_reconvencion_demanda;
        $modulotres->contesta_reconvencion= $request->contesta_reconvencion;
        $modulotres->numero_total_acuerdos= $request->numero_total_acuerdos;
        $modulotres->save();
        return $modulotres;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $modulotres = ejemplotres::find($id);
        $modulotres->delete();
    }

    public function exportPdf()
    {

        $modulotres = DB::table('ejemplo_tres')
                        ->join('expedientes', 'ejemplo_tres.id_expediente', '=', 'expedientes.id_expediente')
                        ->select('ejemplo_tres.*', 'expedientes.numero_expediente')
                       ->get();
        
        $pdf = PDF::loadView('pdf.diligenciario', compact('modulotres'));


        return $pdf->setPaper('a4', 'landscape')
                   ->download('consulta-modulotres.pdf');
    }

    public function exportExcel()
    {
        
        
        return Excel::download(new EjemploTresExport, 'modulodiez.xlsx');
       
    }

}
