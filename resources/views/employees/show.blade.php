@extends('template')
@section('page_title')
Employee
@stop
@section('content')
<div class="row">
  <div class="col-md-4">
    <a class="btn btn-circle btn-primary show-tooltip " href="{{url('/employees')}}" title="List Employees">
      <i class="fa fa-eye"></i>
    </a>
    <a href="{{url('/employees')}}" title="List Employees">
      List Employees
    </a>

  </div>

  <div class="col-md-4" style="text-align: center;">
    <a class="btn btn-circle show-tooltip " href="{{url('employees/'.$employee->id.'/edit')}}" title="Edit Employee"><i class="fa fa-edit"></i></a>
    <a href="{{url('employees/'.$employee->id.'/edit')}}" title="Edit Employee">Edit Employee</a>

  </div>

  <div class="col-md-4" style="text-align: end;">
    <a class="btn btn-circle btn-success show-tooltip" href="{{url('employees/'.$employee->id.'/contracts')}}" title="" data-original-title="Create New Contract"><i class="fa fa-plus"></i></a>
    <a href="{{url('employees/'.$employee->id.'/contracts')}}" title="" data-original-title="Create New Contract">Create New Contract</a>

  </div>
  <br>
  <br>
</div>
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
        <div class="table-responsive width_m_auto" style="overflow-x: hidden;">
          <table class="table table-striped table-bordered ">
            <tbody>
              <tr>
                <td width='30%' class='label-view text-left' style="font-weight: bold">ID</td>
                <td>{{$employee->id}} </td>
              </tr>

              <tr>
                <td width='30%' class='label-view text-left' style="font-weight: bold">Full Name</td>
                <td>{{$employee->full_name}} </td>
              </tr>

              <tr>
                <td width='30%' class='label-view text-left' style="font-weight: bold">Phone</td>
                <td>{{$employee->phone}} </td>
              </tr>

              <tr>
                <td width='30%' class='label-view text-left' style="font-weight: bold">Status</td>
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
                <td width='30%' class='label-view text-left' style="font-weight: bold">Sign Date
                </td>
                @if($employee->sign_date)
                <td>
                  {{$employee->sign_date}}
                </td>
                @else
                <td>
                  ----
                </td>
                @endif
              </tr>

              <tr>
                <td width='30%' class='label-view text-left' style="font-weight: bold">Release Date
                </td>
                @if($employee->release_date)
                <td>
                  {{$employee->release_date}}
                </td>
                @else
                <td>
                  ----
                </td>
                @endif
              </tr>
              <tr>
                <td width='30%' class='label-view text-left' style="font-weight: bold">Employee Papers
                </td>
                <td>
                  <div class="row">
                    <div class="col-md-2">
                      <span style="font-weight: bold;margin-right: 10px;">Birth Certificate:
                      </span>
                      @if ($employee->birth_certificate)
                      <a href="{{url('uploads/employee_papers/'.$employee->birth_certificate)}}" target="_blank"><button class="btn btn-success">Review</button></a>
                      @else
                      <button class="btn btn-danger">Needed</button>
                      @endif
                    </div>
                    <div class="col-md-2">
                      <span style="font-weight: bold; margin-right: 10px">Graduation Certificate:
                      </span>
                      @if ($employee->graduation_certificate)
                      <a href="{{url('uploads/employee_papers/'.$employee->graduation_certificate)}}" target="_blank"><button class="btn btn-success">Review</button></a>
                      @else
                      <button class="btn btn-danger">Needed</button>
                      @endif
                    </div>

                    <div class="col-md-2">
                      <span style="font-weight: bold; margin-right: 10px">Army Certificate:
                      </span>
                      @if ($employee->army_certificate)
                      <a href="{{url('uploads/employee_papers/'.$employee->army_certificate)}}" target="_blank"><button class="btn btn-success">Review</button></a>
                      @else
                      <button class="btn btn-danger">Needed</button>
                      @endif
                    </div>

                    <div class="col-md-2">
                      <span style="font-weight: bold; margin-right: 10px">Social insurance:
                      </span>
                      @if ($employee->insurance_certificate)
                      <a href="{{url('uploads/employee_papers/'.$employee->insurance_certificate)}}" target="_blank"><button class="btn btn-success">Review</button></a>
                      @else
                      <button class="btn btn-danger">Needed</button>
                      @endif
                    </div>
                    <div class="col-md-3">
                      <span style="font-weight: bold; margin-right: 50px">Certificate of Police
                        Record: </span>
                      @if ($employee->fish_watashbih)
                      <a href="{{url('uploads/employee_papers/'.$employee->fish_watashbih)}}" target="_blank"><button class="btn btn-success">Review</button></a>
                      @else
                      <button class="btn btn-danger">Needed</button>
                      @endif
                    </div>



                  </div>
                </td>
              </tr>




            </tbody>
          </table>
          <br>
          <br>
          <br>
          <br>
        </div>

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
                <th class="visible-md visible-lg" style="width:130px">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($employee_contracts as $employee_contract)
              <tr class="table-flag-blue">
                <td>{{$employee_contract->id}}</td>
                <td>{{$employee_contract->contract_period}}</td>
                <td>{{$employee_contract->sign_date}}</td>
                <td>{{$employee_contract->end_date}}</td>
                <td>
                  @if ($employee_contract->contract_status == 1)
                  <button class="btn btn-success">New</button>
                  @else
                  <button class="btn btn-danger">Draft</button>
                  @endif
                </td>
                <td><a href="{{url('uploads/employee_contract/'.$employee_contract->contract_attachment)}}" target="_blank">Review</a></td>
                <td>
                  <div class="btn-group">
                    <a class="btn btn-sm show-tooltip" title="" href="{{url('employee_contract/'.$employee_contract->id.'/edit')}}" data-original-title="Edit"><i class="fa fa-edit"></i></a>
                    <a class="btn btn-sm btn-danger show-tooltip" title="" onclick="return confirm('Are you sure you want to delete this ?');" href="{{url('employee_contract/'.$employee_contract->id.'/delete')}}" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
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
