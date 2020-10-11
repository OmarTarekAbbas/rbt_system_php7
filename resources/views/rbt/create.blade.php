
@extends('template')
@section('page_title')
    RBTs
@stop
@section('content')
    @include('errors')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-title">
                    <h3><i class="fa fa-bars"></i>Add RBT Form</h3>
                    <div class="box-tool">
                        <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
                        <a data-action="close" href="#"><i class="fa fa-times"></i></a>
                    </div>
                </div>
                <div class="box-content">
                    <form method = 'POST' class="form-horizontal" action = '{!!url("rbt")!!}' enctype="multipart/form-data">
                        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
                        <div class="form-group">
                            <label class="col-sm-3 col-lg-2 control-label">Rbt Type Select *</label>
                            <div class="col-sm-9 col-lg-10 controls">
                                <select class="form-control chosen" name="type" tabindex="1" required onchange="change_div(this)">
                                <option id="pl_set" value="" >-- Please Select --</option>
                                    <option value="old">Old Rbt</option>
                                    <option value="new">New Rbt</option>
                                </select>
                            </div>
                        </div>
                        <div id="old" style="display:none">
                            <div class="form-group">
                                <label class="col-sm-3 col-lg-2 control-label"  for="track_title_en">Title *</label>
                                    <div class="col-sm-9 col-lg-10 controls">
                                <input id="track_title_en" name = "track_title_en" type="text" class="form-control input-lg" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 col-lg-2 control-label"  for="code">Code *</label>
                                    <div class="col-sm-9 col-lg-10 controls">
                                <input id="code" name = "code" type="text"  class="form-control input-lg" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 col-lg-2 control-label"  for="social_media_code">Social Media Code</label>
                                    <div class="col-sm-9 col-lg-10 controls">
                                <input id="social_media_code" name = "social_media_code" type="text" class="form-control input-lg">
                                </div>
                            </div>
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
                                        <option value="{{$operator->id}}">{{$operator->title}}-{{$operator->country->title}}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 col-lg-2 control-label">Occasions Select </label>
                                <div class="col-sm-9 col-lg-10 controls">
                                    <select class="form-control chosen" data-placeholder="Choose a Occasions" name="occasion_id" tabindex="1" >
                                    <option value=""></option>
                                    @foreach($occasions as $key => $value)
                                        <option value="{{$key}}">{{$value}}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 col-lg-2 control-label">Aggregators Select</label>
                                <div class="col-sm-9 col-lg-10 controls">
                                    <select class="form-control chosen" data-placeholder="Choose an aggregator" name="aggregator_id" tabindex="1" >
                                    <option value=""></option>
                                    @foreach($aggregators as $key => $value)
                                        <option value="{{$key}}">{{$value}}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 col-lg-2 control-label">Providers Select</label>
                                <div class="col-sm-9 col-lg-10 controls">
                                    <select class="form-control chosen" data-placeholder="Choose a provider" name="provider_id" tabindex="1" >
                                        <option value=""></option>
                                        @foreach($providers as $key => $value)
                                            <option value="{{$key}}">{{$value}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 col-lg-2 control-label">Master Content Select</label>
                                <div class="col-sm-9 col-lg-10 controls">
                                    <select class="form-control chosen" data-placeholder="Choose a Content" name="content_id" tabindex="1" >
                                        <option value=""></option>
                                        @foreach($contents as $key => $value)
                                            <option value="{{$key}}">{{$value}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div id="new" style="display:none">
                            <div class="form-group">
                                <label class="col-sm-3 col-lg-2 control-label"  for="track_title_en">Artist Name English *</label>
                                <div class="col-sm-9 col-lg-10 controls">
                                    <input id="track_title_en" name = "artist_name_en" type="text" class="form-control input-lg" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 col-lg-2 control-label"  for="track_title_en">Artist Name Arabic </label>
                                <div class="col-sm-9 col-lg-10 controls">
                                    <input id="track_title_en" name = "artist_name_ar"  type="text" class="form-control input-lg" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 col-lg-2 control-label"  for="track_title_en">Rbt Name English *</label>
                                    <div class="col-sm-9 col-lg-10 controls">
                                <input id="track_title_en" name = "track_title_en"  type="text" class="form-control input-lg" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 col-lg-2 control-label"  for="track_title_en">Rbt Name Arabic </label>
                                <div class="col-sm-9 col-lg-10 controls">
                                    <input id="track_title_en" name = "track_title_ar"  type="text" class="form-control input-lg" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 col-lg-2 control-label"  for="track_title_en">Album * </label>
                                <div class="col-sm-9 col-lg-10 controls">
                                    <input id="track_title_en" name = "album_name"  type="text" class="form-control input-lg"  required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 col-lg-2 control-label"  for="code">Code *</label>
                                    <div class="col-sm-9 col-lg-10 controls">
                                <input id="code" name = "code" type="text"  class="form-control input-lg" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 col-lg-2 control-label"  for="owner">Provider *</label>
                                <div class="col-sm-9 col-lg-10 controls">
                                    <input id="owner" name = "owner" type="text"  class="form-control input-lg"  required>
                                </div>
                            </div>
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
                                        <option value="{{$operator->id}}">{{$operator->title}}-{{$operator->country->title}}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 col-lg-2 control-label">Occasions Select </label>
                                <div class="col-sm-9 col-lg-10 controls">
                                    <select class="form-control chosen" data-placeholder="Choose a Occasions" name="occasion_id" tabindex="1" >
                                    <option value=""></option>
                                    @foreach($occasions as $key => $value)
                                        <option value="{{$key}}">{{$value}}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 col-lg-2 control-label">Aggregators Select</label>
                                <div class="col-sm-9 col-lg-10 controls">
                                    <select class="form-control chosen" data-placeholder="Choose a Aggregators" name="aggregator_id" tabindex="1" >
                                    <option value=""></option>
                                    @foreach($aggregators as $key => $value)
                                        <option value="{{$key}}">{{$value}}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 col-lg-2 control-label">Content Owner Select</label>
                                <div class="col-sm-9 col-lg-10 controls">
                                    <select class="form-control chosen" data-placeholder="Choose a provider" name="provider_id" tabindex="1" >
                                        <option value=""></option>
                                        @foreach($providers as $key => $value)
                                            <option value="{{$key}}">{{$value}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 col-lg-2 control-label">Master Content Select</label>
                                <div class="col-sm-9 col-lg-10 controls">
                                    <select class="form-control chosen" data-placeholder="Choose a Content" name="content_id" tabindex="1" >
                                        <option value=""></option>
                                        @foreach($contents as $key => $value)
                                            <option value="{{$key}}">{{$value}}</option>
                                        @endforeach
                                    </select>
                                </div>
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

@stop

@section('script')
    <script>
        $('#rbt').addClass('active');
        $('#rbt-create').addClass('active');
        function change_div(_this){
            if(_this.value == "new"){
                $('#new').css("display", "block")
                $('#new :input').attr('disabled',false)
                $('#old').css("display", "none")
                $('#old :input').attr('disabled',true)
                $('#pl_set').addClass('hidden')
            }else if(_this.value == "old"){
                $('#old').css("display", "block")
                $('#old :input').attr('disabled',false)
                $('#new').css("display", "none")
                $('#new :input').attr('disabled',true)
                $('#pl_set').addClass('hidden')
            }
        }
    </script>
@stop
