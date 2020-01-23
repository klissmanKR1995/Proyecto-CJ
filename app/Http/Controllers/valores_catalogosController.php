<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use App\Exports\ValoresCatalogosExport;
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
                return (DB::table('valores_catalagos')
                ->join('catalogos', 'valores_catalagos.id_catalogo', '=', 'catalogos.id_catalogo')
                ->select('valores_catalagos.*', 'catalogos.nombre_variable')
                ->where('catalogos.nombre_variable','LIKE','%'.$request->buscar.'%')
                ->orWhere('valores_catalagos.valor_variable','LIKE','%'.$request->buscar.'%')
                ->orderBy('id_catalogo', 'asc')
                ->paginate(5));
            }
            else{
                return (DB::table('valores_catalagos')
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
            ->orderBy('id_catalogo', 'asc')
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
        $valorescatalagos = DB::table('valores_catalagos')
                       ->join('catalogos', 'valores_catalagos.id_catalogo', '=', 'catalogos.id_catalogo')
                       ->select('valores_catalagos.*', 'catalogos.nombre_variable')
                       ->get();
        
        
        $pdf = PDF::loadView('pdf.valorescatalogos', compact('valorescatalagos'));


        return $pdf->download('consulta-valoresCatalogos.pdf');
    }

    public function exportExcel()
    {
        
        
        return Excel::download(new ValoresCatalogosExport, 'ValoresCatalogos.xlsx');
       
    }

    public function getCatalogos(Request $request)
    {
        return json_encode (
            DB::table('valores_catalagos')
            ->select('id_valor','valor_variable')
            ->where('id_catalogo', 1)
            ->orderBy('id_catalogo', 'asc')  
            ->get()
        );
    }

    public function personaCatalogos(Request $request)
    {
        return json_encode(
            DB::table('valores_catalagos')
            ->select('id_valor','valor_variable')
            ->where('id_catalogo', 2)
            ->orderBy('id_catalogo', 'asc')            
            ->get()
        );
    }

    public function sexoCatalogos(Request $request)
    {
        return json_encode(
            DB::table('valores_catalagos')
            ->select('id_valor','valor_variable')
            ->where('id_catalogo', 3)
            ->orderBy('id_catalogo', 'asc')
            ->get()
        );
    }

    public function paisesCatalogos(Request $request)
    {
        return json_encode(
            DB::table('valores_catalagos')
            ->select('id_valor','valor_variable')
            ->where('id_catalogo', 4)
            ->orderBy('id_catalogo', 'asc')
            ->get()
        );
    }

    public function estadosCatalogos(Request $request)
    {
        return json_encode(
            DB::table('valores_catalagos')
            ->select('id_valor','valor_variable')
            ->where('id_catalogo', 5)
            ->orderBy('id_catalogo', 'asc')
            ->get()
        );
    }

    public function municipiosCatalogos(Request $request)
    {
        return json_encode(
            DB::table('valores_catalagos')
            ->select('id_valor','valor_variable')
            ->where('id_catalogo', 6)
            ->orderBy('id_catalogo', 'asc')
            ->get()
        );
    }

    public function nacionalidadesCatalogos(Request $request)
    {
        return json_encode(
            DB::table('valores_catalagos')
            ->select('id_valor','valor_variable')
            ->where('id_catalogo', 7)
            ->orderBy('id_catalogo', 'asc')
            ->get()
        );
    }

    public function pais_habitualCatalogos(Request $request)
    {
        return json_encode(
            DB::table('valores_catalagos')
            ->select('id_valor','valor_variable')
            ->where('id_catalogo', 4)
            ->orderBy('id_catalogo', 'asc')
            ->get()
        );
    }

    public function estado_habitualCatalogos(Request $request)
    {
        return json_encode(
            DB::table('valores_catalagos')
            ->select('id_valor','valor_variable')
            ->where('id_catalogo', 5)
            ->orderBy('id_catalogo', 'asc')
            ->get()
        );
    }

    public function municipio_habitualCatalogos(Request $request)
    {
        return json_encode(
            DB::table('valores_catalagos')
            ->select('id_valor','valor_variable')
            ->where('id_catalogo', 6)
            ->orderBy('id_catalogo', 'asc')
            ->get()
        );
    }

    public function tipoDomicilioCatalogos(Request $request)
    {
        return json_encode(
            DB::table('valores_catalagos')
            ->select('id_valor','valor_variable')
            ->where('id_catalogo', 8)
            ->orderBy('id_catalogo', 'asc')
            ->get()
        );
    }

    public function discapacidadesCatalogos(Request $request)
    {
        return json_encode(
            DB::table('valores_catalagos')
            ->select('id_valor','valor_variable')
            ->where('id_catalogo', 9) 
            ->orderBy('id_catalogo', 'asc')
            ->get()
        );
    }

    public function escolaridadCatalogos(Request $request)
    {
        return json_encode(
            DB::table('valores_catalagos')
            ->select('id_valor','valor_variable')
            ->where('id_catalogo', 10)
            ->orderBy('id_catalogo', 'asc')
            ->get()
        );
    }

    public function lenguaIndigenaCatalogos(Request $request)
    {
        return json_encode(
            DB::table('valores_catalagos')
            ->select('id_valor','valor_variable')
            ->where('id_catalogo', 11)
            ->orderBy('id_catalogo', 'asc')
            ->get()
        );
    }

    public function ocupacionCatalogos(Request $request)
    {
        return json_encode(
            DB::table('valores_catalagos')
            ->select('id_valor','valor_variable')
            ->where('id_catalogo', 12)
            ->orderBy('id_catalogo', 'asc')
            ->get()
        );
    }


    public function condicionActividadCatalogos(Request $request)
    {
        return json_encode(
            DB::table('valores_catalagos')
            ->select('id_valor','valor_variable')
            ->where('id_catalogo', 13)
            ->orderBy('id_catalogo', 'asc')
            ->get()
        );
    }

    public function fuenteIngresosCatalogos(Request $request)
    {
        return json_encode(
            DB::table('valores_catalagos')
            ->select('id_valor','valor_variable')
            ->where('id_catalogo', 14)
            ->orderBy('id_catalogo', 'asc')
            ->get()
        );
    }

    public function tipoRepresentacionCatalogos(Request $request)
    {
        return json_encode(
            DB::table('valores_catalagos')
            ->select('id_valor','valor_variable')
            ->where('id_catalogo', 15)
            ->orderBy('id_catalogo', 'asc')
            ->get()
        );
    }

    public function sexoRepresentacionCatalogos(Request $request)
    {
        return json_encode(
            DB::table('valores_catalagos')
            ->select('id_valor','valor_variable')
            ->where('id_catalogo', 3)
            ->orderBy('id_catalogo', 'asc')
            ->get()
        );
    }

    public function tipoDerechosCatalogos(Request $request)
    {
        return json_encode(
            DB::table('valores_catalagos')
            ->select('id_valor','valor_variable')
            ->where('id_catalogo', 16)
            ->orderBy('id_catalogo', 'asc')
            ->get()
        );
    }

    public function tipoMedidaCatalogos(Request $request)
    {
        return json_encode(
            DB::table('valores_catalagos')
            ->select('id_valor','valor_variable')
            ->where('id_catalogo', 17)
            ->orderBy('id_catalogo', 'asc')
            ->get()
        );
    }

    public function tipoAmparoCatalogos(Request $request)
    {
        return json_encode(
            DB::table('valores_catalagos')
            ->select('id_valor','valor_variable')
            ->where('id_catalogo', 18)
            ->orderBy('id_catalogo', 'asc')
            ->get()
        );
    }

    public function faseProcesalCatalogos(Request $request)
    {
        return json_encode(
            DB::table('valores_catalagos')
            ->select('id_valor','valor_variable')
            ->where('id_catalogo', 19)
            ->orderBy('id_catalogo', 'asc')
            ->get()
        );
    }

    public function resolucionAmparoCatalogos(Request $request)
    {
        return json_encode(
            DB::table('valores_catalagos')
            ->select('id_valor','valor_variable')
            ->where('id_catalogo', 20)
            ->orderBy('id_catalogo', 'asc')
            ->get()
        );
    }

    public function mecanismosRealizarCatalogos(Request $request)
    {
        return json_encode(
            DB::table('valores_catalagos')
            ->select('id_valor','valor_variable')
            ->where('id_catalogo', 21)
            ->orderBy('id_catalogo', 'asc')
            ->get()
        );
    }

    public function paisEmplazamientoCatalogos(Request $request)
    {
        return json_encode(
            DB::table('valores_catalagos')
            ->select('id_valor','valor_variable')
            ->where('id_catalogo', 4)
            ->orderBy('id_catalogo', 'asc')
            ->get()
        );
    }

    public function estadoEmplazamientoCatalogos(Request $request)
    {
        return json_encode(
            DB::table('valores_catalagos')
            ->select('id_valor','valor_variable')
            ->where('id_catalogo', 5)
            ->orderBy('id_catalogo', 'asc')
            ->get()
        );
    }

    public function municipioEmplazamientoCatalogos(Request $request)
    {
        return json_encode(
            DB::table('valores_catalagos')
            ->select('id_valor','valor_variable')
            ->where('id_catalogo', 6)
            ->orderBy('id_catalogo', 'asc')
            ->get()
        );
    }

    public function codigoPostalCatalogos(Request $request)
    {
        return json_encode(
            DB::table('valores_catalagos')
            ->select('id_valor','valor_variable')
            ->where('id_catalogo', 22)
            ->orderBy('id_catalogo', 'asc')
            ->get()
        );
    }

    public function mecanismosRealizacionCatalogos(Request $request)
    {
        return json_encode(
            DB::table('valores_catalagos')
            ->select('id_valor','valor_variable')
            ->where('id_catalogo', 23)
            ->orderBy('id_catalogo', 'asc')
            ->get()
        );
    }

     public function siContestaCatalogos(Request $request)
    {
        return json_encode(
            DB::table('valores_catalagos')
            ->select('id_valor','valor_variable')
            ->where('id_catalogo', 24)
            ->orderBy('id_catalogo', 'asc')
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
        
        return json_encode (array('status' => $status));
    }
}
