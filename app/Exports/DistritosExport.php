<?php

namespace App\Exports;

use App\Distritos;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;

class DistritosExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DB::table('distritos')
                    ->select('nombre_distrito', 'estatus')
                    ->get();
    }
}
