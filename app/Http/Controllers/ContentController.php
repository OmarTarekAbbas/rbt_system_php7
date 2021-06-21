<?php

namespace App\Http\Controllers;

use App\Aggregator;
use App\Rbt;

use App\Content;
use App\Country;
use App\Contract;
use App\Occasion;
use App\Provider;
use App\SecondParties;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Excel;

class ContentController extends Controller
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
  public $current_path = "";

  public function index()
  {
    $title = 'Index - Content';
    $contents = Content::all();
    return view('content.index', compact('contents', 'title'));
  }

  public function allData(Request $request)
  {
    if($request->has('contract_id')){

      $contents = Content::select('*', 'contents.id AS id', 'second_parties.second_party_title as provider', 'occasions.title as occasion', 'contracts.contract_code as contract_code', 'contracts.id as contract_id')
      ->join('second_parties', 'second_parties.second_party_id', '=', 'contents.provider_id')
      ->join('occasions', 'occasions.id', '=', 'contents.occasion_id')
      ->leftjoin('contracts', 'contracts.id', '=', 'contents.contract_id')
      ->where('contents.contract_id', $request->contract_id)
      ->latest('contents.id')
      ->get();

    }else{

      $contents = Content::select('*', 'contents.id AS id', 'second_parties.second_party_title as provider', 'occasions.title as occasion', 'contracts.contract_code as contract_code', 'contracts.id as contract_id')
      ->join('second_parties', 'second_parties.second_party_id', '=', 'contents.provider_id')
      ->join('occasions', 'occasions.id', '=', 'contents.occasion_id')
      ->leftjoin('contracts', 'contracts.id', '=', 'contents.contract_id')
      ->latest('contents.id')
      ->get();

    }

    $datatable = \Datatables::of($contents)
      ->addColumn('index', function (Content $content) {
        return '<input class="select_all_template" type="checkbox" name="selected_rows[]" value="'.$content->id.'" class="roles" onclick="collect_selected(this)">';
      })
      ->addColumn('id', function (Content $content) {
        return $content->id;
      })
      ->addColumn('content_title', function (Content $content) {
        return $content->content_title;
      })
      ->addColumn('content_type', function (Content $content) {
        return $content->content_type;
      })
      ->addColumn('internal_coding', function (Content $content) {
        if ($content->internal_coding)
          return $content->internal_coding;
        else
          return '---';
      })
      ->addColumn('path', function (Content $content) {
        if ($content->path)
          return '<audio class="content_audios" controls>
                                <source src="' . url($content->path) . '">
                            </audio>';
        else
          return '---';
      })
      ->addColumn('contract_code', function (Content $content) {
        if ($content->contract_code)
          return '<a  href="' . url("fullcontracts/$content->contract_id") . '" >' . $content->contract_code . '</a>';
        else
          return '---';
      })
      ->addColumn('occasion', function (Content $content) {
        if ($content->occasion)
          return $content->occasion;
        else
          return '---';
      })
      ->addColumn('provider', function (Content $content) {
        if ($content->provider)
          return $content->provider;
        else
          return '---';
      })
      ->addColumn('action', function (Content $content) {
          return view('content.actions', compact('content'));;
      })

      ->escapeColumns([])
      ->make(true);

    return $datatable;
  }

  public function create()
  {
    $title = 'Create - Content';
    $occasions = Occasion::all()->pluck('title', 'id');
    $providers = SecondParties::all()->pluck('second_party_title', 'second_party_id');
    $contracts = Contract::all();
    return view('content.create', compact('title', 'providers', 'occasions', 'contracts'));
  }

  public function store(Request $request)
  {
    $validator = \Validator::make($request->all(), [
      'content_title' => 'required|string',
      'content_type' => 'required',
      'provider_id' => 'required',
      'occasion_id' => 'required',
      'path' => '',
      'image_preview' => ''
    ]);

    if ($validator->fails()) {
      return back()->withErrors($validator)->withInput();
    }

    if ($request->path) {
      if (!strcmp($request->content_type, 'image')) {
        $imgExtensions = array("png", "jpeg", "jpg");
        $file = $request->path;
        if (!in_array($file->getClientOriginalExtension(), $imgExtensions)) {
          \Session::flash('failed', 'Image must be jpg, png, or jpeg only !! No updates takes place, try again with that extensions please..');
          return back();
        }
      } else if (!strcmp($request->content_type, 'audio')) {
        $audExtensions = array("mp3", "webm", "wav");
        $file = $request->path;
        if (!in_array($file->getClientOriginalExtension(), $audExtensions)) {
          \Session::flash('failed', 'Audio must be mp3, webm and wav only !! No updates takes place, try again with that extensions please..');
          return back();
        }
      } else if (!strcmp($request->content_type, 'video')) {
        $vidExtensions = array("mp4", "flv", "3gp");
        $file = $request->path;
        if (!in_array($file->getClientOriginalExtension(), $vidExtensions)) {
          \Session::flash('failed', 'Video must be mp4, flv, or 3gp only !! No updates takes place, try again with that extensions please..');
          return back();
        }
      }
    }
    $content = new Content();
    $content->internal_coding = 'Co/' . date('Y') . "/" . date('m') . "/" . date('d') . "/" . time();
    $content->content_title = $request->content_title;
    $content->provider_id = $request->provider_id;
    $content->path = $request->path;
    $content->content_type = $request->content_type;
    $content->occasion_id = $request->occasion_id;
    $content->contract_id = $request->contract_id;
    $content->start_date = $request->start_date ? date('Y-m-d',strtotime($request->start_date)) : null;
    $content->expire_date= $request->expire_date ? date('Y-m-d',strtotime($request->expire_date)) : null;
    send_notification('Add New Content You Can Follow It From This Link', 'Operation', $content);
    //dd($content->save());
    $content->save();
    $request->session()->flash('success', 'Add Content Successfully');

    return redirect('content/' . $content->id);
  }

  public function show($id)
  {
    $content  = content::find($id);
    $provider = DB::table('second_parties')->where('second_party_id', $content->provider_id)->first();
    $occasion = DB::table('occasions')->where('id', $content->occasion_id)->first();
    $contract = DB::table('contracts')->where('id', $content->contract_id)->first();
    $rbts     = DB::table('rbts')->where('content_id', $id)->get();
    $occasionRbt = "";
    $aggregator_id = "";
    foreach($rbts as $rbt){
      $occasionRbt = DB::table('occasions')->where('id', $rbt->occasion_id)->first(['title']);
    }
    foreach($rbts as $rbt){
      $aggregator_id = DB::table('aggregators')->where('id', $rbt->aggregator_id)->first(['title']);
    }

    //dd($aggregator_id);
    return view('content.view', compact('content', 'provider', 'occasion', 'contract', 'rbts','occasionRbt','aggregator_id'));
  }

  public function create_excel()
  {
    $title = 'Create - Content';
    $occasions = Occasion::all()->pluck('title', 'id');
    $providers = SecondParties::all()->pluck('second_party_title', 'second_party_id');
    return view('content.excel', compact('title', 'providers', 'occasions'));
  }


  public function excel_store(Request $request)
  {
    // $validator = Validator::make($request->all(),[
    //         'operator_id' => 'required',
    //     ]);

    // if ($validator->fails()) {
    //     return back()->withErrors($validator)->withInput();
    // }
    $counter = 0;
    $total_counter = 0;
    ini_set('max_execution_time', 60000000000);
    ini_set('memory_limit', -1);

    if ($request->hasFile('fileToUpload')) {
      $ext =  $request->file('fileToUpload')->getClientOriginalExtension();
      if ($ext != 'xls' && $ext != 'xlsx' && $ext != 'csv') {
        $request->session()->flash('failed', 'File must be excel');
        return back();
      }

      $file = $request->file('fileToUpload');
      $filename = time() . '_' . $file->getClientOriginalName();
      if (!$file->move(base_path() . '/uploads/content/excel',  $filename)) {
        return back();
      }

      \Excel::filter('chunk')->load(base_path() . '/uploads/content/excel/' . $filename)->chunk(100, function ($results) use ($request, &$counter, &$total_counter) {
        foreach ($results as $row) {
          $total_counter++;
          if (isset($row->occasion) &&  $row->occasion != "") {
            $check_occasion = Occasion::where('title', 'LIKE', '%' . $row->occasion . '%')->first();
            if ($check_occasion) {
              $occasion_id = $check_occasion->id;
            } else {
              $occ = array();
              $occ['title'] = $row->occasion;
              $country = Country::where('title', 'LIKE', "%$row->country%")->first();
              $occ['country_id'] = $country->id ?? all_countries();
              $create = Occasion::create($occ);
              $occasion_id = $create->id;
            }
          } else {
            $occasion_id = NULL;
          }

          $check_provider = SecondParties::where('second_party_title', 'LIKE', '%' . $row->content_owner . '%')->first();
          if ($check_provider) {
            $provider_id = $check_provider->second_party_id;
          } else {
            $prov = array();
            $prov['second_party_title'] = $row->content_owner;
            $prov['second_party_type_id'] = PROVIDER_ID; //helper for provider
            $create = SecondParties::create($prov);
            $provider_id = $create->second_party_id;
          }


          $check_contract = Contract::where('contract_code', 'LIKE', '%' . trim($row->contract_code) . '%')->first();




          if ($check_contract) {
            $contract_id = $check_contract->id;
          } else {
            $contract_id = NULL;
          }
          $uniqid = uniqid();
          $content_data['content_title'] = $row->content_title;
          $content_data['content_type'] = $row->content_type;
          $content_data['internal_coding'] = 'Co/' . date('Y') . "/" . date('m') . "/" . date('d') ."/". $uniqid;
          $content_data['provider_id'] = $provider_id;
          $content_data['occasion_id'] = $occasion_id;
          $content_data['contract_id'] = $contract_id;
          $content_data['user_id'] = \Auth::user()->id;
          $content_data['path'] = "uploads/content/" . date('Y-m-d') . "/" . $row->path;
          $content_data['start_date'] =  $row->start_date ? transformDate($row->start_date) : null ;
          $content_data['expire_date']=  $row->expire_date ? transformDate($row->expire_date) : null ;
          $check = content::create($content_data);
          if ($check) {
            $content = Content::find($check->id);
            //$content->internal_coding = $content->id;
            if ($content->save()) {
              if (!file_exists('uploads/content/' .  date('Y-m-d'). '/')) {
                  mkdir('uploads/content/' . date('Y-m-d') . '/', 0777, true);
              }
          }
            $counter++;
          }
        }
      }, false);
    } else {
      $request->session()->flash('failed', 'Excel file is required');
      return back();
    }
    //    unlink(base_path().'/uploads/rbt/excel/'.$filename);
    $failures = $total_counter - $counter;
    // $user = \App\User::find(5);
    // broadcast(new Notification('add new post',$user))->toOthers();
    $request->session()->flash('success', $counter . ' item(s) created successfully, and ' . $failures . ' item(s) failed and Please upload Content on this path uploads/content/ ' . date('Y-m-d'));
    return redirect('content');
  }



  public function edit($id)
  {
    $title = "Content - Edit";
    $occasions = Occasion::all()->pluck('title', 'id');
    $providers = SecondParties::all()->pluck('second_party_title', 'second_party_id');
    $content = content::findOrfail($id);
    $contracts = Contract::all();

    // return [$occasions,$providers];
    return view('content.edit', compact('title', 'content', 'occasions', 'providers', 'contracts'));
  }

  public function update($id, Request $request)
  {
    $validator = \Validator::make($request->all(), [
      'content_title' => 'required|string',
      'content_type' => 'required',
      'provider_id' => 'required',
      'occasion_id' => 'required',
      'path' => '',
      'image_preview' => ''
    ]);

    if ($validator->fails()) {
      return back()->withErrors($validator)->withInput();
    }
    if ($request->path) {
      if (!strcmp($request->content_type, 'image')) {
        $imgExtensions = array("png", "jpeg", "jpg");
        $file = $request->path;
        if (!in_array($file->getClientOriginalExtension(), $imgExtensions)) {
          \Session::flash('failed', 'Image must be jpg, png, or jpeg only !! No updates takes place, try again with that extensions please..');
          return back();
        }
      } else if (!strcmp($request->content_type, 'audio')) {
        $audExtensions = array("mp3", "webm", "wav");
        $file = $request->path;
        if (!in_array($file->getClientOriginalExtension(), $audExtensions)) {
          \Session::flash('failed', 'Audio must be mp3, webm and wav only !! No updates takes place, try again with that extensions please..');
          return back();
        }
      } else if (!strcmp($request->content_type, 'video')) {
        $vidExtensions = array("mp4", "flv", "3gp");
        $file = $request->path;
        if (!in_array($file->getClientOriginalExtension(), $vidExtensions)) {
          \Session::flash('failed', 'Video must be mp4, flv, or 3gp only !! No updates takes place, try again with that extensions please..');
          return back();
        }
      }
    }
    $request->merge([
      'start_date'  => $request->start_date ? date('Y-m-d',strtotime($request->start_date)) : null,
      'expire_date' => $request->expire_date ? date('Y-m-d',strtotime($request->expire_date)) : null
    ]);

    $content = Content::find($id)->update($request->all());

    $request->session()->flash('success', 'Updated Successfully');

    return redirect('content/' . $id);
  }
  /**
   * Remove the specified resource from storage.
   *
   * @param    int $id
   * @return  \Illuminate\Http\Response
   */
  public function destroy($id, Request $request)
  {
    $content = Content::findOrfail($id);
    $content->delete();
    $request->session()->flash('success', 'Deleted Content Successfully');
    return back();
  }

  public function getDownload()
  {
    $file = base_path() . "/contentexcel/content.xlsx";
    //dd($file);
    $headers = array(
      'Content-Type: application/xlsx',
    );
    return response()->download($file, 'content.xlsx', $headers);
  }

  public function search()
  {
    $operators = Operator::all()->pluck('title', 'id');
    $occasions = Occasion::all()->pluck('title', 'id');
    $aggregators = Aggregator::all()->pluck('title', 'id');
    $providers = SecondParties::all()->pluck('second_party_title', 'second_party_id');
    return view('rbt.search', compact('operators', 'occasions', 'aggregators', 'providers'));
  }

  public function search_result(Request $request)
  {
    //return $request['search_field'];
    $rbt_columns = Schema::getColumnListing('rbts');
    $columns = array(
      1 => "track_title_en", 2 => "track_title_ar", 3 => "artist_name_en", 4 => "artist_name_ar",
      5 => "album_name", 6 => "code", 7 => "social_media_code", 8 => "owner", 9 => "from", 10 => "to", 11 => "operator_id", 12 => "occasion_id", 13 => "aggregator_id", 14 => "provider_id", 15 => "type"
    );

    $search_key_value = array();
    foreach ($request['search_field'] as $index => $item) {
      if (strlen($item) == 0)
        continue;
      else {
        if ($index == 9) {
          $item = date("Y-m-d", strtotime($item));
          $search_key_value['from'] = $item;
        } elseif ($index == 10) {
          $item = date("Y-m-d", strtotime($item));
          $search_key_value['to'] = $item;
        } elseif (array_search($columns[$index], $rbt_columns)) {
          $search_key_value[$columns[$index]] = $item;
        }
      }
    }
    $string_query = "";
    $counter = 0;
    $size = count($search_key_value);
    foreach ($search_key_value as $index => $value) {
      $sign = "=";
      if ($index == "to") {
        $sign = "<=";
        $index = "created_at";
      } elseif ($index == "from") {
        $sign = ">=";
        $index = "created_at";
      }

      $counter++;
      if ($counter == $size) {
        $string_query .= "`rbts`.`$index`" . " $sign '$value'";
      } else {
        $string_query .= "`rbts`.`$index`" . " $sign '$value' AND ";
      }
    }

    $select = "SELECT rbts.* , operators.title AS operator_title, second_parties.second_party_title AS provider_title,occasions.title AS occasion_title, aggregators.title AS aggregator_title
                   FROM rbts
                   JOIN providers ON rbts.provider_id = second_parties.second_party_id
                   JOIN aggregators ON rbts.aggregator_id = aggregators.id
                   JOIN operators ON rbts.operator_id = operators.id
                   JOIN occasions ON rbts.occasion_id = occasions.id";



    if (empty($string_query))
      $where = "";
    else
      $where = " WHERE " . $string_query;


    if (Auth::user()->hasRole(['account'])) {
      if ($where) {
        $select  .= " And aggregators.id=" . Auth::user()->aggregator_id;
      } else {
        $select  .= " where aggregators.id=" . Auth::user()->aggregator_id;
      }
    }



    $query = $select . $where;
    $search_result = \DB::select($query);
    return $search_result;
  }

  public function multi_upload()
  {
    return view('content.multi_uploader');
  }
  public function save_tracks(Request $request)
  {
    if (!file_exists('uploads/content/' . date('Y-m-d') . '/')) {
      mkdir('uploads/content/' . date('Y-m-d') . '/', 0777, true);
    }
    $vpb_file_name = strip_tags($_FILES['upload_file']['name']); //File Name
    $vpb_file_id = strip_tags($_POST['upload_file_ids']); // File id is gotten from the file name
    $vpb_file_size = $_FILES['upload_file']['size']; // File Size
    $vpb_uploaded_files_location = 'uploads/content/' . date('Y-m-d') . '/'; //This is the directory where uploaded files are saved on your server

    $vpb_final_location = $vpb_uploaded_files_location . $vpb_file_name; //Directory to save file plus the file to be saved
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
    $operators = Operator::all();
    return view('rbt.statistics', compact('operators'));
  }

  public function get_statistics(Request $request)
  {
    $from_year = $request['duration'][0];
    $from_month = $request['duration'][1];
    $to_year = $request['duration'][2];
    $to_month = $request['duration'][3];
    $operator = $request['duration'][4];
    $num_of_rbts = $request['duration'][5];
    $order_by = " ORDER BY reports.year ASC, reports.month ASC ";
    $operator_query = "";
    $where = "";
    $duration_query = "";
    $num_of_rbts_query = "";
    if ($operator) {
      $where = " WHERE ";
      $operator_query = " reports.operator_id = " . $operator;
    }
    if ($from_month && $from_year && $to_month && $to_year) {
      $where = " WHERE ";
      if ($operator)
        $duration_query = ' AND (reports.year > ' . $from_year . ' OR ( reports.month >= ' . $from_month . ' AND reports.year = ' . $from_year . ')) AND (reports.year < ' . $to_year . ' OR ( reports.month <= ' . $to_month . ' AND reports.year = ' . $to_year . ')) ';
      else
        $duration_query = ' (reports.year > ' . $from_year . ' OR ( reports.month >= ' . $from_month . ' AND reports.year = ' . $from_year . ')) AND (reports.year < ' . $to_year . ' OR ( reports.month <= ' . $to_month . ' AND reports.year = ' . $to_year . ')) ';
    }
    if ($num_of_rbts) {
      $num_of_rbts_query = " LIMIT " . $num_of_rbts . " OFFSET 0";
      $order_by = " ORDER BY reports.revenue_share DESC ";
    } else {
      $num_of_rbts_query = " LIMIT 10 OFFSET 0";
    }
    $query = 'SELECT reports.* , rbts.track_title_en AS rbt_name, operators.title FROM reports JOIN operators ON reports.operator_id = operators.id JOIN rbts ON reports.rbt_id = rbts.id ' .
      $where . $operator_query . $duration_query . $order_by . $num_of_rbts_query;

    $reports = \DB::select($query);
    return $reports;
  }


  public function list_file_system()
  {
    return view('content.file_system');
  }

  public function getContents($provider_id)
  {
    $contents = Content::where('provider_id', $provider_id)->get();
    return $contents;
  }
  public function getTracks($content_id)
  {
    $tracks = Rbt::where('content_id', $content_id)->get();
    return $tracks;
  }

  public function show_rbt($id)
  {
      $title = 'Index - rbt';
      $rbts = Rbt::where('content_id', $id)->get();

      return view('content.rbtindex', compact('rbts', 'title'));
  }



  public function fix_date_for_content(Request $request)
  {
    $fix_date_for_contents = Content::where('start_date','1970-01-01')->where('expire_date','1970-01-01')->get();
    foreach ($fix_date_for_contents as $fix_date_for_content) {
      $fix_date_for_content->start_date = null;
      $fix_date_for_content->expire_date = null;
      $fix_date_for_content->save();
    }
    return "done";
  }


  /**
   * Method getContracts
   *
   * @param Integer $second_party_id
   *
   * @return Contract
   */
  public function getContracts($second_party_id)
  {
    $contracts = Contract::where('second_party_id', $second_party_id)->get();
    return $contracts;
  }

  public function getCreateContentExcel()
  {
    return view('content.create_content_excel');
  }

  public function contentExcelDownloadSample()
  {
    $file = base_path() . "/contentexcel/full_content_excel.xlsx";

    $headers = array(
      'Content-Type: application/xlsx',
    );
    return response()->download($file, 'full_content_excel.xlsx', $headers);
  }

  public function storeContentExcel(Request $request)
  {
    ini_set('max_execution_time', 60000000000);
    ini_set('memory_limit', -1);

    $counter = 0;
    $total_counter = 0;

    if ($request->hasFile('fileToUpload')) {
      $ext =  $request->file('fileToUpload')->getClientOriginalExtension();
      if ($ext != 'xls' && $ext != 'xlsx' && $ext != 'csv') {
        $request->session()->flash('failed', 'File must be excel');
        return back();
      }

      $file = $request->file('fileToUpload');
      $filename = time() . '_' . $file->getClientOriginalName();
      if (!$file->move(base_path() . '/uploads/content/excel',  $filename)) {
        return back();
      }

      \Excel::filter('chunk')->load(base_path() . '/uploads/content/excel/' . $filename)->chunk(100, function ($results) use ($request, $counter, $total_counter) {
        foreach ($results as $row) {
          $total_counter++;

          //get occasions id
          $occasion_id = $this->getOccasionId($row->occassion);


          //get provider id
          $check_provider = SecondParties::where('second_party_title', 'LIKE', '%' . $row->artist_name_en . '%')->first();
          if ($check_provider) {
            $provider_id = $check_provider->second_party_id;
          } else {
            $prov = array();
            $prov['second_party_title'] = $row->artist_name_en;
            $prov['second_party_title_ar'] = $row->artist_name_ar;
            $prov['second_party_type_id'] = PROVIDER_ID;
            $prov['gender'] = $row->gender;
            $prov['artist_code'] = 'Ar/' . date('Y') . "/" . date('m') . "/" . date('d') . "/" . uniqid();
            $create = SecondParties::create($prov);
            $provider_id = $create->second_party_id;
          }

          //get Contract id
          if (isset($row->contract_code) &&  $row->contract_code != "") {
            $check_contract = Contract::where('contract_code', 'LIKE', '%' . trim($row->contract_code) . '%')->first();
            if ($check_contract) {
              $contract_id = $check_contract->id;
            } else {
              $contract_id = NULL;
            }
          } else {
            $contract_id = NULL;
          }

          //Check Content
          $ckeck_content = Content::where(['provider_id' => $provider_id, 'content_title' => $row->content_title_en])->first();

          if (!isset($ckeck_content) || $ckeck_content == null) {
            //get Excel Data
            $content_data['content_title'] = $row->content_title_en;
            $content_data['content_title_ar'] = $row->content_title_ar;
            $content_data['content_type'] = $row->content_type;
            $content_data['internal_coding'] = 'Co/' . date('Y') . "/" . date('m') . "/" . date('d') . "/" . uniqid();
            $content_data['provider_id'] = $provider_id;
            $content_data['occasion_id'] = $occasion_id;
            $content_data['occasion_2_id'] = $this->getOccasionId($row->occassion_2);
            $content_data['occasion_3_id'] = $this->getOccasionId($row->occassion_3);
            $content_data['contract_id'] = $contract_id;
            $content_data['user_id'] = \Auth::user()->id;
            $content_data['path'] = "uploads/content/" . date('Y-m-d') . "/" . $row->content_path;
            $content_data['start_date'] =  $row->content_start_date ? transformDate($row->content_start_date) : null;
            $content_data['expire_date'] =  $row->content_expire_date ? transformDate($row->content_expire_date) : null;
            $content_data['album'] = isset($row->album) && $row->album != null ? $row->album : $row->single;
            $content_data['category'] = $row->category;
            $content = content::create($content_data);

            $counter++;
          } else {
            if (strpos($ckeck_content, $row->content_path) == false) {
              $ckeck_content->path = "uploads/content/" . date('Y-m-d') . "/" . $row->content_path;
            }
            $ckeck_content->start_date = $row->content_start_date ? transformDate($row->content_start_date) : null;
            $ckeck_content->expire_date = $row->content_expire_date ? transformDate($row->content_expire_date) : null;
            $ckeck_content->album = isset($row->album) && $row->album != null ? $row->album : $row->single;
            $ckeck_content->category = $row->category;
            $ckeck_content->save();

            $content = $ckeck_content;
          }

          $this->storeRBT($row, $content->id, $provider_id, $occasion_id);

          if (!file_exists('uploads/content/' .  date('Y-m-d') . '/')) {
            mkdir('uploads/content/' . date('Y-m-d') . '/', 0777, true);
          }
        }

        $failures = $total_counter - $counter;
        $request->session()->flash('success', $counter . ' item(s) created successfully, and ' . $failures . ' item(s) failed and Please upload Content on this path uploads/content/ ' . date('Y-m-d'));
      }, false);
    } else {
      $request->session()->flash('failed', 'Excel file is required');
      return back();
    }
    return redirect('content');
  }

  private function getOccasionId($occasion, $country = null)
  {
    $occasion_id = NULL;

    if (isset($occasion) &&  $occasion != "") {
      $check_occasion = Occasion::where('title', 'LIKE', '%' . $occasion . '%')->first();
      if ($check_occasion) {
        $occasion_id = $check_occasion->id;
      } else {
        $occ = array();
        $occ['title'] = $occasion;
        $country = Country::where('title', 'LIKE', "%$country%")->first();
        $occ['country_id'] = $country->id ?? all_countries();
        $create = Occasion::create($occ);
        $occasion_id = $create->id;
      }
    }

    return $occasion_id;
  }


  private function storeRBT($row, $content_id, $provider_id, $occasion_id)
  {
    $excel_rbt_codes = get_excel_rbt_codes($row);
    if (isset($excel_rbt_codes) && count($excel_rbt_codes) > 0) {
      foreach ($excel_rbt_codes as $code) {
        $operator_id = $code['operator_id'];
        $operator_rbt_code = $code['operator_rbt_code'];
        $rbt = Rbt::where(['operator_id' => $operator_id, 'code' => $operator_rbt_code])->first();
        if (!isset($rbt) || $rbt == null) {
          $rbt['track_title_en'] = $row->rbt_name_en;
          $rbt['track_title_ar'] = $row->rbt_name_ar;
          $rbt['artist_name_en'] = $row->artist_name_en;
          $rbt['artist_name_ar'] = $row->artist_name_ar;
          $rbt['album_name'] = isset($row->album) && $row->album != null ? $row->album : $row->single;
          $rbt['code'] = $operator_rbt_code;
          $rbt['social_media_code'] = $row->social_media_code;
          $rbt['owner'] = $row->artist_name_en;
          $rbt['track_file'] = "uploads/rbts/" . date('Y-m-d') . "/" . $rbt['track_title_en'] . ".wav";
          $rbt['operator_id'] = $operator_id;
          $rbt['occasion_id'] = $occasion_id;
          $rbt['aggregator_id'] = $this->getAggregatorID($row->aggregator);
          $rbt['type'] = 2;
          $rbt['provider_id'] = $provider_id;
          $rbt['content_id'] = $content_id;
          $rbt['internal_coding'] = 'Rb/' . date('Y') . "/" . date('m') . "/" . date('d') . "/" . uniqid();
          $rbt['start_date'] = $row->rbt_start_date ? transformDate($row->rbt_start_date) : null;
          $rbt['expire_date'] = $row->rbt_expire_date ? transformDate($row->rbt_expire_date) : null;

          $new_rbt = Rbt::create($rbt);
          if ($new_rbt) {
            if (!file_exists('uploads/rbts/' .  date('Y-m-d') . '/')) {
              mkdir('uploads/rbts/' . date('Y-m-d') . '/', 0777, true);
            }
          }
        }
      }
    }

    return true;
  }

  private function getAggregatorID($aggregator_title)
  {
    $aggregator = Aggregator::where('title', $aggregator_title)->first();

    return isset($aggregator) && $aggregator != null ? $aggregator->id : null;
  }

  public function exportContentExcel()
  {
    return view('content.export_content_excel');
  }

  public function downloadContentExcel()
  {
    ini_set('memory_limit', -1);
    ini_set('max_execution_time', 60000000000);

    $data = $this->getExcelData();
    $excel_title = date("d-m-Y");

    return Excel::create($excel_title, function ($excel) use ($data) {
      $excel->sheet('mySheet', function ($sheet) use ($data) {
        //create excel header
        $header_columns = $this->createExcelFirstRow();
        foreach ($header_columns as $column) {
          $sheet->cell($column['excel_row_position_key'], function ($cell) use ($column) {
            $cell->setValue($column['excel_row_position_value']);
          });
        }

        if (!empty($data)) {
          $column_id = 1;
          foreach ($data as $key => $value) {
            $i = $key + 2;

            //create Excel Colums
            $excel_row_columns = $this->createExcelData($i, $column_id, $value);
            foreach ($excel_row_columns as $column) {
              $sheet->cell($column['excel_row_position_key'], $column['excel_row_position_value']);
            }

            $column_id++;
          }
        }
      });
    })->download('xlsx');
  }

  private function createExcelFirstRow()
  {
    $first_row = [];

    //header row keys initial array
    $letters = $this->getLetters();

    //static header row values
    $row_values = [
      'ID',
      'Contract Code',
      'Contract Start Date',
      'Contract Expiry Date',
      'Artist Name En',
      'Artist Name Ar',
      'Gender',
      'Artist Code',
      'Content Title En',
      'Content Title Ar',
      'Content Path',
      'Content Type',
      'Remax',
      'Content Internal Coding',
      'Content Start Date',
      'Content Expire Date',
      'Album',
      'Category',
      'Occasion',
      'Occasion 2',
      'Occasion 3',
      'RBT Name En',
      'RBT Name Ar',
      'RBT Start Date',
      'RBT Expiry Date',
      'RBT Internal Code'
    ];

    //append operators to row values
    $operators = operators();
    foreach ($operators as $key => $value) {
      array_push($row_values, $key);
    }

    //create excel header
    foreach ($row_values as $key => $value) {
      array_push($first_row, ['excel_row_position_key' => $letters[$key] . '1', 'excel_row_position_value' => trim($value)]);
    }

    return $first_row;
  }

  private function createExcelData($i, $column_id, $value)
  {
    $new_excel_row_data = [];

    $letters = $this->getLetters();

    //static header row values
    $row_values = [
      $column_id,
      $value->contract_code,
      $this->formateDate($value->contract_start_date),
      $this->formateDate($value->contract_expiry_date),
      $value->artist_name_en,
      $value->artist_name_ar,
      $value->gender,
      $value->artist_code,
      $value->content_title_en,
      $value->content_title_ar,
      $this->getContent($value->content_path),
      $value->content_type,
      $value->remax == 0 ? 'No' : 'Yes',
      $value->content_internal_coding,
      $this->formateDate($value->content_start_date),
      $this->formateDate($value->content_expire_date),
      $value->content_album,
      $value->content_category,
      $value->occasion_title,
      $value->occasion_2_title,
      $value->occasion_3_title,
      $value->rbt_track_title_en,
      $value->rbt_track_title_ar,
      $this->formateDate($value->rbt_start_date),
      $this->formateDate($value->rbt_expire_date),
      $value->rbt_internal_coding
    ];

    //append operators to row values
    $operators = operators();
    foreach ($operators as $key => $operator_value) {
      $key == $value->operator_title ? array_push($row_values, trim($value->rbt_code)) : array_push($row_values, null);
    }

    //create excel header
    foreach ($row_values as $key => $row_value) {
      array_push($new_excel_row_data, ['excel_row_position_key' => $letters[$key] . $i, 'excel_row_position_value' => $row_value]);
    }

    return $new_excel_row_data;
  }

  private function getLetters()
  {
    $letters = [];

    for ($letter = 'A'; $letter < 'ZZ'; $letter++) {
      array_push($letters, $letter);
    }

    return $letters;
  }

  private function getExcelData()
  {
    $data = Contract::select(
      'contracts.id as contract_id',
      'contracts.contract_code as contract_code',
      'contracts.contract_date as contract_start_date',
      'contracts.contract_expiry_date as contract_expiry_date',
      'second_parties.second_party_title as artist_name_en',
      'second_parties.second_party_title_ar as artist_name_ar',
      'second_parties.gender as gender',
      'second_parties.artist_code as artist_code',
      'contents.id as content_id',
      'contents.content_title as content_title_en',
      'contents.content_title_ar as content_title_ar',
      'contents.path as content_path',
      'contents.content_type as content_type',
      'contents.remax as remax',
      'contents.internal_coding as content_internal_coding',
      'contents.start_date as content_start_date',
      'contents.expire_date as content_expire_date',
      'contents.album as content_album',
      'contents.category as content_category',
      'occasions.title as occasion_title',
      'occasion_2.title as occasion_2_title',
      'occasion_3.title as occasion_3_title',
      'rbts.id as rbt_id',
      'rbts.track_title_en as rbt_track_title_en',
      'rbts.track_title_ar as rbt_track_title_ar',
      'rbts.code as rbt_code',
      'rbts.internal_coding as rbt_internal_coding',
      'rbts.start_date as rbt_start_date',
      'rbts.expire_date as rbt_expire_date',
      'rbts.operator_id as rbt_operator_id',
      'operators.title as operator_title'
    )
      ->join('contents', 'contents.contract_id', '=', 'contracts.id')
      ->join('occasions', 'occasions.id', '=', 'contents.occasion_id')
      ->leftjoin('occasions as occasion_2', 'occasion_2.id', '=', 'contents.occasion_2_id')
      ->leftjoin('occasions as occasion_3', 'occasion_3.id', '=', 'contents.occasion_3_id')
      ->join('rbts', 'rbts.content_id', '=', 'contents.id')
      ->join('second_parties', 'second_parties.second_party_id', '=', 'rbts.provider_id')
      ->join('operators', 'operators.id', '=', 'rbts.operator_id')
      ->get();

    return $data;
  }

  private function getContent($content)
  {
    $last_index = strrpos($content, '/') + 1;

    $content = substr($content, $last_index);

    return $content;
  }

  private function formateDate($date)
  {
    return isset($date) && $date != null ? \Carbon\Carbon::parse($date)->format('Y-m-d') : null;
  }

}
