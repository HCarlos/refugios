<?php

namespace Database\Seeders;

use App\Models\ColoniaRefugio;
use App\Models\Refugio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ColoniasRefugiosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void{
        $json = File::json("/var/www/refugios/public/json/gvrk6z.json" );
        foreach ($json as $js) {
            $rs =  (object)($js);
            ColoniaRefugio::create([
                'refugio_id' => $rs->idrefujio,
                'numero' => $rs->numero,
                'refugioruta_id' => $rs->idrefujioruta,
                'ruta' => trim($rs->ruta),
                'zona' => trim($rs->zona),
                'latitud' => trim($rs->latitud),
                'longitud' => trim($rs->longitud),
                'colonia1_id' => $rs->idcol1,
                'colonia1' => trim($rs->col1),
                'colonia_id' => $rs->idcomcol,
                'colonia' => trim($rs->comcol),
                'comunidad_id' => $rs->idcomunidad,
                'comunidad' => trim($rs->comunidad),
                'tipocomunidad_id' => $rs->idtipocomun,
                'tipocomunidad' => trim($rs->tipocomun),
            ]);
        }
    }
}
