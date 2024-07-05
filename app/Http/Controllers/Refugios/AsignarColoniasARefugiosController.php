<?php

namespace App\Http\Controllers\Refugios;

use App\Http\Controllers\Controller;
use App\Models\Colonia;
use App\Models\Refugio;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Inertia\Inertia;

class AsignarColoniasARefugiosController extends Controller{

    public function index(){
        $refugios = Refugio::query()->orderBy('refugio')->get();
        $colonias = ColoniasController::getColoniasStatic();
        //dd($refugios);
        return Inertia::render('Refugios/RefugiosAsignarColonia', [
            'Refugios' => $refugios,
            'Colonias' => $colonias,
        ]);
    }

    public function getColoniasFromRefugiosAuth(Request $request){

        $refugio_id = $request->refugio_id;

        $qry = Colonia::query()
            ->whereHas('refugios', function ( Builder $q) use ($refugio_id) {
                $q->where("refugio_id", $refugio_id);
            })
            ->orderBy('colonia')
            ->get();

        return Response::json(['mensaje' => 'OK', 'refugio_colonias' => $qry, 'status' => '200'], 200);

    }



    public function addColoniaFromRefugio(Request $request){

        $refugio_id = $request->refugio_id;
        $selected1 = $request->selected1;

        $ref = Refugio::find($refugio_id);

        foreach ($selected1 as &$colonia_id){
            try {
                $ref->colonias()->attach($colonia_id);
            }catch (\Exception $e) {
                Log::error('Error attaching: '.$e->getMessage());
            }
        }
        return $this->getColoniasFromRefugiosAuth($request);
   }

    public function removeColoniaFromRefugio(Request $request){

        $refugio_id = $request->refugio_id;
        $selected2 = $request->selected2;

        $ref = Refugio::find($refugio_id);

        foreach ($selected2 as &$colonia_id){
            try {
                $ref->colonias()->detach($colonia_id);
            }catch (\Exception $e) {
                Log::error('Error detaching: '.$e->getMessage());
            }
        }
        return $this->getColoniasFromRefugiosAuth($request);
    }



}
