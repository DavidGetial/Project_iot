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
        // Tabla: cities
    Schema::create('cities', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('code')->nullable();
        $table->string('abbrev')->nullable();
        $table->boolean('status')->default(true);
        $table->unsignedBigInteger('id_department')->nullable();
        $table->timestamps();
        $table->softDeletes();

        $table->foreign('id_department')->references('id')->on('departments');
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cities');
    }
};
