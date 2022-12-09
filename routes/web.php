<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{HomeController, CleaningController, AdminController,DCVendorController};
use FontLib\Table\Type\name;

// v.1.2.0
Route::controller(DCVendorController::class)->group(function(){
Route::get('dashboard/dcvendor', 'dashboard');
Route::get('dcvendor/show/form', 'show_form');
Route::get('dcvendor/finished/show', 'finished_show');
Route::post('dcvendor/store', 'store');
Route::post('dcvendor/create', 'create');
});
//     //Detail History
//     Route::get('/detail_cleaning/{id}', [CleaningController::class, 'detail_permit_cleaning']);

//     //History
//     Route::get('/detail_cleaning{id}', [CleaningController::class, 'approve_cleaning']);

//     //Full Approval
//     Route::get('/full_approval/{type_form}', [HomeController::class, 'approval_full']);

//     //LOG
//     Route::get('/log/{type_view}', [HomeController::class, 'log_view']);

//     //Revisi personil ob
//     Route::get('revisi/{type_view}', [HomeController::class, 'revisi_view']);
//     Route::post('/trevisi', [RutinController::class, 'revisi']);
//     Route::get('/rev/{id}', [RutinController::class, 'other_revisi']);


//     Route::controller(AdminController::class)->group(function () {
//         //Admin Panel
//         Route::get('/table_user', 'show_user');
//         Route::get('/table_role', 'show_role');
//         Route::get('admin/user/edit/{id}', 'user_edit');

//         Route::put('user/update/{id}', 'user_update')->name('userUpdate');
//         Route::post('/role.new', 'store_role');
//         Route::post('/relasi.new', 'store_relasi');
//         Route::post('/user.new', 'store_user');
//         Route::post('admin/user/destroy/{id}', 'delete_user');
//         Route::post('admin/relasi/destroy/{id}', 'relasi_destroy')->name('adminRelasiDestroy');
//         Route::post('/role.destroy/{id}', 'delete_role');
//         Route::post('/role.destroy/{id}', 'delete_role');
//         Route::post('/relasi.destroy/{id}', 'delete_relasi');
//         Route::get('admin/yajra/user/show', 'yajra_show_user');
//         Route::get('admin/yajra/relasi/show', 'yajra_show_relasi');

//         // Revisi
//         Route::get('/revisi.cleaning', 'update_cleaning');
//         Route::get('/table_relasi', 'show_relasi');
//         Route::post('/role.new', 'store_role');
//         Route::get('/edit.user/{id}', 'show_edit');
//         Route::get('/a.user', 'show_user');
//         Route::get('/a.role', 'show_role');
//         Route::get('/u.hapus/{id}', 'delete');
//     });

//     Route::controller(MasterRoomController::class)->group(function () {
//         Route::get('room/table', 'table')->name('room');
//         Route::get('room/yajra', 'yajra')->name('roomYajra');

//         Route::post('room/store', 'store')->name('roomStore');
//         Route::post('room/update/{id}', 'update')->name('roomUpdate');
//         Route::post('room/delete/{id}', 'delete')->name('roomDelete');
//     });

//     Route::controller(MasterCompanyController::class)->group(function () {
//         Route::get('company/table', 'table')->name('company');
//         Route::get('company/yajra', 'yajra')->name('companyYajra');

//         Route::post('company/store', 'store')->name('companyStore');
//         Route::post('company/update/{id}', 'update')->name('companyUpdate');
//         Route::post('company/delete/{id}', 'delete')->name('companyDelete');
//     });

//     Route::controller(MasterRackController::class)->group(function () {
//         Route::get('rack/table', 'table')->name('rack');
//         Route::get('rack/yajra', 'yajra')->name('rackYajra');
//         Route::get('rack/edit/{id}', 'edit')->name('rackEdit');

//         Route::post('rack/store', 'store')->name('rackStore');
//         Route::post('rack/update/{id}', 'update')->name('rackUpdate');
//         Route::post('rack/delete/{id}', 'delete')->name('rackDelete');
//     });

//     Route::controller(MasterSlugController::class)->group(function(){
//         Route::get('slug/table', 'table')->name('slug');
//         Route::get('slug/yajra', 'yajra')->name('slugYajra');

