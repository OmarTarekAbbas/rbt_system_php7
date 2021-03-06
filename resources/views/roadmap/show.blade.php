@extends('template')
@section('page_title')
RBT
@stop
@section('content')

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
          <div class="table-responsive">
            <table class="table table-striped table-bordered ">
              <tbody>
                <tr>
                  <td width='30%' class='label-view text-left'>ID</td>
                  <td>{{$roadmap->id}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left'>Event Title</td>
                  <td>{{$roadmap->event_title}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left'>Event Color</td>
                  <td>
                    <div class='text-center borderRadius' style='width: 42%;height: 19px;font-size:12px;font-weight:bolder;background-color: {{$roadmap->event_color}};color: #fff;'>
                      Color</div>
                  </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left'>Occasion</td>
                  <td>{{$roadmap->occasion->title}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left'>Country</td>
                  <td>{{$roadmap->country->title}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left'>Operator</td>
                  <td>{{$roadmap->operator->title}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left'>aggregator</td>
                  <td>{{$roadmap->aggregator->title}} </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left'>event start date</td>
                  <td>
                    {{$roadmap->event_start_date->format('Y-m-d')}}
                  </td>
                </tr>

                <tr>
                  <td width='30%' class='label-view text-left'>event end date</td>
                  <td>{{$roadmap->event_end_date->format('Y-m-d')}} </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@if (in_array(Auth::user()->email, $emails) && $roadmap->notify)
<div class="alert alert-warning">
  Please Click <a class="text-danger" style="font-weight: bold" href="{{url('roadmaps/stop/' . $roadmap->id)}}" title="Stop"> Here</a> To Stop Send Notify E-Mail
</div>
@endif
@stop

@section('script')
<script>
  $('#rbt').addClass('active');
  $('#rbt-index').addClass('active');
</script>
@stop
