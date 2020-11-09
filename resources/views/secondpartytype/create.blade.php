@extends('template')
@section('page_title')
Second Party Types
@stop
@section('content')

<!-- BEGIN Content -->


<div id="main-content">
  @include('errors')
  <div class="row">
    <div class="col-md-12 noPaddingPhone">
      <div class="box">
        <div class="box-title">
          <h3><i class="fa fa-bars"></i>Second Party Types</h3>
          <div class="box-tool">
            <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
            <a data-action="close" href="#"><i class="fa fa-times"></i></a>
          </div>
        </div>
        <div class="box-content">


          <form action="{{url('SecondPartyType')}}" method="post" class="width_m_auto form-horizontal form-bordered form-row-stripped" enctype="multipart/form-data" novalidate>
            {!! csrf_field() !!}
            <input id="hidden_key" name="key" type="hidden" />

            <div class="form-group">
              <label for="textfield5" class="col-sm-3 col-lg-2 control-label">title *</label>
              <div class="col-sm-9 col-lg-10 controls">
                <input type="text" name="second_party_type_title" id="title" placeholder="Title" class="form-control" required>
              </div>
            </div>

            <div class="form-group">
              <label for="textfield5" class="col-sm-3 col-lg-2 control-label">Description *</label>
              <div class="col-sm-9 col-lg-10 controls">
                <input type="text" style="padding: 10px 10px 100px 10px" name="second_party_type_description" id="description" placeholder="Description" class="form-control" required>
              </div>
            </div>

            <div class="form-group last">
              <div class="col-sm-9 col-lg-12">
                <button type="submit" class="btn btn-primary mAuto_dBlock borderRadius"><i class="fa fa-check"></i> Save</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@stop
@section('script')
<script>
  $('#contract .submenu').first().css('display', 'block');
  $('#SecondPartyType .submenu').first().css('display', 'block');
  $('#SecondPartyType-create').addClass('active');
</script>
@stop
