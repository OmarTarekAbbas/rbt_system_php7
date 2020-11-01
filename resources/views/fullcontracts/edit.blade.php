@extends('template') @section('page_title') Contract @stop @section('content')
<link href="{{url('assets/contract/css/sximo.min.css')}}" rel="stylesheet">
<link href="{{url('assets/contract/css/core.css')}}" rel="stylesheet">
<link href="{{url('assets/contract/css/blue.css')}}" rel="stylesheet">
<script type="text/javascript" src="{{url('assets/contract/js/sximo.min.js')}}"></script>
<script type="text/javascript" src="{{url('assets/contract/js/sximo.js')}}"></script>
<style>
    @media screen and (min-width: 768px) {
        .page-wrapper .page-content {
            padding-left: unset;
        }
    }

    .radio_check {
        display: inline-block;
        *display: inline;
        vertical-align: middle;
        margin: 0;
        padding: 0;
        width: 20px;
        height: 20px;
        background: url(blue.png) no-repeat;
        border: none;
        cursor: pointer;
    }

    .dropdown-toggle::after {
        display: none;
    }

    .nav-list>li {
        width: 100%;
    }

    .start_date {
        text-align: right;
    }

    input[type="date"]::-webkit-datetime-edit,
    input[type="date"]::-webkit-inner-spin-button,
    input[type="date"]::-webkit-clear-button {
        color: #fff;
        position: relative;
    }

    input[type="date"]::-webkit-datetime-edit-year-field {
        position: absolute !important;
        padding: 2px;
        color: #000;
        left: 0;
    }

    input[type="date"]::-webkit-datetime-edit-month-field {
        position: absolute !important;
        padding: 2px;
        color: #000;
        left: 30px;
    }

    input[type="date"]::-webkit-datetime-edit-day-field {
        position: absolute !important;
        color: #000;
        padding: 2px;
        left: 53px;
    }
</style>

