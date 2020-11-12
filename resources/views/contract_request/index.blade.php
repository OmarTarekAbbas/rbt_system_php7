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
            @if(Auth::user()->hasRole(['super_admin','admin', 'ceo','Quality','RBT Upload']))
            <a class="btn btn-circle btn-success show-tooltip" href="{{url('contractrequests/create')}}" title="Create New content" href="#"><i class="fa fa-plus"></i></a>
            <a id="delete_button" onclick="delete_selected('contract_requests')" class="btn btn-circle btn-danger show-tooltip" title="Delete Many" href="#"><i class="fa fa-trash-o"></i></a>
            @endif
          </div><br><br>
          <div class="table-responsive" style="border:0">
            <table class="table table-advance data_content">
              <thead>
                <tr>
                  <th style="width:18px"><input type="checkbox" onclick="select_all('contract_requests')" /></th>
                  <th>id</th>
                  <th>title</th>
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
  $('#contract .submenu').first().css('display', 'block');
  $('#contract-index').addClass('active');


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
      ajax: "{{ url('contractrequests/ajax/allData') }}",
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
