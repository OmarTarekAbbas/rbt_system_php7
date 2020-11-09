<td class="visible-xs visible-md visible-lg">
  <div class="btn-group">
    @if(get_action_icons('roadmaps/{roadmap}','get'))
    <a class="btn btn-sm show-tooltip btn-primary" href="{{url("roadmaps/$roadmap->roadmap_id")}}" title="view"><i class="fa fa-eye"></i></a>
    @endif
    @if(get_action_icons('roadmaps/{roadmap}/edit','get'))
    <a class="btn btn-sm show-tooltip" href="{{url("roadmaps/$roadmap->roadmap_id/edit")}}" title="Edit"><i class="fa fa-edit"></i></a>
    @endif
    @if(get_action_icons('roadmaps/{id}/delete','get'))
    <a class="btn btn-sm show-tooltip btn-danger" onclick="return ConfirmDelete();" href="{{url("roadmaps/$roadmap->roadmap_id/delete")}}" title="Delete"><i class="fa fa-trash"></i></a>
    @endif
  </div>
</td>
