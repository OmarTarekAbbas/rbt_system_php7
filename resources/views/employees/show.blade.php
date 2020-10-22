@extends('template')
@section('page_title')
Employee
@stop
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="box box-blue">
            <div class="box-title">
                <h3><i class="fa fa-table"></i> Employee Table</h3>
                <div class="box-tool">
                    <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
                    <a data-action="close" href="#"><i class="fa fa-times"></i></a>
                </div>
            </div>
            <div class="box-content">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered ">
                        <tbody>
                            <tr>
                                <td width='30%' class='label-view text-right'>ID</td>
                                <td>{{$employee->id}} </td>
                            </tr>

                            <tr>
                                <td width='30%' class='label-view text-right'>Full Name</td>
                                <td>{{$employee->full_name}} </td>
                            </tr>

                            <tr>
                                <td width='30%' class='label-view text-right'>Phone</td>
                                <td>{{$employee->phone}} </td>
                            </tr>

                            <tr>
                                <td width='30%' class='label-view text-right'>Status</td>
                                @if ($employee->status == 1)
                                <td>
                                    <button class="btn btn-success">In work</button>
                                </td>
                                @else
                                <td>
                                    <button class="btn btn-danger">Leave</button>
                                </td>
                                @endif
                            </tr>

                            <tr>
                                <td width='30%' class='label-view text-right'>Release Date</td>
                                <td>{{$employee->release_date}} </td>
                            </tr>



                        </tbody>
                    </table>
                    <br>
                    <br>
                    <br>
                    <br>

                    <div class="table-responsive">
                        <table id="example" class="table table-striped dt-responsive" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Sign date<div></div>
                                        <div></div>
                                    </th>
                                    <th>Contract Period</th>
                                    <th>End Date</th>
                                    <th>Contract Status</th>
                                    <th>Attachment</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($employee_contracts as $employee_contract)
                                <tr class="table-flag-blue">
                                    <td>{{$employee_contract->id}}</td>
                                    <td>{{$employee_contract->sign_date}}</td>
                                    <td>{{$employee_contract->contract_period}}</td>
                                    <td>{{$employee_contract->end_date}}</td>
                                    <td>
                                        @if ($employee_contract->contract_status == 1)
                                        <button class="btn btn-success">New</button>
                                        @else
                                        <button class="btn btn-danger">Draft</button>
                                        @endif
                                    </td>
                                    <td><a href="{{url('uploads/employee_contract/'.$employee_contract->contract_attachment)}}" target="_blank">Review</a></td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>


@stop

@section('script')
<script>
$('#employees').addClass('active');
$('#employees-index').addClass('active');
</script>
@stop
