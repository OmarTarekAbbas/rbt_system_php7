@extends('template')
@section('page_title') Contract Ceo Approve @stop
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-title">
                <h3><i class="fa fa-bars"></i>Approve Contract</h3>
                <div class="box-tool">
                    <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
                    <a data-action="close" href="#"><i class="fa fa-times"></i></a>
                </div>
            </div>
            <div class="box-content">
                <form action='{{ url("ceo/$contract->id/approve") }}' method="POST">
                    @csrf
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="hidden" name="ceo_approve" id="ceo_approve">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="col-md-6">
                                    <button onclick="document.getElementById('ceo_approve').value = 2" type="submit" class="btn btn-success">Approve</button>
                                </div>
                                <div class="col-md-6">
                                    <button onclick="document.getElementById('ceo_approve').value = 1" type="submit" class="btn btn-danger">Not Approve</button>
                                </div>
                            </div>
                        </div>
                        {!! $items !!}
                </form>
                </div>
            </div>
    </div>
</div>
@stop
@section('script')
<script>
  $(document).on('ready',function(){
    $('#first_party_signature').html('<img width="60px" height="60px" src="{{ url(optional($contract->first_parties)->first_party_signature?? "uploads/default.png") }}" class="img-circle">')
    $('#second_party_signature').html('<img width="60px" height="60px" src="{{ url('uploads/docs/signature/'.optional($contract->second_parties)->second_party_signature?? "uploads/default.png") }}" class="img-circle">')
    $('#first_party_seal').html('<img width="60px" height="60px" src="{{ url(optional($contract->first_parties)->first_party_seal?? "uploads/default.png") }}" class="img-circle">')
    $('#second_party_seal').html('<img width="60px" height="60px" src="{{ url('uploads/docs/signature/'.optional($contract->second_parties)->second_party_seal?? "uploads/default.png") }}" class="img-circle">')
    $('.container-fluid div').each(function() {
      $('#input' + $(this).attr('id')).val($(this).html())
      console.log($('#input' + $(this).attr('id')).val());
    })
  })
</script>
@stop
