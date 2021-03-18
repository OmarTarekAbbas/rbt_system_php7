@extends('template')
@section('page_title')
attachment
@stop
@section('content')
@include('errors')
<!-- BEGIN Content -->
<div id="main-content">
  <div class="row">
    <div class="col-md-12 noPaddingPhone">
      <div class="box box-black">
        <div class="box-title">
          <h3><i class="fa fa-table"></i> attachment Table</h3>
          <div class="box-tool">
            <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
            <a data-action="close" href="#"><i class="fa fa-times"></i></a>
          </div>
        </div>
        <div class="box-content">
          @if(get_action_icons('attachment/create','get'))
          <div class="btn-toolbar pull-right">
            <div class="btn-group">
              <a class="btn btn-circle show-tooltip" title="" href="{{url('attachment/create')}}" data-original-title="Add new record"><i class="fa fa-plus"></i></a>
              <?php
              $table_name = "service_types";
              ?>
            </div>
          </div>
          @endif
          <br><br>
          <div class="table-responsive">
            <table id="" class="table table-striped dt-responsive data_attachment" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th style="width:18px"><input type="checkbox" onclick="select_all('Attachments')"></th>
                  <th>Id</th>
                  <th>attachment code</th>
                  <th>contract</th>
                  <th>attachment_type</th>
                  <th>attachment_title</th>
                  <th>attachment_date</th>
                  <th>attachment_expiry_date</th>
                  <th>contract_expiry_date</th>
                  <th>attachment_pdf</th>
                  <th>attachment_status</th>
                  <th>notes</th>
                  <th class="visible-xs visible-md visible-lg" style="width:130px">Action</th>
                </tr>
              </thead>

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
  $('#Attachment .submenu').first().css('display', 'block');
  $('#Attachment-index').addClass('active');

  $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
        }
    });
    $(document).ready(function() {
        $('.data_attachment').DataTable({
            "processing": true,
            "serverSide": true,
            "search": {
                "regex": true
            },
            ajax: "{!! url('attachment_all/attachment_expiry_date') !!}",
            columns: [{
                    data: "index",
                    searchable: false,
                    orderable: false
                },
                {
                    data: "id",
                    name: "id"
                },
                {
                    data: "attachment_code",
                    name: "attachment_code"
                },
                {
                    data: "contract",
                    name: "contract"
                },
                {
                    data: "attachment_type",
                    name: "attachment_type"
                },
                {
                    data: "attachment_title",
                    name: "attachment_title"
                },
                {
                    data: "attachment_date",
                    name: "attachment_date"
                },
                {
                    data: "attachment_expiry_date",
                    name: "attachment_expiry_date"
                },
                {
                    data: "contract_expiry_date",
                    name: "contract_expiry_date"
                },
                {
                    data: "attachment_status",
                    name: "attachment_status"
                },
                {
                    data: "notes",
                    name: "notes"
                },
                {
                    data: "action",
                    searchable: false
                }
            ],
            "pageLength": 10,
            stateSave: true

        });
    });
</script>
@stop
