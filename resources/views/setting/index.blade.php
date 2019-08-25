@extends('template')
@section('page_title')
	Settings
@stop
@section('content')
	@include('errors')
<!-- BEGIN Content -->
<div id="main-content">
	<div class="row">
	    <div class="col-md-12">
	        <div class="box box-black">
	            <div class="box-title">
	                <h3><i class="fa fa-table"></i> Settings Table</h3>
	                <div class="box-tool">
	                    <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
	                    <a data-action="close" href="#"><i class="fa fa-times"></i></a>
	                </div>
	            </div>
	            <div class="box-content">
					<div class="btn-toolbar pull-right">
						<div class="btn-group">
							<a class="btn btn-circle show-tooltip" title="" href="{{url('setting/new')}}" data-original-title="Add new record"><i class="fa fa-plus"></i></a>
						</div>
					</div>
					<br><br>
					<div class="table-responsive">
						<table class="table table-advance">
						<thead>
							<tr>
								<th style="width:18px"><input type="checkbox"></th>
								<th>Key</th>
								<th>Value</th>
								{{-- <th>Created at</th> --}}
								<th class="visible-md visible-lg" style="width:130px">Action</th>
							</tr>
						</thead>
						<tbody>
						@foreach($settings as $setting)
							<tr class="table-flag-blue">
								<td><input type="checkbox"></td>
								<td>{{$setting->key}}</td>
								<td>{{$setting->value}}</td>
								{{-- <td>{{$setting->created_at}}</td> --}}
								<td class="visible-md visible-lg">
								    <div class="btn-group">
								    	<a class="btn btn-sm show-tooltip" title="" href="{{url('setting/'.$setting->id.'/edit')}}" data-original-title="Edit"><i class="fa fa-edit"></i></a>
								        <a class="btn btn-sm btn-danger show-tooltip" title="" onclick = 'return ConfirmDelete()' href="{{url('setting/'.$setting->id.'/delete')}}" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
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
		$('#setting').addClass('active');
		$('#setting-index').addClass('active');
	</script>
@stop