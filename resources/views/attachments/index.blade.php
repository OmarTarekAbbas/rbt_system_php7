@extends('template')
@section('page_title')
attachment
@stop
@section('content')
	@include('errors')
<!-- BEGIN Content -->
<div id="main-content">
	<div class="row">
	    <div class="col-md-12">
	        <div class="box box-black">
	            <div class="box-title">
	                <h3><i class="fa fa-table"></i> attachment Table</h3>
	                <div class="box-tool">
	                    <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
	                    <a data-action="close" href="#"><i class="fa fa-times"></i></a>
	                </div>
	            </div>
	            <div class="box-content">
                @if (Auth::user()->hasRole(['super_admin', 'legal']))
					<div class="btn-toolbar pull-right">
						<div class="btn-group">
							<a class="btn btn-circle show-tooltip" title="" href="{{url('attachment/create')}}" data-original-title="Add new record"><i class="fa fa-plus"></i></a>
							<?php
								$table_name = "service_types" ;
							?>
						</div>
          </div>
          @endif
					<br><br>
					<div class="table-responsive">
						<table id="example" class="table table-striped dt-responsive" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th style="width:18px"><input type="checkbox" onclick="select_all('Attachments')"></th>
								<th>Id</th>
								<th>attachment code</th>
								<th>contract</th>
								<th>attachment_type</th>
								<th>attachment_title</th>
								<th>attachment_date</th>
								<th>attachment_expiry_date</th>
								<th>contract_expiry_date</th>
								<th>attachment_pdf</th>
								<th>attachment_status</th>
								<th>notes</th>
								<th class="visible-md visible-lg" style="width:130px">Action</th>
							</tr>
						</thead>
						<tbody id="tablecontents">
						@foreach($Attachments as $Attachment)
							<tr class="table-flag-blue">
								<td><input class="select_all_template" type="checkbox" name="selected_rows[]" value="{{$Attachment->id}}" onclick="collect_selected(this)"></td>
                <td>{{$Attachment->id}}</td>
								<td><a target="_blank" href="{{url($Attachment->attachment_pdf)}}">{{$Attachment->attachment_code}}</a></td>
								<td>{{optional($Attachment->contract)->contract_code}} - {{optional($Attachment->contract)->contract_label}}</td>
								<td>{{$Attachment->attachment_type}}</td>
								<td>{{$Attachment->attachment_title}}</td>
								<td>{{$Attachment->attachment_date}}</td>
								<td>{{$Attachment->attachment_expiry_date}}</td>
								<td>{{$Attachment->contract_expiry_date}}</td>
								<td><a target="_blank" href="{{url($Attachment->attachment_pdf)}}">Preview</a></td>
								<td>{{$Attachment->attachment_status}}</td>
								<td>{{$Attachment->notes}}</td>
								<td class="visible-md visible-lg">
                  @if (Auth::user()->hasRole(['super_admin', 'legal']))
								    <div class="btn-group">
								    	<a class="btn btn-sm show-tooltip" title="" href="{{url('attachment/'.$Attachment->id.'/edit')}}" data-original-title="Edit"><i class="fa fa-edit"></i></a>

                      <form action="{{url('attachment/'.$Attachment->id)}}" method="POST" style="display: inline">
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
		$('#Attachment .submenu').first().css('display', 'block');
		$('#Attachment-index').addClass('active');
	</script>
@stop
