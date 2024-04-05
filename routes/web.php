<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\ManageController;

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

Route::get('/hotel',[HotelController::class,'index'])->name('hotel.index');
Route::post('/hotel/store',[HotelController::class,'store'])->name('hotel.store');


Route::get('/manage',[ManageController::class,'index'])->name('manage');
