@extends('template')
@section('page_title')
Reports
@stop
@section('content')
@include('errors')
<div class="row">
  <div class="col-md-12">
    <div class="box">
      <div class="box-title">
        <h3><i class="fa fa-bars"></i>Search in reports</h3>
        <div class="box-tool">
          <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
          <a data-action="close" href="#"><i class="fa fa-times"></i></a>
        </div>
      </div>
      <div class="box-content col-md-12">
        <form action="" id="search_form" method="post">
          @csrf
          <div class="form-group col-md-6">
            <label class="col-sm-3 col-lg-2 control-label">Provider</label>
            <div class="col-sm-9 col-lg-10 controls">
              <select id="input8" class="form-control second_party_id chosen" data-placeholder="Choose a provider" name="second_party_id">
                <option value=""></option>
                @foreach($second_partys as $key => $value)
                <option value="{{$value->second_party_id}}">{{$value->second_party_title}}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="form-group col-md-6">
            <label class="col-sm-3 col-lg-2 control-label">Operator</label>
            <div class="col-sm-9 col-lg-10 controls">
              <select id="input6" class="form-control chosen" data-placeholder="Choose a Operators" name="operator_id" tabindex="1">
                <option value=""></option>
                @foreach($operators as $operator)
                <option value="{{$operator->id}}">{{$operator->title}}-{{$operator->country->title}}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="form-group col-md-6">
            <label class="col-sm-3 col-lg-2 control-label">Contract</label>
            <div class="col-sm-9 col-lg-10 controls">
              <select id="contract_id" class="form-control chosen" data-placeholder="Choose a Contract" name="contract_id">
                <option value=""></option>
              </select>
            </div>
          </div>

          @if(Auth::user()->hasRole(["super_admin","admin", 'ceo']))
          <div class="form-group col-md-6">
            <label class="col-sm-3 col-lg-2 control-label">Aggregator</label>
            <div class="col-sm-9 col-lg-10 controls">
              <select id="input9" class="form-control chosen" data-placeholder="Choose an aggregator" name="aggregator_id" tabindex="1">
                <option value=""></option>
                @foreach($aggregators as $key => $value)
                <option value="{{$key}}">{{$value}}</option>
                @endforeach
              </select>
            </div>
          </div>
          @endif


          <div class="form-group col-md-6">
            <label class="col-sm-3 col-lg-2 control-label">Year</label>
            <div class="col-sm-9 col-lg-10 controls">
              <select id="signed_date" class="form-control chosen" data-placeholder="Filter By Year" name="year" tabindex="1">
                @foreach( range( date('Y')-10 , date('Y')+10 ) as $year )
                <option @if($year==date('Y')) selected="selected" @endif value="{{$year}}">{{$year}}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="form-group col-md-6">
            <label class="col-sm-3 col-lg-2 control-label">Month</label>
            <div class="col-sm-9 col-lg-10 controls">
              <select class="form-control chosen" data-placeholder="Choose a month" name="month" tabindex="1" multiple required>
                @for($month = 1 ; $month <= 12 ; $month++) <option value="{{$month}}">{{date("F", strtotime("$month/1/1"))}}</option>
                  @endfor
              </select>
            </div>
          </div>


          <div class="form-group col-md-6">
            <label class="col-sm-3 col-lg-2 control-label">Code</label>
            <div class="col-sm-9 col-lg-10 controls">
              <input id="input4" name="code" type="number" class="form-control">
            </div>
          </div>

          <div class="form-group col-md-6">
            <label class="col-sm-3 col-lg-2 control-label">Rbt title</label>
            <div class="col-sm-9 col-lg-10 controls">
              <input id="input5" name="title" type="text" class="form-control">
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-9 col-lg-12">
              <button type="button" class="btn btn-primary mAuto_dBlock" onclick="send_request()">Search</button>
            </div>
          </div>
        </form>


        <div class="box-content col-md-12" id="search_result">

        </div>

      </div>

    </div>
  </div>

</div>
@stop

