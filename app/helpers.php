<?php
use App\User;
use App\Country;
use App\Department;
use App\Notification;
use Illuminate\Http\Request;
use App\Events\Notifications;
use Illuminate\Support\Facades\DB;
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
