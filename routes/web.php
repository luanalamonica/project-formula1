<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;

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
    });
    
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
});

Route::get('/register', function () {  
    return view('register');
});

Route::get('/login', function () {
    return view('login');
});

require __DIR__.'/auth.php';
