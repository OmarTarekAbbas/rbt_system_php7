<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Events\Notifications;
use App\User;
use App\Department;
use App\Notification;
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
    $Notification = Notification::with('send_user')->where('seen',0)->where('notified_id',\Auth::id())->latest()->take(5)->get();
    return $Notification;
}

function send_notification($message,$dep,$data){
        $department    = Department::where('title','like','%'.$dep.'%')->first();
        $user = User::find($department->menager_id);
        $link = url('content/'.$data->id);
        Notification::create([
            'notifier_id' => \Auth::id(),
            'notified_id'  => $department->manager_id,
            'subject' => $message,
            'link'   =>$link
        ]);
        broadcast(new Notifications($message,$user,$link))->toOthers();
}
