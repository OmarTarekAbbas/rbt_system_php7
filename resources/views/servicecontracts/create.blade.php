@extends('template')
@section('page_title')
CotractSrvice
@stop
@section('content')

@include('errors')
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-title">
                <h3><i class="fa fa-bars"></i>CotractSrvice Form</h3>
                <div class="box-tool">
                    <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
                    <a data-action="close" href="#"><i class="fa fa-times"></i></a>
                </div>
            </div>
            <div class="box-content">

                {!! Form::open(["url"=>"contractservice","class"=>"form-horizontal","method"=>"POST","files"=>"True"]) !!}
                <div class="form-group">
                    <label class="col-sm-3 col-lg-2 control-label">Title <span class="text-danger">*</span></label>
                    <div class="col-sm-9 col-lg-10 controls">
                        {!! Form::text('title',null,['placeholder'=>'Title','class'=>'form-control btn-lg','required']) !!}
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-sm-3 col-lg-2 control-label">Contract Id <span class="text-danger">*</span></label>
                    <div class="col-sm-9 col-lg-10 controls">
                        <select class="form-control chosen" data-placeholder="Choose a Role" name="contract_id" tabindex="1" required>
                            <option value="">-- Please Select --</option>
                            @foreach($contracts as $contract)
                            <option value="{{$contract->id}}">{{$contract->contract_code}} {{$contract->contract_label}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>

    </div>

</div>

@stop
@section('script')
<script>
    $('#operator').addClass('active');
    $('#operator_create').addClass('active');
</script>
@stop
