<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{HomeController, CleaningController, AdminController};

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/home', [HomeController::class, 'index']);

    //Detail History
    Route::get('/detail_cleaning/{id}', [CleaningController::class, 'detail_permit_cleaning']);

    //Approve flow
    Route::post('/approve_other', [RutinController::class, 'approve_other']);

    //Reject
    Route::post('other_reject', [RutinController::class, 'reject']);

    //Submit
    Route::post('/rutin.form', [RutinController::class, 'store_rutin']);

    //History
    Route::get('/detail_cleaning{id}', [CleaningController::class, 'approve_cleaning']);

    //Full Approval
    Route::get('/full_approval/{type_form}', [HomeController::class, 'approval_full']);

    //LOG
    Route::get('/log/{type_view}', [HomeController::class, 'log_view']);

    //Revisi personil ob
    Route::get('revisi/{type_view}', [HomeController::class, 'revisi_view']);
    Route::post('/other_revisi', [RutinController::class, 'revisi']);
    Route::get('/rev/{id}', [RutinController::class, 'other_revisi']);

    //PDF
    Route::get('/other_pdf/{id}', [RutinController::class, 'other_pdf']);

    //Admin Panel
    Route::get('/table_user', [AdminController::class, 'show_user']);
    Route::get('/table_role', [AdminController::class, 'show_role']);
    Route::post('/role.new', [AdminController::class, 'store_role']);
    Route::post('/relasi.new', [AdminController::class, 'store_relasi']);
    Route::post('/user.new', [AdminController::class, 'store_user']);
    Route::post('/user.destroy/{id}', [AdminController::class, 'delete_user']);
    Route::post('/role.destroy/{id}', [AdminController::class, 'delete_role']);
    Route::post('/role.destroy/{id}', [AdminController::class, 'delete_role']);
    Route::post('/relasi.destroy/{id}', [AdminController::class, 'delete_relasi']);

    Route::get('/revisi.cleaning', [AdminController::class, 'update_cleaning']);
    Route::get('/table_relasi', [AdminController::class, 'show_relasi']);
    Route::post('/role.new', [AdminController::class, 'store_role']);
    Route::get('/edit.user/{id}', [AdminController::class, 'show_edit']);
    Route::get('/a.user', [AdminController::class, 'show_user']);
    Route::get('/a.role', [AdminController::class, 'show_role']);
    Route::get('/u.edit/{id}', [AdminController::class, 'user_edit']);
    Route::put('u.edit/{id}', [AdminController::class, 'user_update']);
    Route::get('/u.hapus/{id}', [AdminController::class, 'delete']);

    //Dashboard Barang
    Route::get('/table_barang', [HomeController::class, 'dashboard'])->name('table_barang');

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
    Route::get('/a.uses/{id}', [AssetController::class, 'edit_use']);
    Route::put('/asset_putin/{id}', [AssetController::class, 'update_masuk']);
    Route::put('/asset_putout/{id}', [AssetController::class, 'update_keluar']);
    Route::put('/asset_use/{id}', [AssetController::class, 'update_use']);
    Route::get('/export.asset', [AssetController::class, 'export_asset']);
    Route::get('/export.a.m', [AssetController::class, 'export_asset_masuk']);
    Route::get('/export.a.k', [AssetController::class, 'export_asset_keluar']);
    Route::get('/a.use', [AssetController::class, 'show_use']);

    //Checklist Genset
    Route::get('/checklist.warming', [GensetController::class, 'show_warming']);
    Route::get('/checklist.table', [GensetController::class, 'index']);
    Route::get('/c.show/{id}', [GensetController::class, 'show']);
    Route::get('/c.pdf/{id}', [GensetController::class, 'pdf']);
    Route::post('/checklist', [GensetController::class, 'store_warming']);

    //Revisi
    Route::get('/ob', [RevisiController::class, 'show_ob'])->name('ob');
    Route::get('/ob.edit/{id}', [RevisiController::class, 'edit_ob']);
    Route::put('/ob.edit/{id}', [RevisiController::class, 'update_ob']);
    Route::post('/ob.destroy/{id}', [RevisiController::class, 'destroy_ob']);
    Route::post('/ob.new', [RevisiController::class, 'store_ob']);

    //Perbaikan
    Route::get('/perbaikan', [RutinController::class, 'form_perbaikan']);

    //Rutin
    Route::get('rutin', [RutinController::class, 'index']);
    Route::get('/rutins/{id}', [RutinController::class, 'rutin']);
    Route::get('/personil/{id}', [RutinController::class, 'personil']);

    // Survey
    Route::post('/survey', [SurveyController::class, 'store']);
    Route::get('jsona', [SurveyController::class, 'json']);
    Route::get('route_data_approval', [SurveyController::class, 'data_approval']);
    Route::get('route_history_survey', [SurveyController::class, 'data_history']);
    Route::get('history/{type_view}', [HomeController::class, 'log_view']);
    Route::get('/survey_pdf/{id}', [SurveyController::class, 'pdf']);
    Route::get('route_full_survey', [SurveyController::class, 'full']);
    Route::post('/approve_survey', [SurveyController::class, 'approve']);
    Route::post('/reject_survey', [SurveyController::class, 'reject']);

    // Cleaning
    Route::get('route_history_cleaning', [CleaningController::class, 'data_history']);
    Route::get('yajra_full_approve_cleaning', [CleaningController::class, 'data_full_approve_cleaning']);
    Route::get('yajra_full_approve_cleaning_other', [CleaningController::class, 'data_log_full']);
    Route::get('yajra_reject_cleaning_other', [CleaningController::class, 'data_reject_cleaning']);
    Route::get('log_cleaning', [CleaningController::class, 'log_carbon']);
    Route::get('/cleaning_pdf/{id}', [CleaningController::class, 'cetak_cleaning_pdf']);
    Route::get('/cleaning/{id}', [CleaningController::class, 'pilihan_work']);
    Route::get('/detail/{id}', [CleaningController::class, 'detail_ob']);
    Route::get('cleaning_form', [CleaningController::class, 'show_form']);
    Route::get('/cleaning/action/checkin/{id}', [CleaningController::class, 'checkin_form_cleaning']);
    Route::get('/cleaning/action/checkout/{id}', [CleaningController::class, 'checkout_form_cleaning']);
    Route::get('/cleaning/action/show/{id}', [CleaningController::class, 'cetak_full_cleaning']);
    Route::get('cleaning/action/export', [CleaningController::class, 'export_excel']);
    Route::get('/cleaning/reject/show', [CleaningController::class, 'show_reject_cleaning']);
    Route::post('/route_submit_cleaning', [CleaningController::class, 'submit_data_cleaning']);
    Route::post('/cleaning_reject', [CleaningController::class, 'reject_form_cleaning']);
    Route::post('/cleaning/full/reject/{id}', [CleaningController::class, 'reject_full_cleaning']);
    Route::post('/approve_cleaning', [CleaningController::class, 'approve_cleaning']);
    Route::put('/cleaning/checkin/{id}', [CleaningController::class, 'checkin_update_cleaning']);
    Route::put('/cleaning/checkout/{id}', [CleaningController::class, 'checkout_update_cleaning']);
    Route::put('/cleaning/reject/{id}', [CleaningController::class, 'reject_full_cleaning']);

    // Other


    //Visitor All Base Super
    Route::get('new_permit', [HomeController::class, 'new_permit']);

    // ALL
    Route::get('history/{type_view}', [HomeController::class, 'history']);
    Route::get('approval/{type_approve}', [HomeController::class, 'approval']);
    Route::get('full/{type_full}', [HomeController::class, 'full']);

    //Log
    Route::get('logall', [HomeController::class, 'log_all'])->name('logall');
    Route::get('datatables', [ItController::class, 'anydata']);

});
