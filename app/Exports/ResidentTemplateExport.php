<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ResidentTemplateExport implements FromArray, WithHeadings
{
    // Data kosong karena hanya template
    public function array(): array
    {
        return [];
    }

    // Header kolom untuk template
    public function headings(): array
    {
        return [
            'Dusun',
            'Nik',
            'Nama',
            'Jenis Kelamin',
            'Tanggal Lahir',
            'Pekerjaan',
            'Status',
            'Tingkat Pendidikan',
        ];
    }
}
