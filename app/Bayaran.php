<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bayaran extends Model
{
    //
    public $table = "bayaran";

    protected $fillable = [
      'anak_kandang_id',
      'jumlah',
      'keterangan',
      'tanggal',
      'jenis',
    ];

    public function anakKandang()
    {
        return $this->belongsTo('App\AnakKandang','anak_kandang_id');
    }
}
