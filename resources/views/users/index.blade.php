@extends('template')
@section('page_title')
Users
@stop
@section('content')
<div id="main-content">
  <div class="row">
    <div class="col-md-12 noPaddingPhone">
      <div class="box box-black">
        <div class="box-title">
          <h3><i class="fa fa-table"></i> Advance Table</h3>
          <div class="box-tool">
            <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
            <a data-action="close" href="#"><i class="fa fa-times"></i></a>

          </div>
        </div>
        <div class="box-content">
          <div class="btn-group pull-right">
              @if(get_action_icons('users/{id}/delete','get'))
              <a id="delete_button" onclick="delete_selected('users')" class="btn btn-circle btn-danger show-tooltip" title="Delete Many" href="#"><i class="fa fa-trash-o"></i></a>
              @endif
            </div><br><br>
          <div class="table-responsive">
            <table id="example" class="table table-striped dt-responsive" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th style="width:18px"><input type="checkbox"></th>
                  <th>Name<div></div>
                    <div></div>
                  </th>
                  <th>Email</th>
                  <th>Role</th>
                  {{-- <th>Role</th> --}}
                  <th class="visible-xs visible-md visible-lg" style="width:130px">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($users as $user)
                @if($user->email!=\Auth::user()->email)
                <tr class="table-flag-blue">
                  <td>
                    <input class="select_all_template" type="checkbox" name="selected_rows[]" value="{{$user->id}}" class="roles" onclick="collect_selected(this)">
                  </td>
                  <td>{{$user->name}}</td>
                  <td>{{$user->email}}</td>
                  <td>{{$user->roles()->first()->name}}</td>
                  {{-- <td>{{$user->roles()->first()}}</td> --}}
                  <td class="visible-xs visible-md visible-lg">
                    <div class="btn-group">
                      @if (get_action_icons('users/{id}/edit', 'get'))
                      <a class="btn btn-sm show-tooltip" title="" href="{{url('users/'.$user->id.'/edit')}}" data-original-title="Edit"><i class="fa fa-edit"></i></a>
                      @endif
                      @if (get_action_icons('users/{id}/delete', 'get'))
                      <a class="btn btn-sm btn-danger show-tooltip" title="" onclick="return confirm('Are you sure you want to delete this ?');" href="{{url('users/'.$user->id.'/delete')}}" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
                      @endif


                    </div>
                  </td>
                </tr>
                @endif
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
  $('#user .submenu').first().css('display', 'block');
  $('#user-index').addClass('active');
</script>
@stop
