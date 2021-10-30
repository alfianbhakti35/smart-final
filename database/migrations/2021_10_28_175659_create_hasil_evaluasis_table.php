<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHasilEvaluasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hasil_evaluasis', function (Blueprint $table) {
            $table->id();
            $table->integer('mahasiswa_id');
            $table->integer('materi_id');
            $table->integer('matakuliah_id');
            $table->integer('dosen_id');
            $table->integer('nilai');
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
        Schema::dropIfExists('hasil_evaluasis');
    }
}
