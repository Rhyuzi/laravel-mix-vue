<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusPOD extends Model
{
    protected $table = 'tblstatuspod';
    protected $fillable = [
        'StatusPODId',
        'StatusPODName',
        'StatusPODPrimary',
        'StatusGroup',
    ];
}
