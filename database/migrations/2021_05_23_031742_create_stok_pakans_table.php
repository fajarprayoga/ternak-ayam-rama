<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStokPakansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stok_pakan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('tgl_stok');
            $table->string('tipe');
            $table->integer('jumlah');
            $table->integer('jadwal_id')->nullable();
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
        Schema::dropIfExists('stok_pakan');
    }
}
