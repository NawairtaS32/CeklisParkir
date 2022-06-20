<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->dateTime('waktu');
            $table->bigInteger('nik')->unique();
            $table->string('name');
            $table->string('panggilan');
            $table->string('agama');
            $table->enum('status', ['kawin', 'belum kawin'])->default('belum kawin');
            $table->enum('jk', ['Laki-laki', 'Perempuan'])->default('Laki-laki');
            $table->string('alamat');
            $table->string('lokasi_kerja');
            $table->enum('jabatan', ['Staff Petugas Lapangan', 'Pengawas Petugas Parkir', 'Central Park Manager']);
            $table->bigInteger('tlp');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('gb_user');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
