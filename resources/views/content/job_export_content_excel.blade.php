@extends('template')
@section('page_title')
Contents
@stop
@section('content')
@include('errors')
<style>
  .width_m_auto{
    display: table-cell;
    width: 47% !important;
  }
</style>
<div id="main-content">
  <div class="row">
    <div class="col-md-12 noPaddingPhone">
      <div class="box">
        <div class="box-title">
          <h3><i class="fa fa-bars"></i>Export Content To Excel</h3>
          <div class="box-tool">
            <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
            <a data-action="close" href="#"><i class="fa fa-times"></i></a>
          </div>
        </div>
        <div class="box-content">
          <form method='POST' class="width_m_auto start_job form-horizontal" action='{!!url("start_job")!!}' enctype="multipart/form-data">
            <input type='hidden' name='_token' value='{{Session::token()}}'>
            <div class="form-group">
              <div class="col-xs-6 col-lg-6" style="text-align: right;">
                <input type="submit" class="btn btn-success borderRadius" value="Start Job">
              </div>
            </div>
          </form>
          <form method='POST' class="width_m_auto form-horizontal" action='{!!url("job_download_content_excel")!!}' enctype="multipart/form-data">
            <input type='hidden' name='_token' value='{{Session::token()}}'>
            <div class="form-group">
              <div class="col-xs-6 col-lg-6" style="text-align: right;">
                <input type="submit" class="btn btn-primary borderRadius" value="Download Excel">
              </div>
            </div>
          </form>
          <form method='POST' class="width_m_auto stop_job form-horizontal" action='{!!url("stop_job")!!}' enctype="multipart/form-data">
            <input type='hidden' name='_token' value='{{Session::token()}}'>
            <div class="form-group">
              <div class="col-xs-6 col-lg-6" style="text-align: right;">
                <input type="submit" class="btn btn-danger borderRadius" value="Stop Job">
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
  $('#create-content').addClass('active');
  $('#export-content-to-excel').addClass('active');
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
    }
  });
  $(".start_job, .stop_job").submit(function(e){
    console.log($(this).attr("action"));
    e.preventDefault()
    $.ajax({
      type: 'post',
      url: $(this).attr("action"),
      success:function(){
        console.log("ok");
      }
    })
  })
</script>
@stop
