<?php

namespace App\Exports;

use App\Models\Krs;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

class KrsExport implements
    FromCollection,
    WithHeadings,
    WithMapping,
    WithStyles,
    WithColumnWidths,
    WithTitle
{
    public function collection()
    {
        return Krs::with(['mahasiswa', 'mataKuliah'])->orderByDesc('id')->get();
    }
    public function title(): string
    {
        return 'Data KRS';
    }
    public function headings(): array
    {
        return [
            'No',
            'Nama Mahasiswa',
            'NPM',
            'Mata Kuliah',
            'SKS',
            'Tanggal Diambil',
        ];
    }
    public function map($krs): array
    {
        static $no = 0;
        $no++;

        return [
            $no,
            $krs->mahasiswa->nama        ?? '-',
            $krs->mahasiswa->npm         ?? '-',
            $krs->mataKuliah->nama       ?? '-',
            $krs->mataKuliah->sks        ?? '-',
            $krs->created_at->format('d/m/Y'),
        ];
    }
    public function styles(Worksheet $sheet): array
    {
        return [
            1 => [
                'font' => [
                    'bold'  => true,
                    'color' => ['argb' => 'FFFFFFFF'],
                    'size'  => 11,
                ],
                'fill' => [
                    'fillType'   => Fill::FILL_SOLID,
                    'startColor' => ['argb' => 'FF0D6EFD'],
                ],
                'alignment' => [
                    'horizontal' => Alignment::HORIZONTAL_CENTER,
                    'vertical'   => Alignment::VERTICAL_CENTER,
                ],
            ],
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 6,   // No
            'B' => 30,  // Nama Mahasiswa
            'C' => 15,  // NPM
            'D' => 35,  // Mata Kuliah
            'E' => 8,   // SKS
            'F' => 18,  // Tanggal
        ];
    }
}