//         Route::post('slug/store', 'store')->name('slugStore');
//         Route::post('slug/update/{id}', 'update')->name('slugUpdate');
//         Route::post('slug/delete/{id}', 'delete')->name('slugDelete');
//     });

//     Route::controller(MasterCardController::class)->group(function () {
//         Route::post('card/store', 'store')->name('cardStore');
//         Route::post('card/update/{id}', 'update')->name('cardUpdate');
//         Route::post('card/delete/{id}', 'delete')->name('cardDelete');

//         Route::get('card/show', 'show')->name('card');
//         Route::get('card/yajra', 'yajra')->name('cardYajra');
//         Route::get('card/edit/{id}', 'edit')->name('cardEdit');
//     });

//     Route::controller(MasterCardTypeController::class)->group(function(){
//         Route::get('card-type/show', 'show')->name('cardType');
//         Route::get('card-type/yajra', 'yajra')->name('cardTypeYajra');

//         Route::post('card-type/store', 'store')->name('cardTypeStore');
//         Route::post('card-type/update/{id}', 'update')->name('cardTypeUpdate');
//         Route::post('card-type/delete/{id}', 'delete')->name('cardTypeDelete');
//     });

//     Route::controller(MasterRiskController::class)->group(function(){
//         Route::get('risk/table', 'table')->name('risk');
//         Route::get('risk/yajra', 'yajra')->name('riskYajra');

//         Route::post('risk/store', 'store')->name('riskStore');
//         Route::post('risk/update/{id}', 'update')->name('riskUpdate');
//         Route::post('risk/delete/{id}', 'delete')->name('riskDelete');
//     });


//     //Dashboard Barang
//     Route::get('table_barang', [HomeController::class, 'dashboard'])->name('table_barang');


//     // Dashboard Access Card
//     // Route::middleware(['access'])->group(function(){

//         Route::controller(MasterDepartmentCardController::class)->group(function() {
//             Route::get('department/card/show', 'show')->name('departmentCardShow');
//             Route::get('department/card/yajra', 'yajra');
//             Route::post('department/card/store', 'store')->name('departmentCardStore');
//             Route::put('department/card/update/{id}', 'update')->name('departmentCardUpdate');
//             Route::post('department/card/delete/{id}', 'delete')->name('departmentCardDelete');
//         });

//         Route::controller(MasterEmployeeController::class)->group(function(){
//             Route::get('employee/show', 'show')->name('employeeShow');
//             Route::get('employee/yajra', 'yajra');
//             Route::post('employee/import', 'import')->name('employeeImport');
//             Route::post('employee/store', 'store')->name('employeeStore');
//         });
//     // });


//     //Barang Consume
//     Route::controller(ConsumController::class)->group(function () {
//         Route::get('consum-table-show', 'table_show')->name('consumTable');
//         Route::get('consum-create-show', 'create_show')->name('consumCreateShow');
//         Route::get('consum-masuk-show', 'masuk_show')->name('consumMasukShow');
//         Route::get('consum-keluar-show', 'keluar_show')->name('consumKeluarShow');

//         Route::get('consum-edit-masuk/{id}', 'consum_edit_masuk')->name('consumEditMasuk');
//         Route::get('consum-edit-keluar/{id}', 'consum_edit_keluar')->name('consumEditKeluar');
//         Route::get('consum-edit-itemcode/{id}', 'consum_edit_itemcode')->name('consumEditItemcode');

//         Route::put('consum-update-masuk/{id}', 'update_masuk')->name('consumUpdateMasuk');
//         Route::put('consum-update-keluar/{id}', 'update_keluar')->name('consumUpdateKeluar');
//         Route::put('consum-update-itemcode/{id}', 'update_itemcode')->name('consumUpdateItemcode');

//         Route::get('consum-export-table', 'export_table')->name('consumExportTable');
//         Route::get('consum-export-masuk', 'export_masuk')->name('consumExportMasuk');
//         Route::get('consum-export-keluar', 'export_keluar')->name('consumExportKeluar');

//         Route::get('consum/yajra/show', 'consum_yajra_show');
//         Route::get('consum/yajra/masuk', 'consum_yajra_masuk');
//         Route::get('consum/yajra/keluar', 'consum_yajra_keluar');

