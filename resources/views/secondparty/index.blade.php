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
                @if (Auth::user()->hasRole(['super_admin', 'legal', 'ceo']))

					<div class="btn-toolbar pull-right">
						<div class="btn-group">
							<a class="btn btn-circle show-tooltip" title="" href="{{url('SecondParty/create')}}" data-original-title="Add new record"><i class="fa fa-plus"></i></a>
						</div>
          </div>
          @endif
					<br><br>
					<div class="table-responsive">
						<table id="secondParty" class="table table-striped dt-responsive " cellspacing="0" width="100%">
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

    $(document).ready(function() {
        $('#secondParty').DataTable({
            "processing": true,
            "serverSide": true,
            "search": {
                "regex": true
            },
            ajax: "{!! url('secondparty/allData') !!}",
            columns: [{
                    data: "index",
                    searchable: false,
                    orderable: false
                },
                {
                    data: "id",
                    name: "id"
                },
                {
                    data: "secondparty_type",
                    name: "secondparty_type"
                },
                {
                    data: "second_party_title",
                    name: "second_party_title"
                },
                {
                    data: "second_party_joining_date",
                    name: "second_party_joining_date"
                },
                {
                    data: "second_party_terminate_date",
                    name: "second_party_terminate_date"
                },
                {
                    data: "second_party_status",
                    name: "second_party_status"
                },
                {
                    data: "second_party_identity",
                    name: "second_party_identity"
                },
                {
                    data: "second_party_cr",
                    name: "second_party_cr"
                },
                {
                    data: "second_party_tc",
                    name: "second_party_tc"
                },
                {
                    data: "action",
                    searchable: false
                }
            ],
            "pageLength": 10,
            stateSave: true

        });
    });
	</script>
@stop
