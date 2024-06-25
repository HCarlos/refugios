<?php

namespace App\Http\Controllers\Refugios;

use App\Http\Controllers\Controller;
use App\Models\Colonia;
use App\Models\Refugio;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Inertia\Inertia;

class ColoniasController extends Controller{
    protected $tableName = "colonias";

    public function index(){
        $Refugios = Refugio::query()->orderBy('refugio')->get();
        return Inertia::render('Refugios/ListaColonias', [
            'Colonias' => $this->getQueryColonias(),
            'Refugios' => $Refugios,
        ]);
    }


    public function getcolonias(){
        return Response::json(['mensaje' => 'OK', 'data' => $this->getQueryColonias(), 'status' => '200'], 200);
    }

    private function getQueryColonias(){
        return Colonia::query()
            ->select('colonia_id','colonia','comunidad')
            ->orderBy('colonia')
            ->distinct()
            ->get();
    }

    public function add(Request $request){

        $colonia_id = $request->colonia_id;
        $nuevo_refugio_id = $request->nuevo_refugio_id;
        $paso = false;

        $Col = Colonia::find($colonia_id);
        if ($Col){
            try {
                $Col->refugios()->attach($nuevo_refugio_id);
            }catch (\Exception $e){ }
            $paso = true;
        }
        if ($paso){
            return redirect()->back()
                ->with('success','Refugio ha sido Agregado a esta colonia.')
                ->with('mensaje','OK');
        }
        return redirect()->back()
            ->with('error','El refugio que quiere agregar, no existen')
            ->with('mensaje','Error');


    }

    public function destroy(Request $request){

        $colonia_id = $request->colonia_id;
        $numero     = $request->numero;
        $Id         = $request->id;
        $paso       = false;

        $Col = Colonia::find($colonia_id);
        if ($Col){
            try {
                $Col->refugios()->detach($Id);
            }catch (\Exception $e){ }
            $paso = true;
        }

        if ($paso){
            return redirect()->back()
                ->with('success','Colonía ha sido quitada de ese refugio.')
                ->with('mensaje','OK');
        }
        return redirect()->back()
            ->with('error','Los datos que se quieren eliminar, no existen')
            ->with('mensaje','Error');
    }





}
