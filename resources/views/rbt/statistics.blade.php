@extends('template')
@section('page_title')
RBT Statistics
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
        <div class="box-content col-md-12 noPaddingPhone">
          <div class="form-group width_m_auto">
            <label class="col-sm-3 col-lg-2 control-label">From Year</label>
            <div class="col-sm-9 col-lg-10 controls">
              <select class="form-control chosen" data-placeholder="Choose a Years" id="from_year" tabindex="1">
                <option value=""></option>
                @foreach($years as $year)
                <option value="{{$year}}">{{$year}}</option>
                @endforeach
              </select>
            </div>
          </div><br><br>
          <div class="form-group width_m_auto">
            <label class="col-sm-3 col-lg-2 control-label">From month</label>
            <div class="col-sm-9 col-lg-10 controls">
              <select class="form-control chosen" data-placeholder="Choose a Months" id="from_month" tabindex="1">
                <option value=""></option>
                @foreach($months as $index=>$month)
                <option value="{{$index+1}}">{{$month}}</option>
                @endforeach
              </select>
            </div>
          </div><br><br><br>

          <div class="form-group width_m_auto">
            <label class="col-sm-3 col-lg-2 control-label">To Year</label>
            <div class="col-sm-9 col-lg-10 controls">
              <select class="form-control chosen" data-placeholder="Choose a Years" id="to_year" tabindex="1">
                <option value=""></option>
                @foreach($years as $year)
                <option value="{{$year}}">{{$year}}</option>
                @endforeach
              </select>
            </div>
          </div><br><br>
          <div class="form-group width_m_auto">
            <label class="col-sm-3 col-lg-2 control-label">To month</label>
            <div class="col-sm-9 col-lg-10 controls">
              <select class="form-control chosen" data-placeholder="Choose a Months" id="to_month" tabindex="1">
                <option value=""></option>
                @foreach($months as $index=>$month)
                <option value="{{$index+1}}">{{$month}}</option>
                @endforeach
              </select>
            </div>
          </div><br><br><br>
          <div class="form-group width_m_auto">
            <label class="col-sm-3 col-lg-2 control-label" for="owner">Number of RBTs</label>
            <div class="col-sm-9 col-lg-10 controls">
              <input id="num_of_rbts" type="number" class="form-control input-lg">
            </div>
          </div><br><br><br>

          <div class="form-group width_m_auto">
            <label class="col-sm-3 col-lg-2 control-label">Operators</label>
            <div class="col-sm-9 col-lg-10 controls">
              <select class="form-control chosen" data-placeholder="Choose an operator" name="operator" id="operator" tabindex="1" onchange="fun(this)">
                <option value=""></option>
                @foreach($operators as $operator)
                <option value="{{$operator->id}}">{{$operator->title}}</option>
                @endforeach
              </select>
            </div>
          </div><br><br>


          <div class="form-group">
            <div class="col-sm-9 col-lg-12">
              <button class="btn btn-primary mAuto_dBlock borderRadius" onclick="get_statistics()">Statistics</button>
            </div>
          </div>
        </div>

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
<script>
  var operator = 0;

  function fun(element) {
    operator = element.value;
  }

  function get_statistics() {
    var form_data = [];
    form_data[0] = $('#from_year').val();
    form_data[1] = $('#from_month').val();
    form_data[2] = $('#to_year').val();
    form_data[3] = $('#to_month').val();
    form_data[4] = operator;
    form_data[5] = $('#num_of_rbts').val();

    var chart = null;
    var nodes = [];
    $.ajax({
      type: "POST",
      url: "get_statistics",
      data: {
        "duration": form_data
      },
      success: function(result) {

        for (var i = 0; i < result.length; i++) {
          nodes[i] = {
            y: parseFloat(result[i].revenue_share),
            label: result[i].rbt_name + "/" + result[i].title + "/" + result[i].year + "-" + result[i].month
          };
        }

        var chart = new CanvasJS.Chart("chartContainer", {
          animationEnabled: true,
          theme: "light2", // "light1", "light2", "dark1", "dark2"
          title: {
            text: "RBTs Statistics"
          },
          axisY: {
            title: "revenue share for rbts (EGP)"
          },
          data: [{
            type: "column",
            showInLegend: true,
            legendMarkerColor: "grey",
            legendText: "EGP: Egyption Pound",
            dataPoints: nodes
          }]
        });
        chart.render();
      }
    });
  }
</script>
@stop
