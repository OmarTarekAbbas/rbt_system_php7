@extends('template')
@section('page_title')
FirstParties
@stop
@section('content')
@include('errors')
<style>
  .input-group[class*=col-] {
    float: none;
    padding-right: 15px;
    padding-left: 15px;
  }
</style>
<div class="row">
  <div class="col-md-12">
    <div class="box">
      <div class="box-title">
        <h3><i class="fa fa-bars"></i>Edit FirstPartie Form</h3>
        <div class="box-tool">
          <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
          <a data-action="close" href="#"><i class="fa fa-times"></i></a>
        </div>
      </div>
      <div class="box-content">
        <div class="row">
          <div class="col-md-12">
            <form class="width_m_auto form-horizontal" action="{{route('admin.firstparties.update',['firstpartie' => $firstpartie])}}" method="post" enctype="multipart/form-data">
              @method('patch')
              {{ csrf_field() }}
              <div class="form-group">
                <label class="col-sm-3 col-lg-2 control-label">Title *</label>
                <div class="col-sm-9 col-lg-10 controls">
                  {{-- {!! Form::text('category_name',null,['placeholder'=>'Category Name','class'=>'form-control input-lg']) !!} --}}
                  <input type="text" name="first_party_title" placeholder="FirstPartie Title" class="form-control input-lg" value="{{$firstpartie->first_party_title}}" required>
                  <span class="help-inline">Enter a new FirstPartie Title</span>
                </div>
              </div>

              <div class="form-group">
                <label for="first_party_joining_date" class="col-xs-3 col-lg-2 control-label">
                  Joining date</label>
                <div class="input-group date date-picker col-sm-9 col-lg-10 controls" data-date-format="dd-mm-yyyy">
                  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                  <input type="text" name="first_party_joining_date" id="first_party_joining_date" autocomplete="off" placeholder="first party joining date" value="{{$firstpartie->first_party_joining_date->format('d-m-Y')}}" data-date-format="dd-mm-yyyy" class="form-control">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-3 col-lg-2 control-label" for="code"> Signature </label>
                <div class="col-sm-9 col-lg-10 controls">
                  <div class="fileUpload">
                    <input type="file" name="first_party_signature" id="first_party_signature" placeholder="Second Party Title" class="form-control">
                  </div>
                  @if($firstpartie->first_party_signature)
                  <a class="btn btn-sm btn-success" href="{{ url($firstpartie->first_party_signature) }}" target="_blank">Review</a>
                  @endif
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-3 col-lg-2 control-label" for="code"> Seal </label>
                <div class="col-sm-9 col-lg-10 controls">
                  <div class="fileUpload">
                    <input type="file" name="first_party_seal" id="first_party_seal" placeholder="Second Party Title" class="form-control">
                  </div>
                  @if($firstpartie->first_party_seal)
                  <a class="btn btn-sm btn-success" href="{{ url($firstpartie->first_party_seal) }}" target="_blank">Review</a>
                  @endif
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-9 col-lg-12">
                  <input type="submit" class="btn btn-primary mAuto_dBlock" value="Submit">
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

    </div>
  </div>

</div>

@stop

@section('script')
<script>
  $('#firstparties').addClass('active');
  $('#firstparties-create').addClass('active');
</script>
@stop
