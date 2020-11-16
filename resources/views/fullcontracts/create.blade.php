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

  @media (min-width: 320px) and (max-width: 410.9px) {
  .signed_date_input,
  .start_date,
  .contract_expiry_date {
    width: 100% !important;
  }

  .footer {
    margin-top: 23%;
  }
  }
</style>

<div id="preloader"></div>
<div id="main-content">
<div id="app" class="page-wrapper">
  <main class="page-content">
    <a href="javascript:;" class="toggleMenu flying-button"><i class="lni-menu"></i></a>
    <div class="page-inner">
      <div class="ajaxLoading"></div>
      <form method="POST" action="{{url('fullcontracts')}}" class="form-vertical validated sximo-form" id="FormTable" enctype="multipart/form-data">
        @csrf
        <div class="toolbar-nav visible-md visible-lg">
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
        <div class="p-5 noPaddingPhone">
          <ul class="parsley-error-list">
          </ul>
          <div class="row">
            <div id="wizard-step" class="wizard-circle number-tab-steps">
              <h3>Main</h3>
              <section class="width_m_auto">

                <div class="form-group">
                  <label for="ipt" class=" control-label "> Label <span class="asterix"> * </span>
                  </label>
                  <input type='text' name='contract_label' id='contract_label' value='' required class='form-control' />
                </div>

                <div class="form-group  ">
                  <label for="ipt" class=" control-label "> Company <span class="asterix"> * </span>
                  </label>
                  <select name='first_party_id' rows='5' id='first_party_id' class='form-control' required>
                    <option value="">-- Please Select --</option>
                    @foreach($first_parties as $first_partie)
                    <option value="{{$first_partie->id}}">{{$first_partie->first_party_title}}
                    </option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group  ">
                  <label for="ipt" class=" control-label "> First Party ? <span class="asterix"> *
                    </span> </label>
                  <input type="checkbox" class="radio_check" value="1" checked="checked" name='first_party_select' /> Yes
                  <input type="checkbox" class="radio_check" value="0" name='first_party_select' /> No
                </div>

                <div class="form-group  ">
                  <label for="ipt" class=" control-label "> First Party (%) <span class="asterix"> *
                    </span> </label>
                  <select name='first_party_percentage' rows='5' id='first_party_percentage' class='form-control ' required>
                    <option value="">-- Please Select --</option>
                    @foreach($percentages as $percentage)
                    <option value="{{$percentage->percentage}}">{{$percentage->percentage}}</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group  ">
                  <label for="ipt" class=" control-label "> Copies <span class="asterix"> * </span>
                  </label>
                  <input type="checkbox" class="radio_check" checked="checked" value="1" name='copies' /> 1 Copy
                  <input type="checkbox" class="radio_check" value="2" name='copies' /> 2 Copy
                  <input type="checkbox" class="radio_check" value="3" name='copies' /> 3 Copy
                </div>


                <div class="form-group  ">
                  <label for="ipt" class=" control-label "> Pages <span class="asterix"> * </span>
                  </label>
                  <input type='text' name='pages' id='pages' value='' required class='form-control form-control-sm ' />
                </div>

                <div class="form-group  ">
                  <label for="ipt" class=" control-label "> first part person name (ويمثلها الطرف الاول فى هذا العقد السيد) </label>
                  <input type="text" id="first_part_person_input" class="form-control" name='first_part_person' />
                </div>

                <div class="form-group  ">
                  <label for="ipt" class=" control-label "> first part character name (بصفته) </label>
                  <input type="text" id="first_part_character_input" class="form-control" name='first_part_character' />
                </div>

                <div class="form-group  ">
                  <label for="ipt" class=" control-label "> first part address </label>
                  <input type="text" id="first_part_address_input" class="form-control" name='first_part_address' />
                </div>

                <div class="form-group  ">
                  <label for="ipt" class=" control-label "> first commercial register no (رقم السجل التجارى للطرف الاول)</label>
                  <input type="text" id="first_commercial_register_no_input" class="form-control" name='first_commercial_register_no' />
                </div>

                <div class="form-group  ">
                  <label for="ipt" class=" control-label "> first tax card no (رقم البطاقة الضريبية للطرف الاول) </label>
                  <input type="text" id="first_tax_card_no_input" class="form-control" name='first_tax_card_no' />
                </div>

                <div class="form-group  ">
                  <label for="ipt" class=" control-label "> first part email </label>
                  <input type="text" id="first_part_email_input" class="form-control" name='first_part_email' />
                </div>

                <div class="form-group  ">
                  <label for="ipt" class=" control-label "> first part phone </label>
                  <input type="text" id="first_part_phone_input" class="form-control" name='first_part_phone' />
                </div>

              </section>
              <h3>Services/Client/Network</h3>
              <section class="width_m_auto">
                <div class="form-group  ">
                  <label for="ipt" class=" control-label "> Service Type <span class="asterix"> *
                    </span> </label>
                  <select name='service_type_id' rows='5' id='service_type_id' class='select2 ' required>
                    <option value="">-- Please Select --</option>
                    @foreach($service_types as $service_type)
                    <option value="{{$service_type->id}}">{{$service_type->service_type_title}}
                    </option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group  ">
                  <label for="ipt" class=" control-label "> Client Type <span class="asterix"> *
                    </span> </label>
                  <select name='second_party_type_id' rows='5' id='second_party_type_cli' class="form-control" required>
                    <option value="">-- Please Select --</option>
                    @foreach($second_partys as $second_party)
                    <option value="{{$second_party->id}}">{{$second_party->second_party_type_title}}
                    </option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group  ">
                  <label for="ipt" class=" control-label "> Client <span class="asterix"> * </span>
                  </label>
                  <select name='second_party_id' rows='5' id='second_party_id' class='form-control ' required></select>
                </div>

                <div class="form-group  ">
                  <label for="ipt" class=" control-label "> second part person name (ويمثلها الطرف الثانى فى هذا العقد السيد) </label>
                  <input type="text" id="second_part_person_input" class="form-control" name='second_part_person' />
                </div>

                <div class="form-group  ">
                  <label for="ipt" class=" control-label "> second part character name (بصفته) </label>
                  <input type="text" id="second_part_character_input" class="form-control" name='second_part_character' />
                </div>

                <div class="form-group  ">
                  <label for="ipt" class=" control-label "> second part address </label>
                  <input type="text" id="second_part_address_input" class="form-control" name='second_part_address' />
                </div>

                <div class="form-group  ">
                  <label for="ipt" class=" control-label "> second commercial register no (رقم السجل التجارى للطرف الثانى) </label>
                  <input type="text" id="second_commercial_register_no_input" class="form-control" name='second_commercial_register_no' />
                </div>

                <div class="form-group  ">
                  <label for="ipt" class=" control-label "> second tax card no (رقم البطاقة الضريبية للطرف الثانى) </label>
                  <input type="text" id="second_tax_card_no_input" class="form-control" name='second_tax_card_no' />
                </div>

                <div class="form-group  ">
                  <label for="ipt" class=" control-label "> second part email </label>
                  <input type="text" id="second_part_email_input" class="form-control" name='second_part_email' />
                </div>

                <div class="form-group  ">
                  <label for="ipt" class=" control-label "> second part phone </label>
                  <input type="text" id="second_part_phone_input" class="form-control" name='second_part_phone' />
                </div>

                <div class="form-group  ">
                  <label for="ipt" class=" control-label "> Countries <span class="asterix"> * </span>
                  </label>
                  <select name='country_title[]' multiple rows='5' id='country_title' class='select2 ' required>

                    @foreach($countries as $country)
                    <option value="{{$country->title}}">{{$country->title}}</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group  ">
                  <label for="ipt" class=" control-label "> Operators <span class="asterix"> * </span>
                  </label>
                  <select name='operator_title[]' multiple rows='5' id='operator_title' class='select2 ' required>

                    @foreach($operators as $operator)
                    <option value="{{$operator->title}}">
                      {{$operator->title}}</option>
                    @endforeach
                  </select>
                </div>

              </section>
              <h3>Dates/Status/File</h3>

              <section class="width_m_auto">
                <div class="form-group">
                  <label for="signed_date_input" class=" control-label"> Contract Singed Date</label>
                  <div class="input-group date  signed_date_input controls">
                    <span class="input-group-addon input_group_new"><i class="fa fa-calendar"></i></span>
                    <input type="text" name="contract_signed_date" id="signed_date_input" autocomplete="off" placeholder="Contract Singed Date" data-date-format="dd-mm-yyyy" class="form-control" value="" style="height: 33px;" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="start_date" class=" control-label"> Contract Start Date</label>
                  <div class="input-group date  start_date controls">
                    <span class="input-group-addon input_group_new"><i class="fa fa-calendar"></i></span>
                    <input type="text" name="contract_date" id="start_date" autocomplete="off" placeholder="Contract Start Date" data-date-format="dd-mm-yyyy" class="form-control" value="" style="height: 33px;" required>
                  </div>
                </div>


                <div class="form-group  ">
                  <label for="ipt" class=" control-label "> Contract Duration <span class="asterix"> *
                    </span> </label>
                  <select name='contract_duration_id' rows='5' id='contract_duration' class="form-control" required>
                    <option value="">-- Please Select --</option>
                    @foreach($contract_durations as $contract_duration)
                    <option data-type="@if(is_year($contract_duration->contract_duration_title)) years @else month  @endif" value="{{$contract_duration->contract_duration_id}}">
                      {{$contract_duration->contract_duration_title}}</option>
                    @endforeach
                  </select>
                </div>


                <div class="form-group">
                  <label for="contract_expiry_date" class=" control-label">Expiry Date</label>
                  <div class="input-group date contract_expiry_date controls">
                    <span class="input-group-addon input_group_new"><i class="fa fa-calendar"></i></span>
                    <input type="text" name="contract_expiry_date" placeholder=" End Date" data-date-format="dd-mm-yyyy" class="form-control" value="" style="height: 33px;" id="contract_expiry_date" required>
                  </div>
                </div>

                <div class="form-group  ">
                  <label for="ipt" class=" control-label "> Renewal Status <span class="asterix"> *
                    </span> </label>
                  <input type="checkbox" class="radio_check" value="1" checked="checked" name='renewal_status' /> AR
                  <input type="checkbox" class="radio_check" value="0" name='renewal_status' /> No
                  <input type="checkbox" class="radio_check" value="2" name='renewal_status' /> RBAO
                </div>

                <div class="form-group  ">
                  <label for="ipt" class=" control-label "> Contract Status <span class="asterix"> *
                    </span> </label>
                  <input type="checkbox" class="radio_check" value="1" checked="checked" name='contract_status' /> Active
                  <input type="checkbox" class="radio_check" value="0" name='contract_status' /> Terminated
                </div>

                <div class="form-group  ">
                  <label for="ipt" class=" control-label "> Notes </label>
                  <textarea name='contract_notes' rows='5' id='contract_notes' class='form-control form-control-sm '></textarea>
                </div>
              </section>
              <h3>Template</h3>
              <section class="width_m_auto">
                <div class="form-group">
                  <label for="ipt" class=" control-label "> Contract Type <span class="asterix"> *
                    </span> </label>
                  <select name="contract_type" id="contract_type" class="form-control" required>
                    <option value="1">Draft</option>
                    <option value="2">New</option>
                  </select>
                </div>

                <div class="form-group select_contract_type_draft">
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

                <div class="form-group select_contract_type_new" style="display: none">
                  <label for="ipt" class=" control-label "> Template <span class="asterix"> * </span>
                  </label>
                  <select name='template_id' rows='5' id='template_id' class="form-control" disabled>
                    <option value="">-- Please Select --</option>
                    @foreach($templates as $template)
                    <option value="{{$template->id}}">{{$template->title}}</option>
                    @endforeach
                  </select>
                </div>

                <div id="ContractTemplateItems" class="select_contract_type_new">

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
</div>

