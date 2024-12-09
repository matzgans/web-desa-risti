<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LivingCondition extends Model
{
    use HasFactory;
    protected $table = 'living_conditions';
    protected $guarded = [];

    public function village()
    {
        return $this->belongsTo(Village::class);
    }
}
