<?php

use App\Contract;
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
client_route();
Route::get("change/contract/code",function(){
  $contracts = Contract::all();
  foreach($contracts as $contract) {
    $serviceTypeId = $contract->service_type_id;
    $first_party_title = strtolower(substr(optional($contract->first_parties)->first_party_title,0,2));
    $second_party_id = optional($contract->second_parties)->second_party_id;
    $second_party_type_id = optional($contract->second_party_type)->id;
    $contract_id = $contract->id;
    $contract->contract_code = $serviceTypeId.'-'.$first_party_title.'-'.$second_party_id.'-'.$second_party_type_id.'-'.$contract_id;
    $contract->save();
  }
});
Route::get('read_notify/{id}', function ($id) {
  \App\Notification::find($id)->update([
      'seen' => 1,
  ]);
});
