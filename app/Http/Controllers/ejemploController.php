<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use App\Exports\EjemploExport;
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
            return (DB::table('ejemplos')
            ->join('expedientes', 'ejemplos.id_expediente', '=', 'expedientes.id_expediente')
            ->select('ejemplos.*', 'expedientes.numero_expediente')
            ->orderBy('numero_expediente', 'asc')
            ->paginate(5));
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
        $modulouno->datos = $request->datos;
        $modulouno->persona= $request->persona;
        $modulouno->razon_social = $request->razon_social;
        $modulouno->nombre_comercial= $request->nombre_comercial;
        $modulouno->nombre_completo= $request->nombre_completo;
        $modulouno->sexo= $request->sexo;
        $modulouno->fecha_nacimiento= $request->fecha_nacimiento;
        $modulouno->rfc= $request->rfc;
        $modulouno->curp= $request->curp;
        $modulouno->pais= $request->pais;
        $modulouno->estados= $request->estados;
        $modulouno->municipios= $request->municipios;
        $modulouno->nacionalidad= $request->nacionalidad;
        $modulouno->pais_habitual= $request->pais_habitual;
        $modulouno->estado_habitual= $request->estado_habitual;
        $modulouno->municipio_habitual= $request->municipio_habitual;
        $modulouno->tipo_domicilio= $request->tipo_domicilio;
        $modulouno->tipo_discapacidad= $request->tipo_discapacidad;
        $modulouno->situacion_conyugal= $request->situacion_conyugal;
        $modulouno->escolaridad= $request->escolaridad;
        $modulouno->condicion_migratoria= $request->condicion_migratoria;
        $modulouno->habla_español= $request->habla_español;
        $modulouno->habla_lengua_indigena= $request->habla_lengua_indigena;
        $modulouno->tipo_lengua_indigena= $request->tipo_lengua_indigena;
        $modulouno->habla_lengua_extranjera= $request->habla_lengua_extranjera;
        $modulouno->trabaja_ocupacion= $request->trabaja_ocupacion;
        $modulouno->condicion_actividad= $request->condicion_actividad;
        $modulouno->fuente_ingresos= $request->fuente_ingresos;
        $modulouno->ingreso_mensual= $request->ingreso_mensual;
        $modulouno->tipo_representacion= $request->tipo_representacion;
        $modulouno->sexo_representacion= $request->sexo_representacion;
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
        $modulouno->datos = $request->datos;
        $modulouno->persona= $request->persona;
        $modulouno->razon_social = $request->razon_social;
        $modulouno->nombre_comercial= $request->nombre_comercial;
        $modulouno->nombre_completo= $request->nombre_completo;
        $modulouno->sexo= $request->sexo;
        $modulouno->fecha_nacimiento= $request->fecha_nacimiento;
        $modulouno->rfc= $request->rfc;
        $modulouno->curp= $request->curp;
        $modulouno->pais= $request->pais;
        $modulouno->estados= $request->estados;
        $modulouno->municipios= $request->municipios;
        $modulouno->nacionalidad= $request->nacionalidad;
        $modulouno->pais_habitual= $request->pais_habitual;
        $modulouno->estado_habitual= $request->estado_habitual;
        $modulouno->municipio_habitual= $request->municipio_habitual;
        $modulouno->tipo_domicilio= $request->tipo_domicilio;
        $modulouno->tipo_discapacidad= $request->tipo_discapacidad;
        $modulouno->situacion_conyugal= $request->situacion_conyugal;
        $modulouno->escolaridad= $request->escolaridad;
        $modulouno->condicion_migratoria= $request->condicion_migratoria;
        $modulouno->habla_español= $request->habla_español;
        $modulouno->habla_lengua_indigena= $request->habla_lengua_indigena;
        $modulouno->tipo_lengua_indigena= $request->tipo_lengua_indigena;
        $modulouno->habla_lengua_extranjera= $request->habla_lengua_extranjera;
        $modulouno->trabaja_ocupacion= $request->trabaja_ocupacion;
        $modulouno->condicion_actividad= $request->condicion_actividad;
        $modulouno->fuente_ingresos= $request->fuente_ingresos;
        $modulouno->ingreso_mensual= $request->ingreso_mensual;
        $modulouno->tipo_representacion= $request->tipo_representacion;
        $modulouno->sexo_representacion= $request->sexo_representacion;
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

    public function exportExcel()
    {
        
        
        return Excel::download(new EjemploExport, 'ModuloUno.xlsx');
       
    }
}
