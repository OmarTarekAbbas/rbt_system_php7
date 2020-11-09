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
          <button id="add" class="btn btn-info">Add item</button>

          <div class="box-tool">
            <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
            <a data-action="close" href="#"><i class="fa fa-times"></i></a>
          </div>
        </div>
        <div id="ContractTemplateItems" class="container box-content" style="border: 2px dashed black; margin: 20px 0px">

          @forelse ($ContractTemplateItems as $item)
          <div class="container noPaddingPhone text-right">
            <div class="container-fluid noPaddingPhone" style="padding: 20px">
              <a data-id="{{$item->id}}" onclick="removeItem({{$item->id}})" type="button" class="btn btn-danger btn-circle remove-item"><i class="fa fa-times" aria-hidden="true"></i></a>
              <a data-id="{{$item->id}}" onclick="showEditModal({{$item->id}})" type="button" class="btn btn-success btn-circle edit-item"><i class="fa fa-pencil" aria-hidden="true"></i></a>
              <div id="{{$item->id}}">
                {!! $item->item !!}
              </div>
            </div>
          </div>

          @empty
          <div class="form-group">
            <div class="col-sm-9 col-lg-10 controls">
              <h2 class="text-secondary"> No Terms Yet! </h2>
            </div>
          </div>
          @endforelse

        </div>
      </div>
    </div>
  </div>
</div>

<div id="add-modal" class="modal add-modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Term</h5>
      </div>
      <div class="modal-body">
        <div class="form-group" id="cktextarea">
          <div class=" controls">
            <textarea class="form-control ckeditor" name="add_advanced_text" rows="6"></textarea>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button id="add-item" type="button" class="btn btn-primary">Save changes</button>
        <button id="close-add-modal" type="button" class="btn btn-secondary" data-dismiss="add-modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div id="edit-modal" class="modal edit-modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">edit Term</h5>
      </div>
      <div class="modal-body">
        <div class="form-group" id="add-cktextarea">
          <div class=" controls">
            <textarea class="form-control ckeditor" name="edit_advanced_text" rows="6"></textarea>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button id="edit-item" onclick="editItem($(this).data('id'))" type="button" class="btn btn-primary">Save changes</button>
        <button id="close-edit-modal" type="button" class="btn btn-secondary" data-dismiss="edit-modal">Close</button>
      </div>
    </div>
  </div>
</div>

@stop
@section('script')
<script>
  $('#contract').addClass('active');
  $('#ContractTemplate-index').addClass('active');
</script>
{{-- show and hide modal --}}
<script>
  $('#add').click(function () {
    $('#add-modal').show();
  })
  $('#close-add-modal').click(function (e) {
    $('#add-modal').hide();
  });
  $('#close-edit-modal').click(function (e) {
    $('#edit-modal').hide();
  });
  function showEditModal (id) {
    $('#edit-modal').show();
    var id = id;
    $('#edit-item').data('id', id);
    var item = $(`#${id}`).html();
    CKEDITOR.instances.edit_advanced_text.setData(item);
  }
</script>
{{-- store terms --}}
<script>
  $('#add-item').click(function () {
    var id = '{{$ContractTemplate->id}}';
    var item = CKEDITOR.instances.add_advanced_text.getData();
    $.ajax({
      type: "post",
      url: `{{url('ContractTemplate/${id}/storeItem')}}`,
      data: {
        item: item
      },
      success: function (response) {
        if(response['response'] == 'success'){
          $('#add-modal').hide();
          CKEDITOR.instances.add_advanced_text.setData('');
          $('#ContractTemplateItems').append(`<div class="form-group">
            <div class="col-sm-9 col-lg-10 controls">
              <a data-id="${response['item_id']}" onclick="removeItem(${response['item_id']})" type="button" class="btn btn-danger btn-circle remove-item"><i class="fa fa-times" aria-hidden="true"></i></a>
              <a data-id="${response['item_id']}" onclick="showEditModal(${response['item_id']})" type="button" class="btn btn-success btn-circle edit-item"><i class="fa fa-pencil" aria-hidden="true"></i></a>
              <div id="${response['item_id']}">
              ${item}
              </div>
            </div>
            <hr style="width: 100%; color: black; height: 1px; background-color:black;  border-style: dashed none;" />
          </div>`);
        }
      }
    });
  });
  function removeItem(id) {
    var id = id;
    var item = $(`#${id}`).parent().parent();
    $.ajax({
      type: "post",
      url: `{{url('ContractTemplate/${id}/removeItem')}}`,
      success: function (response) {
        if(response == 'success'){
          item.remove();
        }
      }
    });
  }
  function editItem(id) {
    var id = id;
    var item = $(`#${id}`);
    var itemValue = CKEDITOR.instances.edit_advanced_text.getData();
    $.ajax({
      type: "post",
      url: `{{url('ContractTemplate/${id}/editItem')}}`,
      data: {
        item: itemValue
      },
      success: function (response) {
        if(response == 'success'){
          $('#edit-modal').hide();
          item.html(itemValue);
        }
      }
    });
  }
</script>
@stop
