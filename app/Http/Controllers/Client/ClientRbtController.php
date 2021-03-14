<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Rbt;
use Illuminate\Http\Request;

class ClientRbtController extends Controller
{
    public function index()
    {
        $title = 'Index - Content';
        $rbts  = Rbt::all();
        return view('client.rbt.index',compact('rbts','title'));
    }

    public function allData(Request $request)
    {

        $rbts = Rbt::select('*','rbts.id AS rbt_id','second_parties.second_party_title as provider','occasions.title as occasion','operators.title as operator','aggregators.title as aggregator','contents.content_title as content','rbts.internal_coding as rbt_internal_coding')
        ->join('second_parties','second_parties.second_party_id','=','rbts.provider_id')
        ->join('occasions','occasions.id','=','rbts.occasion_id')
        ->join('operators','operators.id','=','rbts.operator_id')
        ->join('aggregators','aggregators.id','=','rbts.aggregator_id')
        ->join('contents','contents.id','=','rbts.content_id')
        ->where('second_parties.second_party_id',session()->get('client')->second_party_id);

        if($request->filled('content_id')) {
          $rbts = $rbts->where('contents.id', $request->content_id);
        }

        $rbts = $rbts->latest('rbts.id')->get();

        $datatable = \Datatables::of($rbts)
            ->addColumn('index', function (Rbt $rbt) {
                return '<input class="select_all_template" type="checkbox" name="selected_rows[]" value="'.$rbt->rbt_id.'" class="roles" onclick="collect_selected(this)">';
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
                    return '<a  href="' . url("content/$rbt->content_id") . '" >' . $rbt->content . '</a>';
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
                    return view('client.rbt.actions', compact('rbt'))->render();
            })

            ->escapeColumns([])
            ->make(true);

        return $datatable;
    }

    public function show($id)
    {
        $rbt = Rbt::select('*','rbts.start_date','rbts.expire_date','rbts.id AS rbt_id','providers.title as provider','occasions.title as occasion','operators.title as operator','aggregators.title as aggregator','contents.content_title as content','rbts.internal_coding as rbt_internal_coding')
        ->join('second_parties','second_parties.second_party_id','=','rbts.provider_id')
        ->join('providers','providers.id','=','rbts.provider_id')
        ->join('occasions','occasions.id','=','rbts.occasion_id')
        ->join('operators','operators.id','=','rbts.operator_id')
        ->join('aggregators','aggregators.id','=','rbts.aggregator_id')
        ->join('contents','contents.id','=','rbts.content_id')
        ->where('rbts.id', $id)
        ->where('second_parties.second_party_id',session()->get('client')->second_party_id)
        ->first();
        // dd($rbt);
        return view('client.rbt.show',compact('rbt'));
    }

  }
