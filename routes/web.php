<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

define('ceo_email', 'mh124404@gmail.com');
define('PROVIDER_ID', provider());
Route::get('providers_to_secondparty', 'SecondPartyController@providers_to_secondparty');

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'HomeController@index');
    Route::get('user_profile', 'UserController@profile');
    Route::post('user_profile/updatepassword', 'UserController@UpdatePassword');
    Route::post('user_profile/updateprofilepic', 'UserController@UpdateProfilePicture');
    Route::post('user_profile/updateuserdata', 'UserController@UpdateNameAndEmail');
    Route::get('read_notify/{id}', function ($id) {
        \App\Notification::find($id)->update([
            'seen' => 1,
        ]);
    });

    Route::get('copy/signed/date', function () {
        $contracts = \App\Contract::all();
        foreach ($contracts as $contract) {
            $contract->contract_signed_date = $contract->contract_date;
            $contract->save();
        }
        return redirect('fullcontracts');
    });

    //role account
    Route::get('search', 'SearchController@index');

    Route::post('delete_multiselect', function (Request $request) {
        if (strlen($request['selected_list']) == 0) {
            \Session::flash('failed', \Lang::get('messages.custom-messages.no_selected_item'));
            return back();
        }
        delete_multiselect($request);
        return back();
    });

    //country Routes
    Route::post('country', '\App\Http\Controllers\CountryController@store');
    Route::post('country/update', '\App\Http\Controllers\CountryController@update');
    Route::get('country/{id}/delete', '\App\Http\Controllers\CountryController@destroy');

    // listing countries for all roles
    Route::resource('country', '\App\Http\Controllers\CountryController');
    Route::get('country/{id}/operator', '\App\Http\Controllers\CountryController@list_all_operator');

    //operator  admin Routes
    Route::post('operator', '\App\Http\Controllers\OperatorController@store');
    Route::post('operator/update', '\App\Http\Controllers\OperatorController@update');
    Route::get('operator/{id}/delete', '\App\Http\Controllers\OperatorController@destroy');
    Route::resource('operator', '\App\Http\Controllers\OperatorController');
    //Route::get('operator/create_country','OperatorController@show');

    //provider admin Routes
    Route::post('provider', '\App\Http\Controllers\ProviderController@store');
    Route::post('provider/update', '\App\Http\Controllers\ProviderController@update');
    Route::get('provider/{id}/delete', '\App\Http\Controllers\ProviderController@destroy');
    Route::resource('provider', '\App\Http\Controllers\ProviderController');

    // aggregators view routes
    Route::resource('aggregator', '\App\Http\Controllers\AggregatorController');

    // aggregators admin routes
    Route::post('aggregator', '\App\Http\Controllers\AggregatorController@store');
    Route::post('aggregator/update', '\App\Http\Controllers\AggregatorController@update');
    Route::get('aggregator/{id}/delete', '\App\Http\Controllers\AggregatorController@destroy');

    //occasion admin routes
    Route::get('occasion', '\App\Http\Controllers\OccasionController@index');
    Route::post('occasion', '\App\Http\Controllers\OccasionController@store');
    Route::post('occasion/update', '\App\Http\Controllers\OccasionController@update');
    Route::get('occasion/{id}/delete', '\App\Http\Controllers\OccasionController@destroy');

    //occasion view routes
    // Route::group(['middleware' => ['auth', 'role:super_admin|admin']], function () {
    //     Route::resource('occasion', '\App\Http\Controllers\OccasionController');
    // });

    //currency
    Route::get('currency', 'CurrencyController@index');
    Route::post('currency', 'CurrencyController@store');
    Route::post('currency/update', 'CurrencyController@update');
    Route::get('currency/{id}/delete', 'CurrencyController@destroy');



    // Start Routes for fullcontracts
    Route::resource('fullcontracts', 'FullcontractsController');
    Route::post('fullcontracts/{id}/update', 'FullcontractsController@update');
    Route::get('fullcontracts/{id}/delete', 'FullcontractsController@destroy');
    Route::get('/client_type', 'FullcontractsController@getClient');
    Route::get('contracts/allData', 'FullcontractsController@allData');
    Route::get('contract/an/{id}', 'FullcontractsController@annex');
    Route::get('contract/al/{id}', 'FullcontractsController@authorization');
    Route::get('contract/cr/{id}', 'FullcontractsController@copyright');
    // Route::get('fullcontracts/{id}/renews', 'FullcontractsController@contract_list_renews');

    // End Routes for fullcontracts

    // Start Routes for service
    Route::resource('contractservice', 'ServicecontractsController');
    Route::get('contractservice/{id}/delete', 'ServicecontractsController@destroy');
    Route::get('contractservice/create/{id}', 'ServicecontractsController@create');
    // End Routes for service

    //Revenue
    Route::resource('revenue', 'RevenueController');
    Route::get('revenue/{id}/delete', 'RevenueController@destroy');
    Route::post('revenue/{id}/update', 'RevenueController@update');
    Route::post('comboselect/source_id', 'RevenueController@comboSelectSourceId');
    Route::post('comboselect/contract_services', 'RevenueController@comboSelectContractServices');
    Route::post('comboselect/remove_contract_services', 'RevenueController@comboSelectRemoveContractServices');

    Route::resource('firstparties', 'FirstpartieController', ['as' => 'admin']);
    Route::get('firstparties/{id}/delete', 'FirstpartieController@destroy');

    Route::resource('percentages', 'PercentageController', ['as' => 'admin']);
    Route::get('percentages/{id}/delete', 'PercentageController@destroy');
    Route::resource('ServiceTypes', 'ServiceTypesController');
    Route::resource('SecondPartyType', 'SecondPartyTypeController');
    Route::resource('SecondParty', 'SecondPartyController');
    Route::resource('attachment', 'AttachmentController');
    Route::resource('ContractTemplate', 'ContractTemplateController');
    Route::get('ContractTemplate/{id}/items', 'ContractTemplateController@showContractTerms');
    Route::get('ContractTemplate/{id}/items/download', 'ContractTemplateController@downloadContractTerms');
    Route::post('ContractTemplate/{id}/storeItem', 'ContractTemplateController@storeContractTerms');
    Route::post('ContractTemplate/{id}/removeItem', 'ContractTemplateController@destroyContractTerms');
    Route::post('ContractTemplate/{id}/editItem', 'ContractTemplateController@editContractTerms');
    Route::get('contract/template/create', 'ContractTemplateController@editContractTerms');
    Route::get('Contract/{id}/items/download', 'FullcontractsController@downloadContractItems');
    Route::get('template_items/{id}', 'FullcontractsController@template_items');

    Route::get('contract_items_send/{id}/edit', 'ContractItemsApprovidsController@edit');
    Route::post('fullcontracts/{id}/updateapprove', 'ContractItemsApprovidsController@update');
    Route::get('contract_items_send/{id}/approves', 'ContractItemsApprovidsController@index');
    Route::get('ceo/{id}/approve', 'FullcontractsController@getCeoApprovePage');
    Route::post('ceo/{id}/approve', 'FullcontractsController@saveCeoApprove');
    Route::get('contracts/{id}/renew', 'FullcontractsController@getContractRenewPage');
    Route::post('contracts/{id}/renew', 'FullcontractsController@saveContractRenew');
});

