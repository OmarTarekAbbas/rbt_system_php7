<td class="visible-xs visible-md visible-lg">
  <div class="btn-group">
      @if (get_action_icons('SecondParty/{SecondParty}/edit', 'get'))
      <a class="btn btn-sm show-tooltip" href="{{url("SecondParty/$SecondParty->second_party_id/edit")}}" title="Edit"><i class="fa fa-edit"></i></a>
      @endif
      @if (get_action_icons('SecondParty/{id}/delete', 'get'))
      <a class="btn btn-sm show-tooltip btn-danger" onclick="return ConfirmDelete();" href="{{url("SecondParty/$SecondParty->second_party_id/delete")}}" title="Delete"><i class="fa fa-trash"></i></a>
      @endif
  </div>
</td>
