@extends('template')
@section('page_title')
ClientPayments
@stop
@section('content')
@include('errors')
<div id="main-content">
  <div class="row">
    <div class="col-md-12 noPaddingPhone">
      <div class="box">
        <div class="box-title">
          <h3><i class="fa fa-bars"></i>Create ClientPayment Form</h3>
          <div class="box-tool">
            <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
            <a data-action="close" href="#"><i class="fa fa-times"></i></a>
          </div>
        </div>
        <div class="box-content">
          <form method='POST' class="width_m_auto form-horizontal" action='{!! url("clientpayments")!!}' enctype="multipart/form-data">
            @csrf
            <div class="form-group ">
                <label class="col-sm-3 col-lg-2 control-label">Provider</label>
                <div class="col-sm-9 col-lg-10 controls">
                  <select id="input8" class="form-control second_party_id chosen" data-placeholder="Choose a provider" name="second_party_id">
                    <option value=""></option>
                    @foreach($second_partys as $key => $value)
                    <option value="{{$value->second_party_id}}">{{$value->second_party_title}}</option>
                    @endforeach
                  </select>
                </div>
            </div>

            <div class="form-group ">
              <label class="col-sm-3 col-lg-2 control-label">Contract</label>
              <div class="col-sm-9 col-lg-10 controls">
                <select id="contract_id" class="form-control chosen" data-placeholder="Choose a Contract" name="contract_id">
                  <option value=""></option>
                </select>
              </div>
            </div>

            <div class="form-group ">
              <label class="col-sm-3 col-lg-2 control-label">Year</label>
              <div class="col-sm-9 col-lg-10 controls">
                <select id="signed_date" class="form-control chosen" data-placeholder="Filter By Year" name="year" tabindex="1">
                  @foreach( range( date('Y')-10 , date('Y')+10 ) as $year )
                  <option @if( $year==date('Y') ) selected="selected" @endif value="{{$year}}">{{$year}}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="form-group ">
              <label class="col-sm-3 col-lg-2 control-label">Month</label>
              <div class="col-sm-9 col-lg-10 controls">
                <select class="form-control chosen" id="group_select" data-placeholder="Choose a month" name="month[]" multiple >
                <option id="select_all" value="all">All</option>
                  @for($month = 1 ; $month <= 12 ; $month++)
                  <option value="{{date("F", strtotime("$month/1/1"))}}">{{date("F", strtotime("$month/1/1"))}}</option>
                    @endfor
                </select>
              </div>
            </div>

            <div class="form-group ">
              <label class="col-sm-3 col-lg-2 control-label">Amount</label>
              <div class="col-sm-9 col-lg-10 controls">
               <input type="text" class="form-control" name="amount">
              </div>
            </div>

            <div class="form-group ">
                <label class="col-sm-3 col-lg-2 control-label">currency</label>
                <div class="col-sm-9 col-lg-10 controls">
                  <select id="input8" class="form-control  chosen" data-placeholder="Choose a currency" name="currency_id">
                    <option value=""></option>
                    @foreach($currenies as $key => $value)
                    <option value="{{$value->id}}">{{$value->title}}</option>
                    @endforeach
                  </select>
                </div>
            </div>

            <div class="form-group">
              <div class="col-sm-9 col-lg-12">
                <input type="submit" class="btn btn-primary mAuto_dBlock borderRadius" value="Submit">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@stop
@section('script')
<script>
  $('.second_party_id').change(function(){
    getContracts($(this).val())
  })
  // api for get contracts
  function getContracts(contract_id) {
      var contracts = []
      $.get("{{ url('/api/contracts/') }}/" + contract_id, function(response) {
          form = createContractForm(response)
          $('#contract_id').html(form)
          $(".chosen").each(function() {
              $(this).trigger("chosen:updated");
          })
      });
  }
  // create input for contracts
  function createContractForm(contracts) {
      var input = '<option value=""></option>'
      Object.keys(contracts).forEach(key => {
          input += `<option value="${contracts[key].id}">${contracts[key].contract_code} _ ${contracts[key].contract_label}</option>`
      });
      return input
  }
</script>
<script>
 $('#clientpayments').addClass('active');
  $('#clientpayments-index').addClass('active');
</script>
<!-- <script>
$("select").on("click", function(){

  if ($(this).find(":selected").text() == "Select All"){
    if ($(this).attr("data-select") == "false")
      $(this).attr("data-select", "true").find("option").not($('#select_all')).prop("selected", true);
    else
      $(this).attr("data-select", "false").find("option").not($('#select_all')).prop("selected", false);
  }
});

</script> -->

@stop
