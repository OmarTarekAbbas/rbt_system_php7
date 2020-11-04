@extends('template')
@section('page_title')
RBT
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
          <table class="table table-striped table-bordered ">
            <tbody>
              <tr>
                <td width='30%' class='label-view text-right'>ID</td>
                <td>{{$roadmap->id}} </td>
              </tr>

              <tr>
                <td width='30%' class='label-view text-right'>Event Title</td>
                <td>{{$roadmap->event_title}} </td>
              </tr>

              <tr>
                <td width='30%' class='label-view text-right'>Event Color</td>
                <td>
                  <div class='text-center'
                    style='width: 42%;height: 19px;font-size:12px;font-weight:bolder;background-color: {{$roadmap->event_color}};color: #fff;'>
                    Color</div>
                </td>
              </tr>

              <tr>
                <td width='30%' class='label-view text-right'>Occasion</td>
                <td>{{$roadmap->occasion->title}} </td>
              </tr>

              <tr>
                <td width='30%' class='label-view text-right'>Country</td>
                <td>{{$roadmap->country->title}} </td>
              </tr>

              <tr>
                <td width='30%' class='label-view text-right'>Operator</td>
                <td>{{$roadmap->operator->title}} </td>
              </tr>

              <tr>
                <td width='30%' class='label-view text-right'>aggregator</td>
                <td>{{$roadmap->aggregator->title}} </td>
              </tr>

              <tr>
                <td width='30%' class='label-view text-right'>event start date</td>
                <td>
                  {{$roadmap->event_start_date->format('Y-m-d')}}
                </td>
              </tr>

              <tr>
                <td width='30%' class='label-view text-right'>event end date</td>
                <td>{{$roadmap->event_end_date->format('Y-m-d')}} </td>
              </tr>
              @if (in_array(Auth::user()->email, $emails))

              <tr>
                <td width='30%' class='label-view text-right'>Action</td>
                <td class="visible-md visible-lg">
                  <div class="btn-group">
                    <a class="btn btn-sm show-tooltip btn-danger" onclick="" href="{{url('roadmap/stop/' . $roadmap->id)}}" title="Stop"><i class="fa fa-stop"> Stop Notify</i></a>
                  </div>
                </td>
              </tr>

              @endif

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
