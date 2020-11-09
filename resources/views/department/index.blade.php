@extends('template')
@section('page_title')
	Department
@stop
@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="box box-black">
				<div class="box-title">
					<h3><i class="fa fa-table"></i> Department Table</h3>
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
								<th>Department Title<div></div><div></div></th>
								<th>Department Email</th>
								<th>Manager</th>
								{{-- <th>Role</th> --}}
								<th class="visible-md visible-lg" style="width:130px">Action</th>
							</tr>
							</thead>
							<tbody>
							@foreach($departments as $department)
									<tr class="table-flag-blue">
										<td><input type="checkbox"></td>
										<td>{{$department->title}}</td>
										<td>{{$department->email}}</td>
										<td>{{$department->manager->name}}</td>
										<td class="visible-md visible-lg">
											<div class="btn-group">
                        @if(get_action_icons('department/{department}/edit','get'))
												<a class="btn btn-sm show-tooltip" title="" href="{{url('department/'.$department->id.'/edit')}}" data-original-title="Edit"><i class="fa fa-edit"></i></a>
                        @endif
                        @if(get_action_icons('department/{id}/delete','get'))
                        <a class="btn btn-sm btn-danger show-tooltip" title="" onclick="return confirm('Are you sure you want to delete this ?');" href="{{url('department/'.$department->id.'/delete')}}" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
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
		$('#department').addClass('active');
		$('#department-index').addClass('active');
	</script>
@stop
