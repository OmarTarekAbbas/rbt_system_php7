

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
                    <h3><i class="fa fa-bars"></i>Update RBT Form</h3>
                    <div class="box-tool">
                        <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
                        <a data-action="close" href="#"><i class="fa fa-times"></i></a>
                    </div>
                </div>
                <div class="box-content">
                    <form method = 'POST' class="form-horizontal" action = '{!! url("rbt")!!}/{!!$rbt->id!!}/update' enctype="multipart/form-data">
                        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
                        <div class="form-group">
                            <label class="col-sm-3 col-lg-2 control-label"  for="track_title_en">Title *</label>
                             <div class="col-sm-9 col-lg-10 controls">
                            <input id="track_title_en" name = "track_title_en" value="{{$rbt->track_title_en}}" type="text" class="form-control input-lg" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 col-lg-2 control-label"  for="code">Code *</label>
                             <div class="col-sm-9 col-lg-10 controls">
                            <input id="code" name = "code" type="text" value="{{$rbt->code}}" class="form-control input-lg" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 col-lg-2 control-label"  for="social_media_code">Social Media Code</label>
                             <div class="col-sm-9 col-lg-10 controls">
                            <input id="social_media_code" name = "social_media_code" value="{{$rbt->social_media_code}}" type="text" class="form-control input-lg">
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
                             <select class="form-control chosen" data-placeholder="Choose a Occasions" name="occasion_id" tabindex="1" >
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
                             <select class="form-control chosen" data-placeholder="Choose an aggregator" name="aggregator_id" tabindex="1" >
                                <option value=""></option>
                                @foreach($aggregators as $key => $value)
                                    <option value="{{$key}}" {{($rbt->aggregator_id == $key) ? 'selected' : ''}}>{{$value}}</option>
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
                                        <option value="{{$key}}" {{($rbt->provider_id == $key) ? 'selected' : ''}}>{{$value}}</option>
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
                                        <option value="{{$key}}" {{($rbt->content_id == $key) ? 'selected' : ''}}>{{$value}}</option>
                                    @endforeach
                                </select>
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
    </script>
@stop
