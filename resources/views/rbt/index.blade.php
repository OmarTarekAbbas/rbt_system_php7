@extends('template')
@section('page_title')
    RBTs
@stop
@section('content')


    <div class="row">
        <div class="col-md-12">
            <div class="box box-blue">
                <div class="box-title">
                    <h3><i class="fa fa-table"></i> RBT Table</h3>
                    <div class="box-tool">
                        <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
                        <a data-action="close" href="#"><i class="fa fa-times"></i></a>
                    </div>
                </div>
                <div class="box-content">
                    <div class="btn-group">
                      @if(Auth::user()->hasRole(['super_admin','admin']))
                        <a class="btn btn-circle btn-success show-tooltip" href="{{url('rbt/create')}}" title="Create New Rbt" href="#"><i class="fa fa-plus"></i></a>
                        <a  id="delete_button" onclick="delete_selected('rbts')" class="btn btn-circle btn-danger show-tooltip" title="Delete Many" href="#"><i class="fa fa-trash-o"></i></a>
                      @endif
                    </div><br><br>
                    <div class="table-responsive" style="border:0">
                        <table class="table table-advance"  id="example" >
                            <thead>
                            <tr>
                                <th style="width:18px"><input type="checkbox" /></th>
                                <th>id</th>
                                <th>Type</th>
                                <th>Title</th>
                                <th>Code</th>
                                <th>Artist</th>
                                <th>Track File</th>
                                <th>Operator Title</th>
                                <th>Occasion Title</th>
                                <th>Master Content Title</th>
                                <th>Provider</th>
                                @if(Auth::user()->hasRole(['super_admin','admin']))
                                <th>Aggregator Title</th>
                                <th class="visible-md visible-lg" style="width:130px">Action</th>
                                @endif
                            </tr>
                            </thead>
                            <tbody>
                            <?php $x = 0; ?>
                            @foreach($rbts as $rbt)
                                <tr>
                                    <td><input type="checkbox" name="selected_rows[]" value="{{$rbt->id}}" onclick="collect_selected(this)"></td>

                                    <td>{{  $rbt->id  }}</td>
                                    <td>{{ ($rbt->type)?'NEW':'OLD' }}</td>
                                    <td>{{$rbt->track_title_en}}</td>
                                    <td>{{$rbt->code}}</td>

                                    <td>{!!($rbt->provider->title) ? $rbt->provider->title : '--'!!}</td>
                                    @if($rbt->track_file)
                                        <td>
                                            <audio  class="rbt_audios" controls >
                                              <source src="{{url($rbt->track_file)}}" >
                                            </audio>
                                        </td>
                                    @else
                                        <td>--</td>
                                    @endif
                                    <td>{!!$rbt->operator->title!!}</td>
                                    @if($rbt->occasion_id)
                                        <td>{!!$rbt->occasion->title!!}</td>
                                    @else
                                        <td>--</td>
                                    @endif

                                    @if($rbt->content_id)
                                        <td>{!!$rbt->content->content_title!!}</td>
                                    @else
                                        <td>--</td>
                                    @endif

                                    @if($rbt->owner)
                                        <td>{!!$rbt->owner!!}</td>
                                    @else
                                        <td>--</td>
                                    @endif


                                    @if(Auth::user()->hasRole(['super_admin','admin']))
                                      @if($rbt->aggregator_id)
                                          <td>{!!$rbt->aggregator->title!!}</td>
                                      @else
                                          <td>--</td>
                                      @endif
                                      <td class="visible-md visible-lg">
                                          <div class="btn-group">
                                              <a class="btn btn-sm show-tooltip" title="" href="{{url('rbt/'.$rbt->id.'/edit')}}" data-original-title="Edit"><i class="fa fa-edit"></i></a>
                                              <a class="btn btn-sm btn-danger show-tooltip" title="" onclick="return confirm('Are you sure you want to delete this ?');" href="{{url('rbt/'.$rbt->id.'/delete')}}" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
                                          </div>
                                      </td>
                                    @endif
                                </tr>
                                <?php $x++; ?>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


@stop

@section('script')
    <script>
        $('#rbt').addClass('active');
        $('#rbt-index').addClass('active');
    </script>

@stop
