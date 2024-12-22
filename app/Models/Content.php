<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Content extends Model
{
    use HasFactory;

    // Kolom-kolom yang diizinkan untuk mass assignment
    protected $fillable = [
        'id', 
        'sambutan_pertama',
        'sambutan_kedua',
        'deskripsi_data_desa',
        'deskripsi_lokasi',
        'sejarah',
        'aparat',
        'artikel',
        'penyuratan',
    ];
}
