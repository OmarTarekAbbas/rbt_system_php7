@forelse ($template_items as $item)
<div class="container">
  <div class="container">
    <a data-id="{{$item->id}}" onclick="removeItem({{$item->id}})" type="button" class="btn btn-danger btn-circle remove-item"><i class="fa fa-times" aria-hidden="true"></i></a>
    <a data-id="{{$item->id}}" onclick="showEditModal({{$item->id}})" type="button" class="btn btn-success btn-circle edit-item"><i class="fa fa-pencil" aria-hidden="true"></i></a>
    <div id="{{$item->id}}">
      {!! $item->item !!}
    </div>
    <input type="hidden" name="items[]" value="{!! $item->item !!}">
  </div>
</div>
@empty
<div class="">
  <div class="">
    <h2 class="text-secondary"> No Terms Yet! </h2>
  </div>
</div>
@endforelse
