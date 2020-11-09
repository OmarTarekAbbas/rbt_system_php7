@extends('template')
@section('page_title')
RoadMap
@stop
@section('content')
<link rel='stylesheet' href='{{url('assets/fullcalendar/theme/sunny.css')}}' />
<link href="{{url('assets/fullcalendar/fullcalendar/fullcalendar.css')}}" rel='stylesheet' />
<link href="{{url('assets/fullcalendar/fullcalendar/fullcalendar.print.css')}}" rel='stylesheet' media='print' />

<div id="main-content">
  <div class="row">
    <div class="col-md-12 noPaddingPhone">
      <div class="box box-black">
        <div class="box-title">
          <h3><i class="fa fa-table"></i> RoadMap Calendar</h3>
          <div class="box-tool">
            <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
            <a data-action="close" href="#"><i class="fa fa-times"></i></a>
          </div>
        </div>
        <div class="box-content">
          {!! $calendar->calendar() !!}

        </div>
      </div>
    </div>
  </div>
</div>

@stop

@section('script')
<script>
  $('#roadmap').addClass('active');
  $('#roadmap-calendar').addClass('active');
</script>
<script src="{{url('assets/fullcalendar/lib/jquery.min.js')}}"></script>
<script src="{{url('assets/fullcalendar/lib/jquery-ui.custom.min.js')}}"></script>
<script src="{{url('assets/fullcalendar/fullcalendar/fullcalendar.min.js')}}"></script>
{!! $calendar->script() !!}
@stop