<div id="add-modal" class="modal add-modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Term</h5>
      </div>
      <div class="modal-body">
        <div class="form-group" id="cktextarea">
          <div class=" controls">
            <textarea class="form-control ckeditor" name="add_advanced_text" rows="6"></textarea>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button id="add-item" type="button" class="btn btn-primary">Save changes</button>
        <button id="close-add-modal" type="button" class="btn btn-secondary" data-dismiss="add-modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div id="edit-modal" class="modal edit-modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">edit Term</h5>
      </div>
      <div class="modal-body">
        <div class="form-group" id="add-cktextarea">
          <div class=" controls">
            <textarea class="form-control ckeditor" name="edit_advanced_text" rows="6"></textarea>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button id="edit-item" onclick="editItem($(this).data('id'))" type="button" class="btn btn-primary">Save
          changes</button>
        <button id="close-edit-modal" type="button" class="btn btn-secondary" data-dismiss="edit-modal">Close</button>
      </div>
    </div>
  </div>
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

  // var token = '{{Session::token()}}';
  $('#second_party_type_cli').on('change', function() {
    $.ajax({
        method: 'GET',
        url: "{{url('/client_type')}}",
        data: {
          body: $(this).val(),
          //   _token: token
        }
      })
      .done(function(client_type) {
        $('#second_party_id').html(client_type);
      });
  });

  $('#start_date').val(moment().locale('en').format('DD-MM-YYYY'))

  $('#signed_date_input').change(function() {
    $('#start_date').val($('#signed_date_input').val())
  })

  $('#signed_date_input').val($('#start_date').val())
