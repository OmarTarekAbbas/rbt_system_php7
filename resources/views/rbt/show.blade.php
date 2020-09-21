@extends('template')
@section('page_title')
RBT
@stop
@section('content')
<div class="row">
  <div class="col-md-4">
    <a class="btn btn-circle btn-primary show-tooltip " href="{{url('/rbt')}}" title="List Rbt">
      <i class="fa fa-eye"></i>
    </a>
    List Rbt
  </div>

  <div class="col-md-4" style="text-align: center;">
    <a class="btn btn-circle show-tooltip " href="{{url('rbt/'.$rbt->rbt_id.'/edit')}}" title="Edit Rbt"><i class="fa fa-edit"></i></a>
    Edit Rbt
  </div>

  <div class="col-md-4" style="text-align: end;">
    <a class="btn btn-circle btn-success show-tooltip" href="{{url('rbt/create')}}" title="" data-original-title="Create New Rbt"><i class="fa fa-plus"></i></a>
    Create New Rbt
  </div>
  <br>
  <br>
</div>
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
          <table class="table table-striped table-bordered ">
            <tbody>
              <tr>
                <td width='30%' class='label-view text-right'>ID</td>
                <td>{{$rbt->rbt_id}} </td>
              </tr>

              <tr>
                <td width='30%' class='label-view text-right'>Internal Coding</td>
                <td>{{$rbt->rbt_internal_coding}} </td>
              </tr>

              <tr>
                <td width='30%' class='label-view text-right'>Track Title EN</td>
                <td>{{$rbt->track_title_en}} </td>
              </tr>

              <tr>
                <td width='30%' class='label-view text-right'>Track Title AR</td>
                @if($rbt->track_title_ar)
                <td>{{$rbt->track_title_ar}} </td>
                @else
                <td>---</td>
                @endif
              </tr>

              <tr>
                <td width='30%' class='label-view text-right'>Artist Name EN</td>
                @if($rbt->artist_name_en)
                <td>{{$rbt->artist_name_en}} </td>
                @else
                <td>---</td>
                @endif
              </tr>

              <tr>
                <td width='30%' class='label-view text-right'>Artist Name AR</td>
                @if($rbt->artist_name_ar)
                <td>{{$rbt->artist_name_ar}} </td>
                @else
                <td>---</td>
                @endif
              </tr>

              <tr>
                <td width='30%' class='label-view text-right'>Album Name</td>
                @if($rbt->album_name)
                <td>{{$rbt->album_name}} </td>
                @else
                <td>---</td>
                @endif
              </tr>

              <tr>
                <td width='30%' class='label-view text-right'>Code</td>
                <td>{{$rbt->code}} </td>
              </tr>

              <tr>
                <td width='30%' class='label-view text-right'>Audio</td>
                <td>
                  <audio class="content_audios" controls style="width: 75%;">
                    <source src="{{url($rbt->track_file)}}">
                  </audio>
                </td>
              </tr>

              <tr>
                <td width='30%' class='label-view text-right'>Operator</td>
                <td>{{$rbt->operator}} </td>
              </tr>

              <tr>
                <td width='30%' class='label-view text-right'>Occasion</td>
                <td> {{$rbt->occasion}}</td>
              </tr>

              <tr>
                <td width='30%' class='label-view text-right'>Aggregator</td>
                <td>{{$rbt->aggregator}}</td>
              </tr>

              <tr>
                <td width='30%' class='label-view text-right'>Content</td>
                <td>{{$rbt->content}}</td>
              </tr>

              <tr>
                <td width='30%' class='label-view text-right'>Content Code</td>
                @if($rbt->internal_coding)
                <td> <a href="{{ url('content/'.$rbt->content_id) }}"> {{$rbt->internal_coding}} </a></td>
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


@stop

@section('script')
<script>
  $('#rbt').addClass('active');
  $('#rbt-index').addClass('active');
</script>
@stop
