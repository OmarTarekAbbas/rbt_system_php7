<div class="container" class="pt-3 pb-3">
    <div class="row m-b-lg animated fadeInDown delayp1 text-center">
        <h3> {{ $pageTitle }} <small> {{ $pageNote }} </small></h3>
        <hr />       
    </div>
</div>
<div class="m-t">
	<div class="table-container" > 	

		<table class="table table-striped table-bordered" >
			<tbody>	
		
			
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Code', (isset($fields['contract_code']['language'])? $fields['contract_code']['language'] : array())) }}</td>
						<td><a href="./fullcontracts/{{$row->contract_id}}">{{ $row->contract_code}} </a> </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Service Type', (isset($fields['service_type_id']['language'])? $fields['service_type_id']['language'] : array())) }}</td>
						<td>{{ SiteHelpers::formatLookUp($row->service_type_id,'service_type_id','1:service_types:service_type_id:service_type_title') }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Label', (isset($fields['contract_label']['language'])? $fields['contract_label']['language'] : array())) }}</td>
						<td>{{ $row->contract_label}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('First Party Id', (isset($fields['first_party_id']['language'])? $fields['first_party_id']['language'] : array())) }}</td>
						<td>{{ $row->first_party_id}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('First Party Select', (isset($fields['first_party_select']['language'])? $fields['first_party_select']['language'] : array())) }}</td>
						<td>{{ $row->first_party_select}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Second Party Id', (isset($fields['second_party_id']['language'])? $fields['second_party_id']['language'] : array())) }}</td>
						<td>{{ $row->second_party_id}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('First Party', (isset($fields['first_party']['language'])? $fields['first_party']['language'] : array())) }}</td>
						<td>{{ $row->first_party}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Second Party', (isset($fields['second_party']['language'])? $fields['second_party']['language'] : array())) }}</td>
						<td>{{ $row->second_party}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('First Party (%)', (isset($fields['first_party_percentage']['language'])? $fields['first_party_percentage']['language'] : array())) }}</td>
						<td>{{ $row->first_party_percentage}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Second Party (%)', (isset($fields['second_party_percentage']['language'])? $fields['second_party_percentage']['language'] : array())) }}</td>
						<td>{{ $row->second_party_percentage}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Contract Date', (isset($fields['contract_date']['language'])? $fields['contract_date']['language'] : array())) }}</td>
						<td>{{ date('F j, Y',strtotime($row->contract_date)) }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Contract Duration', (isset($fields['contract_duration_id']['language'])? $fields['contract_duration_id']['language'] : array())) }}</td>
						<td>{{ SiteHelpers::formatLookUp($row->contract_duration_id,'contract_duration_id','1:contract_duration:contract_duration_id:contract_duration_title') }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Renewal Status', (isset($fields['renewal_status']['language'])? $fields['renewal_status']['language'] : array())) }}</td>
						<td>{!! SiteHelpers::formatRows($row->renewal_status,$fields['renewal_status'],$row ) !!} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Contract Status', (isset($fields['contract_status']['language'])? $fields['contract_status']['language'] : array())) }}</td>
						<td>{!! SiteHelpers::formatRows($row->contract_status,$fields['contract_status'],$row ) !!} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Expiry Date', (isset($fields['contract_expiry_date']['language'])? $fields['contract_expiry_date']['language'] : array())) }}</td>
						<td>{{ date('F j, Y',strtotime($row->contract_expiry_date)) }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Countries', (isset($fields['country_title']['language'])? $fields['country_title']['language'] : array())) }}</td>
						<td>{{ $row->country_title}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Operators', (isset($fields['operator_title']['language'])? $fields['operator_title']['language'] : array())) }}</td>
						<td>{{ $row->operator_title}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Copies', (isset($fields['copies']['language'])? $fields['copies']['language'] : array())) }}</td>
						<td>{{ $row->copies}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Pages', (isset($fields['pages']['language'])? $fields['pages']['language'] : array())) }}</td>
						<td>{{ $row->pages}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Notes', (isset($fields['contract_notes']['language'])? $fields['contract_notes']['language'] : array())) }}</td>
						<td>{{ $row->contract_notes}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Annexs', (isset($fields['btn_annex']['language'])? $fields['btn_annex']['language'] : array())) }}</td>
						<td>{{ $row->btn_annex}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Auturaisitions', (isset($fields['btn_auturaisition']['language'])? $fields['btn_auturaisition']['language'] : array())) }}</td>
						<td>{{ $row->btn_auturaisition}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Copyrights', (isset($fields['btn_copyrights']['language'])? $fields['btn_copyrights']['language'] : array())) }}</td>
						<td>{{ $row->btn_copyrights}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Entry By', (isset($fields['entry_by_details']['language'])? $fields['entry_by_details']['language'] : array())) }}</td>
						<td>{{ $row->entry_by_details}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Entry By', (isset($fields['entry_by']['language'])? $fields['entry_by']['language'] : array())) }}</td>
						<td>{{ $row->entry_by}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Created At', (isset($fields['created_at']['language'])? $fields['created_at']['language'] : array())) }}</td>
						<td>{{ date('F j, Y, g:i a',strtotime($row->created_at)) }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Updated At', (isset($fields['updated_at']['language'])? $fields['updated_at']['language'] : array())) }}</td>
						<td>{{ $row->updated_at}} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ SiteHelpers::activeLang('Second Party Type', (isset($fields['second_party_type_id']['language'])? $fields['second_party_type_id']['language'] : array())) }}</td>
						<td>{{ SiteHelpers::formatLookUp($row->second_party_type_id,'second_party_type_id','1:second_party_types:second_party_type_id:second_party_type_title') }} </td>
						
					</tr>
						
					<tr>
						<td width='30%' class='label-view text-right'></td>
						<td> <a href="javascript:history.go(-1)"> Back To Grid <a> </td>
						
					</tr>					
				
			</tbody>	
		</table>   

	 
	
	</div>
</div>	