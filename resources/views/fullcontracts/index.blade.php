@extends('template')
@section('page_title')
Contract
@stop
@section('content')

<div id="main-content">
  <div class="row">
    <div class="col-md-12 noPaddingPhone">
      <div class="box box-blue">
        <div class="box-title">
          <h3><i class="fa fa-table"></i> Contract Table</h3>
          <div class="box-tool">
            <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
            <a data-action="close" href="#"><i class="fa fa-times"></i></a>
          </div>
        </div>
        <div class="box-content">
          @if (Auth::user()->hasRole(['super_admin', 'legal', 'ceo']))

          <div class="btn-group">
            <a class="btn btn-circle btn-success show-tooltip" href="{{url('fullcontracts/create')}}" title="Create New Rbt" href="#"><i class="fa fa-plus"></i></a>
            <a id="delete_button" onclick="delete_selected('contracts')" class="btn btn-circle btn-danger show-tooltip" title="Delete Many" href="#"><i class="fa fa-trash-o"></i></a>
          </div>
          @endif
          <br>
          <br>
          <label class="text-muted" for="date">Filter By Sign Date</label>
          <select id="signed_date" class="form-control chosen" data-placeholder="Filter By Sign Date" name="date" tabindex="1">
            <option value="{{null}}">ALL</option>
            @foreach( range( date('Y') , date('Y')-10 ) as $year )
            <option value="{{$year}}">{{$year}}</option>
            @endforeach
          </select>
          <hr>
          {{--<label class="text-muted" for="page_input">Filter By Page</label>
        <select id="page_input" class="form-control chosen" data-placeholder="Filter By page" name="page"
          tabindex="1">
          <option value="{{null}}">ALL</option>
          @foreach( range( 0 , $contracts->lastPage() ) as $page )
          <option value="{{$page}}">{{$page+1}}</option>
          @endforeach
          </select>
          <hr> --}}
          <div class="table-responsive" style="border:0">
            <table class="table table-advance data_contract">
              <thead>
                <tr>
                  <th style="width:18px"><input type="checkbox" /></th>
                  <th>id</th>
                  <th>Code</th>
                  <th>Service Type</th>
                  <th>Label</th>
                  <th>Contract Status</th>
                  <th>First Party</th>
                  <th>Second Party</th>
                  <th>Second Party Type</th>
                  <th>Contract Date</th>
                  <th>Contract Signed Date</th>
                  <th>Expiry Date</th>
                  <th class="visible-xs visible-md visible-lg" style="width:130px">Show Attachments</th>
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
$('#contract .submenu').first().css('display', 'block');
$('#contract-index').addClass('active');
$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
  }
});
$(document).ready(function() {
  datatable_draw_func()
});

$('#signed_date').change(function (e) {
  datatable_draw_func();
});

// $('#page_input').change(function (e) {
//   datatable_draw_func();
// });

function datatable_draw_func(params) {

  var date = $('#signed_date').val();
  // var page = $('#page_input').val();
  // var x = '&';
  $(".data_contract").dataTable().fnDestroy()

  var table = $('.data_contract').DataTable({
    order: [ [7, 'desc'] ],
    "processing": true,
    "serverSide": true,
    "search": {
      "regex": true
    },
    // ajax: `{{url('contracts/allData')}}`,
    // ajax: `{{url('contracts/allData?page=${page}${x}date=${date}')}}`,
    ajax: `{{url('contracts/allData?date=${date}')}}`,
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
      data: "code",
      name: "code"
    },
    {
      data: "service_type",
      name: "service_type"
    },
    {
      data: "contract_label",
      name: "contract_label"
    },
    {
      data: "contract_status",
      name: "contract_status"
    },
    {
      data: "first_parties",
      name: "first_parties"
    },
    {
      data: "second_parties",
      name: "second_parties"
    },
    {
      data: "second_party_types",
      name: "second_party_types"
    },
    {
      data: "contract_date",
      name: "contract_date"
    },
    {
      data: "contract_signed_date",
      name: "contract_signed_date"
    },
    {
      data: "contract_expiry_date",
      name: "contract_expiry_date"
    },
    {
      data: "action1",
      searchable: false
    },
    {
      data: "action",
      searchable: false
    }
    ],
      "pageLength": 10,
      stateSave: true

  });
  // $( ".paginate_button  [data-dt-idx='"+page+"']" ).trigger("click");
}
</script>
@stop
