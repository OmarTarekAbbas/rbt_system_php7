@if(isset($departments))
<button type="button" id="add"  class="btn btn-info">Add item</button>
@endif
@forelse ($template_items as $key=>$item)
<div class="container p-3 m-3 text-right container box-content">
    @if(isset($departments))
        <div class="form-group text-left">
          <label for="ipt" class="control-label "> Department </label>
          <select name='department_ids[{{ $key }}][]' multiple rows='5'  class='form-control chosen'>
            <option value="">-- Please Select --</option>
            @foreach($departments as $department)
            <option value="{{$department->id}}">{{$department->title}}</option>
            @endforeach
          </select>
        </div>
    @endif
    <div class="container-fluid">
        <a data-id="{{$item->id}}" onclick="removeItem({{$item->id}})" type="button" class="btn btn-danger btn-circle remove-item"><i class="fa fa-times" aria-hidden="true"></i></a>
        <a data-id="{{$item->id}}" onclick="showEditModal({{$item->id}})" type="button" class="btn btn-success btn-circle edit-item"><i class="fa fa-pencil" aria-hidden="true"></i></a>
        <div id="{{$item->id}}">
            {!! $item->item !!}
        </div>
        @if(isset($departments))
        <textarea name="items[]" id="input{{$item->id}}" hidden>
          {!! $item->item !!}
        </textarea>
        @endif
    </div>
</div>
@empty
<div class="">
    <div class="">
        <h2 class="text-secondary"> No Terms Yet! </h2>
    </div>
</div>
@endforelse
