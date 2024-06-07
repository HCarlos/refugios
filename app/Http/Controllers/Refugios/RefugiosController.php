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
use Inertia\Response;

class RefugiosController extends Controller {

    public function index()
    {
        return Inertia::render('Refugios/Index', [
            'Refugios' => Refugio::query()->orderByDesc('id')->paginate(1000)
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



}
