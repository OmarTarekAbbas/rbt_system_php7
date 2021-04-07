@extends('template') @section('page_title') Contract @stop @section('content')
<style>
  .h_font_w {
    font-weight: bold;
    color: black;
  }

  .panel-group .panel-heading {
    background-color: #0000001f;
  }
</style>
@if(isset($contract))
  <div class="row" style="margin-right: 0; margin-left: 0;">
    <div class="col-md-4">
      <a class="btn btn-circle btn-primary show-tooltip " href="{{url('/client/contracts')}}" title="List Contract">
        <i class="fa fa-eye"></i>
      </a>
      <a href="{{url('client/contracts')}}" title="List Contract">
        List Contract
      </a>

    </div>
    <div class="col-md-4" style="text-align: end;">
      @if($contract->annex)
      <a class="btn btn-sm btn-info show-tooltip" href="{{ url("client/contract/an/" . $contract->id) }}" title="annex">Annex</a>
      @endif
      @if($contract->authorization)
      <a class="btn btn-sm btn-warning show-tooltip" href="{{ url("client/contract/al/" . $contract->id) }}" title="authorization">Authorization</a>
      @endif
      @if($contract->copyright)
      <a class="btn btn-sm btn-primary show-tooltip" href="{{ url("client/contract/cr/" . $contract->id) }}" title="copyright">copyright</a>
      @endif
    </div>
    <br>
    <br>
  </div>

  <div id="main-content">
    <div class="row">
      <div class="col-md-12 noPaddingPhone">
        <div class="box box-blue">
          <div class="box-title">
            <h3><i class="fa fa-table"></i> {{$contract->contract_code}} {{$contract->contract_label}}</h3>
            <div class="box-tool">
              <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
              <a data-action="close" href="#"><i class="fa fa-times"></i></a>
            </div>
          </div>
          <div class="box-content">
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
              <div class="panel panel-default">
                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  <div class="panel-heading" role="tab" id="headingOne">
                    <h4 class="panel-title h_font_w">
                      Contract Basic Information
                    </h4>
                  </div>
                </a>
                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                  <div class="panel-body">

                    <div class="table-responsive">
                      <table class="table table-striped table-bordered ">
                        <tbody>
                          <tr>
                            <td width='30%' class='label-view text-left'>ID</td>
                            <td>{{$contract->id}} </td>
                          </tr>

                          <tr>
                            <td width='30%' class='label-view text-left'>Code</td>
                            <td><a href="#0">{{$contract->contract_code}} </a> </td>
                          </tr>

                          <tr>
                            <td width='30%' class='label-view text-left'>Service Type </td>
                            <td>{{$contract->service_type->service_type_title}} </td>
                          </tr>

                          <tr>
                            <td width='30%' class='label-view text-left'>Label </td>
                            <td>{{$contract->contract_label}} </td>
                          </tr>
                          <!-- <tr>
                                  <td width='30%' class='label-view text-left'>First Party Id </td>
                                  <td>{{$contract->first_party_id}} </td>
                              </tr>
                              <tr>
                                  <td width='30%' class='label-view text-left'>First Party Select </td>
                                  <td>{{$contract->first_party_select ? 'Yes' : 'No'}} </td>
                              </tr>
                              <tr>
                                  <td width='30%' class='label-view text-left'>Second Party Id </td>
                                  <td>{{$contract->second_party_id}} </td>
                              </tr> -->
                          @if($contract->first_party_select == 1)
                          <tr>
                            <td width='30%' class='label-view text-left'>First Party </td>
                            <td>{{$first_partie->first_party_title ?? ''}} </td>
                          </tr>
                          <tr>
                            <td width='30%' class='label-view text-left'>Second Party </td>
                            <td>{{$second_parties->second_party_title ?? ''}} </td>
                          </tr>
                          @else
                          <tr>
                            <td width='30%' class='label-view text-left'>First Party </td>
                            <td>{{$second_parties->second_party_title ?? ''}} </td>
                          </tr>
                          <tr>
                            <td width='30%' class='label-view text-left'>Second Party </td>
                            <td>{{$first_partie->first_party_title ?? ''}} </td>
                          </tr>
                          @endif

                          <tr>
                            <td width='30%' class='label-view text-left'>Second Party Type </td>
                            <td>{{ $second_party_types->second_party_type_title ?? ''}}</td>
                          </tr>

                          <tr>
                            <td width='30%' class='label-view text-left'>First Party (%) </td>
                            <td>{{$contract->first_party_percentage}} </td>
                          </tr>

                          <tr>
                            <td width='30%' class='label-view text-left'>Second Party (%) </td>
                            <td>{{$contract->second_party_percentage}} </td>
                          </tr>

                          <tr>
                            <td width='30%' class='label-view text-left'>Contract Singed Date </td>
                            <td>{{ date('F j, Y',strtotime($contract->contract_signed_date)) }}
                            </td>
                          </tr>
                          <tr>
                            <td width='30%' class='label-view text-left'>Contract Start Date </td>
                            <td>{{ date('F j, Y',strtotime($contract->contract_date))  }} </td>
                          </tr>


                          <tr>
                            <td width='30%' class='label-view text-left'>Contract Expiry Date </td>
                            <td>{{ date('F j, Y',strtotime($contract->contract_expiry_date)) }}
                            </td>
                          </tr>

                          <tr>
                            <td width='30%' class='label-view text-left'>Contract Duration </td>
                            <td>{{ $contract->contractRenew->count() ?  $contract->contractRenew[0]->duration->contract_duration_title : optional($contract->duration)->contract_duration_title}}
                            </td>
                          </tr>


                          <tr>
                            <td width='30%' class='label-view text-left'>Renewal Status </td>
                            @if($contract->renewal_status == 0)
                            <td> <button class="btn btn-danger">No</button></td>
                            @elseif($contract->renewal_status == 1)
                            <td> <button class="btn btn-success">AR</button></td>
                            @else
                            <td> <button class="btn btn-primary">RBAO</button></td>
                            @endif
                          </tr>

                          <tr>
                            <td width='30%' class='label-view text-left'>Contract Status </td>
                            @if($contract->contract_status == 0)
                            <td> <button class="btn btn-danger">Not Active</button></td>
                            @else
                            <td> <button class="btn btn-success">Active</button></td>
                            @endif
                          </tr>

                          <tr>
                            <td width='30%' class='label-view text-left'>Countries </td>
                            <td>{{ $contract->country_title }} </td>
                          </tr>

                          <tr>
                            <td width='30%' class='label-view text-left'>Operators </td>
                            <td>{{ $contract->operator_title }} </td>
                          </tr>

                          <tr>
                            <td width='30%' class='label-view text-left'>Copies </td>
                            <td>{{ $contract->copies }} </td>
                          </tr>

                          <tr>
                            <td width='30%' class='label-view text-left'>Pages </td>
                            <td>{{ $contract->pages }} </td>
                          </tr>
                          @if($contract->annex)
                          <tr>
                            <td width='30%' class='label-view text-left'> Annex </td>
                            <td>
                              <div class="btn-group">
                                <a class="btn btn-sm btn-info show-tooltip" href="{{ url("contract/an/" . $contract->id) }}" title="annex">Annex</a>
                              </div>
                            </td>
                          </tr>
                          @endif
                          @if($contract->authorization)
                          <tr>
                            <td width='30%' class='label-view text-left'> Authorization </td>
                            <td>
                              <div class="btn-group">

                                <a class="btn btn-sm btn-warning show-tooltip" href="{{ url("contract/al/" . $contract->id) }}" title="authorization">Authorization</a>

                              </div>
                            </td>
                          </tr>
                          @endif
                          @if($contract->copyright)
                          <tr>
                            <td width='30%' class='label-view text-left'> copyright </td>
                            <td>
                              <div class="btn-group">

                                <a class="btn btn-sm btn-primary show-tooltip" href="{{ url("contract/cr/" . $contract->id) }}" title="copyright">copyright</a>
                              </div>
                            </td>
                          </tr>
                          @endif

                          <tr>
                            <td width='30%' class='label-view text-left'>Notes </td>
                            @if($contract->contract_notes)
                            <td>{{ $contract->contract_notes }} </td>
                            @else
                            <td>---</td>
                            @endif
                          </tr>

                          <tr>
                            <td width='30%' class='label-view text-left'>Entry By </td>
                            <td>{{ $contract->entry_by_details }} </td>
                          </tr>

                          <tr>
                            <td width='30%' class='label-view text-left'>Contract File </td>
                            <td> <a href="{{url('uploads/contracts/'.$contract->contract_pdf)}}" target="_blank">Review</a></td>
                          </tr>

                          <tr>
                            <td width='30%' class='label-view text-left'>Full Approve </td>
                            <td>{{ $contract->fullapprove ? "Yes" : "No" }}</td>
                          </tr>

                          <tr>
                            <td width='30%' class='label-view text-left'>Created At </td>
                            <td>{{ date('F j, Y, g:i a',strtotime($contract->updated_at)) }} </td>
                          </tr>

                          <tr>
                            <td width='30%' class='label-view text-left'>Updated At </td>
                            <td>{{ date('F j, Y, g:i a',strtotime($contract->updated_at)) }} </td>
                          </tr>



                        </tbody>
                      </table>
                    </div>

                  </div>
                </div>
              </div>

              @if($contract->contractRenew->count())
              <div class="panel panel-default">
                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  <div class="panel-heading" role="tab" id="headingTwo">
                    <h4 class="panel-title h_font_w">
                      Contract Renews
                    </h4>
                  </div>
                </a>
                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                  <div class="panel-body">

                    <div class="table-responsive">
                      <table id="example" class="table table-striped dt-responsive" cellspacing="0" width="100%">
                        <thead>
                          <tr>
                            <th style="width:18px"><input type="checkbox"></th>
                            <th>ID</th>
                            <th>Contract</th>
                            <th>Renew Start Date</th>
                            <th>Renew Expire Date</th>
                            <th>Ceo Renew</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($contract->contractRenew as $contractRenew)
                          <tr class="table-flag-blue">
                            <td><input type="checkbox"></td>
                            <td>{{$contractRenew->id}}</td>
                            <td>
                              <a href="{{url('fullcontracts/'.$contract->id)}}">{{$contract->contract_code}}/{{$contract->contract_label}}</a>
                            </td>
                            <td>{{$contractRenew->renew_start_date}}</td>
                            <td>{{$contractRenew->renew_expire_date}}</td>
                            <td>
                              @if($contractRenew->ceo_renew == 0)
                              <button class="btn btn-warning">NotAction</button>
                              @elseif($contractRenew->ceo_renew == 1)
                              <button class="btn btn-success">Renew</button>
                              @else
                              <button class="btn btn-danger">NotRenew</button>
                              @endif
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>

                  </div>
                </div>
              </div>
              @endif
              @if($contract->items->count())
              <div class="panel panel-default">
                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  <div class="panel-heading" role="tab" id="headingThree">
                    <h4 class="panel-title h_font_w">
                      Contract PDF Items
                    </h4>
                  </div>
                </a>
                <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                  <div class="panel-body">
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered ">
                        <thead>
                          <td width='30%' class='label-view text-left' style="font-weight: bold;">
                            Approve Status </td>
                          <td style="font-weight: bold;"> Item </td>
                        </thead>
                        <tbody>
                          @foreach($contract->items as $item)
                          <tr>
                            <td width='30%' class='label-view text-left'>
                              @if($item->fullapproves == 0)
                              <button class="btn btn-danger" style="margin-top: 3%;">{{ $approveStatus::getLabel($item->fullapproves) }}</button>
                              @else
                              <button class="btn btn-success" style="margin-top: 3%;">{{ $approveStatus::getLabel($item->fullapproves) }}</button>
                              @endif
                            </td>
                            <td>
                              {!! $item->item !!}
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@else
  <div id="main-content">
      <div class="row">
        <div class="col-md-12 noPaddingPhone">
          <div class="box box-blue">
            <div class="box-title text-center">
              <h3> No Contracts to view </p>
            </div>
          </div>
        </div>
      </div>
  </div>
@endif


@stop @section('script')
<script>
$('#client').addClass('active');
$('#contracts').addClass('active');
</script>
@stop
