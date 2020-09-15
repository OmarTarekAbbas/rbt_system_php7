@extends('template')
@section('page_title')
Contract
@stop
@section('content')
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
</style>

<div id="preloader"></div>
<div id="app" class="page-wrapper">
    <main class="page-content">
        <a href="javascript:;" class="toggleMenu flying-button"><i class="lni-menu"></i></a>
        <div class="page-inner">
            <div class="ajaxLoading"></div>
            <form method="POST" action="{{url('fullcontracts')}}" class="form-vertical validated sximo-form" id="FormTable" enctype="multipart/form-data">
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
                                    <input type='text' name='contract_label' id='contract_label' value='' required class='form-control' />
                                </div>

                                <div class="form-group  ">
                                    <label for="ipt" class=" control-label "> Company <span class="asterix"> * </span> </label>
                                    <select name='first_party_id' rows='5' id='first_party_id' class='select2' required>
                                        <option value="">-- Please Select --</option>
                                        @foreach($first_parties as $first_partie)
                                        <option value="{{$first_partie->id}}">{{$first_partie->first_party_title}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group  ">
                                    <label for="ipt" class=" control-label "> First Party ? <span class="asterix"> * </span> </label>
                                    <input type="checkbox" class="radio_check" value="1" checked="checked" name='first_party_select' /> Yes
                                    <input type="checkbox" class="radio_check" value="0" name='first_party_select' /> No
                                </div>

                                <div class="form-group  ">
                                    <label for="ipt" class=" control-label "> First Party (%) <span class="asterix"> * </span> </label>
                                    <select name='first_party_percentage' rows='5' id='first_party_percentage' class='select2 ' required>
                                        <option value="">-- Please Select --</option>
                                        @foreach($percentages as $percentage)
                                        <option value="{{$percentage->id}}">{{$percentage->percentage}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group  ">
                                    <label for="ipt" class=" control-label "> Copies <span class="asterix"> * </span> </label>
                                    <input type="checkbox" class="radio_check" checked="checked" value="1" name='copies' /> 1 Copy
                                    <input type="checkbox" class="radio_check" value="2" name='copies' /> 2 Copy
                                    <input type="checkbox" class="radio_check" value="3" name='copies' /> 3 Copy
                                </div>

                                <div class="form-group  ">
                                    <label for="ipt" class=" control-label "> Pages <span class="asterix"> * </span> </label>
                                    <input type='text' name='pages' id='pages' value='' required class='form-control form-control-sm ' />
                                </div>

                            </section>
                            <h3>Services/Client/Network</h3>
                            <section>
                                <div class="form-group  ">
                                    <label for="ipt" class=" control-label "> Service Type <span class="asterix"> * </span> </label>
                                    <select name='service_type_id' rows='5' id='service_type_id' class='select2 ' required>
                                        <option value="">-- Please Select --</option>
                                        @foreach($service_types as $service_type)
                                        <option value="{{$service_type->id}}">{{$service_type->service_type_title}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group  ">
                                    <label for="ipt" class=" control-label "> Client Type <span class="asterix"> * </span> </label>
                                    <select name='second_party_type_id' rows='5' id='second_party_type_cli' class="form-control" required>
                                        <option value="">-- Please Select --</option>
                                        @foreach($second_partys as $second_party)
                                        <option value="{{$second_party->id}}">{{$second_party->second_party_type_title}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group  ">
                                    <label for="ipt" class=" control-label "> Client <span class="asterix"> * </span> </label>
                                    <select name='second_party_id' rows='5' id='second_party_id' class='select2 ' required></select>
                                </div>

                                <div class="form-group  ">
                                    <label for="ipt" class=" control-label "> Countries <span class="asterix"> * </span> </label>
                                    <select name='country_title[]' multiple rows='5' id='country_title' class='select2 ' required>
                                    <option value="">-- Please Select --</option>
                                        @foreach($countries as $country)
                                        <option value="{{$country->title}}">{{$country->title}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group  ">
                                    <label for="ipt" class=" control-label "> Operators <span class="asterix"> * </span> </label>
                                    <select name='operator_title[]' multiple rows='5' id='operator_title' class='select2 ' required>
                                    <option value="">-- Please Select --</option>
                                        @foreach($operators as $operator)
                                        <option value="{{$operator->title}}">{{$operator->title}}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </section>
                            <h3>Dates/Status/File</h3>
                            <section>
                                <div class="form-group  ">
                                    <label for="ipt" class=" control-label "> Contract Date <span class="asterix"> * </span> </label>
                                    <div class="input-group input-group-sm m-b" style="width:150px !important;">
                                        <input class="form-control form-control-sm date" name="contract_date" type="date" value="">
                                    </div>
                                </div>

                                <div class="form-group  ">
                                    <label for="ipt" class=" control-label "> Contract Duration <span class="asterix"> * </span> </label>
                                    <select name='contract_duration_id' rows='5' id='contract_duration_id' class='select2 ' required>
                                    <option value="">-- Please Select --</option>
                                        @foreach($contract_durations as $contract_duration)
                                        <option value="{{$contract_duration->contract_duration_id}}">{{$contract_duration->contract_duration_title}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group  ">
                                    <label for="ipt" class=" control-label "> Renewal Status <span class="asterix"> * </span> </label>
                                    <input type="checkbox" class="radio_check" value="1" checked="checked" name='renewal_status' /> AR
                                    <input type="checkbox" class="radio_check" value="0" name='renewal_status' /> No
                                    <input type="checkbox" class="radio_check" value="2" name='renewal_status' /> RBAO
                                </div>

                                <div class="form-group  ">
                                    <label for="ipt" class=" control-label "> Contract Status <span class="asterix"> * </span> </label>
                                    <input type="checkbox" class="radio_check" value="1" checked="checked" name='contract_status' /> Active
                                    <input type="checkbox" class="radio_check" value="0" name='contract_status' /> Terminated
                                </div>

                                <div class="form-group  ">
                                    <label for="ipt" class=" control-label "> Expiry Date <span class="asterix"> * </span> </label>
                                    <div class="input-group input-group-sm m-b" style="width:150px !important;">
                                        <input class="form-control form-control-sm date" name="contract_expiry_date" type="date" value="">
                                    </div>
                                </div>

                                <div class="form-group  ">
                                    <label for="ipt" class=" control-label "> Contract File </label>
                                    <div class="fileUpload btn ">
                                        <span> <i class="fa fa-copy"></i> </span>
                                        <div class="title"> Browse File </div>
                                        <input type="file" name="contract_pdf" class="upload" />
                                    </div>
                                    <div class="contract_pdf-preview preview-upload">
                                        <img src='http://localhost/contracts/uploads/images/no-image.png' border='0' width='80' class='img-circle' /></a>
                                    </div>
                                </div>

                                <div class="form-group  ">
                                    <label for="ipt" class=" control-label "> Notes </label>
                                    <textarea name='contract_notes' rows='5' id='contract_notes' class='form-control form-control-sm '></textarea>
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
@stop

@section('script')
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

    var token = '{{Session::token()}}';
    $('#second_party_type_cli').on('change', function() {
        console.log("omar");
        $.ajax({
                method: 'GET',
                url: "{{url('/client_type')}}",
                data: {
                    body: $(this).val(),
                    _token: token
                }
            })
            .done(function(client_type) {
                $('#second_party_id').html(client_type);
            });
    });
</script>

@stop
