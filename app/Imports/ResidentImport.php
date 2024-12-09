<?php

namespace App\Imports;

use App\Models\Resident;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithValidation;

class ResidentImport implements ToModel, WithHeadingRow, WithValidation
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Resident([
            'uuid' => Str::uuid()->toString(),
            'village_id' => $row['dusun'],
            'nik' => intval($row['nik']),
            'name' => $row['nama'],
            'gender' => $row['jenis_kelamin'],
            'birth_date' => $row['tanggal_lahir'],
            'occupation' => $row['pekerjaan'],
            'status_resident' => $row['status'],
            'education_level' => $row['tingkat_pendidikan'],
        ]);
    }

    public function rules(): array
    {
        return [
            'dusun' => 'required|integer',
            'nik' => 'required|numeric|digits:16|unique:residents',
            'nama' => 'required|string|max:255|min:6',
            'jenis_kelamin' => 'required|in:Perempuan,Laki - Laki',
            'tanggal_lahir' => 'required|date',
            'pekerjaan' => 'required|string|max:255|min:6',
            'status' => 'required|string|max:255|min:6',
            'tingkat_pendidikan' => 'required|string|max:255|min:6',
        ];
    }
}
