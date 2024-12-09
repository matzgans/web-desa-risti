<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransportationMean extends Model
{
    use HasFactory;
    protected $table = 'transportation_means';
    protected $guarded = [];

    public function village()
    {
        return $this->belongsTo(Village::class);
    }
}
