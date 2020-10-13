@extends('template')
@section('page_title')
Department
@stop
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="box box-black">
      <div class="box-title">
        <h3><i class="fa fa-table"></i> Department Table</h3>
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
                <th>Departments tilte</th>
                <th>Html Item</th>
                <th>Status</th>
                <th class="visible-md visible-lg" style="width:130px">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($list_contract_items_sends as $list_contract_items_send)
              <tr class="table-flag-blue">
                <td><input type="checkbox"></td>
                <td>{{$list_contract_items_send->title}}</td>
                <td>{!! $list_contract_items_send->item  !!}</td>
                <td>
                  @if ($list_contract_items_send->status == 1)
                  Approved
                  @else
                  Not Approved
                  @endif
                </td>
                @if ($list_contract_items_send->status == 1)
                <td class="visible-md visible-lg">
                  
                </td>
                @else
                <td class="visible-md visible-lg">
                  <div class="btn-group">
                    <a class="btn btn-success btn-sm" title="Approve" href="{{url('contract_items_send/'.$list_contract_items_send->id.'/approve')}}" data-original-title="Edit"><i class="glyphicon glyphicon-check"></i></a>
                  </div>
                </td>
                @endif
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
  $('#department').addClass('active');
  $('#department-index').addClass('active');
</script>
@stop
