@extends('template')
@section('page_title')
ContractRenew
@stop
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box box-black">
            <div class="box-title">
                <h3><i class="fa fa-table"></i> ContractRenew Table</h3>
                <div class="box-tool">
                    <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
                    <a data-action="close" href="#"><i class="fa fa-times"></i></a>
                </div>
            </div>
            <div class="box-content">

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
</div>

@stop

@section('script')
<script>
$('#contract').addClass('active');
    $('#contract-index').addClass('active');
</script>
@stop
