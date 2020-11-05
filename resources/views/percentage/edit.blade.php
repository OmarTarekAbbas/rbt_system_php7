@extends('template')
@section('page_title')
Percentages
@stop
@section('content')
@include('errors')
<div class="row">
  <div class="col-md-12">
    <div class="box">
      <div class="box-title">
        <h3><i class="fa fa-bars"></i>Add Percentage Form</h3>
        <div class="box-tool">
          <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
          <a data-action="close" href="#"><i class="fa fa-times"></i></a>
        </div>
      </div>
      <div class="box-content">
        <form class="width_m_auto form-horizontal" action="{{url('percentages/'.$percentage->id)}}" method="post">
          @method('put')
          {{ csrf_field() }}
          <div class="form-group">
            <label class="col-sm-3 col-lg-2 control-label">Percentage *</label>
            <div class="col-sm-9 col-lg-10 controls">
              {{-- {!! Form::text('category_name',null,['placeholder'=>'Category Name','class'=>'form-control input-lg']) !!} --}}
              <input type="number" name="percentage" value="{{$percentage->percentage}}" placeholder="Percentage" class="form-control input-lg" required>
              <span class="help-inline">Percentage </span>
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

@stop

@section('script')
<script>
  $('#percentages').addClass('active');
  $('#percentages-create').addClass('active');
</script>
@stop
