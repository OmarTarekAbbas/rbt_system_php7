@extends('template')
@section('page_title')
Contract Service
@stop
@section('content')

@include('errors')
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-title">
                <h3><i class="fa fa-bars"></i>Contract Service Form</h3>
                <div class="box-tool">
                    <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
                    <a data-action="close" href="#"><i class="fa fa-times"></i></a>
                </div>
            </div>
            <div class="box-content">

                {!! Form::open(["url"=>"contractservice","class"=>"form-horizontal","method"=>"POST","files"=>"True"]) !!}

                <div class="form-group">
                    <label class="col-sm-3 col-lg-2 control-label">Contract<span class="text-danger">*</span></label>
                    <div class="col-sm-9 col-lg-10 controls">
                        <select class="form-control chosen" data-placeholder="Choose a Role" name="contract_id" tabindex="1" required>
                            @if (isset($contract_show))
                              <option value="{{$contract_show->id}}">{{$contract_show->contract_code}} {{$contract_show->contract_label}}</option>
                            @else
                            <option value="">-- Please Select --</option>
                            @foreach($contracts as $contract)
                              <option value="{{$contract->id}}">{{$contract->contract_code}} {{$contract->contract_label}}</option>
                            @endforeach
                            @endif
                        </select>
                    </div>
                </div>

                <div id="service_input">

                </div>

                <div class="container text-center">
                    <a id="add_service" class="btn btn-success" style="width:25%;margin:20px"><i class="fa fa-plus-square" aria-hidden="true"></i> Add Service</a>
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
<script>
  function removeContractService(service_id) {
    $.ajax({
        type: "post",
        url: "{{url('comboselect/remove_contract_services')}}",
        data: {'service_id': service_id},
        success: function (response) {
        }
    });
  }
</script>
@isset($contract_show)
    <script>

    $(document).ready(function () {
        $.ajax({
            type: "post",
            url: "{{url('comboselect/contract_services')}}",
            data: {'contract_id': {{"$contract_show->id"}}},
            success: function (response) {
                $("#service_input").html('');
                for (const service of response) {
                    $('#service_input').append(`<div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label">Title <span class="text-danger">*</span></label>
                        <div class="col-sm-9 col-lg-10 controls">
                            <input placeholder="Title" style="display:inline;width:80%" class="form-control btn-lg" required="" name="title[${service.id}]" value="${service.title}" type="text">
                            <a style="display:inline;" class="btn btn-danger remove_service" onclick="$(this).parent().parent().remove();removeContractService(${service.id})"><i class="fa fa-minus-square" aria-hidden="true"></i></a>
                        </div>
                    </div>`);
                }
            }
        });
    });

    </script>
@endisset
<script>

    $('.chosen').change(function(){
        var contract_id = $(this).val();
        $.ajax({
            type: "post",
            url: "{{url('comboselect/contract_services')}}",
            data: {'contract_id': contract_id},
            success: function (response) {
                $("#service_input").html('');
                for (const service of response) {
                    $('#service_input').append(`<div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label">Title <span class="text-danger">*</span></label>
                        <div class="col-sm-9 col-lg-10 controls">
                            <input placeholder="Title" style="display:inline;width:80%" class="form-control btn-lg" required="" name="title[${service.id}]" value="${service.title}" type="text">
                            <a style="display:inline;" class="btn btn-danger remove_service" onclick="$(this).parent().parent().remove();removeContractService(${service.id})"><i class="fa fa-minus-square" aria-hidden="true"></i></a>
                        </div>
                    </div>`);
                }
            }
        });
    });

    $('#add_service').click(function(){
        $('#service_input').append(`<div class="form-group">
            <label class="col-sm-3 col-lg-2 control-label">Title <span class="text-danger">*</span> </label>
            <div class="col-sm-9 col-lg-10 controls">
                <input style="display:inline; width:80%" placeholder="Title" class="form-control btn-lg" required="" name="title[]" type="text">
                <a style="display:inline;" class="btn btn-danger remove_service" onclick="$(this).parent().parent().remove();"><i class="fa fa-minus-square" aria-hidden="true"></i></a>
            </div>
        </div>`);
    })

</script>
@stop
