<?php

namespace App\Http\Controllers\Refugios;

use App\Http\Controllers\Controller;
use App\Http\Requests\Refugios\ColoniasUpdateRequest;
use App\Models\Colonia;
use App\Models\Refugio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Inertia\Inertia;

class ColoniasController extends Controller{
    protected $tableName = "colonias";

    public function index(){
        $Colonias = Colonia::query()->orderBy('colonia')->get();
        $Refugios = Refugio::query()->orderBy('refugio')->get();
        $Comunidades = Colonia::query()->select(['comunidad_id','comunidad'])->orderBy('comunidad')->distinct()->get();
        return Inertia::render('Colonias/IndexColonias', [
            'Colonias' => $Colonias,
            'Comunidades' => $Comunidades,
            'Refugios' => $Refugios,
        ]);
    }

    public function create(){
        $Comunidades = Colonia::query()->select(['comunidad_id','comunidad'])->orderBy('comunidad')->distinct()->get();
        return Inertia::render('Colonias/Create',[
            'Comunidades' => $Comunidades,
        ]);
    }

    public function save(ColoniasUpdateRequest $request) {

        $Ref = $request->manage();

        if (!isset($Ref)) {
            return redirect('colonia.create/')->with( 'error',json_decode($Ref));
        }

//        return redirect('colonia.show/'.$Ref->id)->with( 'success','Colonia guardada');

    }

    public function show($Id){
        $Colonia = Colonia::find($Id);
        $Comunidades = Colonia::query()->select(['comunidad_id','comunidad'])->orderBy('comunidad')->distinct()->get();
        return Inertia::render('Colonias/Show', [
            'Colonia' => $Colonia,
            'Comunidades' => $Comunidades,
            'status' => session('status'),
        ]);
    }

    public function edit($Id){
        $Colonia = Colonia::find($Id);
        $Comunidades = Colonia::query()->select(['comunidad_id','comunidad'])->orderBy('comunidad')->distinct()->get();
        return Inertia::render('Colonias/Create', [
            'Colonia' => $Colonia,
            'Comunidades' => $Comunidades,
            'status' => session('status'),
        ]);
    }

    public function update(ColoniasUpdateRequest $request) {

        //dd($request->all());
        $Ref = $request->manage();
        if (!isset($Ref)) {
            return redirect('colonia.edit/'.$Ref->id)->with( 'errors',json_decode($Ref));
        }

//        $this->edit($Ref->id);

        return redirect(route('colonia.edit',['Id'=>$Ref->id]) )->with( 'success','colonia actualizada');



    }




    public function indexDT(){
        $Refugios = Refugio::query()->orderBy('refugio')->get();
        //dd($Refugios);
        return Inertia::render('Colonias/ListaColoniasDT', [
            'Colonias' => $this->getQueryColonias(),
            'Refugios' => $Refugios,
        ]);
    }


    public function getcolonias(){
        return Response::json(['mensaje' => 'OK', 'data' => $this->getQueryColonias(), 'status' => '200'], 200);
    }

    private function getQueryColonias(){
        return Colonia::query()
            ->orderBy('colonia')
            ->distinct()
            ->get();
    }

    public function add(Request $request){

        $colonia_id = $request->id;
        $nuevo_refugio_id = $request->nuevo_refugio_id;
        $paso = false;

        $Col = Colonia::find($colonia_id);

        if ($Col !== null){
            try {
                $ref = Refugio::find($nuevo_refugio_id);
                $Col->Refugios()->attach($ref->id);
                $paso = true;
            }catch (\Exception $e){ }
//            dd($e->getMessage());
        }
        if ($paso){
            return redirect()->back()
                ->with('success','colonia ha sido Agregado a esta colonia.')
                ->with('mensaje','OK');
        }
        return redirect()->back()
            ->with('error','La colonia que quiere agregar, no existe')
            ->with('mensaje','Error');


    }

    public function destroy(Request $request){

        $colonia_id = $request->id;
        $numero     = $request->numero;
        $Id         = $request->Colonia_id;
        $paso       = false;

        $Col = Colonia::find($colonia_id);
        if ($Col){
            try {
                $Col->Colonias()->detach($Id);
            }catch (\Exception $e){ }
            $paso = true;
        }

        if ($paso){
            return redirect()->back()
                ->with('success','Colonía ha sido quitada de ese colonia.')
                ->with('mensaje','OK');
        }
        return redirect()->back()
            ->with('error','Los datos que se quieren eliminar, no existen')
            ->with('mensaje','Error');
    }

    public static function getColoniasStatic(){
            return  (new self)->getQueryColonias();
    }




}
