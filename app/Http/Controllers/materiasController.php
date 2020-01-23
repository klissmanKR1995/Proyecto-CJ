<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use App\Exports\MateriasExport;
use App\materias;


class materiasController extends Controller
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
            return DB::table('materias')->paginate(5);
        }else{
            return view('home', compact('materias'));
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
        $materias = new materias();
        $materias->nombre_materia = $request->nombre_materia;
        $materias->estatus = $request->estatus;
        $materias->user_id = auth()->id();
        $materias->save();

        return $materias;
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
        $materias = materias::find($id);
        $materias->nombre_materia = $request->nombre_materia;
        $materias->estatus = $request->estatus;
        $materias->save();
        return $materias;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $materias = materias::find($id);
        $materias->delete();
    }

    public function exportPdf()
    {
        $materias = materias::get();
        
        $pdf = PDF::loadView('pdf.materias', compact('materias'));


        return $pdf->download('consulta-materias.pdf');
    }

    public function exportExcel()
    {
        
        
        return Excel::download(new MateriasExport, 'materias.xlsx');
       
    }

    public function materiasAll()
    {
        return (
            materias::all()
        );
    }


    public function searchNombreMateria(Request $request)
    {
        $status = false;
        $materias = DB::table('materias')
            ->select('id_materia')
            ->where('nombre_materia',$request->nombre_materia)
            ->get();
        if ($materias->count() == 0)
            $status = false;
        else
            $status = true;
        
        return json_encode(array('status' => $status));
    }
}
