<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'tblservice';
    protected $fillable = [
        'id',
        'ServiceName',
        'ServiceKet',
        'NODB_CASH',
        'NODB_NONCASH',
        'NOCR',
    ];
}
