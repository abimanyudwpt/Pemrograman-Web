<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\NilaiController;
use App\Http\Livewire\Mahasiswas;
use App\Http\Livewire\Addmk;
use App\Http\Livewire\Nilais;
use app\Models\Mahasiswa;
use App\Models\Matakuliah;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard')->middleware(['auth:sanctum']);
Route::resource('mahasiswa', MahasiswaController::class);
Route::resource('matakuliah', MatakuliahController::class);
Route::resource('nilai', NilaiController::class);
// Route::get('admin', 'MahasiswaController@mahasiswa');

// Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');

//     Route::get('matakuliah', Matakuliahs::class)->name('matakuliah');
// });