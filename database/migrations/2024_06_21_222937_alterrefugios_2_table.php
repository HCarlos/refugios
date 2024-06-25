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

        $tableNames = config('refugios.table_names.catalogos');

        Schema::create('colonias', function (Blueprint $table)  use ($tableNames) {
            $table->id();
            $table->integer("colonia1_id")->default(0);
            $table->string("colonia1",500)->default("");
            $table->integer("colonia_id")->default(0)->unique();
            $table->string("colonia",500)->default("");
            $table->integer("comunidad_id")->default(0)->index();
            $table->string("comunidad",500)->default("");
            $table->integer("tipocomunidad_id")->default(0)->index();
            $table->string("tipocomunidad",50)->default("");
            $table->unsignedInteger('creado_por_id')->default(0)->nullable()->index();
            $table->string('ip',150)->default('')->nullable();
            $table->string('host',150)->default('')->nullable();
            $table->timestamps();
            $table->softDeletes();

        });

        Schema::create('colonia_refugio', function (Blueprint $table)  use ($tableNames) {
            $table->id();
            $table->integer("colonia_id")->default(0)->index();
            $table->integer("refugio_id")->default(0)->index();
            $table->unsignedInteger('creado_por_id')->default(0)->nullable()->index();
            $table->string('ip',150)->default('')->nullable();
            $table->string('host',150)->default('')->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->unique(['colonia_id','refugio_id']);


            $table->foreign('refugio_id')
                ->references('id')
                ->on($tableNames['refugios'])
                ->onDelete('cascade');

            $table->foreign('colonia_id')
                ->references('id')
                ->on($tableNames['colonias'])
                ->onDelete('cascade');


        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void{
        Schema::dropIfExists('colonia_refugio');
        Schema::dropIfExists('colonias');
    }
};
