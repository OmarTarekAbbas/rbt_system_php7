@extends('template')
@section('page_title')
contract request
@stop
@section('style')
<link rel="stylesheet" type="text/css" href="{{url('public/css/main.css')}}" />
@stop
@section('content')
<div class="row marginZero">
  <div class="col-md-4 noPaddingPhone" style="text-align: center;">
    <a class="btn btn-circle btn-primary show-tooltip " href="{{url('/contractrequests')}}" title="List contractRequests">
      <i class="fa fa-eye"></i>
    </a>
    <a href="{{url('/contractrequests')}}" title="List contractRequests">
      List contract requests
    </a>

  </div>

  <div class="col-md-4 noPaddingPhone" style="text-align: center;">
    <a class="btn btn-circle show-tooltip " href="{{url('contractrequests/'.$contractRequest->id.'/edit')}}" title="Edit contractRequest"><i class="fa fa-edit"></i></a>
    <a href="{{url('contractrequests/'.$contractRequest->id.'/edit')}}" title="Edit contractRequest">Edit contract request</a>

  </div>

  <div class="col-md-4 noPaddingPhone" style="text-align: center;">
    <a class="btn btn-circle btn-success show-tooltip " href="{{url('contractrequests/'.$contractRequest->id.'/create')}}" title="create contractRequest"><i class="fa fa-plus"></i></a>
    <a href="{{url('contractrequests/'.$contractRequest->id.'/create')}}" title="create contractRequest">create contract request</a>

  </div>

  <br>
  <br>
</div>

