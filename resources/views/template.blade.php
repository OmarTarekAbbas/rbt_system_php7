<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>RBT - Admin Panel</title>
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
    <!--flaty css styles-->
    <link rel="stylesheet" href="{{url('css/flaty.css')}}">
    <link rel="stylesheet" href="{{url('css/flaty-responsive.css')}}">

    <link rel="shortcut icon" href="{{url('img/favicon.png')}}">

    <meta name="token" content="{{ csrf_token() }}">

    <script>
        function ConfirmDelete()
        {
            var x = confirm("Are you sure you want to delete?");
            if (x)
                return true;
            else
                return false;
        }
    </script>





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
            Admin Panel
        </small>
    </a>

    <!-- BEGIN Navbar Buttons -->
    <ul class="nav flaty-nav pull-right">

        <!-- BEGIN Tasks Dropdown -->

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
                    <a href="{{url('/auth/logout')}}">
                        <i class="fa fa-off"></i>
                        Logout
                    </a>
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
           @if(Auth::user()->hasRole('super_admin'))
             <li id="user">
                <a href="#" class="dropdown-toggle">
                    <i class="glyphicon glyphicon-user"></i>
                    <span>Users</span>
                    <b class="arrow fa fa-angle-right"></b>
                </a>

                <!-- BEGIN Submenu -->

                <ul class="submenu">
                    <li id="user-create"><a href="{{url('users/new')}}">Create User</a></li>
                    <li id="user-index"><a href="{{url('users')}}">Users</a></li>
                </ul>
                <!-- END Submenu -->
            </li>

            <li id="role">
                <a href="#" class="dropdown-toggle">
                    <i class="glyphicon glyphicon-road"></i>
                    <span>Roles</span>
                    <b class="arrow fa fa-angle-right"></b>
                </a>

                <!-- BEGIN Submenu -->
                <ul class="submenu">
                    <li id="role-create"><a href="{{url('roles/new')}}">Create Role</a></li>
                    <li id="role-index"><a href="{{url('roles')}}">Roles</a></li>
                </ul>
                <!-- END Submenu -->
            </li>
            @endif
            @if(Auth::user()->hasRole(['super_admin','admin']))
            <li id="country">
                <a href="#" class="dropdown-toggle">
                    <i class="glyphicon glyphicon-globe"></i>
                    <span>Country</span>
                    <b class="arrow fa fa-angle-right"></b>
                </a>

                <!-- BEGIN Submenu -->
                <ul class="submenu">
                    <li id="country-index"><a href="{{url('country')}}">Country</a></li>
                </ul>
                <!-- END Submenu -->
            </li>

            <li id="aggregator">
                <a href="#" class="dropdown-toggle">
                    <i class="glyphicon glyphicon-user"></i>
                    <span>Aggregator</span>
                    <b class="arrow fa fa-angle-right"></b>
                </a>

                <!-- BEGIN Submenu -->
                <ul class="submenu">
                    <li id="aggregator-index"><a href="{{url('aggregator')}}">Aggregator</a></li>
                </ul>
                <!-- END Submenu -->
            </li>

            <li id="operator">
                <a href="#" class="dropdown-toggle">
                    <i class="glyphicon glyphicon-cog"></i>
                    <span>Operator</span>
                    <b class="arrow fa fa-angle-right"></b>
                </a>

                <!-- BEGIN Submenu -->
                <ul class="submenu">
                    <li id="operator-index"><a href="{{url('operator')}}">Operator</a></li>
                </ul>
                <!-- END Submenu -->
            </li>

            <li id="provider">
                <a href="#" class="dropdown-toggle">
                    <i class="glyphicon glyphicon-heart-empty"></i>
                    <span>Artists</span>
                    <b class="arrow fa fa-angle-right"></b>
                </a>

                <!-- BEGIN Submenu -->
                <ul class="submenu">
                    <li id="provider-index"><a href="{{url('provider')}}">Artists</a></li>
                </ul>
                <!-- END Submenu -->
            </li>

            <li id="occasion">
                <a href="#" class="dropdown-toggle">
                    <i class="glyphicon glyphicon-star"></i>
                    <span>Occasion</span>
                    <b class="arrow fa fa-angle-right"></b>
                </a>

                <!-- BEGIN Submenu -->
                <ul class="submenu">
                    <li id="occasion-index"><a href="{{url('occasion')}}">Occasion</a></li>
                </ul>
                <!-- END Submenu -->
            </li>

            @endif
            <li id="rbt">
                <a href="#" class="dropdown-toggle">
                    <i class="fa fa-play-circle-o"></i>
                    <span>RBT</span>
                    <b class="arrow fa fa-angle-right"></b>
                </a>

                <!-- BEGIN Submenu -->
                <ul class="submenu">
                    @if(Auth::user()->hasRole(['super_admin','admin','account']))
                    @if(Auth::user()->hasRole(['super_admin','admin']))
                        <li id="rbt-statistics"><a href="{{url('rbt/statistics')}}">RBT Statistics</a></li>
                        <li id="rbt-excel"><a href="{{url('rbt/excel')}}">Create RBT</a></li>
                        <li id="rbt-upload-tracks"><a href="{{url('rbt/upload_tracks')}}">Upload multi tracks</a></li>
                        <li id="rbt-list-tracks"><a href="{{url('rbt/file_system')}}">List tracks</a></li>
                    @endif
                        <li id="rbt-index"><a href="{{url('rbt')}}">RBTs</a></li>
                        <li id="rbt-search"><a href="{{url('rbt/search')}}">Search in RBTs</a></li>
                    @endif

                </ul>
                <!-- END Submenu -->
            </li>

            <li id="report">
                <a href="#" class="dropdown-toggle">
                    <i class="fa fa-file-text-o"></i>
                    <span>Report</span>
                    <b class="arrow fa fa-angle-right"></b>
                </a>

                <!-- BEGIN Submenu -->
                <ul class="submenu">
                    @if(Auth::user()->hasRole(['super_admin','admin','account']))
                    @if(Auth::user()->hasRole(['super_admin','admin']))
                        <li id="report-statistics"><a href="{{url('report/statistics')}}">Statistics</a></li>
                        <li id="report-excel"><a href="{{url('report/excel')}}">Report Excel</a></li>
                    @endif
                        <li id="report-index"><a href="{{url('report')}}">Report</a></li>
                        <li id="report-search"><a href="{{url('report/search')}}">Search in reports</a></li>
                    @endif
                </ul>
                <!-- END Submenu -->
            </li>

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
<script>window.jQuery || document.write('<script src="assets/jquery/jquery-2.1.4.min.js"><\/script>')</script>

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
<script type="text/javascript" src="{{url('assets/bootstrap-duallistbox/duallistbox/bootstrap-duallistbox.js')}}"></script>
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
<script type="text/javascript" src="{{url('assets/data-tables/bootstrap3/dataTables.bootstrap.js')}}"></script>
<!--flaty scripts-->
<script src="{{url('js/flaty.js')}}"></script>
<script src="{{url('js/flaty-demo-codes.js')}}"></script>
<script>
     $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
                }
        });
    $('#mySwitch').on('switch-change', function (e, data) {
        var $el = $(data.el)
          , value = data.value;
          // console.log(value);
          if (value == false) {
            $('input[name="featured"]').val(0);
          }else{
            $('input[name="featured"]').val(1);
          }
        // console.log(e, $el, value);
    });
