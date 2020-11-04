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
          <form method='POST' class="form-horizontal" action="{{url('fullcontracts/'.$id.'/updateapprove')}}" enctype="multipart/form-data">
            <input type='hidden' name='_token' value='{{Session::token()}}'>
            <div class="form-group">
              <label class="col-sm-3 col-lg-2 control-label" for="code">Contract Tilte</label>
              <div class="col-sm-9 col-lg-10 controls">
                <input id="code" name="" type="text" class="form-control input-lg" value="{{$list_contract_items_send->contract_code}} {{$list_contract_items_send->contract_label}}" disabled>
              </div>
            </div>



            <div class="form-group">
              <label class="col-sm-3 col-lg-2 control-label" for="code">Contract Item</label>
              <div class="col-sm-9 col-lg-10 controls border_css">
                <p for="">{!! $list_contract_items_send->item !!}</p>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 col-lg-2 control-label" for="code">Status</label>
              <div class="col-sm-9 col-lg-10 controls" style="text-align: center;">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="status" id="exampleRadios1" required value="2" @if($list_contract_items_send->status == 2) checked="checked" @endif >
                  <label class="form-check-label" for="exampleRadios1" style="padding-right: 11px;">
                    Approved
                  </label>
                  <input class="form-check-input" type="radio" name="status" id="exampleRadios2" required value="1" @if($list_contract_items_send->status == 1) checked="checked" @endif>
                  <label class="form-check-label" for="exampleRadios2">
                    Not Approved
                  </label>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2">
                <input type="submit" class="btn btn-primary" value="Submit">
              </div>
            </div>
          </form>
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
//   function preventBack() {
//     window.history.forward();
//   }
//   window.onunload = function() {
//     null;
//   };
// setTimeout("preventBack()", 0);
</script>
@stop
