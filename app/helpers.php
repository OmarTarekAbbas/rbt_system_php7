<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


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
