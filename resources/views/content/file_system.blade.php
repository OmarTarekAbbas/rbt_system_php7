
@extends('template')
@section('page_title')
    File System
@stop
@section('content')
    @include('errors')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-title">
                    <h3><i class="fa fa-bars"></i>File System for RBTs</h3>
                    <div class="box-tool">
                        <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
                        <a data-action="close" href="#"><i class="fa fa-times"></i></a>
                    </div>
                </div>
                <div class="box-content">
                        <!-- <strong class="text-danger font-weight-bold"> <span>*</span> in folder content , create new folder with tody date {{ date('Y-m-d') }} and put track in it .</strong> -->
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="{{url('elFinder/elfinder')}}"></iframe>
                    </div>
                </div>
            </div>
        </div>

    </div>

@stop




@section('script')
    <script>
        $('#content').addClass('active');
        $('#content-list-tracks').addClass('active');
    </script>
@stop
