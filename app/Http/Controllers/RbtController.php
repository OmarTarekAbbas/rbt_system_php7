<?php

namespace App\Http\Controllers;

use URL;
use Auth;
use File;
use Excel;
use App\Rbt;
use Validator;
use Datatables;
use App\Content;
use App\Occasion;
use App\Operator;
use App\Provider;
use App\Aggregator;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;


/**
 * Class RbtController.
 *
 * @author  The scaffold-interface created at 2017-08-02 09:20:35am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class RbtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public $current_path = "" ;

    public function index()
    {
        $title = 'Index - rbt';
        if(Auth::user()->hasRole(['super_admin','admin']))
        {
        $rbts = Rbt::all();
        }
        else{
          $rbts = Rbt::where('aggregator_id',Auth::user()->aggregator_id)->get();
        }

        return view('rbt.index',compact('rbts','title'));
    }


    public function allData(Request $request)
    {
        $title = 'Index - rbt';
        // $rbts = Rbt::all();
        $content_id = $request->all();
        $rbts = Rbt::select('*','rbts.id AS rbt_id','providers.title as provider','occasions.title as occasion','operators.title as operator','aggregators.title as aggregator','contents.content_title as content','rbts.internal_coding as rbt_internal_coding')
        ->leftjoin('providers','providers.id','=','rbts.provider_id')
        ->leftjoin('occasions','occasions.id','=','rbts.occasion_id')
        ->leftjoin('operators','operators.id','=','rbts.operator_id')
        ->leftjoin('aggregators','aggregators.id','=','rbts.aggregator_id')
        ->leftjoin('contents','contents.id','=','rbts.content_id')
        ->get();

        $datatable = \Datatables::of($rbts)
            ->addColumn('index', function (Rbt $rbt) {
                return '<input class="select_all_template" type="checkbox" name="selected_rows[]" value="{{$rbt->id}}" class="roles" onclick="collect_selected(this)">';
            })
            ->addColumn('id', function (Rbt $rbt) {
                return $rbt->rbt_id;
            })
            ->addColumn('rbt_internal_coding', function (Rbt $rbt) {
              return ($rbt->rbt_internal_coding) ? $rbt->rbt_internal_coding : "--";
          })
            ->addColumn('type', function (Rbt $rbt) {
                return $rbt->type ? 'NEW' : 'OLD';
            })
            ->addColumn('track_title_en', function (Rbt $rbt) {
                return $rbt->track_title_en;
            })
            ->addColumn('code', function (Rbt $rbt) {
                return $rbt->code;
            })
            ->addColumn('provider', function (Rbt $rbt) {
                return ($rbt->provider) ? $rbt->provider : "--";
            })
            ->addColumn('track_file', function (Rbt $rbt) {
                if ($rbt->track_file)
                    return '<audio class="content_audios" controls>
                                <source src="'.url($rbt->track_file).'">
                            </audio>
                            ';
                else
                    return '--';
            })
            ->addColumn('operator', function (Rbt $rbt) {
                return $rbt->operator;
            })
            ->addColumn('occasion', function (Rbt $rbt) {
                if ($rbt->occasion_id)
                    return $rbt->occasion;
                else
                    return '--';
            })
            ->addColumn('content', function (Rbt $rbt) {
                if ($rbt->content_id)
                    return $rbt->content;
                else
                    return '--';
            })
            ->addColumn('owner', function (Rbt $rbt) {
                if ($rbt->owner)
                    return $rbt->owner;
                else
                    return '--';
            })
            ->addColumn('aggregator', function (Rbt $rbt) {
                if ($rbt->aggregator_id)
                    return $rbt->aggregator;
                else
                    return '--';
            })
            ->addColumn('action', function (Rbt $rbt) {
                if (Auth::user()->hasRole(['super_admin', 'admin']))
                    return '<td class="visible-md visible-lg">
                            <div class="btn-group">
                            <a class="btn btn-sm btn-primary show-tooltip " href="' . url("rbt/" . $rbt->rbt_id) . '" title="Show"><i class="fa fa-eye"></i></a>
                                <a class="btn btn-sm show-tooltip" href="' . url("rbt/" . $rbt->rbt_id . "/edit") . '" title="Edit"><i class="fa fa-edit"></i></a>
                                <a class="btn btn-sm show-tooltip btn-danger" onclick="return ConfirmDelete();" href="' . url("rbt/" . $rbt->rbt_id . "/delete") . '" title="Delete"><i class="fa fa-trash"></i></a>
                            </div>
                        </td>';
            })

            ->escapeColumns([])
            ->make(true);

        return $datatable;
    }



    public function create()
    {
        $operators = Operator::all();
        $occasions = Occasion::all()->pluck('title','id');
        $aggregators = Aggregator::all()->pluck('title','id');
        $providers = Provider::all()->pluck('title','id') ;
        $contents = Content::all()->pluck('content_title','id') ;
        return view('rbt.create',compact('operators', 'occasions', 'aggregators','providers','contents' ));
    }

    public function store(Request $request)
    {
        $rbt = new Rbt();
        if (!strcmp($request->type,'new'))
        {
            $validator = Validator::make($request->all(),[
                'track_title_en' => 'required',
                'code' => 'required|numeric',
                'album_name' => 'required',
                'artist_name_en' => 'required',
                'owner' => 'required',
                'operator_id' => 'required',
            ]);
        }
        else{
            $validator = Validator::make($request->all(),[
                'track_title_en' => 'required',
                'code' => 'required|numeric',
                'operator_id' => 'required',
            ]);
        }
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        if(!strcmp($request->type,'new'))
        {
            $rbt->track_title_en = $request->track_title_en;
            $rbt->track_title_ar = $request->track_title_ar;
            $rbt->artist_name_en = $request->artist_name_en;
            $rbt->artist_name_ar = $request->artist_name_ar;
            $rbt->album_name = $request->album_name;
            $rbt->owner = $request->owner;
            $rbt->code = $request->code;
            $rbt->type = 1;
        }
        else{
            $rbt->track_title_en = $request->track_title_en;
            $rbt->code = $request->code;
            $rbt->social_media_code = $request->social_media_code;
            $rbt->owner = $request->owner;
        }

        if ($request->hasFile('track_file')) {
            $path = "uploads/rbts/".date('Y-m-d')."/";
            $ex = $request->file('track_file')->getClientOriginalExtension();
            $extentions = array('mp3','wav','ogg','m4a');
            if (in_array($ex,$extentions) ) {
                $request->file('track_file')->move(base_path($path),$request->track_title_en.".wav");
                $track_file = $path.$request->track_title_en.".wav" ;
                $rbt->track_file = $track_file;
            }else{
                $request->session()->flash('failed', 'Rbt file must be an audio');

                return back();

            }
        }



        $rbt->operator_id = $request->operator_id;

        if ($request->occasion_id != "") {
            $rbt->occasion_id = $request->occasion_id;
        }

        if ($request->aggregator_id != "") {
            $rbt->aggregator_id = $request->aggregator_id;
        }

        if ($request->content_id != "") {
            $rbt->content_id = $request->content_id;
        }

        if ($request->provider_id != "") {
            $rbt->provider_id = $request->provider_id;
        }

        $rbt->internal_coding = 'Rb/' . date('Y') . "/" . date('m') . "/" . date('d') . "/" . time() ."/". $rbt->operator_id;
        $rbt->start_date      = date('Y-m-d', strtotime($request->start_date));
        $rbt->expire_date     = date('Y-m-d', strtotime($request->expire_date));

        $rbt->save();

        $request->session()->flash('success', 'Add Rbt Successfully');

        return redirect('rbt/' . $rbt->id);
    }


    public function show($id)
    {
        $rbt = Rbt::select('*','rbts.start_date','rbts.expire_date','rbts.id AS rbt_id','providers.title as provider','occasions.title as occasion','operators.title as operator','aggregators.title as aggregator','contents.content_title as content','rbts.internal_coding as rbt_internal_coding')
        ->leftjoin('providers','providers.id','=','rbts.provider_id')
        ->leftjoin('occasions','occasions.id','=','rbts.occasion_id')
        ->leftjoin('operators','operators.id','=','rbts.operator_id')
        ->leftjoin('aggregators','aggregators.id','=','rbts.aggregator_id')
        ->leftjoin('contents','contents.id','=','rbts.content_id')
        ->where('rbts.id', $id)
        ->first();
        // dd($rbt);
        return view('rbt.show',compact('rbt'));
    }


    public function excel()
    {
        $title = 'Create - rbt';

        $operators = Operator::all();

        $occasions = Occasion::all()->pluck('title','id');

        $aggregators = Aggregator::all()->pluck('title','id');
        // dd('df');

        return view('rbt.excel',compact('title', 'operators' , 'occasions' , 'aggregators'));
    }

    public function excelStore(Request $request)
    {
        $validator = Validator::make($request->all(),[
                'operator_id' => 'required',
            ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $counter = 0 ;
        $total_counter = 0 ;

        ini_set('max_execution_time', 60000000000);
        ini_set('memory_limit', -1);

        if ($request->hasFile('fileToUpload')) {
            $ext =  $request->file('fileToUpload')->getClientOriginalExtension();
            if ($ext != 'xls' && $ext != 'xlsx' && $ext != 'csv') {
                $request->session()->flash('failed', 'File must be excel');
                return back();
            }

            $file = $request->file('fileToUpload');
            $filename = time().'_'.$file->getClientOriginalName();
            if(!$file->move(base_path().'/uploads/rbt/excel',  $filename) ){
                return back();
            }

            Excel::filter('chunk')->load(base_path().'/uploads/rbt/excel/'.$filename)->chunk(100, function($results) use ($request,&$counter,&$total_counter)
            {
                foreach ($results as $row) {
                    $total_counter++ ;
                    $rbt = Rbt::where([['operator_id',$request->operator_id],['code',$row->code]])->first();
                    if ($rbt) {
                       continue;
                    }
                    if ( isset($row->code) &&  $row->code != ""   ) {
                       if( !is_numeric($row->code)){
                           continue;
                       }
                    }
                    if ( isset($row->social_media_code) &&  $row->social_media_code != ""   ) {
                        if( !is_numeric($row->social_media_code)){
                            continue;
                        }
                    }


                    if ( isset($row->occasion) &&  $row->occasion != ""   ) {

                        $check_occasion = Occasion::where('title','LIKE','%'.$row->occasion.'%')->first();
                        if ($check_occasion)
                        {
                            $occasion_id = $check_occasion->id ;
                        }
                        else
                        {
                            $occ = array() ;
                            $occ['title'] = $row->occasion ;
                            $occ['country_id'] = all_countries();
                            $create = Occasion::create($occ) ;
                            $occasion_id = $create->id ;
                        }


                    }else{
                        $occasion_id = NULL ;
                    }




                    $check_provider = Provider::where('title','LIKE','%'.$row->content_owner.'%')->first() ;
                    if ($check_provider)
                    {
                        $provider_id = $check_provider->id ;
                    }
                    else{
                        $prov = array() ;
                        $prov['title'] = $row->content_owner ;
                        $create = Provider::create($prov) ;
                        $provider_id = $create->id ;
                    }

                    $check_content = Content::where('internal_coding', 'LIKE', '%' . $row->master_content_code . '%')->first();
                    if ($check_content) {
                      $content_id = $check_content->id;
                    } else {
                      $content_id = NULL;
                    }


                    if ($request['type'])
                    {
                        $rbt['artist_name_en'] = $row->artist_name_english;
                        $rbt['artist_name_ar'] = $row->artist_name_arabic;   // not required
                        $rbt['track_title_en'] = $row->rbt_name_english;
                        $rbt['track_title_ar'] = $row->rbt_name_arabic;  // not required
                        $rbt['album_name'] = $row->album;    // not required
                        $rbt['provider_id'] = $provider_id;  //  original content owner = Mashari Al Afasi
                        $rbt['occasion_id'] = $occasion_id ;
                        $rbt['code'] = $row->codes;
                        $rbt['owner'] = $row->provider ; // ex:  ARPU
                        $rbt['operator_id'] = $request->operator_id;
                        $rbt['aggregator_id'] = $request->aggregator_id;
                        $rbt['content_id'] = $content_id;
                        $rbt['type'] = 1 ; // new excel
                    }
                    else{
                        $rbt['code'] = $row->code;
                        $rbt['occasion_id'] = $occasion_id ;
                        $rbt['track_title_en'] = $row->rbt_name;
                        $rbt['social_media_code'] = $row->social_media_code;
                        $rbt['provider_id'] = $provider_id ;
                        $rbt['operator_id'] = $request->operator_id;
                        $rbt['aggregator_id'] = $request->aggregator_id;
                        $rbt['content_id'] = $content_id;
                    }

                    $rbt['track_file'] = "uploads/rbts/".date('Y-m-d')."/".$rbt['track_title_en'].".wav" ;
                    $rbt['start_date'] = transformDate($row->start_date) ;
                    $rbt['expire_date']= transformDate($row->expire_date) ;

                    $check = Rbt::create($rbt) ;
                    if ($check)
                    {
                        $rbt_edit = Rbt::find($check->id);
                        $rbt_edit->internal_coding = 'Rb/' . date('Y') . "/" . date('m') . "/" . date('d') . "/" . uniqid();
                        $rbt_edit->save();
                        $counter++ ;
                    }
                }
            },false);
        }else{
            $request->session()->flash('failed', 'Excel file is required');
            return back();
        }
         //    unlink(base_path().'/uploads/rbt/excel/'.$filename);
        $failures = $total_counter - $counter ;
        $request->session()->flash('success', $counter.' item(s) created successfully, and '.$failures.' item(s) failed');
        return redirect('rbt');

    }


    /**
     * Show the form for editing the specified resource.
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $operators = Operator::all();
        $occasions = Occasion::all()->pluck('title','id');
        $aggregators = Aggregator::all()->pluck('title','id');
        $providers = Provider::all()->pluck('title','id') ;
        $contents = Content::all()->pluck('content_title','id') ;
        $title = "";
        $rbt = Rbt::findOrfail($id);
        if($rbt->type)
        {
            return view('rbt.editNew',compact('title','rbt', 'operators', 'occasions', 'aggregators','providers','contents' ) );
        }
        else{
            return view('rbt.edit',compact('title','rbt', 'operators', 'occasions', 'aggregators','providers' ,'contents' ) );
        }
    }

    public function update($id,Request $request)
    {
        $rbt = Rbt::findOrfail($id);
        if ($rbt->type)
        {
            $validator = Validator::make($request->all(),[
                'track_title_en' => 'required',
                'code' => 'required|numeric',
                'album_name' => 'required',
                'artist_name_en' => 'required',
                'owner' => 'required',
                'operator_id' => 'required',
            ]);
        }
        else{
            $validator = Validator::make($request->all(),[
                'track_title_en' => 'required',
                'code' => 'required|numeric',
                'operator_id' => 'required',
            ]);
        }
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $rbt_check = Rbt::where([['operator_id',$request->operator_id],['code',$request->code],['id','<>',$id]])->first();
        if ($rbt_check) {
            $request->session()->flash('failed', 'Rbt Aleardy Exists');
            return back();
        }
        if($rbt->type)
        {
            $rbt->track_title_en = $request->track_title_en;
            $rbt->track_title_ar = $request->track_title_ar;
            $rbt->artist_name_en = $request->artist_name_en;
            $rbt->artist_name_ar = $request->artist_name_ar;
            $rbt->album_name = $request->album_name;
            $rbt->owner = $request->owner;
            $rbt->code = $request->code;
        }
        else{
            $rbt->track_title_en = $request->track_title_en;
            $rbt->code = $request->code;
            $rbt->social_media_code = $request->social_media_code;
            $rbt->owner = $request->owner;
        }


        if ($request->hasFile('track_file')) {
            $old_path = explode('/',$rbt->track_file) ;
            if ($rbt->track_file) {
              Storage::disk('local')->delete($rbt->track_file);
            }
            $ex = $request->file('track_file')->getClientOriginalExtension();
            $new_file_name = rand('999','999') . $request->file('track_file')->getClientOriginalName();
            $extentions = array('mp3','wav','ogg','m4a');
            if (in_array($ex,$extentions) ) {
                $request->file('track_file')->move($old_path[0]."/".$old_path[1],$new_file_name.".wav");
                $track_file = $old_path[0]."/".$old_path[1]."/".$new_file_name.".wav" ;
                $rbt->track_file = $track_file;
            }else{
                $request->session()->flash('failed', 'Rbt file must be an audio');
                dd($request);
                return redirect('/rbt/'.$id.'/edit');
            }
        }


        $rbt->operator_id = $request->operator_id;

        if ($request->occasion_id != "") {
            $rbt->occasion_id = $request->occasion_id;
        }

        if ($request->aggregator_id != "") {
            $rbt->aggregator_id = $request->aggregator_id;
        }
        if ($request->content_id != "") {
            $rbt->content_id = $request->content_id;
        }

        $rbt->start_date      = date('Y-m-d', strtotime($request->start_date));
        $rbt->expire_date     = date('Y-m-d', strtotime($request->expire_date));

        $rbt->save();

        $request->session()->flash('success', 'Updated Successfully');

        return redirect('rbt/' . $rbt->id);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param    int $id
     * @return  \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
     	$rbt = Rbt::findOrfail($id);
     	$rbt->delete();
        $request->session()->flash('success', 'Deleted Successfully');
        return back();
    }

    public function getDownload()
    {
        $file= base_path(). "/rbtOldExcel/rbt.xlsx";

        $headers = array(
                  'Content-Type: application/xlsx',
                );
        return response()->download($file, 'rbt.xlsx', $headers);
    }


    public function getDownloadNew()
    {
        $file= base_path(). "/rbtexcel/rbtNew.xlsx";

        $headers = array(
            'Content-Type: application/xlsx',
        );
        return response()->download($file, 'rbtNew.xlsx', $headers);
    }

    public function search()
    {
        $operators = Operator::all()->pluck('title','id');
        $occasions = Occasion::all()->pluck('title','id');
        $aggregators = Aggregator::all()->pluck('title','id');
        $providers = Provider::all()->pluck('title','id') ;
        return view('rbt.search',compact('operators','occasions','aggregators','providers')) ;
    }



    public function search_result(Request $request)
    {
        //return $request['search_field'];
        $rbt_columns = Schema::getColumnListing('rbts');
        $columns = array(1=>"track_title_en",2=>"track_title_ar",3=>"artist_name_en",4=>"artist_name_ar",
            5=>"album_name", 6=>"code",7=>"social_media_code",8=>"owner",9=>"from",10=>"to",11=>"operator_id",12=>"occasion_id",13=>"aggregator_id",14=>"provider_id", 15=>"type");

        $search_key_value = array() ;
        foreach ($request['search_field'] as $index=>$item) {
            if (strlen($item)==0)
                continue ;
            else {
                if ($index==9){
                    $item = date("Y-m-d",strtotime($item));
                    $search_key_value['from'] = $item ;
                }
                elseif($index==10)
                {
                    $item = date("Y-m-d",strtotime($item));
                    $search_key_value['to'] = $item ;
                }
                elseif (array_search($columns[$index],$rbt_columns))
                {

                    $search_key_value[$columns[$index]] = $item ;
                }
            }
        }
        $string_query = "" ;
        $counter = 0 ;
        $size = count($search_key_value) ;
        foreach ($search_key_value as $index=>$value)
        {
            $sign = "=" ;
            if ($index == "to")
            {
                $sign = "<=" ;
                $index = "created_at" ;
            }
            elseif($index=="from")
            {
                $sign = ">=" ;
                $index = "created_at" ;
            }
            elseif($index=="track_title_en")
            {
                $sign = "like" ;
            }

            $counter++ ;
            if ($counter == $size)
            {
                if($index=="track_title_en") {
                    $string_query .= "`rbts`.`$index`"." $sign '%$value%'" ;
                } else {
                    $string_query .= "`rbts`.`$index`"." $sign '$value'" ;
                }

            }
            else
            {
                $string_query .= "`rbts`.`$index`"." $sign '$value' AND ";
            }
        }

        $select = "SELECT rbts.* , operators.title AS operator_title, providers.title AS provider_title,occasions.title AS occasion_title, aggregators.title AS aggregator_title
                   FROM rbts
                   JOIN providers ON rbts.provider_id = providers.id
                   JOIN aggregators ON rbts.aggregator_id = aggregators.id
                   JOIN operators ON rbts.operator_id = operators.id
                   JOIN occasions ON rbts.occasion_id = occasions.id" ;



        if (empty($string_query))
            $where = "";
        else
            $where = " WHERE ".$string_query ;


        if(Auth::user()->hasRole(['account']))
        {
          if($where){
          $select  .=" And aggregators.id=".Auth::user()->aggregator_id;
          }
          else{
            $select  .=" where aggregators.id=".Auth::user()->aggregator_id;
          }
        }



        $query = $select.$where;
        $search_result = \DB::select($query) ;
        return $search_result ;
    }

    public function multi_upload()
    {
        return view('rbt.multi_uploader') ;
    }
    public function save_tracks(Request $request)
    {
        if (!file_exists('uploads/' . date('Y-m-d') . '/')) {
            mkdir('uploads/' . date('Y-m-d') . '/', 0777, true);
        }
        $vpb_file_name = strip_tags($_FILES['upload_file']['name']); //File Name
        $vpb_file_id = strip_tags($_POST['upload_file_ids']); // File id is gotten from the file name
        $vpb_file_size = $_FILES['upload_file']['size']; // File Size
        $vpb_uploaded_files_location = 'uploads/' . date('Y-m-d') . '/'; //This is the directory where uploaded files are saved on your server

        $vpb_final_location = $vpb_uploaded_files_location . $vpb_file_name ; //Directory to save file plus the file to be saved
        //Without Validation and does not save filenames in the database
        if (move_uploaded_file(strip_tags($_FILES['upload_file']['tmp_name']), $vpb_final_location)) {
            //Display the file id
            echo $vpb_file_id;
        } else {
            //Display general system error
            echo 'general_system_error';
        }

    }
    public function delete_track($id)
    {

    }

    public function statitics()
    {
        $operators = Operator::all() ;
        return view('rbt.statistics',compact('operators'));
    }

    public function get_statistics(Request $request)
    {
        $from_year = $request['duration'][0];
        $from_month = $request['duration'][1] ;
        $to_year = $request['duration'][2];
        $to_month = $request['duration'][3];
        $operator = $request['duration'][4];
        $num_of_rbts = $request['duration'][5];
        $order_by = " ORDER BY reports.year ASC, reports.month ASC ";
        $operator_query = "" ;
        $where = "" ;
        $duration_query = "" ;
        $num_of_rbts_query = "" ;
        if ($operator)
        {
            $where = " WHERE " ;
            $operator_query = " reports.operator_id = ". $operator ;
        }
        if($from_month && $from_year && $to_month && $to_year)
        {
            $where = " WHERE " ;
            if($operator)
                $duration_query = ' AND (reports.year > '.$from_year.' OR ( reports.month >= '.$from_month.' AND reports.year = '.$from_year.')) AND (reports.year < '.$to_year.' OR ( reports.month <= '.$to_month.' AND reports.year = '.$to_year.')) ' ;
            else
                $duration_query = ' (reports.year > '.$from_year.' OR ( reports.month >= '.$from_month.' AND reports.year = '.$from_year.')) AND (reports.year < '.$to_year.' OR ( reports.month <= '.$to_month.' AND reports.year = '.$to_year.')) ' ;
        }
        if($num_of_rbts)
        {
            $num_of_rbts_query = " LIMIT ".$num_of_rbts." OFFSET 0" ;
            $order_by = " ORDER BY reports.revenue_share DESC ";
        }
        else{
            $num_of_rbts_query = " LIMIT 10 OFFSET 0" ;
        }
        $query = 'SELECT reports.* , rbts.track_title_en AS rbt_name, operators.title FROM reports JOIN operators ON reports.operator_id = operators.id JOIN rbts ON reports.rbt_id = rbts.id '.
                  $where.$operator_query.$duration_query.$order_by.$num_of_rbts_query ;

        $reports = \DB::select($query) ;
        return $reports ;
    }


    public function list_file_system()
    {
        return view('rbt.file_system');
    }


}
