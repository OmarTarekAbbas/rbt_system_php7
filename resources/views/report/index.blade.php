@extends('template')
@section('page_title')
RBTs
@stop
@section('content')
<div id="main-content">
  <div class="row">
    <div class="col-md-12 noPaddingPhone">
      <div class="box box-blue">
        <div class="box-title">
          <h3><i class="fa fa-table"></i> Report Table</h3>
          <div class="box-tool">
            <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
            <a data-action="close" href="#"><i class="fa fa-times"></i></a>
          </div>
        </div>
        <div class="box-content">

          <div class="table-responsive">
            <table id="" class="table table-striped dt-responsive data_report" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th style="width:18px"><input type="checkbox"></th>
                  <th>Rbt Id</th>
                  <th>Rbt Title</th>
                  <th>Year</th>
                  <th>Month</th>
                  <th>Code</th>
                  <th>Classification</th>
                  <th>Download Number</th>
                  <th>Total Revenue</th>
                  <th>Revenue Share</th>
                  <th>Provider Title</th>
                  <th>Operator Title</th>
                  <th>Aggregator Title</th>
                  <th class="visible-xs visible-md visible-lg" style="width:130px">Action</th>
                </tr>
              </thead>

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
  $('#rbt .submenu').first().css('display', 'block');
  $('#report .submenu').first().css('display', 'block');
  $('#report-index').addClass('active');

  $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
        }
    });
    $(document).ready(function() {
        $('.data_report').DataTable({
            "processing": true,
            "serverSide": true,
           "search": {"regex": true},
            ajax: "{!! url('report_all/allData') !!}",
            columns: [{
                    data: "index",
                    searchable: false,
                    orderable: false
                },
                {
                    data: "rbt_id",
                    name: "rbt_id"
                },
                {
                    data: "rbt_name",
                    name: "rbt_name"
                },
                {
                    data: "year",
                    name: "year"
                },
                {
                    data: "month",
                    name: "month"
                },
                {
                    data: "code",
                    name: "code"
                },
                {
                    data: "classification",
                    name: "classification"
                },
                {
                    data: "download_no",
                    name: "download_no"
                },
                {
                    data: "total_revenue",
                    name: "total_revenue"
                },
                {
                    data: "revenue_share",
                    name: "revenue_share"
                },
                {
                    data: "second_party_id",
                    name: "second_party_id"
                },


                {data: 'operator_id', name:'operator.title'},
                {
                    data: "aggregator_id",
                    name: "aggregator_id"
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