<div id="preloader"></div>
<div id="app" class="page-wrapper">
    <main class="page-content">
        <a href="javascript:;" class="toggleMenu flying-button"><i class="lni-menu"></i></a>
        <div class="page-inner">
            <div class="ajaxLoading"></div>
            <form method="POST" action="{{url('fullcontracts/'.$contract->id.'/update')}}" class="form-vertical validated sximo-form" id="FormTable" enctype="multipart/form-data">
                @csrf
                <div class="toolbar-nav">
                    <div class="row">
                        <div class="col-md-6 ">
                            <div class="submitted-button">
                                <button name="apply" class="tips btn btn-sm   " title="Back"><i class="fa  fa-check"></i> Apply Change(s) </button>
                                <button name="save" class="tips btn btn-sm " id="saved-button" title="Back"><i class="fa  fa-paste"></i> Save </button>
                            </div>
                        </div>
                        <div class="col-md-6 text-right ">
                            <a href="{{url('fullcontracts')}}" class="tips btn   btn-sm " title="Back"><i class="fa  fa-times"></i></a>
                        </div>
                    </div>
                </div>
                <div class="p-5">
                    <ul class="parsley-error-list">
                    </ul>
                    <div class="row">
                        <div id="wizard-step" class="wizard-circle number-tab-steps">
                            <h3>Main</h3>
                            <section>
                                <input name="contract_code" type="hidden" value="">

                                <div class="form-group  ">
                                    <label for="ipt" class=" control-label "> Label <span class="asterix"> * </span> </label>
                                    <input type='text' name='contract_label' value="{{$contract->contract_label}}" id='contract_label' value='' required class='form-control' />
                                </div>

                                <div class="form-group  ">
                                    <label for="ipt" class=" control-label "> Company <span class="asterix"> * </span> </label>
                                    <select name='first_party_id' rows='5' id='first_party_id' class='select2 ' required>
                    <option value="">-- Please Select --</option>
                    @foreach($first_parties as $first_partie)
                    <option value="{{$first_partie->id}}" @if($contract->first_party_id==$first_partie->id) selected="selected" @endif>{{$first_partie->first_party_title}}</option>
                    @endforeach
                  </select>
                                </div>

                                <div class="form-group  ">
                                    <label for="ipt" class=" control-label "> First Party ? <span class="asterix"> * </span> </label>
                                    <input type="checkbox" class="radio_check" value="1" name='first_party_select' @if($contract->first_party_select) checked="checked" @endif /> Yes
                                    <input type="checkbox" class="radio_check" value="0" name='first_party_select' @if(!$contract->first_party_select) checked="checked" @endif /> No
                                </div>

                                <div class="form-group  ">
                                    <label for="ipt" class=" control-label "> First Party (%) <span class="asterix"> * </span> </label>
                                    <select name='first_party_percentage' rows='5' id='first_party_percentage' class='select2 ' required>
                    <option value="">-- Please Select --</option>
                    @foreach($percentages as $percentage)
                    <option value="{{$percentage->percentage}}" @if($contract->first_party_percentage==$percentage->percentage) selected="selected" @endif>{{$percentage->percentage}}</option>
                    @endforeach
                  </select>
                                </div>

                                <div class="form-group  ">
                                    <label for="ipt" class=" control-label "> Copies <span class="asterix"> * </span> </label>
                                    <input type="checkbox" class="radio_check" value="1" name='copies' @if($contract->copies == 1) checked="checked" @endif /> 1 Copy
                                    <input type="checkbox" class="radio_check" value="2" name='copies' @if($contract->copies == 2) checked="checked" @endif /> 2 Copy
                                    <input type="checkbox" class="radio_check" value="3" name='copies' @if($contract->copies == 3) checked="checked" @endif /> 3 Copy
                                </div>

                                <div class="form-group  ">
                                    <label for="ipt" class=" control-label "> Pages <span class="asterix"> * </span> </label>
                                    <input type='text' name='pages' id='pages' value='{{$contract->pages}}' required class='form-control form-control-sm ' />
                                </div>


                            </section>
                            <h3>Services/Client/Network</h3>
                            <section>
                                <div class="form-group  ">
                                    <label for="ipt" class=" control-label "> Service Type <span class="asterix"> * </span> </label>
                                    <select name='service_type_id' rows='5' id='service_type_id' class='select2 ' required>
                    <option value="">-- Please Select --</option>
                    @foreach($service_types as $service_type)
                    <option value="{{$service_type->id}}" @if($contract->service_type_id==$service_type->id) selected="selected" @endif>{{$service_type->service_type_title}}</option>
                    @endforeach
                  </select>
                                </div>

                                <div class="form-group  ">
                                    <label for="ipt" class=" control-label "> Client Type <span class="asterix"> * </span> </label>
                                    <select name='second_party_type_id' rows='5' id='second_party_type_cli' class="form-control" required>
                    <option value="">-- Please Select --</option>
                    @foreach($second_partys as $second_party)
                    <option value="{{$second_party->id}}" @if($contract->second_party_type_id==$second_party->id) selected="selected" @endif >{{$second_party->second_party_type_title}}</option>
                    @endforeach
                  </select>
                                </div>

                                <div class="form-group  ">
                                    <label for="ipt" class=" control-label "> Client <span class="asterix"> * </span> </label>
                                    <select name='second_party_id' rows='5' id='second_party_id' class='select2 ' required>
                  </select>
                                </div>

                                <div class="form-group  ">
                                    <label for="ipt" class=" control-label "> Countries <span class="asterix"> * </span> </label>
                                    <select name='country_title[]' multiple rows='5' id='country_title' class='select2 ' required>

                    @foreach($countries as $country)
                    <option value="{{$country->title}}" @if(in_array($country->title,explode(",",$contract->country_title))) selected="selected" @endif>{{$country->title}}</option>
                    @endforeach
                  </select>
                                </div>

                                <div class="form-group  ">
                                    <label for="ipt" class=" control-label "> Operators <span class="asterix"> * </span> </label>
                                    <select name='operator_title[]' multiple rows='5' id='operator_title' class='select2 ' required>

                    @foreach($operators as $operator)
                    <option value="{{$operator->title}}" @if(in_array($operator->title,explode(",",$contract->operator_title))) selected="selected" @endif>{{$operator->title}}</option>
                    @endforeach
                  </select>

                            </section>
                            <h3>Dates/Status/File</h3>
                            <section>

                                <div class="form-group">
                                    <label for="ipt" class="control-label "> Contract Singed Date </label>
                                    <div class="input-group input-group-sm m-b" style="width:170px !important;">
                                        <div class="input-group">
                                            <input type="date" value="{{$contract->contract_signed_date}}" class="form-control form-control-sm " name="contract_signed_date" id="signed_date_input" />
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group  ">
                                    <label for="ipt" class=" control-label "> Contract Date <span class="asterix"> * </span> </label>
                                    <div class="input-group input-group-sm m-b" style="width:170px !important;">
                                        <div class="input-group">
                                            <input class="form-control form-control-sm " name="contract_date" id="start_date" type="date" value="{{$contract->contract_date}}" />

                                        </div>
                                    </div>
                                </div>

                                <div class="form-group  ">
                                    <label for="ipt" class=" control-label "> Contract Duration <span class="asterix"> * </span> </label>
                                    <select name='contract_duration_id' rows='5' id='contract_duration' class="form-control" required>
                    <option value="">-- Please Select --</option>
                    @foreach($contract_durations as $contract_duration)
                    <option data-type="@if(strpos($contract_duration->contract_duration_title,'onth')!==false) month @else years @endif" value="{{$contract_duration->contract_duration_id}}" @if($contract->contract_duration_id==$contract_duration->contract_duration_id) selected="selected" @endif>{{$contract_duration->contract_duration_title}}</option>
                    @endforeach
                  </select>
                                </div>

                                <div class="form-group  ">
                                    <label for="ipt" class=" control-label "> Renewal Status <span class="asterix"> * </span> </label>
                                    <input type="checkbox" class="radio_check" value="1" name='renewal_status' @if($contract->renewal_status == 1) checked="checked" @endif /> AR
                                    <input type="checkbox" class="radio_check" value="0" name='renewal_status' @if($contract->renewal_status == 0) checked="checked" @endif /> No
                                    <input type="checkbox" class="radio_check" value="2" name='renewal_status' @if($contract->renewal_status == 2) checked="checked" @endif /> RBAO
                                </div>

                                <div class="form-group  ">
                                    <label for="ipt" class=" control-label "> Contract Status <span class="asterix"> * </span> </label>
                                    <input type="checkbox" class="radio_check" value="1" name='contract_status' @if($contract->contract_status == 1) checked="checked" @endif /> Active
                                    <input type="checkbox" class="radio_check" value="0" name='contract_status' @if($contract->contract_status == 0) checked="checked" @endif /> Terminated
                                </div>

                                <div class="form-group  ">
                                    <label for="ipt" class=" control-label "> Expiry Date <span class="asterix"> * </span> </label>

                                    <div class="input-group input-group-sm m-b" style="width:170px !important;">
                                        <div class="input-group">
                                            <input class="form-control form-control-sm " id="contract_expiry_date" name="contract_expiry_date" type="date" value="{{$contract->contract_expiry_date}}" />
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="ipt" class=" control-label "> Contract Type  </label>
                                    <select name="contract_type" id="contract_type" class="form-control" disabled>
                        <option value="1" @if($contract->contract_type == 1) selected="selected" @endif>Draft</option>
                        <option value="2" @if($contract->contract_type == 2) selected="selected" @endif>New</option>
                    </select>
                                </div>

                                <div class="form-group  ">
                                    <label for="ipt" class=" control-label "> Contract File <a href="{{url('uploads/contracts/'.$contract->contract_pdf)}}" target="_blank"> Click To Preview </a> </label>
                                    <div class="fileUpload btn ">
                                        <span> <i class="fa fa-copy"></i> </span>
                                        <div class="title"> Browse File </div>
                                        <input type="file" name="contract_pdf" class="upload" />
                                    </div>
                                    <div class="contract_pdf-preview preview-upload">
                                        <img src='http://localhost/contracts/uploads/images/no-image.png' border='0' width='80' class='img-circle' />
                                    </div>
                                </div>

                                <div class="form-group  ">
                                    <label for="ipt" class=" control-label "> Notes </label>
                                    <textarea name='contract_notes' rows='5' id='contract_notes' class='form-control form-control-sm '>{{$contract->contract_notes}}</textarea>
                                </div>
                            </section>
                        </div>
                    </div>
                    <input type="hidden" name="action_task" value="save" />
                </div>
            </form>
            <script type="text/javascript">
                $(".submitted-button").hide()
                $("#wizard-step").steps({
                    headerTag: "h3",
                    bodyTag: "section",
                    transitionEffect: "fade",
                    titleTemplate: "<span class='step'>#index#</span> #title#",
                    autoFocus: true,
                    labels: {
                        finish: "Submit"
                    },
                    onFinished: function(event, currentIndex) {
                        $("#saved-button").click();
                    }
                });
                $(".steps ul > li > a span").removeClass("number")

                $('.removeMultiFiles').on('click', function() {
                    var removeUrl = 'http://localhost/contracts/fullcontracts/removefiles?file=' + $(this).attr('url');
                    $(this).parent().remove();
                    $.get(removeUrl, function(response) {});
                    $(this).parent('div').empty();
                    return false;
                });
            </script>
        </div>
    </main>
