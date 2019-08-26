@extends('template')
@section('page_title')
    Department
@stop
@section('content')
    @include('errors')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-title">
                    <h3><i class="fa fa-bars"></i>Edit Department Form</h3>
                    <div class="box-tool">
                        <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
                        <a data-action="close" href="#"><i class="fa fa-times"></i></a>
                    </div>
                </div>
                <div class="box-content">
                    <form class="form-horizontal" action="{{url('department/'.$department->id)}}" method="post">
                        <input type="hidden" value="patch" name="_method">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label class="col-sm-3 col-lg-2 control-label">Title *</label>
                            <div class="col-sm-9 col-lg-10 controls">
                                {{-- {!! Form::text('category_name',null,['placeholder'=>'Category Name','class'=>'form-control input-lg']) !!} --}}
                                <input type="text" name="title" value="{{$department->title}}" class="form-control input-lg" required>
                                <span class="help-inline">Enter a new Department Title</span>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-sm-3 col-lg-2 control-label">Department Email *</label>
                            <div class="col-sm-9 col-lg-10 controls">
                                {{-- {!! Form::text('category_name',null,['placeholder'=>'Category Name','class'=>'form-control input-lg']) !!} --}}
                                <input type="email" name="email" value="{{$department->email}}" class="form-control input-lg" required>
                                <span class="help-inline">Enter a new Department Email</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 col-lg-2 control-label">Manager *</label>
                            <div class="col-sm-9 col-lg-10 controls">
                                <select class="form-control chosen" data-placeholder="Choose a Manager" name="manager_id" tabindex="1" required>
                                @foreach($managers as $manager)
                                    <option value="{{$manager->id}}" @if($department->manager_id == $manager->id) selected @endif>{{$manager->name}}</option>
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
        $('#department').addClass('active');
        $('#department-create').addClass('active');
    </script>
@stop
