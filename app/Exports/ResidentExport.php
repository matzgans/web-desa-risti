<?php

namespace App\Exports;

use App\Models\Resident;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping; // Import WithMapping
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithProperties;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class ResidentExport implements FromCollection, WithHeadings, WithMapping, WithColumnFormatting, WithProperties
{

    public function properties(): array
    {
        return [
            'title'       => 'Data Penduduk Desa Bumela',
            'description' => 'Data penduduk terbaru',
            'subject'     => 'Data Penduduk',
            'keywords'    => 'penduduk,export,spreadsheet',
            'category'    => 'Data Penduduk',
            'manager'     => 'Kepala Desa',
            'company'     => 'Desa Bumela',
            'author' => 'Kepala Desa'
        ];
    }

    /**
     * Mengembalikan data koleksi untuk diekspor.
     *
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Resident::all();
    }

    /**
     * Memetakan data resident ke dalam format yang diinginkan.
     *
     * @param Resident $resident
     * @return array
     */
    public function map($resident): array
    {
        return [
            $resident->name,
            // Menambahkan tanda petik tunggal untuk memastikan nomor KTP di Excel ditampilkan sebagai teks
            " " . $resident->nik, // Menggunakan tanda petik tunggal
            $resident->gender,
            \Carbon\Carbon::parse($resident->birth_date)->translatedFormat('d F Y'), // Format tanggal
            $resident->occupation,
            $resident->status_resident,
            $resident->education_level,
        ];
    }

    /**
     * Menentukan format kolom untuk spreadsheet.
     *
     * @return array
     */
    public function columnFormats(): array
    {
        return [
            'B' => NumberFormat::FORMAT_TEXT, // Format kolom B sebagai teks
        ];
    }

    /**
     * Menambahkan judul kolom untuk file Excel.
     *
     * @return array
     */
    public function headings(): array
    {
        return [
            'Nama',
            'NIK',
            'Jenis Kelamin',
            'Tanggal Lahir',
            'Pekerjaan',
            'Status',
            'Pendidikan',
        ];
    }
}
