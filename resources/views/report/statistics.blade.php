@extends('template')
@section('page_title')
    Reports Statistics
@stop
@section('content')
    @include('errors')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <?php
                    $months = months();
                    $years = years();
                ?>
                <div class="box-title">
                    <h3><i class="fa fa-bars"></i>Duration of reports</h3>
                    <div class="box-tool">
                        <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
                        <a data-action="close" href="#"><i class="fa fa-times"></i></a>
                    </div>
                </div>
                <div class="box-content col-md-12">
                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label">From Year</label>
                        <div class="col-sm-9 col-lg-10 controls">
                            <select class="form-control chosen" data-placeholder="Choose a Years" id="from_year" tabindex="1" >
                                <option value=""></option>
                                @foreach($years as $year)
                                    <option value="{{$year}}">{{$year}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label">From month</label>
                        <div class="col-sm-9 col-lg-10 controls">
                            <select class="form-control chosen" data-placeholder="Choose a Months" id="from_month" tabindex="1" >
                                <option value=""></option>
                                @foreach($months as $index=>$month)
                                    <option value="{{$index+1}}">{{$month}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div><br><br><br>

                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label">To Year</label>
                        <div class="col-sm-9 col-lg-10 controls">
                            <select class="form-control chosen" data-placeholder="Choose a Years" id="to_year" tabindex="1" >
                                <option value=""></option>
                                @foreach($years as $year)
                                    <option value="{{$year}}">{{$year}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label">To month</label>
                        <div class="col-sm-9 col-lg-10 controls">
                            <select class="form-control chosen" data-placeholder="Choose a Months" id="to_month" tabindex="1" >
                                <option value=""></option>
                                @foreach($months as $index=>$month)
                                    <option value="{{$index+1}}">{{$month}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div><br><br><br>
                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label">Operators</label>
                        <div class="col-sm-9 col-lg-10 controls">
                            <select class="form-control chosen" data-placeholder="Choose an operator" name="operator" id="operator" tabindex="1" onchange="fun(this)">
                                <option value=""></option>
                                @foreach($operators as $operator)
                                        <option value="{{$operator->id}}">{{$operator->title}}-{{$operator->country->title}}</option>
                                    @endforeach
                            </select>
                        </div>
                    </div><br><br>

                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label"></label>
                        <div class="col-sm-9 col-lg-10 controls">
                            <button class="btn btn-primary" onclick="get_statistics()">Statistics</button>
                        </div>
                    </div>
                </div>

                <div class="box-content col-md-12">
                    <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                </div>
            </div>
        </div>

    </div>


@stop

@section('script')
    <script>
        $('#report').addClass('active');
        $('#report-statistics').addClass('active');
    </script>
    <script src="{{url('js/canvasjs.min.js')}}"></script>
    <script>
        var operator = 0 ;
        function fun(element) {
            operator =element.value ;
        }


        function count_occurences(arr) {
            var a = [], b = [], prev;

            arr.sort();
            for ( var i = 0; i < arr.length; i++ ) {
                if ( arr[i] !== prev ) {
                    a.push(arr[i]);
                    b.push(1);
                } else {
                    b[b.length-1]++;
                }
                prev = arr[i];
            }

            return [a, b];
        }

        function get_statistics() {
            var form_data = [] ;
            form_data[0] = $('#from_year').val() ;
            form_data[1] = $('#from_month').val() ;
            form_data[2] = $('#to_year').val() ;
            form_data[3] = $('#to_month').val() ;
            form_data[4] = operator ;

            var chart = null ;
            $.ajax({
                type:"POST",
                url:"get_statistics",
                data:{"duration":form_data},
                success:function (result) {
                    var nodes = [] ;
                    var j = 0 ;
                    var arr_date = [] ;
                    var arr_operator = []  ;
                    var arr_operator2 = []  ;
                    var arr_rev_share = [] ;
                    var inserted_operator = [] ;

                    var seen = [] ;



                    for(var i=0; i<result.length ;i++)
                    {
                        var date = result[i].year+"/"+result[i].month ;
                        arr_date.push(date) ;
                        arr_operator.push(result[i].title);
                        arr_operator2.push(result[i].title); // 3ashan ba3d kda 3ayez ageeb kol operator repeated kam marra , fa basta5dem function feha sort , el sort da beybawaz el tarteeb ele gai mn el DB , fa 3ashan kda 3mlt array tanya lel operators
                        arr_rev_share.push(result[i].revenue_share);
                        seen.push(0) ;
                    }

                    var [operators,op_occ] = count_occurences(arr_operator2) ;
                    var checker_operators = [] ;

                    for(var i= 0 ; i < operators.length; i++)
                    {
                        checker_operators.push(0) ;
                    }

                    var last_loop = 0 ;
                    var arr_date_length = arr_date.length ;

                    var result_date = [] ;
                    var result_operator = [] ;
                    var result_rev_share = [] ;
                    var values = [] ;

                    for(var q = 0 ; q < arr_date_length ; q++)
                    {
                        last_loop = 0 ;
                        var date_to_compare = arr_date[q] ;
                        for(var i = q ; i < arr_date_length; i++)
                        {
                            if(arr_date[i]!=date_to_compare)
                            {
                                last_loop = i ;
                                break ;
                            }
                            for(var j = 0 ; j < operators.length ; j++)
                            {
                                if(arr_operator[i]==operators[j] && !seen[q])
                                {
                                    checker_operators[j] = 1 ;
                                    values.push(arr_rev_share[i]) ;
                                    seen[i] = 1  ;
                                }
                            }
                        }

                        for(var x = 0 ; x < checker_operators.length ; x++)
                        {
                            if (!checker_operators[x]) {
                                result_date.push(arr_date[q]);
                                result_operator.push(operators[x]);
                                result_rev_share.push(0);
                            }
                            else {
                                result_date.push(arr_date[q]);
                                result_operator.push(operators[x]);
                                result_rev_share.push(values[q]);
                            }
                            checker_operators[x] = 0 ;
                        }
                    }


                    arr_date = [] ;
                    arr_date = result_date ;

                    arr_operator = [] ;
                    arr_operator = result_operator ;

                    arr_rev_share = [] ;
                    arr_rev_share = result_rev_share ;


                    var checker = false ;
                    var q = 0 ;
                    for(var i=0; i<operators.length ;i++)
                    {
                        var year_month = arr_date[i] ;
                        for(var j = 0 ; j < arr_date.length ; j++)
                        {
                            if(arr_operator[j]==operators[i])
                            {
                                if(!checker)
                                {
                                    nodes[i] = {
                                        type: "line",
                                        visible: true,
                                        showInLegend: true,
                                        yValueFormatString: "##.00LE",
                                        name: operators[i],
                                        dataPoints: [
                                            { label: arr_date[j] , y: parseFloat(arr_rev_share[j])}
                                        ]} ;
                                    checker = true ;
                                }
                                else
                                {
                                    var checker_2 = false ;
                                        for(var m = 0 ; m < nodes[i].dataPoints.length ; m++)
                                        {
                                            if( nodes[i].dataPoints[m].label == arr_date[j])
                                            {
                                                if( nodes[i].dataPoints[m].y >= 0 && parseFloat(arr_rev_share[j]) > 0)
                                                {
                                                    nodes[i].dataPoints[m].y = parseFloat(arr_rev_share[j]) ;
                                                    checker_2 = true ;
                                                    break ;
                                                }
                                                else if(nodes[i].dataPoints[m].y > 0 && parseFloat(arr_rev_share[j]) == 0)
                                                {
                                                    checker_2 = true ;
                                                    break ;
                                                }
                                            }
                                        }
                                    if(!checker_2)
                                    {
                                        nodes[i].dataPoints.push({label: arr_date[j] , y: parseFloat(arr_rev_share[j])});
                                    }
                                }
                            }
                        }
                        checker = false ;
                    }
                    //console.log(nodes);

                    chart = new CanvasJS.Chart("chartContainer", {
                        theme:"light3",
                        animationEnabled: true,
                        title:{
                            text: "RBT revenue for operators"
                        },
                        axisY :{
                            includeZero: false,
                            title: "Revenue Share",
                            suffix: "LE"
                        },
                        toolTip: {
                            shared: "true"
                        },
                        legend:{
                            cursor:"pointer",
                            itemclick : toggleDataSeries
                        },
                        data: nodes
                    });
                    chart.render();
                }

            });


            function toggleDataSeries(e) {
                if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible ){
                    e.dataSeries.visible = false;
                } else {
                    e.dataSeries.visible = true;
                }
                chart.render();
            }
        }
    </script>
@stop
