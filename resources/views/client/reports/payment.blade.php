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
          <div class="table-responsive" style="border:0">
            <table class="table table-advance data_content">
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
    $('.data_content').DataTable({
      "processing": true,
      "serverSide": true,
      "search": {
        "regex": true
      },
      ajax: "{{ url('client/payments/allData') }}",
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
          data: "contract",
          name: "contract"
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
        }
      ],
      "pageLength": 10,
      stateSave: true
    });
  });
</script>
@stop
