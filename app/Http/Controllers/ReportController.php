<?php

namespace App\Http\Controllers;

use App\Occasion;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Report;

use Illuminate\Support\Facades\Schema;
use URL;

use App\Currency;


use App\Type;
use App\Operator;
use App\Provider;
use App\Aggregator;
use App\Filters\Report\AggregatorFilter;
use App\Filters\Report\ContractFilter;
use App\Filters\Report\MonthFilter;
use App\Filters\Report\OperatorFilter;
use App\Filters\Report\RbtCodeFilter;
use App\Filters\Report\RbtTitleFilter;
use App\Filters\Report\SecondPartyFilter;
use App\Filters\Report\YearFilter;
use Validator;
use Excel;
use App\Rbt;
use App\SecondParties;
use Auth;

/**
 * Class ReportController.
 *
 * @author  The scaffold-interface created at 2017-08-02 09:28:53am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class ReportController extends Controller
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
    public function index()
    {
        $title = 'Index - report';
        if (Auth::user()->hasRole(['super_admin', 'admin', 'ceo'])) {
            $reports = Report::all();
        } else {
            $reports = Report::where('aggregator_id', Auth::user()->aggregator_id)->get();
        }

        return view('report.index', compact('reports', 'title'));
    }

    public function allData (Request $request)
    {

      $title = 'Index - report';
        if (get_action_icons('report','get')) {
            $reports = Report::with('operator')->get();
        } else {
            $reports = Report::where('aggregator_id', Auth::user()->aggregator_id)->with('operator')->get();
        }
        $datatable = \Datatables::of($reports)
            ->addColumn('index', function (Report $report) {
                return '<input class="select_all_template" type="checkbox" name="selected_rows[]" value="'.$report->id.'" class="roles" onclick="collect_selected(this)">';
            })
            ->addColumn('rbt_id', function (Report $report) {
                return $report->rbt_id;
            })
            ->addColumn('rbt_name', function (Report $report) {
              return $report->rbt_name;
          })
            ->addColumn('year', function (Report $report) {
              return $report->year;
          })
            ->addColumn('month', function (Report $report) {
                return $report->month;
            })
            ->addColumn('code', function (Report $report) {
                return $report->code;
            })
            ->addColumn('classification', function (Report $report) {
              return $report->classification ? $report->classification : '---';
            })
            ->addColumn('download_no', function (Report $report) {
              return $report->download_no ? $report->download_no : '---';
            })
            ->addColumn('total_revenue', function (Report $report) {
              return $report->total_revenue;
            })
            ->addColumn('revenue_share', function (Report $report) {
              return $report->revenue_share;
            })
            ->addColumn('second_party_id', function (Report $report) {
              return $report->second_party_id ? $report->provider->second_party_title : '---';
            })
            ->addColumn('operator_id', function (Report $report) {
              return $report->operator_id ? $report->operator->title : '---';
            })
            ->addColumn('aggregator_id', function (Report $report) {
              return $report->aggregator_id ? $report->aggregator->title : '---';
            })

            ->addColumn('action', function (Report $report) {
                    return view('report.actions', compact('report'));
            })

            ->escapeColumns([])
            ->make(true);

        return $datatable;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create - report';

        $operators = Operator::all();
        $second_partys = SecondParties::all()->pluck('second_party_title', 'second_party_id');
        $aggregators = Aggregator::all()->pluck('title', 'id');


        return view('report.create', compact('operators', 'second_partys', 'aggregators'));
    }

    public function excel()
    {
        $title = 'Create - report';

        $operators = Operator::all();
        $second_partys = SecondParties::all()->pluck('second_party_title', 'second_party_id');
        $aggregators = Aggregator::all()->pluck('title', 'id');

        return view('report.excel', compact('operators', 'second_partys', 'aggregators'));
    }

    public function excelStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'operator_id' => 'required',
            'year' => 'required',
            'month' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        ini_set('max_execution_time', 60000000000);
        ini_set('memory_limit', -1);

        $successful_creations = 0;
        $total_reports = 0;
        if ($request->hasFile('fileToUpload')) {
            $ext =  $request->file('fileToUpload')->getClientOriginalExtension();
            if ($ext != 'xls' && $ext != 'xlsx' && $ext != 'csv') {
                $request->session()->flash('failed', 'File must be excel');
                return back();
            }

            $file = $request->file('fileToUpload');
            $filename = time() . '_' . $file->getClientOriginalName();
            if (!$file->move(base_path() . '/uploads/report/excel',  $filename)) {
                return back();
            }

            Excel::filter('chunk')->load(base_path() . '/uploads/report/excel/' . $filename)->chunk(5, function ($results) use ($request, &$total_reports, &$successful_creations) {
                //  dd($results);
                $total_reports = count($results);
                foreach ($results as $row) {
                    $report['year'] = $request->year;
                    $report['month'] = $request->month;
                    $report['operator_id'] = $request->operator_id;
                    if ($request->aggregator_id != "") {
                        $report['aggregator_id'] = $request->aggregator_id;
                    }


                    $report['classification'] = $row->classification;
                    if ($row->code != "") {  // if you write rbt code only
                        $report['code'] = $row->code;

                        $rbt = Rbt::where([['code', $row->code], ['operator_id', $request->operator_id]])->first(); // see if this rbt code found before for the same operator
                        if ($rbt == null) { // this rbt not found
                            //dd($report);

                            continue;
                        }
                        // old report for the rbt code in the same operator
                        $old_report =   Report::where([['operator_id', $rbt->operator_id], ['second_party_id', $rbt->second_party_id], ['code', $rbt->code]])->where('year', $request->year)->where('month', $request->month)->first();
                        if ($old_report) {
                            continue;
                        }

                        $report['rbt_name'] = $rbt->track_title_en;
                        $report['rbt_id'] = $rbt->id;
                        $report['second_party_id'] = $rbt->provider_id;
                    } elseif ($row->code == "" && $row->track_name != "" && $row->artist_name != "") { // if you write rbt name + second_party name

                        $second_party = SecondParties::where('second_party_title', $row->artist_name)->first();
                        if (!$second_party) {
                            continue;
                        }
                        $rbt = Rbt::where([['operator_id', $request->operator_id], ['provider_id', $second_party->second_party_id], ['track_title_en', $row->track_name]])->first();

                        if ($rbt == null) {
                            continue;
                        }
                        $report['code'] = $rbt->code;
                        $report['rbt_name'] = $rbt->track_title_en;
                        $report['rbt_id'] = $rbt->id;
                        $report['second_party_id'] = $rbt->provider_id;
                    } else {
                        continue;
                    }
                    $report['contract_id']   = $rbt->content->contract->id;
                    $report['download_no']   = $row->download_number;
                    $report['total_revenue'] = $row->total_revenue;
                    $report['revenue_share'] = $row->revenue_share;
                    $report['your_revenu']   = $rbt->content->contract->first_party_select  ?  ($row->revenue_share * ($rbt->content->contract->first_party_percentage/100)) :  ($row->revenue_share * ($rbt->content->contract->second_party_percentage/100));

                    $report['client_revenu'] = !$rbt->content->contract->first_party_select ?  ($row->revenue_share * ($rbt->content->contract->first_party_percentage/100)) :  ($row->revenue_share * ($rbt->content->contract->second_party_percentage/100));
                    $check = Report::create($report);
                    // dd($check);
                    if ($check)
                        $successful_creations++;
                }
            }, false);
        } else {
            $request->session()->flash('failed', 'Excel file is required');
            return back();
        }
        $remaining = $total_reports - $successful_creations;
        $request->session()->flash('success', $successful_creations . ' items created successfuly, ' . $remaining . ' failed to be created');
        return redirect('report');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'year' => 'required',
            'month' => 'required',
            'second_party_id' => 'required',
            'operator_id' => 'required',
            'classification' => 'required',
            'code' => 'required',
            'rbt_name' => 'required',
            'total_revenue' => 'required',
            'revenue_share' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $report = new Report();


        $report->year = $request->year;


        $report->month = $request->month;


        $report->second_party_id = $request->second_party_id;


        $report->operator_id = $request->operator_id;

        if ($request->aggregator_id != "") {
            $report->aggregator_id = $request->aggregator_id;
        }

        $report->classification = $request->classification;


        $report->code = $request->code;


        $report->rbt_name = $request->rbt_name;


        $report->download_no = $request->download_no;



        $report->total_revenue = $request->total_revenue;


        $report->revenue_share = $request->revenue_share;


        $report->save();

        $request->session()->flash('success', 'created successfully');

        return redirect('report');
    }

    /**
     * Display the specified resource.
     *
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $title = 'Show - report';

        if ($request->ajax()) {
            return URL::to('report/' . $id);
        }

        $report = Report::findOrfail($id);
        return view('report.show', compact('title', 'report'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        $title = 'Edit - report';

        $operators = Operator::all();
        $second_partys = SecondParties::all()->pluck('second_party_title', 'second_party_id');
        $aggregators = Aggregator::all()->pluck('title', 'id');


        $report = Report::findOrfail($id);
        return view('report.edit', compact('title', 'operators', 'second_partys', 'aggregators', 'report'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'year' => 'required',
            'month' => 'required',
            'second_party_id' => 'required',
            'operator_id' => 'required',
            'classification' => 'required',
            'code' => 'required',
            'rbt_name' => 'required',
            'total_revenue' => 'required',
            'revenue_share' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $report = Report::findOrfail($id);

        $report->year = $request->year;


        $report->month = $request->month;


        $report->second_party_id = $request->second_party_id;


        $report->operator_id = $request->operator_id;
        if ($request->aggregator_id != "") {
            $report->aggregator_id = $request->aggregator_id;
        }


        $report->classification = $request->classification;


        $report->code = $request->code;


        $report->rbt_name = $request->rbt_name;


        $report->download_no = $request->download_no;



        $report->total_revenue = $request->total_revenue;


        $report->revenue_share = $request->revenue_share;



        $report->save();

        $request->session()->flash('success', 'Updated successfully');

        return redirect('report');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param    int $id
     * @return  \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $report = Report::findOrfail($id);
        $report->delete();
        $request->session()->flash('success', 'Deleted successfully');
        return redirect('report');
    }

    public function getDownload()
    {
        $file = base_path() . "/uploads/report/reports.xlsx";

        $headers = array(
            'Content-Type: application/xlsx',
        );
        // return response()->download($pathToFile[, $name], [, $headers]);
        return response()->download($file, 'reports.xlsx', $headers);
    }


    public function search(Request $request)
    {
        $operators = Operator::all();
        $aggregators = Aggregator::all()->pluck('title', 'id');
        $second_partys = SecondParties::all();
        $search_result = Report::with(['operator','provider','contract','aggregator'])->filter($this->search_filters())->get();
        if($request->filled('export_excel')) {
          $this->exportExcel($search_result);
        }
        return view('report.search', compact('operators', 'aggregators', 'second_partys','search_result'));
    }

    public function exportExcel($search_result)
    {
      return \Excel::create('report_export', function($excel) use ($search_result) {
        $excel->sheet('New sheet', function($sheet) use ($search_result){
            $sheet->loadView('report.report_export',compact('search_result'));
        });
      })->download('xls');
    }

    public function search_filters()
    {
      return [
        'second_party_id' => new SecondPartyFilter(),
        'operator_id' => new OperatorFilter(),
        'aggregator_id' => new AggregatorFilter(),
        'contract_id' => new ContractFilter(),
        'year' => new YearFilter(),
        'month' => new MonthFilter(),
        'code' => new RbtCodeFilter(),
        'title' => new RbtTitleFilter()
      ];
    }


    public function export_report(Request $request)
    {
        Excel::create('Filename', function ($excel) {

            // Set the title
            $excel->setTitle('Our new awesome title');

            // Chain the setters
            $excel->setCreator('Maatwebsite')
                ->setCompany('Maatwebsite');

            // Call them separately
            $excel->setDescription('A demonstration to change the file properties');
        })->download('xls');
    }

    public function statitics()
    {
        $operators = Operator::all();
        return view('report.statistics', compact('operators'));
    }

    public function get_statistics(Request $request)
    {
        $from_year = $request['duration'][0];
        $from_month = $request['duration'][1];
        $to_year = $request['duration'][2];
        $to_month = $request['duration'][3];
        $operator = $request['duration'][4];
        $operator_query = "";
        if ($operator)
            $operator_query = " AND reports.operator_id = " . $operator;

        $query = 'SELECT
                  reports.* , rbts.track_title_en AS rbt_name,
                  operators.title
                  FROM reports
                  JOIN operators ON reports.operator_id = operators.id
                  JOIN rbts ON reports.rbt_id = rbts.id
                  WHERE (reports.year > ' . $from_year . ' OR ( reports.month >= ' . $from_month . ' AND reports.year = ' . $from_year . ')) AND (reports.year < ' . $to_year . ' OR ( reports.month <= ' . $to_month . ' AND reports.year = ' . $to_year . ')) ' . $operator_query . '
                  ORDER BY year ASC, month ASC ';

        $reports = \DB::select($query);
        return $reports;
    }
}
