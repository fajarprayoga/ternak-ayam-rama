<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class AnakKandang extends Authenticatable
{
    //

    public $table = "anak_kandang";
    protected $fillable = [
        'nama',
        'tanggal_lahir',
        'email',
        'password',
        'alamat'
    ];

    protected $hidden = [
        'password'
    ];

  
}
