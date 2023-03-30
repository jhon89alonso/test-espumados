<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// require __DIR__.'/auth.php';

Route::group(
    [
        'prefix' => 'admin',
        'middleware' => ['auth'],
    ],
    function () {
        Route::group([
            'middleware' => ['role:Administrador']
        ], function () {
            Route::resource('users', \App\Http\Controllers\UserController::class);
            Route::resource('roles', \App\Http\Controllers\RoleController::class);
            Route::get('user/export/Exel', '\App\Http\Controllers\Export\UserExportPDFController@exportExcel')->name('user.export.excel');
        });
        Route::get('user/export/pdf', '\App\Http\Controllers\Export\UserExportPDFController@exporPdfUser')->name('user.export.pdf');
        Route::resource('clientes', \App\Http\Controllers\ClientesController::class);
    }
);
