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
use Validator;
use Excel;
use App\Rbt;
use Auth;

/**
 * Class ReportController.
 *
 * @author  The scaffold-interface created at 2017-08-02 09:28:53am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Index - report';
        if (Auth::user()->hasRole(['super_admin', 'admin'])) {
            $reports = Report::all();
        } else {
            $reports = Report::where('aggregator_id', Auth::user()->aggregator_id)->get();
        }

        return view('report.index', compact('reports', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create - report';

        $operators = Operator::all()->pluck('title', 'id');
        $providers = Provider::all()->pluck('title', 'id');
        $aggregators = Aggregator::all()->pluck('title', 'id');


        return view('report.create', compact('operators', 'providers', 'aggregators'));
    }

    public function excel()
    {
        $title = 'Create - report';

        $operators = Operator::all()->pluck('title', 'id');
        $providers = Provider::all()->pluck('title', 'id');
        $aggregators = Aggregator::all()->pluck('title', 'id');

        return view('report.excel', compact('operators', 'providers', 'aggregators'));
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
                        $old_report =   Report::where([['operator_id', $rbt->operator_id], ['provider_id', $rbt->provider_id], ['code', $rbt->code]])->where('year', $request->year)->where('month', $request->month)->first();
                        if ($old_report) {
                            continue;
                        }

                        $report['rbt_name'] = $rbt->track_title_en;
                        $report['rbt_id'] = $rbt->id;
                        $report['provider_id'] = $rbt->provider_id;
                    } elseif ($row->code == "" && $row->track_name != "" && $row->artist_name != "") { // if you write rbt name + provider name
                        $provider = Provider::where('title', $row->artist_name)->first();
                        if (!$provider) {
                            continue;
                        }
                        $rbt = Rbt::where([['operator_id', $request->operator_id], ['provider_id', $provider->id], ['track_title_en', $row->track_name]])->first();
                        if ($rbt == null) {
                            continue;
                        }
                        $report['code'] = $rbt->code;
                        $report['rbt_name'] = $rbt->track_title_en;
                        $report['rbt_id'] = $rbt->id;
                        $report['provider_id'] = $rbt->provider_id;
                    } else {
                        continue;
                    }
                    $report['download_no'] = $row->download_number;
                    $report['total_revenue'] = $row->total_revenue;
                    $report['revenue_share'] = $row->revenue_share;
                    $check = Report::create($report);
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
            'provider_id' => 'required',
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


        $report->provider_id = $request->provider_id;


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

        $operators = Operator::all()->pluck('title', 'id');
        $providers = Provider::all()->pluck('title', 'id');
        $aggregators = Aggregator::all()->pluck('title', 'id');


        $report = Report::findOrfail($id);
        return view('report.edit', compact('title', 'operators', 'providers', 'aggregators', 'report'));
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
            'provider_id' => 'required',
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


        $report->provider_id = $request->provider_id;


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


    public function search()
    {
        $operators = Operator::all()->pluck('title', 'id');
        $aggregators = Aggregator::all()->pluck('title', 'id');
        $providers = Provider::all()->pluck('title', 'id');
        return view('report.search', compact('operators', 'aggregators', 'providers'));
    }

    public function search_result(Request $request)
    {
        $report_columns = Schema::getColumnListing('reports');
        $columns = array(
            1 => "year", 2 => "month", 3 => "classification", 4 => "code",
            5 => "rbt_name", 6 => "rbt_id", 7 => "download_no", 8 => "total_revenue", 9 => "revenue_share", 10 => "operator_id", 11 => "provider_id", 13 => "aggregator_id", 12 => "from", 14 => "to"
        );

        $search_key_value = array();
        foreach ($request['search_field'] as $index => $item) {
            if (strlen($item) == 0)
                continue;
            else {
                if ($index == 13) {
                    $item = date("Y-m-d", strtotime($item));
                    $search_key_value['from'] = $item;
                } elseif ($index == 14) {
                    $item = date("Y-m-d", strtotime($item));
                    $search_key_value['to'] = $item;
                } elseif (array_search($columns[$index], $report_columns)) {
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
            } elseif ($index == "rbt_name") {
                $sign = "like";
            }

            $counter++;
            if ($counter == $size) {
                if ($index == "rbt_name") {
                    $string_query .= "`reports`.`$index`" . " $sign '%$value%'";
                } else {
                    $string_query .= "`reports`.`$index`" . " $sign '$value'";
                }
            } else {
                $string_query .= "`reports`.`$index`" . " $sign '$value' AND ";
            }
        }
        $select = "SELECT reports.* , operators.title AS operator_title, providers.title AS provider_title, aggregators.title AS aggregator_title
                   FROM reports
                   JOIN providers ON reports.provider_id = providers.id
                   JOIN aggregators ON reports.aggregator_id = aggregators.id
                   JOIN operators ON reports.operator_id = operators.id ";
        if (empty($string_query))
            $where = "";
        else
            $where = " WHERE " . $string_query . " ORDER BY reports.total_revenue DESC";

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
