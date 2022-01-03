<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StokPakan extends Model
{
    //
    public $table = "stok_pakan";
    protected $fillable = [
        'tgl_stok',
        'tipe',
        'jumlah',
        'jadwal_id',
    ];
}