//         Route::post('consum-create-submit', 'store')->name('consumStore');
//         Route::post('consum/import/table', 'csv')->name('consumImportTable');
//         Route::post('consum/import/keluar', 'import_keluar')->name('consumImportKeluar');
//         Route::post('consum/import/masuk', 'import_masuk')->name('consumImportMasuk');
//     });

//     //Barang Asset
//     Route::controller(AssetController::class)->group(function () {
//         Route::get('asset-table-show', 'index')->name('assetTable');
//         Route::get('asset-masuk-show', 'masuk_show')->name('assetMasukShow');
//         Route::get('asset-keluar-show', 'keluar_show')->name('assetKeluarShow');
//         Route::get('asset-digunakan-show', 'uses_show')->name('assetDigunakanShow');
//         Route::get('asset-create-show', 'create_show')->name('assetCreateShow');

//         Route::get('asset-edit-show/{id}', 'edit_show')->name('assetEditShow');
//         Route::get('asset-edit-keluar/{id}', 'edit_keluar')->name('assetEditKeluar');
//         Route::get('asset-edit-digunakan/{id}', 'edit_digunakan')->name('assetEditDigunakan');
//         Route::get('asset-edit-itemcode/{id}', 'edit_itemcode')->name('assetEditItemcode');

//         Route::get('asset-export-table', 'export_asset')->name('assetExportTable');
//         Route::get('asset-export-masuk', 'export_asset_masuk')->name('assetExportMasuk');
//         Route::get('asset-export-keluar', 'export_asset_keluar')->name('assetExportKeluar');
//         Route::get('asset-export-digunakan', 'export_asset_digunakan')->name('assetExportDigunakan');

//         Route::get('asset/yajra/show', 'asset_yajra_show');
//         Route::get('asset/yajra/masuk', 'asset_yajra_masuk');
//         Route::get('asset/yajra/keluar', 'asset_yajra_keluar');
//         Route::get('asset/yajra/uses', 'asset_yajra_uses');

//         Route::put('asset-update-masuk/{id}', 'update_masuk')->name('assetUpdateMasuk');
//         Route::put('asset-update-keluar/{id}', 'update_keluar')->name('assetUpdateKeluar');
//         Route::put('asset-update-digunakan/{id}', 'update_digunakan')->name('assetUpdateDigunakan');
//         Route::put('asset-update-itemcode/{id}', 'update_itemcode')->name('assetUpdateItemcode');

//         Route::post('asset/import/table', 'asset_import_table');
//         Route::post('asset/import/masuk', 'asset_import_masuk');
//         Route::post('asset/import/keluar', 'asset_import_keluar');
//         Route::post('asset/import/uses', 'asset_import_uses');

//         Route::post('asset-create-store', 'create_store')->name('assetCreateStore');
//     });


//     //Checklist Genset
//     Route::get('/checklist.warming', [GensetController::class, 'show_warming']);
//     Route::get('/checklist.table', [GensetController::class, 'index']);
//     Route::get('/c.show/{id}', [GensetController::class, 'show']);
//     Route::get('/c.pdf/{id}', [GensetController::class, 'pdf']);
//     Route::post('/checklist', [GensetController::class, 'store_warming']);


//     // Revisi
//     Route::controller(RevisiController::class)->group(function () {
//         //Revisi OB
//         Route::get('/ob', 'show_ob')->name('ob');
//         Route::get('/ob.edit/{id}', 'edit_ob');
//         Route::put('/ob.edit/{id}', 'update_ob');
//         Route::post('/ob.destroy/{id}', 'destroy_ob');
//         Route::post('/ob.new', 'store_ob');

//         // Revisi Visitor
//         Route::get('/revisi/visitor/show', 'show_visitor')->name('show_visitor');
//         Route::get('revisi/visitor/create', 'revisi_visitor_create');
//         Route::get('/revisi/visitor/yajra', 'yajra_visitor');
//         Route::get('/revisi/visitor/edit/{id}', 'edit_visitor');
//         Route::put('revisi/visitor/update/{id}', 'update_visitor')->name('revisiVisitorUpdate');
//         Route::post('/revisi/visitor/destroy/{id}', 'destroy_visitor');
//         Route::post('revisi/visitor/create', 'store_visitor');
//     });

//     // Cleaning
//     Route::controller(CleaningController::class)->group(function () {
//         Route::get('route_history_cleaning', 'data_history');

