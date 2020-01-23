<?php

namespace App\Exports;

use App\Ejemplo;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;

class EjemploExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
         return DB::table('ejemplos')
                        ->join('expedientes', 'ejemplos.id_expediente', '=', 'expedientes.id_expediente')
                        ->select('expedientes.numero_expediente','ejemplos.datos', 'ejemplos.persona', 'ejemplos.razon_social', 'ejemplos.nombre_comercial', 'ejemplos.nombre_completo', 'ejemplos.sexo', 'ejemplos.fecha_nacimiento', 'ejemplos.rfc', 'ejemplos.curp', 'ejemplos.pais', 'ejemplos.estados', 'ejemplos.municipios', 'ejemplos.nacionalidad', 'ejemplos.pais_habitual', 'ejemplos.estado_habitual', 'ejemplos.municipio_habitual', 'ejemplos.tipo_domicilio', 'ejemplos.tipo_discapacidad', 'ejemplos.situacion_conyugal', 'ejemplos.escolaridad', 'ejemplos.condicion_migratoria', 'ejemplos.habla_español', 'ejemplos.habla_lengua_indigena', 'ejemplos.tipo_lengua_indigena', 'ejemplos.habla_lengua_extranjera', 'ejemplos.trabaja_ocupacion', 'ejemplos.condicion_actividad', 'ejemplos.fuente_ingresos', 'ejemplos.ingreso_mensual', 'ejemplos.tipo_representacion', 'ejemplos.sexo_representacion')
                       ->get();
    }
}
