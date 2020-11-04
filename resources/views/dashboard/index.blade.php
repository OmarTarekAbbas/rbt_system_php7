@extends('template')

@section('content')
<div class="row">
    <div class="col-md-5">
        <div class="row">
            <div class="col-md-12">
                <a href="{{url('employees')}}" >
                    <div class="tile tile-green">
                        <div class="img">
                            <i class="fa fa-copy"></i>
                        </div>
                        <div class="content">
                            <p class="big">+{{(App\Employees::count())}}</p>
                            <p class="title">Employees</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="row">
            <div class="col-md-12">
                <a href="{{url('department')}}" >
                    <div class="tile tile-green">
                        <div class="img">
                            <i class="fa fa-copy"></i>
                        </div>
                        <div class="content">
                            <p class="big">+{{(App\Department::count())}}</p>
                            <p class="title">Department</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="row">
            <div class="col-md-12">
                <a href="{{url('fullcontracts')}}" >
                    <div class="tile tile-green">
                        <div class="img">
                            <i class="fa fa-copy"></i>
                        </div>
                        <div class="content">
                            <p class="big">+{{(App\Contract::count())}}</p>
                            <p class="title">Contract</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="row">
            <div class="col-md-12">
                <a href="{{url('content')}}" >
                    <div class="tile tile-green">
                        <div class="img">
                            <i class="fa fa-copy"></i>
                        </div>
                        <div class="content">
                            <p class="big">+{{(App\Content::count())}}</p>
                            <p class="title">Content</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="row">
            <div class="col-md-12">
                <a href="{{url('rbt')}}" >

                    <div class="tile tile-green">
                        <div class="img">
                            <i class="fa fa-copy"></i>
                        </div>
                        <div class="content">
                            <p class="big">+{{(App\Rbt::count())}}</p>
                            <p class="title">Rbt</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <div class="col-md-5">
        <div class="row">
            <div class="col-md-12">
                <a href="{{url('report')}}" >

                    <div class="tile tile-green">
                        <div class="img">
                            <i class="fa fa-copy"></i>
                        </div>
                        <div class="content">
                            <p class="big">+{{(App\Report::count())}}</p>
                            <p class="title">Report</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="row">
            <div class="col-md-12">
                <a href="{{url('roadmaps')}}" >

                    <div class="tile tile-green">
                        <div class="img">
                            <i class="fa fa-copy"></i>
                        </div>
                        <div class="content">
                            <p class="big">+{{(App\Roadmap::count())}}</p>
                            <p class="title">Roadmap</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <div class="col-md-5">
        <div class="row">
            <div class="col-md-12">
                <a href="{{url('SecondParty')}}" >

                    <div class="tile tile-green">
                        <div class="img">
                            <i class="fa fa-copy"></i>
                        </div>
                        <div class="content">
                            <p class="big">+{{(App\SecondParties::count())}}</p>
                            <p class="title">SecondParty</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
