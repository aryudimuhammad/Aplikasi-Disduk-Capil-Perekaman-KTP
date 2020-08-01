<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePensiunsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pensiuns', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->length(36);
            $table->unsignedBigInteger('pegawai_id');
            $table->enum('jenis_pensiun', ['1', '2', '3', '4', '5', '6']);
            $table->enum('status_berkas', ['1', '2', '3', '4', '5', '6', '7']);
            $table->text('keterangan');
            $table->enum('status', ['1', '2']);
            $table->timestamps();
            $table->foreign('pegawai_id')->references('id')->on('pegawais');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pensiuns');
    }
}
