<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePegawaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawais', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->length(36);
            $table->string('nip');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('instansi_id');
            $table->unsignedBigInteger('unit_id');
            $table->unsignedBigInteger('satuan_id');
            $table->unsignedBigInteger('golongan_id');
            $table->unsignedBigInteger('jabatan_id');
            $table->date('tgl_masuk');
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->enum('jk', ['1', '2']);
            $table->enum('agama', ['1', '2', '3', '4', '5', '6']);
            $table->enum('goldar', ['1', '2', '3', '4']);
            $table->enum('status', ['1', '2']);
            $table->string('kependudukan');
            $table->string('alamat');
            $table->string('kodepos');
            $table->string('telp');
            $table->timestamps();
            $table->foreign('instansi_id')->references('id')->on('instansis');
            $table->foreign('unit_id')->references('id')->on('units');
            $table->foreign('satuan_id')->references('id')->on('satuans');
            $table->foreign('golongan_id')->references('id')->on('golongans');
            $table->foreign('jabatan_id')->references('id')->on('jabatans');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pegawais');
    }
}
