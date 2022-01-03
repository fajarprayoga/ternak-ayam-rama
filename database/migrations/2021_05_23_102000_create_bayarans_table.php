<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBayaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bayaran', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('anak_kandang_id');
            $table->integer('jumlah');
            $table->string('keterangan');
            $table->date('tanggal');
            $table->string('jenis');
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
        Schema::dropIfExists('bayaran');
    }
}
