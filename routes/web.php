<?php

use App\Http\Livewire\Admin\Dashboard;
use App\Http\Livewire\Admin\Consultations\Index as ConsultationsIndex;
use App\Http\Livewire\Admin\Consultations\Show as ConsultationsShow;
use App\Http\Livewire\Admin\Appointments as AdminAppointments;
use App\Http\Livewire\Appointments;
use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Livewire\Admin\Applicant\Index as ApplicantIndex;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Passwords\Confirm;
use App\Http\Livewire\Auth\Passwords\Email;
use App\Http\Livewire\Auth\Passwords\Reset;
use App\Http\Livewire\Auth\Verify;
use Illuminate\Support\Facades\Route;

Route::get('payment-start', 'App\Http\Controllers\PaymentController@start')
	->name('payment.start');

Route::get('payment-back', 'App\Http\Controllers\PaymentController@back')
	->name('payment.back');

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
// Route::get('{slug?}', 'App\Http\Controllers\PageController@index');
Route::get('/', 'App\Http\Controllers\PageController@index');
Route::get('orvosok/{slug}', [ 'as' => 'pages.doctor', 'uses' => 'App\Http\Controllers\PageController@doctor']);
Route::get('arak', [ 'as' => 'pages.prices', 'uses' => 'App\Http\Controllers\PageController@prices']);
Route::get('online-bejelentkezes-befejezese', 'App\Http\Controllers\PageController@greeting')
    ->name('appointments.greeting');


Route::get('online-bejelentkezes', Appointments::class)->name('appointments.index');
// Route::get('online-bejelentkezes', [ 'as' => 'appointments.index', 'uses' => 'AppointmentsController@index']);
// Route::post('online-bejelentkezes/uj-bejelentkezo', [ 'as' => 'appointments.store', 'uses' => 'AppointmentsController@store']);

// Route::view('/', 'welcome')->name('home');

Route::middleware('guest')->group(function () {
    Route::get('login', Login::class)
        ->name('login');

    // Route::get('register', Register::class)
    //     ->name('register');
});

Route::get('password/reset', Email::class)
    ->name('password.request');

Route::get('password/reset/{token}', Reset::class)
    ->name('password.reset');

Route::get('email/verify', Verify::class)
    ->middleware('throttle:6,1')
    ->name('verification.notice');

Route::get('password/confirm', Confirm::class)
    ->name('password.confirm');

Route::prefix('admin')->middleware('auth')->group(function () {

    Route::get('/dashboard', Dashboard::class)
        ->name('home');
        // ->name('admin.dashboard');

    Route::get('rendelesek', ConsultationsIndex::class)
        ->name('admin.consultations.index');

    Route::get('rendelesek/{consultation}', ConsultationsShow::class)
        ->name('admin.consultations.show');

    Route::get('paciensek', ApplicantIndex::class)
        ->name('admin.applicant.index');

    Route::get('uj-idopont', AdminAppointments::class)
        ->name('admin.appointment');
});

Route::middleware('auth')->group(function () {
    Route::get('email/verify/{id}/{hash}', EmailVerificationController::class)
        ->middleware('signed')
        ->name('verification.verify');

    Route::post('logout', LogoutController::class)
        ->name('logout');
});
