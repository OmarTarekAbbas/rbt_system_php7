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
      </div>
      <div class="box-content">
        <div class="table-responsive" style="border:0">
          <table class="table table-advance data_rbt">
            <thead>
              <tr>
                <th style="width:18px"><input type="checkbox" /></th>
                <th>id</th>
                <th>Type</th>
                <th>Title</th>
                <th>Code</th>
                <th>Provider</th>
                <th>Track File</th>
                <th>Operator Title</th>
                <th>Occasion Title</th>
                <th>Master Content Title</th>
                <th>owner</th>
                @if(Auth::user()->hasRole(['super_admin','admin']))
                <th>Aggregator Title</th>
                <th class="visible-md visible-lg" style="width:130px">Action</th>
                @endif
              </tr>
            </thead>
            <tbody>
              @foreach ($rbts as $rbt)
              <tr>
                <td style="width:18px"><input type="checkbox" /></td>
                <td>{{$rbt->id}}</th>
                <td>{{$rbt->type ? 'NEW' : 'OLD'}}</td>
                <td>{{$rbt->track_title_en}}</td>
                <td>{{$rbt->code}}</td>
                <td>{{($rbt->provider) ? $rbt->provider->title : "--"}}</td>
                <td>{!!'<audio class="content_audios" controls>
                        <source src="'.url($rbt->track_file).'">
                    </audio>
                    '!!}</td>
                <td>{{$rbt->operator->title}}</td>
                <td>{{$rbt->occasion->title}}</td>
                <td>{{$rbt->content->content_title}}</td>
                <td>{{$rbt->owner}}</td>
                @if(Auth::user()->hasRole(['super_admin','admin']))
                <td>{{$rbt->aggregator->title}}</td>
                <td class="visible-md visible-lg" style="width:130px">Action</td>
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


@stop

@section('script')
<script>
  $('#rbt').addClass('active');
    $('#rbt-index').addClass('active');


    $(document).ajaxComplete(function() {
        $("audio").on("play", function() {
            $("audio").not(this).each(function(index, audio) {
                audio.pause();
            });
        });
    });
</script>

@stop