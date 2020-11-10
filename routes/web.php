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
// Route::resource('clientpayments', 'ClientPaymentController');
// Route::get('clientpayments/ajax/allData', 'ClientPaymentController@allData');
// Route::get('providers_to_secondparty', 'SecondPartyController@providers_to_secondparty');
