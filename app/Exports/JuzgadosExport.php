<?php

namespace App\Exports;

use App\Juzgados;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;

class JuzgadosExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {

        return DB::table('juzgados')
                       ->join('distritos', 'juzgados.id_distrito', '=', 'distritos.id_distrito')
                       ->select('juzgados.nombre_juzgado', 'juzgados.estatus', 'distritos.nombre_distrito')
                       ->get();
    }
}
