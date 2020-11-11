<td class="visible-xs visible-md visible-lg">
  <div class="btn-group pull-right">

    <a class="btn btn-sm btn-primary show-tooltip" href="{{url("clientpayments/$client_payment->id")}}" title="Show"><i
        class="fa fa-eye"></i></a>



    <a class="btn btn-sm show-tooltip" href="{{url("clientpayments/$client_payment->id/edit")}}" title="Edit"><i
        class="fa fa-edit"></i></a>



    <a class="btn btn-sm show-tooltip btn-danger" onclick="return ConfirmDelete();"
      href="{{url("clientpayments/$client_payment->id/delete")}}" title="Delete"><i class="fa fa-trash"></i></a>
 
  </div>
</td>
