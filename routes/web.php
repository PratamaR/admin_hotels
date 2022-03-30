<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FhotelController;
use App\Http\Controllers\FroomeController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TestimoniController;
use App\Http\Controllers\TypeController;
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

Route::get('/list-froome',[FroomeController::class,'index'])->name('froome-list')->middleware('auth');
Route::get('/add-froome', [FroomeController::class, 'create'])->name('froome-create')->middleware('auth');
Route::post('/store-froome', [FroomeController::class, 'store'])->middleware('auth');
Route::get('/edit-froome/{id}', [FroomeController::class, 'edit'])->name('froome-edit')->middleware('auth');
Route::put('/update-froome/{id}', [FroomeController::class, 'update'])->name('froome-update')->middleware('auth');
Route::delete('/delete-froome/{id}', [FroomeController::class, 'destroy'])->name('froome-destroy')->middleware('auth');

Route::get('/list-fhotel',[FhotelController::class,'index'])->name('fhotel-list')->middleware('auth');
Route::get('/add-fhotel', [FhotelController::class, 'create'])->name('fhotel-create')->middleware('auth');
Route::post('/store-fhotel', [FhotelController::class, 'store'])->middleware('auth');
Route::get('/edit-fhotel/{id}', [FhotelController::class, 'edit'])->name('fhotel-edit')->middleware('auth');
Route::put('/update-fhotel/{id}', [FhotelController::class, 'update'])->name('fhotel-update')->middleware('auth');
Route::delete('/delete-fhotel/{id}', [FhotelController::class, 'destroy'])->name('fhotel-destroy')->middleware('auth');

Route::get('/list-type',[TypeController::class,'index'])->name('type-list')->middleware('auth');
Route::get('/add-type', [TypeController::class, 'create'])->name('type-create')->middleware('auth');
Route::post('/store-type', [TypeController::class, 'store'])->middleware('auth');
Route::get('/edit-type/{id}', [TypeController::class, 'edit'])->name('type-edit')->middleware('auth');
Route::put('/update-type/{id}', [TypeController::class, 'update'])->name('type-update')->middleware('auth');
Route::delete('/delete-type/{id}', [TypeController::class, 'destroy'])->name('type-destroy')->middleware('auth');

Route::get('/list-setting',[SettingController::class,'index'])->name('setting-list')->middleware('auth');
Route::get('/add-setting', [SettingController::class, 'create'])->name('setting-create')->middleware('auth');
Route::post('/store-setting', [SettingController::class, 'store'])->middleware('auth');
Route::get('/edit-setting/{id}', [SettingController::class, 'edit'])->name('setting-edit')->middleware('auth');
Route::put('/update-setting/{id}', [SettingController::class, 'update'])->name('setting-update')->middleware('auth');
Route::delete('/delete-setting/{id}', [SettingController::class, 'destroy'])->name('setting-destroy')->middleware('auth');

Route::get('/list-testimoni',[TestimoniController::class,'index'])->name('testimoni-list')->middleware('auth');
Route::get('/add-testimoni', [TestimoniController::class, 'create'])->name('testimoni-create')->middleware('auth');
Route::post('/store-testimoni', [TestimoniController::class, 'store'])->middleware('auth');
Route::get('/edit-testimoni/{id}', [TestimoniController::class, 'edit'])->name('testimoni-edit')->middleware('auth');
Route::put('/update-testimoni/{id}', [TestimoniController::class, 'update'])->name('testimoni-update')->middleware('auth');
Route::delete('/delete-testimoni/{id}', [TestimoniController::class, 'destroy'])->name('testimoni-destroy')->middleware('auth');
