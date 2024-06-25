<?php

namespace App\Http\Controllers\Refugios;

use App\Http\Controllers\Controller;
use App\Models\Refugio;
use App\Models\RutaRefugio;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Response;

class RutasController extends Controller{

    public function getrutas(Request $request){
        $item = RutaRefugio::query()->orderBy('ruta')->get();
        return Response::json(['mensaje' => 'OK', 'data' => $item, 'status' => '200'], 200);


    }



}
