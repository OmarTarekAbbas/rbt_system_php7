@extends('template')
@section('page_title')
	FirstPartie
@stop
@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="box box-black">
				<div class="box-title">
					<h3><i class="fa fa-table"></i> FirstPartie Table</h3>
					<div class="box-tool">
						<a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
						<a data-action="close" href="#"><i class="fa fa-times"></i></a>
					</div>
				</div>
				<div class="box-content">

					<div class="table-responsive">
						<table id="example" class="table table-striped dt-responsive" cellspacing="0" width="100%">
							<thead>
							<tr>
								<th style="width:18px"><input type="checkbox"></th>
								<th>FirstPartie Title</th>
								<th>first party joining date</th>
								<th class="visible-md visible-lg" style="width:130px">Action</th>
							</tr>
							</thead>
							<tbody>
							@foreach($firstparties as $firstpartie)
									<tr class="table-flag-blue">
										<td><input type="checkbox"></td>
										<td>{{$firstpartie->first_party_title}}</td>
										<td>{{$firstpartie->first_party_joining_date->format('d-m-Y')}}</td>
										<td class="visible-md visible-lg">
                      @if (Auth::user()->hasRole(['super_admin', 'legal']))

											<div class="btn-group">
												<a class="btn btn-sm show-tooltip" title="" href="{{url('firstparties/'.$firstpartie->id.'/edit')}}" data-original-title="Edit"><i class="fa fa-edit"></i></a>
												<a class="btn btn-sm btn-danger show-tooltip" title="" onclick="return confirm('Are you sure you want to delete this ?');" href="{{url('firstparties/'.$firstpartie->id.'/delete')}}" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
                      </div>
                      @endif
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

@stop

@section('script')
	<script>
		$('#contract .submenu').first().css('display', 'block');
		$('#firstpartie .submenu').first().css('display', 'block');
		$('#firstpartie-index').addClass('active');
	</script>
@stop
