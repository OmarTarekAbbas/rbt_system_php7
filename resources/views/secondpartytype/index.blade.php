@extends('template')
@section('page_title')
Second Party Types
@stop
@section('content')
@include('errors')
<!-- BEGIN Content -->
<div id="main-content">
  <div class="row">
    <div class="col-md-12 noPaddingPhone">
      <div class="box box-black">
        <div class="box-title">
          <h3><i class="fa fa-table"></i> Second Party types Table</h3>
          <div class="box-tool">
            <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
            <a data-action="close" href="#"><i class="fa fa-times"></i></a>
          </div>
        </div>
        <div class="box-content">
          @if (Auth::user()->hasRole(['super_admin', 'legal', 'ceo']))

          <div class="btn-toolbar pull-right">
            <div class="btn-group">
              <a class="btn btn-circle show-tooltip" title="" href="{{url('SecondPartyType/create')}}" data-original-title="Add new record"><i class="fa fa-plus"></i></a>
              <?php
              $table_name = "service_types";
              ?>
            </div>
          </div>
          @endif
          <br><br>
          <div class="table-responsive">
            <table id="example" class="table table-striped dt-responsive" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th style="width:18px"><input type="checkbox" onclick="select_all('SecondPartyType')"></th>
                  <th>Id</th>
                  <th>Second Party Type Title</th>
                  <th>Second Party Type Description</th>
                  <th class="visible-xs visible-md visible-lg" style="width:130px">Action</th>
                </tr>
              </thead>
              <tbody id="tablecontents">
                @foreach($SecondPartyTypes as $SecondPartyType)
                <tr class="table-flag-blue">
                  <td><input class="select_all_template" type="checkbox" name="selected_rows[]" value="{{$SecondPartyType->id}}" onclick="collect_selected(this)"></td>
                  <td>{{$SecondPartyType->id}}</td>
                  <td>{{$SecondPartyType->second_party_type_title}}</td>
                  <td>{{$SecondPartyType->second_party_type_description}}</td>
                  <td class="visible-xs visible-md visible-lg">

                    <div class="btn-group">
                      @if (get_action_icons('SecondPartyType/{SecondPartyType}/edit', 'get'))
                      <a class="btn btn-sm show-tooltip" title="" href="{{url('SecondPartyType/'.$SecondPartyType->id.'/edit')}}" data-original-title="Edit"><i class="fa fa-edit"></i></a>
                      @endif
                      @if (get_action_icons('SecondPartyType/{SecondPartyType}', 'delete'))
                      <form action="{{url('SecondPartyType/'.$SecondPartyType->id)}}" method="POST" style="display: inline">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-sm btn-danger show-tooltip" type="submit" onclick='return ConfirmDelete()' data-original-title="Delete"><i class="fa fa-trash-o"></i></button>
                      </form>
                      @endif
                    </div>

                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@stop
@section('script')
<script type="text/javascript" src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<script type="text/javascript">

</script>
<script>
  $('#contract .submenu').first().css('display', 'block');
  $('#SecondPartyType .submenu').first().css('display', 'block');
  $('#SecondPartyType-index').addClass('active');
</script>
@stop
