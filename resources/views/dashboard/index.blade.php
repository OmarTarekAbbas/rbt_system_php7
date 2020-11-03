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
                        <p class="big">+{{count(App\Employees::all())}}</p>
                        <p class="title">Employees</p>
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
                        <p class="big">+{{count(App\Contract::all())}}</p>
                        <p class="title">Contract</p>
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
                        <p class="big">+{{count(App\Content::all())}}</p>
                        <p class="title">Content</p>
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
    <div class="col-md-5">
        <div class="row">
            <div class="col-md-12">
                <div class="tile tile-green">
                    <div class="img">
                        <i class="fa fa-copy"></i>
                    </div>
                    <div class="content">
                        <p class="big">+{{count(App\Roadmap::all())}}</p>
                        <p class="title">Roadmap</p>
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
                        <p class="big">+{{count(App\Department::all())}}</p>
                        <p class="title">Department</p>
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
                        <p class="big">+{{count(App\SecondParties::all())}}</p>
                        <p class="title">SecondParty</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
