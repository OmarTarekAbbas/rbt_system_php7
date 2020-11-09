@extends('template')
@section('page_title')
RBTs
@stop
@section('content')
@include('errors')

<style>
  .displayGrid .displayGridHref {
    width: 75%;
    margin-left: 24%;
  }
</style>

<div id="main-content">
  <div class="row">
    <div class="col-md-12 noPaddingPhone">
      <div class="box">
        <div class="box-title">
          <h3><i class="fa fa-bars"></i>Add RBT</h3>
          <div class="box-tool">
            <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
            <a data-action="close" href="#"><i class="fa fa-times"></i></a>
          </div>
        </div>
        <div class="box-content">
          <form method='POST' class="width_m_auto form-horizontal" action='{!!url("rbt/excel")!!}' enctype="multipart/form-data">
            <input type='hidden' name='_token' value='{{Session::token()}}'>
            @if(isset($_REQUEST['content_id']))
            <input type='hidden' name='content_id' value='{{$_REQUEST['content_id']}}'>
            @endif
            <div class="form-group">
              <label class="col-sm-3 col-lg-2 control-label">Excel Type Select *</label>
              <div class="col-sm-9 col-lg-10 controls">
                <select class="form-control chosen" name="type" tabindex="1" required onchange="change_sample_link(this)">
                  <option value="0">Old Excel</option>
                  <option value="1">New Excel</option>
                </select>
              </div>
            </div>


            <div class="form-group">
              <label class="col-sm-3 col-lg-2 control-label">Excel file</label>
              <div class="col-sm-9 col-lg-10 controls">
                <div class="fileupload fileupload-new displayGrid displayPhone" data-provides="fileupload">
                  <div class="input-group">
                    <div class="form-control uneditable-input">
                      <i class="fa fa-file fileupload-exists"></i>
                      <span class="fileupload-preview"></span>
                    </div>
                    <div class="input-group-btn">
                      <a class="btn bun-default btn-file">
                        <span class="fileupload-new">Select file</span>
                        <span class="fileupload-exists">Change</span>
                        <input type="file" name="fileToUpload" required class="file-input">
                      </a>
                      <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
                    </div>
                  </div>
                  <span id="sample_link"><a class="btn btn-success mAuto_dBlock borderRadius displayGridHref" href="{{url('rbt/downloadSample')}}">Download Sample</a></span>
                </div>
              </div>
            </div>

            <div class="col-sm-9 col-lg-12">

            </div>

            <div class="form-group">
              <label class="col-sm-3 col-lg-2 control-label">Operators Select *</label>
              <div class="col-sm-9 col-lg-10 controls">
                <select class="form-control chosen" data-placeholder="Choose a Operators" name="operator_id" tabindex="1" required>
                  <option value=""></option>
                  @foreach($operators as $operator)
                  <option value="{{$operator->id}}">{{$operator->title}}-{{$operator->country->title}}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 col-lg-2 control-label">Aggregators Select</label>
              <div class="col-sm-9 col-lg-10 controls">
                <select class="form-control chosen" data-placeholder="Choose an aggregator" name="aggregator_id" tabindex="1">
                  <option value=""></option>
                  @foreach($aggregators as $key => $value)
                  <option value="{{$key}}">{{$value}}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-9 col-lg-12">
                <input type="submit" class="btn btn-primary mAuto_dBlock borderRadius" value="Submit">
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
        function change_sample_link(element) {
            var link ;
            $('#sample_link').html('');
            if(element.value==0)
            {
                link = '<a class="btn btn-success mAuto_dBlock borderRadius displayGridHref" href="{{url('rbt/downloadSample')}}">Download Sample</a>' ;
            }
            else {
                link = '<a class="btn btn-success mAuto_dBlock borderRadius displayGridHref" href="{{url('rbt/downloadSampleNew')}}">Download Sample (New)</a>' ;
            }
            $('#sample_link').append(link).hide().fadeIn(600) ;
        }
    </script>
    <script>
        $('#rbt .submenu').first().css('display', 'block');
        $('#rbt-excel').addClass('active');
    </script>
@stop
