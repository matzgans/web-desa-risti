<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Village extends Model
{
    use HasFactory;
    protected $table = 'villages';
    protected $guarded = [];

    // Relasi One to One dengan EducationLevel
    public function educationLevel()
    {
        return $this->hasOne(EducationLevel::class);
    }
    public function transportationMean()
    {
        return $this->hasOne(TransportationMean::class);
    }
    public function comunityEconomy()
    {
        return $this->hasOne(ComunityEconomy::class);
    }
    public function livingCondition()
    {
        return $this->hasOne(LivingCondition::class);
    }
    public function farm()
    {
        return $this->hasOne(Farm::class);
    }
    public function comunication_devices()
    {
        return $this->hasOne(ComunicationDevice::class);
    }
    // Relasi One toMany dengan EducationLevel
    public function residents()
    {
        return $this->hasMany(Resident::class);
    }
}
