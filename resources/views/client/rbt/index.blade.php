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
          <h3><i class="fa fa-table"></i> RBT Table</h3>
          <div class="box-tool">
            <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
            <a data-action="close" href="#"><i class="fa fa-times"></i></a>
          </div>
        </div>
        <div class="box-content">
          <div class="btn-group pull-right">

          </div>
          <br>
          <br>
          <div class="table-responsive" style="border:0">
            <table class="table table-advance data_rbt">
              <thead>
                <tr>
                  <th style="width:18px"><input type="checkbox" onclick="select_all('rbts')" /></th>
                  <th>id</th>
                  <th>Internal Coding</th>
                  <th>Type</th>
                  <th>Title</th>
                  <th>Code</th>
                  <th>Provider</th>
                  <th>Track File</th>
                  <th>Operator Title</th>
                  <th>Occasion Title</th>
                  <th>Master Content Title</th>
                  <th>owner</th>
                  <th>Aggregator Title</th>
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
    $('#rbt .submenu').first().css('display', 'block');
    $('#rbt-index').addClass('active');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
        }
    });
    $(document).ready(function() {
        $('.data_rbt').DataTable({
            "processing": true,
            "serverSide": true,
            "search": {
                "regex": true
            },
            ajax: "{!! request()->filled('client_id') ?  url('client/rbt/ajax/allData?client_id='.request()->get('client_id')) : url('client/rbt/ajax/allData') !!}",
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
                    data: "rbt_internal_coding",
                    name: "rbt_internal_coding"
                },
                {
                    data: "type",
                    name: "type"
                },
                {
                    data: "track_title_en",
                    name: "track_title_en"
                },
                {
                    data: "code",
                    name: "code"
                },
                {
                    data: "provider",
                    name: "provider"
                },
                {
                    data: "track_file",
                    name: "track_file"
                },
                {
                    data: "operator",
                    name: "operator"
                },
                {
                    data: "occasion",
                    name: "occasion"
                },
                {
                    data: "content",
                    name: "content"
                },
                {
                    data: "owner",
                    name: "owner"
                },
                {
                    data: "aggregator",
                    name: "aggregator"
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
    $(document).ajaxComplete(function() {
        $("audio").on("play", function() {
            $("audio").not(this).each(function(index, audio) {
                audio.pause();
            });
        });
    });
</script>

@stop
