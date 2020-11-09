@extends('template')
@section('page_title')
Content
@stop
@section('content')
<div id="main-content">
  <div class="row">
    <div class="col-md-4">
      <a class="btn btn-circle btn-primary show-tooltip " href="{{url('/content')}}" title="List Content">
        <i class="fa fa-eye"></i>
      </a>
      <a href="{{url('/content')}}" title="List Content">List Content</a>
    </div>

    @if(get_action_icons('content/{id}/edit','get'))
  <div class="col-md-4" style="text-align: center;">
    <a class="btn btn-circle show-tooltip " href="{{url('content/'.$content->id.'/edit')}}" title="Edit Content"><i class="fa fa-edit"></i></a>
    <a  href="{{url('content/'.$content->id.'/edit')}}" title="Edit Content">Edit Content</a>
  </div>
  @endif
  @if(get_action_icons('content/create','get'))
  <div class="col-md-4" style="text-align: end;">
    <a class="btn btn-circle btn-success show-tooltip" href="{{url('content/create')}}" title="" data-original-title="Create New Content"><i class="fa fa-plus"></i></a>
    <a href="{{url('content/create')}}" title="" data-original-title="Create New Content">Create New Content</a>
  </div>
  @endif
    <br>
    <br>
  </div>
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
          <div class="table-responsive">
            <table class="table table-striped table-bordered ">
              <tbody>
                <tr>
                  <td width='30%' class='label-view text-right'>ID</td>
                  <td>{{$content->id}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-right'>Internal Coding</td>
                  @if($content->internal_coding)
                  <td>{{ $content->internal_coding }} </td>
                  @else
                  <td>---</td>
                  @endif
                </tr>

                <tr>
                  <td width='30%' class='label-view text-right'>Title</td>
                  <td> {{$content->content_title}}</td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-right'>Content Type</td>
                  <td> {{$content->content_type}}</td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-right'>start Date</td>
                  <td>{{ optional($content->start_date)->format('d-m-Y') }}</td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-right'>Expire Date</td>
                  <td>{{ optional($content->expire_date)->format('d-m-Y') }}</td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-right'>Audio</td>
                  <td>
                    <audio class="content_audios" controls style="width: 75%;">
                      <source src="{{url($content->path)}}">
                    </audio>
                  </td>
                </tr>

                @foreach($rbts as $rbt)
                <tr>
                  <td width='30%' class='label-view text-right'>{{$rbt->track_title_en}}</td>
                  <td>
                    <div class="row">
                      <div class="col-md-4">
                        <audio class="content_audios" controls controls style="width: 100%;">
                          <source src="{{url($rbt->track_file)}}">
                        </audio>
                      </div>
                      <div class="col-md-2">
                        <span style="font-weight: bold;">Internal Coding: </span> <a href="{{ url('rbt/'.$rbt->id) }}">{{$rbt->internal_coding}}</a>
                      </div>
                      <div class="col-md-2">
                        <span style="font-weight: bold;">Code: </span>
                        <p>{{$rbt->code}}</p>
                      </div>

                      <div class="col-md-2">
                        <span style="font-weight: bold;">Occasion: </span>
                        <p>{{$occasionRbt->title}}</p>
                      </div>

                      <div class="col-md-2">
                        <span style="font-weight: bold;">Aggregator: </span>
                        <p>{{$aggregator_id->title}}</p>
                      </div>

                    </div>
                  </td>
                </tr>
                @endforeach
                <tr>
                  <td width='30%' class='label-view text-right'>provider</td>
                  <td> {{optional($provider)->title}}</td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-right'>Occasion</td>
                  <td>{{$occasion->title}}</td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-right'>Contract</td>
                  @if($contract)
                  <td> <a href="{{ url('fullcontracts/'.$contract->id) }}"> {{$contract->contract_code}}/{{$contract->contract_label}} </a></td>
                  @else
                  <td>---</td>
                  @endif
                </tr>

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
<script>
  $('#content').addClass('active');
  $('#content-index').addClass('active');
</script>
@stop
