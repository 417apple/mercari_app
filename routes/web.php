<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Mypage\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SellController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('top');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {

    Route::group(['prefix' => 'mypage'], function () {

        Route::get('edit-profile', [ProfileController::class, 'showProfileEditForm'])->name('mypage.edit-profile');
        Route::post('edit-profile', [ProfileController::class, 'editProfile'])->name('mypage.edit-profile');

    });

    Route::get('sell', [SellController::class, 'showSellForm'])->name('sell');

});
