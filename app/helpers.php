<?php
use App\User;
use PDF as PDF;
use App\Country;
use App\RoleRoute;
use App\Route as RouteModel;
use App\Department;
use App\SecondParty;
use App\Notification;
use Illuminate\Http\Request;
use App\Events\Notifications;
use App\Firstpartie;
use App\Operator;
use App\SecondParties;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Expr\Cast\Array_;

function delete_multiselect(Request $request) // select many contract from index table and delete them
{
    $selected_list =  explode(",",$request['selected_list']);
    foreach ($selected_list as $item)
    {
        if ($request['table_name']=="rbts")
        {
            $files = DB::table($request['table_name'])->where('id',$item)->get() ;
            foreach ($files as $file)
            {
                if (file_exists($file->track_file))
                {
                    unlink($file->track_file);
                }
            }
        }
        DB::table($request['table_name'])->where('id',$item)->delete() ;
    }
    \Session::flash('success',"Deleted Successfully");
}

function months()
{
    return ['January','February','March','April','May','June','July','August','September','October','November','December'];
}

function years()
{
    $current = (int)date("Y");
    $current  -= 10;
    $years = array();
    for($i = 0;$i <= 20;$i++){
        array_push($years, $current++);
    }

    return $years;
}

function statisticsYears()
{
  $current = (int)date("Y");
  $current  -= 5;
  $years = array();
  for ($i = 0; $i <= 10; $i++) {
    array_push($years, $current++);
  }

  return $years;
}

function all_notify()
{
    $Notification = Notification::with('send_user')->where('seen',0)->where('notified_id',\Auth::id())->latest()->get();
    return $Notification;
}

function all_countries()
{
    $country_id = Country::where('title', 'LIKE', "%All countries%")->first()->id;
    return $country_id;
}

function send_notification($message,$dep,$data){
        $department    = Department::where('title','like','%'.$dep.'%')->first();
        //dd($department && $department->menager_id);
        $user = User::find($department && $department->menager_id);


        $link = url('content/'.$data->id.'/edit');
        Notification::create([
            'notifier_id' => \Auth::id(),
            'notified_id'  => $department ? $department->manager_id : \Auth::id(),
            'subject' => $message,
            'link'   =>$link
        ]);
        broadcast(new Notifications($message,$user,$link))->toOthers();
}

  function setting($key)
  {
    $data = \DB::table('settings')->where('key', 'like', '%' . $key . '%')->first();
    return $data ? $data->value : '';
  }

  function all_country() {
    if(all_countries_id()) {
      return [all_countries_id() => 'All Country']+Country::where('title','NOT LIKE','%All countries%')->pluck('title','id')->toArray();
    }
    return ['3' => 'All Country']+Country::where('title','NOT LIKE','%All countries%')->pluck('title','id')->toArray();
  }

  function all_countries_id(){
    $country = \App\Country::where('title','LIKE','%All countries%')->first();
    return optional($country)->id;
  }

  function ceo_data(){
    $ceo = User::select('*','users.id as id')->join('user_has_roles', 'users.id', '=', 'user_has_roles.user_id')
    ->join('roles','user_has_roles.role_id','=','roles.id')
    ->where('roles.name','Ceo')
    ->first();
    if($ceo) {
      return $ceo;
    }
    return null;
  }

  function legal_data(){
    $legal = User::select('*','users.id as id')->join('user_has_roles', 'users.id', '=', 'user_has_roles.user_id')
    ->join('roles','user_has_roles.role_id','=','roles.id')
    ->where('roles.name','legal')
    ->where('users.email','shaimaa.lotfi@ivas.com.eg')
    ->first();
    if($legal) {
      return $legal;
    }
    return null;
  }

  function generatePdf($contract)
  {
    $file = $contract->id . time() . '.pdf';
    $contract->contract_pdf = $file;
    $contract->save();
    $template_items = $contract->items;
    $content = view('fullcontracts.template', compact('template_items'))->render();
    PDF::reset();
    $pdf = new PDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    $pdf::SetTitle($contract->title);

    // set some language dependent data:
    $lg = array();
    $lg['a_meta_charset'] = 'UTF-8';
    $lg['a_meta_dir'] = 'rtl';
    $lg['a_meta_language'] = 'ar';
    $lg['w_page'] = 'page';
    // set some language-dependent strings (optional)
    $pdf::setLanguageArray($lg);
    $pdf::setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf::setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
    $pdf::SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
    $pdf::SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $pdf::SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf::SetFooterMargin(PDF_MARGIN_FOOTER);
    $pdf::SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
    $pdf::setImageScale(PDF_IMAGE_SCALE_RATIO);
    $pdf::setFontSubsetting(true);
    $pdf::SetFont('freeserif', '', 12);
    $pdf::AddPage();
    $pdf::writeHTML($content, true, false, true, false, '');

    $pdf::Output(base_path('uploads/contracts') . '/' . $file, 'F');
  }

  function ceo_email(){
    $ceo = User::join('user_has_roles', 'users.id', '=', 'user_has_roles.user_id')
          ->join('roles','user_has_roles.role_id','=','roles.id')
          ->where('roles.name','like','%ceo%')
          ->first();
    return $ceo ? $ceo->email : ceo_email;
  }

