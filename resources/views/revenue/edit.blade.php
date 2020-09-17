@extends('template')
@section('page_title')
Revenues
@stop
@section('content')
@include('errors')
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-title">
                <h3><i class="fa fa-bars"></i>Edit Revenue Form</h3>
                <div class="box-tool">
                    <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
                    <a data-action="close" href="#"><i class="fa fa-times"></i></a>
                </div>
            </div>
            <div class="box-content">
                <form class="form-horizontal" action="{{url("revenue/{$revenue->id}/update")}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label">Contract *</label>
                        <div class="col-sm-9 col-lg-10 controls">
                            <select id="contract_id" class="form-control" data-placeholder="Choose a Contract id" name="contract_id"
                                tabindex="1" required>
                                @foreach($contracts as $contract)
                                <option value="{{$contract->id}}" {{$contract->id == $revenue->contract_id ? 'selected' : ''}}>{{$contract->contract_label}}</option>
                                @endforeach
                            </select>
                            <span class="help-inline">Choose contract</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label">Amount *</label>
                        <div class="col-sm-9 col-lg-10 controls">
                            <input id="amount" class="form-control" type="text" value="{{$revenue->amount}}" placeholder="Choose Amount" name="amount" required>
                            <span class="help-inline">Choose Amount</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label">Currency  *</label>
                        <div class="col-sm-9 col-lg-10 controls">
                            <select class="form-control" data-placeholder="Choose a Currency" name="currency_id"
                                tabindex="1" required>
                                @foreach ($currencies as $currency)
                                    <option value="{{$currency->id}}" {{$currency->id == $revenue->currency_id ? 'selected' : ''}}>{{$currency->title}}</option>
                                @endforeach
                            </select>
                            <span class="help-inline">Choose Currency</span>
                        </div>
                    </div>

                    <div class="container" style="padding: 20px">
                        <h6 class="alert alert-info">Services</h6>
                        <div id="Contract_services">
                            @foreach ($revenue->amount_services as $service)
                                <label>{{$service->title}}</label>
                                <input type="text" class="form-control" name="{{"service[$service->id]"}}" value="{{$service->pivot->amount}}">
                            @endforeach
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label">Year *</label>
                        <div class="col-sm-9 col-lg-10 controls">
                            <select class="form-control" data-placeholder="Choose a year" name="year"
                                tabindex="1" required>
                                @for($year = date('Y')-5 ; $year <= date('Y')+5 ; $year++)
                                <option value="{{$year}}" {{$year == $revenue->year ? 'selected' : ''}}>{{$year}}</option>
                                @endfor
                            </select>
                            <span class="help-inline">Choose Year</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label">Month *</label>
                        <div class="col-sm-9 col-lg-10 controls">
                            <select class="form-control" data-placeholder="Choose a month" name="month"
                                tabindex="1" required>
                                @for($month = 1 ; $month <= 12 ; $month++)
                                <option value="{{date("F", strtotime("$month/1/1"))}}" {{date("F", strtotime("$month/1/1")) == $revenue->month ? 'selected' : ''}}>{{date("F", strtotime("$month/1/1"))}}</option>
                                @endfor
                            </select>
                            <span class="help-inline">Choose Month</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label">Source Type *</label>
                        <div class="col-sm-9 col-lg-10 controls">
                            <select id="source_type" class="form-control" data-placeholder="Choose a source type" name="source_type"
                                tabindex="1" required>
                                <option value="1" {{'Operator' == $revenue->source_type ? 'selected' : ''}}>Operator</option>
                                <option value="2" {{'Aggregator' == $revenue->source_type ? 'selected' : ''}}>Aggregator</option>
                            </select>
                            <span class="help-inline">Choose Source Type</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label">Source *</label>
                        <div class="col-sm-9 col-lg-10 controls">
                            <select id="source_id" class="form-control" data-placeholder="Choose a source type" name="source_id"
                                tabindex="1" required>
                            </select>
                            <span class="help-inline">Choose Source</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label">Service Type  *</label>
                        <div class="col-sm-9 col-lg-10 controls">
                            <select class="form-control" data-placeholder="Choose a Service Type" name="serivce_type_id"
                                tabindex="1" required>
                                @foreach ($ServiceTypes as $ServiceType)
                                    <option value="{{$ServiceType->id}}"  {{$ServiceType->id == $revenue->serivce_type_id ? 'selected' : ''}}>{{$ServiceType->service_type_title}}</option>
                                @endforeach
                            </select>
                            <span class="help-inline">Choose Service Type</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label">Is Collected *</label>
                        <div class="col-sm-9 col-lg-10 controls">
                            <select class="form-control" data-placeholder="Choose a Is Collected" name="is_collected"
                                tabindex="1" required>
                                <option value="1"  {{'Yes' == $revenue->is_collected ? 'selected' : ''}}>Yes</option>
                                <option value="2"  {{'No' == $revenue->is_collected ? 'selected' : ''}}>No</option>
                            </select>
                            <span class="help-inline">Choose Is Collected</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label">Notes</label>
                        <div class="col-sm-9 col-lg-10 controls">
                            <input class="form-control" type="text" style="padding-bottom:100px;padding-top:20px" placeholder="Notes" name="notes" value="{{$revenue->notes}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label">Reports *</label>
                        <div class="col-sm-9 col-lg-10 controls">
                            <input class="form-control" type="file" accept=".xls,.pdf" placeholder="Reports" name="reports">
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

    $(document).ready(function () {
        var source_type = $('#source_type').val();
        var revenue_source_id = "{{$revenue->source_id}}";
        $.ajax({
            type: "post",
            url: "{{url('comboselect/source_id')}}",
            data: { 'source_type': source_type },
            success: function (response) {
                $('#source_id').empty();
                for (const option of response) {
                    if(option.id == revenue_source_id){
                      if(option.country)
                        $('#source_id').append($('<option selected>').val(option.id).text(option.country.title+'_'+option.title));
                      else
                        $('#source_id').append($('<option>').val(option.id).text(option.country.title+'_'+option.title));
                    }else{
                      if(option.country)
                        $('#source_id').append($('<option>').val(option.id).text(option.country.title+'_'+option.title));
                      else
                        $('#source_id').append($('<option>').val(option.id).text(option.title));
                    }
                }
            }
        });
    });
    $('#source_type').change(function (e) {
        var source_type = $(this).val();
        $.ajax({
            type: "post",
            url: "{{url('comboselect/source_id')}}",
            data: { 'source_type': source_type },
            success: function (response) {
                $('#source_id').empty();
                for (const option of response) {
                    $('#source_id').append( $('<option>').val(option.id).text(option.title) );
                }
            }
        });
    });
    $('#contract_id').change(function (e) {
        var contract_id = $(this).val();
        $.ajax({
            type: "post",
            url: "{{url('comboselect/contract_services')}}",
            data: { 'contract_id': contract_id },
            success: function (response) {
                $('#Contract_services').empty();
                for (const service of response) {
                    $('#Contract_services').append( $('<lable>').text(service.title) );
                    $('#Contract_services').append( $('<input class="form-control">').attr('name', 'service['+(service.id)+']' ) );
                }
            }
        });
    });
</script>
@stop
