<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\EquipeController;
use App\Http\Controllers\PilotoController;
use App\Http\Controllers\NoticiaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });
    
    Route::get('/scores', function () { 
        return view('scores');
    })->name('scores');

    Route::get('/scores', [EquipeController::class, 'index'])->name('scores');
    
    Route::get('/news', function () {  
        return view('news');
    })->name('news'); 

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

    Route::get('/scores', [DriverController::class, 'buscar']) ->name('scores.index');

    Route::get('/equipes/{id}/edit', [EquipeController::class, 'edit'])->name('equipes.edit');
    Route::put('/equipes/{id}', [EquipeController::class, 'update'])->name('equipes.update');
    Route::delete('/equipes/{id}', [EquipeController::class, 'destroy'])->name('equipes.destroy');

    Route::get('/pilotos', [PilotoController::class, 'index'])->name('pilotos.index');
    Route::get('/pilotos/{id}/edit', [PilotoController::class, 'edit'])->name('piloto.edit');
    Route::put('/pilotos/{id}', [PilotoController::class, 'update'])->name('piloto.update');
    Route::delete('/pilotos/{id}', [PilotoController::class, 'destroy'])->name('piloto.destroy');
    Route::resource('pilotos', PilotoController::class);

    Route::get('/scores', [DriverController::class, 'buscar'])->name('scores');

   // Rota para exibir a lista de notícias
Route::get('/news', [NoticiaController::class, 'index'])->name('news');

// Rota para criar uma nova notícia
Route::get('/create_news', [NoticiaController::class, 'create'])->name('noticias.create');

// Rota para armazenar a nova notícia
Route::post('/store_news', [NoticiaController::class, 'salvarNoticia'])->name('noticias.store');

// Rota para editar uma notícia específica
Route::get('/noticias/{id}/edit', [NoticiaController::class, 'edit'])->name('noticias.edit');

// Rota para atualizar uma notícia específica
Route::put('/noticias/{id}', [NoticiaController::class, 'update'])->name('noticias.update');

// Rota para excluir uma notícia específica
Route::delete('/noticias/{id}', [NoticiaController::class, 'destroy'])->name('noticias.destroy');

Route::resource('noticias', NoticiaController::class);
});

Route::get('/register', function () {  
    return view('register');
});

Route::get('/login', function () {
    return view('login');
});

require __DIR__.'/auth.php';
