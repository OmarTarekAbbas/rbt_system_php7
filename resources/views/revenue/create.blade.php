@extends('template')
@section('page_title')
Revenues
@stop
@section('content')
@include('errors')

<style>
  #Contract_services_top {
    margin-top: 3%;
  }
</style>

<div class="row">
  <div class="col-md-12">
    <div class="box">
      <div class="box-title">
        <h3><i class="fa fa-bars"></i>Add Revenue Form</h3>
        <div class="box-tool">
          <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
          <a data-action="close" href="#"><i class="fa fa-times"></i></a>
        </div>
      </div>
      <div class="box-content">
        <form class="form-horizontal" action="{{url('revenue')}}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label class="col-sm-3 col-lg-2 control-label">Contract *</label>
            <div class="col-sm-9 col-lg-10 controls">
              <select id="contract_id" class="form-control" data-placeholder="Choose a Contract id" name="contract_id" tabindex="1" required>
                @foreach($contracts as $contract)
                <option value="{{$contract->id}}">{{$contract->contract_label}}</option>
                @endforeach
              </select>
              <span class="help-inline">Choose contract</span>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-3 col-lg-2 control-label">Amount *</label>
            <div class="col-sm-9 col-lg-10 controls">
              <input id="amount" class="form-control" type="text" placeholder="Choose Amount" name="amount" required>
              <span class="help-inline">Choose Amount</span>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-3 col-lg-2 control-label">Currency *</label>
            <div class="col-sm-9 col-lg-10 controls">
              <select class="form-control" data-placeholder="Choose a Currency" name="currency_id" tabindex="1" required>
                @foreach ($currencies as $currency)
                <option value="{{$currency->id}}">{{$currency->title}}</option>
                @endforeach
              </select>
              <span class="help-inline">Choose Currency</span>
            </div>
          </div>

          <div class="container" style="padding: 20px">
            <h6 class="alert alert-info">Amount per service
              <div id="Contract_services" class="container">
                <div class="row">
                  <div class="form-group" id="Contract_services_top">
                    <label class="col-sm-3 col-lg-2 control-label">Service Name</label>
                    <div class="col-sm-9 col-lg-10 controls">
                      <input id="amount" class="form-control" type="text" placeholder="Choose Amount" name="amount" required>
                    </div>
                  </div>
                </div>
              </div>
            </h6>
          </div>

          <div class="form-group">
            <label class="col-sm-3 col-lg-2 control-label">Year *</label>
            <div class="col-sm-9 col-lg-10 controls">
              <select class="form-control" data-placeholder="Choose a year" name="year" tabindex="1" required>
                @for($year = date('Y')-5 ; $year <= date('Y')+5 ; $year++) <option value="{{$year}}">{{$year}}</option>
                  @endfor
              </select>
              <span class="help-inline">Choose Year</span>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-3 col-lg-2 control-label">Month *</label>
            <div class="col-sm-9 col-lg-10 controls">
              <select class="form-control" data-placeholder="Choose a month" name="month" tabindex="1" required>
                @for($month = 1 ; $month <= 12 ; $month++) <option value="{{date("F", strtotime("$month/1/1"))}}">{{date("F", strtotime("$month/1/1"))}}</option>
                  @endfor
              </select>
              <span class="help-inline">Choose Month</span>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-3 col-lg-2 control-label">Source Type *</label>
            <div class="col-sm-9 col-lg-10 controls">
              <select id="source_type" class="form-control" data-placeholder="Choose a source type" name="source_type" tabindex="1" required>
                <option value="1">Operator</option>
                <option value="2">Aggregator</option>
              </select>
              <span class="help-inline">Choose Source Type</span>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-3 col-lg-2 control-label">Source *</label>
            <div class="col-sm-9 col-lg-10 controls">
              <select id="source_id" class="form-control" data-placeholder="Choose a source type" name="source_id" tabindex="1" required>
                @foreach ($operators as $operator)
                <option value="{{$operator->id}}">{{$operator->title}}</option>
                @endforeach
              </select>
              <span class="help-inline">Choose Source</span>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-3 col-lg-2 control-label">Service Type *</label>
            <div class="col-sm-9 col-lg-10 controls">
              <select class="form-control" data-placeholder="Choose a Service Type" name="serivce_type_id" tabindex="1" required>
                @foreach ($ServiceTypes as $ServiceType)
                <option value="{{$ServiceType->id}}">{{$ServiceType->service_type_title}}</option>
                @endforeach
              </select>
              <span class="help-inline">Choose Service Type</span>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-3 col-lg-2 control-label">Is Collected *</label>
            <div class="col-sm-9 col-lg-10 controls">
              <select class="form-control" data-placeholder="Choose a Is Collected" name="is_collected" tabindex="1" required>
                <option value="1">Yes</option>
                <option value="2">No</option>
              </select>
              <span class="help-inline">Choose Is Collected</span>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-3 col-lg-2 control-label">Notes</label>
            <div class="col-sm-9 col-lg-10 controls">
              <input class="form-control" type="text" style="padding-bottom:100px;padding-top:20px" placeholder="Notes" name="notes">
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-3 col-lg-2 control-label">Report Attachment *</label>
            <div class="col-sm-9 col-lg-10 controls">
              <input class="form-control" type="file" accept=".xls, .xlsx, .pdf" placeholder="Reports" name="reports" required>
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2">
              <input type="submit" class="btn btn-primary" value="Submit">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

</div>

@stop

@section('script')
<script>
  $('#revenue').addClass('active');
  $('#revenue-create').addClass('active');
</script>

<script>
  $('#source_type').change(function(e) {
    var source_type = $(this).val();
    $.ajax({
      type: "post",
      url: "{{url('comboselect/source_id')}}",
      data: {
        'source_type': source_type
      },
      success: function(response) {
        $('#source_id').empty();
        for (const option of response) {
          $('#source_id').append($('<option>').val(option.id).text(option.title));
        }
      }
    });
  });

  $('#contract_id').change(function(e) {
    var contract_id = $(this).val();
    $.ajax({
      type: "post",
      url: "{{url('comboselect/contract_services')}}",
      data: {
        'contract_id': contract_id
      },
      success: function(response) {
        $('#Contract_services').empty();
        for (const service of response) {
          $('#Contract_services').append(`<div class="row">
                  <div class="form-group" id="Contract_services_top">
                    <label class="col-sm-3 col-lg-2 control-label">${service.title}</label>
                    <div class="col-sm-9 col-lg-10 controls">
                      <input id="amount" class="form-control" type="text" placeholder="Choose Amount" name="service[${service.id}]" required>
                    </div>
                  </div>
                </div>`);
        }
      }
    });
  });

  $(document).ready(function() {
    var contract_id = $('#contract_id').val();
    $.ajax({
      type: "post",
      url: "{{url('comboselect/contract_services')}}",
      data: {
        'contract_id': contract_id
      },
      success: function(response) {
        $('#Contract_services').empty();
        for (const service of response) {
          $('#Contract_services').append(`<div class="row">
                  <div class="form-group" id="Contract_services_top">
                    <label class="col-sm-3 col-lg-2 control-label">${service.title}</label>
                    <div class="col-sm-9 col-lg-10 controls">
                      <input id="amount" class="form-control" type="text" placeholder="Choose Amount" name="service[${service.id}]" required>
                    </div>
                  </div>
                </div>`);
        }
      }
    });
  });
</script>
@stop
