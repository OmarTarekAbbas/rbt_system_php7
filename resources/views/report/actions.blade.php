<td class="visible-xs visible-md visible-lg">
    <div class="btn-group">
        @if(get_action_icons('report/{report}/edit','get'))
        <a class="btn btn-sm show-tooltip" title="" href="{{url('report/'.$report->id.'/edit')}}"
            data-original-title="Edit"><i class="fa fa-edit"></i></a>
        @endif

        @if(get_action_icons('report/{id}/delete','delete'))
        <form action="{{url('report/'.$report->id.'/delete')}}" method="POST" style="display: inline">
            @method('DELETE')
            @csrf
            <button class="btn btn-sm btn-danger show-tooltip" type="submit" onclick='return ConfirmDelete()'
                data-original-title="Delete"><i class="fa fa-trash-o"></i></button>
        </form>
        @endif
    </div>
</td>
</tr>
