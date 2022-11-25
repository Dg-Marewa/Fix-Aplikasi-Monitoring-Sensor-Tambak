<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataAirTambaksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_air_tambaks', function (Blueprint $table) {
            $table->id();
            $table->float('atas');
            $table->float('bawah');
            $table->string('ph_air');
            $table->string('tinggi');
            $table->string('do');
            $table->string('waktu')->nullable();
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
        Schema::dropIfExists('data_air_tambaks');
    }
}
