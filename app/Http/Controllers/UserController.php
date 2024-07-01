<?php

namespace App\Http\Controllers;

use App\Models\Colonia;
use App\Models\Refugio;
use App\Models\User;
use Inertia\Inertia;

class UserController extends Controller{

//return Inertia::render('Dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');


    public function dashboard(){
        $users = User::query()->paginate(1000);
        // dd($users->FullName);
        return Inertia::render('Dashboard', [
            'TotalUsuarios' => User::count(),
            'TotalRefugios' => Refugio::count(),
            'TotalColonias' => Colonia::count(),
            'TotalComunidades' => Colonia::query()->distinct('colonia1')->count(),
        ]);
    }


    public function index()
    {
//        $users = User::query()->paginate(1000);
        $users = User::query()->get();
        // dd($users->FullName);
        return Inertia::render('Users/Index', [
            'users' => $users,
        ]);
    }




}