</script>

<script>
  $('#template_id').change(function(e) {
    var id = $('#template_id').val();
    $.ajax({
      type: "get",
      url: `{{url('template_items/${id}')}}`,
      success: function(response) {
        $('#ContractTemplateItems').html(response);
        initAutoCompleteTemplete()
        initChosen()
        $(".chosen").each(function() {
          $(this).trigger("chosen:updated");
        })
      }
    });
  });

  $('#contract_type').change(function() {
    var value = $(this).val()
    if (value == 2) {
      $('.select_contract_type_new').show()
      $('.select_contract_type_new select').attr('disabled', false)
      $('.select_contract_type_new textarea').attr('disabled', false)
      $('.select_contract_type_draft').hide()
      $('.select_contract_type_draft input').attr('disabled', true)
    } else {
      $('.select_contract_type_new').hide()
      $('.select_contract_type_new select').attr('disabled', true)
      $('.select_contract_type_new textarea').attr('disabled', true)
      $('.select_contract_type_draft').show()
      $('.select_contract_type_draft input').attr('disabled', false)
    }
  })

  function initAutoCompleteTemplete() {
    setAutoCompleteValue('signed_date', moment($('#signed_date_input').val(), "DD-MM-YYYY").locale('ar').format('YYYY/MM/DD'))
    setAutoCompleteValue('day_name', moment($('#signed_date_input').val(), "DD-MM-YYYY").locale('ar').format('dddd'))

    var percent = parseInt($('#first_party_percentage').find('option:selected').text())
    setAutoCompleteValue('first_part_percent', percent + '%')
    setAutoCompleteValue('second_part_percent', (100 - percent) + '%')

    setAutoCompleteValue('first_part_name', $('#first_party_id').find('option:selected').text())
    setAutoCompleteValue('first_part_character', $('#first_part_character_input').val())
    setAutoCompleteValue('first_part_person', $('#first_part_person_input').val())
    setAutoCompleteValue('first_part_email', $('#first_part_email_input').val())
    setAutoCompleteValue('first_part_phone', $('#first_part_phone_input').val())
    setAutoCompleteValue('first_part_address', $('#first_part_address_input').val())
    setAutoCompleteValue('first_commercial_register_no', $('#first_commercial_register_no_input').val())
    setAutoCompleteValue('first_tax_card_no', $('#first_tax_card_no_input').val())

    setAutoCompleteValue('second_part_name', $('#second_party_id').find('option:selected').text())
    setAutoCompleteValue('second_part_character', $('#second_part_character_input').val())
    setAutoCompleteValue('second_part_person', $('#second_part_person_input').val())
    setAutoCompleteValue('second_part_email', $('#second_part_email_input').val())
    setAutoCompleteValue('second_part_phone', $('#second_part_phone_input').val())
    setAutoCompleteValue('second_part_address', $('#second_part_address_input').val())
    setAutoCompleteValue('second_commercial_register_no', $('#second_commercial_register_no_input').val())
    setAutoCompleteValue('second_tax_card_no', $('#second_tax_card_no_input').val())
  }
