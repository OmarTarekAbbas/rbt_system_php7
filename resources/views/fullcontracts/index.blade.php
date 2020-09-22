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
                <div class="btn-group">
                    <a class="btn btn-circle btn-success show-tooltip" href="{{url('fullcontracts/create')}}" title="Create New Rbt" href="#"><i class="fa fa-plus"></i></a>
                    <a id="delete_button" onclick="delete_selected('contracts')" class="btn btn-circle btn-danger show-tooltip" title="Delete Many" href="#"><i class="fa fa-trash-o"></i></a>
                </div>
                <br>
                <br>
                <div class="table-responsive" style="border:0">
                    <table class="table table-advance data_contract">
                        <thead>
                            <tr>
                                <th style="width:18px"><input type="checkbox" /></th>
                                <th>id</th>
                                <th>Code</th>
                                <th>Service Type</th>
                                <th>Label</th>
                                <th>Contract Date</th>
                                <th>Contract Status</th>
                                <th>Expiry Date</th>
                                <th class="visible-md visible-lg" style="width:130px">Show Attachments</th>
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
    $('#contract').addClass('active');
    $('#contract-index').addClass('active');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
        }
    });
    $(document).ready(function() {
        $('.data_contract').DataTable({
            "processing": true,
            "serverSide": true,
            "search": {
                "regex": true
            },
            ajax: "{!! url('contracts/allData') !!}",
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
                    data: "code",
                    name: "code"
                },
                {
                    data: "service_type",
                    name: "service_type"
                },
                {
                    data: "contract_label",
                    name: "contract_label"
                },
                {
                    data: "contract_date",
                    name: "contract_date"
                },
                {
                    data: "contract_status",
                    name: "contract_status"
                },
                {
                    data: "contract_expiry_date",
                    name: "contract_expiry_date"
                },
                {
                    data: "action1",
                    searchable: false
                },
                {
                    data: "action",
                    searchable: false
                }
            ],
            "pageLength": 10
        });
    });
</script>
@stop
