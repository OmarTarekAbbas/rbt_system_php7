@extends('template')
@section('page_title')
Contents
@stop
@section('content')



<div class="row">
    <div class="col-md-12">
        <div class="box box-blue">
            <div class="box-title">
                <h3><i class="fa fa-table"></i> Content Table</h3>
                <div class="box-tool">
                    <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
                    <a data-action="close" href="#"><i class="fa fa-times"></i></a>
                </div>
            </div>
            <div class="box-content">
                <div class="btn-group">
                    @if(Auth::user()->hasRole(['super_admin','admin']))
                    <!-- <a class="btn btn-circle btn-success show-tooltip" href="{{url('content/create')}}"
                        title="Create New content" href="#"><i class="fa fa-plus"></i></a> -->
                    <a id="delete_button" onclick="delete_selected('contents')"
                        class="btn btn-circle btn-danger show-tooltip" title="Delete Many" href="#"><i
                            class="fa fa-trash-o"></i></a>
                    @endif
                </div><br><br>
                <div class="table-responsive" style="border:0">
                    <table class="table table-advance data_content">
                        <thead>
                        <tr>
                                <th style="width:18px"><input type="checkbox" /></th>
                                <th>id</th>
                                <th>Content Title</th>
                                <th>Content Type</th>
                                <th>Internal Coding</th>
                                <th>content File</th>
                                <th>Occasion Title</th>
                                <th>Provider</th>
                                <th class="visible-md visible-lg" style="width:130px">Action</th>
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
$('#content').addClass('active');
$('#content-index').addClass('active');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
        }
    });
    $(document).ready(function() {
        $('.data_content').DataTable({
            "processing": true,
            "serverSide": true,
            "search": {
                "regex": true
            },
            ajax: "{!! url('content/allData') !!}",
            columns: [{
                    data: "index",
                    searchable: false,
                    orderable: false
                },
                {
                    data: "id",
                    name: "id"
                },
                {
                    data: "content_title",
                    name: "content_title"
                },
                {
                    data: "content_type",
                    name: "content_type"
                },
                {
                    data: "internal_coding",
                    name: "internal_coding"
                },
                {
                    data: "path",
                    name: "path"
                },
                {
                    data: "occasion",
                    name: "occasion"
                },
                {
                    data: "provider",
                    name: "provider"
                },
                {
                    data: "action",
                    searchable: false
                }
            ],
            "pageLength": 10
        });
    });
        $(document).ajaxComplete(function() {
        $("audio").on("play", function() {
            $("audio").not(this).each(function(index, audio) {
                audio.pause();
            });
        });
    });
</script>
@stop
