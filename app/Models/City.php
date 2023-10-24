<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'tblcity';
    protected $fillable = [
        'CityCode',
        'CityProv',
        'CityName',
        'CityCamat',
        'CityLurah',
        'CityType',
        'CityRegion',
        'CityWilKer',
        'CityHub'
    ];
}
