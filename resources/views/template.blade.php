<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Ivas System</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
  <!--page specific css styles-->
  <link rel="stylesheet" type="text/css" href="{{url('assets/chosen-bootstrap/chosen.min.css')}}" />
  <link rel="stylesheet" type="text/css" href="{{url('assets/jquery-tags-input/jquery.tagsinput.css')}}" />
  <link rel="stylesheet" type="text/css" href="{{url('assets/jquery-pwstrength/jquery.pwstrength.css')}}" />
  <link rel="stylesheet" type="text/css" href="{{url('assets/bootstrap-fileupload/bootstrap-fileupload.css')}}" />
  <link rel="stylesheet" type="text/css" href="{{url('assets/bootstrap-duallistbox/duallistbox/bootstrap-duallistbox.css')}}" />
  <link rel="stylesheet" type="text/css" href="{{url('assets/dropzone/downloads/css/dropzone.css')}}" />
  <link rel="stylesheet" type="text/css" href="{{url('assets/bootstrap-colorpicker/css/colorpicker.css')}}" />
  <link rel="stylesheet" type="text/css" href="{{url('assets/bootstrap-timepicker/compiled/timepicker.css')}}" />
  <link rel="stylesheet" type="text/css" href="{{url('assets/clockface/css/clockface.css')}}" />
  <link rel="stylesheet" type="text/css" href="{{url('assets/bootstrap-datepicker/css/datepicker.css')}}" />
  <link rel="stylesheet" type="text/css" href="{{url('assets/bootstrap-daterangepicker/daterangepicker.css')}}" />
  <link rel="stylesheet" type="text/css" href="{{url('assets/bootstrap-switch/static/stylesheets/bootstrap-switch.css')}}" />
  <link rel="stylesheet" type="text/css" href="{{url('assets/bootstrap-wysihtml5/bootstrap-wysihtml5.css')}}" />

  <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.bootstrap.min.css" />

  <!--base css styles-->
  <link rel="stylesheet" href="{{url('assets/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{url('assets/font-awesome/css/font-awesome.min.css')}}">
  <!--page specific css styles-->
  <link rel="stylesheet" href="{{url('assets/data-tables/bootstrap3/dataTables.bootstrap.css')}}" />
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" />

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" />

  <!--flaty css styles-->
  <link rel="stylesheet" href="{{url('css/flaty.css')}}">
  <link rel="stylesheet" href="{{url('css/flaty-new.css')}}">
  <link rel="stylesheet" href="{{url('css/flaty-responsive.css')}}">

  <!-- <link rel="shortcut icon" href="{{url('img/favicon.png')}}"> -->

  <meta name="token" content="{{ csrf_token() }}">

  <script>
    function ConfirmDelete() {
      var x = confirm("Are you sure you want to delete?");
      if (x)
        return true;
      else
        return false;
    }
  </script>
  @yield('style')
</head>

