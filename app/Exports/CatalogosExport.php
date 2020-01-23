<?php

namespace App\Exports;

use App\Catalogos;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;

class CatalogosExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
         return DB::table('catalogos')
                    ->select('nombre_variable', 'estatus')
                    ->get();
    }
}
