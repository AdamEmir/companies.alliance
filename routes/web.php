<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CompanyController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');



Route::prefix('company')->as('companies.')
    ->middleware('auth')
    ->group(function(){
        Route::get('/',[CompanyController::class,'index'])->name('index');
        Route::get('/create',[CompanyController::class,'create'])->name('create');
        Route::get('/edit/{company}',[CompanyController::class,'edit'])->name('edit');
        Route::get('/show/{company}',[CompanyController::class,'show'])->name('show');
    });
