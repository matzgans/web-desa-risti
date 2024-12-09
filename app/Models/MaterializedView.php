<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaterializedView extends Model
{
    use HasFactory;

    protected $table = 'materialized_views';
    protected $guarded = [];
}
