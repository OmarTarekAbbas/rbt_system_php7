<td class="visible-md visible-lg">
  <div class="btn-group">
    @if (get_action_icons('contractservice/create/{id}', 'get'))
    <a class="btn btn-sm btn-secondary show-tooltip" href="{{url("contractservice/create/" . $contract->id)}}" title="View Services"><i class="fa fa-arrow-right"></i></a>
    @endif
    @if (get_action_icons('Contract/{id}/items/download', 'get'))
    <a target="_blank" class="btn btn-sm show-tooltip btn-success" title="Show PDF" href="{{url("Contract/".$contract->id."/items/download")}}" data-original-title="Show"><i class="fa fa-file"></i></a>
    @endif
    @if (get_action_icons('fullcontracts/{fullcontract}', 'get'))
    <a class="btn btn-sm btn-primary show-tooltip " href="{{url("fullcontracts/" . $contract->id)}}" title="Show"><i class="fa fa-eye"></i></a>
    @endif
    @if ($contract->content->count() > 0 && get_action_icons('content', 'get'))
    <a class="btn btn-sm btn-info show-tooltip " href="{{url("content?contract_id=".$contract->id)}}" title="list content"><i class="fa fa-music"></i></a>
    @endif
    @if (get_action_icons('fullcontracts/{fullcontract}/edit', 'get'))
    <a class="btn btn-sm show-tooltip" href="{{url("fullcontracts/" . $contract->id . "/edit")}}" title="Edit"><i class="fa fa-edit"></i></a>
    @endif
    @if (get_action_icons('fullcontracts/{id}/delete', 'get'))
    <a class="btn btn-sm show-tooltip btn-danger" onclick="return ConfirmDelete();" href="{{url("fullcontracts/" . $contract->id . "/delete")}}" title="Delete"><i class="fa fa-trash"></i></a>
    @endif
  </div>
</td>
