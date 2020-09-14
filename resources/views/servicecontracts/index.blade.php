@extends('template')
@section('page_title')
CotractSrvice
@stop
@section('content')

<!-- BEGIN Main Content -->
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-title">
                <h3><i class="fa fa-code-fork"></i>CotractSrvice</h3>
                <div class="box-tool">
                    <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
                    <a data-action="close" href="#"><i class="fa fa-times"></i></a>
                </div>
            </div>
            <div class="box-content">


                <div class="btn-toolbar pull-right clearfix">
                    <div class="btn-group">
                        <a class="btn btn-circle show-tooltip" title="Add" href="{{url('contractservice/create')}}"><i class="fa fa-plus"></i></a>
                    </div>
                </div>
                <br /><br />
                <div class="clearfix"></div>

                <div class="table-responsive" style="border:0">
                    <table class="table table-advance" id="table1">
                        <thead>
                            <tr>
                                <th style="width:18px"><input type="checkbox" /></th>
                                <th>Id</th>
                                <th>Contract Id</th>
                                <th>Title</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($contractServices as $contractService)
                            <tr class="table-flag-blue">
                                <td><input type="checkbox" /></td>
                                <td>{{$contractService->id}}</td>
                                <td>{{$contractService->contract_code }} / {{$contractService->contract_label}}</td>
                                <td>{{$contractService->title}}</td>
                                <td>
                                    <a class="btn btn-sm show-tooltip teet" href="{{url('/contractservice/'.$contractService->id.'/edit')}}"><i id="" class="fa fa-edit"></i></a>
                                    <a class="btn btn-sm btn-danger show-tooltip" title="" onclick="return confirm('Are you sure you want to delete {{ $contractService->title }} ?')" href="{{url('/contractservice/'.$contractService->id.'/delete')}}" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
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
<!-- END Main Content -->
@endsection
@section('script')
<script>
    // $('#audience').addClass('active');
    function ConfirmDelete() {
        var x = confirm("Are you sure you want to delete?");
        if (x)
            return true;
        else
            return false;
    }
</script>
<script>
    // to edit country by modal  = get current values by js
    $('#contract').addClass('active');
    $('#contractservice-index').addClass('active');
</script>
@endsection
