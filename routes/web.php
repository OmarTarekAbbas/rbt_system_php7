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

Auth::routes();

list_routes_from_database();

// Route::get('providers_to_secondparty', 'SecondPartyController@providers_to_secondparty');

Route::get('routes_v2','RouteController@create_v2') ;
Route::get('get_controller_methods','RouteController@get_methods_for_selected_controller') ;
Route::post('routes/store_v2','RouteController@store_v2') ;
