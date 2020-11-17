@extends('template')
@section('page_title')
ContractRequests
@stop
@section('style')
<link rel="stylesheet" type="text/css" href="{{url('public/css/main.css')}}" />
@stop
@section('content')
@include('errors')

<style>
  .chosen-container-single .chosen-single,
  .chosen-container-multi .chosen-choices {
    border-radius: 0.6rem !important;
  }
</style>

<div id="main-content">
  <div class="row">
    <div class="col-md-12 noPaddingPhone">
      <div class="box">
        <div class="box-title">
          <h3><i class="fa fa-bars"></i>Create ContractRequest Form</h3>
          <div class="box-tool">
            <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
            <a data-action="close" href="#"><i class="fa fa-times"></i></a>
          </div>
        </div>
        <div class="box-content">
          <form method='POST' class="width_m_auto form-horizontal" action='{!! url("contractrequests")!!}' enctype="multipart/form-data">
            @csrf
            <div class="col-md-12">
              <h1 class="newTitle">CONTRACT BASIC INFO</h1>
              <div class="width_m_auto">
                <div class="form-group">
                  <label class="col-sm-3 col-lg-3 control-label">contract type</label>
                  <div class="col-sm-9 col-lg-9 controls">
                    <select class="form-control chosen borderRadius" data-placeholder="Choose a Contract Type" name="contract_type">
                      <option value=""></option>
                      @foreach(contract_type() as $key => $value)
                      <option value="{{$key}}">{{$value}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>

              <div class="width_m_auto">
                <div class="form-group">
                  <label class="col-sm-3 col-lg-3 control-label">contract Content type</label>
                  <div class="col-sm-9 col-lg-9 controls">
                    <select class="form-control chosen borderRadius" data-placeholder="Choose a Contract Content Type" name="contract_content_type">
                      <option value=""></option>
                      @foreach(contract_content_type() as $key => $value)
                      <option value="{{$key}}">{{$value}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>

              <div class="width_m_auto">
                <div class="form-group">
                  <label class="col-sm-3 col-lg-3 control-label">Country</label>
                  <div class="col-sm-9 col-lg-9 controls">
                    <select class="form-control chosen borderRadius" data-placeholder="Choose a Country" multiple name="country_title[]">
                      <option value=""></option>
                      @foreach($countries as $country)
                      <option value="{{$country->title}}">{{$country->title}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>

              <div class="width_m_auto">
                <div class="form-group">
                  <label class="col-sm-3 col-lg-3 control-label">Operator</label>
                  <div class="col-sm-9 col-lg-9 controls">
                    <select class="form-control chosen borderRadius" data-placeholder="Choose a Operator" multiple name="operator_title[]">
                      <option value=""></option>
                      @foreach($operators as $operator)
                      <option value="{{$operator->title}}">
                        {{$operator->title}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>

              <div class="width_m_auto">
                <div class="form-group">
                  <label class="col-sm-3 col-lg-3 control-label">Service Type</label>
                  <div class="col-sm-9 col-lg-9 controls">
                    <select class="form-control chosen borderRadius" data-placeholder="Choose a Service Type" name="service_type_id">
                      <option value=""></option>
                      @foreach($service_types as $type)
                      <option value="{{$type->id}}">
                        {{$type->service_type_title}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>

              <div class="width_m_auto">
                <div class="form-group">
                  <label class="col-sm-3 col-lg-3 control-label">Title</label>
                  <div class="col-sm-9 col-lg-9 controls">
                    <input type="text" class="form-control borderRadius" name="title">
                  </div>
                </div>
              </div>

              <div class="width_m_auto">
                <div class="form-group">
                  <label class="col-sm-3 col-lg-3 control-label">Objective</label>
                  <div class="col-sm-9 col-lg-9 controls">
                    <textarea name="objective" class="form-control borderRadius" cols="30" rows="10"></textarea>
                  </div>
                </div>
              </div>
              <hr>
            </div>

            <div class="col-md-12">
              <h1>CONTRACT COMPANY INFO</h1>
              <div class="width_m_auto">
                <div class="form-group">
                  <label class="col-sm-3 col-lg-3 control-label">Company</label>
                  <div class="col-sm-9 col-lg-9 controls">
                    <select class="form-control chosen borderRadius" data-placeholder="Choose a Company" name="first_party_id">
                      <option value=""></option>
                      @foreach($first_parties as $first_party)
                      <option value="{{$first_party->id}}">
                        {{$first_party->first_party_title}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>

              <div class="width_m_auto">
                <div class="form-group">
                  <label class="col-sm-3 col-lg-3 control-label">Company Party type</label>
                  <div class="col-sm-9 col-lg-9 controls">
                    @foreach(party_type() as $key => $value)
                    <input type="radio" name="company_party_type" value="{{ $key }}" class="">{{ $value }}
                    @endforeach
                  </div>
                </div>
              </div>
              <hr>
              <h4>Company Authorized signatory</h4>
              <div class="width_m_auto">
                <div class="form-group">
                  <label class="col-sm-3 col-lg-3 control-label">name</label>
                  <div class="col-sm-9 col-lg-9 controls">
                    <input type="text" class="form-control borderRadius" name="company_authorized_signatory_name">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 col-lg-3 control-label">position</label>
                  <div class="col-sm-9 col-lg-9 controls">
                    <input type="text" class="form-control borderRadius" name="company_authorized_signatory_position">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 col-lg-3 control-label">mobile</label>
                  <div class="col-sm-9 col-lg-9 controls">
                    <input type="text" class="form-control borderRadius" name="company_authorized_signatory_mobile">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 col-lg-3 control-label">email</label>
                  <div class="col-sm-9 col-lg-9 controls">
                    <input type="email" class="form-control borderRadius" name="company_authorized_signatory_email">
                  </div>
                </div>
              </div>
              <hr>
              <h4>Company Project Manager</h4>
              <div class="width_m_auto">

                <div class="form-group">
                  <label class="col-sm-3 col-lg-3 control-label">name</label>
                  <div class="col-sm-9 col-lg-9 controls">
                    <input type="text" class="form-control borderRadius" name="company_project_manager_name">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 col-lg-3 control-label">position</label>
                  <div class="col-sm-9 col-lg-9 controls">
                    <input type="text" class="form-control borderRadius" name="company_project_manager_position">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 col-lg-3 control-label">mobile</label>
                  <div class="col-sm-9 col-lg-9 controls">
                    <input type="text" class="form-control borderRadius" name="company_project_manager_mobile">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 col-lg-3 control-label">email</label>
                  <div class="col-sm-9 col-lg-9 controls">
                    <input type="email" class="form-control borderRadius" name="company_project_manager_email">
                  </div>
                </div>
              </div>

              <hr>
            </div>

            <div class="col-md-12">
              <div class="width_m_auto">

                <h1>CLIENT INFO</h1>
                <div class="form-group">
                  <label class="col-sm-3 col-lg-3 control-label">Client Type</label>
                  <div class="col-sm-9 col-lg-9 controls">
                    <select class="form-control borderRadius" id="client_type" data-placeholder="Choose a Client Type" name="second_party_type_id">
                      <option value=""></option>
                      @foreach($second_party_types as $second_party_type)
                      <option value="{{$second_party_type->id}}">
                        {{$second_party_type->second_party_type_title}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 col-lg-3 control-label">Client name</label>
                  <div class="col-sm-9 col-lg-9 controls">
                    <select class="form-control borderRadius" id="client_name" data-placeholder="Choose a Client Name" name="second_party_id">
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 col-lg-3 control-label">Client Party type</label>
                  <div class="col-sm-9 col-lg-9 controls">
                    @foreach(party_type() as $key => $value)
                    <input type="radio" name="client_party_type" value="{{ $key }}" class="borderRadius"> {{ $value }}
                    @endforeach
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 col-lg-3 control-label">Client ID</label>
                  <div class="col-sm-9 col-lg-9 controls">
                    <input type="text" class="form-control borderRadius" name="client_id">
                  </div>
                </div>

                <div class="form-group">
                  <label for="second_party_tc" class="col-xs-12 col-lg-3 control-label"> Client ID Image </label>
                  <div class="col-xs-12 col-lg-9 controls">
                    <input type="file" name="client_id_image" id="client_id_image" placeholder="Client ID Image" class="form-control borderRadius">
                  </div>
                </div>

                <div class="form-group">
                  <label for="second_party_tc" class="col-xs-12 col-lg-3 control-label"> Client TC</label>
                  <div class="col-xs-12 col-lg-9 controls">
                    <input type="file" name="client_tc_image" id="client_tc_image" placeholder="Client TC" class="form-control borderRadius">
                  </div>
                </div>

                <div class="form-group">
                  <label for="second_party_tc" class="col-xs-12 col-lg-3 control-label"> Client CR</label>
                  <div class="col-xs-12 col-lg-9 controls">
                    <input type="file" name="client_cr_image" id="client_cr_image" placeholder="Client CR" class="form-control borderRadius">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 col-lg-3 control-label">Client Adress</label>
                  <div class="col-sm-9 col-lg-9 controls">
                    <textarea name="client_address" class="form-control borderRadius" cols="30" rows="10"></textarea>
                  </div>
                </div>
              </div>
              <hr>
              <h4>Client Authorized signatory</h4>
              <div class="width_m_auto">

                <div class="form-group">
                  <label class="col-sm-3 col-lg-3 control-label">name</label>
                  <div class="col-sm-9 col-lg-9 controls">
                    <input type="text" class="form-control borderRadius" name="client_authorized_signatory_name">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 col-lg-3 control-label">position</label>
                  <div class="col-sm-9 col-lg-9 controls">
                    <input type="text" class="form-control borderRadius" name="client_authorized_signatory_position">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 col-lg-3 control-label">mobile</label>
                  <div class="col-sm-9 col-lg-9 controls">
                    <input type="text" class="form-control borderRadius" name="client_authorized_signatory_mobile">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 col-lg-3 control-label">email</label>
                  <div class="col-sm-9 col-lg-9 controls">
                    <input type="email" class="form-control borderRadius" name="client_authorized_signatory_email">
                  </div>
                </div>
              </div>
              <hr>
              <h4>Client Project Manager</h4>
              <div class="width_m_auto">

                <div class="form-group">
                  <label class="col-sm-3 col-lg-3 control-label">name</label>
                  <div class="col-sm-9 col-lg-9 controls">
                    <input type="text" class="form-control borderRadius" name="client_project_manager_name">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 col-lg-3 control-label">position</label>
                  <div class="col-sm-9 col-lg-9 controls">
                    <input type="text" class="form-control borderRadius" name="client_project_manager_position">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 col-lg-3 control-label">mobile</label>
                  <div class="col-sm-9 col-lg-9 controls">
                    <input type="text" class="form-control borderRadius" name="client_project_manager_mobile">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 col-lg-3 control-label">email</label>
                  <div class="col-sm-9 col-lg-9 controls">
                    <input type="email" class="form-control borderRadius" name="client_project_manager_email">
                  </div>
                </div>
              </div>
              <hr>
            </div>

            <div class="col-md-12">
              <h1>CONTENT INFO</h1>
              <div class="width_m_auto">

                <div class="form-group">
                  <label class="col-sm-3 col-lg-3 control-label">content type</label>
                  <div class="col-sm-9 col-lg-9 controls">
                    <select class="form-control chosen borderRadius" data-placeholder="Choose a Content Type" name="content_type">
                      <option value=""></option>
                      @foreach(content_type() as $key => $value)
                      <option value="{{$key}}">{{$value}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 col-lg-3 control-label">Content Storage</label>
                  <div class="col-sm-9 col-lg-9 controls">
                    <select class="form-control chosen borderRadius" data-placeholder="Choose a Content Storage" name="content_storage">
                      <option value=""></option>
                      @foreach(content_storage() as $key => $value)
                      <option value="{{$key}}">{{$value}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 col-lg-3 control-label">Tracks Count</label>
                  <div class="col-sm-9 col-lg-9 controls">
                    <input type="text" class="form-control borderRadius" name="tracks_count">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 col-lg-3 control-label">Clips Count</label>
                  <div class="col-sm-9 col-lg-9 controls">
                    <input type="text" class="form-control borderRadius" name="clips_count">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 col-lg-3 control-label">Images Count</label>
                  <div class="col-sm-9 col-lg-9 controls">
                    <input type="text" class="form-control borderRadius" name="images_count">
                  </div>
                </div>

                <div class="form-group">
                  <label for="first_party_joining_date" class="col-xs-12 col-sm-3 col-md-3 col-lg-3 control-label"> Delivered Date </label>
                  <div class="input-group date date-picker col-xs-12 col-sm-12 col-md-9 col-lg-9 controls delivered_date" data-date-format="dd-mm-yyyy">
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    <input type="text" name="delivered_date" id="delivered_date" autocomplete="off" placeholder="first party joining date" data-date-format="dd-mm-yyyy" class="form-control">
                  </div>
                </div>
              </div>
              <hr>
              <h4>Content Receiver</h4>
              <div class="width_m_auto">
                <div class="form-group">
                  <label class="col-sm-3 col-lg-3 control-label">name</label>
                  <div class="col-sm-9 col-lg-9 controls">
                    <input type="text" class="form-control borderRadius" name="receiver_name">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 col-lg-3 control-label">position</label>
                  <div class="col-sm-9 col-lg-9 controls">
                    <input type="text" class="form-control borderRadius" name="receiver_position">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 col-lg-3 control-label">mobile</label>
                  <div class="col-sm-9 col-lg-9 controls">
                    <input type="text" class="form-control borderRadius" name="receiver_mobile">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 col-lg-3 control-label">email</label>
                  <div class="col-sm-9 col-lg-9 controls">
                    <input type="email" class="form-control borderRadius" name="receiver_email">
                  </div>
                </div>
              </div>
              <hr>

            </div>
            <div class="col-md-12">
              <h1>FINANCIAL INFO</h1>
              <div class="width_m_auto">

                <div class="form-group">
                  <label class="col-sm-3 col-lg-3 control-label">Advance payment</label>
                  <div class="col-sm-9 col-lg-9 controls">
                    @foreach(advance_payment() as $key => $value)
                    <input type="radio" name="advance_payment" value="{{ $key }}" style=" "> {{ $value }}
                    @endforeach
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 col-lg-3 control-label">Advance payment Type</label>
                  <div class="col-sm-9 col-lg-9 controls">
                    @foreach(advance_payment_type() as $key => $value)
                    <input type="radio" name="advance_payment_type" value="{{ $key }}" style=" "> {{ $value }}
                    @endforeach
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 col-lg-3 control-label">Advance Payment method</label>
                  <div class="col-sm-9 col-lg-9 controls">
                    @foreach(payment_method() as $key => $value)
                    <input type="radio" name="advance_payment_method" value="{{ $key }}" style=" "> {{ $value }}
                    @endforeach
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 col-lg-3 control-label">Advance Payment Amount</label>
                  <div class="col-sm-9 col-lg-9 controls">
                    <input type="text" class="form-control borderRadius" name="advance_payment_amount">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 col-lg-3 control-label">Advance payment Details</label>
                  <div class="col-sm-9 col-lg-9 controls">
                    <textarea class="borderRadius w-100" style="width: 100%;" name="advance_payment_details" cols="30" rows="10"></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 col-lg-3 control-label">Installment Period Details</label>
                  <div class="col-sm-9 col-lg-9 controls">
                    <textarea class="borderRadius" style="width: 100%;" name="installment_period_details" cols="30" rows="10"></textarea>
                  </div>
                </div>
              </div>
              <hr>
              <h4>Percentages (%)</h4>
              <div class="width_m_auto">

                <div class="form-group">
                  <label class="col-sm-3 col-lg-3 control-label">First Party (%)</label>
                  <div class="col-sm-9 col-lg-9 controls">
                    <input type="text" class="form-control borderRadius" name="first_party_percentage">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 col-lg-3 control-label">Second Party (%)</label>
                  <div class="col-sm-9 col-lg-9 controls">
                    <input type="text" class="form-control borderRadius" name="second_party_percentage">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 col-lg-3 control-label">Third Party (%)</label>
                  <div class="col-sm-9 col-lg-9 controls">
                    <input type="text" class="form-control borderRadius" name="third_party_percentage">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 col-lg-3 control-label">Fourth Party (%)</label>
                  <div class="col-sm-9 col-lg-9 controls">
                    <input type="text" class="form-control borderRadius" name="fourth_party_percentage">
                  </div>
                </div>
              </div>
              <hr>
              <h4>Legal Officer</h4>
              <div class="width_m_auto">

                <div class="form-group">
                  <label class="col-sm-3 col-lg-3 control-label">name</label>
                  <div class="col-sm-9 col-lg-9 controls">
                    <input type="text" class="form-control borderRadius" name="legal_officer_name">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 col-lg-3 control-label">position</label>
                  <div class="col-sm-9 col-lg-9 controls">
                    <input type="text" class="form-control borderRadius" name="legal_officer_position">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 col-lg-3 control-label">mobile</label>
                  <div class="col-sm-9 col-lg-9 controls">
                    <input type="text" class="form-control borderRadius" name="legal_officer_mobile">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 col-lg-3 control-label">email</label>
                  <div class="col-sm-9 col-lg-9 controls">
                    <input type="email" class="form-control borderRadius" name="legal_officer_email">
                  </div>
                </div>

              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-12 col-md-12 col-lg-12">
                <input type="submit" class="btn btn-primary mAuto_dBlock borderRadius" value="Submit">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@stop
@section('script')
<script>
  $('#client_type').on('change', function() {
    $.ajax({
        method: 'GET',
        url: "{{url('/client_type')}}",
        data: {
          body: $(this).val(),
          //   _token: token
        }
      })
      .done(function(client_type) {
        $('#client_name').html(client_type);
      });
  });
</script>
<script>
  $('#contract .submenu').first().css('display', 'block');
  $('#contract .submenu').first().css('display', 'block');
  $('#contract-index').addClass('active');
</script>
@stop
