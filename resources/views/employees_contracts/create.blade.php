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
                <form class="form-horizontal" action="{{url('employees/'.$employee->id.'/contracts')}}" method="post"
                    enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label">Employee Name *</label>
                        <div class="col-sm-9 col-lg-10 controls">
                            <input type="text" value="{{$employee->full_name}}" class="form-control input-lg" readonly>
                            <input type="hidden" name="employee_id" value="{{$employee->id}}"
                                class="form-control input-lg" readonly>
                        </div>
                    </div>



                    <!-- <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label">Sign Date</label>
                        <div class="col-sm-9 col-lg-10 controls">
                            <div class="input-group input-group-sm m-b" style="width:170px !important;">
                                <div class="input-group">
                                    <input type="date" class="form-control form-control-sm " name="sign_date"
                                        id="start_date"  required/>
                                </div>
                            </div>
                        </div>
                    </div> -->

                    <div class="form-group">
                        <label for="event_start_date" class="col-xs-3 col-lg-2 control-label"> Sign Date</label>
                        <div class="input-group date  event_start_date col-sm-9 col-lg-10 controls">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            <input type="text" name="sign_date" id="event_start_date" autocomplete="off"
                                placeholder="Sign Date" data-date-format="dd-mm-yyyy" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label">Contract Period</label>
                        <div class="col-sm-9 col-lg-10 controls">
                            <select name='contract_period' class='form-control' id="contract_period" required>
                                <option>---Please Select---</option>
                                @foreach($years as $year)
                                <option data-type="@if(strpos($year->contract_duration_title,'Month')!==false) @endif"
                                    value="{{$year->contract_duration_title}}">{{$year->contract_duration_title}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <!-- <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label">End Date</label>
                        <div class="col-sm-9 col-lg-10 controls">
                            <div class="input-group input-group-sm m-b" style="width:170px !important;">
                                <div class="input-group">
                                    <input type="date" class="form-control form-control-sm " name="end_date"
                                        id="contract_expiry_date" required/>
                                </div>
                            </div>
                        </div>
                    </div> -->

                    <div class="form-group">
                        <label for="event_end_date" class="col-xs-3 col-lg-2 control-label"> Event End Date</label>
                        <div class="input-group date event_end_date col-sm-9 col-lg-10 controls"
                            >
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            <input type="text" name="end_date" id="event_end_date"
                                placeholder="Event End Date" data-date-format="dd-mm-yyyy" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label" for="code">Status</label>
                        <div class="col-sm-9 col-lg-10 controls">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="contract_status" id="exampleRadios1"
                                    required value="1">
                                <label class="form-check-label" for="exampleRadios1" style="padding-right: 11px;">
                                    New
                                </label>
                                <input class="form-check-input" type="radio" name="contract_status" id="exampleRadios2"
                                    required value="0">
                                <label class="form-check-label" for="exampleRadios2">
                                    Draft
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label" for="code">Contract File</label>
                        <div class="col-sm-9 col-lg-10 controls">
                            <div class="fileUpload">
                                <input type="file" name="contract_attachment" required />
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
