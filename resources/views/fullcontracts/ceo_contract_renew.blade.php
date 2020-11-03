@extends('template')
@section('page_title')
Contracts
@stop
@section('content')
    @include('errors')
    <style>
      .input-group[class*=col-] {
        float: none;
        padding-right: 67%;
        padding-left: 15px;
      }
      #contract_duration{
        width: 82%;
      }
    </style>
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-title">
                    <h3><i class="fa fa-bars"></i>Add Contract Form</h3>
                    <div class="box-tool">
                        <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
                        <a data-action="close" href="#"><i class="fa fa-times"></i></a>
                    </div>
                </div>
                <div class="box-content">
                    <form class="form-horizontal" action='{{url("contracts/$contract->id/renew")}}' method="post">
                    	{{ csrf_field() }}
                      <div class="form-group">
                            <label class="col-sm-3 col-lg-2 control-label">Contract Code </label>
                            <div class="col-sm-9 col-lg-10 controls">
                                <input type="text" name="contract" value="{{ $contract->contract_code }}" placeholder="Contract" class="form-control input-lg" readonly>
                            </div>
                      </div>

                        <div class="form-group">
                          <label for="start_date" class="col-xs-3 col-lg-2 control-label"> Contract Renew Start Date <span class="asterix"> *</span> </label>
                          <div class="input-group start_date date col-sm-9 col-lg-10 controls" data-date-format="dd-mm-yyyy">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            <input type="text" name="renew_start_date" value="{{ $data['start_date']->format('d-m-Y') }}" id="start_date" autocomplete="off" placeholder="Contract Start Date" data-date-format="dd-mm-yyyy" class="form-control">
                          </div>
                        </div>

                        <div class="form-group" style="padding-left: 17px;">
                            <label for="ipt" class="col-xs-3 col-lg-2 control-label"> Contract Renew Duration <span class="asterix"> *</span> </label>
                            <select name='renew_duration_id' rows='5' id='contract_duration' class="col-sm-9 col-lg-10 controls form-control" required>
                                <option value="">-- Please Select --</option>
                                @foreach($contract_durations as $contract_duration)
                                <option
                                    data-type="@if(is_year($contract_duration->contract_duration_title)) years @else month  @endif"
                                    value="{{$contract_duration->contract_duration_id}}"
                                    @if($contract->duration->contract_duration_id==$contract_duration->contract_duration_id) selected="selected" @endif>
                                    {{$contract_duration->contract_duration_title}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                          <label for="contract_expiry_date" class="col-xs-3 col-lg-2 control-label"> Contract Renew Expire Date </label>
                          <div class="input-group contract_expiry_date date col-sm-9 col-lg-10 controls" data-date-format="dd-mm-yyyy">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            <input type="text" name="renew_expire_date" value="{{ $data['expire_date']->format('d-m-Y') }}" id="contract_expiry_date" autocomplete="off" placeholder="Contract Start Date" data-date-format="dd-mm-yyyy" class="form-control">
                          </div>
                        </div>

                        <input type="hidden" name="ceo_renew" id="ceo_renew">

                        @if(request()->filled('contract_renew_id'))
                        <input type="hidden" name="contract_renew_id" id="contract_renew_id" value="{{ request()->get('contract_renew_id') }}">
                        @endif

                        <div class="form-group">
                            <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2">
                                <button onclick="document.getElementById('ceo_renew').value = 1" type="submit" class="btn btn-success">Renew</button>
                                <button onclick="document.getElementById('ceo_renew').value = 2" type="submit" class="btn btn-danger">Not Renew</button>
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
        $(document).on('ready', function() {
            $('.start_date').datepicker({
                format: 'dd-mm-yyyy',
                autoclose: true,
                startDate: moment("{{ $data['start_date']->format('d-m-Y') }}", "DD-MM-YYYY").locale('en').format('DD-MM-YYYY'),
            }).on('changeDate', function(selected) {
                var minDate = new Date(selected.date.valueOf());
                setEndDate(minDate,"{{ get_number_of_month($contract->duration->contract_duration_title) }}")
            })

            $('.contract_expiry_date').datepicker({
                format: 'dd-mm-yyyy',
                autoclose: true,
                startDate: moment("{{ $data['expire_date']->format('d-m-Y') }}", "DD-MM-YYYY").locale('en').format('DD-MM-YYYY'),
            })
        })
    </script>
    <script>
      var monthes = 12;
      $("#contract_duration").change(function() {
          number = ($(this).find('option:selected').text()).match(/\d+/)[0];
          monthes = ($(this).find('option:selected').data('type')).includes('m') ?  number : number * 12
          setEndDate($("#start_date").val(), monthes)
      })

      function setEndDate(endDate, monthes) {
        console.log(endDate, monthes);
        $('#contract_expiry_date').datepicker('setStartDate', moment(endDate, "DD-MM-YYYY").locale('en').add(monthes, 'month').subtract(1, 'day').format('DD-MM-YYYY'));
        $('#contract_expiry_date').datepicker('setDate' , moment(endDate, "DD-MM-YYYY").locale('en').add(monthes, 'month').subtract(1, 'day').format('DD-MM-YYYY'));
      }
    </script>
@stop
