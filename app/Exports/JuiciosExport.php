<?php

namespace App\Exports;

use App\Juicios;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;


class JuiciosExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
         return  DB::table('juicios')
                       ->join('materias', 'juicios.id_materia', '=', 'materias.id_materia')
                       ->select('juicios.nombre_juicio', 'juicios.estatus', 'materias.nombre_materia')
                       ->get();
    }
}
