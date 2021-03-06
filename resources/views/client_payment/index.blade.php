@extends('template')
@section('page_title')
ClientPayments
@stop
@section('content')


<div id="main-content">
  <div class="row">
    <div class="col-md-12 noPaddingPhone">
      <div class="box box-blue">
        <div class="box-title">
          <h3><i class="fa fa-table"></i> ClientPayment Table</h3>
          <div class="box-tool">
            <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
            <a data-action="close" href="#"><i class="fa fa-times"></i></a>
          </div>
        </div>
        <div class="box-content">
          <div class="btn-group">
          @if(get_action_icons('clientpayments/create','get'))
            <a class="btn btn-circle btn-success show-tooltip" href="{{url('clientpayments/create')}}" title="Create New content" href="#"><i class="fa fa-plus"></i></a>
            @endif
            <!-- @if(get_action_icons('delete_multiselect','post'))
            <a id="delete_button" onclick="delete_selected('client_payments')" class="btn btn-circle btn-danger show-tooltip" title="Delete Many" href="#"><i class="fa fa-trash-o"></i></a>
            @endif -->
          </div><br><br>
          <div class="table-responsive" style="border:0">
            <table class="table table-advance data_client_payment">
              <thead>
                <tr>
                  <th style="width:18px"><input type="checkbox" onclick="select_all('client_payments')" /></th>
                  <th>id</th>
                  <th>contract</th>
                  <th>Provider</th>
                  <th>Amount</th>
                  <th>Currency</th>
                  <th>Year</th>
                  <th>Months</th>
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
  $('#clientpayments').addClass('active');
  $('#clientpayments-index').addClass('active');

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
    }
  });
  $(document).ready(function() {
    $('.data_client_payment').DataTable({
      "processing": true,
      "serverSide": true,
      "search": {
        "regex": true
      },
      ajax: "{{ url('clientpayments/ajax/allData') }}",
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
          data: "contract_code",
          name: "contract_code"
        },
        {
          data: "provider",
          name: "provider"
        },
        {
          data: "amount",
          name: "amount"
        },
        {
          data: "currency",
          name: "currency"
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
