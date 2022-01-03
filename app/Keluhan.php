<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keluhan extends Model
{
    //

    public $table = "keluhan";
    protected $fillable = [
        'anak_kandang_id',
        'title',
        'keluhan',
        'obat_id',
    ];


    public function anakKandang()
    {
        return $this->belongsTo('App\AnakKandang','anak_kandang_id');
    }

    public function obat()
    {
        return $this->belongsTo('App\Obat','obat_id');
    }
}
