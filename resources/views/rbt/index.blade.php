@extends('template')
@section('page_title')
    RBTs
@stop
@section('content')


    <div class="row">
        <div class="col-md-12">
            <div class="box box-blue">
                <div class="box-title">
                    <h3><i class="fa fa-table"></i> RBT Table</h3>
                    <div class="box-tool">
                        <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
                        <a data-action="close" href="#"><i class="fa fa-times"></i></a>
                    </div>
                </div>
                <div class="box-content">
                    <div class="btn-group">
                      @if(Auth::user()->hasRole(['super_admin','admin']))
                        <a class="btn btn-circle btn-success show-tooltip" href="{{url('rbt/create')}}" title="Create New Rbt" href="#"><i class="fa fa-plus"></i></a>
                        <a  id="delete_button" onclick="delete_selected('rbts')" class="btn btn-circle btn-danger show-tooltip" title="Delete Many" href="#"><i class="fa fa-trash-o"></i></a>
                      @endif
                    </div><br><br>
                    <div class="table-responsive" style="border:0">
                        <table class="table table-advance data_rbt"  >
                            <thead>
                            <tr>
                                <th style="width:18px"><input type="checkbox" /></th>
                                <th>id</th>
                                <th>Type</th>
                                <th>Title</th>
                                <th>Code</th>
                                <th>Artist</th>
                                <th>Track File</th>
                                <th>Operator Title</th>
                                <th>Occasion Title</th>
                                <th>Master Content Title</th>
                                <th>Provider</th>
                                @if(Auth::user()->hasRole(['super_admin','admin']))
                                <th>Aggregator Title</th>
                                <th class="visible-md visible-lg" style="width:130px">Action</th>
                                @endif
                            </tr>
                            </thead>
                            <tbody>

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
        $('#rbt').addClass('active');
        $('#rbt-index').addClass('active');
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
                }
        });
        $(document).ready(function () {
            console.log("omar");
            $('.data_rbt').DataTable({
                "processing": true,
                "serverSide": true,
                "search": {"regex":true},
                ajax: "{!! url('rbt/allData') !!}",
                columns: [
                    {data: "index", searchable: false, orderable: false},
                    {data: "id"},
                    {data: "type"},
                    {data: "track_title_en"},
                    {data: "code"},
                    {data: "artist"},
                    {data: "track_file"},
                    {data: "operator"},
                    {data: "occasion_id"},
                    {data: "content_id"},
                    {data: "owner"},
                    {data: "aggregator_id"},
                    {data: "action", searchable: false}
                ]
                , "pageLength": 10
            });
        });
    </script>


@stop
