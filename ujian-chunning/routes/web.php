<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ParticipantsController;
use Symfony\Component\HttpKernel\Profiler\Profile;

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
    return view('welcome');
})->middleware('noAuth');


// login route
Route::name('auth.')
    ->controller(AuthController::class)
    ->group(function () {
    Route::get("/login", "login")->name("login")->middleware('noAuth');
    Route::post("/login", "do_login")->name("do_login")->middleware('noAuth');
    Route::any("/logout", "logout")->name("logout")->middleware('withAuth');
    Route::any("/register", "register")->name("register")->middleware('noAuth');
    Route::any("/store", "do_register")->name("store")->middleware('noAuth');
});

// Admin bisa membuat mengedit dan mendelete user petugas
// petugas dapat melihat list seluruh pendonor
// Petugas bisa mengisi form pendonor
// Petugas tidak bisa mengubah form pendonor
// user bisa mendaftar sebagai pendonor dan mengisi requirement form, jika lolos, user akan terdaftar menjadi pendonor
// user dashboard show healthcheck result pribadi
// user dapat menghapus akun pribadi

Route::prefix('profile')
    ->middleware('withAuth')
    ->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        Route::get('/dashboard',[AuthController::class, 'index'])->name('dashboard');
        Route::prefix('participant')
            ->name('participants.')
            ->controller((ParticipantsController::class))
            ->group(function () {
                Route::get('/', 'list')->name('list')->middleware(['asOfficer','asAdmin']);
                Route::get('/show/{participant}', 'show')->name('show')->middleware(['asOfficer','asAdmin']);
                Route::get('/edit/{participant}', 'edit')->name('edit')->middleware(['asOfficer','asAdmin']);
                Route::post('/store', 'store')->name('store');
                Route::put('/update/{participant}', 'update')->name('update')->middleware(['asOfficer','asAdmin']);
                Route::delete('/destroy/{participant}', 'destroy')->name('destroy')->middleware(['asOfficer','asAdmin']);
        });
        Route::prefix('officer')
            ->name('officers.')
            ->controller((OfficersController::class))
            ->middleware('asAdmin')
            ->group(function () {
                Route::get('/', 'list')->name('list');
                Route::get('/show/{participant}', 'show')->name('show');
                Route::get('/edit/{participant}', 'edit')->name('edit');
                Route::post('/store', 'store')->name('store');
                Route::put('/update/{officers}', 'update')->name('update');
                Route::delete('/destroy/{officers}', 'destroy')->name('destroy');
        });
});

Route::prefix('forms')
    ->name('forms.')
    ->controller(FormsController::class)
    ->group(function () {
        Route::get('/healthcheck', fn() => view('forms.healthcheck'))->name('healthcheck');
        Route::get('/requirement', fn() => view('forms.requirement'))->name('requirement');

});


