@extends('template')
@section('page_title')
    Roles
@stop
@section('content')
	<div class="row">
        <div class="col-md-12">
            <div class="box box-black">
                <div class="box-title">
                    <h3><i class="fa fa-table"></i> Role Table</h3>
                    <div class="box-tool">
                        <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
                        <a data-action="close" href="#"><i class="fa fa-times"></i></a>
                    </div>
                </div>
                <div class="box-content">
                    <div class="btn-toolbar pull-right">
                        <div class="btn-group">
                            <a class="btn btn-circle show-tooltip" title="" href="{{url('roles/new')}}" data-original-title="Add new record"><i class="fa fa-plus"></i></a>
                        </div>
                    </div>
                    <br><br>
					<div class="table-responsive">
					    <table class="table table-advance">
					        <thead>
					            <tr>
					                <th style="width:18px"><input type="checkbox"></th>
					                <th>name<div></div><div></div></th>
					                <th class="visible-md visible-lg" style="width:130px">Action</th>
					            </tr>
					        </thead>
					        <tbody>
						        @foreach($roles as $role)
						            <tr class="table-flag-blue">
						                <td><input type="checkbox"></td>
						                <td>{{$role->name}}</td>
						                <td class="visible-md visible-lg">
						                    <div class="btn-group">
                                    @if (get_action_icons('roles/{id}/edit', 'get'))
                                    <a class="btn btn-sm show-tooltip teet" title="" href="{{url('roles/'.$role->id.'/edit')}}" data-original-title="Edit"><i class="fa fa-edit"></i></a>
                                    @endif
                                    @if (get_action_icons('roles/{id}/delete', 'get'))
                                    <a class="btn btn-sm btn-danger show-tooltip" title="" onclick="return confirm('Are you sure you want to delete this ?');" href="{{url('roles/'.$role->id.'/delete')}}" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
                                    @endif
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
		$('#user .submenu').first().css('display', 'block');
		$('#role .submenu').first().css('display', 'block');
		$('#role-index').addClass('active');
	</script>
@stop
