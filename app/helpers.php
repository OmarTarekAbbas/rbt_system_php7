<?php
use App\User;
use App\Country;
use App\Department;
use App\Notification;
use Illuminate\Http\Request;
use App\Events\Notifications;
use Illuminate\Support\Facades\DB;
use PDF as PDF;
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

function all_notify()
{
    $Notification = Notification::with('send_user')->where('notified_id',\Auth::id())->latest()->take(5)->get();
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
    $user = \App\User::where('email',ceo_email)->first();
    if($user) {
      return $user;
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
    $ceo ? $ceo->email : ceo_email;
  }
