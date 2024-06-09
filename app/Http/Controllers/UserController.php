<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;

class UserController extends Controller
{
    public function index()
    {
        $users = User::query()->paginate(1000);
        // dd($users->FullName);
        return Inertia::render('Users/Index', [
            'users' => $users,
        ]);
    }
}
