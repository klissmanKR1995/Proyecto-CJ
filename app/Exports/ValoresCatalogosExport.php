<?php

namespace App\Exports;

use App\ValoresCatalogos;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;

class ValoresCatalogosExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DB::table('valores_catalagos')
                       ->join('catalogos', 'valores_catalagos.id_catalogo', '=', 'catalogos.id_catalogo')
                       ->select('catalogos.nombre_variable', 'valores_catalagos.valor_variable')
                       ->get();
    }
}
