<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Mypage\ProfileController;
use App\Http\Controllers\Mypage\SoldItemsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SellController;
use App\Http\Controllers\ItemsController;

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

Route::get('', [ItemsController::class,'showItems'])->name('top');
Auth::routes();
Route::get('items/{item}', [ItemsController::class,'showItemDetail'])->name('item');

Route::group(['middleware' => 'auth'], function () {

    Route::group(['prefix' => 'mypage'], function () {

        Route::get('edit-profile', [ProfileController::class, 'showProfileEditForm'])->name('mypage.edit-profile');
        Route::post('edit-profile', [ProfileController::class, 'editProfile'])->name('mypage.edit-profile');
        Route::get('sold-items', [SoldItemsController::class, 'showSoldItems'])->name('mypage.sold-items');

    });

    Route::get('sell', [SellController::class, 'showSellForm'])->name('sell');
    Route::post('sell', [SellController::class, 'sellItem'])->name('sell');
    Route::get('items/{item}/buy', function () { return "商品購入画面";})->name('item.buy');

});
