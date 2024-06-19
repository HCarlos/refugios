<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $tableNames = config('refugios.table_names.catalogos');


        Schema::create('colonias_refugios', function (Blueprint $table)  use ($tableNames) {
            $table->id();
            $table->integer('refugio_id')->default(0)->index();
            $table->integer('numero')->default(0)->index();
            $table->string("latitud",50)->default("");
            $table->string("longitud",50)->default("");
            $table->integer("refugioruta_id")->default(1)->index();
            $table->string("ruta",50)->default("");
            $table->string("zona",50)->default("");
            $table->smallInteger("activado")->default(0)->index();
            $table->integer("refugiocolonia_id")->default(1)->index();
            $table->integer("colonia1_id")->default(0)->index();
            $table->string("colonia1",500)->default("");
            $table->integer("colonia_id")->default(0)->index();
            $table->string("colonia",500)->default("");
            $table->integer("comunidad_id")->default(0)->index();
            $table->string("comunidad",500)->default("");
            $table->integer("tipocomunidad_id")->default(0)->index();
            $table->string("tipocomunidad",50)->default("");
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('refugioruta_id')
                ->references('id')
                ->on($tableNames['refugios_ruta'])
                ->onDelete('cascade');

            $table->foreign('refugio_id')
                ->references('id')
                ->on($tableNames['refugios'])
                ->onDelete('cascade');

            $table->foreign('refugiocolonia_id')
                ->references('id')
                ->on($tableNames['refugios'])
                ->onDelete('cascade');

        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('colonias_refugios');
    }
};
