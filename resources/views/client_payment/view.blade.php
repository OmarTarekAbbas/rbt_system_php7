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
          <h3><i class="fa fa-table"></i> ClientPayments Table</h3>
          <div class="box-tool">
            <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
            <a data-action="close" href="#"><i class="fa fa-times"></i></a>
          </div>
        </div>
        <div class="box-content">
          <div class="table-responsive">
            <table class="table table-striped table-bordered ">
              <tbody>
                <tr>
                  <td width='30%' class='label-view text-left'>ID</td>
                  <td>{{$clientPayment->id}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left'>Provider</td>
                  <td>{{$clientPayment->provider->second_party_title}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left'>Contract</td>
                  <td>
                    <a href="{{url('fullcontracts/'.$clientPayment->contract_id)}}" target="_blank">

                      {{$clientPayment->contract->contract_code}} {{$clientPayment->contract->contract_label}}
                    </a>
                  </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left'>Year</td>
                  <td>{{$clientPayment->year}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left'>Month</td>
                  <td>{{$clientPayment->month}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left'>Amount</td>
                  <td>{{$clientPayment->amount}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left'>currency</td>
                  <td>{{$clientPayment->currency->title}} </td>
                </tr>

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
</script>
@stop
