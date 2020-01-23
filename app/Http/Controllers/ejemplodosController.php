<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\ejemplodos;

class ejemplodosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            return (DB::table('ejemplo_dos')
            ->join('expedientes', 'ejemplo_dos.id_expediente', '=', 'expedientes.id_expediente')
            ->select('ejemplo_dos.*', 'expedientes.numero_expediente')
            ->orderBy('numero_expediente', 'asc')
            ->paginate(5));
        }else{
            return view('home', compact('ejemplo_dos'));
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
        $modulodos = new ejemplodos();
        $modulodos->id_expediente = $request->id_expediente;
        $modulodos->fecha_sentencia = $request->fecha_sentencia;
        $modulodos->fecha_promocion= $request->fecha_promocion;
        $modulodos->solicitud_embargo = $request->solicitud_embargo;
        $modulodos->fecha_solicitud_embargo= $request->fecha_solicitud_embargo;
        $modulodos->autorizacion_embargo= $request->autorizacion_embargo;
        $modulodos->fecha_emision= $request->fecha_emision;
        $modulodos->ejecucion_embargo= $request->ejecucion_embargo;
        $modulodos->fecha_ejecucion_embargo= $request->fecha_ejecucion_embargo;
        $modulodos->cumple_pago= $request->cumple_pago;
        $modulodos->bienes_sentencia= $request->bienes_sentencia;
        $modulodos->solicita_adjudicacion= $request->solicita_adjudicacion;
        $modulodos->designa_perito= $request->designa_perito;
        $modulodos->fecha_designacion= $request->fecha_designacion;
        $modulodos->fecha_aceptacion= $request->fecha_aceptacion;
        $modulodos->fecha_informe= $request->fecha_informe;
        $modulodos->venta_almoneda= $request->venta_almoneda;
        $modulodos->fecha_acuerdo= $request->fecha_acuerdo;
        $modulodos->numero_publicaciones= $request->numero_publicaciones;
        $modulodos->fecha_venta= $request->fecha_venta;
        $modulodos->almonedas_publicas= $request->almonedas_publicas;
        $modulodos->cambio_propietario= $request->cambio_propietario;
        $modulodos->orden_lanzamiento= $request->orden_lanzamiento;
        $modulodos->fecha_lanzamiento= $request->fecha_lanzamiento;
        $modulodos->existencia_derechos= $request->existencia_derechos;
        $modulodos->tipo_derechos= $request->tipo_derechos;
        $modulodos->medidas_dictadas= $request->medidas_dictadas;
        $modulodos->tipo_medida= $request->tipo_medida;
        $modulodos->solicitud_amparo= $request->solicitud_amparo;
        $modulodos->tipo_amparo= $request->tipo_amparo;
        $modulodos->suspension_provisional= $request->suspension_provisional;
        $modulodos->fase_procesal= $request->fase_procesal;
        $modulodos->resolucion_amparo= $request->resolucion_amparo;
        $modulodos->total_acuerdos= $request->total_acuerdos;
        $modulodos->user_id = auth()->id();
        $modulodos->save();

        return $modulodos;
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

        $modulodos = ejemplodos::find($id);
        $modulodos->id_expediente = $request->id_expediente;
        $modulodos->fecha_sentencia = $request->fecha_sentencia;
        $modulodos->fecha_promocion= $request->fecha_promocion;
        $modulodos->solicitud_embargo = $request->solicitud_embargo;
        $modulodos->fecha_solicitud_embargo= $request->fecha_solicitud_embargo;
        $modulodos->autorizacion_embargo= $request->autorizacion_embargo;
        $modulodos->fecha_emision= $request->fecha_emision;
        $modulodos->ejecucion_embargo= $request->ejecucion_embargo;
        $modulodos->fecha_ejecucion_embargo= $request->fecha_ejecucion_embargo;
        $modulodos->cumple_pago= $request->cumple_pago;
        $modulodos->bienes_sentencia= $request->bienes_sentencia;
        $modulodos->solicita_adjudicacion= $request->solicita_adjudicacion;
        $modulodos->designa_perito= $request->designa_perito;
        $modulodos->fecha_designacion= $request->fecha_designacion;
        $modulodos->fecha_aceptacion= $request->fecha_aceptacion;
        $modulodos->fecha_informe= $request->fecha_informe;
        $modulodos->venta_almoneda= $request->venta_almoneda;
        $modulodos->fecha_acuerdo= $request->fecha_acuerdo;
        $modulodos->numero_publicaciones= $request->numero_publicaciones;
        $modulodos->fecha_venta= $request->fecha_venta;
        $modulodos->almonedas_publicas= $request->almonedas_publicas;
        $modulodos->cambio_propietario= $request->cambio_propietario;
        $modulodos->orden_lanzamiento= $request->orden_lanzamiento;
        $modulodos->fecha_lanzamiento= $request->fecha_lanzamiento;
        $modulodos->existencia_derechos= $request->existencia_derechos;
        $modulodos->tipo_derechos= $request->tipo_derechos;
        $modulodos->medidas_dictadas= $request->medidas_dictadas;
        $modulodos->tipo_medida= $request->tipo_medida;
        $modulodos->solicitud_amparo= $request->solicitud_amparo;
        $modulodos->tipo_amparo= $request->tipo_amparo;
        $modulodos->suspension_provisional= $request->suspension_provisional;
        $modulodos->fase_procesal= $request->fase_procesal;
        $modulodos->resolucion_amparo= $request->resolucion_amparo;
        $modulodos->total_acuerdos= $request->total_acuerdos;
        $modulodos->save();
        return $modulodos;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $modulodos = ejemplodos::find($id);
        $modulodos->delete();
    }
}
