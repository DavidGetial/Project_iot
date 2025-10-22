<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifySensorsTable extends Migration
{
    public function up()
    {
        Schema::table('sensors', function (Blueprint $table) {
            // Agregar o modificar columnas según sea necesario
            if (!Schema::hasColumn('sensors', 'name')) {
                $table->string('name', 255);
            }
            if (!Schema::hasColumn('sensors', 'code')) {
                $table->string('code', 50);
            }
            if (!Schema::hasColumn('sensors', 'abbrev')) {
                $table->string('abbrev', 10)->nullable();
            }
            if (!Schema::hasColumn('sensors', 'id_department')) {
                $table->foreignId('id_department')->constrained('departments')->onDelete('cascade');
            }
            if (!Schema::hasColumn('sensors', 'status')) {
                $table->boolean('status')->default(true);
            }
            if (!Schema::hasColumn('sensors', 'deleted_at')) {
                $table->softDeletes();
            }
        });
    }

    public function down()
    {
        Schema::table('sensors', function (Blueprint $table) {
            // Revertir los cambios si es necesario
            $table->dropColumn(['id','name', 'code', 'abbrev', 'status']);
            $table->dropForeign(['id_department']);
            $table->dropColumn('deleted_at');
        });
    }
}