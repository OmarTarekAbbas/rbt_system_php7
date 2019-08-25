@extends('template')
@section('page_title')
    Settings
@stop
@section('content')
    @include('errors')
<!-- BEGIN Content -->
<div id="main-content">

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-title">
                    <h3><i class="fa fa-bars"></i>Setting</h3>
                    <div class="box-tool">
                        <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
                        <a data-action="close" href="#"><i class="fa fa-times"></i></a>
                    </div>
                </div>
                <div class="box-content">
                    <form action="{{url('setting/'.$setting->id.'/update')}}" method="post" class="form-horizontal form-bordered form-row-stripped">
              			{!! csrf_field() !!}
                        <div class="form-group">
                            <label for="textfield5" class="col-sm-3 col-lg-2 control-label">Key</label>
                            <div class="col-sm-9 col-lg-10 controls">
                                <input type="text" name="key" id="key" value="{{$setting->key}}" placeholder="key" class="form-control" readonly required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="textfield5" class="col-sm-3 col-lg-2 control-label">Value</label>
                            <div class="col-sm-9 col-lg-10 controls">
                                {{--<input type="text" name="value" id="value" value="{{$setting->value}}" placeholder="value" class="form-control" required>--}}
                                <textarea name="value" id="value" value="{{$setting->value}}" placeholder="value" class="form-control" required>{{$setting->value}}</textarea>
                            </div>
                        </div>

                        <div class="form-group last">
                            <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2">
                               <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> update</button>
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
        $('#setting').addClass('active');
        $('#setting-index').addClass('active');
    </script>
@stop