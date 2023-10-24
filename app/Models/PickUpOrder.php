<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PickUpOrder extends Model
{
    protected $table = 'tblpickuporder';
    public $timestamps = false;
    protected $fillable = [
        'POrderNo',
        'POrderDate',
        'POrderCustNo',
        'POrderCustName',
        'POrderCustAddr',
        'POrderCustPerson',
        'POrderOrig',
        'POrderDest',
        'POrderRecvName',
        'POrderRecvAddr',
        'POrderRecvTelp',
        'POrderRecvPerson',
        'POrderQty',
        'POrderWeight',
        'POrderIsi',
        'POrderService',
        'POrderAss',
        'POrderDEO',
        'POrderLocation',
        'ip_address'
    ];
}
