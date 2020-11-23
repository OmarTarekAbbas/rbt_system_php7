@extends('template')
@section('page_title')
Profile Page
@stop

@section('content')

<div class="box">
  <div class="box-title">
    <h3><i class="fa fa-file"></i> Profile Info</h3>
    <div class="box-tool">
      <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
      <a data-action="close" href="#"><i class="fa fa-times"></i></a>
    </div>
  </div>
  <div class="box-content">
    <div class="row">
      <div class="col-md-3">
        <img class="img-responsive img-thumbnail" src="{{$user->image}}" alt="profile picture" />
        <br /><br />
      </div>
      <div class="col-md-9 user-profile-info">
        <p><span>Email:</span> <a href="#">{{$user->email}}</a></p>
      </div>
    </div>
  </div>
</div>

<div id="main-content">
  <div class="row">
    <div class="col-xs-12 col-md-12 noPaddingPhone">
      <div class="box box-blue">
        <div class="box-title">
          <h3><i class="fa fa-file"></i> Edit Profile Picture</h3>
          <div class="box-tool">
            <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
            <a data-action="close" href="#"><i class="fa fa-times"></i></a>
          </div>
        </div>
        <div class="box-content">
          {!! Form::open(['url'=>'client/updateprofilepic' , 'method'=>'post' , 'class'=>'form-horizontal', 'files'=>'true' ]) !!}
          <div class="form-group">
            <label class="col-xs-12 col-md-4 control-label">Image Upload</label>
            <div class="col-xs-12 col-md-8 controls">
              <div class="fileupload fileupload-new" data-provides="fileupload">
                <div class="fileupload-new img-thumbnail width_m_auto mAuto_dBlock" style="height: 150px;">
                  <img src="{{$user->image}}" alt="" />
                </div>
                <div class="fileupload-preview fileupload-exists img-thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                <div>
                  <span class="btn btn-file"><span class="fileupload-new">Select image</span>
                    <span class="fileupload-exists">Change</span>
                    {!! Form::file('image',["accept"=>"image/png, image/jpeg, image/jpg" ,"class"=>"default",'required' => 'true']) !!}
                  </span>
                  <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                </div>
              </div>
              <span class="label label-important">NOTE!</span>
              <span>Only extensions supported png, jpg, and jpeg</span>
            </div>
          </div>
          <div class="form-group">
            <div class="col-xs-12 col-md-12">
              <button type="submit" class="btn btn-primary mAuto_dBlock borderRadius">Submit</button>
            </div>
          </div>
          {!! Form::close() !!}
        </div>
      </div>
    </div>
    <div class="col-xs-12 col-md-12 noPaddingPhone">
      <div class="box box-blue">
        <div class="box-title">
          <h3><i class="fa fa-file"></i> Change Password</h3>
          <div class="box-tool">
            <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
            <a data-action="close" href="#"><i class="fa fa-times"></i></a>
          </div>
        </div>
        <div class="box-content">
          <form id="form-change-password" role="form" method="POST" action="{{ url('/client/updatepassword') }}" novalidate class="form-horizontal">
            <div class="col-md-9">
              <label for="current-password" class="col-sm-4 control-label">Current Password</label>
              <div class="col-sm-8">
                <div class="form-group">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="password" class="form-control" id="current-password" name="current-password" placeholder="Password" required>
                </div>
              </div>
              <label for="password" class="col-sm-4 control-label">New Password</label>
              <div class="col-sm-8">
                <div class="form-group">
                  <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                </div>
              </div>
              <label for="password_confirmation" class="col-sm-4 control-label">Re-enter Password</label>
              <div class="col-sm-8">
                <div class="form-group">
                  <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Re-enter Password" required>
                </div>
              </div>
            </div>
            <div class="form-group">
            <div class="col-xs-12 col-md-12">
              <button type="submit" class="btn btn-primary mAuto_dBlock borderRadius">Submit</button>
            </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@stop
