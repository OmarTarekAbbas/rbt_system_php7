<td class="visible-xs visible-md visible-lg">
  <div class="btn-group">
    @if(get_action_icons('rbt/{rbt}','get'))
    <a class="btn btn-sm btn-primary show-tooltip" href="{{url("rbt/$rbt->rbt_id")}}" title="Show"><i
        class="fa fa-eye"></i></a>
    @endif
    @if(get_action_icons('rbt/{rbt}/edit','get'))
    <a class="btn btn-sm show-tooltip" href="{{url("rbt/$rbt->rbt_id/edit")}}" title="Edit"><i
        class="fa fa-edit"></i></a>
    @endif
    @if(get_action_icons('rbt/{id}/delete','delete'))
    <a class="btn btn-sm show-tooltip btn-danger" onclick="return ConfirmDelete();"
      href="{{url("rbt/$rbt->rbt_id/delete")}}" title="Delete"><i class="fa fa-trash"></i></a>
    @endif
  </div>
</td>
