<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    use HasFactory;

    protected $fillable = ['primary', 'secondary'];

    // Method untuk mengambil tema yang ada (hanya satu tema)
    public static function getTheme()
    {
        return self::first() ?? new self();
    }
}

?>