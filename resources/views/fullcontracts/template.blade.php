@forelse ($template_items as $item)
<div class="container p-3 text-right  class="container box-content" style="border: 2px dashed black;>
  <div class="container-fluid">
    <a data-id="{{$item->id}}" onclick="removeItem({{$item->id}})" type="button" class="btn btn-danger btn-circle remove-item"><i class="fa fa-times" aria-hidden="true"></i></a>
    <a data-id="{{$item->id}}" onclick="showEditModal({{$item->id}})" type="button" class="btn btn-success btn-circle edit-item"><i class="fa fa-pencil" aria-hidden="true"></i></a>
    <div id="{{$item->id}}">
      {!! $item->item !!}
    </div>
  </div>
</div>
@empty
<div class="">
  <div class="">
    <h2 class="text-secondary"> No Terms Yet! </h2>
  </div>
</div>
@endforelse
