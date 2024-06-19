<?php

namespace App\Http\Controllers\Refugios;

use App\Http\Controllers\Controller;
use App\Models\ColoniaRefugio;
use App\Models\Refugio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ColoniasController extends Controller{
    protected $tableName = "colonias_refugios";


    public function getcolonias(){
        $qry = ColoniaRefugio::query()
            ->select('colonia_id','colonia','comunidad')
            ->orderBy('colonia')
            ->distinct()
            ->get();

        return Response::json(['mensaje' => 'OK', 'data' => $qry, 'status' => '200'], 200);
    }




}
