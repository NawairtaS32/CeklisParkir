<?php

use App\Http\Controllers\MobilController;
use App\Http\Controllers\MotorController;
use App\Http\Controllers\ProblemController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes([
    'register' => false,
    'reset' => false,
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'checkJabatan:Pengawas Petugas Parkir,Central Park Manager'], function() {
    
    Route::controller(UserController::class)->group(function () {
        Route::get('user', 'index')->name('user.index');
        Route::get('user/create', 'create')->name('user.create');
        Route::post('user', 'store' )->name('user.store');
        Route::post('/user/delete/{id}', 'destroy')->name('user.destroy');
        Route::get('/user/{id}', 'show')->name('user.show');
        Route::get('/user/edit/{id}','edit')->name('user.edit');
        Route::post('/user/update/{id}', 'update')->name('user.update');
        Route::get('user_print', 'user_print')->name('user.user_print');
    });

    Route::controller(ProblemController::class)->group(function () {
        Route::get('problem', 'index')->name('problem.index');
        Route::get('problem/create', 'create')->name('problem.create');
        Route::post('problem', 'store' )->name('problem.store');
        Route::post('/problem/delete/{id}', 'destroy')->name('problem.destroy');
        Route::get('/problem/{id}', 'show')->name('problem.show');
        Route::get('/problem/edit/{id}','edit' )->name('problem.edit');
        Route::post('/problem/update/{id}', 'update' )->name('problem.update');
        Route::get('/problem/print/{id}', 'print')->name('problem.print');
        Route::get('problem_print', 'problem_print')->name('problem.problem_print');
    });
});

Route::group(['middleware' => 'checkJabatan:Staff Petugas Lapangan,Pengawas Petugas Parkir,Central Park Manager'], function() {
    
    Route::controller(MobilController::class)->group(function () {
        Route::get('mobil', 'index')->name('mobil.index');
        Route::get('mobil/create', 'create')->name('mobil.create');
        Route::post('mobil', 'store' )->name('mobil.store');
        Route::post('/mobil/delete/{id}', 'destroy')->name('mobil.destroy');
        Route::get('/mobil/{id}', 'show')->name('mobil.show');
        Route::get('/mobil/edit/{id}','edit' )->name('mobil.edit');
        Route::post('/mobil/update/{id}', 'update' )->name('mobil.update');
        Route::get('/mobil/print/{id}', 'print')->name('mobil.print');
        Route::get('mobil_print', 'mobil_print')->name('mobil.mobil_print');
    });
    
    Route::controller(MotorController::class)->group(function () {
        Route::get('motor', 'index')->name('motor.index');
        Route::get('motor/create', 'create')->name('motor.create');
        Route::post('motor', 'store' )->name('motor.store');
        Route::post('/motor/delete/{id}', 'destroy')->name('motor.destroy');
        Route::get('/motor/{id}', 'show')->name('motor.show');
        Route::get('/motor/edit/{id}','edit' )->name('motor.edit');
        Route::post('/motor/update/{id}', 'update' )->name('motor.update');
        Route::get('/motor/print/{id}', 'print')->name('motor.print');
        Route::get('motor_print', 'motor_print')->name('motor.motor_print');
    });
    
    Route::controller(UserController::class)->group(function () {
        Route::get('/user/{id}', 'show')->name('user.show');
    });
});