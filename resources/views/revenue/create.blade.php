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
                <h3><i class="fa fa-bars"></i>Add Revenue Form</h3>
                <div class="box-tool">
                    <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
                    <a data-action="close" href="#"><i class="fa fa-times"></i></a>
                </div>
            </div>
            <div class="box-content">
                <form class="form-horizontal" action="{{url('revenue')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label">Contract *</label>
                        <div class="col-sm-9 col-lg-10 controls">
                            <select class="form-control" data-placeholder="Choose a Contract id" name="contract_id"
                                tabindex="1" required>
                                @foreach($contracts as $contract)
                                <option value="{{$contract->id}}">{{$contract->contract_label}}</option>
                                @endforeach
                            </select>
                            <span class="help-inline">Choose contract</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label">Year *</label>
                        <div class="col-sm-9 col-lg-10 controls">
                            <select class="form-control" data-placeholder="Choose a year" name="year"
                                tabindex="1" required>
                                @for($year = date('Y')-5 ; $year <= date('Y')+5 ; $year++)
                                <option value="{{$year}}">{{$year}}</option>
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
                                <option value="{{date("F", strtotime("$month/1/1"))}}">{{date("F", strtotime("$month/1/1"))}}</option>
                                @endfor
                            </select>
                            <span class="help-inline">Choose Month</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label">Source Type *</label>
                        <div class="col-sm-9 col-lg-10 controls">
                            <select class="form-control" data-placeholder="Choose a source type" name="source_type"
                                tabindex="1" required>
                                <option value="operator">Operator</option>
                                <option value="aggregator">Aggregator</option>
                            </select>
                            <span class="help-inline">Choose Source Type</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label">Source Type *</label>
                        <div class="col-sm-9 col-lg-10 controls">
                            <select id="source_type" class="form-control" data-placeholder="Choose a source type" name="source_type"
                                tabindex="1" required>
                                <option value="operator">Operator</option>
                                <option value="aggregator">Aggregator</option>
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
    $('#source_type').change(function (e) {
        $.ajax({
            type: "post",
            url: "{{url('comboselect/source_id')}}",
            data: $(this).val();,
            success: function (response) {
                console.log(response);
            }
        });
    });

</script>
@stop
