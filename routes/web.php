<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FilialController;
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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function() {

    Route::get('/relatorios', [ ExcelController::class, 'index' ]);
    Route::get('/logout-user', [ UserController::class, 'logout' ]);
    Route::get('/search-relatorio', [ ExcelController::class, 'searchRelatorio']);
});

Route::group(['middleware' => ['roles:Administrador']], function() {

    Route::get('/upload-planilha', [ ExcelController::class, 'create' ]);
    Route::post('/import-excel', [ ExcelController::class, 'importData']);

    Route::get('/create-role', [ RoleController::class, 'create' ]);

    Route::get('alter-userrole', [ UserController::class, 'index' ]);
    Route::post('alter-userrole/{id}', [ UserController::class, 'updateUserRole' ]);

    Route::post('/create-role', [ RoleController::class, 'store']);

    Route::post('/create-unidade', [ FilialController::class, 'store']);
    Route::get('/create-unidade', [ FilialController::class, 'create']);
});
