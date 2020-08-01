<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKtpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ktps', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->length(36);
            $table->enum('permohonan', ['1', '2', '3']);
            $table->string('nama');
            $table->string('kk');
            $table->string('nik');
            $table->enum('jk', ['1', '2']);
            $table->enum('agama', ['1', '2', '3', '4', '5', '6']);
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->enum('status', ['1', '2']);
            $table->string('alamat');
            $table->integer('rt');
            $table->integer('rw');
            $table->string('kewarganegaraan');
            $table->enum('goldar', ['1', '2', '3', '4']);
            $table->string('pekerjaan');
            $table->string('foto');
            $table->string('email');
            $table->enum('status_ktp', ['1', '2'])->default('1');
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
        Schema::dropIfExists('ktps');
    }
}
