@extends('template')
@section('page_title')
Second Party Types
@stop
@section('content')

<!-- BEGIN Content -->
<div id="main-content">
  @include('errors')
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-title">
          <h3><i class="fa fa-bars"></i>Second Party Types</h3>
          <div class="box-tool">
            <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
            <a data-action="close" href="#"><i class="fa fa-times"></i></a>
          </div>
        </div>
        <div class="box-content">


          <form action="{{url("SecondParty/$SecondParty->second_party_id")}}" method="POST" class="form-horizontal form-bordered form-row-stripped"
            enctype="multipart/form-data" novalidate>
            @method('PATCH')
            @csrf
            <input id="hidden_key" name="key" type="hidden" />

            <div class="row">

              <div class="col-md-4">
                <div class="box box-red">
                  <div class="box-title">
                    <h3><i class="fa fa-bars"></i> GENERAL </h3>
                  </div>
                  <!-- BEGIN Left Side -->
                  <div class="box-content">

                    <div class="form-group">
                      <label for="second_party_type_id" class="col-xs-3 col-lg-2 control-label">Type</label>
                      <div class="col-sm-9 col-lg-10 controls">
                        {!! Form::select('second_party_type_id', $SecondPartyTypes, $SecondParty->second_party_type_id, ['class'=>'form-control chosen-rtl' , 'id' => 'second_party_type_id' ,'required' => true,'style'=>'height: 48px;'])!!}
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="second_party_title" class="col-xs-3 col-lg-2 control-label">Title</label>
                      <div class="col-sm-9 col-lg-10 controls">
                        <input type="text" name="second_party_title" id="second_party_title" placeholder="Second Party Title" class="form-control" value="{{$SecondParty->second_party_title}}">
                      </div>
                    </div>

                  </div>

                </div>
                <!-- END Left Side -->
              </div>

              <div class="col-md-4">
                <div class="box box-red">
                  <div class="box-title">
                    <h3><i class="fa fa-bars"></i> DATES </h3>
                  </div>
                  <!-- BEGIN Left Side -->
                  <div class="box-content">

                    <div class="form-group">
                      <label for="second_party_joining_date" class="col-xs-3 col-lg-2 control-label"> first party joining date</label>
                      <div class="input-group date date-picker col-sm-9 col-lg-10 controls" data-date-format="yyyy-mm-dd">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                        <input type="text" name="second_party_joining_date" id="second_party_joining_date" autocomplete="off" placeholder="first party joining date" data-date-format="yyyy-mm-dd" class="form-control" value="{{$SecondParty->second_party_joining_date}}">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="second_party_terminate_date" class="col-xs-3 col-lg-2 control-label"> first party joining date</label>
                      <div class="input-group date date-picker col-sm-9 col-lg-10 controls" data-date-format="yyyy-mm-dd">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                        <input type="text" name="second_party_terminate_date" id="second_party_terminate_date" autocomplete="off" placeholder="first party joining date" data-date-format="yyyy-mm-dd" class="form-control" value="{{$SecondParty->second_party_terminate_date}}">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="second_party_title" class="col-xs-3 col-lg-2 control-label">Status</label>
                      <div class="col-sm-9 col-lg-10 controls">
                        @if ($SecondParty->second_party_status == 'Working')
                        {!! Form::radio('second_party_status', 1, true) !!} working
                        {!! Form::radio('second_party_status', 0) !!} terminated
                        @else
                        {!! Form::radio('second_party_status', 1) !!} working
                        {!! Form::radio('second_party_status', 0, true) !!} terminated
                        @endif
                      </div>
                    </div>

                  </div>
                </div>
                <!-- END Left Side -->
              </div>

              <div class="col-md-4">
                <div class="box box-red">
                  <div class="box-title">
                    <h3><i class="fa fa-bars"></i> LEGAL </h3>
                  </div>
                  <!-- BEGIN Left Side -->
                  <div class="box-content">
                    <td><a target="_blank" href="{{url($SecondParty->second_party_identity)}}">Preview</a></td>
                    <div class="form-group">
                      <label for="second_party_identity" class="col-xs-3 col-lg-2 control-label"> ID </label>
                      <div class="col-sm-9 col-lg-10 controls">
                        <input type="file" name="second_party_identity" id="second_party_identity" placeholder="Second Party Title" class="form-control">
                      </div>
                    </div>
                    <td><a target="_blank" href="{{url($SecondParty->second_party_cr)}}">Preview</a></td>
                    <div class="form-group">
                      <label for="second_party_cr" class="col-xs-3 col-lg-2 control-label"> CR </label>
                      <div class="col-sm-9 col-lg-10 controls">
                        <input type="file" name="second_party_cr" id="second_party_cr" placeholder="Second Party Title" class="form-control">
                      </div>
                    </div>
                    <td><a target="_blank" href="{{url($SecondParty->second_party_tc)}}">Preview</a></td>
                    <div class="form-group">
                      <label for="second_party_tc" class="col-xs-3 col-lg-2 control-label"> TC </label>
                      <div class="col-sm-9 col-lg-10 controls">
                        <input type="file" name="second_party_tc" id="second_party_tc" placeholder="Second Party Title" class="form-control">
                      </div>
                    </div>

                  </div>
                </div>
                <!-- END Left Side -->
              </div>

            </div>

            <div class="form-group">
              <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2" style="justify-content: center;width: 65%;display: flex;">
                <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Save</button>
                <button type="button" class="btn">Cancel</button>
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
  $('#SecondParty').addClass('active');
        $('#SecondParty-create').addClass('active');
</script>
@stop
