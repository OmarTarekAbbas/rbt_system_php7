@extends('template')
@section('page_title')
Employees
@stop
@section('content')

<div id="main-content">
  <div class="row">
    <div class="col-md-12 noPaddingPhone">
      <div class="box box-black">
        <div class="box-title">
          <h3><i class="fa fa-table"></i> Employees Table</h3>
          <div class="box-tool">
            <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
            <a data-action="close" href="#"><i class="fa fa-times"></i></a>
          </div>
        </div>
        <div class="box-content">

          <div class="table-responsive">
            <table id="example" class="table table-striped dt-responsive" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th style="width:18px"><input type="checkbox"></th>
                  <th>ID</th>
                  <th>Full Name<div></div>
                    <div></div>
                  </th>
                  <th>Phone</th>
                  <th>Release Date</th>
                  <th>Status</th>
                  <th class="visible-xs visible-md visible-lg" style="width:130px">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($employees as $employee)
                <tr class="table-flag-blue">
                  <td><input type="checkbox"></td>
                  <td>{{$employee->id}}</td>
                  <td>{{$employee->full_name}}</td>
                  <td>{{$employee->phone}}</td>
                  <td>{{$employee->release_date}}</td>
                  <td>
                    @if ($employee->status == 1)
                    In work
                    @else
                    Leave
                    @endif
                  </td>
                  <td class="visible-xs visible-md visible-lg">
                    <div class="btn-group">
                      <a class="btn btn-sm btn-success show-tooltip" title="Add Employee Contracts" href="{{url("employees/create_contracts?employee_id=".$employee->id."&title=".$employee->full_name)}}" data-original-title="Add Employee Contracts"><i class="fa fa-plus"></i></a>

                      <a class="btn btn-sm btn-danger show-tooltip" title="" onclick="return confirm('Are you sure you want to delete this ?');" href="{{url('employees/'.$employee->id.'/delete')}}" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
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
</div>

@stop

@section('script')
<script>
  $('#employees').addClass('active');
  $('#employees-index').addClass('active');
</script>
@stop
