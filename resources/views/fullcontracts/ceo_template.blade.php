
@forelse ($template_items as $key=>$item)
<div class="container p-3 m-3 text-right container box-content">
    <div class="container-fluid">
        <div id="{{$item->id}}">
            {!! $item->item !!}
        </div>
        <textarea name="items[]" id="input{{$item->id}}" hidden>
          {!! $item->item !!}
        </textarea>
    </div>
</div>
@empty
<div class="">
    <div class="">
        <h2 class="text-secondary"> No Terms Yet! </h2>
    </div>
</div>
@endforelse
