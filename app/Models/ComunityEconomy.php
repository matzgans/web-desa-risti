<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComunityEconomy extends Model
{
    use HasFactory;
    protected $table = 'comunity_economies';
    protected $guarded = [];

    public function village()
    {
        return $this->belongsTo(Village::class);
    }
}
