<?php

namespace App\Http\Controllers;

use App\Aggregator;
use App\Country;
use App\Provider;
use App\Roadmap;
use App\Http\Requests\RoadmapStoreRequest;
use Illuminate\Http\Request;

class RoadMapController extends Controller
{
    public function index(Request $request)
    {
        $roadmaps = Roadmap::all();
        return view('roadmap.index',compact('roadmaps'));
    }

    public function create()
    {
        $countries = Country::all()->pluck('title','id');
        $aggregators = Aggregator::all()->pluck('title','id');
        $providers = Provider::all()->pluck('title','id');
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

        return redirect('roadmaps');
    }

    public function edit($id)
    {
        $roadmap = Roadmap::find($id);
        $countries = Country::all()->pluck('title','id');
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
            'event_end_date' => date('Y-m-d',strtotime($request->event_end_date))
        ]);

        //return $request;

        $roadMap = tap($roadmap, function($roadmap) use ($request){
            $roadmap->update($request);
        });

        // if ($request->has('provider_id')) {
        //     foreach ($request->provider_id as $key => $value) {
        //         $roadmap->providers->sync([$value => ['content_id' => $request->content_id[$key], 'rbt_track_specs' => implode(',',$request->content_track_ids[$key]) ] ]);
        //     }
        // }

        return redirect('roadmaps');
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
