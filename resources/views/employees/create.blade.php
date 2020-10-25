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
                <form class="form-horizontal" action="{{url('employees')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label">Full Name *</label>
                        <div class="col-sm-9 col-lg-10 controls">
                            <input type="text" name="full_name" placeholder="Full Name" class="form-control input-lg"
                                required>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label">Phone</label>
                        <div class="col-sm-9 col-lg-10 controls">
                            <input type="number" name="phone" placeholder="Phone" min="0" class="form-control input-lg">
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label">Release Date</label>
                        <div class="col-sm-9 col-lg-10 controls">
                            <div class="input-group input-group-sm m-b" style="width:170px !important;">
                                <div class="input-group">
                                    <input type="date" class="form-control form-control-sm " name="release_date"
                                        id="start_date" />
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label" for="code">Status</label>
                        <div class="col-sm-9 col-lg-10 controls">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="exampleRadios1" required
                                    value="1">
                                <label class="form-check-label" for="exampleRadios1" style="padding-right: 11px;">
                                    In work
                                </label>
                                <input class="form-check-input" type="radio" name="status" id="exampleRadios2" required
                                    value="0">
                                <label class="form-check-label" for="exampleRadios2">
                                    Leave
                                </label>
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