/**
 * Transform a date value into a Carbon object.
 *
 * @return \Carbon\Carbon|null
 */
 function transformDate($value, $format = 'Y-m-d')
{
    try {
        return \Carbon\Carbon::instance(PHPExcel_Shared_Date::ExcelToPHPObject($value));
    } catch (\ErrorException $e) {
        return \Carbon\Carbon::createFromFormat($format, $value);
    }
}

 /**
  * Method is_year
  *
  * @param String $value
  *
  * @return Boolean
  */
 function is_year($value) {
  $value = strtolower($value);
  if (strpos($value,'year') !== false || strpos($value,'years') !== false) {
    return  true;
  }
  return false;
 }

 /**
  * Method get_number_from_string
  *
  * @param String $string
  *
  * @return Integer
  */
 function get_number_from_string($string) {
  preg_match_all('/\d+/', $string, $matches);
  if(count($matches[0])) {
    return (int) $matches[0][0];
  }
  return 1;
 }

 /**
  * Method get_number_of_month
  *
  * @param String $value [1 monthes , 1 years ,as example]
  *
  * @return Integer
  */
 function get_number_of_month($value) {
    $monthes = get_number_from_string($value);
    if( is_year($value) ) {
      $monthes = $monthes * 12;
    }
    return $monthes;
 }

 /**
  * Method get provider from second party type
  */
 function provider() {

    $provider = SecondParty::where('second_party_type_title', 'Provider')->first();

    if( $provider ) {
      return $provider->id;
    }

    return 2;

 }

function list_routes_from_database()
{
    $routes = App\Route::all();
    foreach( $routes as $route ){
      $method = $route->method;
      $name = (string)$route->route;
      $action = (string)"$route->controller_name@$route->function_name";
      $route_name = (string)$route->route_name;

      Route::$method($name, $action)->name($route_name);

    }
}

function get_action_icons($route,$method)
{

  // check user is login and hass role
  $userRole = Auth::user()->roles->first()->id;
  if($userRole){
    // check route
    $route = RouteModel::where('route',$route)->where('method',$method)->first();
  }
  if($route){
    // chec user roles has access this route
    $routeRole = RoleRoute::where('role_id', $userRole)->where('route_id',  $route->id)->first();
    return $routeRole || $userRole == 1 ? 1 : 0 ;
  }
  return false;
}

function contract_type()
{
  return [
    "Content Provider" => "Content Provider",
    "Aggregator"       => "Aggregator"
  ];
}
function contract_content_type()
{
  return [
    "Library" => "Library",
    "Album"   => "Album",
    "single"  => "single",
    "Film"    => "Film",
    "Series"  => "Series",
    "Other"   => "Other"
  ];
}
function party_type()
{
  return [
    "First"  => "First",
    "Second" => "Second",
    "Third"  => "Third",
    "Fourth" => "Fourth"
  ];
}
function client_type()
{
  return [
    "Establishment"  => "Establishment",
    "Individual" => "Individual"
  ];
}
function content_type()
{
  return [
    "Audio"     => "Audio",
    "Video"     => "Video",
    "Images"    => "Images",
    "Documents" => "Documents",
    "Other"     => "Other",
  ];
}
function content_storage()
{
  return [
    "HDD"            => "HDD",
    "Audio Cassette" => "Audio Cassette",
    "Video Cassette" => "Video Cassette",
    "Flash Memory"   => "Flash Memory",
    "Cloud link"     => "Cloud link",
    "Other"          => "Other",
  ];
}
function advance_payment()
{
  return [
    "Yes" => "Yes",
    "No"  => "No"
  ];
}
function advance_payment_type()
{
  return [
    "Deduct" => "Deduct",
    "No"     => "No"
  ];
}
function payment_method()
{
  return [
    "installment" => "installment",
    "Cash"        => "Cash"
  ];
}

function client_route() {
  Route::group(['prefix' => 'client', 'namespace' => 'Client'], function () {
    Route::get('login','ClientController@getLoginPage');
    Route::post('login','ClientController@Login');
    Route::group(['middleware' => 'client'], function () {
      Route::get('profile','ClientController@getProfilePage');
      Route::post('updateprofilepic','ClientController@updateprofilepic');
      Route::post('updatepassword','ClientController@updatepassword');
      Route::post('logout','ClientController@Logout');
      Route::resource('reports','ClientReportController');
      Route::get('payments','ClientReportController@clientPayment');
      Route::get('payments/allData','ClientReportController@allData');
      Route::resource('contracts','ClientContractController');
      Route::get('contracts/{id}','ClientContractController@show');
      Route::get('contract/allData','ClientContractController@allData');
      Route::get('contract/al/{contract}','ClientContractController@authorization');
      Route::get('contract/an/{contract}','ClientContractController@annex');
      Route::get('contract/cr/{contract}','ClientContractController@copyright');
      Route::resource('contractrequests','ClientContractRequestController');
      Route::get('contractrequests/ajax/allData','ClientContractRequestController@allData');
      Route::resource('contents','ClientContentController');
      Route::get('contents/ajax/allData','ClientContentController@allData');
      Route::resource('rbt','ClientRbtController');
      Route::get('rbt/ajax/allData','ClientRbtController@allData');
    });
});
}

function first_partys($id)
{
  $first_partys = Firstpartie::where('id', $id)->first();
  return $first_partys;
}

function second_partys($id)
{
  $second_partys = SecondParties::where('second_party_id', $id)->first();
  return $second_partys;
}

function operators(){
  $operators = Operator::where('view_excel', 1)->orderBy('country_id')->pluck('id', 'title');

  return $operators;
}

function get_excel_rbt_codes($row)
{
  $operator_ids = [];

  $db_operators = operators();
  foreach ($db_operators as $key => $value) {
    $new_key = str_replace(" - ","_",strtolower($key));
    $operator_ids[$new_key] = $value;
  }

  $rbt_operators = [];
  foreach ($operator_ids as $key => $value) {
    if (isset($row->{$key}) && $row->{$key} != null && $row->{$key} != '') {
      array_push($rbt_operators, ["operator_id" => $value, "operator_rbt_code" => $row->{$key}]);
    }
  }

  return $rbt_operators;
}
