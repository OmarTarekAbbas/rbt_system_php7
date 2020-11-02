@extends('template') @section('page_title') Contract @stop @section('content')
<div class="row">
  <div class="col-md-4">
    <a class="btn btn-circle btn-primary show-tooltip " href="{{url('/fullcontracts')}}" title="List Contract">
      <i class="fa fa-eye"></i>
    </a>
    <a href="{{url('/fullcontracts')}}" title="List Contract">
    List Contract
    </a>

  </div>
  @if (Auth::user()->hasRole(['super_admin', 'legal']))
  <div class="col-md-4" style="text-align: center;">
    <a class="btn btn-circle show-tooltip " href="{{url('fullcontracts/'.$contract->id.'/edit')}}" title="Edit Contract"><i class="fa fa-edit"></i></a>
    <a href="{{url('fullcontracts/'.$contract->id.'/edit')}}" title="Edit Contract">Edit Contract</a>

  </div>

  @endif
  <div class="col-md-4" style="text-align: end;">
  @if($contract->annex)
  <a class="btn btn-sm btn-info show-tooltip" href="{{ url("contract/an/" . $contract->id) }}" title="annex">Annex</a>
  @endif
  @if($contract->authorization)
  <a class="btn btn-sm btn-warning show-tooltip" href="{{ url("contract/al/" . $contract->id) }}" title="authorization">Authorization</a>
  @endif
  @if($contract->copyright)
  <a class="btn btn-sm btn-primary show-tooltip" href="{{ url("contract/cr/" . $contract->id) }}" title="copyright">copyright</a>
  @endif
  </div>
  <br>
  <br>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box box-blue">
            <div class="box-title">
                <h3><i class="fa fa-table"></i> Contract Table</h3>
                <div class="box-tool">
                    <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
                    <a data-action="close" href="#"><i class="fa fa-times"></i></a>
                </div>
            </div>
            <div class="box-content">

                <div class="table-responsive">
                    <table class="table table-striped table-bordered ">
                        <tbody>
                            <tr>
                                <td width='30%' class='label-view text-right'>ID</td>
                                <td>{{$contract->id}} </td>
                            </tr>

                            <tr>
                                <td width='30%' class='label-view text-right'>Code</td>
                                <td><a href="#0">{{$contract->contract_code}} </a> </td>
                            </tr>

                            <tr>
                                <td width='30%' class='label-view text-right'>Service Type </td>
                                <td>{{$contract->service_type->service_type_title}} </td>
                            </tr>

                            <tr>
                                <td width='30%' class='label-view text-right'>Label </td>
                                <td>{{$contract->contract_label}} </td>
                            </tr>

                            <!-- <tr>
                                <td width='30%' class='label-view text-right'>First Party Id </td>
                                <td>{{$contract->first_party_id}} </td>
                            </tr>

                            <tr>
                                <td width='30%' class='label-view text-right'>First Party Select </td>
                                <td>{{$contract->first_party_select ? 'Yes' : 'No'}} </td>
                            </tr>

                            <tr>
                                <td width='30%' class='label-view text-right'>Second Party Id </td>
                                <td>{{$contract->second_party_id}} </td>
                            </tr> -->

                            <tr>
                                <td width='30%' class='label-view text-right'>First Party </td>

                                <td>{{$first_partie->first_party_title ?? ''}} </td>
                            </tr>

                            <tr>
                                <td width='30%' class='label-view text-right'>Second Party </td>
                                <td>{{$second_parties->second_party_title ?? ''}} </td>
                            </tr>

                            <tr>
                                <td width='30%' class='label-view text-right'>Second Party Type </td>
                                <td>{{ $second_party_types->second_party_type_title ?? ''}}</td>
                            </tr>

                            <tr>
                                <td width='30%' class='label-view text-right'>First Party (%) </td>
                                <td>{{$contract->first_party_percentage}} </td>
                            </tr>

                            <tr>
                                <td width='30%' class='label-view text-right'>Second Party (%) </td>
                                <td>{{$contract->second_party_percentage}} </td>
                            </tr>

                            <tr>
                                <td width='30%' class='label-view text-right'>Contract Date </td>
                                <td>{{ $contract->contractRenew->count() ? date('F j, Y',strtotime($contract->contractRenew[0]->renew_start_date))  : date('F j, Y',strtotime($contract->contract_date)) }} </td>
                            </tr>

                            <tr>
                                <td width='30%' class='label-view text-right'>Contract Singed Date </td>
                                <td>{{ $contract->contractRenew->count() ? date('F j, Y',strtotime($contract->contractRenew[0]->renew_start_date->addDays(1))) : date('F j, Y',strtotime($contract->contract_signed_date)) }} </td>
                            </tr>

                            <tr>
                                <td width='30%' class='label-view text-right'>Expiry Date </td>
                                <td>{{ $contract->contractRenew->count() ? date('F j, Y',strtotime($contract->contractRenew[0]->renew_expire_date))  : date('F j, Y',strtotime($contract->contract_expiry_date)) }} </td>
                            </tr>

                            <tr>
                                <td width='30%' class='label-view text-right'>Contract Duration </td>
                                <td>{{ $contract->contractRenew->count() ?  $contract->contractRenew[0]->duration->contract_duration_title : $contract->duration->contract_duration_title}} </td>
                            </tr>
                            @if($contract->contractRenew->count())
                            <tr>
                                <td width='30%' class='label-view text-right'>Contract Renews </td>
                                <td> <a href="{{url('fullcontracts/'.$contract->id.'/renews')}}" target="_blank">Review</a></td>
                            </tr>
                            @endif

                            <tr>
                                <td width='30%' class='label-view text-right'>Renewal Status </td>
                                @if($contract->renewal_status == 0)
                                <td> <button class="btn btn-danger">No</button></td>
                                @elseif($contract->renewal_status == 1)
                                <td> <button class="btn btn-success">AR</button></td>
                                @else
                                <td> <button class="btn btn-primary">RBAO</button></td>
                                @endif
                            </tr>

                            <tr>
                                <td width='30%' class='label-view text-right'>Contract Status </td>
                                @if($contract->contract_status == 0)
                                <td> <button class="btn btn-danger">Not Active</button></td>
                                @else
                                <td> <button class="btn btn-success">Active</button></td>
                                @endif
                            </tr>

                            <tr>
                                <td width='30%' class='label-view text-right'>Countries </td>
                                <td>{{ $contract->country_title }} </td>
                            </tr>

                            <tr>
                                <td width='30%' class='label-view text-right'>Operators </td>
                                <td>{{ $contract->operator_title }} </td>
                            </tr>

                            <tr>
                                <td width='30%' class='label-view text-right'>Copies </td>
                                <td>{{ $contract->copies }} </td>
                            </tr>

                            <tr>
                                <td width='30%' class='label-view text-right'>Pages </td>
                                <td>{{ $contract->pages }} </td>
                            </tr>
                            @if($contract->annex)
                            <tr>
                                <td width='30%' class='label-view text-right'> Annex </td>
                                <td>
                                    <div class="btn-group">
                                        <a class="btn btn-sm btn-info show-tooltip" href="{{ url("contract/an/" . $contract->id) }}" title="annex">Annex</a>
                                    </div>
                                </td>
                            </tr>
                            @endif
                            @if($contract->authorization)
                            <tr>
                                <td width='30%' class='label-view text-right'> Authorization </td>
                                <td>
                                    <div class="btn-group">

                                        <a class="btn btn-sm btn-warning show-tooltip" href="{{ url("contract/al/" . $contract->id) }}" title="authorization">Authorization</a>

                                    </div>
                                </td>
                            </tr>
                            @endif
                            @if($contract->copyright)
                            <tr>
                                <td width='30%' class='label-view text-right'> copyright </td>
                                <td>
                                    <div class="btn-group">

                                        <a class="btn btn-sm btn-primary show-tooltip" href="{{ url("contract/cr/" . $contract->id) }}" title="copyright">copyright</a>
                                    </div>
                                </td>
                            </tr>
                            @endif

                            <tr>
                                <td width='30%' class='label-view text-right'>Notes </td>
                                @if($contract->contract_notes)
                                <td>{{ $contract->contract_notes }} </td>
                                @else
                                <td>---</td>
                                @endif
                            </tr>

                            <tr>
                                <td width='30%' class='label-view text-right'>Entry By </td>
                                <td>{{ $contract->entry_by_details }} </td>
                            </tr>

                            <tr>
                                <td width='30%' class='label-view text-right'>Contract File </td>
                                <td> <a href="{{url('uploads/contracts/'.$contract->contract_pdf)}}" target="_blank">Review</a></td>
                            </tr>

                            <tr>
                                <td width='30%' class='label-view text-right'>Full Approve </td>
                                <td>{{ $contract->fullapprove ? "Yes" : "No" }}</td>
                            </tr>

                            <tr>
                                <td width='30%' class='label-view text-right'>Created At </td>
                                <td>{{ date('F j, Y, g:i a',strtotime($contract->updated_at)) }} </td>
                            </tr>

                            <tr>
                                <td width='30%' class='label-view text-right'>Updated At </td>
                                <td>{{ date('F j, Y, g:i a',strtotime($contract->updated_at)) }} </td>
                            </tr>



                        </tbody>
                    </table>
                </div>
                @if($contract->items->count())
                <div class="table-responsive">
                    <table class="table table-striped table-bordered " >
                        <thead style="background: #0000001c;">
                          <td width='30%' class='label-view text-right' style="font-weight: bold;"> Approve Status </td>
                          <td style="font-weight: bold;"> Item </td>
                        </thead>
                        <tbody>
                          @foreach($contract->items as $item)
                            <tr>
                                <td width='30%' class='label-view text-right'>
                                  @if($item->fullapproves == 0)
                                  <button class="btn btn-danger" style="margin-top: 3%;">{{ $approveStatus::getLabel($item->fullapproves) }}</button>
                                  @else
                                  <button class="btn btn-success" style="margin-top: 3%;">{{ $approveStatus::getLabel($item->fullapproves) }}</button>
                                  @endif
                                </td>

                                <td >
                                {!! $item->item !!}
                                </td>
                            </tr>
                          @endforeach
                        </tbody>
                    </table>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>


@stop @section('script')
<script>
    $('#contract').addClass('active');
    $('#contract-index').addClass('active');
</script>
@stop
