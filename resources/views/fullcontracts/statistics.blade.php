@extends('template')

@section('page_title') Contract Graph Statistics @stop

@section('content')
<div id="main-content">
  <div class="row">
    <div class="col-md-12 noPaddingPhone">
      <div id="chartContainer" style="height: 370px; width: 100%;"></div>
    </div>
  </div>
</div>
@stop

@section('script')
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script>
  //Active Menu
  $('#contract .submenu').first().css('display', 'block');
  $('#contract_statistics').addClass('active');

  //view charts
  window.onload = function() {
    var chart = new CanvasJS.Chart("chartContainer", {
      animationEnabled: true,
      theme: "light2",
      title: {
        text: "Contract Graph Statistics"
      },
      axisY: {
        includeZero: true
      },
      legend: {
        cursor: "pointer",
        verticalAlign: "center",
        horizontalAlign: "right",
        itemclick: toggleDataSeries
      },
      data: [{
        type: "column",
        name: "Expire Contracts",
        color: "#df7970",
        indexLabel: "{y}",
        showInLegend: true,
        dataPoints: <?php echo json_encode($expire_contracts_statistics, JSON_NUMERIC_CHECK); ?>
      }, {
        type: "column",
        name: "Active Contracts",
        color: "#51cda0",
        indexLabel: "{y}",
        showInLegend: true,
        dataPoints: <?php echo json_encode($active_contracts_statistics, JSON_NUMERIC_CHECK); ?>
      }, {
        type: "column",
        name: "Next Contracts",
        color: "#b7bb75",
        indexLabel: "{y}",
        showInLegend: true,
        dataPoints: <?php echo json_encode($next_contracts_statistics, JSON_NUMERIC_CHECK); ?>
      }]
    });
    chart.render();

    function toggleDataSeries(e) {
      if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
        e.dataSeries.visible = false;
      } else {
        e.dataSeries.visible = true;
      }
      chart.render();
    }
  }
</script>
@stop
