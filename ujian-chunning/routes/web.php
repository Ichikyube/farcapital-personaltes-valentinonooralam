<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ParticipantsController;

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
/*
login admin->dashboard
participant->list
participant->register
participant->detail
*/
Route::get('/', function () {
    return view('welcome');
})->middleware('noAuth');

Route::get('/healthform', fn() => view('forms.healthcheck'));


// auth route
Route::name('auth.')
    ->controller(AuthController::class)
    ->group(function () {
    Route::get("/login", "login")->name("login")->middleware('noAuth');
    Route::post("/login", "do_login")->name("do_login")->middleware('noAuth');
    Route::any("/logout", "logout")->name("logout")->middleware('withAuth');
    Route::any("/register", "register")->name("register")->middleware('noAuth');
    Route::any("/store", "do_register")->name("store")->middleware('noAuth');
});

Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit')->middleware('auth');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update')->middleware('auth');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy')->middleware('auth');

Route::prefix('admin')
    ->name('admin.')
    ->controller(AuthController::class)
    ->middleware('withAuth')
    ->group(function () {
        Route::get('/', 'index')->name('dashboard');
});

Route::prefix('participant')
    ->name('participants.')
    ->controller((ParticipantsController::class))
    ->middleware('withAuth')
    ->group(function () {
        Route::get('/', 'index')->name('list'); // student.list
        Route::get('/show/{participant}', 'show')->name('show');
        Route::get('/edit/{participant}', 'edit')->name('edit');
        Route::post('/store', 'store')->name('store');
        Route::put('/update/{participant}', 'update')->name('update');
        Route::delete('/destroy/{participant}', 'destroy')->name('destroy');
});

Route::prefix('officer')
    ->name('officers.')
    ->controller((ParticipantsController::class))
    ->middleware('withAuth')
    ->group(function () {
        Route::get('/', 'index')->name('list'); // student.list
        Route::get('/show/{participant}', 'show')->name('show');
        Route::get('/edit/{participant}', 'edit')->name('edit');
        Route::post('/store', 'store')->name('store');
        Route::put('/update/{participant}', 'update')->name('update');
        Route::delete('/destroy/{participant}', 'destroy')->name('destroy');
});
