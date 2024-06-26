<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StoreController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\SubscriptController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CompanyController;

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

Route::get('/', [HomeController::class, 'index']);
Route::get('company', [CompanyController::class, 'index'])->name('company.index');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
});

require __DIR__.'/auth.php';

Route::resource('stores', StoreController::class);

Route::controller(UserController::class)->group(function () {
Route::get('users/mypage', 'mypage')->name('mypage');
Route::get('users/mypage/edit', 'edit')->name('mypage.edit');
Route::put('users/mypage', 'update')->name('mypage.update');
Route::get('users/mypage/reservations', 'reservations' )->name('mypage.reservations');
Route::get('users/mypage/favorite', 'favorite')->name('mypage.favorite');

});

Route::resource('reservations', ReservationController::class);
Route::resource('reviews', ReviewController::class);


Route::middleware(['auth', 'verified'])->group(function () {
Route::post('reviews', [ReviewController::class, 'store'])->name('reviews.store');
Route::post('favorites/{store_id}', [FavoriteController::class, 'store'])->name('favorites.store');
Route::delete('favorites/{store_id}', [FavoriteController::class, 'destroy'])->name('favorites.destroy');
 });


 Route::controller(SubscriptController::class)->middleware('auth','verified')->group(function () {
    Route::get('subscript/', 'index')->name('subscript.index');
    Route::post('subscript/', 'register')->name('subscript.register');
    Route::get('subscript/edit', 'edit')->middleware('subscribed')->name('subscript.edit');    
    Route::post('subscript/edit', 'update')->middleware('subscribed')->name('subscript.update');
    Route::get('subscript/cancel', 'cancel_confirm')->middleware('subscribed')->name('subscript.cancel_confirm');    
    Route::post('subscript/cancel', 'cancel')->middleware('subscribed')->name('subscript.cancel');
    
});




