<?php

namespace App\Exports;


use App\Models\Aset;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Excel;
use Maatwebsite\Excel\Concerns\WithStyles;
use Illuminate\Contracts\Support\Responsable;
use Maatwebsite\Excel\Concerns\WithProperties;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
// use PhpOffice\PhpSpreadsheet\Cell\DataType;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;


class AsetExport  extends \PhpOffice\PhpSpreadsheet\Cell\StringValueBinder implements WithStyles, WithProperties, Responsable, WithHeadings, FromView, WithCustomValueBinder
{


    use Exportable;
    private $fileName = 'Nama Aset.xlsx';
    private $headers = [
        'Content-Type' => 'text/csv',
    ];
    private $writerType = Excel::XLSX;


    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1    => ['font' => [
                'bold' => true,
                'size' => 14
                ]
            ],
            2    => ['font' => [
                'size' => 11
                ]
            ],
            'G5' => ['font' =>[ 
                'bold' => true,
                'size' => 18
                ]
            ],

            // // Styling a specific cell by coordinate.
            // 'B2' => ['font' => ['italic' => true]],

            // // Styling an entire column.
            // 'C'  => ['font' => ['size' => 16]],
        ];
    }

    public function headings(): array
    {

        return [
            ['PT. BANK NTB SYARIAH'],
            ['Jl. Pejanggik No 30 Mataram, MATARAM'],
            [''],
            [''],
            ['','','','','','',' DAFTAR NOMINATIF INVENTARIS '],
            [''],
            [''],
            [''],
            [''],
            ['No. Urut','No. Rekening','Deskripsi','QTY','Tanggal Perolehan','Tanggal Akhir','Saldo Perolehan','AKM Susut', 'Nilai Buku', 'PRS Susut', 'GSSL Induk', 'Uraian', 'Sumber Perolehan', 'Status Aset']
        ];
    }

    public function view(): View
    {
        return view('export.aset', [
            'data' => Aset::all()
        ]);
    }



    public function properties(): array
    {
        return [
            'creator'        => 'Macan',
            // 'lastModifiedBy' => 'Macan',
            'title'          => 'Aset Export',
            'description'    => 'Aset Bank NTB',
            // 'subject'        => 'Invoices',
            // 'keywords'       => 'invoices,export,spreadsheet',
            // 'category'       => 'Invoices',
            // 'manager'        => 'Patrick Brouwers',
            'company'        => 'Bank NTB',
        ];
    }

    


    
}