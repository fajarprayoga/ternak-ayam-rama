<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    //
    public $table = "pengeluaran";
    protected $fillable = [
        'id',
        'judul',
        'jumlah',
        'jadwal_id',
        'anak_kandang_id',
        'status'
    ];

    public function anak_kandang()
    {
        return $this->belongsTo('App\AnakKandang','anak_kandang_id');
    }

}