</script>

<script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>
<script>
    $(function(){
        $("audio").on("play", function() {
            $("audio").not(this).each(function(index, audio) {
                audio.pause();
            });
        });
    });
    var selected_list = [] ;
    var checker_list = [] ;
    function collect_selected(element) {
        if (checker_list[element.value])
        {
            var index = selected_list.indexOf(element.value);
            selected_list.splice(index,1) ;
            checker_list[element.value] = false ;
        }
        else{
            if (! selected_list.includes(element.value))
            {
                selected_list.push(element.value) ;
                checker_list[element.value] = true ;
            }
        }
    }
    function delete_selected(table_name) {
        var form = document.createElement("form");
        var element = document.createElement("input");
        var tb_name = document.createElement("input") ;
        var csrf = document.createElement("input") ;
        csrf.name = "_token" ;
        csrf.value= "{{ csrf_token() }}" ;
        csrf.type = "hidden" ;

        form.method = "POST";
        form.action = "{{url('delete_multiselect')}}";

        element.value= selected_list ;
        element.name = "selected_list" ;
        element.type = "hidden" ;

        tb_name.value = table_name ;
        tb_name.name = "table_name" ;
        tb_name.type = "hidden" ;

        form.appendChild(element);
        form.appendChild(csrf) ;
        form.appendChild(tb_name);

        document.body.appendChild(form);

        form.submit();
    }
</script>
@yield('script')

</body>
</html>
