@extends('template')
@section('page_title')
Employees Contracts
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
                <h3><i class="fa fa-bars"></i>Add Employees Contracts Form</h3>
                <div class="box-tool">
                    <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
                    <a data-action="close" href="#"><i class="fa fa-times"></i></a>
                </div>
            </div>
            <div class="box-content">

                <form class="form-horizontal"
                    action="{{ isset($employee_contract) ? url('employee_contract/'.$employee_contract->id.'/update') : url('employees/'.$employee->id.'/contracts') }}"
                    method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label">Employee Name *</label>
                        <div class="col-sm-9 col-lg-10 controls">
                            <input type="text" value="{{$employee->full_name}}" class="form-control input-lg" readonly>
                            <input type="hidden" name="employee_id" value="{{$employee->id}}"
                                class="form-control input-lg" readonly>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="event_start_date" class="col-xs-3 col-lg-2 control-label"> Sign Date</label>
                        <div class="input-group date  event_start_date col-sm-9 col-lg-10 controls">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            <input type="text" name="sign_date" id="event_start_date" autocomplete="off"
                                placeholder="Sign Date" data-date-format="dd-mm-yyyy" class="form-control"
                                value="{{ isset($employee_contract) ? date('d-m-Y',strtotime($employee_contract->sign_date)) : old('sign_date') }}"
                                required>

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label">Contract Period</label>
                        <div class="col-sm-9 col-lg-10 controls">
                            <select name='contract_period' class='form-control' id="contract_period" required>
                                <option>---Please Select---</option>
                                @foreach($years as $year)
                                @if (isset($employee_contract))
                                <option data-type="@if(strpos($year->contract_duration_title,'Month')!==false) @endif"
                                    value="{{$year->contract_duration_title}}" @if($employee_contract->
                                    contract_period==$year->contract_duration_title) selected="selected" @endif>
                                    {{$year->contract_duration_title}}
                                </option>
                                @else
                                <option data-type="@if(strpos($year->contract_duration_title,'Month')!==false) @endif"
                                    value="{{$year->contract_duration_title}}">
                                    {{$year->contract_duration_title}}
                                </option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="event_end_date" class="col-xs-3 col-lg-2 control-label">End Date</label>
                        <div class="input-group date event_end_date col-sm-9 col-lg-10 controls">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            <input type="text" name="end_date" id="event_end_date" placeholder=" End Date"
                                data-date-format="dd-mm-yyyy" class="form-control"
                                value="{{ isset($employee_contract) ? date('d-m-Y',strtotime($employee_contract->end_date)) : old('end_date') }}"
                                required>

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label" for="code">Status</label>
                        <div class="col-sm-9 col-lg-10 controls">
                            <div class="form-check">
                                @if (isset($employee_contract))
                                <input class="form-check-input" type="radio" name="contract_status" id="exampleRadios1"
                                    required value="1" @if( $employee_contract->contract_status == 1) checked="checked"
                                @endif>
                                @else
                                <input class="form-check-input" type="radio" name="contract_status" id="exampleRadios1"
                                    required value="1">
                                @endif
                                <label class="form-check-label" for="exampleRadios1" style="padding-right: 11px;">
                                    New
                                </label>
                                @if (isset($employee_contract))
                                <input class="form-check-input" type="radio" name="contract_status" id="exampleRadios2"
                                    required value="0" @if( $employee_contract->contract_status == 0) checked="checked"
                                @endif>
                                @else
                                <input class="form-check-input" type="radio" name="contract_status" id="exampleRadios2"
                                    required value="0">
                                @endif
                                <label class="form-check-label" for="exampleRadios2">
                                    Draft
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label" for="code">Contract Attachment</label>
                        <div class="col-sm-9 col-lg-10 controls">
                            <div class="col-md-6 fileUpload">
                                <input type="file" name="contract_attachment" />
                            </div>
                            @if (isset($employee_contract))


                                <div class="col-md-6">
                              @if($employee_contract->contract_attachment)
                              <a class="btn btn-sm btn-success" href="{{url('uploads/employee_contract/'.$employee_contract->contract_attachment)}}"
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
$(document).on('ready', function() {
    $('.event_start_date').datepicker({
        format: 'dd-mm-yyyy',
        autoclose: true,
    })
})
$(document).on('ready', function() {
    $('.event_end_date').datepicker({
        format: 'dd-mm-yyyy',
        autoclose: true,
    })
})
</script>

<script>
$('#employees').addClass('active');
$('#employee-create').addClass('active');


$("#contract_period").change(function() {
    years = ($(this).find('option:selected').text()).match(/\d+/)[0];
    setEndDate($("#event_start_date").val(), years)
})

$("#event_start_date").change(function() {
    var endDate = $(this).val();
    setEndDate(endDate, years)
});

function setEndDate(endDate, years) {
    $("#event_end_date").val(moment(endDate, "DD-MM-YYYY").locale('en').add(years, 'years').subtract(1, 'days').format(
        'DD-MM-YYYY'))
}
</script>



@stop