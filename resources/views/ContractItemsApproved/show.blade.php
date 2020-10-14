@extends('template')
@section('page_title')
Contract
@stop
@section('content')
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
                                <td>{{$list_contract_items_send->id}} </td>
                            </tr>
                            <tr>
                                <td width='30%' class='label-view text-right'>Contract Tilte</td>
                                <td>{{$list_contract_items_send->contract_label}}</td>
                            </tr>
                            <tr>
                                <td width='30%' class='label-view text-right'>Html Item</td>
                                <td>{!! $list_contract_items_send->item  !!}</td>
                            </tr>
                            <tr>
                                <td width='30%' class='label-view text-right'>Status</td>
                                <td>
                                @if ($list_contract_items_send->status == 1)
                                Approved
                                @else
                                Not Approved
                                @endif
                                </td>
                            </tr>
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
