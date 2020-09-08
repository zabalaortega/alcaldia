<?php

namespace App\Exports;

use App\Models\Prestamo;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Events\AfterSheet;
use \Maatwebsite\Excel\Sheet;
use Carbon;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class PrestamosExport implements FromQuery, WithHeadings, WithMapping, WithTitle, ShouldAutoSize, WithEvents
{
    use Exportable;
    private $date_from;
    private $date_to;

    public function forDate($date_from, $date_to)
    {
        $this->date_from = $date_from;
        $this->date_to = $date_to;
        return $this;
    }
    
    public function query()
    {
        return Prestamo::query()->whereBetween('created_at', [$this->date_from, $this->date_to]);
       // return Prestamo::query();
    } 

    public function map($prestamo): array
    {
        return [
            $prestamo->id,
            $prestamo->user->nombre_completo,
            $prestamo->multimedia->nombre_multimedia,
            $prestamo->multimedia->serial,
            $prestamo->descripcion,
            $prestamo->created_at,
            $prestamo->fecha_salida,
            $prestamo->hora_salida
        ];
    }

    public function registerEventS(): array
    {
        return [
           
        ];
    }
    public static function afterSheep(AfterSheet $event)
    {
        $event->sheet->styleCells(
            'B1',
            [
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    'color' => ['argb' => 'FFFFOOOO']
                ]
            ]
        );
    }

    public function headings(): array 
    {
        return [
            '#',
            'Nombre Usuario',
            'Nombre Multimedia',
            'Serial Multimedia',
            'Motivo Solicitud',
            'Fecha Entrada',
            'Fecha Salida',
            'Hora Salida'
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 55,
            'B' => 45
        ];
    }

    public function title(): string
    {
        return 'Solicitudes';
    }
}
