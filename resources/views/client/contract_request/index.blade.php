@extends('template')
@section('page_title')
ContractRequests
@stop
@section('content')


<div id="main-content">
  <div class="row">
    <div class="col-md-12 noPaddingPhone">
      <div class="box box-blue">
        <div class="box-title">
          <h3><i class="fa fa-table"></i> ContractRequest Table</h3>
          <div class="box-tool">
            <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
            <a data-action="close" href="#"><i class="fa fa-times"></i></a>
          </div>
        </div>
        <div class="box-content">
          <div class="btn-group">
          </div><br><br>
          <div class="table-responsive" style="border:0">
            <table class="table table-advance data_content">
              <thead>
                <tr>
                  <th style="width:18px"><input type="checkbox" onclick="select_all('contract_requests')" /></th>
                  <th>id</th>
                  <th>title</th>
                  <th>first party</th>
                  <th>second party</th>
                  <th>second party type</th>
                  <th>service type</th>
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

$('#client').addClass('active');
$('#requests').addClass('active');


  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
    }
  });
  $(document).ready(function() {
    $('.data_content').DataTable({
      "processing": true,
      "serverSide": true,
      "search": {
        "regex": true
      },
      ajax: "{{ url('client/contractrequests/ajax/allData') }}",
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
          data: "title",
          name: "title"
        },
        {
          data: "first_party_id",
          name: "first_party_id"
        },
        {
          data: "second_party_id",
          name: "second_party_id"
        },
        {
          data: "second_party_type_id",
          name: "second_party_type_id"
        },
        {
          data: "service_type_id",
          name: "service_type_id"
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
