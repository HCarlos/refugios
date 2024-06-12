<?php

use App\Http\Controllers\Refugios\RefugiosController;
use App\Http\Controllers\Refugios\RutasController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/about', fn () => Inertia::render('About'))->name('about');

    Route::get('users', [UserController::class, 'index'])->name('users.index');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Refugios
    Route::get('refugios', [RefugiosController::class, 'index'])->name('refugios.index');
    Route::get('refugio.create', [RefugiosController::class, 'create'])->name('refugio.create');
    Route::get('refugio.edit/{Id}', [RefugiosController::class, 'edit'])->name('refugio.edit');
    Route::post('refugio.save', [RefugiosController::class, 'save'])->name('refugio.save');
    Route::put('refugio.update', [RefugiosController::class, 'update'])->name('refugio.update');
    Route::post('refugio.destroy', [RefugiosController::class, 'destroy'])->name('refugio.destroy');
    Route::get('refugio.show/{Id}', [RefugiosController::class, 'show'])->name('refugio.show');

    // Route::get('modificar_punto/{Id}', [RefugiosController::class, 'modificar_punto'])->name('modificar_punto');
    Route::get('modificar_punto/{Id}', [RefugiosController::class, 'modificar_punto'])->name('modificar_punto');


});

Route::get('getrutas', [RutasController::class, 'getrutas'])->name('getrutas');
Route::get('refugiospublic', [RefugiosController::class, 'indexpublic'])->name('refugiospublic');
Route::get('refugiosporruta/{Refugiorutaid}', [RefugiosController::class, 'refugiosporruta'])->name('refugiosporruta');
Route::get('getrefugioShow/{Refugio}', [RefugiosController::class, 'getrefugioShow'])->name('getrefugioShow');
Route::get('getrefugio/{Id}', [RefugiosController::class, 'getrefugio'])->name('getrefugio');
Route::get('savenewposition/{dom}/{pos}/{id}', [RefugiosController::class, 'savenewposition'])->name('savenewposition');

require __DIR__.'/auth.php';
