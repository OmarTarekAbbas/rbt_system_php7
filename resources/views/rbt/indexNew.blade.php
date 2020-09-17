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

                    <div class="table-responsive">
                        <table id="example" class="table table-striped dt-responsive" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th style="width:18px"><input type="checkbox"></th>
                                <th>id</th>
                                <th>Provider Name English</th>
                                <th>Provider Name Arabic</th>
                                <th>Rbt Name English</th>
                                <th>Rbt Name Arabic</th>
                                <th>Album</th>
                                <th>Content Owner</th>
                                <th>Code</th>
                                <th>Track File</th>
                                <th>Operator Title</th>
                                <th>Occasion Title</th>
                                <th>Aggregator Title</th>
                                <th class="visible-md visible-lg" style="width:130px">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $x = 0; ?>
                            @foreach($rbts as $rbt)
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td>{{  $rbt->id  }}</td>
                                    <td>{{$rbt->artist_name_en}}</td>
                                    <td>{{$rbt->artist_name_ar}}</td>
                                    <td>{{$rbt->track_title_en}}</td>
                                    <td>{{$rbt->track_title_ar}}</td>
                                    <td>{{$rbt->album_name}}</td>
                                    <td>{{$rbt->provider->title}}</td>
                                    <td>{{$rbt->code}}</td>
                                    {{-- <td>{!!($rbt->track_file) ? $rbt->track_file : '--'!!}</td> --}}
                                    @if($rbt->track_file)
                                        <td>
                                            <audio  class="rbt_audios"  id="myAudio{{$rbt->id}}" controls   onplay="playPause('{{$x}}')"   >
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

                                    @if($rbt->aggregator_id)
                                        <td>{!!$rbt->aggregator->title!!}</td>
                                    @else
                                        <td>--</td>
                                    @endif
                                    <td class="visible-md visible-lg">
                                        <div class="btn-group">
                                            <a class="btn btn-sm show-tooltip" title="" href="{{url('rbt/'.$rbt->id.'/editNew')}}" data-original-title="Edit"><i class="fa fa-edit"></i></a>
                                            <a class="btn btn-sm btn-danger show-tooltip" title="" onclick="return confirm('Are you sure you want to delete this ?');" href="{{url('rbt/'.$rbt->id.'/delete')}}" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
                                        </div>
                                    </td>
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
        $('#rbt-index-new').addClass('active');
    </script>



    <script>
        function playPause(id) {
            var videos = document.getElementsByClassName("rbt_audios");
            // console.log(videos);
            for (i = 0; i < videos.length; i++) {
                if (id != i) {
                    videos[i].pause();
                }
            }
        }

    </script>

@stop
