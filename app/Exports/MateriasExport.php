<?php

namespace App\Exports;

use App\Materias;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;

class MateriasExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
         return DB::table('materias')
                    ->select('nombre_materia', 'estatus')
                    ->get();
    }
}
