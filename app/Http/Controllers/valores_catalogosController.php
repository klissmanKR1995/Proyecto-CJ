<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
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

        if($request->ajax()){
            if ($request->has('buscar')){
                return json_encode(DB::table('valores_catalagos')
                ->join('catalogos', 'valores_catalagos.id_catalogo', '=', 'catalogos.id_catalogo')
                ->select('valores_catalagos.*', 'catalogos.nombre_variable')
                ->where('catalogos.nombre_variable','LIKE','%'.$request->buscar.'%')
                ->orWhere('valores_catalagos.valor_variable','LIKE','%'.$request->buscar.'%')
                ->orderBy('id_catalogo', 'asc')
                ->paginate(5));
            }
            else{
                return json_encode(DB::table('valores_catalagos')
                ->join('catalogos', 'valores_catalagos.id_catalogo', '=', 'catalogos.id_catalogo')
                ->select('valores_catalagos.*', 'catalogos.nombre_variable')
                ->orderBy('id_catalogo', 'asc')
                ->paginate(5));
            }
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

        return DB::table('valores_catalagos')
            ->join('catalogos', 'valores_catalagos.id_catalogo', '=', 'catalogos.id_catalogo')
            ->select('valores_catalagos.*', 'catalogos.nombre_variable')
            ->where('valores_catalagos.id_valor', $valorescatalagos->id_valor)
            ->orderBy('id_catalogo', 'desc')
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

    public function exportPdf()
    {
        $valorescatalagos = valorescatalagos::get();
        
        $pdf = PDF::loadView('pdf.valorescatalogos', compact('valorescatalagos'));


        return $pdf->download('consulta-valoresCatalogos.pdf');
    }

    public function getCatalogos(Request $request)
    {
        return json_encode(
            DB::table('valores_catalagos')
            ->select('id_valor', 'valor_variable')
            ->where('id_catalogo', $request->id_catalogo)
            ->orderBy('id_valor', 'desc')
            ->get()
        );
    }

    public function searchNombreValores(Request $request)
    {
        $status = false;
        $valorescatalagos = DB::table('valores_catalagos')
            ->select('id_valor')
            ->where('valor_variable',$request->valor_variable)
            ->get();
        if ($valorescatalagos->count() == 0)
            $status = false;
        else
            $status = true;
        
        return json_encode(array('status' => $status));
    }
}
