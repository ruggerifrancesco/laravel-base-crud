<?php

use App\Http\Controllers\Admin\BeachController;
use App\Http\Controllers\Guest\GuestPageController;
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

// Guest Side Client
Route::get('/', [GuestPageController::class, 'home'])->name('guest.home');
Route::get('/beaches', [GuestPageController::class, 'index'])->name('guest.beaches.index');

// Admin Side Client

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/beaches/trashed', [BeachController::class, 'trashed'])->name('beaches.trashed');
    Route::delete('/beaches/trashed/{id}', [BeachController::class, 'restore'])->name('beaches.restore');
    Route::resource('/beaches', BeachController::class);
});
