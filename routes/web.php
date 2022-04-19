<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FhotelController;
use App\Http\Controllers\FroomeController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TestimoniController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UserController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/home', [DashboardController::class, 'index'])->middleware('auth');

Route::get('/list-froome', [FroomeController::class, 'index'])->name('froome-list')->middleware('auth');
Route::get('/add-froome', [FroomeController::class, 'create'])->name('froome-create')->middleware('auth');
Route::post('/store-froome', [FroomeController::class, 'store'])->middleware('auth');
Route::get('/edit-froome/{id}', [FroomeController::class, 'edit'])->name('froome-edit')->middleware('auth');
Route::put('/update-froome/{id}', [FroomeController::class, 'update'])->name('froome-update')->middleware('auth');
Route::delete('/delete-froome/{id}', [FroomeController::class, 'destroy'])->name('froome-destroy')->middleware('auth');

Route::get('/list-fhotel', [FhotelController::class, 'index'])->name('fhotel-list')->middleware('auth');
Route::get('/add-fhotel', [FhotelController::class, 'create'])->name('fhotel-create')->middleware('auth');
Route::post('/store-fhotel', [FhotelController::class, 'store'])->middleware('auth');
Route::get('/edit-fhotel/{id}', [FhotelController::class, 'edit'])->name('fhotel-edit')->middleware('auth');
Route::put('/update-fhotel/{id}', [FhotelController::class, 'update'])->name('fhotel-update')->middleware('auth');
Route::delete('/delete-fhotel/{id}', [FhotelController::class, 'destroy'])->name('fhotel-destroy')->middleware('auth');

Route::get('/list-type', [TypeController::class, 'index'])->name('type-list')->middleware('auth');
Route::get('/add-type', [TypeController::class, 'create'])->name('type-create')->middleware('auth');
Route::post('/store-type', [TypeController::class, 'store'])->middleware('auth');
Route::get('/edit-type/{id}', [TypeController::class, 'edit'])->name('type-edit')->middleware('auth');
Route::put('/update-type/{id}', [TypeController::class, 'update'])->name('type-update')->middleware('auth');
Route::delete('/delete-type/{id}', [TypeController::class, 'destroy'])->name('type-destroy')->middleware('auth');

Route::get('/list-setting', [SettingController::class, 'index'])->name('setting-list')->middleware('auth');
Route::get('/add-setting', [SettingController::class, 'create'])->name('setting-create')->middleware('auth');
Route::post('/store-setting', [SettingController::class, 'store'])->middleware('auth');
Route::get('/edit-setting/{id}', [SettingController::class, 'edit'])->name('setting-edit')->middleware('auth');
Route::put('/update-setting/{id}', [SettingController::class, 'update'])->name('setting-update')->middleware('auth');
Route::delete('/delete-setting/{id}', [SettingController::class, 'destroy'])->name('setting-destroy')->middleware('auth');

Route::get('/list-testimoni', [TestimoniController::class, 'index'])->name('testimoni-list')->middleware('auth');
Route::get('/add-testimoni', [TestimoniController::class, 'create'])->name('testimoni-create')->middleware('auth');
Route::post('/store-testimoni', [TestimoniController::class, 'store'])->middleware('auth');
Route::get('/edit-testimoni/{id}', [TestimoniController::class, 'edit'])->name('testimoni-edit')->middleware('auth');
Route::put('/update-testimoni/{id}', [TestimoniController::class, 'update'])->name('testimoni-update')->middleware('auth');
Route::delete('/delete-testimoni/{id}', [TestimoniController::class, 'destroy'])->name('testimoni-destroy')->middleware('auth');

Route::get('/list-gallery', [GalleryController::class, 'index'])->name('gallery-list')->middleware('auth');
Route::get('/add-gallery', [GalleryController::class, 'create'])->name('gallery-create')->middleware('auth');
Route::post('/store-gallery', [GalleryController::class, 'store'])->middleware('auth');
Route::get('/edit-gallery/{id}', [GalleryController::class, 'edit'])->name('gallery-edit')->middleware('auth');
Route::put('/update-gallery/{id}', [GalleryController::class, 'update'])->name('gallery-update')->middleware('auth');
Route::delete('/delete-gallery/{id}', [GalleryController::class, 'destroy'])->name('gallery-destroy')->middleware('auth');
Route::get('/gallery-status/{id}', [GalleryController::class, 'GalleryStatus'])->name('gallery-status');

Route::get('/list-room', [RoomController::class, 'index'])->name('room-list')->middleware('auth');
Route::get('/add-room', [RoomController::class, 'create'])->name('room-create')->middleware('auth');
Route::post('/store-room', [RoomController::class, 'store'])->middleware('auth');
Route::get('/edit-room/{id}', [RoomController::class, 'edit'])->name('room-edit')->middleware('auth');
Route::put('/update-room/{id}', [RoomController::class, 'update'])->name('room-update')->middleware('auth');
Route::delete('/delete-room/{id}', [RoomController::class, 'destroy'])->name('room-destroy')->middleware('auth');
Route::get('/room-status/{id}', [RoomController::class, 'RoomStatus'])->name('room-status');

Route::get('/list-user', [UserController::class, 'index'])->name('user-list')->middleware('auth');
Route::get('/add-user', [UserController::class, 'create'])->name('user-create')->middleware('auth');
Route::post('/store-user', [UserController::class, 'store'])->middleware('auth');
Route::get('/edit-user/{id}', [UserController::class, 'edit'])->name('user-edit')->middleware('auth');
Route::put('/update-user/{id}', [UserController::class, 'update'])->name('user-update')->middleware('auth');
Route::delete('/delete-user/{id}', [UserController::class, 'destroy'])->name('user-destroy')->middleware('auth');
// Route::get('/user-status/{id}', [UserController::class, 'UserStatus'])->name('user-status');

Route::get('/list-reservation', [ReservationController::class, 'index'])->name('reservation-list');
Route::get('/add-reservation', [ReservationController::class, 'create'])->name('reservation-create');
Route::post('/store-reservation', [ReservationController::class, 'store']);
Route::get('/edit-reservation/{id}', [ReservationController::class, 'edit'])->name('reservation-edit');
Route::put('/update-reservation/{id}', [ReservationController::class, 'update'])->name('reservation-update');
Route::delete('/delete-reservation/{id}', [ReservationController::class, 'destroy'])->name('reservation-destroy');
Route::get('/reservation-status/{id}', [ReservationController::class, 'ReservationStatus'])->name('reservation-status');
Route::post('/getroom', [ReservationController::class, 'getRoom'])->name('getroom');
Route::get('/report-pdf', [ReservationController::class, 'print_pdf']);

Route::get('/', [LandingController::class, 'index']);
Route::get('/rooms', [LandingController::class, 'kamar']);
Route::get('/details', [LandingController::class, 'detail']);
Route::get('/contact', [LandingController::class, 'contact']);

// Route::get('/frontends', function () {
//     return view('layouts.frontend.app');
// });

// Route::get('/abouts', function () {
//     return view('layouts.frontend.about_app');
// });

// Route::get('/singlers', function () {
//     return view('layouts.frontend.singler_app');
// });

// Route::get('/contacts', function () {
//     return view('layouts.frontend.contact_app');
// });
