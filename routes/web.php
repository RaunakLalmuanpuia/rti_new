<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CitizenController;

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


//Dashboard Controller
Route::group(['middleware' => 'auth', 'prefix' => 'dashboard'], function () {
    Route::get('',[DashboardController::class,'index'])->name('dashboard');
    Route::get('admin',[DashboardController::class,'admin'])->name('dashboard.admin');
    Route::get('citizen',[DashboardController::class,'citizen'])->name('dashboard.citizen');
    Route::get('aspio',[DashboardController::class,'aspio'])->name('dashboard.aspio');
    Route::get('spio',[DashboardController::class,'spio'])->name('dashboard.spio');
    Route::get('daa',[DashboardController::class,'daa'])->name('dashboard.daa');
    Route::get('cic',[DashboardController::class,'cic'])->name('dashboard.cic');
});

//Dashboard Controller
Route::group(['middleware' => 'auth', 'prefix' => 'citizen'], function () {
    Route::get('applyRti',[CitizenController::class,'create_rti'])->name('citizen.file_rti');
    Route::post('storeRti',[CitizenController::class,'store_rti'])->name('citizen.submit.rti');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