@section('script')
<script>
      $('.second_party_id').change(function(){
        getContracts($(this).val())
      })
      // api for get contracts
      function getContracts(contract_id) {
          var contracts = []
          $.get("{{ url('/api/contracts/') }}/" + contract_id, function(response) {
              form = createContractForm(response)
              $('#contract_id').html(form)
              $(".chosen").each(function() {
                  $(this).trigger("chosen:updated");
              })
          });
      }
      // create input for contracts
      function createContractForm(contracts) {
          var input = '<option value=""></option>'
          Object.keys(contracts).forEach(key => {
              input += `<option value="${contracts[key].id}">${contracts[key].contract_code} _ ${contracts[key].contract_label}</option>`
          });
          return input
      }
    </script>
    <script>
        var i = 0 ;
        function send_request() {
            $.ajax({
                type: "POST",
                url : "search",
                data: $('#search_form').serialize(),
                success: function(result){
                    $('#search_result').html('') ;
                    @if(Auth::user()->hasRole(["super_admin","admin", 'ceo']))
                    var table = '<div class="row">\
                                    <div class="col-md-12">\
                                    <div class="box">\
                                    <div class="box-title">\
                                    <h3><i class="fa fa-table"></i>Search Result</h3>\
                                    <div class="box-tool">\
                                    <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>\
                                    <a data-action="close" href="#"><i class="fa fa-times"></i></a>\
                                    </div>\
                                    </div>\
                                    <div class="box-content">\
                                        <button id="btnExport" onclick="export_report()" class="btn btn-circle btn-fill btn-bordered btn-success btn-to-info"><i class="fa fa-save"></i></button>\
                                        <div class="table-responsive" id="table_wrapper">\
                                            <table class="table table-striped table-hover fill-head" id="dvData">\
                                                <thead>\
                                                    <tr>\
                                                        <th>#</th>\
                                                        <th>RBT ID</th>\
                                                        <th>RBT Title</th>\
                                                        <th>Year</th>\
                                                        <th>Month</th>\
                                                        <th>Code</th>\
                                                        <th>Classification</th>\
                                                        <th>Download #</th>\
                                                        <th>Total Revenue</th>\
                                                        <th>Revenue share</th>\
                                                        <th>Provider</th>\
                                                        <th>Operator</th>\
                                                        <th>Aggregator</th>\
                                                    </tr>\
                                                </thead>\
                                                <tbody id="table_body">\
                                                </tbody>\
                                            </table>\
                                        </div>\
                                    </div>\
                                    </div>\
                                    </div>\
                                 </div>';
                    @else
                    var table = '<div class="row">\
                                    <div class="col-md-12">\
                                    <div class="box">\
                                    <div class="box-title">\
                                    <h3><i class="fa fa-table"></i>Search Result</h3>\
                                    <div class="box-tool">\
                                    <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>\
                                    <a data-action="close" href="#"><i class="fa fa-times"></i></a>\
                                    </div>\
                                    </div>\
                                    <div class="box-content">\
                                        <button id="btnExport" onclick="export_report()" class="btn btn-circle btn-fill btn-bordered btn-success btn-to-info"><i class="fa fa-save"></i></button>\
                                        <div class="table-responsive" id="table_wrapper">\
                                            <table class="table table-striped table-hover fill-head" id="dvData">\
                                                <thead>\
                                                    <tr>\
                                                        <th>#</th>\
                                                        <th>RBT ID</th>\
                                                        <th>RBT Title</th>\
                                                        <th>Year</th>\
                                                        <th>Month</th>\
                                                        <th>Code</th>\
                                                        <th>Classification</th>\
                                                        <th>Download #</th>\
                                                        <th>Total Revenue</th>\
                                                        <th>Revenue share</th>\
                                                        <th>Provider</th>\
                                                        <th>Operator</th>\
                                                    </tr>\
                                                </thead>\
                                                <tbody id="table_body">\
                                                </tbody>\
                                            </table>\
                                        </div>\
                                    </div>\
                                    </div>\
                                    </div>\
                                 </div>';
                    @endif
                    $('#search_result').append(table).hide().fadeIn(600) ;
                    result.forEach(append_result);
                }
            });
        }

        var revenue_share_counter = 0 ;
        function append_result(record) {

            revenue_share_counter += parseFloat(record.revenue_share) ;

            var type  ;
            var track_path = "" ;
            var path = '{{url('')}}'+'/' ;
            var edit_path = '{{url('report/')}}'+'/'+record.id+'/edit' ;
            var delete_path = '{{url('report/')}}'+'/'+record.id+'/delete' ;

            var str = '<tr>'+
                        '<td>'+record.id+'</td>'+
                        '<td>'+record.rbt_id+'</td>'+
                        '<td>'+record.rbt_name+'</td>'+
                        '<td>'+record.year+'</td>'+
                        '<td>'+record.month+'</td>'+
                        '<td>'+record.code+'</td>'+
                        '<td>'+record.classification+'</td>'+
                        '<td>'+record.download_no+'</td>'+
                        '<td>'+record.total_revenue+'</td>'+
                        '<td>'+record.revenue_share+'</td>'+
                        '<td>'+record.provider.second_party_title+'</td>'+
                        '<td>'+record.operator.title+'</td>'+
                        @if(Auth::user()->hasRole(["super_admin","admin", 'ceo']))
                        '<td>'+record.aggregator.title+'</td>'+
                        @endif
                      '</tr>';
            $('#table_body').append(str);
        }

        function export_excel() {
            e.preventDefault();

            //getting data from our table
            var data_type = 'data:application/vnd.ms-excel';
            var table_div = document.getElementById('table_wrapper');
            var table_html = table_div.outerHTML.replace(/ /g, '%20');

            var a = document.createElement('a');
            a.href = data_type + ', ' + table_html;
            a.download = 'exported_table_' + Math.floor((Math.random() * 9999999) + 1000000) + '.xls';
            a.click();

        }

        function export_report() {
            var revenue_share_element = '<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td>Total IVAS revenue share</td><td></td><td></td><td></td></tr><tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td>'+revenue_share_counter+'</td><td></td><td></td><td></td></tr>' ;
            //getting data from our table
            var data_type = 'data:application/vnd.ms-excel';
            $('#dvData').append(revenue_share_element) ;
            var table_div = document.getElementById('table_wrapper');
            var table_html = table_div.outerHTML.replace(/ /g, '%20');

            var d = new Date() ;
            var a = document.createElement('a');
            a.href = data_type + ', ' + table_html ;
            a.download = 'report ' + d + '.xls';
            a.click();
        }


    </script>
    <script>
        $('#rbt .submenu').first().css('display', 'block');
        $('#report .submenu').first().css('display', 'block');
        $('#report-search').addClass('active');
    </script>
@stop