</script>

<script>
  var monthes = 12;
  var x = 0;
  $("#contract_duration").change(function() {
    console.log("select");
    number = ($(this).find('option:selected').text()).match(/\d+/)[0];
    monthes = ($(this).find('option:selected').data('type')).includes('m') ? number : number * 12
    setEndDate($("#start_date").val(), monthes)
  })

  $("#start_date").change(function() {
    console.log("start_date");
    var endDate = $(this).val();
    setEndDate(endDate, monthes)
  });

  function setEndDate(endDate, monthes) {
    $("#contract_expiry_date").val(moment(endDate, "DD-MM-YYYY").locale('en').add(monthes, 'month').subtract(1, 'day').format('DD-MM-YYYY'))
  }

  $(document).on('click', '#add', function() {
    $('#add-modal').show();
  })
  $(document).on('click', '#close-add-modal', function(e) {
    $('#add-modal').hide();
  });
  $(document).on('click', '#close-edit-modal', function(e) {
    $('#edit-modal').hide();
  });

  function showEditModal(id, _this) {
    if (id === '') {
      var item = $(_this).next('#item').html();
      $('#edit-item').data('id', $(_this));
    } else {
      var item = $(`#${id}`).html();
      $('#edit-item').data('id', id);
    }
    $('#edit-modal').show();
    CKEDITOR.instances.edit_advanced_text.setData(item);
  }

  $(document).on('click', '#add-item', function() {
    var item = CKEDITOR.instances.add_advanced_text.getData();
    $('#add-modal').hide();
    CKEDITOR.instances.add_advanced_text.setData('');
    $('#ContractTemplateItems').append(`<div class="container p-3 m-3 text-right container box-content">
            <div class="form-group text-left">
              <label for="ipt" class="control-label "> Department </label>
              <select name='new_department_ids[${x++}][]' multiple rows='5'  class='form-control chosen'>
                <option value="">-- Please Select --</option>
                @foreach($departments as $department)
                <option value="{{$department->id}}">{{$department->title}}</option>
                @endforeach
              </select>
            </div>
            <div class="container-fluid">
                <a data-id="" onclick="removeItem('',this)" type="button" class="btn btn-danger btn-circle remove-item"><i class="fa fa-times" aria-hidden="true"></i></a>
                <a data-id="" onclick="showEditModal('',this)" type="button" class="btn btn-success btn-circle edit-item"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                <div id="item">
                    ${item}
                </div>
                <textarea name="new_items[]" id="input" hidden>
                ${item}
                </textarea>
            </div>

          </div>`);
    initChosen()
    $(".chosen").each(function() {
      $(this).trigger("chosen:updated");
    })
  });

  function removeItem(id, _this) {
    if (id === '') {
      var item = $(_this).parent().parent();
    } else {
      var item = $(`#${id}`).parent().parent();
    }
    item.remove();

  }

  function editItem(id) {
    if (typeof id === 'object') {
      var item = id.next('#item');
      var input = id.next('#input');
    } else {
      var item = $(`#${id}`);
      var input = $(`#input${id}`);
    }
    var itemValue = CKEDITOR.instances.edit_advanced_text.getData();
    $('#edit-modal').hide();
    item.html(itemValue);
    input.val(itemValue);
  }

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
</script>

