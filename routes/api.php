<?php

use App\Http\Controllers\AeroportoController;
use App\Http\Controllers\VooController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("", function() {
    return response()->json([
        "API Online."
    ]);
});

Route::post('/aeroporto', [AeroportoController::class, 'store']);
Route::get('/aeroporto', [AeroportoController::class, 'index']);

Route::post('/voo', [VooController::class, "store"]);
Route::get('/voo', [VooController::class, "index"]);
Route::patch('/voo/{voo}', [VooController::class, "update"]);
Route::patch('/voo/{voo}/cancelar', [VooController::class, "cancelarVoo"]);

// Route::resource('aeroporto', AeroportoController::class);