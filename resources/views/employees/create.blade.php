@extends('template')
@section('page_title')
Employees
@stop
@section('content')
@include('errors')
<style>
#start_date {
    text-align: right;
}

input[type="date"]::-webkit-datetime-edit,
input[type="date"]::-webkit-inner-spin-button,
input[type="date"]::-webkit-clear-button {
    color: #fff;
    position: relative;
}

input[type="date"]::-webkit-datetime-edit-year-field {
    position: absolute !important;
    padding: 2px;
    color: #000;
    left: 0;
}

input[type="date"]::-webkit-datetime-edit-month-field {
    position: absolute !important;
    padding: 2px;
    color: #000;
    left: 35px;
}

input[type="date"]::-webkit-datetime-edit-day-field {
    position: absolute !important;
    color: #000;
    padding: 2px;
    left: 63px;
}
</style>
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
                        <label class="col-sm-3 col-lg-2 control-label">Release Date</label>
                        <div class="col-sm-9 col-lg-10 controls">
                            <div class="input-group input-group-sm m-b" style="width:170px !important;">
                                <div class="input-group">
                                    <input type="date" class="form-control form-control-sm " name="release_date"
                                        id="start_date"
                                        value="{{ isset($employee) ? $employee->release_date : old('release_date') }}" />
                                </div>
                            </div>
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
                            <div class="fileUpload">
                                <input type="file" name="birth_certificate" />
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label" for="code">Graduation Certificate <span
                                style="font-weight:bold ;"> (شهادة التخرج) </span></label>
                        <div class="col-sm-9 col-lg-10 controls">
                            <div class="fileUpload">
                                <input type="file" name="graduation_certificate" />
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label" for="code">Army Certificate <span
                                style="font-weight:bold ;"> (شهادة الجيش) </span></label>
                        <div class="col-sm-9 col-lg-10 controls">
                            <div class="fileUpload">
                                <input type="file" name="army_certificate" />
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label" for="code">Social insurance <span
                                style="font-weight:bold ;"> ( التامينات الاجتماعية) </span></label>
                        <div class="col-sm-9 col-lg-10 controls">
                            <div class="fileUpload">
                                <input type="file" name="insurance_certificate" />
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label" for="code">Certificate of Police Record <span
                                style="font-weight:bold ;"> (فـيش وتشبـيـه) </span></label>
                        <div class="col-sm-9 col-lg-10 controls">
                            <div class="fileUpload">
                                <input type="file" name="fish_watashbih" />
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

@stop

@section('script')
<script>
$('#employees').addClass('active');
$('#employee-create').addClass('active');
</script>
@stop