<div id="main-content">
  <div class="row">
    <div class="col-md-12 noPaddingPhone">
      <div class="box box-blue">
        <div class="box-title">
          <h3><i class="fa fa-table"></i> contractRequest Table</h3>
          <div class="box-tool">
            <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
            <a data-action="close" href="#"><i class="fa fa-times"></i></a>
          </div>
        </div>
        <div class="box-content">
          <div class="table-responsive width_m_auto" style="overflow-x: hidden;">
            <table class="table table-striped table-bordered ">
              <tbody>

                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">ID</td>
                  <td>{{$contractRequest->id}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">contract Code</td>
                  <td>{{$contractRequest->contract_code}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">contract type</td>
                  <td>{{$contractRequest->contract_type}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">contract content type</td>
                  <td>{{$contractRequest->contract_content_type}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">country  </td>
                  <td>{{$contractRequest->country_title}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">operator  </td>
                  <td>{{$contractRequest->operator_title}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">service type</td>
                  <td>{{$contractRequest->servicetype->service_type_title}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">title</td>
                  <td>{{$contractRequest->title}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">objective</td>
                  <td>{{$contractRequest->objective}} </td>
                </tr>
              </tbody>
            </table>
            <hr>
            <table class="table table-striped table-bordered">
              <tbody>
                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">first party</td>
                  <td>{{$contractRequest->firstparty->first_party_title}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">company party type</td>
                  <td>{{$contractRequest->company_party_type}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">company authorized signatory name</td>
                  <td>{{$contractRequest->company_authorized_signatory_name}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">company authorized signatory position</td>
                  <td>{{$contractRequest->company_authorized_signatory_position}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">company authorized signatory mobile</td>
                  <td>{{$contractRequest->company_authorized_signatory_mobile}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">company authorized signatory email</td>
                  <td>{{$contractRequest->company_authorized_signatory_email}} </td>
                </tr>
              </tbody>
            </table>
            <hr>
            <table class="table table-striped table-bordered">
              <tbody>
                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">company project manager name</td>
                  <td>{{$contractRequest->company_project_manager_name}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">company project manager position</td>
                  <td>{{$contractRequest->company_project_manager_position}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">company project manager mobile</td>
                  <td>{{$contractRequest->company_project_manager_mobile}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">company project manager email</td>
                  <td>{{$contractRequest->company_project_manager_email}} </td>
                </tr>
              </tbody>
            </table>
            <hr>
            <table class="table table-striped table-bordered">
              <tbody>
                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">second party type</td>
                  <td>{{$contractRequest->secondpartytype->second_party_type_title}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">second party</td>
                  <td>{{$contractRequest->secondparty->second_party_title}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">client party type</td>
                  <td>{{$contractRequest->client_party_type}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">client</td>
                  <td>{{$contractRequest->client_id}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">client identity image</td>
                  <td>
                    @if ($contractRequest->client_id_image)
                    <a class="btn btn-success borderRadius" target="_blank" href="{{url($contractRequest->client_id_image)}}">preview</a>
                    @endif
                  </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">client tc image</td>
                  <td>
                    @if ($contractRequest->client_tc_image)
                    <a class="btn btn-success borderRadius" target="_blank" href="{{url($contractRequest->client_tc_image)}}">preview</a>
                    @endif
                  </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">client cr image</td>
                  <td>
                    @if ($contractRequest->client_cr_image)
                    <a class="btn btn-success borderRadius" target="_blank" href="{{url($contractRequest->client_cr_image)}}">preview</a>
                    @endif
                  </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">client address</td>
                  <td>{{$contractRequest->client_address}} </td>
                </tr>
              </tbody>
            </table>
            <hr>
            <table class="table table-striped table-bordered">
              <tbody>
                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">client authorized signatory name</td>
                  <td>{{$contractRequest->client_authorized_signatory_name}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">client authorized signatory position</td>
                  <td>{{$contractRequest->client_authorized_signatory_position}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">client authorized signatory mobile</td>
                  <td>{{$contractRequest->client_authorized_signatory_mobile}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">client authorized signatory email</td>
                  <td>{{$contractRequest->client_authorized_signatory_email}} </td>
                </tr>
              </tbody>
            </table>
            <hr>
            <table class="table table-striped table-bordered">
              <tbody>
                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">client project manager name</td>
                  <td>{{$contractRequest->client_project_manager_name}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">client project manager position</td>
                  <td>{{$contractRequest->client_project_manager_position}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">client project manager mobile</td>
                  <td>{{$contractRequest->client_project_manager_mobile}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">client project manager email</td>
                  <td>{{$contractRequest->client_project_manager_email}} </td>
                </tr>
              </tbody>
            </table>
            <hr>
            <table class="table table-striped table-bordered">
              <tbody>
                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">content type</td>
                  <td>{{$contractRequest->content_type}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">content storage</td>
                  <td>{{$contractRequest->content_storage}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">tracks count</td>
                  <td>{{$contractRequest->tracks_count}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">clips count</td>
                  <td>{{$contractRequest->clips_count}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">images count</td>
                  <td>{{$contractRequest->images_count}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">delivered date</td>
                  <td>{{$contractRequest->delivered_date}} </td>
                </tr>
              </tbody>
            </table>
            <hr>
            <table class="table table-striped table-bordered">
              <tbody>
                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">receiver position</td>
                  <td>{{$contractRequest->receiver_position}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">receiver mobile</td>
                  <td>{{$contractRequest->receiver_mobile}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">receiver email</td>
                  <td>{{$contractRequest->receiver_email}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">advance payment</td>
                  <td>{{$contractRequest->advance_payment}} </td>
                </tr>
              </tbody>
            </table>
            <hr>
            <table class="table table-striped table-bordered">
              <tbody>
                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">advance payment type</td>
                  <td>{{$contractRequest->advance_payment_type}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">advance payment amount</td>
                  <td>{{$contractRequest->advance_payment_amount}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">advance payment details</td>
                  <td>{{$contractRequest->advance_payment_details}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">advance payment method</td>
                  <td>{{$contractRequest->advance_payment_method}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">installment period details</td>
                  <td>{{$contractRequest->installment_period_details}} </td>
                </tr>
              </tbody>
            </table>
            <hr>
            <table class="table table-striped table-bordered">
              <tbody>
                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">first party percentage</td>
                  <td>{{$contractRequest->first_party_percentage}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">second party percentage</td>
                  <td>{{$contractRequest->second_party_percentage}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">third party percentage</td>
                  <td>{{$contractRequest->third_party_percentage}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">fourth party percentage</td>
                  <td>{{$contractRequest->fourth_party_percentage}} </td>
                </tr>
              </tbody>
            </table>
            <hr>
            <table class="table table-striped table-bordered">
              <tbody>
                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">legal officer name</td>
                  <td>{{$contractRequest->legal_officer_name}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">legal officer position</td>
                  <td>{{$contractRequest->legal_officer_position}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">legal officer mobile</td>
                  <td>{{$contractRequest->legal_officer_mobile}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">legal officer email</td>
                  <td>{{$contractRequest->legal_officer_email}} </td>
                </tr>
              </tbody>
            </table>
            <hr>
            <table class="table table-striped table-bordered">
              <tbody>
                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">created at</td>
                  <td>{{$contractRequest->created_at}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">updated at</td>
                  <td>{{$contractRequest->updated_at}} </td>
                </tr>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@stop
@section('script')
<script>
  $('#contractRequests').addClass('active');
  $('#contractRequests-index').addClass('active');
</script>
@stop
