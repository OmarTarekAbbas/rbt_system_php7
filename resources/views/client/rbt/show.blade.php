@extends('template')
@section('page_title')
RBT
@stop
@section('content')

<div class="row marginZero">
  <div class="col-md-4">
    <a class="btn btn-circle btn-primary show-tooltip " href="{{url('client/rbt')}}" title="List Rbt">
      <i class="fa fa-eye"></i>
    </a>
    <a href="{{url('client/rbt')}}" title="List Rbt">
      List Rbt
    </a>
  </div>
  <br>
  <br>
</div>
<div id="main-content">
  <div class="row">
    <div class="col-md-12 noPaddingPhone">
      <div class="box box-blue">
        <div class="box-title">
          <h3><i class="fa fa-table"></i> RBT Table</h3>
          <div class="box-tool">
            <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
            <a data-action="close" href="#"><i class="fa fa-times"></i></a>
          </div>
        </div>
        <div class="box-content">
          <div class="table-responsive width_m_auto">
            <table class="table table-striped table-bordered ">
              <tbody>
                <tr>
                  <td width='30%' class='label-view text-left'>ID</td>
                  <td>{{$rbt->rbt_id}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left'>Internal Coding</td>
                  <td>{{$rbt->rbt_internal_coding}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left'>Track Title EN</td>
                  <td>{{$rbt->track_title_en}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left'>Track Title AR</td>
                  @if($rbt->track_title_ar)
                  <td>{{$rbt->track_title_ar}} </td>
                  @else
                  <td>---</td>
                  @endif
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left'>Artist Name EN</td>
                  @if($rbt->artist_name_en)
                  <td>{{$rbt->artist_name_en}} </td>
                  @else
                  <td>---</td>
                  @endif
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left'>Artist Name AR</td>
                  @if($rbt->artist_name_ar)
                  <td>{{$rbt->artist_name_ar}} </td>
                  @else
                  <td>---</td>
                  @endif
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left'>Album Name</td>
                  @if($rbt->album_name)
                  <td>{{$rbt->album_name}} </td>
                  @else
                  <td>---</td>
                  @endif
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left'>Code</td>
                  <td>{{$rbt->code}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left'>Audio</td>
                  <td>
                    <audio class="content_audios" controls style="width: 75%;">
                      <source src="{{url($rbt->track_file)}}">
                    </audio>
                  </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left'>Operator</td>
                  <td>{{$rbt->operator}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left'>Occasion</td>
                  <td> {{$rbt->occasion}}</td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left'>Aggregator</td>
                  <td>{{$rbt->aggregator}}</td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left'>Content</td>
                  <td>{{$rbt->content}}</td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left'>start Date</td>
                  <td>{{ optional($rbt->start_date)->format('d-m-Y') }}</td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left'>Expire Date</td>
                  <td>{{ optional($rbt->expire_date)->format('d-m-Y') }}</td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left'>Content Code</td>
                  @if($rbt->internal_coding)
                  <td> <a href="{{ url('client/contents/'.$rbt->content_id) }}"> {{$rbt->internal_coding}} </a></td>
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
  $('#rbts').addClass('active');
</script>
@stop
