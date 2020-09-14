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
                                </div>
                            </div>
                            <!-- END Left Side -->
                        </div>
                    </div>

                    <div class="row append-row">
                        <div class="col-md-3 init-input">
                            <div class="box box-red">
                                <div class="box-title">
                                    <h3><i class="fa fa-bars"></i> Provider / Content &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-trash pull-right"></i> &nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-plus pull-right"></i> </h3>
                                </div>
                                <!-- BEGIN Left Side -->
                                <div class="box-content">
                                    <div class="form-group">
                                        <label for="provider_id" class="col-xs-3 col-lg-2 control-label">Provider</label>
                                        <div class="col-sm-9 col-lg-10 controls">
                                            {!! Form::select('provider_id[]',$providers,null,['class'=>'form-control chosen-rtl' , 'id' => 'provider_id' ,'required' => true,'style'=>'height: 48px;'])!!}
                                        </div>
                                    </div>

                                    <div class="form-group content">
                                        <label for="content_id" class="col-xs-3 col-lg-2 control-label">Content</label>
                                        <div class="col-sm-9 col-lg-10 controls">
                                            {!! Form::select('content_id[]',[],null,['class'=>'form-control chosen-rtl' , 'id' => 'content_id' ,'required' => true,'style'=>'height: 48px;'])!!}
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="content_id" class="col-xs-3 col-lg-2 control-label">Tracks</label>
                                        <div class="col-sm-9 col-lg-10 controls">
                                            {!! Form::select('content_track_ids[]',[],null,['class'=>'form-control chosen-rtl' , 'multiple' , 'id' => 'content_track_ids' ,'required' => true,'style'=>'height: 48px;'])!!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END Left Side -->
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2">
                            <button type="submit" class="btn btn-primary"><i
                                    class="fa fa-check"></i> Save</button>
                            <button type="button" class="btn">Cancel</button>
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
    })

    $('#country_id').change(function(){
        getOperators($(this).val())
        getOccasions($(this).val())
    })

    // api for get operators
    function getOperators(country_id) {
        var operators = []
        $.get("{{ url('/api/operators/') }}/"+country_id,function(response) {
            form = createOperaotrForm(response)
            $('#operator_id').html(form)
        });
    }

    // api for get occasions
    function getOccasions(country_id) {
        var occasion = []
        $.get("{{ url('/api/occasions/') }}/"+country_id,function(response) {
            occasionform = createOccasionForm(response)
            $('#occasion_id').html(occasionform)
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

    // create input for occasion
    function createOccasionForm(occasions) {
        var input = ''
        Object.keys(occasions).forEach(key => {
            input+='<option value="'+occasions[key].id+'">'+occasions[key].title+'</option>'
        });
        return input
    }
</script>

<script>
    $(document).on('ready',function(){
        getContents( $('#provider_id').val(), function(){
            getTracks($('#content_id').val())
        })
    })
    $(document).on('change','#provider_id', function(){
        var _this2 = $(this)
        getContents($(this).val(), function(){
            content_id = $(_this2).parent().parent().siblings('.content').children('.controls').children('#content_id')
            getTracks(content_id.val(), _this2)
        }, $(this))
    })
    $(document).on('change','#content_id', function(){
        getTracks($(this).val(),$(this))
    })
    // api for get Content
    function getContents(provider_id, callback, _this = '') {
        var occasion = []
        var _this3 = _this
        $.get("{{ url('/api/contents/') }}/"+provider_id,function(response) {
            contentform = createContentForm(response)
            if(_this3 && _this3 != '') {
                $(_this3).parent().parent().siblings('.content').children('.controls').children('#content_id').html(contentform)
            } else {
                $('#content_id').html(contentform)
            }
            callback()
            $(".chosen").each(function() {
                $(this).trigger("chosen:updated");
            })
        });

    }
    // api for get tracks
    function getTracks(content_id, _this = '') {
        var occasion = []
        var _this3   = _this
        $.get("{{ url('/api/tracks/') }}/"+content_id,function(response) {
            trackform = createTracktForm(response)
            if(_this3 && _this3 != '') {
                $(_this3).parent().parent().siblings().last().children('.controls').children('#content_track_ids').html(trackform)
            } else {
                $('#content_track_ids').html(trackform)
            }
            $(".chosen").each(function() {
                $(this).trigger("chosen:updated");
            })
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
    // create input for content
    function createTracktForm(tracks) {
        var input = ''
        Object.keys(tracks).forEach(key => {
            input+='<option class="far play" data-src="{{url("/")}}/'+tracks[key].track_file+'" value="'+tracks[key].id+'">'+tracks[key].track_title_en+'</option>'
        });
        return input
    }


    $(document).on('click','.fa-plus',function(){
        form = getFormCopy()
        $('.append-row').append(form)
        initChosen()
    })

    function getFormCopy(){
        var form = '<div class="col-md-3 init-input">\
                        <div class="box box-red">\
                            <div class="box-title">\
                                <h3><i class="fa fa-bars"></i> Provider / Content &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-trash pull-right"></i> &nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-plus pull-right"></i> </h3>\
                            </div>\
                            <div class="box-content">\
                                <div class="form-group">\
                                    <label for="provider_id" class="col-xs-3 col-lg-2 control-label">Provider</label>\
                                    <div class="col-sm-9 col-lg-10 controls">\
                                        {!! Form::select("provider_id[]",$providers,null,["class"=>"form-control chosen-rtl" , "id" => "provider_id" ,"required" => true,"style"=>"height: 48px;"]) !!}\
                                    </div>\
                                </div>\
                                <div class="form-group content">\
                                    <label for="content_id" class="col-xs-3 col-lg-2 control-label">Tracks</label>\
                                    <div class="col-sm-9 col-lg-10 controls">\
                                        {!! Form::select("content_id[]",[],null,["class"=>"form-control chosen-rtl" , "id" => "content_id" ,"required" => true,"style"=>"height: 48px;"])!!}\
                                    </div>\
                                </div>\
                                <div class="form-group">\
                                    <label for="content_id" class="col-xs-3 col-lg-2 control-label">Content</label>\
                                    <div class="col-sm-9 col-lg-10 controls">\
                                        {!! Form::select("content_track_ids[]",[],null,["class"=>"form-control chosen-rtl" , "multiple" , "id" => "content_track_ids" ,"required" => true,"style"=>"height: 48px;"])!!}\
                                    </div>\
                                </div>\
                            </div>\
                        </div>\
                    </div>'
        return form;
    }

    $(document).on('click','.fa-trash',function(){
        if($('.append-row').children().length > 1)
            $(this).parent().parent().parent().parent().remove()
    })

    function initChosen() {
        var el = $('.chosen-rtl');
        if ("<?php echo App::getLocale(); ?>" == "ar") {
            el.chosen({
                rtl: true,
                width: '100%'
            });
        }
        else {
            el.addClass("chosen");
            el.removeClass("chosen-rtl");
            $(".chosen").chosen();
        }
    }

    let audio = new Audio();

    $('#content_track_ids').change(function(){
        console.log($(this).children('option:selected').data('src'));
        if (!audio.paused) {
            audio.pause();
        }

        audio.src = $(this).children('option:selected').data('src')

        if ($(this).children('option:selected').hasClass('play')) {
            $(this).children('option:selected').removeClass('play').addClass('pause')

            $('.far').not($(this).children('option:selected')).each(function() {
                if ($(this).hasClass('pause')) {
                    $(this).removeClass('pause').addClass('play')
                }
            })
            audio.play();
        } else {
            $(this).children('option:selected').removeClass('pause').addClass('play')
        }
    })

</script>
@stop
