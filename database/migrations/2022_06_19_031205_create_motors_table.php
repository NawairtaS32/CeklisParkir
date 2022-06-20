<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMotorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('motors', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user');
            $table->dateTime('waktu');
            $table->string('nopol',10)->unique();
            $table->string('type',20);
            $table->string('spion',26);
            $table->string('ban',26);
            $table->string('area_parkir',26);
            $table->string('gb_depan');
            $table->string('gb_kanan');
            $table->string('gb_belakang');
            $table->string('gb_kiri');
            $table->string('status')->nullable();
            $table->string('kondisi')->nullable();
            $table->string('keterangan')->nullable();
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
        Schema::dropIfExists('motors');
    }
}
