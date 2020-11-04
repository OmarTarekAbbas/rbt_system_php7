<?php

namespace App\Http\Controllers;

use App\Country;
use App\Roadmap;
use App\Provider;
use App\Aggregator;
use App\SecondParties;
use Illuminate\Http\Request;
use App\Http\Requests\RoadmapStoreRequest;

class RoadMapController extends Controller
{
  public function index()
  {
      $title = 'Index - Roadmap';
      $roadmaps = Roadmap::all();
      return view('roadmap.index', compact('roadmaps', 'title'));
  }

  public function allData(Request $request)
  {
      //$roadmaps = Roadmap::all();

      $roadmaps = Roadmap::select('*','roadmaps.id AS roadmap_id','occasions.title as occasion','countries.title as country','operators.title as operator','aggregators.title as aggregator')
      ->join('occasions','occasions.id','=','roadmaps.occasion_id')
      ->join('countries','countries.id','=','roadmaps.country_id')
      ->join('operators','operators.id','=','roadmaps.operator_id')
      ->join('aggregators','aggregators.id','=','roadmaps.aggregator_id')
      ->groupBy('roadmap_id')
      ->get();
      $datatable = \Datatables::of($roadmaps)
          ->addColumn('index', function (Roadmap $roadmap) {
              return '<input class="select_all_template" type="checkbox" name="selected_rows[]" value="{{$roadmap->roadmap_id}}" class="roles" onclick="collect_selected(this)">';
          })
          ->addColumn('id', function (Roadmap $roadmap) {
              return $roadmap->roadmap_id;
          })
          ->addColumn('event_title', function (Roadmap $roadmap) {
              return $roadmap->event_title;
          })
          ->addColumn('event_color', function (Roadmap $roadmap) {
              return "<div class='text-center' style='width: 42%;height: 19px;font-size:12px;font-weight:bolder;background-color: {$roadmap->event_color};color: #fff;'>Color</div>";
          })
          ->addColumn('aggregator', function (Roadmap $roadmap) {
              if ($roadmap->aggregator)
                  return $roadmap->aggregator;
              else
                  return '--';
          })
          ->addColumn('occasion', function (Roadmap $roadmap) {
              if ($roadmap->occasion)
                  return $roadmap->occasion;
              else
                  return '--';
          })
          ->addColumn('operator', function (Roadmap $roadmap) {
              if ($roadmap->operator)
                  return $roadmap->operator;
              else
                  return '--';
          })
          ->addColumn('country', function (Roadmap $roadmap) {
              if ($roadmap->country)
                  return $roadmap->country;
              else
                  return '--';
          })
          ->addColumn('event_start_date', function (Roadmap $roadmap) {
            return $roadmap->event_start_date->format('Y-m-d');
          })
          ->addColumn('event_end_date', function (Roadmap $roadmap) {
            return $roadmap->event_end_date->format('Y-m-d');
          })
          ->addColumn('action', function (Roadmap $roadmap) {
              return '<td class="visible-md visible-lg">
                          <div class="btn-group">
                              <a class="btn btn-sm show-tooltip btn-primary" href="' . url("roadmaps/" . $roadmap->roadmap_id) . '" title="view"><i class="fa fa-eye"></i></a>
                              <a class="btn btn-sm show-tooltip" href="' . url("roadmaps/" . $roadmap->roadmap_id . "/edit") . '" title="Edit"><i class="fa fa-edit"></i></a>
                              <a class="btn btn-sm show-tooltip btn-danger" onclick="return ConfirmDelete();" href="' . url("roadmaps/" . $roadmap->roadmap_id . "/delete") . '" title="Delete"><i class="fa fa-trash"></i></a>
                          </div>
                      </td>';
          })

          ->escapeColumns([])
          ->make(true);

      return $datatable;
  }

  public function show($id)
  {
    $emails = explode(',', setting('action_roadmap_emails'));

    $roadmap = Roadmap::find($id);

    return view('roadmap.show', compact('roadmap', 'emails'));
  }

    public function create()
    {
        $countries = all_country();
        $aggregators = Aggregator::all()->pluck('title','id');
        $providers = SecondParties::all()->pluck('second_party_title','second_party_id');

        return view('roadmap.create',compact('countries','aggregators','providers'));
    }

    public function store(RoadmapStoreRequest $request)
    {
        $request = array_merge($request->validated(),[
            'entry_by'  => auth()->id(),
            'event_start_date' => date('Y-m-d',strtotime($request->event_start_date)),
            'event_end_date' => date('Y-m-d',strtotime($request->event_end_date)),
            'content_track_ids' => array_values($request['content_track_ids'])
        ]);

        // return $request;

        $roadMap = Roadmap::create($request);

        if (isset($request['provider_id'])) {
            foreach ($request['provider_id'] as $key => $value) {
                $roadMap->providers()->attach([$value => ['content_id' => $request['content_id'][$key], 'rbt_track_specs' => implode(',',$request['content_track_ids'][$key]) ] ]);
            }
        }

        return redirect('roadmaps/calendar/index');
    }

    public function edit($id)
    {
        $roadmap = Roadmap::find($id);
        $countries = all_country();
        $aggregators = Aggregator::all()->pluck('title','id');
        $providers = Provider::all()->pluck('title','id');
        return view('roadmap.edit',compact('countries','aggregators','providers','roadmap'));
    }

    public function update($id,RoadmapStoreRequest $request)
    {
        $roadmap = Roadmap::find($id);

        $request = array_merge($request->validated(),[
            'entry_by'  => auth()->id(),
            'event_start_date' => date('Y-m-d',strtotime($request->event_start_date)),
            'event_end_date' => date('Y-m-d',strtotime($request->event_end_date)),
            'content_track_ids' => array_values($request['content_track_ids'])
        ]);

        //return $request;

        $roadMap = tap($roadmap, function($roadmap) use ($request){
            $roadmap->update($request);
        });

        $roadMap->providers()->detach();

        if (isset($request['provider_id'])) {
          foreach ($request['provider_id'] as $key => $value) {
            if(isset($request['content_track_ids'][$key]))
              $roadMap->providers()->attach([$value => ['content_id' => $request['content_id'][$key], 'rbt_track_specs' => implode(',',$request['content_track_ids'][$key]) ] ]);
          }
      }

        return redirect('roadmaps/calendar/index');
    }

    public function destroy($id)
    {
        $roadmap = Roadmap::find($id);

        $roadmap->delete();

        return back();
    }

    public function calendarIndex()
    {
        $events = Roadmap::all();
        $event = [];
        foreach($events as $row) {
            $end_date = $row->event_end_date. "24:00:00";
            $event[] = \Calendar::event(
                $row->event_title,
                true,
                new \DateTime($row->event_start_date),
                new \DateTime($row->event_end_date),
                $row->id,
                [
                    'color' => $row->event_color,
                    'url' => url('roadmaps/' .$row->id . '/edit')
                ]
            );
        }

        $calendar = \Calendar::addEvents($event)->setOptions([
            // 'theme' => true
        ]);

        return view('roadmap.calendar',compact('calendar'));
    }
}
