<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Console\Kernel;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Duty;
use App\Http\Controllers\CleaningController;

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



// Auth::routes(['verify' => true]);
Route::get('/', function () {
    return view('auth.login');
});

// Route::get('/kirimemail', [App\Http\Controllers\TesEmailController::class, 'index'])->middleware(['verified']);

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
    })->middleware(['verified']);

    Route::get('/survey', function () {
        return view('survey');
    })->middleware(['verified']);

    Route::get('/mount', function () {
        return view('mount');
    })->middleware(['verified']);

    Route::get('/troubleshoot', function () {
        return view('troubleshoot');
    })->middleware(['verified']);

    Route::get('/cleaning_bm', [App\Http\Controllers\CleaningController::class, 'tampilan'])->middleware(['verified']);

    // Route::get('/cleaning_bm', [App\Http\Controllers\CleaningController::class, 'detail_ob'])->middleware(['verified']);

    Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware(['verified']);

    //Detail History
    Route::get('/detail_survey/{id}', [HomeController::class, 'detail_permit_survey'])->middleware(['verified']);
    Route::get('/detail_cleaning/{id}', [App\Http\Controllers\CleaningController::class, 'detail_permit_cleaning'])->middleware(['verified']);

    //Approve
    Route::post('/approve_survey', [HomeController::class, 'approve_survey']);
    Route::post('/approve_cleaning', [App\Http\Controllers\CleaningController::class, 'approve_cleaning']);

    //Reject
    Route::post('/survey_reject', [HomeController::class, 'survey_reject']);
    Route::post('/cleaning_reject', [App\Http\Controllers\CleaningController::class, 'cleaning_reject']);

    //Submit
    Route::post('/submit_data_survey', [HomeController::class, 'submit_data_survey']);
    Route::post('/submit_data_cleaning', [CleaningController::class, 'submit_data_cleaning']);
    Route::post('/submit_data', [HomeController::class, 'submit_data']);
    Route::post('/submit_mounting', [HomeController::class, 'submit_mounting']);
    Route::post('/submit_troubleshoot', [HomeController::class, 'submit_troubleshoot']);

    //Approval View
    // Route::get('/detail_survey{id}', [HomeController::class, 'approve_survey']);
    // Route::get('/detail_cleaning{id}', [CleaningController::class, 'approve_cleaning']);

    //Approval view
    Route::get('/approval/{type_view}', [HomeController::class, 'approval_view'])->middleware(['verified']);

    //Full Approval
    Route::get('/full_approval/{type_form}', [HomeController::class, 'approval_full'])->middleware(['verified']);

    //LOG
    Route::get('/log/{type_view}', [HomeController::class, 'log_view'])->middleware(['verified']);

    //Paket OB
    Route::get('/detail/{id}', [CleaningController::class, 'detail_ob'])->middleware(['verified']);

    //PDF
    Route::get('/survey_pdf/{id}', [HomeController::class, 'cetak_survey_pdf'])->middleware(['verified']);
    Route::get('/cleaning_pdf/{id}', [CleaningController::class, 'cetak_cleaning_pdf'])->middleware(['verified']);
});
