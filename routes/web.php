<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FroomeController;
use App\Models\Froome;
use Illuminate\Support\Facades\Auth;
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
Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [DashboardController::class, 'index'])->middleware('auth');

Route::get('/list-froome',[FroomeController::class,'index'])->name('froome-list');
Route::get('/add-froome', [FroomeController::class, 'create'])->name('froome-create');
Route::post('/store-froome', [FroomeController::class, 'store']);
Route::get('/edit-froome/{id}', [FroomeController::class, 'edit'])->name('froome-edit');
Route::put('/update-froome/{id}', [FroomeController::class, 'update'])->name('froome-update');
Route::delete('/delete-froome/{id}', [FroomeController::class, 'destroy'])->name('froome-destroy');
