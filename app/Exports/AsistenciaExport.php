<?php

namespace App\Exports;

use App\Models\Inscripcion;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class AsistenciaExport implements FromCollection, WithHeadings, WithStyles
{
    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true]],
        ];
    }

    public function headings():array{
        return[
            'Tema',
            'Tipo de evento',
            'Nombre',
            'Correo electrónico',
            'Celular',
            'Institución/Empresa',
            'Grado de formación',
        ];
    } 

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Inscripcion::join('eventos', 'inscripcions.evento_id', 'eventos.id')
                                    ->select('eventos.tema', 'eventos.tipoEvento', 'inscripcions.nombre', 'inscripcions.email', 'inscripcions.celular', 'inscripcions.institucion', 'inscripcions.nivelFormacion')
                                    ->where('inscripcions.asiste', '1')
                                    ->orderBy('eventos.tipoEvento')
                                    ->get();
    }
}
