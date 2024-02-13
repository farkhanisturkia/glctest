<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SelesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;

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

Route::middleware('splade')->group(function () {
    // Registers routes to support the interactive components...
    Route::spladeWithVueBridge();

    // Registers routes to support password confirmation in Form and Link components...
    Route::spladePasswordConfirmation();

    // Registers routes to support Table Bulk Actions and Exports...
    Route::spladeTable();

    // Registers routes to support async File Uploads with Filepond...
    Route::spladeUploads();

    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

    Route::middleware(['auth','admin'])->group(function () {
        Route::get('/dataseles', [AdminController::class, 'seles'])->name('dataseles');
        Route::get('/dataseles/{seles}', [AdminController::class, 'selesshow'])->name('dataselesshow');
        Route::get('/dataselesdownload/{seles}', [AdminController::class, 'selesdownload'])->name('dataselesdownload');
        Route::post('/dataselesstore', [AdminController::class, 'selesstore'])->name('dataselesstore');
        Route::delete('/{seles}', [AdminController::class, 'selesdestroy'])->name('dataselesdestroy');

        Route::get('/datapaket', [AdminController::class, 'paket'])->name('datapaket');
        Route::post('/datapaketstore', [AdminController::class, 'paketstore'])->name('datapaketstore');
    });

    Route::middleware(['auth','seles'])->group(function () {
        Route::get('/datacustomer', [SelesController::class, 'customer'])->name('datacustomer');
        Route::get('/datacustomercreate', [SelesController::class, 'customercreate'])->name('datacustomercreate');
        Route::post('/datacustomerstore', [SelesController::class, 'customerstore'])->name('datacustomerstore');
        Route::get('/datacustomeredit/{customers}', [SelesController::class, 'customeredit'])->name('datacustomeredit');
        Route::delete('/datacustomeredit/{customers}', [SelesController::class, 'customerdestroy'])->name('datacustomerdestroy');
    });

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    require __DIR__.'/auth.php';
});
