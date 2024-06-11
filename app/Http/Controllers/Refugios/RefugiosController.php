<?php

namespace App\Http\Controllers\Refugios;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Requests\Refugios\RefugiosUpdateRequest;
use App\Models\Refugio;
use App\Models\RutaRefugio;
use App\Models\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
//use Inertia\Response;
use Illuminate\Support\Facades\Response;

class RefugiosController extends Controller {

    public function index()
    {
        return Inertia::render('Refugios/Index', [
            'Refugios' => Refugio::query()->orderBy('numero')->paginate(1000)
        ]);
    }

    public function create(){
        $rr = RutaRefugio::query()->select(['id','ruta'])->orderBy('ruta')->get();

        // dd($rr);

        return Inertia::render('Refugios/Create',[
            'Rutas' => $rr,
            ]);
    }

    public function save(RefugiosUpdateRequest $request) {

        $Ref = $request->manage();

        if (!isset($Ref)) {
            return redirect('refugio.create/')->with( 'error',json_decode($Ref));
        }
        return redirect('refugio.show/'.$Ref->id)->with( 'success','Refugio guardado');

    }

    public function show($Id)
    {
        $refugio = Refugio::find($Id);
        $rutas = RutaRefugio::all();
        return Inertia::render('Refugios/Show', [
            'Refugio' => $refugio,
            'Rutas' => $rutas,
            'ruta' => $refugio->ruta->ruta,
            'status' => session('status'),
        ]);
    }

    public function edit($Id)
    {
        $refugio = Refugio::find($Id);
        $rutas = RutaRefugio::all();
        return Inertia::render('Refugios/Create', [
            'Refugio' => $refugio,
            'Rutas' => $rutas,
            'ruta' => $refugio->ruta->ruta,
            'status' => session('status'),
        ]);
    }

    public function update(RefugiosUpdateRequest $request) {
        $Ref = $request->manage();
        if (!isset($Ref)) {
            return redirect('refugio.create/')->with( 'error',json_decode($Ref));
        }
        return redirect('refugio.show/'.$Ref->id)->with( 'success','Refugio actualizado');
    }

    public function destroy(Request $request)
    {
        //dd($request->id);
        $refugio = Refugio::find($request->id);
        $refugio->delete();
        // return Redirect::to('/');
        return redirect('refugios')->with('success','Refugio eliminado con éxito.');
    }

    public function indexpublic(Request $request){
        $Refugios = Refugio::query()
            ->where('latitud', '>', 0)
            ->where('activado', 1)
            ->orderByDesc('id')
            ->get();
        return $this->getDataRefugios($Refugios);
    }

    public function refugiosporruta($Refugiorutaid){
        $Refugios = Refugio::query()
            ->where('refugiorutaid', $Refugiorutaid)
            ->where('activado', 1)
            ->orderByDesc('id')
            ->get();
        return $this->getDataRefugios($Refugios);
    }

    private function getDataRefugios($Refugios){

        $refArray = array();
        foreach ($Refugios as $refugio) {
            $refugio->save();
            $fill = [
                'id'=> $refugio->id,
                'numero' => $refugio->numero,
                'refugio' => $refugio->refugio,
                'ubicacion' => $refugio->ubicacion,
                'ubicacion_google' => $refugio->ubicacion_google,
                'enlace' => $refugio->enlace,
                'telefonos' => $refugio->telefonos,
                'observaciones' => $refugio->observaciones,
                'latitud' => $refugio->latitud,
                'longitud' => $refugio->longitud,
                'html' => $refugio->html,
                'infraestructura' => $refugio->infraestructura,
                'capacidad' => $refugio->capacidad,
                'activado' => $refugio->activado,
                'poligono' => $refugio->poligono,
                'categoria' => $refugio->categoria,
                'imagen' => $refugio->imagen,
                'refugiorutaid' => $refugio->refugiorutaid,
                'ruta' => $refugio->ruta->ruta,
                'zona' => $refugio->ruta->zona,
            ];
            // $refArray-> = $fill;
            $refArray[] = $fill;
        }

        return Response::json(['mensaje' => 'OK', 'data' => $refArray, 'status' => '200'], 200);

    }


}
