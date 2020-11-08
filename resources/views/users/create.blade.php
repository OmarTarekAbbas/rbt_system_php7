@extends('template')
@section('page_title')
Users
@stop
@section('content')
@include('errors')
<div class="row">
  <div class="col-md-12 noPaddingPhone">
    <div class="box">
      <div class="box-title">
        <h3><i class="fa fa-bars"></i>Add User Form</h3>
        <div class="box-tool">
          <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
          <a data-action="close" href="#"><i class="fa fa-times"></i></a>
        </div>
      </div>
      <div class="box-content">
        <form class="width_m_auto form-horizontal" action="{{url('users')}}" method="post">
          {{ csrf_field() }}

          @if(isset($_REQUEST['aggregator_id']))
          <div class="form-group">
            <label class="col-sm-3 col-lg-2 control-label">Name *</label>
            <div class="col-sm-9 col-lg-10 controls">
              {{-- {!! Form::text('category_name',null,['placeholder'=>'Category Name','class'=>'form-control input-lg']) !!} --}}
              <input type="text" name="name" placeholder="User Name" class="form-control input-lg" value="{{$_REQUEST['title']}}" readonly required>
              <span class="help-inline">Enter a new User name</span>
            </div>
          </div>
          @else
          <div class="form-group">
            <label class="col-sm-3 col-lg-2 control-label">Name *</label>
            <div class="col-sm-9 col-lg-10 controls">
              {{-- {!! Form::text('category_name',null,['placeholder'=>'Category Name','class'=>'form-control input-lg']) !!} --}}
              <input type="text" name="name" placeholder="User Name" class="form-control input-lg" required>
              <span class="help-inline">Enter a new User name</span>
            </div>
          </div>
          @endif

          <div class="form-group">
            <label class="col-sm-3 col-lg-2 control-label">Email *</label>
            <div class="col-sm-9 col-lg-10 controls">
              {{-- {!! Form::text('category_name',null,['placeholder'=>'Category Name','class'=>'form-control input-lg']) !!} --}}
              <input type="email" name="email" placeholder="Email" class="form-control input-lg" required>
              <span class="help-inline">Enter a new Email</span>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-3 col-lg-2 control-label">Password *</label>
            <div class="col-sm-9 col-lg-10 controls">
              {{-- {!! Form::text('category_name',null,['placeholder'=>'Category Name','class'=>'form-control input-lg']) !!} --}}
              <input type="password" name="password" placeholder="Password" class="form-control input-lg" required>
            </div>
          </div>

          @if(isset($_REQUEST['aggregator_id']))
          <div class="form-group">
            <label class="col-sm-3 col-lg-2 control-label">aggregator *</label>
            <div class="col-sm-9 col-lg-10 controls">
              <select class="form-control input-lg" name="aggregator_id">
                <option value="{{$_REQUEST['aggregator_id']}}" selected>{{$_REQUEST['title']}}</option>
              </select>
            </div>
          </div>
          @endif

          @if(isset($_REQUEST['aggregator_id']))
          <div class="form-group">
            <label class="col-sm-3 col-lg-2 control-label">Role *</label>
            <div class="col-sm-9 col-lg-10 controls">
              <select class="form-control chosen" data-placeholder="Choose a Role" name="role" tabindex="1" required>
                @foreach($roles as $role)
                @if($role->name == 'account')
                <option value="{{$role->name}}">{{$role->name}}</option>
                @endif
                @endforeach
              </select>
            </div>
          </div>
          @else
          <div class="form-group">
            <label class="col-sm-3 col-lg-2 control-label">Role *</label>
            <div class="col-sm-9 col-lg-10 controls">
              <select class="form-control chosen" data-placeholder="Choose a Role" name="role" tabindex="1" required>
                @foreach($roles as $role)
                <option value="{{$role->name}}">{{$role->name}}</option>
                @endforeach
              </select>
            </div>
          </div>
          @endif

          <div class="form-group">
            <div class="col-sm-9 col-lg-12">
              <input type="submit" class="btn btn-primary mAuto_dBlock borderRadius" value="Submit">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

</div>

@stop

@section('script')
<script>
  $('#user .submenu').first().css('display', 'block');
  $('#user-create').addClass('active');
</script>
@stop
