<?php

namespace Database\Seeders;

use App\Models\Colonia;
use App\Models\ColoniaRefugio;
use App\Models\Refugio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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

            $col1 = Colonia::query()
                ->where('colonia_id',$rs->idcomcol)
                ->first();
//            dd($col1);
            if ( $col1 === null ) {
                $col1 = Colonia::create([
                    'colonia1_id' => $rs->idcol1,
                    'colonia1' => trim($rs->col1),
                    'colonia_id' => $rs->idcomcol,
                    'colonia' => trim($rs->comcol),
                    'comunidad_id' => $rs->idcomunidad,
                    'comunidad' => trim($rs->comunidad),
                    'tipocomunidad_id' => $rs->idtipocomun,
                    'tipocomunidad' => trim($rs->tipocomun),
                    'creado_por_id' => 1,
                ]);
            }
            $refugio = Refugio::query()
                ->select('id')
                ->where('numero',$rs->numero)
                ->first();
            if ($refugio){

                $qry = DB::table('colonia_refugio')
                    ->where('colonia_id',$col1->id)
                    ->where('refugio_id',$refugio->id)
                    ->first();
                if ($qry == null){
                    $col1->refugios()->attach($refugio->id);
                }
            }




//            ColoniaRefugio::create([
//                'refugio_id' => $rs->idrefujio,
//                'numero' => $rs->numero,
//                'refugioruta_id' => $rs->idrefujioruta,
//                'ruta' => trim($rs->ruta),
//                'zona' => trim($rs->zona),
//                'latitud' => trim($rs->latitud),
//                'longitud' => trim($rs->longitud),
//                'colonia1_id' => $rs->idcol1,
//                'colonia1' => trim($rs->col1),
//                'colonia_id' => $rs->idcomcol,
//                'colonia' => trim($rs->comcol),
//                'comunidad_id' => $rs->idcomunidad,
//                'comunidad' => trim($rs->comunidad),
//                'tipocomunidad_id' => $rs->idtipocomun,
//                'tipocomunidad' => trim($rs->tipocomun),
//            ]);
        }
    }
}
