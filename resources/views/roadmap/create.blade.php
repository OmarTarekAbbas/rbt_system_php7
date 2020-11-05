@extends('template') @section('page_title') Road Maps @stop @section('content') @include('errors')

<style>
  .z-checkbox input[type="checkbox"] {
    display: none;
    appearance: none;
  }

  .z-checkbox input[type="checkbox"]:checked+label:after {
    transform: scale(1) rotate(0deg);
  }

  .z-checkbox label {
    position: relative;
    cursor: pointer;
    padding-left: 20px;
    cursor: pointer;
    font-size: 13px;
    color: #777;
  }

  .z-checkbox label:before {
    content: '';
    width: 20px;
    height: 20px;
    background-color: #eee;
    border: 1px solid #ccc;
    position: absolute;
    left: 0;
    top: 0;
    border-radius: 4px;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    -ms-border-radius: 4px;
    -o-border-radius: 4px;
  }

  .z-checkbox label:after {
    font-family: 'FontAwesome';
    font-weight: 900;
    content: "\f00c";
    position: absolute;
    top: 0;
    left: 0;
    width: 20px;
    height: 20px;
    background-color: #fff;
    border: 1px solid #000;
    color: #000;
    font-size: 16px;
    line-height: 18px;
    text-align: center;
    transform: scale(0) rotate(360deg);
    transition: all 0.3s ease-in-out;
    border-radius: 4px;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    -ms-border-radius: 4px;
    -o-border-radius: 4px;
  }

  .z-checkbox label:hover {
    text-decoration: underline !important;
    font-weight: 700;
  }

  .row_strip:nth-child(odd) {
    background: #e9f0f9;
    margin-top: 0.5rem !important;
  }

  .row_strip:nth-child(even) {
    background: #f7a1a173;
    margin-bottom: 0.99rem !important;
  }

  .width_m_auto {
    width: 65%;
  }

  .chosen-container-single {
    /* width: 85% !important; */
  }
</style>
<div class="alert alert-danger" style="display: none;">
  <ul>
    <li>

    </li>
  </ul>
</div>
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
        <form class="width_m_auto form-horizontal" action="{{url('roadmaps')}}" method="post">
          {{ csrf_field() }}
          <div class="row">
            <div class="col-md-12" style="float: none; margin: 0 auto;">
              <div class="box box-red">
                <div class="box-title">
                  <h3><i class="fa fa-bars"></i> Event Details</h3>
                </div>
                <!-- BEGIN Left Side -->
                <div class="box-content">
                  <div class="form-group">
                    <label for="event_title" class="col-xs-3 col-lg-2 control-label"> Event Title</label>
                    <div class="col-sm-9 col-lg-10 controls">
                      <input type="text" name="event_title" id="event_title" placeholder="Event Title" class="form-control">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="event_color" class="col-xs-3 col-lg-2 control-label"> Event Color</label>
                    <div class="col-sm-9 col-lg-10 control">
                      <div class="input-group color colorpicker-default" data-color="#3865a8" data-color-format="rgba">
                        <span class="input-group-addon"><i style="background-color: rgb(21, 96, 209);width:21px"></i></span>
                        <input type="text" name="event_color" id="event_color" placeholder="Event Color" class="form-control colorpicker-default" value="#3865a8">
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="event_start_date" class="col-xs-3 col-lg-2 control-label"> Event Start Date</label>
                    <div class="input-group date  event_start_date col-sm-9 col-lg-10 controls" style="width: 80.5%; margin: 0 auto;">
                      <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                      <input type="text" name="event_start_date" id="event_start_date" autocomplete="off" placeholder="Event Start Date" data-date-format="dd-mm-yyyy" class="form-control">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="event_end_date" class="col-xs-3 col-lg-2 control-label"> Event End Date</label>
                    <div class="input-group date event_end_date col-sm-9 col-lg-10 controls" data-date-format="dd-mm-yyyy" style="width: 80.5%; margin: 0 auto;">
                      <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                      <input type="text" name="event_end_date" id="event_end_date" autocomplete="off" placeholder="Event End Date" data-date-format="dd-mm-yyyy" class="form-control">
                    </div>
                  </div>

                </div>

              </div>
              <!-- END Left Side -->
            </div>

            <div class="col-md-12" style="float: none; margin: 0 auto;">
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

            <div class="col-md-12" style="float: none; margin: 0 auto;">
              <div class="box box-red">
                <div class="box-title">
                  <h3><i class="fa fa-bars"></i> Support </h3>
                </div>
                <!-- BEGIN Left Side -->
                <div class="box-content">
                  <div class="form-group">
                    <label for="aggregator_support" class="col-xs-3 col-lg-2 control-label">Aggregator Support</label>
                    <div class="col-sm-9 col-lg-10 controls">
                      <textarea name="aggregator_support" id="aggregator_support" rows="3" class="form-control"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="operator_support" class="col-xs-3 col-lg-2 control-label">Operator Support</label>
                    <div class="col-sm-9 col-lg-10 controls">
                      <textarea name="operator_support" id="operator_support" rows="3" class="form-control"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="promotion_support" class="col-xs-3 col-lg-2 control-label">Promotion Support</label>
                    <div class="col-sm-9 col-lg-10 controls">
                      <textarea name="promotion_support" id="promotion_support" rows="3" class="form-control"></textarea>
                    </div>
                  </div>
                </div>
              </div>
              <!-- END Left Side -->
            </div>
          </div>

          <div class="row append-row">
            <div class="col-md-12 init-input" style="float: none; margin: 0 auto;">
              <div class="box box-red">
                <div class="box-title">
                  <h3>
                    <i class="fa fa-bars"></i> Provider / Content &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </h3>
                  <div class="box-title-icon">
                    <i class="fa fa-trash pull-right"></i>
                    <i class="fa fa-plus pull-right"></i>
                  </div>
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
                    <div class="row track-row" style="width: 70%; margin: 0 auto; border-radius: 0.5rem;">

                    </div>
                  </div>
                </div>
              </div>
              <!-- END Left Side -->
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-6 col-lg-6">
              <button type="submit" class="btn btn-primary borderRadius pull-right"><i class="fa fa-check"></i> Save</button>
            </div>

            <div class="col-sm-6 col-lg-6">
              <button type="button" class="btn borderRadius">Cancel</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

