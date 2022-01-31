<?php

use App\Http\Controllers\AttendeeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\UserController;
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

Route::prefix('manager')->group(function() {

    Route::get('/', function() {
        return view('admin.pages.dashboard.index');
    })->name('dashboard');

    Route::prefix('registration')->middleware('auth')->group(function() {
        Route::get('/', [RegistrationController::class, 'index'])->name('registration');
        Route::post('/change_status/{id}', [RegistrationController::class, 'changeStatus'])->name('registration.status');
    });
    
    Route::prefix('event')->middleware('auth')->group(function() {
        Route::get('/', [EventController::class, 'index'])->name('event');
        Route::get('/create', [EventController::class, 'create'])->name('event.create');
        Route::get('/{id}/edit', [EventController::class, 'edit'])->name('event.edit');
        Route::post('/', [EventController::class, 'store'])->name('event.store');
        Route::put('/{id}', [EventController::class, 'update'])->name('event.update');
        Route::delete('/{id}', [EventController::class, 'destroy'])->name('event.destroy');
    });

    Route::prefix('auth')->group(function() {
        Route::get('/login', [AuthController::class, 'loginView'])
        ->name('login');
    
        Route::post('/login', [AuthController::class, 'login'])
        ->name('login');
        
        Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');
    });

    Route::prefix('user')->group(function() {
        Route::get('/', [UserController::class, 'index'])
        ->name('user');
        Route::post('/', [UserController::class, 'store'])
        ->name('user.store');
        Route::put('/{id}', [UserController::class, 'update'])
        ->name('user.update');
        Route::delete('/{id}', [UserController::class, 'destroy'])
        ->name('user.destroy');
    });
    
});

Route::prefix('registration')->group(function() {
    Route::get('/competition', [RegistrationController::class, 'formCompetitionEvent'])->name('registration.competition');
    Route::get('/talkshow', [RegistrationController::class, 'formTalkshowEvent'])->name('registration.talkshow');
    
    Route::post('/competition', [RegistrationController::class, 'registerCompetitionEvent'])->name('registration.competition.store');
    Route::post('/talkshow', [RegistrationController::class, 'registerTalkshowEvent'])->name('registration.talkshow.store');
});

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/', [RegistrationController::class, 'test2'])->name('home');
