

		 {!! Form::open(array('url'=>'fullcontracts', 'class'=>'form-vertical','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) !!}

	@if(Session::has('messagetext'))
	  
		   {!! Session::get('messagetext') !!}
	   
	@endif
	<ul class="parsley-error-list">
		@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>		


<div id="wizard-step" class="wizard-circle number-tab-steps"> <h3>Main</h3> <section> {!! Form::hidden('contract_id', $row['contract_id']) !!}{!! Form::hidden('contract_code', $row['contract_code']) !!}					
									  <div class="form-group  " >
										<label for="ipt" class=" control-label "> Label  <span class="asterix"> * </span>  </label>									
										  <input  type='text' name='contract_label' id='contract_label' value='{{ $row['contract_label'] }}' 
						required     class='form-control form-control-sm ' /> 						
									  </div> 					
									  <div class="form-group  " >
										<label for="ipt" class=" control-label "> Company  <span class="asterix"> * </span>  </label>									
										  <select name='first_party_id' rows='5' id='first_party_id' class='select2 ' required  ></select> 						
									  </div> 					
									  <div class="form-group  " >
										<label for="ipt" class=" control-label "> First Party ?  <span class="asterix"> * </span>  </label>									
										  
					
					<input type='radio' name='first_party_select' value ='1' required @if($row['first_party_select'] == '1') checked="checked" @endif class='minimal-green' > Yes 
					
					<input type='radio' name='first_party_select' value ='0' required @if($row['first_party_select'] == '0') checked="checked" @endif class='minimal-green' > No  						
									  </div> 					
									  <div class="form-group  " >
										<label for="ipt" class=" control-label "> First Party (%)  <span class="asterix"> * </span>  </label>									
										  <select name='first_party_percentage' rows='5' id='first_party_percentage' class='select2 ' required  ></select> 						
									  </div> 					
									  <div class="form-group  " >
										<label for="ipt" class=" control-label "> Copies  <span class="asterix"> * </span>  </label>									
										  
					
					<input type='radio' name='copies' value ='1' required @if($row['copies'] == '1') checked="checked" @endif class='minimal-green' > 1 Copy 
					
					<input type='radio' name='copies' value ='2' required @if($row['copies'] == '2') checked="checked" @endif class='minimal-green' > 2 Copy 
					
					<input type='radio' name='copies' value ='3' required @if($row['copies'] == '3') checked="checked" @endif class='minimal-green' > 3 Copy  						
									  </div> 					
									  <div class="form-group  " >
										<label for="ipt" class=" control-label "> Pages  <span class="asterix"> * </span>  </label>									
										  <input  type='text' name='pages' id='pages' value='{{ $row['pages'] }}' 
						required     class='form-control form-control-sm ' /> 						
									  </div> </section> <h3>Services/Client/Network</h3> <section> 					
									  <div class="form-group  " >
										<label for="ipt" class=" control-label "> Service Type  <span class="asterix"> * </span>  </label>									
										  <select name='service_type_id' rows='5' id='service_type_id' class='select2 ' required  ></select> 						
									  </div> 					
									  <div class="form-group  " >
										<label for="ipt" class=" control-label "> Client Type  <span class="asterix"> * </span>  </label>									
										  <select name='second_party_type_id' rows='5' id='second_party_type_id' class='select2 ' required  ></select> 						
									  </div> 					
									  <div class="form-group  " >
										<label for="ipt" class=" control-label "> Client  <span class="asterix"> * </span>  </label>									
										  <select name='second_party_id' rows='5' id='second_party_id' class='select2 ' required  ></select> 						
									  </div> 					
									  <div class="form-group  " >
										<label for="ipt" class=" control-label "> Countries  <span class="asterix"> * </span>  </label>									
										  <select name='country_title[]' multiple rows='5' id='country_title' class='select2 ' required  ></select> 						
									  </div> 					
									  <div class="form-group  " >
										<label for="ipt" class=" control-label "> Operators  <span class="asterix"> * </span>  </label>									
										  <select name='operator_title[]' multiple rows='5' id='operator_title' class='select2 ' required  ></select> 						
									  </div> </section> <h3>Dates/Status/File</h3> <section> 					
									  <div class="form-group  " >
										<label for="ipt" class=" control-label "> Contract Date  <span class="asterix"> * </span>  </label>									
										  
				<div class="input-group input-group-sm m-b" style="width:150px !important;">
					{!! Form::text('contract_date', $row['contract_date'],array('class'=>'form-control form-control-sm date')) !!}
					<div class="input-group-append">
					 	<div class="input-group-text"><i class="fa fa-calendar"></i></span></div>
					 </div>
				</div> 						
									  </div> 					
									  <div class="form-group  " >
										<label for="ipt" class=" control-label "> Contract Duration  <span class="asterix"> * </span>  </label>									
										  <select name='contract_duration_id' rows='5' id='contract_duration_id' class='select2 ' required  ></select> 						
									  </div> 					
									  <div class="form-group  " >
										<label for="ipt" class=" control-label "> Renewal Status  <span class="asterix"> * </span>  </label>									
										  
					
					<input type='radio' name='renewal_status' value ='1' required @if($row['renewal_status'] == '1') checked="checked" @endif class='minimal-green' > AR 
					
					<input type='radio' name='renewal_status' value ='0' required @if($row['renewal_status'] == '0') checked="checked" @endif class='minimal-green' > No 
					
					<input type='radio' name='renewal_status' value ='2' required @if($row['renewal_status'] == '2') checked="checked" @endif class='minimal-green' > RBAO  						
									  </div> 					
									  <div class="form-group  " >
										<label for="ipt" class=" control-label "> Contract Status  <span class="asterix"> * </span>  </label>									
										  
					
					<input type='radio' name='contract_status' value ='1' required @if($row['contract_status'] == '1') checked="checked" @endif class='minimal-green' > Active 
					
					<input type='radio' name='contract_status' value ='0' required @if($row['contract_status'] == '0') checked="checked" @endif class='minimal-green' > Terminated  						
									  </div> 					
									  <div class="form-group  " >
										<label for="ipt" class=" control-label "> Expiry Date  <span class="asterix"> * </span>  </label>									
										  
				<div class="input-group input-group-sm m-b" style="width:150px !important;">
					{!! Form::text('contract_expiry_date', $row['contract_expiry_date'],array('class'=>'form-control form-control-sm date')) !!}
					<div class="input-group-append">
					 	<div class="input-group-text"><i class="fa fa-calendar"></i></span></div>
					 </div>
				</div> 						
									  </div> 					
									  <div class="form-group  " >
										<label for="ipt" class=" control-label "> Contract File    </label>									
										  
						<div class="fileUpload btn " > 
						    <span>  <i class="fa fa-copy"></i>  </span>
						    <div class="title"> Browse File </div>
						    <input type="file" name="contract_pdf" class="upload"       />
						</div>
						<div class="contract_pdf-preview preview-upload">
							{!! SiteHelpers::showUploadedFile( $row["contract_pdf"],"/uploads/contracts/") !!}
						</div>
					 						
									  </div> 					
									  <div class="form-group  " >
										<label for="ipt" class=" control-label "> Notes    </label>									
										  <textarea name='contract_notes' rows='5' id='contract_notes' class='form-control form-control-sm '  
				           >{{ $row['contract_notes'] }}</textarea> 						
									  </div> </section></div>

			<div style="clear:both"></div>	
				
					
				  <div class="form-group">
					<label class="col-sm-4 text-right">&nbsp;</label>
					<div class="col-sm-8">	
					<button type="submit" name="apply" class="btn btn-default btn-sm" ><i class="fa  fa-check-circle"></i> {{ Lang::get('core.sb_apply') }}</button>
					<button type="submit" name="submit" class="btn btn-default btn-sm" ><i class="fa  fa-save "></i> {{ Lang::get('core.sb_save') }}</button>
				  </div>	  
			
		</div> 
		 <input type="hidden" name="action_task" value="public" />
		 {!! Form::close() !!}
		 
   <script type="text/javascript">
	$(document).ready(function() { 
		
		
		$("#first_party_id").jCombo("{!! url('fullcontracts/comboselect?filter=first_parties:first_party_id:first_party_title') !!}",
		{  selected_value : '{{ $row["first_party_id"] }}' });
		
		$("#first_party_percentage").jCombo("{!! url('fullcontracts/comboselect?filter=percentage:percentage_id:percentage') !!}",
		{  selected_value : '{{ $row["first_party_percentage"] }}' });
		
		$("#service_type_id").jCombo("{!! url('fullcontracts/comboselect?filter=service_types:service_type_id:service_type_title') !!}",
		{  selected_value : '{{ $row["service_type_id"] }}' });
		
		$("#second_party_type_id").jCombo("{!! url('fullcontracts/comboselect?filter=second_party_types:second_party_type_id:second_party_type_title') !!}",
		{  selected_value : '{{ $row["second_party_type_id"] }}' });
		
		$("#second_party_id").jCombo("{!! url('fullcontracts/comboselect?filter=second_parties:second_party_id:second_party_title') !!}&parent=second_party_type_id:",
		{  parent: '#second_party_type_id', selected_value : '{{ $row["second_party_id"] }}' });
		
		$("#country_title").jCombo("{!! url('fullcontracts/comboselect?filter=countries:country_title:country_title') !!}",
		{  selected_value : '{{ $row["country_title"] }}' });
		
		$("#operator_title").jCombo("{!! url('fullcontracts/comboselect?filter=operators:operator_title:operator_title') !!}",
		{  selected_value : '{{ $row["operator_title"] }}' });
		
		$("#contract_duration_id").jCombo("{!! url('fullcontracts/comboselect?filter=contract_duration:contract_duration_id:contract_duration_title') !!}",
		{  selected_value : '{{ $row["contract_duration_id"] }}' });
		 

		$('.removeCurrentFiles').on('click',function(){
			var removeUrl = $(this).attr('href');
			$.get(removeUrl,function(response){});
			$(this).parent('div').empty();	
			return false;
		});		
		
	});
	</script>		 
