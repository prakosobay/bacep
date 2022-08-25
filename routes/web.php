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


    Route::controller(AdminController::class)->group(function(){
        //Admin Panel
        Route::get('/table_user', 'show_user');
        Route::get('/table_role', 'show_role');
        Route::get('admin/user/edit/{id}', 'user_edit');
        Route::put('u.edit/{id}', 'user_update');
        Route::post('/role.new', 'store_role');
        Route::post('/relasi.new', 'store_relasi');
        Route::post('/user.new', 'store_user');
        Route::post('admin/user/destroy/{id}', 'delete_user');
        Route::post('/role.destroy/{id}', 'delete_role');
        Route::post('/role.destroy/{id}', 'delete_role');
        Route::post('/relasi.destroy/{id}', 'delete_relasi');
        Route::get('admin/yajra/user/show', 'yajra_show_user');
        Route::get('admin/yajra/relasi/show', 'yajra_show_relasi');

        // Revisi
        Route::get('/revisi.cleaning', 'update_cleaning');
        Route::get('/table_relasi', 'show_relasi');
        Route::post('/role.new', 'store_role');
        Route::get('/edit.user/{id}', 'show_edit');
        Route::get('/a.user', 'show_user');
        Route::get('/a.role', 'show_role');
        Route::get('/u.hapus/{id}', 'delete');
    });


    Route::controller(MasterRoomController::class)->group(function(){
        Route::get('room/table', 'table')->name('room');
        Route::get('room/yajra', 'yajra');
        Route::post('room/store', 'store');
        Route::post('room/update', 'update');
        Route::post('room/delete/{id}', 'delete');
    });

    Route::controller(MasterCompanyController::class)->group(function(){
        Route::get('company/table', 'table')->name('company');
        Route::get('company/yajra', 'yajra');
        Route::post('company/store', 'store');
        Route::post('company/update', 'update');
        Route::post('company/delete/{id}', 'delete');
    });

    Route::controller(MasterRackController::class)->group(function(){
        Route::get('rack/table', 'table')->name('rack');
        Route::get('rack/yajra', 'yajra');
        Route::get('rack/create', 'create');
        Route::post('rack/store', 'store');
        Route::post('rack/update', 'update');
        Route::post('rack/delete/{id}', 'delete');
    });



    //Dashboard Barang
    Route::get('table_barang', [HomeController::class, 'dashboard'])->name('table_barang');



    //Barang Consume
    Route::controller(ConsumController::class)->group(function(){
        Route::get('consum/table/show', 'consum_table_show')->name('consumTable');
        Route::get('consum/create/show', 'consum_create_show');
        Route::get('consum/masuk/show', 'consum_masuk_show');
        Route::get('consum/keluar/show', 'consum_keluar_show');
        Route::get('consum/edit/masuk/{id}', 'consum_edit_masuk');
        Route::get('consum/edit/keluar/{id}', 'consum_edit_keluar');
        Route::get('consum/edit/itemcode/{id}', 'consum_edit_itemcode');
        Route::put('consum/update/masuk/{id}', 'consum_update_masuk');
        Route::put('consum/update/keluar/{id}', 'consum_update_keluar');
        Route::put('consum/update/itemcode/{id}', 'consum_update_itemcode');
        Route::get('/export.consum', 'export_consum');
        Route::get('/export.c.m', 'export_consum_masuk');
        Route::get('/export.c.k', 'export_consum_keluar');
        Route::get('consum/yajra/show', 'consum_yajra_show');
        Route::get('consum/yajra/masuk', 'consum_yajra_masuk');
        Route::get('consum/yajra/keluar', 'consum_yajra_keluar');
        Route::post('consum/create/submit', 'consum_create_submit');
        Route::post('consum/import/table', 'csv');
        Route::post('consum/import/keluar', 'import_keluar');
        Route::post('consum/import/masuk', 'import_masuk');
    });




    //Barang Asset
    Route::controller(AssetController::class)->group(function(){
        Route::get('asset/table/show', 'index')->name('assetTable');
        Route::get('asset/masuk/show', 'asset_masuk_show');
        Route::get('asset/keluar/show', 'asset_keluar_show');
        Route::get('asset/digunakan/show', 'asset_uses_show');
        Route::get('asset/create/show', 'asset_create_show');
        Route::get('asset/edit/show/{id}', 'asset_edit_show');
        Route::get('asset/edit/keluar/{id}', 'asset_edit_keluar');
        Route::get('asset/edit/digunakan/{id}', 'asset_edit_digunakan');
        Route::get('/export.asset', 'export_asset');
        Route::get('/export.a.m', 'export_asset_masuk');
        Route::get('/export.a.k', 'export_asset_keluar');
        Route::get('asset/yajra/show', 'asset_yajra_show');
        Route::get('asset/yajra/masuk', 'asset_yajra_masuk');
        Route::get('asset/yajra/keluar', 'asset_yajra_keluar');
        Route::get('asset/yajra/uses', 'asset_yajra_uses');
        Route::get('asset/edit/itemcode/{id}', 'asset_edit_itemcode');
        Route::put('asset/update/masuk/{id}', 'asset_update_masuk');
        Route::put('asset/update/keluar/{id}', 'asset_update_keluar');
        Route::put('asset/update/digunakan/{id}', 'asset_update_digunakan');
        Route::put('asset/update/itemcode/{id}', 'asset_update_itemcode');
        Route::post('asset/import/table', 'asset_import_table');
        Route::post('asset/import/masuk', 'asset_import_masuk');
        Route::post('asset/import/keluar', 'asset_import_keluar');
        Route::post('asset/import/uses', 'asset_import_uses');
        Route::post('asset/create/store', 'asset_create_store');
    });



    //Checklist Genset
    Route::get('/checklist.warming', [GensetController::class, 'show_warming']);
    Route::get('/checklist.table', [GensetController::class, 'index']);
    Route::get('/c.show/{id}', [GensetController::class, 'show']);
    Route::get('/c.pdf/{id}', [GensetController::class, 'pdf']);
    Route::post('/checklist', [GensetController::class, 'store_warming']);



    Route::controller(RevisiController::class)->group(function(){
        //Revisi OB
        Route::get('/ob', 'show_ob')->name('ob');
        Route::get('/ob.edit/{id}', 'edit_ob');
        Route::put('/ob.edit/{id}', 'update_ob');
        Route::post('/ob.destroy/{id}', 'destroy_ob');
        Route::post('/ob.new', 'store_ob');

        // Revisi Visitor
        Route::get('/revisi/visitor/show', 'show_visitor')->name('show_visitor');
        Route::get('revisi/visitor/create', 'revisi_visitor_create');
        Route::get('/revisi/visitor/yajra', 'yajra_visitor');
        Route::get('/revisi/visitor/edit/{id}', 'edit_visitor');
        Route::put('/revisi/visitor/edit/{id}', 'update_visitor');
        Route::post('/revisi/visitor/destroy/{id}', 'destroy_visitor');
        Route::post('revisi/visitor/create', 'store_visitor');
    });


    // Survey
    Route::controller(SurveyController::class)->group(function(){
        Route::get('survey/form', 'form');
        Route::get('/survey/pdf/{id}', 'pdf');
        Route::get('jsona', 'json');
        Route::get('route_data_approval', 'data_approval');
        Route::get('route_history_survey', 'data_history');
        Route::get('history/{type_view}', 'log_view');
        Route::get('route_full_survey', 'full');
        Route::get('survey/yajra/full/visitor', 'survey_yajra_full_visitor');
        Route::post('survey/create', 'create');
        Route::post('/approve_survey', 'approve');
        Route::post('/reject_survey', 'reject');
    });


    // Cleaning
    Route::controller(CleaningController::class)->group(function(){
        Route::get('route_history_cleaning', 'data_history');
        Route::get('yajra_full_approve_cleaning', 'data_full_approve_cleaning');
        Route::get('yajra_full_approve_cleaning_other', 'data_log_full');
        Route::get('/cleaning/yajra/full/reject', 'data_reject_cleaning');
        Route::get('log_cleaning', 'log_carbon');
        Route::get('/cleaning_pdf/{id}', 'cetak_cleaning_pdf');
        Route::get('/cleaning/{id}', 'pilihan_work');
        Route::get('/detail/{id}', 'detail_ob');
        Route::get('cleaning_form', 'show_form');
        Route::get('/cleaning/action/checkin/{id}', 'checkin_form_cleaning');
        Route::get('/cleaning/action/checkout/{id}', 'checkout_form_cleaning');
        Route::get('/cleaning/action/show/{id}', 'cetak_full_cleaning');
        Route::get('cleaning/action/export', 'cetak_all_full_cleaning');
        Route::get('/cleaning/reject/show', 'show_reject_cleaning');
        Route::get('cleaning/yajra/log', 'cleaning_yajra_log');
        Route::put('/cleaning/checkin/{id}', 'checkin_update_cleaning');
        Route::put('/cleaning/checkout/{id}', 'checkout_update_cleaning');
        Route::put('/cleaning/reject/{id}', 'reject_full_cleaning');
        Route::post('/route_submit_cleaning', 'submit_data_cleaning');
        Route::post('/cleaning_reject', 'reject_form_cleaning');
        Route::post('/cleaning/full/reject/{id}', 'reject_full_cleaning');
        Route::post('/approve_cleaning', 'approve_cleaning');
    });


    // Other
    Route::controller(OtherController::class)->group(function(){
        // Troubleshoot
        Route::get('other/troubleshoot/show', 'show_troubleshoot_form');
        Route::get('other/troubleshoot/pdf/{id}', 'pdf_troubleshoot');
        Route::get('other/troubleshoot/yajra/history', 'yajra_troubleshoot_history');
        Route::get('other/troubleshoot/yajra/full/approval', 'other_troubleshoot_yajra_full_approval');
        Route::get('other/troubleshoot/yajra/full/visitor', 'other_troubleshoot_yajra_full_visitor');
        Route::get('other/troubleshoot/yajra/full/reject', 'other_troubleshoot_yajra_full_reject');
        Route::get('other/troubleshoot/action/checkin/{id}', 'other_troubleshoot_action_checkin');
        Route::put('other/troubleshoot/update/checkin/{id}', 'other_troubleshoot_update_checkin');
        Route::post('other/troubleshoot/create', 'create_troubleshoot');
        Route::post('other/troubleshoot/approve', 'approve_troubleshoot');
        Route::post('other/troubleshoot/reject', 'reject_troubleshoot');

        // Maintenance
        Route::get('other/maintenance/show', 'show_maintenance_form');
        Route::get('other/maintenance/log', 'show_maintenance_log');
        Route::get('other/maintenance/full', 'show_maintenance_full');
        Route::get('other/maintenance/full/reject', 'show_maintenance_reject');
        Route::get('other/maintenance/rutin/{id}', 'get_rutin');
        Route::get('other/maintenance/visitor/{id}', 'get_visitor');
        Route::get('other/maintenance/yajra', 'yajra_history');
        Route::get('/other/maintenance/yajra/full/visitor', 'yajra_full_visitor_maintenance');
        Route::get('/other/maintenance/yajra/full/approval', 'yajra_full_approval_maintenance');
        Route::get('/other/maintenance/yajra/full/reject', 'yajra_full_reject_maintenance');
        Route::get('/other/maintenance/pdf/{id}', 'pdf_maintenance');
        Route::get('other/maintenance/action/checkin/{id}', 'show_maintenance_checkin');
        Route::put('other/maintenance/update/checkin/{id}', 'other_maintenance_update_checkin');
        Route::post('/other/maintenance/approve', 'approve_maintenance');
        Route::post('/other/maintenance/reject', 'reject_maintenance');
        Route::post('other/maintenance/create', 'create_maintenance');
        Route::post('/other/maintenance/full/reject/{id}', 'update_reject_maintenance');
        Route::post('/other/maintenance/form/checkin', 'update_checkin_maintenance');
    });


    // Internal
    Route::controller(InternalController::class)->group(function(){
        Route::get('internal/form', 'internal_form');
        Route::get('internal/last/form', 'internal_last_form');
        Route::get('last/selected/{id}', 'last_selected');
        Route::get('internal/action/checkin/form/{id}', 'internal_action_checkin_form');
        Route::get('internal/action/checkout/form/{id}', 'internal_action_checkout_form');
        Route::get('/internal/pdf/{id}', 'internal_pdf');
        Route::get('internal/yajra/history', 'internal_yajra_history');
        Route::get('internal/yajra/full/approval', 'internal_yajra_full_approval');
        Route::get('internal/getVisitor/{id}', 'getVisitor');

        Route::get('internal/finished/show', 'finished_show');
        Route::get('internal/yajra/show', 'internal_yajra_show');
        Route::get('internal/yajra/finished', 'internal_yajra_finished');
        Route::get('internal/yajra/last/form', 'internal_yajra_last_form');

        Route::put('internal/checkin/update/{id}', 'internal_checkin_update');
        Route::put('internal/checkout/update/{id}', 'internal_checkout_update');
        Route::put('internal/action/cancel/{id}', 'internal_action_cancel');
        Route::post('internal/create', 'internal_create');
        Route::post('internal/approve/{id}', 'internal_approve');
        Route::post('internal/reject/{id}', 'internal_reject');
    });




    Route::controller(ColoController::class)->group(function(){
        Route::get('isVisitor/{company}/{dept}', 'isVisitor')->name('isVisitor');
        Route::get('colo/form', 'form');
        Route::get('finished/{company}/{department}', 'finished');
        Route::get('last/form/{company}/{department}', 'last_form');

        Route::post('colo/store', 'store');
    });



    // Order Form
    Route::controller(OrderController::class)->group(function(){
        Route::get('order/form', 'order_form');
        Route::post('order/approve/{id}', 'order_approval');
        Route::post('order/store', 'order_store');
    });


    // ALL
    Route::get('history/{type_view}', [HomeController::class, 'history']);
    Route::get('approval/{type_approve}', [HomeController::class, 'approval']);
    Route::get('full/{type_full}', [HomeController::class, 'full']);
    Route::get('visitor/log/{type_log}', [HomeController::class, 'visitor_log']);


    //Log
    Route::get('logall', [HomeController::class, 'log_all'])->name('logall');
    Route::get('datatables', [ItController::class, 'anydata']);
});
