@extends('template')
@section('page_title')
FirstParties
@stop
@section('content')
    @include('errors')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-title">
                    <h3><i class="fa fa-bars"></i>Add FirstPartie Form</h3>
                    <div class="box-tool">
                        <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
                        <a data-action="close" href="#"><i class="fa fa-times"></i></a>
                    </div>
                </div>
                <div class="box-content">
                    <form class="form-horizontal" action="{{url('firstparties')}}" method="post">
                    	{{ csrf_field() }}
                      <div class="form-group">
                            <label class="col-sm-3 col-lg-2 control-label">Title *</label>
                            <div class="col-sm-9 col-lg-10 controls">
                                {{-- {!! Form::text('category_name',null,['placeholder'=>'Category Name','class'=>'form-control input-lg']) !!} --}}
                                <input type="text" name="first_party_title" placeholder="FirstPartie Title" class="form-control input-lg" required>
                                <span class="help-inline">Enter a new FirstPartie Title</span>
                            </div>
                        </div>

                        <div class="form-group">
                          <label for="first_party_joining_date" class="col-xs-3 col-lg-2 control-label"> first party joining date</label>
                          <div class="input-group date date-picker col-sm-9 col-lg-10 controls" data-date-format="dd-mm-yyyy">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            <input type="text" name="first_party_joining_date" id="first_party_joining_date" autocomplete="off" placeholder="first party joining date" data-date-format="dd-mm-yyyy" class="form-control">
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
        $('#firstparties').addClass('active');
        $('#firstparties-create').addClass('active');
    </script>
@stop