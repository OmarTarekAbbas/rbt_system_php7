@extends('template')
@section('page_title')
Revenue
@stop
@section('content')
<div id="main-content">
  <div class="row">
    <div class="col-md-12 noPaddingPhone">
      <div class="box box-black">
        <div class="box-title">
          <h3><i class="fa fa-table"></i> Revenue Table</h3>
          <div class="box-tool">
            <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
            <a data-action="close" href="#"><i class="fa fa-times"></i></a>
          </div>
        </div>
        <div class="box-content">
          @if (get_action_icons('revenue/create', 'get'))
          <div class="btn-toolbar pull-right clearfix">
            <div class="btn-group">
              <a class="btn btn-success show-tooltip" title="Add" href="{{url('revenue/create')}}"><i class="fa fa-plus"></i> Add Revenue</a>
            </div>
          </div>
          <br /><br />
          <div class="clearfix"></div>
          @endif
          <div class="table-responsive">
            <table id="example" class="table table-striped dt-responsive" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Contract</th>
                  <th>Year</th>
                  <th>Month</th>
                  <th>Source Type</th>
                  <th>Source</th>
                  <th>Amount</th>
                  <th>Currency</th>
                  <th>Serivce Type</th>
                  <th>Is Collected</th>
                  <th class="visible-xs visible-md visible-lg" style="width:130px">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($revenues as $revenue)
                <tr class="table-flag-blue">
                  <td>{{$revenue->id}}</td>
                  <td>{{optional($revenue->contract)->contract_code}}<span class="btn btn-sm">{{optional($revenue->contract)->contract_label}}</span></td>
                  <td>{{$revenue->year}}</td>
                  <td>{{$revenue->month}}</td>
                  <td>{{$revenue->source_type}}</td>
                  <td>{{optional($revenue->source)->title ?? optional($revenue->source)->second_party_title}}</td>
                  <td>{{$revenue->amount}}</td>
                  <td>{{optional($revenue->currency)->title}}</td>
                  <td>{{optional($revenue->serivce_type)->service_type_title}}</td>
                  <td>{{$revenue->is_collected}}</td>
                  <td class="visible-xs visible-md visible-lg">
                    <div class="btn-group pull-right">

                      @if (get_action_icons('revenue/{revenue}', 'get'))
                      <a class="btn btn-sm btn-primary show-tooltip" title="" href="{{url('revenue/'.$revenue->id)}}" data-original-title="view"><i class="fa fa-eye"></i></a>
                      @endif

                      @if (get_action_icons('revenue/{revenue}/edit', 'get'))
                      <a class="btn btn-sm show-tooltip" title="" href="{{url('revenue/'.$revenue->id.'/edit')}}" data-original-title="Edit"><i class="fa fa-edit"></i></a>
                      @endif

                      @if (get_action_icons('revenue/{id}/delete', 'get'))
                      <a class="btn btn-sm btn-danger show-tooltip" title="" onclick="return confirm('Are you sure you want to delete this ?');" href="{{url('revenue/'.$revenue->id.'/delete')}}" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
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
</div>

@stop

@section('script')
<script>
  $('#contract .submenu').first().css('display', 'block');
  $('#revenue .submenu').first().css('display', 'block');
  $('#revenue-index').addClass('active');
</script>
@stop
