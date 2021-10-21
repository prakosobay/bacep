<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\{Route, Auth};
use App\Http\Controllers\{HomeController, CleaningController, AdminController};
use App\Console\Kernel;
use App\Models\Consum;
use Illuminate\Routing\Router;

// Auth::routes(['verify' => true]);
Route::get('/', function () {
    return view('auth.login');
})->middleware('guest');

Route::get('/sabar', function () {
    return view('sabar');
});

Route::middleware(['auth', 'verified'])->group(function () {
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
    Route::post('/submit_data_cleaning', [CleaningController::class, 'submit_data_cleaning']);

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
    Route::get('/table_user', [AdminController::class, 'show_user']);
    Route::get('/table_role', [AdminController::class, 'show_role']);
    Route::post('/role.new', [AdminController::class, 'store_role']);
    Route::post('/relasi.new', [AdminController::class, 'store_relasi']);
    Route::post('/user.new', [AdminController::class, 'store_user']);


    Route::get('/revisi.cleaning', [AdminController::class, 'update_cleaning']);
    Route::get('/table_relasi', [AdminController::class, 'show_relasi']);
    Route::post('/role.new', [AdminController::class, 'store_role']);
    Route::get('/edit.user/{id}', [AdminController::class, 'show_edit']);
    Route::get('/a.user', [AdminController::class, 'show_user']);
    Route::get('/a.role', [AdminController::class, 'show_role']);
    Route::get('/u.edit/{id}', [AdminController::class, 'user_edit']);
    Route::post('user_edit/{id}', [AdminController::class, 'user_update']);
    Route::get('/u.hapus/{id}', [AdminController::class, 'delete']);

    //Dashboard Barang
    Route::get('/table_barang', [HomeController::class, 'dashboard']);

    //Barang Consume
    Route::post('/consum', [ConsumController::class, 'csv']);
    Route::get('/c.table', [ConsumController::class, 'index']);
    Route::get('/c.new', [ConsumController::class, 'show_new']);
    Route::post('/consum_new', [ConsumController::class, 'store_consum']);
    Route::get('/c.masuk', [ConsumController::class, 'show_in']);
    Route::get('/c.keluar', [ConsumController::class, 'show_out']);
    Route::get('/c.tambah/{id}', [ConsumController::class, 'edit_masuk']);
    Route::get('/c.kurang/{id}', [ConsumController::class, 'edit_keluar']);
    Route::put('/consum_putin/{id}', [ConsumController::class, 'update_masuk']);
    Route::put('/consum_putout/{id}', [ConsumController::class, 'update_keluar']);
    Route::get('/export.consum', [ConsumController::class, 'export_consum']);
    Route::get('/export.c.m', [ConsumController::class, 'export_consum_masuk']);
    Route::get('/export.c.k', [ConsumController::class, 'export_consum_keluar']);

    //Barang Asset
    Route::post('/asset', [AssetController::class, 'csv']);
    Route::get('/a.table', [AssetController::class, 'index']);
    Route::get('/a.new', [AssetController::class, 'show_new']);
    Route::post('/asset_new', [AssetController::class, 'store_asset']);
    Route::get('/a.masuk', [AssetController::class, 'show_in']);
    Route::get('/a.keluar', [AssetController::class, 'show_out']);
    Route::get('/a.tambah/{id}', [AssetController::class, 'edit_masuk']);
    Route::get('/a.kurang/{id}', [AssetController::class, 'edit_keluar']);
    Route::put('/asset_putin/{id}', [AssetController::class, 'update_masuk']);
    Route::put('/asset_putout/{id}', [AssetController::class, 'update_keluar']);
    Route::get('/export.asset', [AssetController::class, 'export_asset']);
    Route::get('/export.a.m', [AssetController::class, 'export_asset_masuk']);
    Route::get('/export.a.k', [AssetController::class, 'export_asset_keluar']);

    //Checklist Genset
    Route::get('/checklist.warming', [GensetController::class, 'show_warming']);
    Route::post('/submit.form', [GensetController::class, 'store_warming']);
});
// Route::resource('/barang', ConsumController::class);
