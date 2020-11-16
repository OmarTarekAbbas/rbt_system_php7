<td class="visible-xs visible-md visible-lg">
  <div class="btn-group pull-right">

    <a class="btn btn-sm btn-primary show-tooltip" href="{{url("contractrequests/$contract_request->id")}}" title="Show"><i
        class="fa fa-eye"></i></a>

    <a class="btn btn-sm btn-info show-tooltip" href="{{url("contractrequests/$contract_request->id/contracts")}}" title="Show"><i
        class="fa fa-arrow-right"></i></a>

    <a class="btn btn-sm show-tooltip" href="{{url("contractrequests/$contract_request->id/edit")}}" title="Edit"><i
        class="fa fa-edit"></i></a>

    <form action="{{url('contractrequests/'.$contract_request->id)}}" method="POST" style="display: inline">
        @method('DELETE')
        @csrf
        <button class="btn btn-sm btn-danger show-tooltip" type="submit" onclick='return ConfirmDelete()'
            data-original-title="Delete"><i class="fa fa-trash-o"></i></button>
    </form>

  </div>
</td>
