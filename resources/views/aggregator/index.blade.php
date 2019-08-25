@extends('template')
@section('page_title')
    Aggregators
@stop
@section('content')
<div class="modal fade" id="SenderModel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form method = 'POST' action = "{{url('aggregator')}}" class="form-horizontal">
      {{ csrf_field() }}
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Aggregator</h4>
      </div>
      <div class="modal-body">

        <div class="form-group">
           <label class="col-sm-3 col-lg-2 control-label">Title</label>
           <div class="col-sm-9 col-lg-10 controls">
              <input type="text" placeholder="Title" name = "title" class="form-control" />
           </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
        </form>
    </div>


  </div>
</div>

<div class="modal fade" id="editaggregator" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form method = 'POST' action = "{{url('aggregator/update')}}" class="form-horizontal">
      {{ csrf_field() }}
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Update Aggregator</h4>
      </div>
      <div class="modal-body">

        <div class="form-group">
           <label class="col-sm-3 col-lg-2 control-label">Title</label>
           <div class="col-sm-9 col-lg-10 controls">
              <input type="text" placeholder="Title" id="edit-aggregator" name = "title" class="form-control" />
              <input type="hidden" name="aggregator_id" id="aggregator_id">
           </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
        </form>
    </div>
  </div>
</div>

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<!-- BEGIN Main Content -->
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-title">
                <h3><i class="fa fa-code-fork"></i>Aggregators</h3>
                <div class="box-tool">
                    <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
                    <a data-action="close" href="#"><i class="fa fa-times"></i></a>
                </div>
            </div>
            <div class="box-content">
                @if(Auth::user()->hasAnyRole(['super_admin','admin']))
                <div class="btn-toolbar pull-right clearfix">
                    <div class="btn-group">
                        <a class="btn btn-circle show-tooltip" title="Add" href="#" data-toggle="modal" data-target="#SenderModel"><i class="fa fa-plus"></i></a>
                    </div>
                </div>
                @endif
                <br/><br/>
                <div class="clearfix"></div>

                <div class="table-responsive" style="border:0">
                    <table class="table table-advance" id="table1">
                        <thead>
                            <tr>
                                <th style="width:18px"><input type="checkbox" /></th>
                                <th>Title</th>
                                @if(Auth::user()->hasAnyRole(['super_admin','admin']))
                                <th>Delete</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($aggregators as $aggregator)
                            <tr class="table-flag-blue">
                                <td><input type="checkbox" /></td>
                                <td>{!!$aggregator->title!!}</td>
                                @if(Auth::user()->hasAnyRole(['super_admin','admin']))
                               <td>
                                @if(!$aggregator->user)
                                <a class="btn btn-sm btn-success show-tooltip" title="Add Aggregator" href="{{url("users/new?aggregator_id=".$aggregator->id."&title=".$aggregator->title)}}" data-original-title="Add Operator"><i class="fa fa-plus"></i></a>
                                @endif
                                <a class="btn btn-sm show-tooltip modalToaggal teet" href="#" {{-- data-toggle="modal" data-target="#editgroup" --}}><i id="{{$aggregator->id}}" class="fa fa-edit"></i></a>
                                <a class="btn btn-sm btn-danger show-tooltip" title=""   onclick="return confirm('Are you sure you want to delete {{ $aggregator->title }} ?')"     href="{{url('/aggregator/'.$aggregator->id.'/delete')}}" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
                                </td>
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END Main Content -->
@endsection
@section('script')
        <script>
            // $('#audience').addClass('active');
            function ConfirmDelete()
            {
              var x = confirm("Are you sure you want to delete?");
              if (x)
                return true;
              else
                return false;
            }
        </script>
        <script>
            $('#aggregator').addClass('active');
            $('#aggregator-index').addClass('active');
            $('.teet').click(function() {
                // alert('msg');
                /* Act on the event */
                var name = $(this).closest('td').prev('td').text();
                var id = $(this).children().attr('id');
                // alert(name);
                // alert(id);
                // $('#edit-form-role').attr('action', '');
                $('#edit-aggregator').val(name);
                $('#aggregator_id').val(id);
                $('#editaggregator').modal('toggle');
            });
        </script>
@endsection
