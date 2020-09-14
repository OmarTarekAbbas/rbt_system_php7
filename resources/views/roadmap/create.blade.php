@extends('template')
@section('page_title')
Departments
@stop
@section('content')
@include('errors')
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-title">
                <h3><i class="fa fa-bars"></i>Add Road Map Form</h3>
                <div class="box-tool">
                    <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
                    <a data-action="close" href="#"><i class="fa fa-times"></i></a>
                </div>
            </div>
            <div class="box-content">
                <form class="form-horizontal" action="{{url('roadmaps')}}" method="post">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-4">
                            <div class="box box-red">
                                <div class="box-title">
                                    <h3><i class="fa fa-bars"></i> Event Details</h3>
                                </div>
                                <!-- BEGIN Left Side -->
                                <div class="box-content">
                                    <div class="form-group">
                                        <label for="event_title" class="col-xs-3 col-lg-2 control-label"> Event Title</label>
                                        <div class="col-sm-9 col-lg-10 controls">
                                            <input type="text" name="event_title" id="event_title"
                                                placeholder="Event Title" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="event_color" class="col-xs-3 col-lg-2 control-label"> Event Color</label>
                                        <div class="col-sm-9 col-lg-10 controls">
                                            <input type="text" name="event_color" id="event_color"
                                                placeholder="Event Color" class="form-control colorpicker-default" value="#3865a8">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="event_start_date" class="col-xs-3 col-lg-2 control-label"> Event Start Date</label>
                                        <div class="input-group date date-picker col-sm-9 col-lg-10 controls" data-date="12-02-2012" data-date-format="dd-mm-yyyy" >
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            <input type="text" name="event_start_date" id="event_start_date"
                                                placeholder="Event Start Date" data-date="12-02-2012" data-date-format="dd-mm-yyyy"  class="form-control date-picker">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="event_end_date" class="col-xs-3 col-lg-2 control-label"> Event End Date</label>
                                        <div class="input-group date date-picker col-sm-9 col-lg-10 controls" data-date="12-02-2012" data-date-format="dd-mm-yyyy" >
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            <input type="text" name="event_end_date" id="event_end_date"
                                                placeholder="Event End Date" data-date="12-02-2012" data-date-format="dd-mm-yyyy"  class="form-control date-picker">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END Left Side -->
                        </div>

                        <div class="col-md-4">
                            <div class="box box-red">
                                <div class="box-title">
                                    <h3><i class="fa fa-bars"></i> Occasion / Aggregator / Operator</h3>
                                </div>
                                <!-- BEGIN Left Side -->
                                <div class="box-content">
                                    <div class="form-group">
                                        <label for="country_id" class="col-xs-3 col-lg-2 control-label">Country</label>
                                        <div class="col-sm-9 col-lg-10 controls">
                                            {!! Form::select('country_id',$countries,null,['class'=>'form-control chosen-rtl' , 'id' => 'country_id' ,'required' => true,'style'=>'height: 48px;'])!!}
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="occasion_id" class="col-xs-3 col-lg-2 control-label">Occasion</label>
                                        <div class="col-sm-9 col-lg-10 controls">
                                            {!! Form::select('occasion_id',[],null,['class'=>'form-control chosen-rtl' , 'id' => 'occasion_id' ,'required' => true,'style'=>'height: 48px;'])!!}
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="aggregator_id" class="col-xs-3 col-lg-2 control-label">Aggregators</label>
                                        <div class="col-sm-9 col-lg-10 controls">
                                            {!! Form::select('aggregator_id',$aggregators,null,['class'=>'form-control chosen-rtl' , 'id' => 'aggregator_id' ,'required' => true,'style'=>'height: 48px;'])!!}
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="operator_id" class="col-xs-3 col-lg-2 control-label">Operator</label>
                                        <div class="col-sm-9 col-lg-10 controls">
                                            {!! Form::select('operator_id',[],null,['class'=>'form-control chosen-rtl' , 'id' => 'operator_id' ,'required' => true,'style'=>'height: 48px;'])!!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END Left Side -->
                        </div>

                        {{-- <div class="col-md-3">
                            <div class="box box-red">
                                <div class="box-title">
                                    <h3><i class="fa fa-bars"></i> Provider / Content</h3>
                                </div>
                                <!-- BEGIN Left Side -->
                                <div class="box-content">
                                    <div class="form-group">
                                        <label for="provider_id" class="col-xs-3 col-lg-2 control-label">Provider</label>
                                        <div class="col-sm-9 col-lg-10 controls">
                                            {!! Form::select('provider_id',$providers,null,['class'=>'form-control chosen-rtl' , 'id' => 'provider_id' ,'required' => true,'style'=>'height: 48px;'])!!}
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="content_id" class="col-xs-3 col-lg-2 control-label">Content</label>
                                        <div class="col-sm-9 col-lg-10 controls">
                                            {!! Form::select('content_id',[],null,['class'=>'form-control chosen-rtl' , 'id' => 'content_id' ,'required' => true,'style'=>'height: 48px;'])!!}
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="textfield1" class="col-xs-3 col-lg-2 control-label">content track specs
                                            </label>
                                        <div class="col-sm-9 col-lg-10 controls">
                                            <input type="text" name="textfield1" id="textfield1"
                                                placeholder="Text input" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END Left Side -->
                        </div> --}}

                        <div class="col-md-4">
                            <div class="box box-red">
                                <div class="box-title">
                                    <h3><i class="fa fa-bars"></i> Support </h3>
                                </div>
                                <!-- BEGIN Left Side -->
                                <div class="box-content">
                                    <div class="form-group">
                                        <label for="aggregator_support"
                                            class="col-xs-3 col-lg-2 control-label">Aggregator Suuport</label>
                                        <div class="col-sm-9 col-lg-10 controls">
                                            <textarea name="aggregator_support" id="aggregator_support" rows="3"
                                                class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="operator_support"
                                            class="col-xs-3 col-lg-2 control-label">Operator Support</label>
                                        <div class="col-sm-9 col-lg-10 controls">
                                            <textarea name="operator_support" id="operator_support" rows="3"
                                                class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="promotion_support"
                                            class="col-xs-3 col-lg-2 control-label">Promotion Support</label>
                                        <div class="col-sm-9 col-lg-10 controls">
                                            <textarea name="promotion_support" id="promotion_support" rows="3"
                                                class="form-control"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2">
                                            <button type="submit" class="btn btn-primary"><i
                                                    class="fa fa-check"></i> Save</button>
                                            <button type="button" class="btn">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END Left Side -->
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
    $('#roadmap').addClass('active');
    $('#roadmap-create').addClass('active');

    $(document).on('ready',function(){
        getOperators( $('#country_id').val() )
        getOccasions( $('#country_id').val() )
        getContents( $('#provider_id').val() )
    })

    $('#country_id').change(function(){
        getOperators($(this).val())
        getOccasions($(this).val())
    })

    $('#provider_id').change(function(){
        getContents($(this).val())
    })

    // api for get operators
    function getOperators(country_id) {
        var operators = []
        $.get("{{ url('/api/operators/') }}/"+country_id,function(response) {
            form = createOperaotrForm(response)
            $('#operator_id').html(form)
        });
    }

    // create input for operators
    function createOperaotrForm(operators) {
        var input = ''
        Object.keys(operators).forEach(key => {
            input+='<option value="'+operators[key].id+'">'+operators[key].title+'</option>'
        });
        return input
    }

    // api for get occasions
    function getOccasions(country_id) {
        var occasion = []
        $.get("{{ url('/api/occasions/') }}/"+country_id,function(response) {
            occasionform = createOccasionForm(response)
            $('#occasion_id').html(occasionform)
        });
    }

    // create input for occasion
    function createOccasionForm(occasions) {
        var input = ''
        Object.keys(occasions).forEach(key => {
            input+='<option value="'+occasions[key].id+'">'+occasions[key].title+'</option>'
        });
        return input
    }

    // api for get Content
    function getContents(provider_id) {
        var occasion = []
        $.get("{{ url('/api/contents/') }}/"+provider_id,function(response) {
            contentform = createContentForm(response)
            $('#content_id').html(contentform)
        });
    }

    // create input for content
    function createContentForm(contents) {
        var input = ''
        Object.keys(contents).forEach(key => {
            input+='<option value="'+contents[key].id+'">'+contents[key].content_title+'</option>'
        });
        return input
    }
</script>
@stop