Route::group(['middleware' => ['auth', 'role:super_admin|ceo']], function () {

    //users
    Route::get('users', 'UserController@index');
    Route::get('users/{id}/delete', 'UserController@destroy');
    Route::get('users/{id}/edit', 'UserController@edit');
    Route::post('users/{id}/update', 'UserController@update');
    Route::get('users/new', 'UserController@create');
    Route::post('users', 'UserController@store');
    Route::get('elFinder/elfinder', 'HomeController@elFinderlEfinder');

    //roles
    Route::get('roles', 'RoleController@index');
    Route::get('roles/new', 'RoleController@create');
    Route::post('roles', 'RoleController@store');
    Route::get('roles/{id}/delete', 'RoleController@destroy');
    Route::get('roles/{id}/edit', 'RoleController@edit');
    Route::post('roles/{id}/update', 'RoleController@update');

    //settings
    Route::resource('setting', '\App\Http\Controllers\SettingController');
    Route::get('setting/{id}/delete', '\App\Http\Controllers\SettingController@destroy');

});

Route::group(['middleware' => ['auth', 'role:super_admin|operation|ceo']], function () {
    //rbt
    Route::get('rbt', '\App\Http\Controllers\RbtController@index');
    Route::get('rbt/search', 'RbtController@search');
    Route::post('rbt/search', 'RbtController@search_result');
    Route::get('report', '\App\Http\Controllers\ReportController@index');
    Route::get('report/search', 'ReportController@search');
    Route::post('report/search', 'ReportController@search_result');

    // RBT admin roles
    Route::post('rbt/get_statistics', 'RbtController@get_statistics');
    Route::get('rbt/statistics', 'RbtController@statitics');
    Route::get('rbt/file_system', 'RbtController@list_file_system');
    Route::get('rbt/excel', 'RbtController@excel');
    Route::post('rbt/excel', 'RbtController@excelStore');
    Route::get('rbt/downloadSample', 'RbtController@getDownload');
    Route::get('report/excel', 'ReportController@excel');
    Route::get('report/downloadSample', 'ReportController@getDownload');
    Route::post('report/excel', 'ReportController@excelStore');
    Route::get('rbt/search', 'RbtController@search');
    Route::post('rbt/search', 'RbtController@search_result');
    Route::get('report/search', 'ReportController@search');
    Route::post('report/search', 'ReportController@search_result');
    Route::post('report/export_report', 'ReportController@export_report');
    Route::get('rbt/allData', 'RbtController@allData');
    // new excel
    Route::get('rbt/{id}/editNew', 'RbtController@editNew');
    Route::post('rbt/excelNew', 'RbtController@excelNewStore');
    Route::get('rbt/downloadSampleNew', 'RbtController@getDownloadNew');
    Route::get('rbt/upload_tracks', 'RbtController@multi_upload');
    Route::post('rbt/save_tracks', 'RbtController@save_tracks');
    Route::get('rbt/delete_track/{id}', 'RbtController@delete_track');
    // Route::resource('rbt','\App\Http\Controllers\RbtController');
    Route::post('rbt/{id}/update', '\App\Http\Controllers\RbtController@update');
    Route::get('rbt/{id}/delete', '\App\Http\Controllers\RbtController@destroy');
    Route::get('rbt/{id}/deleteMsg', '\App\Http\Controllers\RbtController@DeleteMsg');
    Route::resource('rbt', '\App\Http\Controllers\RbtController');

    // rbt admin roles
    Route::get('report/statistics', 'ReportController@statitics');
    Route::post('report/{id}/update', '\App\Http\Controllers\ReportController@update');
    Route::get('report/{id}/delete', '\App\Http\Controllers\ReportController@destroy');
    Route::get('report/{id}/deleteMsg', '\App\Http\Controllers\ReportController@DeleteMsg');
    Route::post('report/get_statistics', 'ReportController@get_statistics');

    // Route::resource('content','ContentController');
    Route::get('contents/excel', 'ContentController@create_excel');
    Route::post('contents/excel', 'ContentController@excel_store');
    Route::get('content/{id}/delete', 'ContentController@destroy');
    Route::get('contents/downloadSample', 'ContentController@getDownload');
    Route::get('contents/file_system', 'ContentController@list_file_system');
    Route::get('contents/upload_tracks', 'ContentController@multi_upload');
    Route::post('contents/save_tracks', 'ContentController@save_tracks');
    Route::get('content/allData', 'ContentController@allData');
    Route::get('content', 'ContentController@index');
    Route::get('content/{id}/delete', 'ContentController@destroy');
    Route::get('content/{id}/edit', 'ContentController@edit');
    Route::PATCH('content/{id}/update', 'ContentController@update');
    Route::get('content/create', 'ContentController@create');
    Route::post('content', 'ContentController@store');
    Route::get('content/{id}/rbts', 'ContentController@show_rbt');
    Route::get('content/{id}', 'ContentController@show');

    //road map
    Route::resource('roadmaps', 'RoadMapController', ['as' => 'admin']);
    Route::get('roadmaps/{id}/delete', 'RoadMapController@destroy');
    Route::get('roadmap/allData', 'RoadMapController@allData');
    Route::get('roadmaps/calendar/index', 'RoadMapController@calendarIndex')->name('admin.roadmaps.calendar.index');

    //report view route
    Route::resource('report', '\App\Http\Controllers\ReportController');
});

Route::group(['middleware' => ['auth', 'role:super_admin|legal|ceo']], function () {
    // Start Routes for employees
    Route::resource('employees', 'EmployeesController');
    Route::get('employees/{id}/show', 'EmployeesController@show');
    Route::post('employees/{id}/update', 'EmployeesController@update');
    Route::get('employees/{id}/delete', 'EmployeesController@destroy');
    Route::get('employees/{id}/contracts', 'EmployeeContractsController@create');
    Route::post('employees/{id}/contracts', 'EmployeeContractsController@store');
    Route::get('employee_contract/{id}/delete', 'EmployeeContractsController@destroy');
    Route::get('employee_contract/{id}/edit', 'EmployeeContractsController@edit');
    Route::post('employee_contract/{id}/update', 'EmployeeContractsController@update');

    // department
    Route::resource('department', 'DepartmentController');
    Route::get('department/{id}/delete', 'DepartmentController@destroy');
    Route::get('sendemail', 'DepartmentController@contract_items_send_email');
});
Route::get('get_table_ids','HomeController@get_table_ids_list') ;

Route::get('fix_date_for_content','ContentController@fix_date_for_content') ;


