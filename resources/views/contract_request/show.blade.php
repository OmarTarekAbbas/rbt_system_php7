@extends('template')
@section('page_title')
contract request
@stop
@section('content')
<div class="row marginZero">
  <div class="col-md-4">
    <a class="btn btn-circle btn-primary show-tooltip " href="{{url('/contractrequests')}}" title="List contractRequests">
      <i class="fa fa-eye"></i>
    </a>
    <a href="{{url('/contractrequests')}}" title="List contractRequests">
      List contract requests
    </a>

  </div>

  <div class="col-md-4" style="text-align: center;">
    <a class="btn btn-circle show-tooltip " href="{{url('contractrequests/'.$contractRequest->id.'/edit')}}" title="Edit contractRequest"><i class="fa fa-edit"></i></a>
    <a href="{{url('contractrequests/'.$contractRequest->id.'/edit')}}" title="Edit contractRequest">Edit contract request</a>

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
                  <td width='30%' class='label-view text-left' style="font-weight: bold">contract_type</td>
                  <td>{{$contractRequest->contract_type}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">contract_content_type</td>
                  <td>{{$contractRequest->contract_content_type}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">title</td>
                  <td>{{$contractRequest->title}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">company_party_type</td>
                  <td>{{$contractRequest->company_party_type}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">company_authorized_signatory_name</td>
                  <td>{{$contractRequest->company_authorized_signatory_name}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">company_authorized_signatory_position</td>
                  <td>{{$contractRequest->company_authorized_signatory_position}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">company_authorized_signatory_mobile</td>
                  <td>{{$contractRequest->company_authorized_signatory_mobile}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">company_authorized_signatory_email</td>
                  <td>{{$contractRequest->company_authorized_signatory_email}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">company_project_manager_name</td>
                  <td>{{$contractRequest->company_project_manager_name}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">company_project_manager_position</td>
                  <td>{{$contractRequest->company_project_manager_position}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">company_project_manager_mobile</td>
                  <td>{{$contractRequest->company_project_manager_mobile}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">company_project_manager_email</td>
                  <td>{{$contractRequest->company_project_manager_email}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">second_party_type_id</td>
                  <td>{{$contractRequest->secondpartytype->second_party_type_title}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">second_party_id</td>
                  <td>{{$contractRequest->secondparty->second_party_title}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">client_party_type</td>
                  <td>{{$contractRequest->client_party_type}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">client id</td>
                  <td>{{$contractRequest->client_id}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">client_id_image</td>
                  <td>
                    @if ($contractRequest->client_id_image)
                    <a target="_blank" href="{{url($contractRequest->client_id_image)}}">preview</a>
                    @endif
                  </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">client_tc_image</td>
                  <td>
                    @if ($contractRequest->client_tc_image)
                    <a target="_blank" href="{{url($contractRequest->client_tc_image)}}">preview</a>
                    @endif
                  </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">client_cr_image</td>
                  <td>
                    @if ($contractRequest->client_cr_image)
                    <a target="_blank" href="{{url($contractRequest->client_cr_image)}}">preview</a>
                    @endif
                  </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">client_address</td>
                  <td>{{$contractRequest->client_address}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">client_authorized_signatory_name</td>
                  <td>{{$contractRequest->client_authorized_signatory_name}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">client_authorized_signatory_position</td>
                  <td>{{$contractRequest->client_authorized_signatory_position}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">client_authorized_signatory_mobile</td>
                  <td>{{$contractRequest->client_authorized_signatory_mobile}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">client_authorized_signatory_email</td>
                  <td>{{$contractRequest->client_authorized_signatory_email}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">client_project_manager_name</td>
                  <td>{{$contractRequest->client_project_manager_name}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">client_project_manager_position</td>
                  <td>{{$contractRequest->client_project_manager_position}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">client_project_manager_mobile</td>
                  <td>{{$contractRequest->client_project_manager_mobile}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">client_project_manager_email</td>
                  <td>{{$contractRequest->client_project_manager_email}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">content_type</td>
                  <td>{{$contractRequest->content_type}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">content_storage</td>
                  <td>{{$contractRequest->content_storage}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">tracks_count</td>
                  <td>{{$contractRequest->tracks_count}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">clips_count</td>
                  <td>{{$contractRequest->clips_count}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">images_count</td>
                  <td>{{$contractRequest->images_count}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">delivered_date</td>
                  <td>{{$contractRequest->delivered_date}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">receiver_position</td>
                  <td>{{$contractRequest->receiver_position}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">receiver_mobile</td>
                  <td>{{$contractRequest->receiver_mobile}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">receiver_email</td>
                  <td>{{$contractRequest->receiver_email}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">advance_payment</td>
                  <td>{{$contractRequest->advance_payment}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">advance_payment_type</td>
                  <td>{{$contractRequest->advance_payment_type}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">advance_payment_amount</td>
                  <td>{{$contractRequest->advance_payment_amount}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">advance_payment_details</td>
                  <td>{{$contractRequest->advance_payment_details}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">advance_payment_method</td>
                  <td>{{$contractRequest->advance_payment_method}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">installment_period_details</td>
                  <td>{{$contractRequest->installment_period_details}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">first_party_percentage</td>
                  <td>{{$contractRequest->first_party_percentage}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">second_party_percentage</td>
                  <td>{{$contractRequest->second_party_percentage}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">third_party_percentage</td>
                  <td>{{$contractRequest->third_party_percentage}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">fourth_party_percentage</td>
                  <td>{{$contractRequest->fourth_party_percentage}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">legal_officer_name</td>
                  <td>{{$contractRequest->legal_officer_name}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">legal_officer_position</td>
                  <td>{{$contractRequest->legal_officer_position}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">legal_officer_mobile</td>
                  <td>{{$contractRequest->legal_officer_mobile}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">legal_officer_email</td>
                  <td>{{$contractRequest->legal_officer_email}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">objective</td>
                  <td>{{$contractRequest->objective}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">country_title</td>
                  <td>{{$contractRequest->country_title}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">operator_title</td>
                  <td>{{$contractRequest->operator_title}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">service_type</td>
                  <td>{{$contractRequest->servicetype->service_type_title}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">first_party</td>
                  <td>{{$contractRequest->firstparty->first_party_title}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">created_at</td>
                  <td>{{$contractRequest->created_at}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left' style="font-weight: bold">updated_at</td>
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