<body>
  <div id="theme-setting">
    <a href="#"><i class="fa fa-gears fa fa-2x"></i></a>
    <ul>
      <li>
        <span>Skin</span>
        <ul class="colors" data-target="body" data-prefix="skin-">
          <li class="active"><a class="blue" href="#"></a></li>
          <li><a class="red" href="#"></a></li>
          <li><a class="green" href="#"></a></li>
          <li><a class="orange" href="#"></a></li>
          <li><a class="yellow" href="#"></a></li>
          <li><a class="pink" href="#"></a></li>
          <li><a class="magenta" href="#"></a></li>
          <li><a class="gray" href="#"></a></li>
          <li><a class="black" href="#"></a></li>
        </ul>
      </li>
      <li>
        <span>Navbar</span>
        <ul class="colors" data-target="#navbar" data-prefix="navbar-">
          <li class="active"><a class="blue" href="#"></a></li>
          <li><a class="red" href="#"></a></li>
          <li><a class="green" href="#"></a></li>
          <li><a class="orange" href="#"></a></li>
          <li><a class="yellow" href="#"></a></li>
          <li><a class="pink" href="#"></a></li>
          <li><a class="magenta" href="#"></a></li>
          <li><a class="gray" href="#"></a></li>
          <li><a class="black" href="#"></a></li>
        </ul>
      </li>
      <li>
        <span>Sidebar</span>
        <ul class="colors" data-target="#main-container" data-prefix="sidebar-">
          <li class="active"><a class="blue" href="#"></a></li>
          <li><a class="red" href="#"></a></li>
          <li><a class="green" href="#"></a></li>
          <li><a class="orange" href="#"></a></li>
          <li><a class="yellow" href="#"></a></li>
          <li><a class="pink" href="#"></a></li>
          <li><a class="magenta" href="#"></a></li>
          <li><a class="gray" href="#"></a></li>
          <li><a class="black" href="#"></a></li>
        </ul>
      </li>
      <li>
        <span></span>
        <a data-target="navbar" href="#"><i class="fa fa-square-o"></i> Fixed Navbar</a>
        <a class="hidden-inline-xs" data-target="sidebar" href="#"><i class="fa fa-square-o"></i> Fixed Sidebar</a>
      </li>
    </ul>
  </div>
  <!-- BEGIN Navbar -->
  <div id="navbar" class="navbar">
    <button type="button" class="navbar-toggle navbar-btn collapsed" data-toggle="collapse" data-target="#sidebar">
      <span class="fa fa-bars"></span>
    </button>
    <a class="navbar-brand" href="{{url('/')}}">
      <small>
        <i class="fa fa-user-secret"></i>
        Ivas System
      </small>
    </a>

    <!-- BEGIN Navbar Buttons -->
    <ul class="nav flaty-nav pull-right">
      <template id="app">
        <!-- BEGIN Tasks Dropdown -->
        <li class="hidden-xs">
          <a data-toggle="dropdown" class="dropdown-toggle" href="#">
            <i class="fa fa-bell"></i>
            <span class="badge badge-important">@{{notify_count}}</span>
          </a>
          <!-- BEGIN Notifications Dropdown -->
          <ul class="dropdown-navbar dropdown-menu">
            <li class="nav-header animt">
              <i class="fa fa-warning"></i>
              @{{notify_count}} Notifications
            </li>
            <li v-for="item in all_notifications" class="notify" :style="[item.seen ? {'width': '100%' } : {'width': '100%' ,'background': '#b2e8bb'}]">
              <a href="#" @click="read_notify(item.id,item.link)">
                <p><strong>@{{item.name}}</strong> @{{item.subject}}</p>
              </a>
            </li>
            <!-- <li class="more">
              <a href="#">See all notifications</a>
            </li> -->
          </ul>
          <!-- END Notifications Dropdown -->
        </li>
        <!-- End BEGIN Tasks Dropdown -->
      </template>
      <!-- BEGIN Button User -->
      <li class="user-profile">
        <a data-toggle="dropdown" href="#" class="user-menu dropdown-toggle">
          <span class="hhh" id="user_info">
            {!! Auth::user()->name !!}
            {{-- User --}}
          </span>
          <i class="fa fa-caret-down"></i>
        </a>

        <!-- BEGIN User Dropdown -->
        <ul class="dropdown-menu dropdown-navbar" id="user_menu">
          <li>
            <a href="{{url('user_profile')}}">
              <i class="fa fa-user"></i>
              Edit Profile
            </a>
          </li>

          <li class="divider visible-xs"></li>

          <li class="divider"></li>

          <li>
            <a href="{{url('logout')}}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
              <i class="fa fa-off"></i>
              @lang('messages.logout')
            </a>
            <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
            </form>
          </li>
        </ul>
        <!-- BEGIN User Dropdown -->
      </li>
      <!-- END Button User -->
    </ul>
    <!-- END Navbar Buttons -->
  </div>
  <!-- END Navbar -->

  <!-- BEGIN Container -->
  <div class="container" id="main-container">
    <!-- BEGIN Sidebar -->
    <div id="sidebar" class="navbar-collapse collapse">
      <!-- BEGIN Navlist -->
      <ul class="nav nav-list">

        @if(get_action_icons('users','get'))
        <li id="user">
          <a href="#" class="dropdown-toggle">
            <i class="glyphicon glyphicon-user"></i>
            <span>Users</span>
            <b class="arrow fa fa-angle-right"></b>
          </a>

          <!-- BEGIN Submenu -->

          <ul class="submenu">
            @if(get_action_icons('users/new','get'))
            <li id="user-create"><a href="{{url('users/new')}}">Create User</a></li>
            @endif
            @if(get_action_icons('users','get'))
            <li id="user-index"><a href="{{url('users')}}">Users</a></li>
            @endif
            <li id="role">
              <a href="#" class="dropdown-toggle">
                <i class="glyphicon glyphicon-road"></i>
                <span>Roles</span>
                <b class="arrow fa fa-angle-right"></b>
              </a>

              <!-- BEGIN Submenu -->
              <ul class="submenu">
                @if(get_action_icons('roles/new','get'))
                <li id="role-create"><a href="{{url('roles/new')}}">Create Role</a></li>
                @endif
                @if(get_action_icons('roles','get'))
                <li id="role-index"><a href="{{url('roles')}}">Roles</a></li>
                @endif
                @if(get_action_icons('all_routes','get'))
                <li id="route-index"><a href="{{url('all_routes')}}">Routes</a></li>
                @endif
                @if(get_action_icons('routes/index_v2','get'))
                <li id="route-v2-index"><a href="{{url('routes/index_v2')}}">Routes V2</a></li>
                @endif
              </ul>
              <!-- END Submenu -->
            </li>

            <li id="setting">
              <a href="#" class="dropdown-toggle">
                <i class="fa fa-gears"></i>
                <span>Setting</span>
                <b class="arrow fa fa-angle-right"></b>
              </a>

              <!-- BEGIN Submenu -->
              <ul class="submenu">
                @if(get_action_icons('setting/create','get'))
                <li id="setting-create"><a href="{{url('setting/create')}}">Add Settings</a></li>
                @endif
                @if(get_action_icons('setting','get'))
                <li id="setting-index"><a href="{{url('setting')}}">Settings</a></li>
                @endif
              </ul>
              <!-- END Submenu -->
            </li>

          </ul>
          <!-- END Submenu -->
        </li>
        @endif

        @if(get_action_icons('fullcontracts','get'))
        <li id="contract">
          <a href="#" class="dropdown-toggle">
            <i class="glyphicon glyphicon-copyright-mark"></i>
            <span>Contracts</span>
            <b class="arrow fa fa-angle-right"></b>
          </a>

          <!-- BEGIN Submenu -->
          <ul class="submenu">
            <li id="contract-index"><a href="{{url('contractrequests')}}">Contract Requests</a></li>
            @if(get_action_icons('fullcontracts','get'))
            <li id="contract-index"><a href="{{url('fullcontracts')}}">Contracts</a></li>
            @endif
            @if(get_action_icons('ContractTemplate','get'))
            <li id="ContractTemplate-index"><a href="{{url('ContractTemplate')}}">Templates</a></li>
            @endif
            {{-- <li id="contractservice-index"><a href="{{url('contractservice')}}">Service</a>
        </li> --}}

        <li id="Attachment">
          <a href="#" class="dropdown-toggle">
            <i class="fa fa-gears"></i>
            <span>Attachment</span>
            <b class="arrow fa fa-angle-right"></b>
          </a>

          <!-- BEGIN Submenu -->
          <ul class="submenu">
            @if(get_action_icons('attachment/create','get'))
            <li id="Attachment-create"><a href="{{url('attachment/create')}}">Add Attachment</a></li>
            @endif
            @if(get_action_icons('attachment','get'))
            <li id="Attachment-index"><a href="{{url('attachment')}}">Attachment</a></li>
            @endif
          </ul>
          <!-- END Submenu -->
        </li>

        <li id="ServiceTypes">
          <a href="#" class="dropdown-toggle">
            <i class="fa fa-gears"></i>
            <span>Service Types</span>
            <b class="arrow fa fa-angle-right"></b>
          </a>

          <!-- BEGIN Submenu -->
          <ul class="submenu">
            @if(get_action_icons('ServiceTypes/create','get'))
            <li id="ServiceTypes-create"><a href="{{url('ServiceTypes/create')}}">Add Service Types</a></li>
            @endif
            @if(get_action_icons('ServiceTypes','get'))
            <li id="ServiceTypes-index"><a href="{{url('ServiceTypes')}}">Service Types</a></li>
            @endif
          </ul>
          <!-- END Submenu -->
        </li>

        <li id="firstpartie">
          <a href="#" class="dropdown-toggle">
            <i class="fa fa-folder-o"></i>
            <span>First Party</span>
            <b class="arrow fa fa-angle-right"></b>
          </a>

          <!-- BEGIN Submenu -->
          <ul class="submenu">
            @if(get_action_icons('firstparties/create','get'))
            <li id="firstpartie-create"><a href="{{url('firstparties/create')}}">Create First Party</a></li>
            @endif
            @if(get_action_icons('firstparties','get'))
            <li id="firstpartie-index"><a href="{{url('firstparties')}}">First Party</a></li>
            @endif
          </ul>
          <!-- END Submenu -->
        </li>

        <li id="SecondParty">
          <a href="#" class="dropdown-toggle">
            <i class="fa fa-gears"></i>
            <span>Second Party</span>
            <b class="arrow fa fa-angle-right"></b>
          </a>

          <!-- BEGIN Submenu -->
          <ul class="submenu">
            @if(get_action_icons('SecondParty/create','get'))
            <li id="SecondParty-create"><a href="{{url('SecondParty/create')}}">Add Second Party</a></li>
            @endif
            @if(get_action_icons('SecondParty','get'))
            <li id="SecondParty-index"><a href="{{url('SecondParty')}}">Second Party</a></li>
            @endif
          </ul>
          <!-- END Submenu -->
        </li>

        <li id="SecondPartyType">
          <a href="#" class="dropdown-toggle">
            <i class="fa fa-gears"></i>
            <span>Second Party Type</span>
            <b class="arrow fa fa-angle-right"></b>
          </a>

          <!-- BEGIN Submenu -->
          <ul class="submenu">
            @if(get_action_icons('SecondPartyType/create','get'))
            <li id="SecondPartyType-create"><a href="{{url('SecondPartyType/create')}}">Add Second Party Type</a></li>
            @endif
            @if(get_action_icons('SecondPartyType','get'))
            <li id="SecondPartyType-index"><a href="{{url('SecondPartyType')}}">Second Party Type</a></li>
            @endif
          </ul>
          <!-- END Submenu -->
        </li>

        <li id="percentage">
          <a href="#" class="dropdown-toggle">
            <i class="fa fa-folder-o"></i>
            <span>Percentage</span>
            <b class="arrow fa fa-angle-right"></b>
          </a>

          <!-- BEGIN Submenu -->
          <ul class="submenu">
            @if(get_action_icons('percentages/create','get'))
            <li id="percentage-create"><a href="{{url('percentages/create')}}">Create Percentage</a></li>
            @endif
            @if(get_action_icons('percentages','get'))
            <li id="percentage-index"><a href="{{url('percentages')}}">Percentages</a></li>
            @endif
          </ul>
          <!-- END Submenu -->
        </li>

        <li id="revenue">
          <a href="#" class="dropdown-toggle">
            <i class="glyphicon glyphicon-cog"></i>
            <span>Revenue</span>
            <b class="arrow fa fa-angle-right"></b>
          </a>

          <!-- BEGIN Submenu -->
          <ul class="submenu">
            @if(get_action_icons('revenue','get'))
            <li id="revenue-index"><a href="{{url('revenue')}}">Revenue</a></li>
            @endif
          </ul>
          <!-- END Submenu -->
        </li>

      </ul>
      <!-- END Submenu -->

      </li>
      @endif

      @if(get_action_icons('content','get'))
      <li id="content">
        <a href="#" class="dropdown-toggle">
          <i class="fa fa-folder-o"></i>
          <span>Content</span>
          <b class="arrow fa fa-angle-right"></b>
        </a>

        <!-- BEGIN Submenu -->
        <ul class="submenu">
          @if(get_action_icons('content/create','get'))
          <li id="content-excel"><a href="{{url('content/create')}}">Singel Create Content</a></li>
          @endif
          @if(get_action_icons('contents/excel','get'))
          <li id="content-excel"><a href="{{url('contents/excel')}}">Create Content Form Excel</a></li>
          @endif
          @if(get_action_icons('content','get'))
          <li id="content-index"><a href="{{url('content')}}">Contents</a></li>
          @endif
          @if(get_action_icons('contents/file_system','get'))
          <li id="content-list-tracks"><a href="{{url('contents/file_system')}}">List Master Contents</a></li>
          @endif
          @if(get_action_icons('contents/upload_tracks','get'))
          <li id="content-upload-tracks"><a href="{{url('contents/upload_tracks')}}">Upload multi tracks</a></li>
          @endif
        </ul>
        <!-- END Submenu -->
      </li>
      @endif

      @if(get_action_icons('rbt','get'))
      <li id="rbt">
        <a href="#" class="dropdown-toggle">
          <i class="fa fa-play-circle-o"></i>
          <span>RBT</span>
          <b class="arrow fa fa-angle-right"></b>
        </a>

        <!-- BEGIN Submenu -->
        <ul class="submenu">
          @if(get_action_icons('rbt/statistics','get'))
          <li id="rbt-statistics"><a href="{{url('rbt/statistics')}}">RBT Statistics</a></li>
          @endif
          @if(get_action_icons('rbt/excel','get'))
          <li id="rbt-excel"><a href="{{url('rbt/excel')}}">Create RBT Form Excel</a></li>
          @endif
          @if(get_action_icons('rbt/upload_tracks','get'))
          <li id="rbt-upload-tracks"><a href="{{url('rbt/upload_tracks')}}">Upload multi tracks</a></li>
          @endif
          @if(get_action_icons('rbt/file_system','get'))
          <li id="rbt-list-tracks"><a href="{{url('rbt/file_system')}}">List tracks</a></li>
          @endif
          @if(get_action_icons('rbt','get'))
          <li id="rbt-index"><a href="{{url('rbt')}}">RBTs</a></li>
          @endif
          @if(get_action_icons('rbt/search','get'))
          <li id="rbt-search"><a href="{{url('rbt/search')}}">Search in RBTs</a></li>
          @endif
          <li id="report">
            <a href="#" class="dropdown-toggle">
              <i class="fa fa-file-text-o"></i>
              <span>Report</span>
              <b class="arrow fa fa-angle-right"></b>
            </a>

            <!-- BEGIN Submenu -->
            <ul class="submenu">
              @if(get_action_icons('report/statistics','get'))
              <li id="report-statistics"><a href="{{url('report/statistics')}}">Statistics</a></li>
              @endif
              @if(get_action_icons('report/excel','get'))
              <li id="report-excel"><a href="{{url('report/excel')}}">Report Excel</a></li>
              @endif
              @if(get_action_icons('report','get'))
              <li id="report-index"><a href="{{url('report')}}">Report</a></li>
              @endif
              @if(get_action_icons('report/search','get'))
              <li id="report-search"><a href="{{url('report/search')}}">Search in reports</a></li>
              @endif
            </ul>
            <!-- END Submenu -->
          </li>
        </ul>
        <!-- END Submenu -->
      </li>
      @endif

      @if(get_action_icons('roadmaps','get'))
      <li id="roadmap">
        <a href="#" class="dropdown-toggle">
          <i class="fa fa-file-text-o"></i>
          <span>Road Map</span>
          <b class="arrow fa fa-angle-right"></b>
        </a>

        <ul class="submenu">
          @if(get_action_icons('roadmaps/create','get'))
          <li id="roadmap-create"><a href="{{route('admin.roadmaps.create')}}">Create Road Map</a></li>
          @endif
          @if(get_action_icons('roadmaps','get'))
          <li id="roadmap-index"><a href="{{route('admin.roadmaps.index')}}">Road Map</a></li>
          @endif
          @if(get_action_icons('roadmaps/calendar/index','get'))
          <li id="roadmap-calendar"><a href="{{route('admin.roadmaps.calendar.index')}}">Road Map Calendar</a></li>
          @endif
        </ul>
      </li>
      @endif

      @if(get_action_icons('employees','get'))
      <li id="employees">
        <a href="#" class="dropdown-toggle">
          <i class="fa fa-file-text-o"></i>
          <span>Employees</span>
          <b class="arrow fa fa-angle-right"></b>
        </a>


        <ul class="submenu">
          @if(get_action_icons('employees/create','get'))
          <li id="employee-create"><a href="{{url('employees/create')}}">Create Employees</a></li>
          @endif
          @if(get_action_icons('employees','get'))
          <li id="employees-index"><a href="{{url('employees')}}">Employees</a></li>
          @endif
        </ul>

      </li>
      @endif

      @if(get_action_icons('department','get'))
      <li id="department">
        <a href="#" class="dropdown-toggle">
          <i class="glyphicon glyphicon-briefcase"></i>
          <span>Department</span>
          <b class="arrow fa fa-angle-right"></b>
        </a>

        <!-- BEGIN Submenu -->

        <ul class="submenu">
          @if(get_action_icons('department/create','get'))
          <li id="department-create"><a href="{{url('department/create')}}">Create Department</a></li>
          @endif
          @if(get_action_icons('department','get'))
          <li id="department-index"><a href="{{url('department')}}">Departments</a></li>
          @endif
        </ul>
        <!-- END Submenu -->
      </li>
      @endif

      @if(get_action_icons('country','get'))
      <li id="country">
        <a href="#" class="dropdown-toggle">
          <i class="glyphicon glyphicon-globe"></i>
          <span>Counties</span>
          <b class="arrow fa fa-angle-right"></b>
        </a>

        <!-- BEGIN Submenu -->
        <ul class="submenu">
          @if(get_action_icons('country','get'))
          <li id="country-index"><a href="{{url('country')}}">Counties</a></li>
          @endif
          @if(get_action_icons('operator','get'))
          <li id="operator-index"><a href="{{url('operator')}}">Operators</a></li>
          @endif

        </ul>
      </li>
      @endif

      @if(get_action_icons('aggregator','get'))
      <li id="aggregator">
        <a href="#" class="dropdown-toggle">
          <i class="glyphicon glyphicon-user"></i>
          <span>Aggregator</span>
          <b class="arrow fa fa-angle-right"></b>
        </a>

        <!-- BEGIN Submenu -->
        <ul class="submenu">
          @if(get_action_icons('aggregator','get'))
          <li id="aggregator-index"><a href="{{url('aggregator')}}">Aggregator</a></li>
          @endif
        </ul>
        <!-- END Submenu -->
      </li>
      @endif

      @if(get_action_icons('currency','get'))
      <li id="currency">
        <a href="#" class="dropdown-toggle">
          <i class="glyphicon glyphicon-cog"></i>
          <span>Currency</span>
          <b class="arrow fa fa-angle-right"></b>
        </a>

        <!-- BEGIN Submenu -->
        <ul class="submenu">
          @if(get_action_icons('currency','get'))
          <li id="currency-index"><a href="{{url('currency')}}">Currency</a></li>
          @endif
        </ul>
        <!-- END Submenu -->
      </li>
      @endif

      {{-- <li id="provider">
          <a href="#" class="dropdown-toggle">
            <i class="glyphicon glyphicon-heart-empty"></i>
            <span>Providers</span>
            <b class="arrow fa fa-angle-right"></b>
          </a>

          <!-- BEGIN Submenu -->
          <ul class="submenu">
            <li id="provider-index"><a href="{{url('provider')}}">Providers</a></li>
      </ul>
      <!-- END Submenu -->
      </li> --}}

      @if(get_action_icons('occasion','get'))
      <li id="occasion">
        <a href="#" class="dropdown-toggle">
          <i class="glyphicon glyphicon-star"></i>
          <span>Occasion</span>
          <b class="arrow fa fa-angle-right"></b>
        </a>

        <!-- BEGIN Submenu -->
        <ul class="submenu">
          @if(get_action_icons('occasion','get'))
          <li id="occasion-index"><a href="{{url('occasion')}}">Occasion</a></li>
          @endif
        </ul>
        <!-- END Submenu -->
      </li>
      @endif

      </ul>
      <!-- END Navlist -->

      <!-- BEGIN Sidebar Collapse Button -->
      <div id="sidebar-collapse" class="visible-lg">
        <i class="fa fa-angle-double-left"></i>
      </div>
      <!-- END Sidebar Collapse Button -->
    </div>
    <!-- END Sidebar -->

    <!-- BEGIN Content -->
    <div id="main-content">
      <!-- BEGIN Page Title -->
      <div class="page-title">
        <div>
          <h1><i class="fa fa-file-o"></i> @yield('page_title')</h1>
        </div>
      </div>
      <!-- END Page Title -->

      <!-- BEGIN Breadcrumb -->
      <div id="breadcrumbs">
        <ul class="breadcrumb">
          <li class="active"><i class="fa fa-home"></i> Home/ @yield('page_title') </li>
        </ul>
      </div>
      <!-- END Breadcrumb -->

      @include('partial.flash')
      @yield('content')
    </div>
    <div class="footer" align="center">
      <p>{{\Carbon\Carbon::now()->year}} © iVAS Template</p>
    </div>
    <a id="btn-scrollup" class="btn btn-circle btn-lg" href="#"><i class="fa fa-chevron-up"></i></a>
  </div>
  <!-- END Content -->
  <!-- END Container -->

  <!--basic scripts-->

  <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  <script>
    window.jQuery || document.write('<script src="assets/jquery/jquery-2.1.4.min.js"><\/script>')
  </script>

  <script src="{{url('assets/bootstrap/js/bootstrap.min.js')}}"></script>
  <script src="{{url('assets/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
  <script src="{{url('assets/jquery-cookie/jquery.cookie.js')}}"></script>

  <!--page specific plugin scripts-->
  <script src="{{url('assets/flot/jquery.flot.js')}}"></script>
  <script src="{{url('assets/flot/jquery.flot.resize.js')}}"></script>
  <script src="{{url('assets/flot/jquery.flot.pie.js')}}"></script>
  <script src="{{url('assets/flot/jquery.flot.stack.js')}}"></script>
  <script src="{{url('assets/flot/jquery.flot.crosshair.js')}}"></script>
  <script src="{{url('assets/sparkline/jquery.sparkline.min.js')}}"></script>


  <script type="text/javascript" src="{{url('assets/chosen-bootstrap/chosen.jquery.min.js')}}"></script>
  <script type="text/javascript" src="{{url('assets/bootstrap-inputmask/bootstrap-inputmask.min.js')}}"></script>
  <script type="text/javascript" src="{{url('assets/jquery-tags-input/jquery.tagsinput.min.js')}}"></script>
  <script type="text/javascript" src="{{url('assets/jquery-pwstrength/jquery.pwstrength.min.js')}}"></script>
  <script type="text/javascript" src="{{url('assets/bootstrap-fileupload/bootstrap-fileupload.min.js')}}"></script>
  <script type="text/javascript" src="{{url('assets/bootstrap-duallistbox/duallistbox/bootstrap-duallistbox.js')}}">
  </script>
  <script type="text/javascript" src="{{url('assets/dropzone/downloads/dropzone.min.js')}}"></script>
  <script type="text/javascript" src="{{url('assets/bootstrap-timepicker/js/bootstrap-timepicker.js')}}"></script>
  <script type="text/javascript" src="{{url('assets/clockface/js/clockface.js')}}"></script>
  <script type="text/javascript" src="{{url('assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js')}}"></script>
  <script type="text/javascript" src="{{url('assets/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
  <script type="text/javascript" src="{{url('assets/bootstrap-daterangepicker/date.js')}}"></script>
  <script type="text/javascript" src="{{url('assets/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
  <script type="text/javascript" src="{{url('assets/bootstrap-switch/static/js/bootstrap-switch.js')}}"></script>
  <script type="text/javascript" src="{{url('assets/bootstrap-wysihtml5/wysihtml5-0.3.0.js')}}"></script>
  <script type="text/javascript" src="{{url('assets/bootstrap-wysihtml5/bootstrap-wysihtml5.js')}}"></script>
  <script type="text/javascript" src="{{url('assets/ckeditor/ckeditor.js')}}"></script>

  <script type="text/javascript" src="{{url('assets/data-tables/jquery.dataTables.js')}}"></script>
  <script type="text/javascript" src="http://cdn.datatables.net/plug-ins/1.10.19/pagination/select.js"></script>
  <script type="text/javascript" src="{{url('assets/data-tables/bootstrap3/dataTables.bootstrap.js')}}"></script>
  <!--flaty scripts-->
  <script src="{{url('js/flaty.js')}}"></script>
  <script src="{{url('js/flaty-demo-codes.js')}}"></script>
  {{--  <script src="{{url('js/pusher.min.js')}}"></script>
  <script src="{{url('js/pusher_config.js')}}"></script>  --}}
  <script src="{{url('js/vue.min.js')}}"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
  <script type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="{{ url('js/locale.js') }}"></script>
  <script>
    $(document).ready(function() {
      $('.datepicker_ivas').datepicker();
    });
  </script>

  <script>
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
      }
    });
    $('#mySwitch').on('switch-change', function(e, data) {
      var $el = $(data.el),
        value = data.value;
      // console.log(value);
      if (value == false) {
        $('input[name="featured"]').val(0);
      } else {
        $('input[name="featured"]').val(1);
      }
      // console.log(e, $el, value);
    });
  </script>
  <script>
    var app = new Vue({
      el: '#app',
      data: {
        notify_count: 0,
        notifications: [],
        channel: ''
      },
      methods: {
        read_notify: function(id, link) {
          var _this = this
          $.get("{{url('read_notify')}}/"+id, function(data, status) {
            _this.notify_count = _this.notify_count - 1
          })
          window.location.href= link
        }
      },
      computed: {
        all_notifications: function() {
          var _this = this
          var data = "{{json_encode(all_notify())}}";
          // console.log(data);
          let total = [];
          this.notification_data = JSON.parse(data.replace(/&quot;/g, '"'))
          for (let index = 0; index < this.notification_data.length; index++) {
            let object = {
              id: this.notification_data[index].id,
              name: this.notification_data[index].send_user.name,
              subject: this.notification_data[index].subject,
              link: this.notification_data[index].link,
              seen: this.notification_data[index].seen
            }
            this.notifications.push(object)
            if(!this.notification_data[index].seen)
              total.push(this.notification_data[index].seen)
          }

          _this.notify_count = total.length
          return this.notifications
        }
      },
      mounted() {
        this.channel = pusher.subscribe('private-notification.{{\Auth::id()}}');
        var _this = this;
        this.channel.bind('notify-event', function(data) {
          let object = {
            name: data.send_user.name,
            subject: data.message,
            link: data.link
          }
          _this.notifications.push(object)
          $('.fa-bell').addClass('anim-swing')
          let audio = new Audio("{{url('uploads/facebook_sound.mp3')}}");
          audio.play();
          _this.notify_count++;
        });
      }

    })
  </script>
  <script>
    $(document).ready(function() {
      // $('#example').DataTable();
      var el = $('.chosen-rtl');
      if ("<?php echo App::getLocale(); ?>" == "ar") {
        el.chosen({
          rtl: true,
          width: '100%'
        });
      } else {
        el.addClass("chosen");
        el.removeClass("chosen-rtl");
        $(".chosen").chosen();
      }
    });
  </script>
  <script>
    $(document).ready(function() {
      $('#example').DataTable();
    });
  </script>
  <script>
    $(function() {
      $("audio").on("play", function() {
        $("audio").not(this).each(function(index, audio) {
          audio.pause();
        });
      });
    });

  </script>
  <script>
    var check = false;

    function select_all(table_name, has_media)
    {
        if (!check)
        {
            $('.select_all_template').prop("checked", !check);
            $('.select_all_template').each(function(){
              if($(this).is(':checked'))
                collect_selected($(this).val())
            })

            check = true;
        }
        else
        {
            $('.select_all_template').prop("checked", !check);
            check = false;
            clear_selected();
        }
    }

    var selected_list = [];
    var checker_list = [];
    function collect_selected(element) {
        var id;
        if (!element.value)
        {
            id = element;
        }
        else {
            id = element.value;
        }

        if (checker_list[id])
        {
            var index = selected_list.indexOf(id);
            selected_list.splice(index, 1);
            checker_list[id] = false;
        }
        else {
            if (!selected_list.includes(id))
            {
                selected_list.push(id);
                checker_list[id] = true;
            }
        }
    }

    function clear_selected()
    {
        selected_list = [];
        checker_list = [];
    }

    function delete_selected(table_name) {
      var confirmation = confirm('Are you sure you want to delete this ?');
      if (confirmation)
      {
          var form = document.createElement("form");
          var element = document.createElement("input");
          var tb_name = document.createElement("input");
          var csrf = document.createElement("input");
          csrf.name = "_token";
          csrf.value = "{{ csrf_token() }}";
          csrf.type = "hidden";

          form.method = "POST";
          form.action = "{{url('delete_multiselect')}}";

          element.value = selected_list;
          element.name = "selected_list";
          element.type = "hidden";

          tb_name.value = table_name;
          tb_name.name = "table_name";
          tb_name.type = "hidden";

          form.appendChild(element);
          form.appendChild(csrf);
          form.appendChild(tb_name);

          document.body.appendChild(form);

          form.submit();
      }
  }
  </script>
  <!-- <script>
        $(document).ready(function () {
            $('#example').DataTable({
                //  'lengthMenu': [5, 10, 15, 20, 25, 50, 'All']
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                "pageLength": 50
            });
        });
    </script> -->
  @yield('script')
</body>

</html>
