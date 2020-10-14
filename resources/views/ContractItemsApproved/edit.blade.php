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

        <!-- <div class="table-responsive">
          <table class="table table-striped table-bordered ">
            <tbody>
              <tr>
                <td width='30%' class='label-view text-right'>ID</td>
                <td>{{$list_contract_items_send->id}} </td>
              </tr>
              <tr>
                <td width='30%' class='label-view text-right'>Contract Tilte</td>
                <td>{{$list_contract_items_send->contract_label}}</td>
              </tr>
              <tr>
                <td width='30%' class='label-view text-right'>Html Item</td>
                <td>{!! $list_contract_items_send->item !!}</td>
              </tr>
              <tr>
                <td width='30%' class='label-view text-right'>Status</td>
                <td>
                  @if ($list_contract_items_send->status == 1)
                  <button class="btn btn-success btn-sm" title="Approve">Approved</button>
                  @else
                  <button class="btn btn-danger btn-sm" title="Approve">Not Approved</button>
                  @endif
                </td>
              </tr>
              <tr>
                <td width='30%' class='label-view text-right'>
                  <a class="btn btn-danger btn-sm" title="Approve" href="{{url('contract_items_send/'.$list_contract_items_send->id.'/notapprove')}}" data-original-title="Edit"><i class="glyphicon glyphicon-check"></i></a>
                </td>
                <td>
                  <a class="btn btn-success btn-sm" title="Approve" href="{{url('contract_items_send/'.$list_contract_items_send->id.'/approve')}}" data-original-title="Edit"><i class="glyphicon glyphicon-check"></i></a>
                </td>
              </tr>
            </tbody>
          </table>
        </div> -->
        <div class="box-content">
          <form method='POST' class="form-horizontal" action='' enctype="multipart/form-data">
            <input type='hidden' name='_token' value='{{Session::token()}}'>
            <div class="form-group">
              <label class="col-sm-3 col-lg-2 control-label" for="code">Contract Tilte</label>
              <div class="col-sm-9 col-lg-10 controls">
                <input id="code" name="" type="text" class="form-control input-lg" value="{{$list_contract_items_send->contract_label}}" disabled>
              </div>
            </div>


            <div class="form-group">
              <label class="col-sm-3 col-lg-2 control-label" for="code">Html Item</label>
              <div class="col-sm-9 col-lg-10 controls border_css">
                <p for="">{!! $list_contract_items_send->item !!}</p>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 col-lg-2 control-label" for="code">Status</label>
              <div class="col-sm-9 col-lg-10 controls">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="status" id="exampleRadios1" value="1" checked @if($list_contract_items_send->status == 1) checked="checked" @endif >
                  <label class="form-check-label" for="exampleRadios1">
                    Approved
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="status" id="exampleRadios2" value="0" checked>
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
</script>
@stop
