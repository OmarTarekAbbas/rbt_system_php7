@extends('template')
@section('page_title')
    Providers
@stop
@section('content')
<div class="modal fade" id="SenderModel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form method = 'POST' action = "{{url('provider')}}" class="form-horizontal">
      {{ csrf_field() }}
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Provider</h4>
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

<div class="modal fade" id="editprovider" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form method = 'POST' action = "{{url('provider/update')}}" class="form-horizontal">
      {{ csrf_field() }}
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Update Provider</h4>
      </div>
      <div class="modal-body">

        <div class="form-group">
           <label class="col-sm-3 col-lg-2 control-label">Title</label>
           <div class="col-sm-9 col-lg-10 controls">
              <input type="text" placeholder="Title" id="edit-provider" name = "title" class="form-control" />
              <input type="hidden" name="provider_id" id="provider_id">
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
                <h3><i class="fa fa-code-fork"></i>Providers</h3>
                <div class="box-tool">
                    <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
                    <a data-action="close" href="#"><i class="fa fa-times"></i></a>
                </div>
            </div>
            <div class="box-content">
                @if(Auth::user()->hasAnyRole(['super_admin','admin', 'ceo']))
                <div class="btn-toolbar pull-right clearfix">
                    <div class="btn-group">
                        <a class="btn btn-circle show-tooltip" title="Add" href="#" data-toggle="modal" data-target="#SenderModel"><i class="fa fa-plus"></i></a>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="btn-toolbar pull-right clearfix" style="margin-top: 10px">
                    <div class="btn-group">
                        <input id="search" type="text" placeholder="Search" class="form-control input-sm" table_name="providers"/>
                    </div>
                </div>
                @endif
                <br/><br/>
                <div class="clearfix"></div>

                <div class="table-responsive" style="border:0">
                    <table class="table table-advance" id="">
                        <thead>
                            <tr>
                                <th style="width:18px"><input type="checkbox" /></th>
                                <th class="search">Title</th>
                                @if(Auth::user()->hasAnyRole(['super_admin','admin', 'ceo']))
                                <th>Delete</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($providers as $provider)
                            <tr class="table-flag-blue">
                                <td><input type="checkbox" /></td>
                                <td>{!!$provider->title!!}</td>
                                @if(Auth::user()->hasAnyRole(['super_admin','admin', 'ceo']))
                               <td>
                                <a class="btn btn-sm show-tooltip modalToaggal teet" href="#" ><i id="{{$provider->id}}" class="fa fa-edit"></i></a>
                                <a class="btn btn-sm btn-danger show-tooltip" title=""   onclick="return confirm('Are you sure you want to delete {{ $provider->title }} ?')"     href="{{url('/provider/'.$provider->id.'/delete')}}" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
                                </td>
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="pull-right" id="pageination">
                     {{ $providers->render() }}
                    </div>
                    <div class="pull-right" id="pageination1">

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
            $('#provider').addClass('active');
            $('#provider-index').addClass('active');
            $(document).on("click",'.teet',function() {
                // alert('msg');
                /* Act on the event */
                var name = $(this).closest('td').prev('td').text();
                var id = $(this).children().attr('id');
                // alert(name);
                // alert(id);
                // $('#edit-form-role').attr('action', '');
                $('#edit-provider').val(name);
                $('#provider_id').val(id);
                $('#editprovider').modal('toggle');
            });
        </script>
        <script>
            // do search
            $('#search').keyup(function () {
                var search_val=$(this).val();
                var table_name=$(this).attr('table_name');
                var columns=[];
                var c = document.getElementsByClassName('search');
                $.each(c,function(){
                    var v= $(this).html();
                        columns.push(v);
                    });
                $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
                $.ajax({
                    method: "get",
                    url: "<?=url('search')?>",
                    data: { search_key: search_val, table: table_name,columns:columns },
                    success:function(data){
                        $('tbody').html(data.data);
                        // reomove old links for pagination
                        $('#pageination').hide();
                        // add new links for search pagination
                        $('#pageination1').html(data.links);
                    }
                });
            })
            // handle the search pagination links on click
            $(document).ajaxComplete(function() {
                $('.pagination li a').click(function(e) {
                e.preventDefault();
                var url = $(this).attr('href');
                $.ajax({
                    url: url,
                    success: function(data) {
                        $('tbody').html(data.data);
                        $('#pageination').hide();
                        $('#pageination1').html(data.links);
                    }
                });
            });
            });

        </script>
@endsection
