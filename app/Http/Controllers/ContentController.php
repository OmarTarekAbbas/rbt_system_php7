<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use App\Content;
use App\Occasion;
use App\Provider;
use App\Rbt;
use App\Contract;
use App\Country;
use Illuminate\Http\Request;

class ContentController extends Controller
{
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
    $contents = Content::select('*', 'contents.id AS content_id', 'providers.title as provider', 'occasions.title as occasion', 'contracts.contract_code as contract_code', 'contracts.id as contract_id')
      ->join('providers', 'providers.id', '=', 'contents.provider_id')
      ->join('occasions', 'occasions.id', '=', 'contents.occasion_id')
      ->leftjoin('contracts', 'contracts.id', '=', 'contents.contract_id')
      ->get();
    $datatable = \Datatables::of($contents)
      ->addColumn('index', function (Content $content) {
        return '<input class="select_all_template" type="checkbox" name="selected_rows[]" value="{{$content->id}}" class="roles" onclick="collect_selected(this)">';
      })
      ->addColumn('id', function (Content $content) {
        return $content->content_id;
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
          return '<a  href="' . url("fullcontracts/$content->contract_id") . '" >' . $content->contract_code . '/' . $content->contract_label . '</a>';
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
        return '<td class="visible-md visible-lg">
                            <div class="btn-group">
                                <a class="btn btn-sm btn-info show-tooltip" title="list traks" href="' . url("content/$content->content_id/rbts") . '" ><i class="fa fa-music"></i></a>
                                <a class="btn btn-sm btn-primary show-tooltip " href="' . url("content/" . $content->content_id) . '" title="Show"><i class="fa fa-eye"></i></a>
                                <a class="btn btn-sm btn-success show-tooltip" title="" href="' . url("rbt/excel?content_id=" . $content->content_id) . '" ><i class="fa fa-plus"></i></a>
                                <a class="btn btn-sm show-tooltip" href="' . url("content/" . $content->content_id . "/edit") . '" title="Edit"><i class="fa fa-edit"></i></a>
                                <a class="btn btn-sm show-tooltip btn-danger" onclick="return ConfirmDelete();" href="' . url("content/" . $content->content_id . "/delete") . '" title="Delete"><i class="fa fa-trash"></i></a>
                            </div>
                        </td>';
      })

      ->escapeColumns([])
      ->make(true);

    return $datatable;
  }

  public function create()
  {
    $title = 'Create - Content';
    $occasions = Occasion::all()->pluck('title', 'id');
    $providers = Provider::all()->pluck('title', 'id');
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
    $content->start_date = date('Y-m-d',strtotime($request->start_date)) ;
    $content->expire_date= date('Y-m-d',strtotime($request->expire_date)) ;
    send_notification('Add New Content You Can Follow It From This Link', 'Operation', $content);
    //dd($content->save());
    $content->save();
    $request->session()->flash('success', 'Add Content Successfully');

    return redirect('content/' . $content->id);
  }

  public function show($id)
  {
    $content  = content::find($id);
    $provider = DB::table('providers')->where('id', $content->provider_id)->first();
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
    $providers = Provider::all()->pluck('title', 'id');
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
          $check_provider = Provider::where('title', 'LIKE', '%' . $row->content_owner . '%')->first();
          if ($check_provider) {
            $provider_id = $check_provider->id;
          } else {
            $prov = array();
            $prov['title'] = $row->content_owner;
            $create = Provider::create($prov);
            $provider_id = $create->id;
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
          $content_data['start_date'] = transformDate($row->start_date) ;
          $content_data['expire_date']= transformDate($row->expire_date) ;
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
    $providers = Provider::all()->pluck('title', 'id');
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
      'start_date'  => date('Y-m-d',strtotime($request->start_date)),
      'expire_date' => date('Y-m-d',strtotime($request->expire_date))
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
    $providers = Provider::all()->pluck('title', 'id');
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

    $select = "SELECT rbts.* , operators.title AS operator_title, providers.title AS provider_title,occasions.title AS occasion_title, aggregators.title AS aggregator_title
                   FROM rbts
                   JOIN providers ON rbts.provider_id = providers.id
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

}
