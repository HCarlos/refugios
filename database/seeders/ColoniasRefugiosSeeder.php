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
        $json = File::json(public_path() . "/storage/externo/file.json" );
        foreach ($json as $js) {
            $rs =  (object)($js);
//            $ref = Refugio::find($rs->idrefujio);
//            if ($ref){
                ColoniaRefugio::create([
                    'refugio_id' => $rs->idrefujio,
                    'refugioruta_id' => $rs->idrefujioruta,
                    'ruta' => trim($rs->ruta),
                    'colonia_id' => $rs->idcomcol,
                    'colonia' => trim($rs->comcol),
                    'comunidad_id' => $rs->idcomunidad,
                    'comunidad' => trim($rs->comunidad),
                    'tipocomunidad_id' => $rs->idtipocomun,
                    'tipocomunidad' => trim($rs->tipocomun),
                ]);
//            }
        }
    }
}
