
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
                    <form method = 'POST' class="form-horizontal" action = '{!!url("report")!!}' enctype="multipart/form-data">
                        <?php 
                            $months = months();
                            $years = years();
                        ?>
                        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>

                        <div class="form-group">
                          <label class="col-sm-3 col-lg-2 control-label">Years Select </label>
                          <div class="col-sm-9 col-lg-10 controls">
                             <select class="form-control chosen" data-placeholder="Choose a Years" name="year" tabindex="1" >
                                <option value=""></option>
                                @foreach($years as $year) 
                                    <option value="{{$year}}">{{$year}}</option>
                                @endforeach 
                             </select>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-sm-3 col-lg-2 control-label">Months Select </label>
                          <div class="col-sm-9 col-lg-10 controls">
                             <select class="form-control chosen" data-placeholder="Choose a Months" name="month" tabindex="1" >
                                <option value=""></option>
                                @foreach($months as $month) 
                                    <option value="{{$month}}">{{$month}}</option>
                                @endforeach 
                             </select>
                          </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 col-lg-2 control-label"  for="code">Code *</label>
                             <div class="col-sm-9 col-lg-10 controls">   
                            <input id="code" name = "code" type="text" class="form-control input-lg" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 col-lg-2 control-label"  for="classification">Classification *</label>
                             <div class="col-sm-9 col-lg-10 controls">   
                            <input id="classification" name = "classification" type="text" class="form-control input-lg" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 col-lg-2 control-label"  for="rbt_name">Rbt Name *</label>
                             <div class="col-sm-9 col-lg-10 controls">   
                            <input id="rbt_name" name = "rbt_name" type="text" class="form-control input-lg" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 col-lg-2 control-label"  for="download_no">Download Number</label>
                             <div class="col-sm-9 col-lg-10 controls">   
                            <input id="download_no" name = "download_no" type="text" class="form-control input-lg">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 col-lg-2 control-label"  for="total_revenue">Total Revenue *</label>
                             <div class="col-sm-9 col-lg-10 controls">   
                            <input id="total_revenue" name = "total_revenue" type="text" class="form-control input-lg" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 col-lg-2 control-label"  for="revenue_share">Revenue Share *</label>
                             <div class="col-sm-9 col-lg-10 controls">   
                            <input id="revenue_share" name = "revenue_share" type="number" class="form-control input-lg" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 col-lg-2 control-label" >Providers Select *</label>
                             <div class="col-sm-9 col-lg-10 controls">   
                            <select name = 'provider_id' class = 'form-control chosen' ata-placeholder="Providers a Operators" required>
                                <option value=""></option>
                                @foreach($providers as $key => $value) 
                                <option value="{{$key}}">{{$value}}</option>
                                @endforeach 
                            </select>
                            </div>
                        </div>
                        
                       <div class="form-group">
                          <label class="col-sm-3 col-lg-2 control-label">Operators Select *</label>
                          <div class="col-sm-9 col-lg-10 controls">
                             <select class="form-control chosen" data-placeholder="Choose a Operators" name="operator_id" tabindex="1" required>
                                <option value=""></option>
                               @foreach($operators as $key => $value) 
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
        $('#report').addClass('active');
        $('#report-create').addClass('active');
    </script>
@stop