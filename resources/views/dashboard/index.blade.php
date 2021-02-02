@extends('template')

@section('content')
<div id="main-content">
  <div class="row">
    <div class="col-md-5 ">
      <div class="row">
        @if(get_action_icons('employees','get'))
        <div class="col-md-12 noPaddingPhone">
          <a href="{{url('employees')}}">
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
        @endif
      </div>
    </div>
    <div class="col-md-5">
      <div class="row">
        @if(get_action_icons('department','get'))
        <div class="col-md-12 noPaddingPhone">
          <a href="{{url('department')}}">
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
        @endif
      </div>
    </div>
    <div class="col-md-5">
      <div class="row">
        @if(get_action_icons('fullcontracts','get'))
        <div class="col-md-12 noPaddingPhone">
          <a href="{{url('fullcontracts')}}">
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
        @endif
      </div>
    </div>
    <div class="col-md-5">
      <div class="row">
        @if(get_action_icons('attachment','get'))
        <div class="col-md-12 noPaddingPhone">
          <a href="{{url('attachment')}}">
            <div class="tile tile-green">
              <div class="img">
                <i class="fa fa-copy"></i>
              </div>
              <div class="content">
                <p class="big">+{{(App\Attachment::count())}}</p>
                <p class="title">Attachment</p>
              </div>
            </div>
          </a>
        </div>
        @endif
      </div>
    </div>
    <div class="col-md-5">
      <div class="row">
        @if(get_action_icons('content','get'))
        <div class="col-md-12 noPaddingPhone">
          <a href="{{url('content')}}">
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
        @endif
      </div>
    </div>
    <div class="col-md-5">
      <div class="row">
        @if(get_action_icons('rbt','get'))
        <div class="col-md-12 noPaddingPhone">
          <a href="{{url('rbt')}}">
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
        @endif
      </div>
    </div>

    <div class="col-md-5">
      <div class="row">
        @if(get_action_icons('report','get'))
        <div class="col-md-12 noPaddingPhone">
          <a href="{{url('report')}}">

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
        @endif
      </div>
    </div>
    <div class="col-md-5">
      <div class="row">
        @if(get_action_icons('roadmaps','get'))
        <div class="col-md-12 noPaddingPhone">
          <a href="{{url('roadmaps')}}">

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
        @endif
      </div>
    </div>

    <div class="col-md-5">
      <div class="row">
        @if(get_action_icons('SecondParty','get'))
        <div class="col-md-12 noPaddingPhone">
          <a href="{{url('SecondParty')}}">

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
        @endif
      </div>
    </div>
  </div>
</div>
@endsection
