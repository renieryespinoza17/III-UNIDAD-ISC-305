<?php
use App\Http\Controllers\PersonaController;
use Illuminate\Support\Facades\Route;
Route::get('/hola', function () {
    return response()->json([
        'mensaje' => 'Hola mundo desde mi API Laravel',
        'asignatura' => 'ISC-305 Programación Web',
    ]);
});
Route::get('/personas', [PersonaController::class, 'index']); 
Route::get('/personas/{id}', [PersonaController::class, 'show']) ->whereNumber('id');

Route::post('/personas', [PersonaController::class, 'store']);