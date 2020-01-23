<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use App\Exports\CatalogosExport;
use App\catalogos;

class catalogosController extends Controller
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
            return DB::table('catalogos')->paginate(5);
        }else{
            return view('home', compact('catalogos'));
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
        $catalogos = new catalogos();
        $catalogos->nombre_variable = $request->nombre_variable;
        $catalogos->estatus = $request->estatus;
        $catalogos->user_id = auth()->id();
        $catalogos->save();

        return $catalogos;
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
        $catalogos = catalogos::find($id);
        $catalogos->nombre_variable = $request->nombre_variable;
        $catalogos->estatus = $request->estatus;
        $catalogos->save();
        return $catalogos;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $catalogos = catalogos::find($id);
        $catalogos->delete();
    }

    public function exportPdf()
    {
        $catalogos = catalogos::get();
        
        $pdf = PDF::loadView('pdf.catalogos', compact('catalogos'));


        return $pdf->download('consulta-variables.pdf');
    }

    public function exportExcel()
    {
        
        
        return Excel::download(new CatalogosExport, 'variables.xlsx');
       
    }

    public function catalogosAll()
    {
        return (
            catalogos::all()
        );
    }


    public function searchNombreVariable(Request $request)
    {
        $status = false;
        $catalogos = DB::table('catalogos')
            ->select('id_catalogo')
            ->where('nombre_variable',$request->nombre_variable)
            ->get();
        if ($catalogos->count() == 0)
            $status = false;
        else
            $status = true;
        
        return json_encode(array('status' => $status));
    }
}
