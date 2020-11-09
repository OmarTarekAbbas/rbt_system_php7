@extends('template')
@section('page_title')
Second Party
@stop
@section('content')

<style>
  @media (min-width: 320px) and (max-width: 359.9px) {
    #main-content {
      padding: 10px 10px 20px;
    }
  }
</style>

<!-- BEGIN Content -->
<div id="main-content">
  @include('errors')
  <div class="row">
    <div class="col-md-12 noPaddingPhone">
      <div class="box">
        <div class="box-title">
          <h3><i class="fa fa-bars"></i>Second Party</h3>
          <div class="box-tool">
            <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
            <a data-action="close" href="#"><i class="fa fa-times"></i></a>
          </div>
        </div>
        <div class="box-content">


          <form action="{{url('SecondParty')}}" method="post" class="width_m_auto form-horizontal form-bordered form-row-stripped" enctype="multipart/form-data" novalidate>
            {!! csrf_field() !!}
            <input id="hidden_key" name="key" type="hidden" />

            <div class="row">
              <div class="col-md-12" style="float: none; margin: 0 auto;">
                <div class="box box-red">
                  <div class="box-title">
                    <h3><i class="fa fa-bars"></i> GENERAL </h3>
                  </div>
                  <!-- BEGIN Left Side -->
                  <div class="box-content">

                    <div class="form-group">
                      <label for="second_party_type_id" class="col-xs-12 col-lg-2 control-label">Type</label>
                      <div class="col-xs-12 col-lg-10 controls">
                        {!! Form::select('second_party_type_id', $SecondPartyTypes, null, ['class'=>'form-control chosen-rtl' , 'id' => 'second_party_type_id' ,'required' => true,'style'=>'height: 48px;'])!!}
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="second_party_title" class="col-xs-12 col-lg-2 control-label">Title</label>
                      <div class="col-xs-12 col-lg-10 controls">
                        <input type="text" name="second_party_title" id="second_party_title" placeholder="Second Party Title" class="form-control">
                      </div>
                    </div>

                  </div>

                </div>
                <!-- END Left Side -->
              </div>

              <div class="col-md-12" style="float: none; margin: 0 auto;">
                <div class="box box-red">
                  <div class="box-title">
                    <h3><i class="fa fa-bars"></i> DATES </h3>
                  </div>
                  <!-- BEGIN Left Side -->
                  <div class="box-content">

                    <div class="form-group">
                      <label for="second_party_joining_date" class="col-xs-12 col-lg-2 control-label"> Joining date</label>
                      <div class="input-group date date-picker col-xs-12 col-lg-10 controls" data-date-format="yyyy-mm-dd">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                        <input type="text" name="second_party_joining_date" id="second_party_joining_date" autocomplete="off" placeholder="first party joining date" data-date-format="yyyy-mm-dd" class="form-control">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="second_party_terminate_date" class="col-xs-12 col-lg-2 control-label"> Terminate date</label>
                      <div class="input-group date date-picker col-xs-12 col-lg-10 controls" data-date-format="yyyy-mm-dd">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                        <input type="text" name="second_party_terminate_date" id="second_party_terminate_date" autocomplete="off" placeholder="first party joining date" data-date-format="yyyy-mm-dd" class="form-control">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="second_party_title" class="col-xs-12 col-lg-2 control-label">Status</label>
                      <div class="col-xs-12 col-lg-10 controls">
                        {!! Form::radio('second_party_status', 1, true) !!} working
                        {!! Form::radio('second_party_status', 0) !!} terminated
                      </div>
                    </div>

                  </div>
                </div>
                <!-- END Left Side -->
              </div>

              <div class="col-md-12" style="float: none; margin: 0 auto;">
                <div class="box box-red">
                  <div class="box-title">
                    <h3><i class="fa fa-bars"></i> LEGAL </h3>
                  </div>
                  <!-- BEGIN Left Side -->
                  <div class="box-content">

                    <div class="form-group">
                      <label for="second_party_identity" class="col-xs-12 col-lg-2 control-label"> ID </label>
                      <div class="col-xs-12 col-lg-10 controls">
                        <input type="file" name="second_party_identity" id="second_party_identity" placeholder="Second Party Title" class="form-control">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="second_party_cr" class="col-xs-12 col-lg-2 control-label"> CR </label>
                      <div class="col-xs-12 col-lg-10 controls">
                        <input type="file" name="second_party_cr" id="second_party_cr" placeholder="Second Party Title" class="form-control">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="second_party_tc" class="col-xs-12 col-lg-2 control-label"> TC </label>
                      <div class="col-xs-12 col-lg-10 controls">
                        <input type="file" name="second_party_tc" id="second_party_tc" placeholder="Second Party Title" class="form-control">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="second_party_tc" class="col-xs-12 col-lg-2 control-label"> Signature </label>
                      <div class="col-xs-12 col-lg-10 controls">
                        <input type="file" name="second_party_signature" id="second_party_signature" placeholder="Second Party Title" class="form-control">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="second_party_tc" class="col-xs-12 col-lg-2 control-label"> Seal </label>
                      <div class="col-xs-12 col-lg-10 controls">
                        <input type="file" name="second_party_seal" id="second_party_seal" placeholder="Second Party Title" class="form-control">
                      </div>
                    </div>

                  </div>
                </div>
                <!-- END Left Side -->
              </div>

            </div>

            <div class="form-group" style="background: transparent; border: none;">
              <div class="col-sm-6 col-lg-6">
                <button type="submit" class="btn btn-primary borderRadius pull-right"><i class="fa fa-check"></i> Save</button>
              </div>

              <div class="col-sm-6 col-lg-6">
                <button type="button" class="btn borderRadius">Cancel</button>
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
  $('#contract .submenu').first().css('display', 'block');
  $('#SecondParty .submenu').first().css('display', 'block');
  $('#SecondParty-create').addClass('active');
</script>
@stop
