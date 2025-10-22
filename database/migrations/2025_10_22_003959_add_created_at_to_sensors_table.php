<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCreatedAtToSensorsTable extends Migration
{
    public function up()
    {
        Schema::table('sensors', function (Blueprint $table) {
            if (!Schema::hasColumn('sensors', 'created_at')) {
                $table->timestamp('created_at')->nullable();
            }
        });
    }

    public function down()
    {
        Schema::table('sensors', function (Blueprint $table) {
            if (Schema::hasColumn('sensors', 'created_at')) {
                $table->dropColumn('created_at');
            }
        });
    }
}