<?php

use App\Http\Controllers\AprendizController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/aprendices');
Route::resource('aprendices', AprendizController::class);

// TEMP: Rutas de práctica (comentar antes de producción)
// Route::get('/ping', fn() => 'pong');
// Route::get('/hola/{nombre}', fn($nombre) => "Hola, $nombre");
// Route::get('/suma/{a}/{b}', fn($a,$b) => (int)$a + (int)$b);
