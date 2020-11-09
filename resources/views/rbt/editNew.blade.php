@extends('template')
@section('page_title')
RBTs
@stop
@section('content')
@include('errors')
<div id="main-content">
  <div class="row">
    <div class="col-md-12 noPaddingPhone">
      <div class="box">
        <div class="box-title">
          <h3><i class="fa fa-bars"></i>Update RBT New</h3>
          <div class="box-tool">
            <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
            <a data-action="close" href="#"><i class="fa fa-times"></i></a>
          </div>
        </div>
        <div class="box-content">
          <form method='POST' class="form-horizontal" action='{!! url("rbt")!!}/{!!$rbt->id!!}/update' enctype="multipart/form-data">
            <input type='hidden' name='_token' value='{{Session::token()}}'>

            <div class="form-group">
              <label class="col-sm-3 col-lg-2 control-label" for="track_title_en">Provider Name English *</label>
              <div class="col-sm-9 col-lg-10 controls">
                <input id="track_title_en" name="artist_name_en" value="{{$rbt->artist_name_en}}" type="text" class="form-control input-lg" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 col-lg-2 control-label" for="track_title_en">Provider Name Arabic </label>
              <div class="col-sm-9 col-lg-10 controls">
                <input id="track_title_en" name="artist_name_ar" value="{{$rbt->artist_name_ar}}" type="text" class="form-control input-lg">
              </div>
            </div>



            <div class="form-group">
              <label class="col-sm-3 col-lg-2 control-label" for="track_title_en">Rbt Name English *</label>
              <div class="col-sm-9 col-lg-10 controls">
                <input id="track_title_en" name="track_title_en" value="{{$rbt->track_title_en}}" type="text" class="form-control input-lg" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 col-lg-2 control-label" for="track_title_en">Rbt Name Arabic </label>
              <div class="col-sm-9 col-lg-10 controls">
                <input id="track_title_en" name="track_title_ar" value="{{$rbt->track_title_ar}}" type="text" class="form-control input-lg">
              </div>
            </div>


            <div class="form-group">
              <label class="col-sm-3 col-lg-2 control-label" for="track_title_en">Album * </label>
              <div class="col-sm-9 col-lg-10 controls">
                <input id="track_title_en" name="album_name" value="{{$rbt->album_name}}" type="text" class="form-control input-lg" required>
              </div>
            </div>



            <div class="form-group">
              <label class="col-sm-3 col-lg-2 control-label" for="code">Code *</label>
              <div class="col-sm-9 col-lg-10 controls">
                <input id="code" name="code" type="text" value="{{$rbt->code}}" class="form-control input-lg" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 col-lg-2 control-label" for="owner">Provider *</label>
              <div class="col-sm-9 col-lg-10 controls">
                <input id="owner" name="owner" type="text" value="{{$rbt->owner}}" class="form-control input-lg" required>
              </div>
            </div>

            @if($rbt->track_file)
            @if(file_exists($rbt->track_file))
            <div class="form-group">
              <label class="col-sm-3 col-lg-2 control-label">Track </label>
              <div class="col-sm-9 col-lg-10 controls">
                <audio controls>
                  <source src="{{url($rbt->track_file)}}" type="audio/ogg">
                </audio>
              </div>
            </div>
            @endif
            @endif

            <div class="form-group">
              <label class="col-sm-3 col-lg-2 control-label">Track file</label>
              <div class="col-sm-9 col-lg-10 controls">
                <div class="fileupload fileupload-new" data-provides="fileupload">
                  <div class="input-group">
                    <div class="form-control uneditable-input">
                      <i class="fa fa-file fileupload-exists"></i>
                      <span class="fileupload-preview"></span>
                    </div>
                    <div class="input-group-btn">
                      <a class="btn bun-default btn-file">
                        <span class="fileupload-new">Select file</span>
                        <span class="fileupload-exists">Change</span>
                        <input type="file" name="track_file" accept="audio/*" class="file-input">
                      </a>
                      <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>


            <div class="form-group">
              <label class="col-sm-3 col-lg-2 control-label">Operators Select *</label>
              <div class="col-sm-9 col-lg-10 controls">
                <select class="form-control chosen" data-placeholder="Choose a Operators" name="operator_id" tabindex="1" required>
                  <option value=""></option>
                  @foreach($operators as $operator)
                  <option value="{{$operator->id}}" {{($rbt->operator_id == $operator->id) ? 'selected' : ''}}>{{$operator->title}}-{{$operator->country->title}}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 col-lg-2 control-label">Occasions Select </label>
              <div class="col-sm-9 col-lg-10 controls">
                <select class="form-control chosen" data-placeholder="Choose a Occasions" name="occasion_id" tabindex="1">
                  <option value=""></option>
                  @foreach($occasions as $key => $value)
                  <option value="{{$key}}" {{($rbt->occasion_id == $key) ? 'selected' : ''}}>{{$value}}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 col-lg-2 control-label">Aggregators Select</label>
              <div class="col-sm-9 col-lg-10 controls">
                <select class="form-control chosen" data-placeholder="Choose a Aggregators" name="aggregator_id" tabindex="1">
                  <option value=""></option>
                  @foreach($aggregators as $key => $value)
                  <option value="{{$key}}" {{($rbt->aggregator_id == $key) ? 'selected' : ''}}>{{$value}}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 col-lg-2 control-label">Content Owner Select</label>
              <div class="col-sm-9 col-lg-10 controls">
                <select class="form-control chosen" data-placeholder="Choose a provider" name="provider_id" tabindex="1">
                  <option value=""></option>
                  @foreach($providers as $key => $value)
                  <option value="{{$key}}" {{($rbt->provider_id == $key) ? 'selected' : ''}}>{{$value}}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 col-lg-2 control-label">Master Content Select</label>
              <div class="col-sm-9 col-lg-10 controls">
                <select class="form-control chosen" data-placeholder="Choose a Content" name="content_id" tabindex="1">
                  <option value=""></option>
                  @foreach($contents as $key => $value)
                  <option value="{{$key}}" {{($rbt->content_id == $key) ? 'selected' : ''}}>{{$value}}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="form-group">
              <label for="start_date" class="col-xs-3 col-lg-2 control-label"> Rbt Start Date</label>
              <div class="input-group date  start_date col-sm-9 col-lg-10 controls" style="width: 78%; margin: 0 auto;">
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                <input type="text" name="start_date" value="{{ $rbt->start_date ? $rbt->start_date->format('d-m-Y') : null}}" id="start_date" autocomplete="off" placeholder="Rbt Start Date" data-date-format="dd-mm-yyyy" class="form-control">
              </div>
            </div>

            <div class="form-group">
              <label for="expire_date" class="col-xs-3 col-lg-2 control-label"> Rbt Expire Date</label>
              <div class="input-group date expire_date col-sm-9 col-lg-10 controls" data-date-format="dd-mm-yyyy" style="width: 78%; margin: 0 auto;">
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                <input type="text" name="expire_date" id="expire_date" value="{{$rbt->expire_date ? $rbt->expire_date->format('d-m-Y') :null }}" autocomplete="off" placeholder="Rbt End Date" data-date-format="dd-mm-yyyy" class="form-control">
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2">
                <input type="submit" class="btn btn-primary" value="Submit">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@stop
@section('script')
    <script>
        $('#rbt').addClass('active');
        $('#rbt-create').addClass('active');
    </script>
<script>
        $(document).on('ready', function() {
            $('.start_date').datepicker({
                format: 'dd-mm-yyyy',
                autoclose: true,
            }).on('changeDate', function(selected) {
                var minDate = new Date(selected.date.valueOf());
                $('.expire_date').each(function(){
                  $(this).datepicker('setStartDate', minDate);
                })
            })

            $('.expire_date').datepicker({
                format: 'dd-mm-yyyy',
                autoclose: true,
            })
        })
    </script>
    <script>
        $('#rbt').addClass('active');
        $('#rbt-create').addClass('active');
    </script>
@stop
