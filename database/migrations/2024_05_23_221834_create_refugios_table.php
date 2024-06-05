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

        Schema::create('refugios_ruta', function (Blueprint $table) {
            $table->id();
            $table->string("ruta",50)->default("");
            $table->string("zona",50)->default("");
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('refugios', function (Blueprint $table) use ($tableNames) {
            $table->id();
            $table->integer("numero")->default(0);
            $table->string("refugio",250)->default("");
            $table->string("ubicacion",250)->default("");
            $table->string("ubicacion_google",250)->default("");
            $table->string("infraestructura",250)->default("");
            $table->integer("capacidad")->default(0);
            $table->string("enlace",250)->default("");
            $table->string("telefonos",250)->default("");
            $table->string("observaciones",250)->default("");
            $table->string("latitud",50)->default("");
            $table->string("longitud",50)->default("");
            $table->text("html",4000)->default("");
            $table->smallInteger("activado")->default(1)->comment("0=No, 1=Si");
            $table->string("poligono",1000)->default("");
            $table->string("categoria",100)->default("REFUGIO")->comment("REFUGIO, CENTRO DE ACOPIO");
            $table->string("imagen",100)->default("1.gif");
            $table->integer("refugiorutaid")->default(0)->index();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('refugiorutaid')
                ->references('id')
                ->on($tableNames['refugios_ruta'])
                ->onDelete('cascade');

        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('refugios_ruta');
        Schema::dropIfExists('refugios');
    }
};
