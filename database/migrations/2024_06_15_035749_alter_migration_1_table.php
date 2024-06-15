<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void{

        if (Schema::hasTable('refugios')) {
            Schema::table('refugios', function (Blueprint $table) {
                $table->unique('numero');
            });
        }

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('refugios')) {
            Schema::table('refugios', function (Blueprint $table)  {
                $table->dropUnique('refugios_numero_unique');
            });
        }

    }
};
