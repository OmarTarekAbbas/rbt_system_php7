<td class="visible-xs visible-md visible-lg">
    <div class="btn-group">
        @if (get_action_icons('attachment/{attachment}/edit', 'get'))
        <a class="btn btn-sm show-tooltip" title="" href="{{url('attachment/'.$Attachment->id.'/edit')}}"
            data-original-title="Edit"><i class="fa fa-edit"></i></a>
        @endif
        @if (get_action_icons('attachment/{attachment}', 'delete'))
        <form action="{{url('attachment/'.$Attachment->id)}}" method="POST" style="display: inline">
            @method('DELETE')
            @csrf
            <button class="btn btn-sm btn-danger show-tooltip" type="submit" onclick='return ConfirmDelete()'
                data-original-title="Delete"><i class="fa fa-trash-o"></i></button>
        </form>
        @endif
    </div>
</td>
