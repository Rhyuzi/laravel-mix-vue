<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\statusPOD;

class LogTracking extends Model
{
    protected $table = 'tbltracking_log';
    public $timestamps = false;
    protected $fillable = [
        'ID',
        'CPCodeID',
        'CPDate',
        'CPNumberID',
        'CPLocation',
        'CPMemo',
        'CPPegawai',
        'CPCreateBy',
        'CPCreateTime',
    ];

    public function statusPOD()
    {
        return $this->belongsTo(StatusPOD::class, 'CPCodeID', 'StatusPODId');
    }
}
