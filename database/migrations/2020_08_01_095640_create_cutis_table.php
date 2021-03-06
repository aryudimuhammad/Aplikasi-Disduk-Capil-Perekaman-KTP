<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCutisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cutis', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->length(36);
            $table->unsignedBigInteger('pegawai_id');
            $table->unsignedBigInteger('perpanjang_id')->nullable();
            $table->enum('jenis_cuti', ['1', '2', '3', '4', '5']);
            $table->date('mulai_cuti');
            $table->date('akhir_cuti');
            $table->text('keterangan')->nullable();
            $table->enum('status', ['1', '2', '3'])->default('1');
            $table->timestamps();
            $table->foreign('pegawai_id')->references('id')->on('pegawais')->onDelete('cascade');
            // $table->foreign('perpanjang_id')->references('id')->on('perpanjangs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cutis');
    }
}
