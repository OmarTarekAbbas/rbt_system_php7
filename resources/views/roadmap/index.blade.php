@extends('template')
@section('page_title')
RoadMap
@stop
@section('content')
<div id="main-content">
  <div class="row">
    <div class="col-md-12 noPaddingPhone">
      <div class="box box-black">
        <div class="box-title">
          <h3><i class="fa fa-table"></i> RoadMap Table</h3>
          <div class="box-tool">
            <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
            <a data-action="close" href="#"><i class="fa fa-times"></i></a>
          </div>
        </div>
        <div class="box-content">

          <div class="table-responsive">
            <table class="table table-advance data_content">
              <thead>
                <tr>
                  <th style="width:18px"><input type="checkbox" /></th>
                  <th>id</th>
                  <th>Event Title</th>
                  <th>Event Color</th>
                  <th>Occasion</th>
                  <th>Country</th>
                  <th>Operator</th>
                  <th>aggregator</th>
                  <th>event start date</th>
                  <th>event end date</th>
                  <th class="visible-xs visible-md visible-lg" style="width:130px">Action</th>
                </tr>
              </thead>
              <tbody>

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
		$('#roadmap').addClass('active');
		$('#roadmap-index').addClass('active');

    $(document).ready(function() {
        $('.data_content').DataTable({
            "processing": true,
            "serverSide": true,
            "search": {
                "regex": true
            },
            ajax: "{!! url('roadmap/allData') !!}",
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
                    data: "event_title",
                    name: "event_title"
                },
                {
                    data: "event_color",
                    name: "event_color"
                },
                {
                    data: "occasion",
                    name: "occasion"
                },
                {
                    data: "country",
                    name: "country"
                },
                {
                    data: "operator",
                    name: "operator"
                },
                {
                    data: "aggregator",
                    name: "aggregator"
                },
                {
                    data: "event_end_date",
                    name: "event_end_date"
                },
                {
                    data: "event_start_date",
                    name: "event_start_date"
                },
                {
                    data: "action",
                    searchable: false
                }
            ],
            "pageLength": 10
        });
    });
	</script>
@stop
