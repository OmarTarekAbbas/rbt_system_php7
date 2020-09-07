

@extends('template')
@section('page_title')
    Contents
@stop
@section('content')
    @include('errors')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-title">
                    <h3><i class="fa fa-bars"></i>Update Content Form</h3>
                    <div class="box-tool">
                        <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
                        <a data-action="close" href="#"><i class="fa fa-times"></i></a>
                    </div>
                </div>
                <div class="box-content">
                    <form method = 'POST' class="form-horizontal" action = '{!! url("content")!!}/{!!$content->id!!}/update' enctype="multipart/form-data">
                        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
                        <input type = 'hidden' name = '_method' value = 'patch'>
                        <div class="form-group">
                            <label class="col-sm-3 col-lg-2 control-label"  for="track_title_en">Content Title *</label>
                             <div class="col-sm-9 col-lg-10 controls">
                            <input id="content_title" name = "content_title" value="{{$content->content_title}}" type="text" class="form-control input-lg" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 col-lg-2 control-label"  for="code">content Type *</label>
                             <div class="col-sm-9 col-lg-10 controls">
                                 {!! Form::select('content_type', ['image'=>'image','video' =>'video','audio' => 'audio'], $content->content_type, ['class' => 'form-control input-lg' , 'required' => 'required']) !!}
                            </div>
                        </div>
                        @if($content->path)
                            @if(file_exists($content->path))
                                @if(!strcmp($content->content_type,'audio'))
                                <div class="form-group">
                                    <label class="col-sm-3 col-lg-2 control-label">Track </label>
                                    <div class="col-sm-9 col-lg-10 controls">
                                        <audio controls>
                                            <source src="{{$content->path}}" width="100%" type="audio/ogg">
                                        </audio>
                                    </div>
                                </div>
                                @elseif(!strcmp($content->content_type,'video'))
                                <div class="form-group">
                                    <label class="col-sm-3 col-lg-2 control-label">Track </label>
                                    <div class="col-sm-9 col-lg-10 controls">
                                        <video controls>
                                            <source src="{{$content->path}}" width="100%" type="audio/ogg">
                                        </video>
                                    </div>
                                </div>
                                @else
                                <div class="form-group">
                                    <label class="col-sm-3 col-lg-2 control-label">Track </label>
                                    <div class="col-sm-9 col-lg-10 controls">
                                        <img src="{{$content->path}}" width="100%" controls>
                                    </div>
                                </div>
                                @endif
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
                                           <input type="file" name="path" class="file-input">
                                       </a>
                                        <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
                                   </div>
                                </div>
                             </div>
                          </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 col-lg-2 control-label">Occasion Select *</label>
                            <div class="col-sm-9 col-lg-10 controls">
                                <select class="form-control chosen" data-placeholder="Choose a Occasion" name="occasion_id" tabindex="1" required>
                                <option value=""></option>
                                @foreach($occasions as $key => $value)
                                    <option value="{{$key}}" {{($content->occasion_id == $key) ? 'selected' : ''}}>{{$value}}</option>
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
                                        <option value="{{$key}}" {{($content->provider_id == $key) ? 'selected' : ''}}>{{$value}}</option>
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
        $('#content').addClass('active');
        $('#content-create').addClass('active');
    </script>
@stop
