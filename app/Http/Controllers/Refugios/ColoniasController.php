<?php

namespace App\Http\Controllers\Refugios;

use App\Http\Controllers\Controller;
use App\Models\ColoniaRefugio;
use App\Models\Refugio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Inertia\Inertia;

class ColoniasController extends Controller{
    protected $tableName = "colonias_refugios";

    public function index(){


        return Inertia::render('Refugios/ListaColonias', [
            'Colonias' => $this->getQueryColonias(),
        ]);
    }


    public function getcolonias(){

        return Response::json(['mensaje' => 'OK', 'data' => $this->getQueryColonias(), 'status' => '200'], 200);
    }

    private function getQueryColonias(){
        return ColoniaRefugio::query()
            ->select('colonia_id','colonia','comunidad')
            ->orderBy('colonia')
            ->distinct()
            ->get();
    }




}