</div>
@stop @section('script')
<script>
    $('#contract').addClass('active');
    $('#contract-index').addClass('active');
    $("input:checkbox").on('click', function() {
        // in the handler, 'this' refers to the box clicked on
        var $box = $(this);
        if ($box.is(":checked")) {
            // the name of the box is retrieved using the .attr() method
            // as it is assumed and expected to be immutable
            var group = "input:checkbox[name='" + $box.attr("name") + "']";
            // the checked state of the group/box on the other hand will change
            // and the current value is retrieved using .prop() method
            $(group).prop("checked", false);
            $box.prop("checked", true);
        } else {
            $box.prop("checked", false);
        }
    });

    $(document).on('ready', function() {
        $.ajax({
                method: 'GET',
                url: "{{url('/client_type')}}",
                data: {
                    body: $('#second_party_type_cli').val(),
                    second_party_id: "{{$contract->second_party_id}}",
                    _token: token
                }
            })
            .done(function(client_type) {
                $('#second_party_id').html(client_type);
            });
    })

    var token = '{{Session::token()}}';
    $('#second_party_type_cli').on('change', function() {
        $.ajax({
                method: 'GET',
                url: "{{url('/client_type')}}",
                data: {
                    body: $(this).val(),
                    second_party_id: "{{$contract->second_party_id}}",
                    _token: token
                }
            })
            .done(function(client_type) {
                $('#second_party_id').html(client_type);
            });
    });
</script>

<script>
    var monthes = 12;
    $("#contract_duration").change(function() {
        number = ($(this).find('option:selected').text()).match(/\d+/)[0];
        monthes = ($(this).find('option:selected').data('type')).includes('m') ?  number : number * 12
        setEndDate($("#start_date").val(), monthes)
    })

    $("#start_date").change(function() {
        var endDate = $(this).val();
        setEndDate(endDate, monthes)
    });

    function setEndDate(endDate, monthes) {
        $("#contract_expiry_date").val(moment(endDate, "YYYY-MM-DD").locale('en').add(monthes, 'month').subtract(1, 'day').format('YYYY-MM-DD'))
    }
</script>

@stop
