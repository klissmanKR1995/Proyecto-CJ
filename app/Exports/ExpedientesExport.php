<?php

namespace App\Exports;

use App\Expedientes;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;

class ExpedientesExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
         return DB::table('expedientes')
                        ->join('juicios', 'expedientes.id_juicio', '=', 'juicios.id_juicio')
                        ->join('materias', 'expedientes.id_materia', '=', 'materias.id_materia')
                        ->join('juzgados', 'expedientes.id_juzgado', '=', 'juzgados.id_juzgado')
                        ->select('expedientes.numero_expediente', 'materias.nombre_materia', 'juzgados.nombre_juzgado', 'expedientes.nombre_actor', 'expedientes.nombre_demandado', 'expedientes.fecha_en_tribunal', 'expedientes.fecha_en_juzgado', 'juicios.nombre_juicio')
                       ->get();
    }
}
