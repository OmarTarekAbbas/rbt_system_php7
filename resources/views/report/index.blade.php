@extends('template')
@section('page_title')
    RBTs
@stop
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-blue">
                <div class="box-title">
                    <h3><i class="fa fa-table"></i> Report Table</h3>
                    <div class="box-tool">
                        <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
                        <a data-action="close" href="#"><i class="fa fa-times"></i></a>
                    </div>
                </div>
                <div class="box-content">

                    <div class="table-responsive">
                        <table id="example" class="table table-striped dt-responsive" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th style="width:18px"><input type="checkbox"></th>
                                <th>Rbt Id</th>
                                <th>Rbt Title</th>
                                <th>Year</th>
                                <th>Month</th>
                                <th>Code</th>
                                <th>Classification</th>
                                <th>Download Number</th>
                                <th>Total Revenue</th>
                                <th>Revenue Share</th>
                                <th>Provider Title</th>
                                <th>Operator Title</th>
                                <th>Aggregator Title</th>
                                <th class="visible-md visible-lg" style="width:130px">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($reports as $report)
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td>{{$report->rbt_id}}</td>
                                    <td>{!!$report->rbt_name!!}</td>
                                    <td>{!!$report->year!!}</td>
                                    <td>{!!$report->month!!}</td>
                                    <td>{!!$report->code!!}</td>
                                    <td>{!!($report->classification) ? $report->classification : '--'!!}</td>
                                    <td>{!!($report->download_no) ? $report->download_no : '--'!!}</td>
                                    <td>{!!($report->total_revenue)!!}</td>
                                    <td>{!!$report->revenue_share!!}</td>
                                    <td>{!!($report->second_party_id) ? $report->provider->second_party_title : '--'!!}</td>
                                    <td>{!!($report->operator_id) ? $report->operator->title : '--'!!}</td>
                                    <td>{!!($report->aggregator_id) ? $report->aggregator->title : '--'!!}</td>
                                    <td class="visible-md visible-lg">
                                        <div class="btn-group">
                                          @if(get_action_icons('report/{report}/edit','get'))
                                          <a class="btn btn-sm show-tooltip" title="" href="{{url('report/'.$report->id.'/edit')}}" data-original-title="Edit"><i class="fa fa-edit"></i></a>
                                          @endif
                                          @if(get_action_icons('report/{id}/delete','get'))
                                          <a class="btn btn-sm btn-danger show-tooltip" title="" onclick="return confirm('Are you sure you want to delete this ?');" href="{{url('report/'.$report->id.'/delete')}}" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
                                          @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

@section('script')
    <script>
        $('#rbt .submenu').first().css('display', 'block');
        $('#report .submenu').first().css('display', 'block');
        $('#report-index').addClass('active');
    </script>
@stop
