<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\ManageController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\TvController;
use App\Http\Controllers\NoticeController;
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


    Route::group(['middleware' => 'auth'], function () {
    Route::get('/manage',[ManageController::class,'index'])->name('manage');
    Route::get('/manage/store',[ManageController::class,'store'])->name('manage.store');
    });

    Route::group(['middleware' => 'auth'], function () {
        Route::get('/item',[ItemController::class,'index'])->name('item');
        Route::post('/item/store',[ItemController::class,'store'])->name('item.store');
        Route::get('/item/{id}/edit',[ItemController::class,'edit']);
        Route::post('/item/{id}/edit',[ItemController::class,'edit'])->name('item.edit');
        Route::post('/item/update',[ItemController::class,'update'])->name('item.update');
        Route::post('/item/{id}/destroy',[ItemController::class,'destroy'])->name('item.destroy');
        });

        Route::get('/notice',[NoticeController::class,'index'])->name('notice');



      Route::get('/tv/{hid}',[TvController::class,'index'])->name('tv');
      Route::post('/tv/{id}',[TvController::class,'show'])->name('tv.show');
      Route::post('/tv',[TvController::class,'store'])->name('tv.store');
