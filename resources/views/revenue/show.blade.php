@extends('template')
@section('page_title')
Revenue
@stop
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box box-blue">
            <div class="box-title">
                <h3><i class="fa fa-table"></i> Revenue Table</h3>
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
                                <td>{{$revenue->id}} </td>
                            </tr>

                            <tr>
                                <td width='30%' class='label-view text-right'>Year</td>
                                <td>{{$revenue->year}} </td>
                            </tr>

                            <tr>
                                <td width='30%' class='label-view text-right'>Month</td>
                                <td>{{$revenue->month}} </td>
                            </tr>

                            <tr>
                                <td width='30%' class='label-view text-right'>Source Type</td>
                                <td>{{$revenue->source_type}} </td>
                            </tr>

                            <tr>
                                <td width='30%' class='label-view text-right'>Source</td>
                                <td>{{optional($revenue->source)->second_party_title}} </td>
                            </tr>

                            <tr>
                                <td width='30%' class='label-view text-right'>Amount</td>
                                <td>{{$revenue->amount}} </td>
                            </tr>

                            <tr>
                                <td width='30%' class='label-view text-right'>Currency</td>
                                <td>{{optional($revenue->currency)->title}} </td>
                            </tr>

                            <tr>
                                <td width='30%' class='label-view text-right'>Serivce Type</td>
                                <td>{{$revenue->serivce_type->service_type_title}} </td>
                            </tr>

                            <tr>
                                <td width='30%' class='label-view text-right'>Is Collected</td>
                                <td>{{$revenue->is_collected}} </td>
                            </tr>

                            <tr>
                                <td width='30%' class='label-view text-right'>Notes</td>
                                <td>{{$revenue->notes}} </td>
                            </tr>

                            <tr>
                                <td width='30%' class='label-view text-right'>Reports</td>
                                <td><img width="150px" src="{{url('uploads/revenue/'.$revenue->reports)}}"> </td>
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
    $('#revenue').addClass('active');
    $('#revenue-index').addClass('active');
</script>
@stop
