<td class="visible-xs visible-md visible-lg">
  <div class="btn-group pull-right">
    @if(count($content->rbts) && get_action_icons('content/{id}/rbts','get'))
    <a class="btn btn-sm btn-info show-tooltip" title="list traks" href="{{url("content/$content->id/rbts")}}"><i
        class="fa fa-music"></i></a>
    @endif
    @if(get_action_icons('content/{id}','get'))
    <a class="btn btn-sm btn-primary show-tooltip" href="{{url("content/$content->id")}}" title="Show"><i
        class="fa fa-eye"></i></a>
    @endif

    @if(get_action_icons('rbt/excel','get')) <a class="btn btn-sm btn-success show-tooltip" title=""
      href="{{url("rbt/excel?content_id=" . $content->id)}}"><i class="fa fa-plus"></i></a>
    @endif

    @if(get_action_icons('content/{id}/edit','get'))
    <a class="btn btn-sm show-tooltip" href="{{url("content/$content->id/edit")}}" title="Edit"><i
        class="fa fa-edit"></i></a>
    @endif

    @if(get_action_icons('content/{id}/delete','get'))
    <a class="btn btn-sm show-tooltip btn-danger" onclick="return ConfirmDelete();"
      href="{{url("content/$content->id/delete")}}" title="Delete"><i class="fa fa-trash"></i></a>
    @endif
  </div>
</td>