<script>
  $('#first_party_id,#second_party_id').change(function() {
    var input = ($(this).attr('id')).slice(0, -4)
    input += '_name'
    setAutoCompleteValue(input, $(this).find('option:selected').text())
  })

  $('#first_party_percentage').change(function() {
    var percent = parseInt($(this).find('option:selected').text())
    setAutoCompleteValue('first_part_percent', percent + '%')
    setAutoCompleteValue('second_part_percent', (100 - percent) + '%')
  })

  $('#first_part_address_input,#first_commercial_register_no_input,#first_tax_card_no_input,#first_part_character_input,#first_part_person_input,#first_part_email_input,#first_part_phone_input,#second_part_address_input,#second_commercial_register_no_input,#second_part_character_input,#second_part_person_input,#second_part_email_input,#second_part_phone_input,#second_tax_card_no_input').change(function() {
    var input = ($(this)[0].id).slice(0, -6)
    setAutoCompleteValue(input, $(this).val())
  })

  $('#signed_date_input').change(function() {
    setAutoCompleteValue('signed_date', moment($('#signed_date_input').val(), "DD-MM-YYYY").locale('ar').format('YYYY/MM/DD'))
    setAutoCompleteValue('day_name', moment($('#signed_date_input').val(), "DD-MM-YYYY").locale('ar').format('dddd'))
  })

  function setAutoCompleteValue(input, value) {
    if (value && !value.includes('Please Select') && !value.includes('NaN') && !value.includes('Invalid')) {
      $("#ContractTemplateItems").find('.container-fluid #' + input).html(value)
      $('.container-fluid div').each(function() {
        $('#input' + $(this).attr('id')).val($(this).html())
      })
    }
  }

  $(document).on('ready', function() {
    $('.signed_date_input').datepicker({
      format: 'dd-mm-yyyy',
      autoclose: true,
    })
  })
  $(document).on('ready', function() {
    $('.start_date').datepicker({
      format: 'dd-mm-yyyy',
      autoclose: true,
    })
  })
  $(document).on('ready', function() {
    $('.contract_expiry_date').datepicker({
      format: 'dd-mm-yyyy',
      autoclose: true,
    })
  })
</script>
@stop
