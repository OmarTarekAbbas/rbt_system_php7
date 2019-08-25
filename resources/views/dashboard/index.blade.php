@extends('template')

@section('content')
<div class="row">
    <div class="col-md-5">
        <div class="row">
            <div class="col-md-12">
                <div class="tile tile-green">
                    <div class="img">
                        <i class="fa fa-copy"></i>
                    </div>
                    <div class="content">
                        <p class="big">+{{count(App\Rbt::all())}}</p>
                        <p class="title">Rbt</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="row">
            <div class="col-md-12">
                <div class="tile tile-green">
                    <div class="img">
                        <i class="fa fa-copy"></i>
                    </div>
                    <div class="content">
                        <p class="big">+{{count(App\Report::all())}}</p>
                        <p class="title">Report</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection