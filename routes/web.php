<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\{Route, Auth};
use App\Http\Controllers\{HomeController, CleaningController, AdminController};
use App\Console\Kernel;
use Illuminate\Routing\Router;
use App\Models\User;

// Auth::routes(['verify' => true]);
Route::get('/', function () {
    return view('auth.login');
})->middleware('guest');

Route::get('/sabar', function () {
    return view('sabar');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index']);

    //Detail History
    Route::get('/detail_survey/{id}', [HomeController::class, 'detail_permit_survey']);
    Route::get('/detail_cleaning/{id}', [CleaningController::class, 'detail_permit_cleaning']);

    //Approve
    Route::post('/approve_survey', [HomeController::class, 'approve_survey']);
    Route::post('/approve_cleaning', [CleaningController::class, 'approve_cleaning']);

    //Reject
    Route::post('/survey_reject', [HomeController::class, 'survey_reject']);
    Route::post('/cleaning_reject', [CleaningController::class, 'cleaning_reject']);

    //Submit
    // Route::post('/submit_data_survey', [HomeController::class, 'submit_data_survey']);
    Route::post('/submit_data_cleaning', [CleaningController::class, 'submit_data_cleaning']);
    // Route::post('/submit_data', [HomeController::class, 'submit_data']);
    // Route::post('/submit_mounting', [HomeController::class, 'submit_mounting']);
    // Route::post('/submit_troubleshoot', [HomeController::class, 'submit_troubleshoot']);

    //Approval View
    // Route::get('/detail_survey{id}', [HomeController::class, 'approve_survey']);
    Route::get('/detail_cleaning{id}', [CleaningController::class, 'approve_cleaning']);

    //Approval view
    Route::get('/approval/{type_view}', [HomeController::class, 'approval_view']);

    //Full Approval
    Route::get('/full_approval/{type_form}', [HomeController::class, 'approval_full']);

    //LOG
    Route::get('/log/{type_view}', [HomeController::class, 'log_view']);

    //Paket OB
    Route::get('/detail/{id}', [CleaningController::class, 'detail_ob']);

    //Form
    Route::get('/cleaning.form', [CleaningController::class, 'tampilan']);
    Route::get('/other', [OtherController::class, 'index']);

    //Pilihan Work
    Route::get('/cleaning/{id}', [CleaningController::class, 'pilihan_work']);

    //PDF
    Route::get('/survey_pdf/{id}', [HomeController::class, 'cetak_survey_pdf']);
    Route::get('/cleaning_pdf/{id}', [CleaningController::class, 'cetak_cleaning_pdf']);

    //Admin Panel
    Route::get('/admin', [AdminController::class, 'get_user']);

    //Barang Consume
    Route::get('/consum.create', [TesController::class, 'index']);
    Route::get('/consum.keluar', [TesController::class, 'update']);
    Route::get('/consum.masuk', [TesController::class, 'store']);
    Route::get('/consum.gambar', [TesController::class, 'gambar']);
    Route::post('/import', [TesController::class, 'import_csv']);
    Route::post('/edit', [TesController::class, 'edit_data']);
    Route::get('/main', [TesController::class, 'main']);
    //Yajra
    Route::get('/datatable', [TesController::class, 'data_consum']);
    Route::get('/out', [TesController::class, 'data_keluar']);
    Route::get('/input', [TesController::class, 'data_masuk']);

    //Barang Asset
    Route::get('/asset.create', [AssetController::class, 'show']);
    Route::post('/import_asset', [AssetController::class, 'import_csv']);
    Route::get('/asset', [AssetController::class, 'data_asset']);
});
// Route::resource('/barang', ConsumController::class);
