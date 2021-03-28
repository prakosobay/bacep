<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Console\Kernel;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Auth;


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

// Route::get('/Register', function () {
//     return view('auth.register');
// });

// Route::get('/Login', function () {
//     return view('auth.login');
// });

// Route::post('/submit_register', [RegisController::class, 'sign_up']);

// Route::post('/sign_in', [LoginController::class, 'sign_in']);

// Route::get('/milih', [HomeController::class, 'milih_role']);


Route::middleware(['auth'])->group(function () {
    Route::get('/maintenance', function () {
        return view('maintenance');
    });

    Route::get('/survey', function () {
        return view('survey');
    });

    Route::get('/mount', function () {
        return view('mount');
    });

    Route::get('/troubleshoot', function () {
        return view('troubleshoot');
    });

    Route::get('/cleaning_bm', function () {
        return view('cleaning_bm');
    });

    Route::get('/new_survey', function () {
        return view('new_survey');
    });

    Route::get('/home', [HomeController::class, 'index'])->name('home');

    //Detail History
    Route::get('/detail_survey/{id}', [HomeController::class, 'detail_permit_survey']);
    Route::get('/detail_cleaning/{id}', [App\Http\Controllers\CleaningController::class, 'detail_permit_cleaning']);

    //Approve
    Route::post('/approve_survey', [HomeController::class, 'approve_survey']);
    Route::post('/approve_cleaning', [App\Http\Controllers\CleaningController::class, 'approve_cleaning']);

    //Reject
    Route::post('/survey_reject', [HomeController::class, 'survey_reject']);
    Route::post('/cleaning_reject', [App\Http\Controllers\CleaningController::class, 'cleaning_reject']);

    //Submit
    Route::post('/submit_data_survey', [App\Http\Controllers\HomeController::class, 'submit_data_survey']);
    Route::post('/submit_data_cleaning', [App\Http\Controllers\CleaningController::class, 'submit_data_cleaning']);
    Route::post('/submit_data', [App\Http\Controllers\HomeController::class, 'submit_data']);
    Route::post('/submit_mounting', [App\Http\Controllers\HomeController::class, 'submit_mounting']);
    Route::post('/submit_troubleshoot', [App\Http\Controllers\HomeController::class, 'submit_troubleshoot']);

    //Approval View
    // Route::get('/detail_survey{id}', [App\Http\Controllers\HomeController::class, 'approve_survey']);
    // Route::get('/detail_cleaning{id}', [App\Http\Controllers\CleaningController::class, 'approve_cleaning']);

    //Approval view
    Route::get('/approval/{type_view}', [App\Http\Controllers\HomeController::class, 'approval_view']);

    //Full Approval
    Route::get('/full_approval/{type_form}', [App\Http\Controllers\HomeController::class, 'approval_full']);

    //PDF
    Route::get('/survey_pdf/{id}', [App\Http\Controllers\HomeController::class, 'cetak_survey_pdf']);
    Route::get('/cleaning_pdf/{id}', [App\Http\Controllers\CleaningController::class, 'cetak_cleaning_pdf']);
});
