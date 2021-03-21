@extends('template')
@section('page_title')
Reports
@stop
@section('content')
@include('errors')
<div id="main-content">
  <div class="row">
    <div class="col-md-12 noPaddingPhone">
      <div class="box">
        <div class="box-title">
          <h3><i class="fa fa-bars"></i>Search in reports</h3>
          <div class="box-tool">
            <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
            <a data-action="close" href="#"><i class="fa fa-times"></i></a>
          </div>
        </div>
        <div class="box-content col-md-12 noPaddingPhone">
          <form action="{{ url('client/reports') }}" id="search_form" method="get">
            @csrf
            <div class="displayGridTwo">

              <div class="form-group ">
                <label class="col-sm-3 col-lg-2 control-label">Operator</label>
                <div class="col-sm-9 col-lg-10 controls">
                  <select id="input6" class="form-control chosen" data-placeholder="Choose a Operators" name="operator_id" tabindex="1">
                    <option value=""></option>
                    @foreach($operators as $operator)
                    <option @if(request('operator_id')==$operator->id) selected="selected" @endif value="{{$operator->id}}">{{$operator->title}}-{{$operator->country->title}}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="form-group ">
                <label class="col-sm-3 col-lg-2 control-label">Contract</label>
                <div class="col-sm-9 col-lg-10 controls">
                  <select id="contract_id" class="form-control chosen" data-placeholder="Choose a Contract" name="contract_id">
                    <option value=""></option>
                    @foreach($contracts as $contract)
                    <option @if(request('contract_id') == $contract->id) selected="selected" @endif value="{{$contract->id}}">{{$contract->contract_code .'-'. $contract->contract_label}}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="form-group ">
                <label class="col-sm-3 col-lg-2 control-label">Year</label>
                <div class="col-sm-9 col-lg-10 controls">
                  <select id="signed_date" class="form-control chosen" data-placeholder="Filter By Year" name="year" tabindex="1">
                    @foreach( range( date('Y')-10 , date('Y')+10 ) as $year )
                    <option @if( (!request('year') && $year==date('Y')) || request('year')==$year) selected="selected" @endif value="{{$year}}">{{$year}}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="form-group ">
                <label class="col-sm-3 col-lg-2 control-label">Month</label>
                <div class="col-sm-9 col-lg-10 controls">
                  <select class="form-control chosen" data-placeholder="Choose a month" name="month[]" multiple>
                    @for($month = 1 ; $month <= 12 ; $month++) <option @if(in_array($month, (array)request('month'))) selected="selected" @endif value="{{$month}}">{{date("F", strtotime("$month/1/1"))}}</option>
                      @endfor
                  </select>
                </div>
              </div>

              <div class="form-group ">
                <label class="col-sm-3 col-lg-2 control-label">Code</label>
                <div class="col-sm-9 col-lg-10 controls">
                  <input id="input4" name="code" type="text" class="form-control" value="{{ request('code') }}">
                </div>
              </div>

              <div class="form-group ">
                <label class="col-sm-3 col-lg-2 control-label">Rbt title</label>
                <div class="col-sm-9 col-lg-10 controls">
                  <input id="input5" name="title" type="text" class="form-control" value="{{ request('title') }}">
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="">
                <button type="submit" class="btn btn-primary mAuto_dBlock borderRadius" style="margin-bottom: 2% !important;">Search</button>
              </div>
            </div>
          </form>


          <div class="box-content col-md-12" id="search_result">
            <div class="row">
              <div class="col-md-12">
                <div class="box">
                  <div class="box-title">
                    <h3><i class="fa fa-table"></i>Search Result</h3>
                    <div class="box-tool">
                      <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
                      <a data-action="close" href="#"><i class="fa fa-times"></i></a>
                    </div>
                  </div>
                  <div class="box-content">
                    <a id="btnExport" href="{{  url()->current().'?'.http_build_query(array_merge(request()->all(),['export_excel' => 'yes']))  }}" class="btn btn-circle btn-fill btn-bordered btn-success btn-to-info"><i class="fa fa-save"></i></a>
                    <div class="table-responsive" id="table_wrapper">
                      <table class="table table-striped table-hover fill-head" id="dvData">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>RBT ID</th>
                            <th>RBT Title</th>
                            <th>Year</th>
                            <th>Month</th>
                            <th>Code</th>
                            <th>Classification</th>
                            <th>Download #</th>
                            <th>Total Revenue</th>
                            <th>Revenu share</th>
                            <th>Your Revenue</th>
                            <th>Client share</th>
                            <th>Provider</th>
                            <th>Operator</th>
                          </tr>
                        </thead>
                        <tbody id="table_body">
                          @foreach($search_result as $record)
                          <tr>
                            <td>{{ $record->id }} </td>
                            <td>{{ $record->rbt_id }} </td>
                            <td>{{ $record->rbt_name }} </td>
                            <td>{{ $record->year }} </td>
                            <td>{{ $record->month }} </td>
                            <td>{{ $record->code }} </td>
                            <td>{{ $record->classification }} </td>
                            <td>{{ $record->download_no }} </td>
                            <td>{{ $record->total_revenue }} </td>
                            <td>{{ $record->revenue_share }} </td>
                            <td>{{ $record->your_revenu }} </td>
                            <td>{{ $record->client_revenu }} </td>
                            <td>{{ $record->provider->second_party_title }} </td>
                            <td>{{ $record->operator->title }} </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="box-content col-md-12" id="sum_revenue">
            <h5 style="color:green; font-weight:bolder; ">Your Revenue: <span>{{ optional($search_result)->sum('your_revenu') }}</span> </h5>
            <h5 style="color:green; font-weight:bolder; ">Client Revenue: <span>{{ optional($search_result)->sum('client_revenu') }}</span></h5>
          </div>

          <div class="box-content col-md-12" id="search_result">

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop
@section('script')
<script>

</script>
<script>
    $('#client').addClass('active');
    $('#reports').addClass('active');
</script>
@stop
