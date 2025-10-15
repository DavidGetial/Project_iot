<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::create('sensors', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('code')->unique();
        $table->string('abbrev')->nullable(); // Agrega esta línea
        $table->unsignedBigInteger('id_department');
        $table->boolean('status')->default(true);
        $table->timestamps();
        $table->softDeletes();
        $table->foreign('id_department')->references('id')->on('departments')->onDelete('cascade');
    });
}

    public function down()
    {
        Schema::dropIfExists('sensors');
    }
};