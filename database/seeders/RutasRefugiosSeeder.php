<?php

namespace Database\Seeders;

use App\Models\RutaRefugio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RutasRefugiosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        RutaRefugio::create(["id" => "1","ruta" => "TABASCO 2000","zona" => "URBANA"]);
        RutaRefugio::create(["id" => "2","ruta" => "TEAPA 1","zona" => "RURAL"]);
        RutaRefugio::create(["id" => "3","ruta" => "INDECO","zona" => "URBANA"]);
        RutaRefugio::create(["id" => "4","ruta" => "PRIMERO DE MAYO","zona" => "URBANA"]);
        RutaRefugio::create(["id" => "5","ruta" => "GAVIOTAS","zona" => "URBANA"]);
        RutaRefugio::create(["id" => "6","ruta" => "TAMULTE","zona" => "URBANA"]);
        RutaRefugio::create(["id" => "7","ruta" => "MIGUEL HIDALGO","zona" => "URBANA"]);
        RutaRefugio::create(["id" => "8","ruta" => "CARDENAS","zona" => "RURAL"]);
        RutaRefugio::create(["id" => "9","ruta" => "RIO VIEJO","zona" => "RURAL"]);
        RutaRefugio::create(["id" => "10","ruta" => "BOQUERON","zona" => "RURAL"]);
        RutaRefugio::create(["id" => "11","ruta" => "TEAPA 2","zona" => "RURAL"]);
        RutaRefugio::create(["id" => "12","ruta" => "FRONTERA","zona" => "RURAL"]);
        RutaRefugio::create(["id" => "13","ruta" => "MACUSPANA","zona" => "RURAL"]);
        RutaRefugio::create(["id" => "14","ruta" => "CENTRO","zona" => "URBANA"]);
    }
}
