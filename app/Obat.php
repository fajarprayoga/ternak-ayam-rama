<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    //
        //
        public $table = "obat";
        protected $fillable = [
            'id',
            'nama',
            'jenis',
        ];
    
}
