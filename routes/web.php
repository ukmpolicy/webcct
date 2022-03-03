<?php

use App\Http\Controllers\AttendeeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CheckinController;
use App\Http\Controllers\CompetitionRegistrationController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TalkshowRegistrationController;
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
    })->name('dashboard')->middleware('auth');

    Route::prefix('registration/competition')->middleware('auth')->group(function() {
        Route::get('/', [CompetitionRegistrationController::class, 'index'])->name('competition');
        Route::post('/change_status/{id}', [CompetitionRegistrationController::class, 'changeStatus'])->name('competition.status');
        Route::get('/export', [CompetitionRegistrationController::class, 'export'])->name('competition.registration.export');
    });

    Route::prefix('registration/talkshow')->middleware('auth')->group(function() {
        Route::get('/', [TalkshowRegistrationController::class, 'index'])->name('talkshow');
        Route::get('/export', [TalkshowRegistrationController::class, 'export'])->name('talkshow.registration.export');
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
    
    Route::prefix('mail')->middleware('auth')->group(function() {
        Route::get('/', [MailController::class, 'index'])
        ->name('mail');

        Route::post('/', [MailController::class, 'store'])
        ->name('mail.store');
        
        Route::post('/reply/{id}', [MailController::class, 'reply'])
        ->name('mail.reply');
        
        Route::get('/show/{id}', [MailController::class, 'show'])
        ->name('mail.detail');
        
        Route::delete('/{id}', [MailController::class, 'destroy'])
        ->name('mail.destroy');
    });

    Route::prefix('setting')->middleware('auth')->group(function() {
        Route::get('/', [SettingController::class, 'index'])
        ->name('setting');
        Route::post('/', [SettingController::class, 'save'])
        ->name('setting.save');
    });
});

Route::prefix('registration')->group(function() {

    Route::get('/competition', [CompetitionRegistrationController::class, 'formRegistration'])->name('registration.competition');    
    Route::post('/competition', [CompetitionRegistrationController::class, 'store'])->name('registration.competition.store');
    
    Route::get('/talkshow', [TalkshowRegistrationController::class, 'formRegistration'])->name('registration.talkshow');     
    Route::post('/talkshow', [TalkshowRegistrationController::class, 'store'])->name('registration.talkshow.store');
});

Route::prefix('checkin')->group(function() {

    Route::get('/', [CheckinController::class, 'index'])->name('checkin');
    Route::post('/', [CheckinController::class, 'checkIn'])->name('checkin.check');
});

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/', [RegistrationController::class, 'test2'])->name('home');
