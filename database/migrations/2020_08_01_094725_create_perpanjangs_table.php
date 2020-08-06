<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerpanjangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perpanjangs', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->length(36);
            $table->date('mulai');
            $table->date('akhir');
            $table->string('keterangan')->nullable();
            $table->string('bukti');
            $table->enum('status', ['1', '2', '3'])->default('1');
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
        Schema::dropIfExists('perpanjangs');
    }
}
