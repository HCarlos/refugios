<?php

namespace App\Http\Controllers\Refugios;

use App\Http\Controllers\Controller;
use App\Http\Requests\Refugios\RefugiosUpdateRequest;
use App\Models\ColoniaRefugio;
use App\Models\Refugio;
use App\Models\RutaRefugio;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Response;

class RefugiosController extends Controller {
    protected $tableName = "refugios";

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

        //dd($request->all());
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
            ->where('activado','=',1)
            ->orderByDesc('id')
            ->get();
        return $this->getDataRefugios($Refugios);
    }

    public function getrefugioShow($Refugio){
        $refugio = Refugio::find($Refugio);
        return redirect()->away('/refugios-getPosition.php?id=' . $refugio->id);
//        return redirect()->away("window.open(www.google.com');");

//        $triggersms = file_get_contents('/refugios-getPosition.php?id=' . $refugio->id);
//        return $triggersms;

    }
    public function getrefugio($Id){
            $Refugio = Refugio::query()
                ->where('id',$Id)
                ->where('activado','=',1)
                ->get();
            return  $this->getDataRefugios($Refugio);
    }

    public function getrefugiosfromcolonias($colonia_id)
    {
        $qry = ColoniaRefugio::query()
            ->where('colonia_id', $colonia_id)
            ->get();

        $arr = [];
        foreach ($qry as $q) {
            $arr[] = $q->numero;
        }
        $qry = Refugio::query()
            ->whereIn('numero', $arr)
            ->where('activado','=',1)
            ->distinct()
            ->get();

        if (count($qry) > 0) {
            return  $this->getDataRefugios($qry);
        }else{
            return $this->getrefugiosfromcomunidad($colonia_id);
        }

    }

    public function getrefugiosfromcomunidad($colonia_id)
    {
        $comunidad = ColoniaRefugio::query()
            ->select('comunidad_id')
            ->where('colonia_id',$colonia_id)
            ->first();

        $comunidad_id = $comunidad->comunidad_id;

        //dd($comunidad_id);

        $qry = ColoniaRefugio::query()
            ->where('comunidad_id', $comunidad_id)
            ->get();


        $arr = [];
        foreach ($qry as $q) {
            $arr[] = $q->numero;
        }


        if ( count($arr) > 0 ) {

            $qry = Refugio::query()
                ->whereIn('numero', $arr)
                ->distinct()
                ->get();

//            dd($qry);

            if (count($qry) > 0) {
                return $this->getDataRefugios($qry);
            } else {
                return Response::json(['mensaje' => 'No existen datos', 'data' => null, 'status' => '200'], 200);
            }
        }else{
            return Response::json(['mensaje' => 'No existen datos', 'data' => null, 'status' => '200'], 200);
        }

    }

    private function getDataRefugios($Refugios){

        $refArray = array();

//        dd(count($Refugios));

        if (count($Refugios) > 0) {

            foreach ($Refugios as $refugio) {
                //$refugio->save();
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

        }else{
            return Response::json(['mensaje' => 'No existen datos', 'data' => null, 'status' => '200'], 200);
        }

    }

    public function modificar_punto($Id){
        $refugio = Refugio::find($Id);
        $rutas = RutaRefugio::all();
        return Inertia::render('Refugios/Pointer', [
            'Refugio' => $refugio,
            'Rutas' => $rutas,
            'ruta' => $refugio->ruta->ruta,
            'status' => session('status'),
        ]);
    }

    public function savenewposition($dom, $pos, $id) {

        $pos = explode(",",$pos) ;

        $Ref = Refugio::find($id);
        $Ref->latitud = str_replace('(','',$pos[0]);
        $Ref->longitud = str_replace(')','',$pos[1]);
        $Ref->ubicacion_google = $dom;
        $Ref->save();

        return Response::json(['mensaje' => 'OK', 'data' => "Cambios efectudos con éxito", 'status' => '200'], 200);

    }


}
