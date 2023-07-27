<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiGuruController;
use App\Http\Controllers\Api\ApiSoalController;
use App\Http\Controllers\Api\ApiSiswaController;
use App\Http\Controllers\Api\GameplayController;

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



// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('login/siswa',[ApiSiswaController::class,'loginSiswa']);
Route::get('detail/siswa',[ApiSiswaController::class,'siswaDetails'])->middleware(['auth:sanctum','ability:siswa']);

Route::post('login/guru',[ApiGuruController::class,'loginGuru']);

Route::get('/soal', [ApiSoalController::class, 'index']);
Route::get('/soal/{id}/id', [ApiSoalController::class, 'show']);
Route::post('/soal-prosestambah', [ApiSoalController::class, 'store']);
Route::post('/soal/{id}/update', [ApiSoalController::class, 'update']);
Route::get('/soal/{id}/hapus-soal', [ApiSoalController::class, 'destroy']);

Route::get('/gameplay', [GameplayController::class, 'index']);
Route::get('/gameplay/{id}/id', [GameplayController::class, 'show']);
Route::post('/gameplay-prosestambah', [GameplayController::class, 'store']);
Route::post('/gameplay/{id}/gameplay', [GameplayController::class, 'update']);
Route::get('/gameplay/{id}/hapus-gameplay', [GameplayController::class, 'destroy']);


Route::get('/lihatnilai', [ApiSiswaController::class, 'lihatnilai']);
  

