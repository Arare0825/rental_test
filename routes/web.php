<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\ManageController;
use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/hotel',[HotelController::class,'index'])->name('login');
Route::post('/hotel/store',[HotelController::class,'store'])->name('hotel.store');


Route::get('/manage',[ManageController::class,'index'])->name('manage');



Route::group(['middleware' => 'auth'], function () {
    Route::get('/item',[ItemController::class,'index'])->name('item');
    Route::post('/item/store',[ItemController::class,'store'])->name('item.store');
      });