@extends('template')
@section('page_title')
Contract Template
@stop
@section('content')

<!-- BEGIN Content -->
<div id="main-content">
  @include('errors')
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-title">
          <h3><i class="fa fa-bars"></i>Contract Template</h3>
          <div class="box-tool">
            <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
            <a data-action="close" href="#"><i class="fa fa-times"></i></a>
          </div>
        </div>
        <div class="box-content">


          <form action="{{url("ContractTemplate/$ContractTemplate->id")}}" method="POST" class="form-horizontal form-bordered form-row-stripped"
            enctype="multipart/form-data" novalidate>
            @method('PATCH')
            @csrf
            <input id="hidden_key" name="key" type="hidden" />

            <div class="form-group">
              <label for="textfield5" class="col-sm-3 col-lg-2 control-label">title *</label>
              <div class="col-sm-9 col-lg-10 controls">
                  <input type="text" name="title" id="title" placeholder="Title" class="form-control" required value="{{$ContractTemplate->title}}">
              </div>
            </div>

           <div class="form-group">
              <label for="textfield5" class="col-sm-3 col-lg-2 control-label">Type *</label>
              <div class="col-sm-9 col-lg-10 controls">
                {!! Form::select('content_type',[ 1 => 'IN', 2 => 'OUT' ],$ContractTemplate->content_type,['class'=>'form-control chosen-rtl btn-lg','required' => true,'style'=>'height: 48px;']) !!}
              </div>
            </div>

            <div class="form-group last">
              <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2">
                <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Save</button>
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
  $('#ServiceTypes').addClass('active');
        $('#ServiceTypes-create').addClass('active');
</script>
@stop