//         Route::get('cleaning-form', 'show_form')->name('cleaningForm');

//         Route::get('/cleaning/yajra/full/reject', 'data_reject_cleaning');
//         Route::get('log_cleaning', 'log_carbon');
//         Route::get('/cleaning_pdf/{id}', 'cetak_cleaning_pdf');
//         Route::get('/cleaning/{id}', 'pilihan_work');
//         Route::get('/detail/{id}', 'detail_ob');
//         Route::get('/cleaning/action/checkin/{id}', 'checkin_form_cleaning');
//         Route::get('/cleaning/action/checkout/{id}', 'checkout_form_cleaning');
//         Route::get('/cleaning/action/show/{id}', 'cetak_full_cleaning');
//         Route::get('cleaning/action/export', 'cetak_all_full_cleaning');
//         Route::get('/cleaning/reject/show', 'show_reject_cleaning');

//         Route::get('cleaning/yajra/log', 'cleaning_yajra_log');
//         Route::get('yajra_full_approve_cleaning_other', 'yajra_log');
//         Route::get('yajra_full_approve_cleaning', 'yajra_full_approval');

//         Route::get('cleaning-export-full-approval', 'export_full_approval')->name('cleaningExportFullApproval');

//         Route::put('/cleaning/checkin/{id}', 'checkin_update_cleaning');
//         Route::put('/cleaning/checkout/{id}', 'checkout_update_cleaning');
//         Route::put('/cleaning/reject/{id}', 'reject_full_cleaning');
//         Route::post('/route_submit_cleaning', 'submit_data_cleaning');
//         Route::post('/cleaning_reject', 'reject_form_cleaning');
//         Route::post('/cleaning/full/reject/{id}', 'reject_full_cleaning');
//         Route::post('/approve_cleaning', 'approve_cleaning');

//         Route::get('penomoran', 'penomoran');

//         Route::post('cleaning-checkin-cancel/{id}', 'checkin_cancel')->name('cleaningCheckinCancel');
//     });

//     // Other
//     Route::controller(OtherController::class)->group(function () {
//         // Troubleshoot
//         Route::get('troubleshoot-show', 'troubleshoot_form')->name('troubleshootForm');
//         Route::get('troubleshoot/show/ar', 'troubleshoot_form_ar')->name('troubleshootAR');
//         Route::get('troubleshoot-finished-show', 'troubleshoot_finished_show')->name('troubleshootFinishedShow');

//         Route::get('troubleshoot-pdf/{id}', 'troubleshoot_pdf')->name('troubleshootPDF');
//         Route::get('other/troubleshoot/yajra/history', 'yajra_troubleshoot_history');

//         Route::get('troubleshoot-yajra-full-approval', 'troubleshoot_yajra_full_approval')->name('troubleshootYajraFullApproval');
//         Route::get('troubleshoot-yajra-full-visitor', 'troubleshoot_yajra_full_visitor')->name('troubleshootYajraFullVisitor');
//         Route::get('other/troubleshoot/yajra/full/reject', 'other_troubleshoot_yajra_full_reject');

//         Route::get('troubleshoot-checkin-show/{id}', 'troubleshoot_checkin_show')->name('troubleshootCheckinShow');
//         Route::get('troubleshoot-checkout-show/{id}', 'troubleshoot_checkout_show')->name('troubleshootCheckoutShow');
//         Route::put('troubleshoot-checkin-update/{id}', 'troubleshoot_checkin_update')->name('troubleshootCheckinUpdate');
//         Route::put('troubleshoot-checkout-update/{id}', 'troubleshoot_checkout_update')->name('troubleshootCheckoutUpdate');
//         Route::post('troubleshoot-checkin-cancel/{id}', 'troubleshoot_checkin_cancel')->name('troubleshootCheckinCancel');

//         Route::get('troubleshoot-export-full-approval', 'troubleshoot_export_full_approval')->name('troubleshootExportFullApproval');

//         Route::post('troubleshoot-store', 'troubleshoot_store')->name('troubleshootStore');
//         Route::post('troubleshoot/ar/store', 'ar_store')->name('troubleshootStoreAR');
//         Route::post('troubleshoot-approve', 'troubleshoot_approve')->name('troubleshootApprove');
//         Route::post('troubleshoot-reject', 'troubleshoot_reject')->name('troubleshootReject');