</div>

@stop @section('script')
<script>
  $(document).on('ready', function() {
    $('.event_start_date').datepicker({
      format: 'dd-mm-yyyy',
      autoclose: true,
      startDate: moment().format('DD-MM-YYYY'),
    }).on('changeDate', function(selected) {
      var minDate = new Date(selected.date.valueOf());
      $('.event_end_date').datepicker('setStartDate', minDate);
      $('.event_end_date').datepicker('setDate', minDate);
    })

    $('.event_end_date').datepicker({
      format: 'dd-mm-yyyy',
      autoclose: true,
      startDate: moment().format('DD-MM-YYYY'),
    })
  })
</script>

<script>
  $('#roadmap').addClass('active');
  $('#roadmap-create').addClass('active');

  $(document).on('ready', function() {
    getOperators($('#country_id').val())
    getOccasions($('#country_id').val())
  })

  $('#country_id').change(function() {
    getOperators($(this).val())
    getOccasions($(this).val())
  })

  // api for get operators
  function getOperators(country_id) {
    var operators = []
    country_id = country_id == "{{ all_countries_id() }}" ? '' : country_id
    $.get("{{ url('/api/operators/') }}/" + country_id, function(response) {
      form = createOperaotrForm(response)
      $('#operator_id').html(form)
      $(".chosen").each(function() {
        $(this).trigger("chosen:updated");
      })
    });
  }

  // api for get occasions
  function getOccasions(country_id) {
    var occasion = []
    country_id = country_id == "{{ all_countries_id() }}" ? '' : country_id
    $.get("{{ url('/api/occasions/') }}/" + country_id, function(response) {
      occasionform = createOccasionForm(response)
      $('#occasion_id').html(occasionform)
      $(".chosen").each(function() {
        $(this).trigger("chosen:updated");
      })
    });
  }

  // create input for operators
  function createOperaotrForm(operators) {
    var input = ''
    Object.keys(operators).forEach(key => {
      input += `<option value="${operators[key].id}">${operators[key].country.title} _ ${operators[key].title}</option>`
    });
    return input
  }

  // create input for occasion
  function createOccasionForm(occasions) {
    var input = ''
    Object.keys(occasions).forEach(key => {
      input += '<option value="' + occasions[key].id + '">' + occasions[key].title + '</option>'
    });
    return input
  }
