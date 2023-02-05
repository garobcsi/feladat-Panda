<?php

use App\Http\Controllers\PandaController;
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

Route::get('/pandas',[PandaController::class,'index'])->name('pandas.index');
Route::get('/pandas/{id}',[PandaController::class,'show'])->whereNumber('id')->name('pandas.show');
Route::post('/pandas',[PandaController::class,'store'])->name('pandas.store');
Route::put('/pandas/{id}',[PandaController::class,'update'])->whereNumber('id')->name('pandas.update');
Route::delete('/pandas/{id}',[PandaController::class,'destroy'])->whereNumber('id')->name('pandas.destroy');
