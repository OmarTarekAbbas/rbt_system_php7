@extends('template')
@section('page_title')
Employees
@stop
@section('content')
@include('errors')
<style>
.input-group[class*=col-]{
  padding-right: 15px;
    padding-left: 15px;
}
</style>
<?php
if(isset($employee)){
  if ($employee->release_date == null) {
    $release_date = null;
  }else{
    $release_date = date('d-m-Y',strtotime($employee->release_date));
  }
}
?>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-title">
                <h3><i class="fa fa-bars"></i>Add Employees Form</h3>
                <div class="box-tool">
                    <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
                    <a data-action="close" href="#"><i class="fa fa-times"></i></a>
                </div>
            </div>
            <div class="box-content">
                <form class="form-horizontal"
                    action="{{ isset($employee) ? url('employees/'.$employee->id.'/update') : url('employees') }}"
                    method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label">Full Name *</label>
                        <div class="col-sm-9 col-lg-10 controls">
                            <input type="text" name="full_name" placeholder="Full Name" class="form-control input-lg"
                                value="{{ isset($employee) ? $employee->full_name : old('full_name') }}" required>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label">Phone</label>
                        <div class="col-sm-9 col-lg-10 controls">
                            <input type="number" name="phone" placeholder="Phone" min="0" class="form-control input-lg"
                                value="{{ isset($employee) ? $employee->phone : old('phone') }}">
                        </div>
                    </div>



                    <div class="form-group">
                        <label for="event_start_date" class="col-xs-3 col-lg-2 control-label"> Release Date</label>
                        <div class="input-group date  event_start_date col-sm-9 col-lg-10 controls"
                            >
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            <input type="text" name="release_date" id="event_start_date" autocomplete="off"
                                placeholder="Release Date" data-date-format="dd-mm-yyyy" class="form-control"
                                value="{{ isset($employee) ? $release_date : old('release_date') }}"
                                >

                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label" for="code">Status</label>
                        <div class="col-sm-9 col-lg-10 controls">
                            <div class="form-check">
                                @if (isset($employee))
                                <input class="form-check-input" type="radio" name="status" id="exampleRadios1" required
                                    value="1" @if( $employee->status == 1) checked="checked" @endif >
                                @else
                                <input class="form-check-input" type="radio" name="status" id="exampleRadios1" required
                                    value="1">
                                @endif
                                <label class="form-check-label" for="exampleRadios1" style="padding-right: 11px;">
                                    In work
                                </label>
                                @if (isset($employee))
                                <input class="form-check-input" type="radio" name="status" id="exampleRadios2" required
                                    value="0" @if($employee->status == 0) checked="checked" @endif>
                                @else
                                <input class="form-check-input" type="radio" name="status" id="exampleRadios2" required
                                    value="0">
                                @endif
                                <label class="form-check-label" for="exampleRadios2">
                                    Leave
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label" for="code">Birth Certificate <span
                                style="font-weight:bold ;"> (شهاده ميلاد) </span></label>
                        <div class="col-sm-9 col-lg-10 controls">
                            <div class=" col-md-6 fileUpload">
                                <input type="file" name="birth_certificate" />
                            </div>
                            @if (isset($employee))
                            <div class="col-md-6">
                              @if($employee->birth_certificate)
                              <a class="btn btn-sm btn-success" href="{{url('uploads/employee_papers/'.$employee->birth_certificate)}}"
                              target="_blank">Review</a>
                                  @else
                                  <a class="btn btn-sm btn-danger" href="#0"
                                  >Review</a>
                                  @endif
                            </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label" for="code">Graduation Certificate <span
                                style="font-weight:bold ;"> (شهادة التخرج) </span></label>
                        <div class="col-sm-9 col-lg-10 controls">
                            <div class=" col-md-6 fileUpload">
                                <input type="file" name="graduation_certificate" />
                            </div>
                            @if (isset($employee))
                            <div class="col-md-6">
                              @if($employee->graduation_certificate)
                              <a class="btn btn-sm btn-success" href="{{url('uploads/employee_papers/'.$employee->graduation_certificate)}}"
                              target="_blank">Review</a>
                                  @else
                                  <a class="btn btn-sm btn-danger" href="#0"
                                  >Review</a>
                                  @endif
                            </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label" for="code">Army Certificate <span
                                style="font-weight:bold ;"> (شهادة الجيش) </span></label>
                        <div class="col-sm-9 col-lg-10 controls">
                            <div class="col-md-6 fileUpload">
                                <input type="file" name="army_certificate" />
                            </div>
                            @if (isset($employee))
                            <div class="col-md-6">
                              @if($employee->army_certificate)
                              <a class="btn btn-sm btn-success" href="{{url('uploads/employee_papers/'.$employee->army_certificate)}}"
                              target="_blank" >Review</a>
                                  @else
                                  <a class="btn btn-sm btn-danger" href="#0"
                                  >Review</a>
                                  @endif
                            </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label" for="code">Social insurance <span
                                style="font-weight:bold ;"> ( التامينات الاجتماعية) </span></label>
                        <div class="col-sm-9 col-lg-10 controls">
                            <div class="col-md-6 fileUpload">
                                <input type="file" name="insurance_certificate" />
                            </div>
                            @if (isset($employee))
                            <div class="col-md-6">
                              @if($employee->insurance_certificate)
                              <a class="btn btn-sm btn-success" href="{{url('uploads/employee_papers/'.$employee->insurance_certificate)}}"
                              target="_blank" >Review</a>
                                  @else
                                  <a class="btn btn-sm btn-danger" href="#0"
                                  >Review</a>
                                  @endif
                            </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label" for="code">Certificate of Police Record <span
                                style="font-weight:bold ;"> (فـيش وتشبـيـه) </span></label>
                        <div class="col-sm-9 col-lg-10 controls">
                            <div class=" col-md-6 fileUpload">
                                <input type="file" name="fish_watashbih" />
                            </div>
                            @if (isset($employee))
                            <div class="col-md-6">
                              @if($employee->fish_watashbih)
                              <a class="btn btn-sm btn-success" href="{{url('uploads/employee_papers/'.$employee->fish_watashbih)}}"
                              target="_blank">Review</a>
                                  @else
                                  <a class="btn btn-sm btn-danger" href="#0"
                                  >Review</a>
                                  @endif
                            </div>
                            @endif
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

@stop

@section('script')
<script>
$('#employees').addClass('active');
$('#employee-create').addClass('active');
</script>

<script>
    $(document).on('ready', function() {
        $('.event_start_date').datepicker({
            format: 'dd-mm-yyyy',
            autoclose: true,
        }).on('changeDate', function(selected) {
            var minDate = new Date(selected.date.valueOf());
            $('.event_end_date').datepicker('setStartDate', minDate);
            $('.event_end_date').datepicker('setDate', minDate);
        })
        $('.event_end_date').datepicker({
            format: 'dd-mm-yyyy',
            autoclose: true,
            startDate: moment().format('DD-MM-YYYY'),
        })

    })
</script>
@stop
