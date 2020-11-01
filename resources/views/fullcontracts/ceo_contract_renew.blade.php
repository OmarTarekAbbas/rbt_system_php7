@extends('template')
@section('page_title')
Contracts
@stop
@section('content')
    @include('errors')
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
                          <label for="start_date" class="col-xs-3 col-lg-2 control-label"> Contract Start Date </label>
                          <div class="input-group date date-picker col-sm-9 col-lg-10 controls" data-date-format="dd-mm-yyyy">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            <input type="text" name="start_date" value="{{ $contract->contract_date }}" id="start_date" autocomplete="off" placeholder="Contract Start Date" data-date-format="dd-mm-yyyy" class="form-control" readonly>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="contract_expiry_date" class="col-xs-3 col-lg-2 control-label"> Contract Expire Date </label>
                          <div class="input-group date date-picker col-sm-9 col-lg-10 controls" data-date-format="dd-mm-yyyy">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            <input type="text" name="contract_expiry_date" value="{{ $contract->contract_expiry_date }}" id="contract_expiry_date" autocomplete="off" placeholder="Contract Start Date" data-date-format="dd-mm-yyyy" class="form-control" readonly>
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
        $('#contracts/$contract->id/').addClass('active');
        $('#contracts/$contract->id/-create').addClass('active');
    </script>
@stop
