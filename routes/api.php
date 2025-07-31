<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TestsoftwareController;
use App\Http\Controllers\MaestroController;
use App\Http\Controllers\DocumentoController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\ColaboradorController;

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:api')->group(function () {
    Route::get('login', [AuthController::class, 'login']);
    Route::post('me', [AuthController::class, 'userProfile']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    
    Route::prefix('maestro')->group(function () {    
        Route::post('tipodocidesel', [MaestroController::class, 'tipodocidesel']);
    });
    
    Route::prefix('colaborador')->group(function () {    
        Route::post('colaboradorsel', [ColaboradorController::class, 'colaboradorsel']);
        Route::post('equipotestersel', [ColaboradorController::class, 'equipotestersel']);
        Route::post('equipocalidadsel', [ColaboradorController::class, 'equipocalidadsel']);
    });
    
    Route::prefix('testsoftware')->group(function () {
        Route::post('estadoescenariopruebasel', [TestsoftwareController::class, 'estadoescenariopruebasel']);
        Route::post('estadocasopruebasel', [TestsoftwareController::class, 'estadocasopruebasel']);
        Route::post('aplicacionsel', [TestsoftwareController::class, 'aplicacionsel']);
        Route::post('aplicacionmodulo', [TestsoftwareController::class, 'aplicacionmodulo']);
        Route::post('tipopruebasel', [TestsoftwareController::class, 'tipopruebasel']);
        Route::post('escenariopruebasel', [TestsoftwareController::class, 'escenariopruebasel']);
        Route::post('escenariopruebareg', [TestsoftwareController::class, 'escenariopruebareg']);
        Route::post('escenariopruebaact', [TestsoftwareController::class, 'escenariopruebaact']);
        Route::post('casopruebareg', [TestsoftwareController::class, 'casopruebareg']);
        Route::post('casopruebasel', [TestsoftwareController::class, 'casopruebasel']);
        Route::post('casopruebaact', [TestsoftwareController::class, 'casopruebaact']);
        Route::post('casopruebatrazasel', [TestsoftwareController::class, 'casopruebatrazasel']);
        Route::post('casopruebatrazareg', [TestsoftwareController::class, 'casopruebatrazareg']);
        Route::post('casopruebatrazaact', [TestsoftwareController::class, 'casopruebatrazaact']);
        Route::post('criticidadcasopruebatrazasel', [TestsoftwareController::class, 'criticidadcasopruebatrazasel']);
    });
});
