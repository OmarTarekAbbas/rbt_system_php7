<?php

namespace App\Http\Controllers\Client;

use App\Content;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientContentController extends Controller
{
  public function index()
  {
    $title = 'Index - Content';
    $contents = Content::all();
    return view('client.content.index', compact('contents', 'title'));
  }

  public function allData(Request $request)
  {
    $contents = Content::select('*', 'contents.id AS id', 'second_parties.second_party_title as provider', 'occasions.title as occasion', 'contracts.contract_code as contract_code', 'contracts.id as contract_id')
    ->join('second_parties', 'second_parties.second_party_id', '=', 'contents.provider_id')
    ->join('occasions', 'occasions.id', '=', 'contents.occasion_id')
    ->leftjoin('contracts', 'contracts.id', '=', 'contents.contract_id')
    ->where('second_parties.second_party_id',session()->get('client')->second_party_id);

    if($request->has('contract_id')){
      $contents = $contents->where('contents.contract_id', $request->contract_id)
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
          return '<a  href="' . url("client/contracts/$content->contract_id") . '" >' . $content->contract_code . '</a>';
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
          return view('client.content.actions', compact('content'));
      })

      ->escapeColumns([])
      ->make(true);

    return $datatable;
  }

  public function show($id)
  {
    $content  = content::find($id);
    $provider = \DB::table('second_parties')->where('second_party_id', $content->provider_id)->first();
    $occasion = \DB::table('occasions')->where('id', $content->occasion_id)->first();
    $contract = \DB::table('contracts')->where('id', $content->contract_id)->first();
    $rbts     = \DB::table('rbts')->where('content_id', $id)->get();
    $occasionRbt = "";
    $aggregator_id = "";
    foreach($rbts as $rbt){
      $occasionRbt = \DB::table('occasions')->where('id', $rbt->occasion_id)->first(['title']);
    }
    foreach($rbts as $rbt){
      $aggregator_id = \DB::table('aggregators')->where('id', $rbt->aggregator_id)->first(['title']);
    }

    //dd($aggregator_id);
    return view('client.content.view', compact('content', 'provider', 'occasion', 'contract', 'rbts','occasionRbt','aggregator_id'));
  }
}
