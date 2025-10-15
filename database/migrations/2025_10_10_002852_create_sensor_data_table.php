<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('sensor_data', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_sensor');
            $table->unsignedBigInteger('id_station');
            $table->double('temp_value', 8, 2)->nullable();
            $table->double('humidity', 8, 2)->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('id_sensor')->references('id')->on('sensors')->onDelete('cascade');
            $table->foreign('id_station')->references('id')->on('stations')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('sensor_data');
    }
};