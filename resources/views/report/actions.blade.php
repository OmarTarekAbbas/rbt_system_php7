<td class="visible-xs visible-md visible-lg">
    <div class="btn-group">
        @if(get_action_icons('report/{report}/edit','get'))
        <a class="btn btn-sm show-tooltip" title="" href="{{url('report/'.$report->id.'/edit')}}"
            data-original-title="Edit"><i class="fa fa-edit"></i></a>
        @endif
        @if(get_action_icons('report/{id}/delete','delete'))
        <a class="btn btn-sm btn-danger show-tooltip" title=""
            onclick="return confirm('Are you sure you want to delete this ?');"
            href="{{url('report/'.$report->id.'/delete')}}" data-original-title="Delete"><i
                class="fa fa-trash-o"></i></a>
        @endif
    </div>
</td>
</tr>
