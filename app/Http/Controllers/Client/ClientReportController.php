<?php

namespace App\Http\Controllers\Client;

use App\ClientPayment;
use App\Contract;
use App\Filters\Report\ContractFilter;
use App\Filters\Report\MonthFilter;
use App\Filters\Report\OperatorFilter;
use App\Filters\Report\RbtCodeFilter;
use App\Filters\Report\RbtTitleFilter;
use App\Filters\Report\YearFilter;
use App\Http\Controllers\Controller;
use App\Operator;
use App\Report;
use Illuminate\Http\Request;

class ClientReportController extends Controller
{
  /**
   * Method index
   *
   * @param Request $request
   *
   * @return view
   */
  public function index(Request $request)
  {
      $second_party = session()->get('client');
      $operators = Operator::all();
      $contracts = Contract::where('second_party_id',$second_party->second_party_id)->get();
      $search_result = Report::with(['operator','provider','contract','aggregator'])->where('second_party_id',$second_party->second_party_id)->filter($this->search_filters())->get();
      if($request->filled('export_excel')) {
        $this->exportExcel($search_result);
      }
      return view('client.reports.index', compact('operators','search_result','contracts'));
  }

  /**
   * Method exportExcel
   *
   * @param Report $search_result
   *
   * @return void
   */
  public function exportExcel($search_result)
  {
      return \Excel::create('report_export', function($excel) use ($search_result) {
        $excel->sheet('New sheet', function($sheet) use ($search_result){
            $sheet->loadView('client.reports.report_export',compact('search_result'));
        });
      })->download('xls');
  }

  /**
   * Method clientPayment
   *
   * @return view
   */
  public function clientPayment()
  {
    return view('client.reports.payment');
  }

     /**
     * Method allData
     *
     * return client payments data as server side
     *
     * @return void
     */
    public function allData()
    {
        $second_party   = session()->get('client');
        $client_payments = ClientPayment::select('*', 'client_payments.id AS id', 'second_parties.second_party_title as provider', 'currencies.title as currency', 'contracts.contract_code as contract_code', 'contracts.contract_label as contract_label', 'contracts.id as contract_id')
        ->join('second_parties', 'second_parties.second_party_id', '=', 'client_payments.second_party_id')
        ->join('currencies', 'currencies.id', '=', 'client_payments.currency_id')
        ->join('contracts', 'contracts.id', '=', 'client_payments.contract_id')
        ->where('client_payments.second_party_id',$second_party->second_party_id)
        ->latest('client_payments.id')
        ->get();

      $datatable = \Datatables::of($client_payments)
        ->addColumn('index', function (ClientPayment $client_payment) {
          return '<input class="select_all_template" type="checkbox" name="selected_rows[]" value="'.$client_payment->id.'" class="roles" onclick="collect_selected(this)">';
        })
        ->addColumn('id', function (ClientPayment $client_payment) {
          return $client_payment->id;
        })
        ->addColumn('provider', function (ClientPayment $client_payment) {
          return $client_payment->provider;
        })
        ->addColumn('amount', function (ClientPayment $client_payment) {
            return $client_payment->amount;
        })
        ->addColumn('currency', function (ClientPayment $client_payment) {
            return $client_payment->currency;
        })
        ->addColumn('contract', function (ClientPayment $client_payment) {
          if ($client_payment->contract_code)
            return '<a  href="' . url("client/contracts/$client_payment->contract_id") . '" >' . $client_payment->contract_code . " " . $client_payment->contract_label. '</a>';
          else
            return '---';
        })
        ->addColumn('year', function (ClientPayment $client_payment) {
            return $client_payment->year;
        })
        ->addColumn('months', function (ClientPayment $client_payment) {
            return $client_payment->month;
        })
        ->escapeColumns([])
        ->make(true);

      return $datatable;
    }

  /**
   * Method search_filters
   *
   * @return array
   */
  public function search_filters()
  {
    return [
      'operator_id' => new OperatorFilter(),
      'contract_id' => new ContractFilter(),
      'year' => new YearFilter(),
      'month' => new MonthFilter(),
      'code' => new RbtCodeFilter(),
      'title' => new RbtTitleFilter()
    ];
  }
}
