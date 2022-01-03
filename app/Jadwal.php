<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    //
    public $table = "jadwal";

    protected $fillable = [
        'tanggal',
        'jenis_jadwal',
        'status',
        'jumlah_ayam',
        'harga',
    ];
}
