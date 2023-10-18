<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UserController;
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


Route::post('/usuarios',[UserController::class,'store']);
Route::post('/login',[AuthController::class,'login']);
Route::post('/register',[AuthController::class,'register']);

Route::middleware(['auth:sanctum'])->group(function () {

    Route::get('/usuarios', [UserController::class, 'index']);
    Route::get('/logout',[AuthController::class,'logout']);

    Route::get('/productos',[ProductoController::class, 'index']);
    Route::post('/productos',[ProductoController::class, 'store'])->middleware('can:producto.api.store');
    Route::get('/productos/{producto}',[ProductoController::class, 'show']);
    Route::put('/productos/{producto}',[ProductoController::class, 'update'])->middleware('can:producto.api.update');
    Route::delete('/productos/{producto}',[ProductoController::class, 'destroy'])->middleware('can:producto.api.destroy');

    Route::get('/cantidadResultados',[ProductoController::class, 'cantidadResultados']);
    Route::get('/venderArticulo/{producto}',[ProductoController::class, 'venderArticulo']);
    Route::get('/nonstock',[ProductoController::class, 'nonstock']);

});




