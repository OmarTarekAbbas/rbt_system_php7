@extends('template')

@section('page_title')
<?php
$controller_setter = "Select Controller"; // default value
echo $controller_setter;

if (isset($controller_name))
  $controller_setter = $controller_name;
?>
@stop

@section('content')
@include('errors')

<style>
  .chosen-container-single .chosen-single {
    border-radius: 0.6rem !important;
  }

  tr:nth-of-type(odd) {
    background-color: #cfcfcf;
  }

  tr:nth-of-type(even) {
    background-color: #FFF;
  }
</style>
<div id="main-content">
  <div class="row">
    <div class="col-md-12 noPaddingPhone">
      <div class="box">
        <div class="box-title">
          <h3><i class="fa fa-table"></i>{{$controller_setter}}</h3>
          <div class="box-tool">
            <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
            <a data-action="close" href="#"><i class="fa fa-times"></i></a>
          </div>
        </div>
        <div class="box-content">
          {!! Form::open(["url"=>"routes/index_v2","class"=>"width_m_auto form-horizontal","method"=>"GET","id"=>"form_body"]) !!}
          <div class="form-group">
            <label class="col-sm-3 col-lg-2 control-label">Select Controller</label>
            <div class="col-sm-9 col-md-10 controls">
              <select class="form-control chosen-rtl" onchange="get_controller_methods(this)" name="controller_name" required>
                <option value>Select Controller</option>
                @foreach($controllers as $controller_name=>$item)
                <option value="{{$controller_name}}" @if(isset($_GET['controller_name'])&&!empty($_GET['controller_name']) && $_GET['controller_name']==$controller_name) selected @endif>{{$controller_name}}</option>
                @endforeach
              </select>
              <br />
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-3 col-lg-2 control-label" id="methods_word"></label>
            <div class="col-sm-9 col-md-10 controls">
              <ul id="methods">

              </ul>
            </div>
          </div>
          {!! Form::close() !!}
        </div>
        @if(isset($methods))
        <div class="box-content">
          <div class="table-responsive" style="overflow: scroll;">
            <table class="table fill-head">
              <thead>
                <tr>
                  <th>method name</th>

                  @foreach($roles as $role)
                  <th>
                    <label class="checkbox-inline">
                      <input type="checkbox" onchange="check_all({{$role->id}})" />
                      {{$role->name}}
                    </label>
                  </th>
                  @endforeach
                </tr>
              </thead>
              <tbody>
                {!! Form::open(["url"=>"routes/store_v2","class"=>"form-horizontal"]) !!}
                @foreach($methods as $i=>$function_name)
                {!! Form::hidden("controller_name",$_GET['controller_name']) !!}
                <?php
                $function_name = str_replace(' ', '', $function_name); // to remove spaces from function name
                $j = 0;
                ?>
                @if($function_name!="")
                <tr>

                  <td style="width: 100%;">
                    <p>{{$function_name}}</p>
                    {!! Form::hidden("route[$i][$j]",$function_name) !!}
                    <?php $j++; ?>
                    <div class="controls" style="padding: 0;">
                      <input class="borderRadius btn-lg" type="text" name="route[{{$i}}][{{$j++}}]" @foreach($selected_routes as $route) @if($route->function_name == $function_name) style="border: 1px solid #b6d1f2;" value="{{$route->route}}" @endif @endforeach placeholder="..." class="form-control" style="border: 1px solid #b6d1f2;">
                    </div>
                    <div class="form-group">
                      <div class="controls" style="padding: 0;">
                        <select class="form-control chosen-rtl" name="route[{{$i}}][{{$j++}}]">
                          <option></option>
                          @foreach($method_types as $index=>$type)
                          <option @foreach($selected_routes as $route) @if($route->function_name == $function_name && $route->method==$index) selected @endif @endforeach value="{{$index}}" >{{$type}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </td>
                  @foreach($roles as $index=>$role)
                  <td>
                    <label class="checkbox-inline displayFlex">
                      <input type="checkbox" name="route[{{$i}}][{{$j++}}]" value="{{$role->id}}" class="check_role_{{$role->id}}" @foreach($selected_routes as $route) @if($route->function_name == $function_name) @foreach($route->roles_routes as $role_route) @if($role_route->role_id == $role->id) checked @endif @endforeach @endif @endforeach
                      />
                    </label>
                  </td>
                  @endforeach
                </tr>
                @endif
                @endforeach


              </tbody>
            </table>
          </div>
          <div style="margin: 1% 0;">
            <input type="submit" class="btn btn-success mAuto_dBlock borderRadius" value="Save Changes">
          </div>
          {!! Form::close() !!}
        </div>
        @endif
      </div>
    </div>
  </div>
</div>

@stop
@section('script')
    <script>
        var checked_roles = [] ;
        function check_all(role_id)
        {
            var index = checked_roles.indexOf(role_id) ;
            if(index!=-1)
            {
                checked_roles.splice(index,1) ;
                $('.check_role_'+role_id).prop('checked', false);
            }
            else{
                checked_roles.push(role_id) ;
                $('.check_role_'+role_id).prop('checked', true);
            }
        }

        function get_controller_methods(element)
        {
            $('#form_body').submit();
        }
    </script>

    <script>
        $('#role').addClass('active');
        $('#route-v2-index').addClass('active');
    </script>
@stop
