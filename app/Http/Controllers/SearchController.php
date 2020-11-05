<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;


/**
 * Class ProviderController.
 *
 * @author  The scaffold-interface created at 2017-08-02 09:15:31am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class SearchController extends Controller
{

  public function __construct()
  {
    $this->get_privilege();
  }

    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $key = $request->search_key;
        $table = $request->table;
        $columns = array_map('strtolower',$request->columns);
        // add id to select query
        array_push($columns,'id');
        // to handle delete url
        $view_name = substr_replace($request->table, "", -1);
        // get all table columns
        //$all_table_colums = DB::getSchemaBuilder()->getColumnListing($table);
        // search in first column
        $search_result =  DB::table($table)->select($columns)->Where($columns[0], 'like', '%' . $key . '%');
        // for search in table columns except id,first column
        if(count($columns)>1){
            for ($i = 1; $i < count($columns)-1; $i++){
                $search_result = $search_result->orWhere($columns[$i], 'like', '%' . $key . '%');
            }
        }
        // get the search result with paginate 6
        $result = $search_result->paginate(6);
        $output="";
        if($result)
        {
            foreach ($result as $key => $value) {

                $output .= '<tr class="table-flag-blue">' .

                        '<td><input type="checkbox" /></td>' .

                        '<td>' . $value->title . '</td>' ;
                    if (Auth::user()->hasAnyRole(['super_admin', 'admin', 'ceo'])){
                        $output .= '<td><a class="btn btn-sm show-tooltip modalToaggal teet" href="#" ><i id="'.$value->id.'" class="fa fa-edit"></i></a>' .
                        '<a class="btn btn-sm btn-danger show-tooltip" title=""   onclick="return confirm(\'Are you sure you want to delete '. $value->title.' ?\')" href="'.$view_name.'/'. $value->id.'/delete" data-original-title="Delete"><i class="fa fa-trash-o"></i></a> ' .
                        '</td>';
                     }
                $output .= '</tr>';

            }
            // get the pagination links
            $l = $result->appends($request->all())->links();

            $links=(string)($l);
        }

        return Response(array('data'=>$output,'links'=>$links));
    }

}
