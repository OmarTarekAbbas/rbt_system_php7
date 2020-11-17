<td class="visible-xs visible-md visible-lg">
  <div class="btn-group pull-right">

    @if(get_action_icons('contractrequests/{contractrequest}','get'))
    <a class="btn btn-sm btn-primary show-tooltip" href="{{url("contractrequests/$contract_request->id")}}" title="Show"><i
        class="fa fa-eye"></i></a>
    @endif

    @if(get_action_icons('contractrequests/{id}/contracts','get'))
    @if ($contract_request->contracts)
    <a class="btn btn-sm btn-info show-tooltip" href="{{url("contractrequests/$contract_request->id/contracts")}}" title="Show"><i
        class="fa fa-arrow-right"></i></a>
    @endif
    @endif

    @if(get_action_icons('contractrequests/{contractrequest}/edit','get'))
    <a class="btn btn-sm show-tooltip" href="{{url("contractrequests/$contract_request->id/edit")}}" title="Edit"><i
        class="fa fa-edit"></i></a>
    @endif

    @if(get_action_icons('contractrequests/{contractrequest}','delete'))
    <form action="{{url('contractrequests/'.$contract_request->id)}}" method="POST" style="display: inline">
        @method('DELETE')
        @csrf
        <button class="btn btn-sm btn-danger show-tooltip" type="submit" onclick='return ConfirmDelete()'
            data-original-title="Delete"><i class="fa fa-trash-o"></i></button>
    </form>
    @endif

  </div>
</td>
