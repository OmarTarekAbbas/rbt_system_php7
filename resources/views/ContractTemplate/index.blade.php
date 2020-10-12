@extends('template') @section('page_title') Contract Template @stop @section('content') @include('errors')
<!-- BEGIN Content -->
<div id="main-content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-black">
                <div class="box-title">
                    <h3><i class="fa fa-table"></i> Contract Template</h3>
                    <div class="box-tool">
                        <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
                        <a data-action="close" href="#"><i class="fa fa-times"></i></a>
                    </div>
                </div>
                <div class="box-content">
                    <div class="btn-toolbar pull-right">
                        <div class="btn-group">
                            <a class="btn btn-circle show-tooltip" title="" href="{{url('ContractTemplate/create')}}" data-original-title="Add new record"><i class="fa fa-plus"></i></a>
                            <?php
								$table_name = "service_types" ;
							?>
                        </div>
                    </div>
                    <br><br>
                    <div class="table-responsive">
                        <table id="example" class="table table-striped dt-responsive" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th style="width:18px"><input type="checkbox" onclick="select_all('ContractTemplate')"></th>
                                    <th>Id</th>
                                    <th>Title</th>
                                    <th>Type</th>
                                    <th class="visible-md visible-lg" style="width:130px">Action</th>
                                </tr>
                            </thead>
                            <tbody id="tablecontents">
                                @foreach($ContractTemplates as $ContractTemplate)
                                <tr class="table-flag-blue">
                                    <td><input class="select_all_template" type="checkbox" name="selected_rows[]" value="{{$ContractTemplate->id}}" onclick="collect_selected(this)"></td>
                                    <td>{{$ContractTemplate->id}}</td>
                                    <td>{{$ContractTemplate->title}}</td>
                                    <td>{{$ContractTemplate->content_type == 1 ? 'IN' : 'OUT'}}</td>
                                    <td class="visible-md visible-lg">
                                        <div class="btn-group">
                                            <a class="btn btn-sm show-tooltip btn-primary" title="" href="{{url('ContractTemplate/'.$ContractTemplate->id.'/items')}}" data-original-title="Show"><i class="fa fa-eye"></i></a> @if($ContractTemplate->items->count()
                                            > 0)
                                            <a class="btn btn-sm show-tooltip btn-success" title="Show PDF" href="{{url('ContractTemplate/'.$ContractTemplate->id.'/items/download')}}" data-original-title="Show"><i class="fa fa-file"></i></a> @endif
                                            <a class="btn btn-sm show-tooltip" title="" href="{{url('ContractTemplate/'.$ContractTemplate->id.'/edit')}}" data-original-title="Edit"><i class="fa fa-edit"></i></a>

                                            <form action="{{url('ContractTemplate/'.$ContractTemplate->id)}}" method="POST" style="display: inline">
                                                @method('DELETE') @csrf
                                                <button class="btn btn-sm btn-danger show-tooltip" type="submit" onclick='return ConfirmDelete()' data-original-title="Delete"><i class="fa fa-trash-o"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop @section('script')
<script type="text/javascript" src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<script type="text/javascript">
</script>
<script>
    $('#ContractTemplate').addClass('active');
    $('#ContractTemplate-index').addClass('active');
</script>
@stop