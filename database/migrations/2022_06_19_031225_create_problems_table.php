<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProblemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('problems', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user');
            $table->string('nopol');
            $table->dateTime('waktu');
            $table->bigInteger('nik');
            $table->string('gb_customer');
            $table->string('name',26);
            $table->string('agama',26);
            $table->enum('status', ['kawin', 'belum kawin']);
            $table->string('pekerjaan',26);
            $table->string('negara',26);
            $table->string('j_kendaraan',26);
            $table->string('alamat');
            $table->bigInteger('tlp');
            $table->enum('jk', ['Laki-laki', 'Perempuan']);
            $table->text('kejadian');
            $table->text('penanganan')->nullable();
            $table->text('kronologi');
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
        Schema::dropIfExists('problems');
    }
}