//         // --------------------------------------------------------- MAINTENANCE -------------------------------------------------------
//         Route::get('maintenance-show', 'show_maintenance_form')->name('maintenanceForm');
//         Route::get('maintenance-pdf/{id}', 'maintenance_pdf')->name('maintenancePDF');

//         Route::get('other/maintenance/full', 'show_maintenance_full');
//         Route::get('other/maintenance/full/reject', 'show_maintenance_reject');
//         Route::get('other/maintenance/rutin/{id}', 'get_rutin');
//         Route::get('other/maintenance/visitor/{id}', 'get_visitor');

//         Route::get('maintenance-yajra-history', 'maintenance_yajra_history')->name('maintenanceYajraHistory');
//         Route::get('maintenance-yajra-full-approval', 'maintenance_yajra_full_approval')->name('maintenanceYajraFullApproval');
//         Route::get('maintenance-yajra-full-visitor', 'maintenance_yajra_full_visitor')->name('maintenanceYajraFullVisitor');

//         Route::get('maintenance-export-full-approval', 'maintenance_export_full_approval')->name('maintenanceExportFullApproval');

//         Route::get('maintenance-checkin-show/{id}', 'maintenance_checkin_show')->name('maintenanceCheckinShow');
//         Route::get('maintenance-checkout-show/{id}', 'maintenance_checkout_show')->name('maintenanceCheckoutShow');
//         Route::put('maintenance-checkin-update/{id}', 'maintenance_checkin_update')->name('maintenanceCheckinUpdate');
//         Route::put('maintenance-checkout-update/{id}', 'maintenance_checkout_update')->name('maintenanceCheckoutUpdate');
//         Route::put('maintenance-checkin-cancel/{id}', 'maintenance_checkin_cancel')->name('maintenanceCheckinCancel');

//         Route::post('maintenance-store', 'maintenance_store')->name('maintenanceStore');
//         Route::post('maintenance-approve', 'maintenance_approve')->name('maintenanceApprove');
//         Route::post('maintenance-reject', 'maintenance_reject')->name('maintenanceReject');
//     });

//     // Internal
//     Route::controller(InternalController::class)->group(function () {
//         Route::get('internal-dashboard/{dept}', 'dashboard')->name('dashboardInternal');
//         Route::get('internal-finished/show/{dept}', 'finished_show')->name('finishedInternal');
//         Route::get('internal-last-form/{dept}', 'internal_last_form')->name('lastInternal');
//         Route::get('last-selected/{id}', 'last_selected')->name('lastSelected');
//         Route::get('internal/form', 'internal_form');
//         Route::get('internal/get/risk/{id}', 'get_risk');

//         Route::get('internal-action-checkin-form/{id}', 'internal_action_checkin_form')->name('checkinInternal');
//         Route::get('internal-action-checkout-form/{id}', 'internal_action_checkout_form')->name('checkoutInternal');
//         Route::put('internal/action/cancel/{id}', 'internal_action_cancel')->name('cancelCheckinInternal');
//         Route::put('internal-checkin-update/{id}', 'internal_checkin_update')->name('internalCheckinUpdate');
//         Route::put('internal-checkout-update/{id}', 'internal_checkout_update')->name('internalCheckoutUpdate');

//         Route::get('/internal/pdf/{id}', 'internal_pdf');
//         Route::get('internal/getVisitor/{id}', 'getVisitor');

//         Route::get('internal/yajra/show/{dept}', 'internal_yajra_show');
//         Route::get('internal/yajra/history', 'internal_yajra_history')->name('internalYajraHistory');
//         Route::get('internal/yajra/full/approval', 'internal_yajra_full_approval')->name('internalYajraFullApproval');
//         Route::get('internal/yajra/finished/{dept}', 'internal_yajra_finished');
//         Route::get('internal/yajra/last/form/{dept}', 'internal_yajra_last_form');

//         Route::post('internal/create', 'internal_create')->name('internalStore');
//         Route::post('internal/approve/{id}', 'internal_approve');
//         Route::post('internal/reject/{id}', 'internal_reject');

//         Route::get('internal_penomoran', 'penomoran');
//     });

