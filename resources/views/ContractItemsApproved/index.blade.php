@extends('template')
@section('page_title')
Contract Items Approved
@stop
@section('content')
<style>
  .border_css {
    padding: 12px;
    border: 1px solid #00000026;
    width: 81.5%;
    margin-left: 13px;

  }
</style>
<div class="row">
  <div class="col-md-12">
    <div class="box box-blue">
      <div class="box-title">
        <h3><i class="fa fa-table"></i> Contract Items Approved Table</h3>
        <div class="box-tool">
          <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
          <a data-action="close" href="#"><i class="fa fa-times"></i></a>
        </div>
      </div>
      <div class="box-content">
        <div class="box-content">
          <div class="form-horizontal">
            <div class="form-group">
              <label class="col-sm-3 col-lg-2 control-label" for="code">Contract Tilte</label>
              <div class="col-sm-9 col-lg-10 controls">
                <input id="code" name="" type="text" class="form-control input-lg" value="{{$list_contract_items_sends[0]->contract_code}} {{$list_contract_items_sends[0]->contract_label}}" disabled>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 col-lg-2 control-label" for="code">Contract Item</label>
              <div class="col-sm-9 col-lg-10 controls border_css">
                <p for="">{!! $list_contract_items_sends[0]->item !!}</p>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 col-lg-2 control-label" for="code">Status</label>
              <div class="col-sm-9 col-lg-10 controls">
                @if ($list_contract_items_sends[0]->fullapproves == 1)
                <button class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="bottom" title="Full Approve">
                Full Approve
                </button>
                @else
                <button class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="bottom" title="Stay Pending">
                Stay Pending
                </button>
                @endif
              </div>
            </div>
            <br>
            <br>
            <hr style="border-top: 1px solid #0006;">
            <br>
            <br>
            @foreach($list_contract_items_sends as $list_contract_items_send)

            <div class="form-group">
              <label class="col-sm-3 col-lg-2 control-label" for="code">Department Title</label>
              <div class="col-sm-9 col-lg-10 controls">
                <input id="code" name="" type="text" class="form-control input-lg" value="{{$list_contract_items_send->title}}" disabled>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 col-lg-2 control-label" for="code">Manager</label>
              <div class="col-sm-9 col-lg-10 controls">
                <input id="code" name="" type="text" class="form-control input-lg" value="{{$list_contract_items_send->name}}" disabled>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 col-lg-2 control-label" for="code">Status</label>
              <div class="col-sm-9 col-lg-10 controls">
                @if ($list_contract_items_send->status == 2)
                <button class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="bottom" title="Approve">
                  Approve
                </button>
                @elseif($list_contract_items_send->status == 1)
                <button class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="bottom" title="Not Approve">
                  Not Approve
                </button>
                @else
                <button class="btn btn-dark btn-sm" data-toggle="tooltip" data-placement="bottom" title="No Action">
                  Not Action
                </button>
                @endif
              </div>
            </div>

            <br>
            <hr>
            <br>
            @endforeach
          </div>

        </div>


      </div>
    </div>
  </div>
</div>


@stop

@section('script')
<script>
  $('#contract').addClass('active');
  $('#contract-index').addClass('active');
</script>
@stop
