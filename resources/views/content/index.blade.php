@extends('template')
@section('page_title')
    Contents
@stop
@section('content')


    <div class="row">
        <div class="col-md-12">
            <div class="box box-blue">
                <div class="box-title">
                    <h3><i class="fa fa-table"></i> Content Table</h3>
                    <div class="box-tool">
                        <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
                        <a data-action="close" href="#"><i class="fa fa-times"></i></a>
                    </div>
                </div>
                <div class="box-content">
                    <div class="btn-group">
                      @if(Auth::user()->hasRole(['super_admin','admin']))
                        <a class="btn btn-circle btn-success show-tooltip" href="{{url('content/create')}}" title="Create New content" href="#"><i class="fa fa-plus"></i></a>
                        <a  id="delete_button" onclick="delete_selected('contents')" class="btn btn-circle btn-danger show-tooltip" title="Delete Many" href="#"><i class="fa fa-trash-o"></i></a>
                      @endif
                    </div><br><br>
                    <div class="table-responsive" style="border:0">
                        <table class="table table-advance"  id="example" >
                            <thead>
                            <tr>
                                <th style="width:18px"><input type="checkbox" /></th>
                                <th>id</th>
                                <th>Content Title</th>
                                <th>Content Type</th>
                                <th>Internal Coding</th>
                                <th>content File</th>
                                <th>Occasion Title</th>
                                <th>Provider</th>
                                <th class="visible-md visible-lg" style="width:130px">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $x = 0; ?>
                            @foreach($contents as $content)
                                <tr>
                                    <td><input type="checkbox" name="selected_rows[]" value="{{$content->id}}" onclick="collect_selected(this)"></td>
                                    <td>{{  $content->id  }}</td>
                                    <td>{{ $content->content_title }}</td>
                                    <td>{{$content->content_type}}</td>
                                    <td>{{$content->internal_coding}}</td>
                                    @if($content->path)
                                        @if(!strcmp($content->content_type,'image'))
                                        <td>
                                           <img src="{{$content->path}}" alt="{{ $content->content_title }}" width="100%">
                                        </td>
                                        @elseif(!strcmp($content->content_type,'video'))
                                        <td>
                                            <video  class="content_audios" controls width="100%">
                                                <source src="{{$content->path}}" >
                                            </audio>
                                        </td>
                                        @else
                                        <td>
                                            <audio  class="content_audios" controls width="100%">
                                              <source src="{{$content->path}}" >
                                            </audio>
                                        </td>
                                        @endif
                                    @else
                                        <td>--</td>
                                    @endif
                                    @if($content->occasion)
                                    <td>{!!$content->occasion->title!!}</td>
                                    @else
                                        <td>--</td>
                                    @endif
                                    @if($content->provider)
                                        <td>{!!$content->provider->title!!}</td>
                                    @else
                                        <td>--</td>
                                    @endif
                                      <td class="visible-md visible-lg">
                                          <div class="btn-group">
                                                <a class="btn btn-sm btn-success show-tooltip" title="" href="{{url('rbt/excel?content_id='.$content->id)}}" data-original-title="Add Rbt"><i class="fa fa-plus"></i></a>
                                              <a class="btn btn-sm show-tooltip" title="" href="{{url('content/'.$content->id.'/edit')}}" data-original-title="Edit"><i class="fa fa-edit"></i></a>
                                              <a class="btn btn-sm btn-danger show-tooltip" title="" onclick="return confirm('Are you sure you want to delete this ?');" href="{{url('content/'.$content->id.'/delete')}}" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
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
        $('#content').addClass('active');
        $('#content-index').addClass('active');
    </script>

@stop
