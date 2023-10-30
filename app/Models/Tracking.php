<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tracking extends Model
{
    protected $table = 'tblconnote';
    public $timestamps = false;
    protected $fillable = [
        'ConnoteNo',
        'ConnoteNoReff',
        'ConnoteDate',
        'ConnoteOrderNo',
        'ConnoteOrig',
        'ConnoteDest',
        'ConnoteCustNo',
        'ConnoteLocation',
        'ConnoteCustName',
        'ConnoteCustAddr',
        'ConnoteCustTelp',
        'ConnoteCustReff',
        'ConnoteRecvName',
        'ConnoteRecvAddr',
        'ConnoteRecvTelp',
        'ConnoteRecvReff',
        // 'POrderAss',
        // 'POrderDEO',
        // 'POrderLocation',
        // 'ip_address'
    ];
}