//     //  Sales
//     Route::controller(SalesController::class)->group(function(){
//         Route::get('sales/form', 'form')->name('salesForm');
//         Route::get('internal/guest/form', 'guest_form')->name('internalGuestForm');
//         Route::get('sales/pdf/{id}', 'pdf');

//         Route::get('sales/yajra/history', 'yajra_history')->name('salesYajraHistory');
//         Route::get('sales/yajra/full/approval', 'yajra_full_approval')->name('salesYajraFullApproval');
//         Route::get('sales/yajra/full/visitor', 'yajra_full_visitor')->name('salesYajraFullVisitor');

//         Route::get('sales/export/full/approval', 'export_full_approval')->name('surveyExportFullApprove');
//         Route::get('sales/checkout/show/{id}', 'checkout_show')->name('salesCheckoutShow');
//         Route::post('sales/checkout/update/{id}', 'checkout_update')->name('salesCheckoutUpdate');

//         Route::post('sales/store', 'store')->name('salesStore');
//         Route::post('sales/approve/{id}', 'approve')->name('salesApprove');
//         Route::post('sales/reject/{id}', 'reject')->name('salesReject');
//     });

//     //Eksternal
//     Route::controller(EksternalController::class)->group(function(){
//         Route::get('dashboard/eksternal', 'dashboard')->name('dashboardEksternal');
//         Route::get('eksternal/show/form', 'show_form')->name('eksternalShowForm');
//         Route::get('eksternal/finished/show', 'finished_show')->name('eksternalFinishedShow');

//         Route::get('eksternal/yajra/history', 'yajra_history')->name('eksternalYajraHistory');
//         Route::get('eksternal/yajra/full/approval', 'yajra_full_approval')->name('eksternalYajraFullApproval');
//         Route::get('eksternal/yajra/full/visitor/{company}', 'yajra_full_visitor')->name('eksternalYajraFullVisitor');
//         Route::get('eksternal/yajra/finished/{company}', 'yajra_full_finished');

//         Route::get('eksternal/pdf/{id}', 'pdf');
//         Route::get('eksternal/eksport/full/approve', 'export_full_approve')->name('eksternalExportFullApprove');

//         Route::get('eksternal/checkin/form/{id}', 'checkin_form')->name('checkinEksternal');
//         Route::get('eksternal/checkout/form/{id}', 'checkout_form')->name('checkoutEksternal');
//         Route::put('eksternal/cancel/{id}', 'cancel_update')->name('cancelCheckinEksternal');
//         Route::put('eksternal/checkin/update/{id}', 'checkin_update')->name('eksternalCheckinUpdate');
//         Route::put('eksternal/checkout/update/{id}', 'checkout_update')->name('eksternalCheckoutUpdate');

//         Route::post('eksternal/store', 'store')->name('eksternalStore');
//         Route::post('eksternal/reject/{id}', 'reject')->name('eksternalReject');
//         Route::post('eksternal/approve/{id}', 'approve')->name('eksternalApprove');

//         Route::get('eksternal_penomoran', 'penomoran_eksternal');
//     });

//     // Order Form
//     Route::controller(OrderController::class)->group(function () {
//         Route::get('order/form', 'order_form');
//         Route::post('order/approve/{id}', 'order_approval');
//         Route::post('order/store', 'order_store');
//     });

//     //LogBook
//     Route::controller(LogBookController::class)->group(function(){
//         Route::post('internal/export', 'internal_export')->name('internalExport');
//         Route::post('logbook/internal/pdf', 'internal_pdf')->name('internalLogBookPDF');
//         Route::post('logbook/internal/excel', 'internal_excel')->name('internalLogbookExcel');
//         Route::post('logbook/eksternal/pdf', 'eksternal_pdf')->name('eksternalLogBookPDF');
//         Route::post('logbook/eksternal/excel', 'eksternal_excel')->name('eksternalLogBookExcel');
//     });

//     // ALL
//     Route::get('history/{type_view}', [HomeController::class, 'history']);
//     Route::get('approval/{type_approve}', [HomeController::class, 'approval']);
//     Route::get('full/{type_full}', [HomeController::class, 'full']);
//     Route::get('penomoran/{type_nomor}', [HomeController::class, 'penomoran']);
//     Route::get('visitor/log/{type_log}', [HomeController::class, 'visitor_log']);

//     //Log
//     Route::get('logall', [HomeController::class, 'log_all'])->name('logall');