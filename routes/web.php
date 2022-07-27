<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{HomeController, CleaningController, AdminController};

Route::get('/', function () {
    return view('auth.login');
})->middleware('guest');

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index']);

    //Detail History
    Route::get('/detail_cleaning/{id}', [CleaningController::class, 'detail_permit_cleaning']);

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


    //Admin Panel
    Route::get('/table_user', [AdminController::class, 'show_user']);
    Route::get('/table_role', [AdminController::class, 'show_role']);
    Route::get('admin/user/edit/{id}', [AdminController::class, 'user_edit']);
    Route::put('u.edit/{id}', [AdminController::class, 'user_update']);
    Route::post('/role.new', [AdminController::class, 'store_role']);
    Route::post('/relasi.new', [AdminController::class, 'store_relasi']);
    Route::post('/user.new', [AdminController::class, 'store_user']);
    Route::post('admin/user/destroy/{id}', [AdminController::class, 'delete_user']);
    Route::post('/role.destroy/{id}', [AdminController::class, 'delete_role']);
    Route::post('/role.destroy/{id}', [AdminController::class, 'delete_role']);
    Route::post('/relasi.destroy/{id}', [AdminController::class, 'delete_relasi']);
    Route::get('admin/yajra/user/show', [AdminController::class, 'yajra_show_user']);
    Route::get('admin/yajra/relasi/show', [AdminController::class, 'yajra_show_relasi']);


    // Revisi
    Route::get('/revisi.cleaning', [AdminController::class, 'update_cleaning']);
    Route::get('/table_relasi', [AdminController::class, 'show_relasi']);
    Route::post('/role.new', [AdminController::class, 'store_role']);
    Route::get('/edit.user/{id}', [AdminController::class, 'show_edit']);
    Route::get('/a.user', [AdminController::class, 'show_user']);
    Route::get('/a.role', [AdminController::class, 'show_role']);
    Route::get('/u.hapus/{id}', [AdminController::class, 'delete']);


    //Dashboard Barang
    Route::get('table_barang', [HomeController::class, 'dashboard'])->name('table_barang');

    //Barang Consume
    Route::get('consum/table/show', [ConsumController::class, 'consum_table_show'])->name('consumTable');
    Route::get('consum/create/show', [ConsumController::class, 'consum_create_show']);
    Route::get('consum/masuk/show', [ConsumController::class, 'consum_masuk_show']);
    Route::get('consum/keluar/show', [ConsumController::class, 'consum_keluar_show']);
    Route::get('consum/edit/masuk/{id}', [ConsumController::class, 'consum_edit_masuk']);
    Route::get('consum/edit/keluar/{id}', [ConsumController::class, 'consum_edit_keluar']);
    Route::get('consum/edit/itemcode/{id}', [ConsumController::class, 'consum_edit_itemcode']);
    Route::put('consum/update/masuk/{id}', [ConsumController::class, 'consum_update_masuk']);
    Route::put('consum/update/keluar/{id}', [ConsumController::class, 'consum_update_keluar']);
    Route::put('consum/update/itemcode/{id}', [ConsumController::class, 'consum_update_itemcode']);
    Route::get('/export.consum', [ConsumController::class, 'export_consum']);
    Route::get('/export.c.m', [ConsumController::class, 'export_consum_masuk']);
    Route::get('/export.c.k', [ConsumController::class, 'export_consum_keluar']);
    Route::get('consum/yajra/show', [ConsumController::class, 'consum_yajra_show']);
    Route::get('consum/yajra/masuk', [ConsumController::class, 'consum_yajra_masuk']);
    Route::get('consum/yajra/keluar', [ConsumController::class, 'consum_yajra_keluar']);
    Route::post('consum/create/submit', [ConsumController::class, 'consum_create_submit']);
    Route::post('consum/import/table', [ConsumController::class, 'csv']);
    Route::post('consum/import/keluar', [ConsumController::class, 'import_keluar']);
    Route::post('consum/import/masuk', [ConsumController::class, 'import_masuk']);




    //Barang Asset
    Route::get('asset/table/show', [AssetController::class, 'index'])->name('assetTable');
    Route::get('asset/masuk/show', [AssetController::class, 'asset_masuk_show']);
    Route::get('asset/keluar/show', [AssetController::class, 'asset_keluar_show']);
    Route::get('asset/digunakan/show', [AssetController::class, 'asset_uses_show']);
    Route::get('asset/create/show', [AssetController::class, 'asset_create_show']);
    Route::get('asset/edit/show/{id}', [AssetController::class, 'asset_edit_show']);
    Route::get('asset/edit/keluar/{id}', [AssetController::class, 'asset_edit_keluar']);
    Route::get('asset/edit/digunakan/{id}', [AssetController::class, 'asset_edit_digunakan']);
    Route::put('asset/update/masuk/{id}', [AssetController::class, 'asset_update_masuk']);
    Route::put('asset/update/keluar/{id}', [AssetController::class, 'asset_update_keluar']);
    Route::put('asset/update/digunakan/{id}', [AssetController::class, 'asset_update_digunakan']);
    Route::put('asset/update/itemcode/{id}', [AssetController::class, 'asset_update_itemcode']);
    Route::get('/export.asset', [AssetController::class, 'export_asset']);
    Route::get('/export.a.m', [AssetController::class, 'export_asset_masuk']);
    Route::get('/export.a.k', [AssetController::class, 'export_asset_keluar']);
    Route::get('asset/yajra/show', [AssetController::class, 'asset_yajra_show']);
    Route::get('asset/yajra/masuk', [AssetController::class, 'asset_yajra_masuk']);
    Route::get('asset/yajra/keluar', [AssetController::class, 'asset_yajra_keluar']);
    Route::get('asset/yajra/uses', [AssetController::class, 'asset_yajra_uses']);
    Route::get('asset/edit/itemcode/{id}', [AssetController::class, 'asset_edit_itemcode']);
    Route::post('asset/import/table', [AssetController::class, 'asset_import_table']);
    Route::post('asset/import/masuk', [AssetController::class, 'asset_import_masuk']);
    Route::post('asset/import/keluar', [AssetController::class, 'asset_import_keluar']);
    Route::post('asset/import/uses', [AssetController::class, 'asset_import_uses']);
    Route::post('asset/create/store', [AssetController::class, 'asset_create_store']);



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



    // Revisi Visitor
    Route::get('/revisi/visitor/show', [RevisiController::class, 'show_visitor'])->name('show_visitor');
    Route::get('revisi/visitor/create', [RevisiController::class, 'revisi_visitor_create']);
    Route::get('/revisi/visitor/yajra', [RevisiController::class, 'yajra_visitor']);
    Route::get('/revisi/visitor/edit/{id}', [RevisiController::class, 'edit_visitor']);
    Route::put('/revisi/visitor/edit/{id}', [RevisiController::class, 'update_visitor']);
    Route::post('/revisi/visitor/destroy/{id}', [RevisiController::class, 'destroy_visitor']);
    Route::post('revisi/visitor/create', [RevisiController::class, 'store_visitor']);



    // Survey
    Route::get('survey/form/show', [SurveyController::class, 'form_show']);
    Route::get('jsona', [SurveyController::class, 'json']);
    Route::get('route_data_approval', [SurveyController::class, 'data_approval']);
    Route::get('route_history_survey', [SurveyController::class, 'data_history']);
    Route::get('history/{type_view}', [HomeController::class, 'log_view']);
    Route::get('/survey_pdf/{id}', [SurveyController::class, 'pdf']);
    Route::get('route_full_survey', [SurveyController::class, 'full']);
    Route::post('survey/create', [SurveyController::class, 'survey_create']);
    Route::post('/approve_survey', [SurveyController::class, 'approve']);
    Route::post('/reject_survey', [SurveyController::class, 'reject']);
    Route::get('survey/yajra/full/visitor', [SurveyController::class, 'survey_yajra_full_visitor']);



    // Cleaning
    Route::get('route_history_cleaning', [CleaningController::class, 'data_history']);
    Route::get('yajra_full_approve_cleaning', [CleaningController::class, 'data_full_approve_cleaning']);
    Route::get('yajra_full_approve_cleaning_other', [CleaningController::class, 'data_log_full']);
    Route::get('/cleaning/yajra/full/reject', [CleaningController::class, 'data_reject_cleaning']);
    Route::get('log_cleaning', [CleaningController::class, 'log_carbon']);
    Route::get('/cleaning_pdf/{id}', [CleaningController::class, 'cetak_cleaning_pdf']);
    Route::get('/cleaning/{id}', [CleaningController::class, 'pilihan_work']);
    Route::get('/detail/{id}', [CleaningController::class, 'detail_ob']);
    Route::get('cleaning_form', [CleaningController::class, 'show_form']);
    Route::get('/cleaning/action/checkin/{id}', [CleaningController::class, 'checkin_form_cleaning']);
    Route::get('/cleaning/action/checkout/{id}', [CleaningController::class, 'checkout_form_cleaning']);
    Route::get('/cleaning/action/show/{id}', [CleaningController::class, 'cetak_full_cleaning']);
    Route::get('cleaning/action/export', [CleaningController::class, 'cetak_all_full_cleaning']);
    Route::get('/cleaning/reject/show', [CleaningController::class, 'show_reject_cleaning']);
    Route::post('/route_submit_cleaning', [CleaningController::class, 'submit_data_cleaning']);
    Route::post('/cleaning_reject', [CleaningController::class, 'reject_form_cleaning']);
    Route::post('/cleaning/full/reject/{id}', [CleaningController::class, 'reject_full_cleaning']);
    Route::post('/approve_cleaning', [CleaningController::class, 'approve_cleaning']);
    Route::put('/cleaning/checkin/{id}', [CleaningController::class, 'checkin_update_cleaning']);
    Route::put('/cleaning/checkout/{id}', [CleaningController::class, 'checkout_update_cleaning']);
    Route::put('/cleaning/reject/{id}', [CleaningController::class, 'reject_full_cleaning']);



    // Troubleshoot
    Route::get('other/troubleshoot/show', [OtherController::class, 'show_troubleshoot_form']);
    Route::get('other/troubleshoot/pdf/{id}', [OtherController::class, 'pdf_troubleshoot']);
    Route::get('other/troubleshoot/yajra/history', [OtherController::class, 'yajra_troubleshoot_history']);
    Route::get('other/troubleshoot/yajra/full/approval', [OtherController::class, 'other_troubleshoot_yajra_full_approval']);
    Route::get('other/troubleshoot/yajra/full/visitor', [OtherController::class, 'other_troubleshoot_yajra_full_visitor']);
    Route::get('other/troubleshoot/yajra/full/reject', [OtherController::class, 'other_troubleshoot_yajra_full_reject']);
    Route::get('other/troubleshoot/action/checkin/{id}', [OtherController::class, 'other_troubleshoot_action_checkin']);
    Route::put('other/troubleshoot/update/checkin/{id}', [OtherController::class, 'other_troubleshoot_update_checkin']);
    Route::post('other/troubleshoot/create', [OtherController::class, 'create_troubleshoot']);
    Route::post('other/troubleshoot/approve', [OtherController::class, 'approve_troubleshoot']);
    Route::post('other/troubleshoot/reject', [OtherController::class, 'reject_troubleshoot']);



    // Maintenance
    Route::get('other/maintenance/show', [OtherController::class, 'show_maintenance_form']);
    Route::get('other/maintenance/log', [OtherController::class, 'show_maintenance_log']);
    Route::get('other/maintenance/full', [OtherController::class, 'show_maintenance_full']);
    Route::get('other/maintenance/full/reject', [OtherController::class, 'show_maintenance_reject']);
    Route::get('other/maintenance/rutin/{id}', [OtherController::class, 'get_rutin']);
    Route::get('other/maintenance/visitor/{id}', [OtherController::class, 'get_visitor']);
    Route::get('other/maintenance/yajra', [OtherController::class, 'yajra_history']);
    Route::get('/other/maintenance/yajra/full/visitor', [OtherController::class, 'yajra_full_visitor_maintenance']);
    Route::get('/other/maintenance/yajra/full/approval', [OtherController::class, 'yajra_full_approval_maintenance']);
    Route::get('/other/maintenance/yajra/full/reject', [OtherController::class, 'yajra_full_reject_maintenance']);
    Route::get('/other/maintenance/pdf/{id}', [OtherController::class, 'pdf_maintenance']);
    Route::get('other/maintenance/action/checkin/{id}', [OtherController::class, 'show_maintenance_checkin']);
    Route::put('other/maintenance/update/checkin/{id}', [OtherController::class, 'other_maintenance_update_checkin']);
    Route::post('/other/maintenance/approve', [OtherController::class, 'approve_maintenance']);
    Route::post('/other/maintenance/reject', [OtherController::class, 'reject_maintenance']);
    Route::post('other/maintenance/create', [OtherController::class, 'create_maintenance']);
    Route::post('/other/maintenance/full/reject/{id}', [OtherController::class, 'update_reject_maintenance']);
    Route::post('/other/maintenance/form/checkin', [OtherController::class, 'update_checkin_maintenance']);


    // Internal
    Route::get('internal/it/form', [InternalController::class, 'internal_it_form']);
    Route::get('/internal/it/pdf/{id}', [InternalController::class, 'internal_it_pdf']);
    Route::get('internal/yajra/history', [InternalController::class, 'internal_yajra_history']);
    Route::get('internal/yajra/full/approval', [InternalController::class, 'internal_yajra_full_approval']);
    Route::get('internal/it/yajra/full/visitor', [InternalController::class, 'internal_it_yajra_full_visitor']);
    Route::post('internal/create', [InternalController::class, 'internal_create']);
    Route::post('internal/approve/{id}', [InternalController::class, 'internal_approve']);
    Route::post('internal/reject/{id}', [InternalController::class, 'internal_reject']);


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
