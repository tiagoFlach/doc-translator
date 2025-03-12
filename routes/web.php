<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Services
Route::controller(ServiceController::class)
    ->middleware('auth')
    ->prefix('service')
    ->name('service.')
    ->group(function () {
        Route::get('/search', 'search')->name('search');
        Route::get('/{service}/checkout', 'checkout')->name('checkout');
        Route::get('/{service}/pay', 'pay')->name('pay');
        Route::get('/{service}/confirmPay', 'confirmPay')->name('confirmPay');
        Route::get('/{service}/startTranslate', 'startTranslate')->name('startTranslate');
        Route::post('/{service}/addTranslation', 'addTranslation')->name('addTranslation');
    });
Route::controller(ServiceController::class)
    ->prefix('service')
    ->name('service.')
    ->group(function () {
        Route::get('/{service}/pay', 'pay')->name('pay');
        Route::get('/{service}/confirmPay', 'confirmPay')->name('confirmPay');
    });
Route::resource('service', ServiceController::class)->middleware('auth');

// User
Route::controller(UserController::class)
    ->middleware('auth')
    ->prefix('user')
    ->name('user.')
    ->group(function () {
        Route::get('/services', 'services')->name('services');
        Route::get('/languages', 'languages')->name('languages');
        Route::get('/addLanguage', 'addLanguage')->name('addLanguage');
        Route::post('/storeLanguage', 'storeLanguage')->name('storeLanguage');
    });
Route::resource('user', UserController::class)->middleware('auth');

require __DIR__.'/auth.php';
