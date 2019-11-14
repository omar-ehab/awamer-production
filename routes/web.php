<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
//login and forget password routes (without registration routes)
Auth::routes(['register' => false]);
route::get('register', 'EstablishmentsController@registerNewEstablishment')->middleware('guest')->name('register');
route::post('register', 'EstablishmentsController@storeNewEstablishment')->middleware('guest')->name('establishmentRegister');
Route::get('donors/online/{encrypted_establishment_id}/create', 'DonorsController@onlineCreate')->name('donors.establishment.create');
Route::post('donors/online/{encrypted_establishment_id}/store', 'DonorsController@onlineStore')->name('donors.establishment.store');

Route::get('/privacy-policy', 'EstablishmentsController@privacyPolicy');

Route::middleware('auth')->group(function (){

    Route::get('/', 'HomeController@index')->name('home');

    Route::get('/get-admin-chart', 'HomeController@adminChartData')->name('getAdminChart');
    Route::get('/get-establishment-chart', 'HomeController@establishmentChartData')->name('getEstablishmentChart');


    Route::resource('administrative-areas', 'AdministrativeAreasController');
    //banks
    Route::resource('banks', "BanksController");
    //bank accounts
    Route::resource('bank-accounts', "BankAccountsController");
    //contract terms
    Route::resource('contract-terms', "ContractTermsController");
    //intervals
    Route::resource('intervals', 'IntervalsController');
    //branches
    Route::resource('branches', 'BranchesController');
    //establishment types
    Route::resource('establishment-types', 'EstablishmentTypesController');

    //sms provider
    Route::resource('sms-providers', 'SmsProvidersController')->except(['show']);
    Route::post('sms-providers/{sms_provider}/active', 'SmsProvidersController@activeSmsProvider')->name('sms-providers.active');

    //establishments
    Route::resource('establishments', 'EstablishmentsController');
    Route::get('/unapproved-establishments', 'EstablishmentsController@unapprovedIndex')->name('unapproved-establishments');
    Route::post('/approve-establishment', 'EstablishmentsController@approve')->name('approve-establishment');
    Route::get('edit-single-establishment/{establishment}', 'EstablishmentsController@editSingleEstablishment')->name('editSingleEstablishment');
    Route::put('update-single-establishment/{establishment}', 'EstablishmentsController@updateSingleEstablishment')->name('updateSingleEstablishment');
    Route::post('active-sms/{establishment}', 'EstablishmentsController@activeSms')->name('activeSms');
    Route::post('deactivate-sms/{establishment}', 'EstablishmentsController@deactivateSms')->name('deactivateSms');

    //donors
    Route::resource('donors', 'DonorsController');
    Route::get('unapproved-donors', 'DonorsController@indexUnapproved')->name('unapproved-donors');
    Route::get('donors/{donor}/stop', 'DonorsController@editStop')->name('donors.editStop');
    Route::post('donors/{donor}/stop', 'DonorsController@stopWithdraw')->name('donors.stop');
    Route::post('donors/{donor}/active', 'DonorsController@activeWithdraw')->name('donors.active');
    Route::post('donors/approve', 'DonorsController@approve')->name('donors.approve');
    Route::get('donors/import-view/import', 'DonorsController@importExcelView' )->name('donors.import-view');
    Route::post('donors/import/import', 'DonorsController@importExcel')->name('donors.import');

    //operations
    Route::get('operations/create', 'OperationsController@create')->name('operations.create');
    Route::get('operations/create/auto', 'OperationsController@createAuto')->name('operations.createAuto');
    Route::POST('operations/create/auto/view', 'OperationsController@storeAuto')->name('operations.storeAuto');

    //Route::get('operations/create/auto/confirm', 'OperationsController@confirmAuto')->name('operations.confirmAuto');
    Route::POST('operations/create/auto/confirm', 'OperationsController@storeAutoConfirm')->name('operations.confirmAutoPost');




    Route::get('operations/create/auto/print','OperationsController@storeAutoConfirmPrint');




    Route::post('operations/create', 'OperationsController@store')->name('operations.store');
    Route::post('operations/getDonorsByIntervalAndBank', 'OperationsController@getDonorsByIntervalAndBank');

    //sandas
    Route::get('sanads/create-donor-sanads', 'SanadsController@createDonorSanads')->name('sanads.createDonorSanads');
    Route::get('sanads/create-donor-sanads-print/{createDonorSanad}', 'SanadsController@createDonorSanadPrint')->name('sanads.createDonorSanadPrint');
    Route::get('sanads/destroy-donor-sanads', 'SanadsController@destroyDonorSanads')->name('sanads.destroyDonorSanads');
    Route::get('sanads/destroy-donor-sanads-print/{destroyDonorSanad}', 'SanadsController@destroyDonorSanadPrint')->name('sanads.destroyDonorSanadPrint');
    Route::get('sanads/interval-receivable-sanad', 'SanadsController@IntervalReceivableSanad')->name('sanads.IntervalReceivableSanad');
    Route::get('sanads/interval-receivable-sanad-print/{intervalReceivableSanad}', 'SanadsController@IntervalReceivableSanadPrint')->name('sanads.IntervalReceivableSanadPrint');
    Route::get('sanads/create/interval-receivable-sanad', 'SanadsController@IntervalReceivableSanadCreate')->name('sanads.IntervalReceivableSanadCreate');
    Route::post('sanads/create/interval-receivable-sanad', 'SanadsController@IntervalReceivableSanadStore')->name('sanads.IntervalReceivableSanadStore');
    Route::get('sanads/donor-receivable-sanad', 'SanadsController@DonorReceivableSanad')->name('sanads.DonorReceivableSanad');
    Route::get('sanads/donor-receivable-sanad-print/{donorReceivableSanad}', 'SanadsController@DonorReceivableSanadPrint')->name('sanads.DonorReceivableSanadPrint');
    Route::get('sanads/create/donor-receivable-sanad', 'SanadsController@DonorReceivableSanadCreate')->name('sanads.DonorReceivableSanadCreate');
    Route::post('sanads/create/donor-receivable-sanad', 'SanadsController@DonorReceivableSanadStore')->name('sanads.DonorReceivableSanadStore');


    Route::get('admins', 'UsersController@indexAdmin')->name('admins');
    Route::get('users', 'UsersController@indexUser')->name('users');
    Route::get('admins/create', 'UsersController@createAdmin')->name('admins.create');
    Route::post('admins/create', 'UsersController@storeAdmin')->name('admins.store');
    Route::get('admins/{admin}/edit', 'UsersController@editAdmin')->name('admins.edit');
    Route::put('admins/{admin}', 'UsersController@updateAdmin')->name('admins.update');
    Route::delete('admins/{admin}', 'UsersController@destroyAdmin')->name('admins.destroy');
    Route::get('users/create', 'UsersController@createUser')->name('users.create');
    Route::post('users/create', 'UsersController@storeUser')->name('users.store');
    Route::get('users/{user}/edit', 'UsersController@editUser')->name('users.edit');
    Route::put('users/{user}', 'UsersController@updateUser')->name('users.update');
    Route::delete('users/{user}', 'UsersController@destroyUser')->name('users.destroy');

    //sms
    Route::get('sms/send','SmsProvidersController@SendMessageMobily');

    //reports get_fixed_interval_view
    Route::get('/reports/fixed-interval-init','ReportsController@get_fixed_interval_view');
    Route::POST('/reports/fixed-interval','ReportsController@get_fixed_interval');
    Route::get('/reports/fixed-interval/{id}','ReportsController@get_fixed_interval_x');
    Route::get('/reports/disabled-donors','ReportsController@get_disabled_donors');
    Route::get('/reports/succeed-operations','ReportsController@get_succeed_operations');
    Route::get('/reports/failed-operations','ReportsController@get_failed_operations');

    Route::get('/mark-notifications-as-read', 'UsersController@markNotificationAsRead')->name('markAsRead');


    Route::get('/reports/excel_sheet/{path_name}','ReportsController@excel_sheet_download');


    //contracts
    Route::get('contracts', "ContractsController@index")->name('contracts');
    Route::get('contracts/{contract}/print', "ContractsController@printContract")->name('contracts.print');


    //contract details
    Route::put('contracts/start/{contractStart}', "ContractStartEndsController@updateStart")->name('contracts.start.update');
    Route::put('contracts/end/{contractEnd}', "ContractStartEndsController@updateEnd")->name('contracts.end.update');

    Route::get('system-fees', 'SystemFeesController@index')->name('systemFees');
    Route::post('system-fees', 'SystemFeesController@payFees')->name('systemFees.pay');
    Route::post('change-password', 'UsersController@changePassword');

    //privacy policies
    Route::get('privacy-policy/index', 'PrivacyPolicyController@index')->name('privacyPolicy');
    Route::post('privacy-policy/index/{privacyPolicy}', 'PrivacyPolicyController@update')->name('updatePrivacyPolicy');

});


Route::get('/export_pdf_users','ExportPDF@export_pdf_users');



