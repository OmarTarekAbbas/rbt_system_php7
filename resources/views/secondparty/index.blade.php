@extends('template')
@section('page_title')
Second Party
@stop
@section('content')
	@include('errors')
<!-- BEGIN Content -->
<div id="main-content">
	<div class="row">
	    <div class="col-md-12">
	        <div class="box box-black">
	            <div class="box-title">
	                <h3><i class="fa fa-table"></i> Second Party Table</h3>
	                <div class="box-tool">
	                    <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
	                    <a data-action="close" href="#"><i class="fa fa-times"></i></a>
	                </div>
	            </div>
	            <div class="box-content">
                @if (Auth::user()->hasRole(['super_admin', 'legal']))

					<div class="btn-toolbar pull-right">
						<div class="btn-group">
							<a class="btn btn-circle show-tooltip" title="" href="{{url('SecondParty/create')}}" data-original-title="Add new record"><i class="fa fa-plus"></i></a>
						</div>
          </div>
          @endif
					<br><br>
					<div class="table-responsive">
						<table id="example" class="table table-striped dt-responsive" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th style="width:18px"><input type="checkbox" onclick="select_all('SecondParty')"></th>
								<th>Id</th>
								<th>Second Party Type Title</th>
								<th>second party title</th>
								<th>second_party_joining_date</th>
								<th>second_party_terminate_date</th>
								<th>second_party_status</th>
								<th>second_party_identity</th>
								<th>second_party_cr</th>
								<th>second_party_tc</th>
								<th class="visible-md visible-lg" style="width:130px">Action</th>
							</tr>
						</thead>
						<tbody id="tablecontents">
						@foreach($SecondPartys as $SecondParty)
							<tr class="table-flag-blue">
								<td><input class="select_all_template" type="checkbox" name="selected_rows[]" value="{{$SecondParty->second_party_id}}" onclick="collect_selected(this)"></td>
								<td>{{$SecondParty->second_party_id}}</td>
								<td>{{$SecondParty->type->second_party_type_title}}</td>
								<td>{{$SecondParty->second_party_title}}</td>
								<td>{{$SecondParty->second_party_joining_date}}</td>
								<td>{{$SecondParty->second_party_terminate_date}}</td>
								<td>{{$SecondParty->second_party_status}}</td>
                @if($SecondParty->second_party_identity && file_exists(base_path($SecondParty->second_party_identity)))
                  <td><a class="btn btn-primary" target="_blank" href="{{url($SecondParty->second_party_identity)}}">Preview</a></td>
                @else
                  <td><a class="btn disabled">No File</a></td>
                @endif
                @if($SecondParty->second_party_cr && file_exists(base_path($SecondParty->second_party_cr)))
                  <td><a class="btn btn-primary" target="_blank" href="{{url($SecondParty->second_party_cr)}}">Preview</a></td>
                  @else
                  <td><a class="btn disabled">No File</a></td>
                @endif
                @if($SecondParty->second_party_tc && file_exists(base_path($SecondParty->second_party_tc)))
                  <td><a class="btn btn-primary" target="_blank" href="{{url($SecondParty->second_party_tc)}}">Preview</a></td>
                  @else
                  <td><a class="btn disabled">No File</a></td>
                @endif
								<td class="visible-md visible-lg">
                  @if (Auth::user()->hasRole(['super_admin', 'legal']))

								    <div class="btn-group">
								    	<a class="btn btn-sm show-tooltip" title="" href="{{url('SecondParty/'.$SecondParty->second_party_id.'/edit')}}" data-original-title="Edit"><i class="fa fa-edit"></i></a>

                      <form action="{{url('SecondParty/'.$SecondParty->second_party_id)}}" method="POST" style="display: inline">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-sm btn-danger show-tooltip" type="submit" onclick = 'return ConfirmDelete()' data-original-title="Delete"><i class="fa fa-trash-o"></i></button>
                      </form>
                    </div>
                    @endif
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
    <script type="text/javascript" src="//code.jquery.com/ui/1.12.1/jquery-ui.js" ></script>
    <script type="text/javascript" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript">

    </script>
	<script>
    $('#contract .submenu').first().css('display', 'block');
		$('#SecondParty .submenu').first().css('display', 'block');
		$('#SecondParty-index').addClass('active');
	</script>
@stop