</script>

<script>
  var x = 0
  var y = 0
  $(document).on('ready', function() {
    getContents($('#provider_id').val(), function() {
      getTracks($('#content_id').val())
    })
  })
  $(document).on('change', '#provider_id', function() {
    var _this2 = $(this)
    getContents($(this).val(), function() {
      content_id = $(_this2).parent().parent().siblings('.content').children('.controls').children('#content_id')
      getTracks(content_id.val(), _this2)
    }, $(this))
  })
  $(document).on('change', '#content_id', function() {
    getTracks($(this).val(), $(this))
  })
  // api for get Content
  function getContents(provider_id, callback, _this = '') {
    var occasion = []
    var _this3 = _this
    $.get("{{ url('/api/contents/') }}/" + provider_id, function(response) {
      contentform = createContentForm(response)
      if (_this3 && _this3 != '') {
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
    var _this3 = _this
    $.get("{{ url('/api/tracks/') }}/" + content_id, function(response) {
      trackform = createTracktForm(response)
      if (_this3 && _this3 != '') {
        $(_this3).parent().parent().siblings().last().children('.track-row').html(trackform)
      } else {
        $('.track-row').html(trackform)
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
      input += '<option value="' + contents[key].id + '">' + contents[key].content_title + '</option>'
    });
    return input
  }
  // create input for content
  function createTracktForm(tracks) {
    var input = ''
    Object.keys(tracks).forEach(key => {
      y = y + 1
      input += `<div class="row row_strip text-center" style="width: 80%; margin: 10px auto; padding: 10px 10px; border-radius: 8px;">
                        <div class="col-md-4 z-checkbox">
                          <input id="box-${y}" class="input_checkbox" type="checkbox" value="${tracks[key].id}" name="content_track_ids[${x}][]">
                          <label class="label_checkbox" for="box-${y}"></label>
                        </div>
                        <div class="col-md-4">
                            <i style="color: #000; line-height: 35px;" data-src="{{url("/")}}/${tracks[key].track_file}" class="fa fa-play play_pause"></i>
                        </div>
                        <div class="col-md-4">
                            <p class="text-right" style="font-weight: bold; margin-top: 7px;"> ${tracks[key].track_title_en} </p>
                        </div>
                    </div>`
    });
    x++;
    return input
  }


  $(document).on('click', '.fa-plus', function() {
    form = getFormCopy()
    $('.append-row').append(form)
    initChosen()
  })

  function getFormCopy() {
    var form = '<div class="col-md-12 init-input" style="float: none; margin: 0 auto;">\
                        <div class="box box-red">\
                            <div class="box-title">\
                                <h3><i class="fa fa-bars"></i> Provider / Content &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h3>\
                                <div class="box-title-icon">\
                                <i class="fa fa-trash pull-right"></i>\
                                <i class="fa fa-plus pull-right"></i>\
                                </div>\
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
                                     <div class="row track-row " style="width: 70%; margin: 0 auto; border-radius: 0.5rem;">\
                                    </div>\
                                </div>\
                            </div>\
                        </div>\
                    </div>'
    return form;
  }

  $(document).on('click', '.fa-trash', function() {
    if ($('.append-row').children().length > 1)
      $(this).parent().parent().parent().parent().remove()
  })

  function initChosen() {
    var el = $('.chosen-rtl');
    if ("<?php echo App::getLocale(); ?>" == "ar") {
      el.chosen({
        rtl: true,
        width: '100%'
      });
    } else {
      el.addClass("chosen");
      el.removeClass("chosen-rtl");
      $(".chosen").chosen();
    }
  }

  let audio = new Audio();

  $(document).on('click', '.play_pause', function(e) {
    e.preventDefault()

    if (!audio.paused) {
      audio.pause();
    }


    audio.src = $(this).data('src')

    if ($(this).hasClass('fa-play')) {
      $(this).removeClass('fa-play').addClass('fa-pause')

      $('.play_pause').not($(this)).each(function() {
        if ($(this).hasClass('fa-pause')) {
          $(this).removeClass('fa-pause').addClass('fa-play')
        }
      })
      audio.play();
    } else {
      $(this).removeClass('fa-pause').addClass('fa-play')
    }
  })
</script>
@stop