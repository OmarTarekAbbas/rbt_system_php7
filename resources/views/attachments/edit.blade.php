@extends('template')
@section('page_title')
Second Party Types
@stop
@section('content')

<!-- BEGIN Content -->
<div id="main-content">
    @include('errors')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-title">
                    <h3><i class="fa fa-bars"></i>Second Party Types</h3>
                    <div class="box-tool">
                        <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
                        <a data-action="close" href="#"><i class="fa fa-times"></i></a>
                    </div>
                </div>
                <div class="box-content">

                    <form action="{{url("attachment/$Attachment->id")}}" method="post" class="form-horizontal form-bordered form-row-stripped" enctype="multipart/form-data" novalidate>
                      @method('PATCH')
                      @csrf
                        <input id="hidden_key" name="key" type="hidden" />

                        <div class="form-group">
                            <label for="contract_id" class="col-xs-3 col-lg-2 control-label">Type</label>
                            <div class="col-sm-9 col-lg-10 controls">
                                {!! Form::select('contract_id', $contracts, $Attachment->contract->id, ['class'=>'form-control chosen-rtl' , 'id' => 'contract_id' ,'required' => true,'style'=>'height: 48px;'])!!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="attachment_type" class="col-xs-3 col-lg-2 control-label">Attachment Type</label>
                            <div class="col-sm-9 col-lg-10 controls">
                                {!! Form::radio('attachment_type', 1, $Attachment->attachment_type == 'Annex' ? true : false) !!} Annex
                                {!! Form::radio('attachment_type', 2, $Attachment->attachment_type == 'Authorization' ? true : false) !!} Authorization
                                {!! Form::radio('attachment_type', 3, $Attachment->attachment_type == 'Copyright' ? true : false) !!} Copyright
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="attachment_title" class="col-sm-3 col-lg-2 control-label">title *</label>
                            <div class="col-sm-9 col-lg-10 controls">
                                <input type="text" name="attachment_title" id="attachment_title" placeholder="Title" value="{{$Attachment->attachment_title}}" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="attachment_status" class="col-xs-3 col-lg-2 control-label">Attachment Status</label>
                            <div class="col-sm-9 col-lg-10 controls">
                                {!! Form::radio('attachment_status', 1, $Attachment->attachment_status == 'Active' ? true : false) !!} Active
                                {!! Form::radio('attachment_status', 0, $Attachment->attachment_status == 'Expired' ? true : false) !!} Expired
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="attachment_date" class="col-xs-3 col-lg-2 control-label">Attachment Date</label>
                            <div class="input-group date date-picker col-sm-9 col-lg-10 controls"
                                data-date-format="yyyy-mm-dd">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                <input type="text" name="attachment_date" id="attachment_date" autocomplete="off" value="{{$Attachment->attachment_date}}"
                                    placeholder="first party joining date" data-date-format="yyyy-mm-dd"
                                    class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="attachment_expiry_date" class="col-xs-3 col-lg-2 control-label">Attachment
                                Expiry Date</label>
                            <div class="input-group date date-picker col-sm-9 col-lg-10 controls"
                                data-date-format="yyyy-mm-dd">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                <input type="text" name="attachment_expiry_date" id="attachment_expiry_date" value="{{$Attachment->attachment_expiry_date}}"
                                    autocomplete="off" placeholder="first party joining date"
                                    data-date-format="yyyy-mm-dd" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="attachment_pdf" class="col-xs-3 col-lg-2 control-label"> Attachment Pdf </label>
                            <div class="col-sm-9 col-lg-10 controls">
                                <input type="file" name="attachment_pdf" id="attachment_pdf"
                                    placeholder="Second Party Title" class="form-control">
                                    <a target="_blank" href="{{url($Attachment->attachment_pdf)}}">Preview</a>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="notes" class="col-sm-3 col-lg-2 control-label">Notes</label>
                            <div class="col-sm-9 col-lg-10 controls">
                                <input type="text" style="padding: 10px 10px 100px 10px" name="notes" id="notes" value="{{$Attachment->notes}}"
                                    placeholder="Notes" class="form-control">
                            </div>
                        </div>

                        <div class="form-group last">
                            <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Save</button>
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
    $('#ServiceTypes').addClass('active');
        $('#ServiceTypes-create').addClass('active');
</script>
@stop
