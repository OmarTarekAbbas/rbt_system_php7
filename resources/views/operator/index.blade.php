@extends('template')
@section('page_title')
Operators
@stop
@section('content')
<div class="modal fade" id="SenderModel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form method='POST' action="{{url('operator')}}" class="form-horizontal">
        {{ csrf_field() }}
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Add Operator</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label class="col-sm-3 col-lg-2 control-label">Country</label>
            <div class="col-sm-9 col-lg-10 controls">
              <select name='country_id' class='form-control' required>
                @foreach($countries as $key => $value)
                <option value="{{$key}}">{{$value}}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-3 col-lg-2 control-label">Title</label>
            <div class="col-sm-9 col-lg-10 controls">
              <input type="text" placeholder="Title" name="title" class="form-control" required />
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary borderRadius">Save</button>
        </div>
      </form>
    </div>


  </div>
</div>

<div class="modal fade" id="editoperator" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form method='POST' action="{{url('operator/update')}}" class="form-horizontal">
        {{ csrf_field() }}
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Update Operator</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label class="col-sm-3 col-lg-2 control-label">Country</label>
            <div class="col-sm-9 col-lg-10 controls">
              <select name='country_id' class='form-control' id="country_id" required>
                @foreach($countries as $key => $value)
                <option value="{{$key}}">{{$value}}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-3 col-lg-2 control-label">Title</label>
            <div class="col-sm-9 col-lg-10 controls">
              <input type="text" placeholder="Title" id="edit-operator" name="title" class="form-control" />
              <input type="hidden" name="operator_id" id="operator_id">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary borderRadius">Save</button>
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
<div id="main-content">
  <div class="row">
    <div class="col-md-12 noPaddingPhone">
      <div class="box">
        <div class="box-title">
          <h3><i class="fa fa-code-fork"></i>Operators</h3>
          <div class="box-tool">
            <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
            <a data-action="close" href="#"><i class="fa fa-times"></i></a>
          </div>
        </div>
        <div class="box-content">
        @if(get_action_icons('operator','get'))
          <div class="btn-toolbar pull-right clearfix">
            <div class="btn-group">
              <a class="btn btn-circle show-tooltip" title="Add" href="#" data-toggle="modal" data-target="#SenderModel"><i class="fa fa-plus"></i></a>
            </div>
          </div>
          @endif
          <br /><br />
          <div class="clearfix"></div>

          <div class="table-responsive" style="border:0">
            <table class="table table-advance" id="table1">
              <thead>
                <tr>
                  <th style="width:18px"><input type="checkbox" /></th>
                  <th>title</th>
                  <th>country</th>
                  @if(Auth::user()->hasAnyRole(['super_admin','admin', 'ceo']))
                  <th>actions</th>
                  @endif
                </tr>
              </thead>
              <tbody>
                @foreach($operators as $operator)
                <tr class="table-flag-blue">
                  <td><input type="checkbox" /></td>
                  <td>{!!$operator->title!!}</td>
                  <td>{!!$operator->country->title!!}</td>
                  @if(Auth::user()->hasAnyRole(['super_admin','admin', 'ceo']))
                  <td>
                    @if(get_action_icons('operator/{operator}/edit','get'))
                    <a class="btn btn-sm show-tooltip teet" href="#"><i id="{{$operator->id}}_{{$operator->country->id}}" class="fa fa-edit"></i></a>
                    @endif
                    @if(get_action_icons('operator/{id}/delete','get'))
                    <a class="btn btn-sm btn-danger show-tooltip" title="" onclick="return confirm('Are you sure you want to delete {{ $operator->title }} ?')" href="{{url('/operator/'.$operator->id.'/delete')}}" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
                    @endif
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
</div>
<!-- END Main Content -->
@endsection
@section('script')
<script>
  // $('#audience').addClass('active');
  function ConfirmDelete() {
    var x = confirm("Are you sure you want to delete?");
    if (x)
      return true;
    else
      return false;
  }
</script>
<script>
  $('#operator').addClass('active');
  $('#operator-index').addClass('active');
  $('.teet').click(function() {
    /* Act on the event */
    var name = $(this).closest('td').prev('td').prev('td').text();
    var id = $(this).children().attr('id');
    var values = id.split('_');
    $('#edit-operator').val(name);
    $('#operator_id').val(values[0]);
    $('#country_id').val(values[1]);

    $('#editoperator').modal('toggle');
  });
</script>
@endsection
