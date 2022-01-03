<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnakKandangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anak_kandang', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->date('tanggal_lahir');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('alamat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anak_kandang');
    }
}
