@extends('template')
@section('page_title')
Content
@stop
@section('content')

<div class="row marginZero">
  <div class="col-md-4">
    <a class="btn btn-circle btn-primary show-tooltip " href="{{url('client/contents')}}" title="List Content">
      <i class="fa fa-eye"></i>
    </a>
    <a href="{{url('client/contents')}}" title="List Content">List Content</a>
  </div
  <br>
  <br>
</div>
<div id="main-content">
  <div class="row">
    <div class="col-md-12 noPaddingPhone">
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
                  <td width='30%' class='label-view text-left'>ID</td>
                  <td>{{$content->id}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left'>Internal Coding</td>
                  @if($content->internal_coding)
                  <td>{{ $content->internal_coding }} </td>
                  @else
                  <td>---</td>
                  @endif
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left'>Title</td>
                  <td> {{$content->content_title}}</td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left'>Content Type</td>
                  <td> {{$content->content_type}}</td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left'>start Date</td>
                  <td>{{ optional($content->start_date)->format('d-m-Y') }}</td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left'>Expire Date</td>
                  <td>{{ optional($content->expire_date)->format('d-m-Y') }}</td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left'>Audio</td>
                  <td>
                    <audio class="content_audios" controls style="width: 75%;">
                      <source src="{{url($content->path)}}">
                    </audio>
                  </td>
                </tr>

                @foreach($rbts as $rbt)
                <tr>
                  <td width='30%' class='label-view text-left'>{{$rbt->track_title_en}}</td>
                  <td>
                    <div class="row">
                      <div class="col-md-4">
                        <audio class="content_audios" controls controls style="width: 100%;">
                          <source src="{{url($rbt->track_file)}}">
                        </audio>
                      </div>
                      <div class="col-md-2">
                        <span style="font-weight: bold;">Internal Coding: </span> <a href="{{ url('client/rbt/'.$rbt->id) }}">{{$rbt->internal_coding}}</a>
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
                  <td width='30%' class='label-view text-left'>provider</td>
                  <td> {{optional($provider)->second_party_title}}</td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left'>Occasion</td>
                  <td>{{$occasion->title}}</td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left'>Contract</td>
                  @if($contract)
                  <td> <a href="{{ url('client/contracts/'.$contract->id) }}"> {{$contract->contract_code}}/{{$contract->contract_label}} </a></td>
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
  $('#client').addClass('active');
  $('#contents').addClass('active');
</script>
@stop
