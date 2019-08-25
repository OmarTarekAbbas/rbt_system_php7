<?php

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
Auth::routes();
Route::group(['middleware' => 'auth'], function() {
    Route::get('/', 'HomeController@index');
    Route::get('user_profile','UserController@profile');
    Route::post('user_profile/updatepassword','UserController@UpdatePassword');
    Route::post('user_profile/updateprofilepic','UserController@UpdateProfilePicture');
    Route::post('user_profile/updateuserdata','UserController@UpdateNameAndEmail');
});

Route::group(['middleware' => ['auth','role:super_admin']], function() {
    Route::get('users', 'UserController@index');
    Route::get('users/{id}/delete', 'UserController@destroy');
    Route::get('users/{id}/edit', 'UserController@edit');
    Route::post('users/{id}/update', 'UserController@update');
    Route::get('users/new', 'UserController@create');
    Route::post('users', 'UserController@store');
});

Route::group(['middleware' => ['auth','role:super_admin']], function() {
    Route::get('roles', 'RoleController@index');
    Route::get('roles/new', 'RoleController@create');
    Route::post('roles', 'RoleController@store');
    Route::get('roles/{id}/delete', 'RoleController@destroy');
    Route::get('roles/{id}/edit', 'RoleController@edit');
    Route::post('roles/{id}/update', 'RoleController@update');
});

// aggregators view routes
Route::group(['middleware'=> ['auth','role:super_admin|admin']],function(){
  Route::resource('aggregator','\App\Http\Controllers\AggregatorController');
});


// aggregators admin routes
Route::group(['middleware'=> ['auth','role:super_admin|admin']],function(){
    Route::post('aggregator','\App\Http\Controllers\AggregatorController@store');
    Route::post('aggregator/update','\App\Http\Controllers\AggregatorController@update');
    Route::get('aggregator/{id}/delete','\App\Http\Controllers\AggregatorController@destroy');
});




//country Routes

// creating + editing + delete for superadmin + admin roles
Route::group(['middleware'=> ['auth','role:super_admin|admin']],function(){
    Route::post('country','\App\Http\Controllers\CountryController@store');
    Route::post('country/update','\App\Http\Controllers\CountryController@update');
    Route::get('country/{id}/delete','\App\Http\Controllers\CountryController@destroy');
});


// listing countries for all roles
// note that Route::resource must be below other routes
Route::group(['middleware'=> ['auth','role:super_admin|admin']],function(){
    Route::resource('country','\App\Http\Controllers\CountryController');
});

//operator  admin Routes
Route::group(['middleware'=> ['auth','role:super_admin|admin']],function(){
    Route::post('operator','\App\Http\Controllers\OperatorController@store');
    Route::post('operator/update','\App\Http\Controllers\OperatorController@update');
    Route::get('operator/{id}/delete','\App\Http\Controllers\OperatorController@destroy');
    Route::resource('operator','\App\Http\Controllers\OperatorController');
});


//provider admin Routes
Route::group(['middleware'=> ['auth','role:super_admin|admin']],function(){
  Route::post('provider','\App\Http\Controllers\ProviderController@store');
  Route::post('provider/update','\App\Http\Controllers\ProviderController@update');
  Route::get('provider/{id}/delete','\App\Http\Controllers\ProviderController@destroy');
});


//provider view  Routes
Route::group(['middleware'=> ['auth','role:super_admin|admin']],function(){
    Route::resource('provider','\App\Http\Controllers\ProviderController');
});



//occasion admin routes
Route::group(['middleware'=> ['auth','role:super_admin|admin']],function(){
  Route::post('occasion','\App\Http\Controllers\OccasionController@store');
  Route::post('occasion/update','\App\Http\Controllers\OccasionController@update');
  Route::get('occasion/{id}/delete','\App\Http\Controllers\OccasionController@destroy');
});


//occasion view routes
Route::group(['middleware'=> ['auth','role:super_admin|admin']],function(){
    Route::resource('occasion','\App\Http\Controllers\OccasionController');
});


// RBT admin roles
Route::group(['middleware'=> ['auth','role:super_admin|admin']],function(){
    Route::post('rbt/get_statistics','RbtController@get_statistics');
    Route::get('rbt/statistics','RbtController@statitics') ;
    Route::get('rbt/file_system','RbtController@list_file_system') ;
    Route::get('rbt/excel', 'RbtController@excel');
    Route::post('rbt/excel', 'RbtController@excelStore');
    Route::get('rbt/downloadSample', 'RbtController@getDownload');
    Route::get('report/excel', 'ReportController@excel');
    Route::get('report/downloadSample', 'ReportController@getDownload');
    Route::post('report/excel', 'ReportController@excelStore');

    Route::get('rbt/search','RbtController@search') ;
    Route::post('rbt/search','RbtController@search_result');
    Route::get('report/search','ReportController@search') ;
    Route::post('report/search','ReportController@search_result');
    Route::post('report/export_report','ReportController@export_report') ;

});


Route::group(['middleware'=> ['auth','role:super_admin|admin']],function(){
    // new excel
    Route::get('rbt/{id}/editNew', 'RbtController@editNew');
    Route::post('rbt/excelNew', 'RbtController@excelNewStore');
    Route::get('rbt/downloadSampleNew', 'RbtController@getDownloadNew');

    Route::get('rbt/upload_tracks','RbtController@multi_upload') ;
    Route::post('rbt/save_tracks','RbtController@save_tracks');
    Route::get('rbt/delete_track/{id}','RbtController@delete_track');
 //   Route::resource('rbt','\App\Http\Controllers\RbtController');
    Route::post('rbt/{id}/update','\App\Http\Controllers\RbtController@update');
    Route::get('rbt/{id}/delete','\App\Http\Controllers\RbtController@destroy');
    Route::get('rbt/{id}/deleteMsg','\App\Http\Controllers\RbtController@DeleteMsg');
    Route::resource('rbt','\App\Http\Controllers\RbtController');

    Route::post('delete_multiselect',function (Request $request){
        if (strlen($request['selected_list'])==0)
        {
            \Session::flash('failed',\Lang::get('messages.custom-messages.no_selected_item'));
            return back();
        }
        delete_multiselect($request) ;
        return back();
    });
});



// rbt admin roles
Route::group(['middleware'=> ['auth','role:super_admin|admin']],function(){
    Route::get('report/statistics','ReportController@statitics') ;
    Route::post('report/{id}/update','\App\Http\Controllers\ReportController@update');
    Route::get('report/{id}/delete','\App\Http\Controllers\ReportController@destroy');
    Route::get('report/{id}/deleteMsg','\App\Http\Controllers\ReportController@DeleteMsg');
    Route::post('report/get_statistics','ReportController@get_statistics');
});



//report view route
Route::group(['middleware'=> ['auth','role:super_admin|admin']],function(){
  Route::resource('report','\App\Http\Controllers\ReportController');

});

//role account
Route::get('search','SearchController@index');
Route::group(['middleware'=> ['auth','role:super_admin|admin|account']],function(){
  Route::get('rbt','\App\Http\Controllers\RbtController@index');
  Route::get('rbt/search','RbtController@search') ;
  Route::post('rbt/search','RbtController@search_result');
  Route::get('report','\App\Http\Controllers\ReportController@index');
  Route::get('report/search','ReportController@search') ;
  Route::post('report/search','ReportController@search_result');
});
