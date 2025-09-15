<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\MaestroController;
use App\Http\Controllers\AgenteController;
use App\Http\Controllers\ArchivoController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\SedeController;
use App\Http\Controllers\TemayudaController;
use App\Http\Controllers\TrazabilidadController;
use App\Http\Controllers\SeguridadController;
use App\Http\Controllers\FilePreviewController;

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:api')->group(function () {
    Route::get('login', [AuthController::class, 'login']);
    Route::post('me', [AuthController::class, 'userProfile']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    
    Route::post('/files/base64-from-path', [FilePreviewController::class, 'base64FromPath'])->name('files.base64FromPath');

    Route::prefix('maestro')->group(function () {    
        Route::post('tipodocidesel', [MaestroController::class, 'tipodocidesel']);
        Route::post('origensel', [MaestroController::class, 'origensel']);
        Route::post('usuariotkt', [MaestroController::class, 'usuariotkt']);
    });
    
    Route::prefix('seguridad')->group(function () {    
        Route::post('perfilusuarioobjetosel', [SeguridadController::class, 'perfilusuarioobjetosel']);
        Route::post('perfilusuarioapp', [SeguridadController::class, 'perfilusuarioapp']);
        Route::post('cambiarclave', [SeguridadController::class, 'cambiarclave']);
    });
    
    Route::prefix('ticket')->group(function () {
        Route::post('agentegra', [AgenteController::class, 'agentegra']);
        Route::post('agentesel', [AgenteController::class, 'agentesel']);
        Route::post('agenteman', [AgenteController::class, 'agenteman']);
        Route::post('agenteanu', [AgenteController::class, 'agenteanu']);
        Route::post('equipoagentereg', [AgenteController::class, 'equipoagentereg']);
        Route::post('archivossel', [ArchivoController::class, 'archivossel']);
        Route::post('archivosanu', [ArchivoController::class, 'archivosanu']);
        Route::post('areausuarioanu', [AreaController::class, 'areausuarioanu']);
        Route::post('areausuariogra', [AreaController::class, 'areausuariogra']);
        Route::post('areausuariosel', [AreaController::class, 'areausuariosel']);
        Route::post('equipogra', [TicketController::class, 'equipogra']);
        Route::post('equiposel', [TicketController::class, 'equiposel']);
        Route::post('estadossel', [TicketController::class, 'estadossel']);
        Route::post('estadosrespuestasel', [TicketController::class, 'estadosrespuestasel']);
        Route::post('prioridadsel', [TicketController::class, 'prioridadsel']);
        Route::post('rutassel', [TicketController::class, 'rutassel']);
        Route::post('serviciossel', [TicketController::class, 'serviciossel']);
        Route::post('sedeanu', [SedeController::class, 'sedeanu']);
        Route::post('sedegra', [SedeController::class, 'sedegra']);
        Route::post('sedessel', [SedeController::class, 'sedessel']);
        Route::post('sedeusuarioanu', [SedeController::class, 'sedeusuarioanu']);
        Route::post('sedeusuariogra', [SedeController::class, 'sedeusuariogra']);
        Route::post('sedeusuariosel', [SedeController::class, 'sedeusuariosel']);
        Route::post('temaayudaanu', [TemayudaController::class, 'temaayudaanu']);
        Route::post('temaayudahij', [TemayudaController::class, 'temaayudahij']);
        Route::post('temaayudahlp', [TemayudaController::class, 'temaayudahlp']);
        Route::post('temaayudapad', [TemayudaController::class, 'temaayudapad']);
        Route::post('temaayudareg', [TemayudaController::class, 'temaayudareg']);
        Route::post('temaayudarut', [TemayudaController::class, 'temaayudarut']);
        Route::post('temaayudasel', [TemayudaController::class, 'temaayudasel']);
        Route::post('ticketsanu', [TicketController::class, 'ticketsanu']);
        Route::post('ticketsasg', [TicketController::class, 'ticketsasg']);
        Route::post('ticketsate', [TicketController::class, 'ticketsate']);
        Route::post('ticketscer', [TicketController::class, 'ticketscer']);
        Route::post('ticketsgra', [TicketController::class, 'ticketsgra']);
        Route::post('ticketsrea', [TicketController::class, 'ticketsrea']);
        Route::post('ticketsres', [TicketController::class, 'ticketsres']);
        Route::post('ticketsrus', [TicketController::class, 'ticketsrus']);
        Route::post('ticketssel', [TicketController::class, 'ticketssel']);
        Route::post('ticketslis', [TicketController::class, 'ticketslis']);
        Route::post('ticketsver', [TicketController::class, 'ticketsver']);
        Route::post('ticketsdsh', [TicketController::class, 'ticketsdsh']);
        Route::post('ticketsxfxa', [TicketController::class, 'ticketsxfxa']);
        Route::post('ticketsxfae', [TicketController::class, 'ticketsxfae']);
        Route::post('ticketsxtaf', [TicketController::class, 'ticketsxtaf']);
        Route::post('ticketsxagesel', [TicketController::class, 'ticketsxagesel']);
        Route::post('ticketsxainsel', [TicketController::class, 'ticketsxainsel']);
        Route::post('ticketsxapesel', [TicketController::class, 'ticketsxapesel']);
        Route::post('ticketsxestsel', [TicketController::class, 'ticketsxestsel']);
        Route::post('ticketsxfecsel', [TicketController::class, 'ticketsxfecsel']);
        Route::post('ticketsxsarsel', [TicketController::class, 'ticketsxsarsel']);
        Route::post('ticketsxususel', [TicketController::class, 'ticketsxususel']);
        Route::post('trazabilidadreg', [TrazabilidadController::class, 'trazabilidadreg']);
        Route::post('trazabilidadsel', [TrazabilidadController::class, 'trazabilidadsel']);
    });
});
