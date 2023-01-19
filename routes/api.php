<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [AuthController::class, 'login']);

Route::group(['prefix' => 'deportes', 'middleware'],function($router){
    Route::get('listar',[DeportesController::class, 'index']);
    Route::post('create',[DeportesController::class, 'create']);
    Route::get('listarUno/{id}',[DeportesController::class], 'show');
    Route::put('actualizar/{id}', [DeportesController::class], 'update');
    Route::delete('delete/{id}', [DeportesController::class], 'destroy');
});

Route::group(['prefix' => 'sport', 'middleware'],function($router){
    Route::get('listar',[SportController::class, 'index']);
    Route::post('create',[SportController::class, 'create']);
    Route::get('listarUno/{id}',[SportController::class], 'show');
    Route::put('actualizar/{id}', [SportController::class], 'update');
    Route::delete('delete/{id}', [SportController::class], 'destroy');
});

Route::group(['prefix' => 'equipos', 'middleware'],function($router){
    Route::get('listar',[EquiposController::class, 'index']);
    Route::post('create',[EquiposController::class, 'create']);
    Route::get('listarUno/{id}',[EquiposController::class], 'show');
    Route::put('actualizar/{id}', [EquiposController::class], 'update');
    Route::delete('delete/{id}', [EquiposController::class], 'destroy');
});

Route::group(['prefix' => 'coach', 'middleware'],function($router){
    Route::get('listar',[CoachController::class, 'index']);
    Route::post('create',[CoachController::class, 'create']);
    Route::get('listarUno/{id}',[CoachController::class], 'show');
    Route::put('actualizar/{id}', [CoachController::class], 'update');
    Route::delete('delete/{id}', [CoachController::class], 'destroy');
});

