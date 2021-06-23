@extends('template')
@section('page_title')
RBT Graph
@stop
@section('content')
@include('errors')

<style>
  .width_m_auto {
    margin-bottom: 15px !important;
  }
</style>
<div id="main-content">
  <div class="row">
    <div class="col-md-12 noPaddingPhone">
      <div class="box">
        <?php
        $months = months();
        $years = years();
        ?>
        <div class="box-title">
          <h3><i class="fa fa-bars"></i>Duration of RBTs</h3>
          <div class="box-tool">
            <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
            <a data-action="close" href="#"><i class="fa fa-times"></i></a>
          </div>
        </div>
        <form action="{{ url('rbts/graph') }}" method="get">
          <div class="box-content col-md-12 noPaddingPhone">
            <div class="form-group width_m_auto">
              <label class="col-sm-3 col-lg-2 control-label">Operators</label>
              <div class="col-sm-9 col-lg-10 controls">
                <select class="form-control chosen" data-placeholder="Choose an operator" name="operator_id" id="operator" tabindex="1">
                  <option value=""></option>
                  @foreach($operators as $operator)
                  <option value="{{$operator->id}}" {{ $operator->id == request('operator_id') ? 'selected' : ''  }} >{{$operator->title}}</option>
                  @endforeach
                </select>
              </div>
            </div><br><br>

            <div class="row">
              <div class="col-md-12">
                <div class="col-md-6">
                  <div class="form-group width_m_auto">
                    <label class="col-sm-3 col-lg-2 control-label">From Year</label>
                    <div class="col-sm-9 col-lg-10 controls">
                      <select class="form-control chosen" name="from_year" data-placeholder="Choose a Years" id="from_year" tabindex="1">
                        <option value=""></option>
                        @foreach($years as $year)
                        <option value="{{$year}}" {{ $year == request('from_year') ? 'selected' : ''  }}>{{$year}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div><br><br>
                </div>
                <div class="col-md-6">
                  <div class="form-group width_m_auto">
                    <label class="col-sm-3 col-lg-2 control-label">From month</label>
                    <div class="col-sm-9 col-lg-10 controls">
                      <select class="form-control chosen" name="from_month" data-placeholder="Choose a Months" id="from_month" tabindex="1">
                        <option value=""></option>
                        @foreach($months as $index=>$month)
                        <option value="{{$index+1}}" {{ $index+1 == request('from_month') ? 'selected' : ''  }}>{{$month}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div><br><br><br>
                </div>
              </div>

              <div class="col-md-12">
                <div class="col-md-6">
                   <div class="form-group width_m_auto">
                    <label class="col-sm-3 col-lg-2 control-label">To Year</label>
                    <div class="col-sm-9 col-lg-10 controls">
                      <select class="form-control chosen" name="to_year" data-placeholder="Choose a Years" id="to_year" tabindex="1">
                        <option value=""></option>
                        @foreach($years as $year)
                        <option value="{{$year}}" {{ $year == request('to_year') ? 'selected' : ''  }}>{{$year}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div><br><br>
                </div>
                <div class="col-md-6">
                  <div class="form-group width_m_auto">
                    <label class="col-sm-3 col-lg-2 control-label">To month</label>
                    <div class="col-sm-9 col-lg-10 controls">
                      <select class="form-control chosen" name="to_month" data-placeholder="Choose a Months" id="to_month" tabindex="1">
                        <option value=""></option>
                        @foreach($months as $index=>$month)
                        <option value="{{$index+1}}" {{ $index+1 == request('to_month') ? 'selected' : ''  }}>{{$month}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div><br><br>
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-9 col-lg-12">
                <button class="btn btn-primary mAuto_dBlock borderRadius" type="submit">Graph</button>
              </div>
            </div>
          </div>
        </form>

        <div class="box-content col-md-12">
          <div id="chartContainer" style="height: 370px; width: 100%;"></div>
        </div>
      </div>
    </div>
  </div>
</div>

@stop
@section('script')
<script>
  $('#rbt .submenu').first().css('display', 'block');
  $('#rbt-statistics').addClass('active');
</script>
<script src="{{url('js/canvasjs.min.js')}}"></script>
<script type="text/javascript">
    var operator_name = $('#operator option:selected').text()
    var chart = new CanvasJS.Chart("chartContainer",
    {
      title:{
        text: "("+operator_name+") - ({{ request('from_month').'-'.request('from_year').'/'.request('to_month').'-'.request('to_year') }})"
      },
      axisX: {
        title: "Rbt Name"
      },
      axisY: {
        title: "Download Number"
      },
      data: [{
        type :'line',

        dataPoints:[
          @foreach ($reports as $report)
          {
            y    : {{ $report->download_no }},
            label:  "{!! $report->rbt->track_title_en .' ('. $report->month.'-'.$report->year.')' !!}"
          },
          @endforeach
        ]
      }]
    });

    chart.render();
</script>
@stop
