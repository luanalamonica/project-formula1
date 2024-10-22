<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\EquipeController;
use App\Http\Controllers\PilotoController;
use App\Http\Controllers\NoticiaController;
use App\Http\Controllers\UsuarioController;

/*
|---------------------------------------------------------------------------
| Web Routes
|---------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/welcome', function () {
    return view('welcome');
});

// Rotas que requerem autenticação e permissões administrativas
Route::middleware(['auth', 'admin'])->group(function () {
    // Rotas para gerenciar notícias
    Route::get('/create_news', [NoticiaController::class, 'create'])->name('noticias.create');
    Route::post('/store_news', [NoticiaController::class, 'salvarNoticia'])->name('noticias.store');
    Route::get('/noticias/{id}/edit', [NoticiaController::class, 'edit'])->name('noticias.edit');
    Route::put('/noticias/{id}', [NoticiaController::class, 'update'])->name('noticias.update');
    Route::delete('/noticias/{id}', [NoticiaController::class, 'destroy'])->name('noticias.destroy');

    // Rotas para gerenciar equipes
    Route::get('/equipes/{id}/edit', [EquipeController::class, 'edit'])->name('equipes.edit');
    Route::put('/equipes/{id}', [EquipeController::class, 'update'])->name('equipes.update');
    Route::delete('/equipes/{id}', [EquipeController::class, 'destroy'])->name('equipes.destroy');

    // Rotas para gerenciar pilotos
    Route::get('/pilotos/{id}/edit', [PilotoController::class, 'edit'])->name('piloto.edit');
    Route::put('/pilotos/{id}', [PilotoController::class, 'update'])->name('piloto.update');
    Route::delete('/pilotos/{id}', [PilotoController::class, 'destroy'])->name('piloto.destroy');
});

// Rota do dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rotas que requerem autenticação
Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/scores', [DriverController::class, 'buscar'])->name('scores'); // Corrigido: só uma rota para scores

    Route::get('/news', [NoticiaController::class, 'index'])->name('news');

    Route::get('/create_news', function () {  
        return view('create_news');
    });

    Route::get('/create_scores_drivers', function () {  
        return view('create_scores_drivers');
    });

    Route::get('/create_scores_team', function () {  
        return view('create_scores_team');
    });

    Route::post('/create_news', [NewsController::class, 'salvarNoticia'])->name('create_news');

    Route::post('/create_scores_drivers', [DriverController::class, 'salvarPiloto'])->name('create_scores_drivers');

    Route::post('/create_scores_team', [TeamController::class, 'salvarEquipe'])->name('create_scores_team');

    Route::get('/drivers', [PilotoController::class, 'index'])->name('drivers.index');
});

// Rotas de registro e login
Route::get('/register', function () {  
    return view('register');
});

Route::get('/login', function () {
    return view('login');
});

require __DIR__.'/auth.php';
