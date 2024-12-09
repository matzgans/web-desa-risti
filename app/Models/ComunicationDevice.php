<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComunicationDevice extends Model
{
    use HasFactory;
    protected $table = 'comunication_devices';
    protected $guarded = [];

    public function village()
    {
        return $this->belongsTo(Village::class);
    }
}
