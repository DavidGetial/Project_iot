<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Tabla: sensor_data
    Schema::create('sensor_datas', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('id_sensor')->nullable();
        $table->unsignedBigInteger('id_station')->nullable();
        $table->float('temp_value')->nullable();
        $table->float('humidity')->nullable();
        $table->boolean('status')->default(true);
        $table->timestamps();
        $table->softDeletes();

        $table->foreign('id_sensor')->references('id')->on('sensors');
        $table->foreign('id_station')->references('id')->on('stations');
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sensor_data');
    }
};
