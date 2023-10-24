<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'tblcustomer';
    protected $fillable = [
        'CustNo',
        'CustLocation',
        'CustName',
        'CustAddr',
        'CustMail',
        'CustTelp',
    ];
}
