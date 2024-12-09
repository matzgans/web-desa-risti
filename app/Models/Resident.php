<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resident extends Model
{
    use HasFactory;
    protected $tables = 'residents';

    protected $guarded = [];

    public function village()
    {
        return $this->belongsTo(Village::class);
    }
}
