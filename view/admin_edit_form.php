<?php

function clm_admin_edit_form( $buyer, $co_buyer = '' )
{
	
	
	
	foreach( $buyer as $k)
	{
		$applicant_id	= $k['applicant_id'];
		$first_name 	= $k['first_name'];
		$middle_name	= $k['initial_name'];
		$last_name		= $k['last_name'];
		$email_address	= $k['email_address'];
		$home_phone		= $k['home_phone'];
		$applicant_meta	= unserialize( $k['applicant_meta'] );
	}
	unset($k);
	
	if( is_array( $co_buyer ) )
	{
		foreach( $co_buyer as $k)
		{
			$co_buyer_id		= $k['co_buyer_id'];
			$co_applicant_id 	= $k['applicant_id'];
			$co_first_name		= $k['first_name'];
			$co_initial_name	= $k['initial_name'];
			$co_last_name		= $k['last_name'];
			$co_applicant_meta	= unserialize( $k['co_buyer_meta'] );
		}
		unset($k);
	}
	
	?>
    
    <!--[if gte IE 9]>
      <style type="text/css">
        .clm-gradient {
           filter: none;
        }
      </style>
    <![endif]-->
    
    <button onclick="backtoList();" class="clm-gradient">← Back to list</button>
    
    <form name="form_edit_clm_entry" id="form_edit_clm_entry">

        <table>
        
            <tr>
            
                <th colspan="2">
                        <h5>Buyer's Information</h5>
                </th>
            
            </tr>
        
            <tr>
    
                <td>
                    <label>Name (First, MI, Last)</label>
                </td>
                
                <td>
                    <input type="text" name="first_name" value="<?php echo $first_name ? $first_name : ''; ?>" />
                    <input type="text" name="middle_name" value="<?php echo $middle_name ? $middle_name : ''; ?>" />
                    <input type="text" name="last_name" value="<?php echo $last_name ? $last_name : ''; ?>" />
                </td>
                
            </tr>
            
            
            <tr>
     
                <td>
                    <label>Social Secureity Number</label>
                </td>
                
                <td>
                	<?php 
					$sss = explode("-",$applicant_meta['sss'])
					?>
                    <input type="text" name="sss_1" value="<?php echo $sss[0] ? $sss[0] : ''; ?>" /> - 
                    <input type="text" name="sss_2" value="<?php echo $sss[1] ? $sss[1] : ''; ?>" /> - 
                    <input type="text" name="sss_3" value="<?php echo $sss[2] ? $sss[2] : ''; ?>" />
                </td>
                
            </tr>
            
            <tr>
     
                <td>
                    <label>Date of Birth</label>
                </td>
                
                <td>
                    <input type="text" name="birth_date" placeholder="yy/mm/dd" value="<?php echo $applicant_meta['bdate'] ? $applicant_meta['bdate'] : ''; ?>"/>
                </td>
                
            </tr>
            
            <tr>
     
                <td>
                    <label>Home Phone</label>
                </td>
                
                <td>
                	<?php
					$home_phone = explode("-",$home_phone);
					?>
                    <input type="text" name="home_phone_1" value="<?php echo $home_phone[0] ? $home_phone[0] : ''; ?>" /> - 
                    <input type="text" name="home_phone_2" value="<?php echo $home_phone[1] ? $home_phone[1] : ''; ?>" /> - 
                    <input type="text" name="home_phone_3" value="<?php echo $home_phone[2] ? $home_phone[2] : ''; ?>" />
                </td>
                
            </tr>
            
            <tr>
     
                <td>
                    <label>Is the Home Phone under you name?</label>
                </td>
                
                <td>
                	<?php $i = $applicant_meta['phone_under_your_name']; ?>
                    
                    <input type="radio" name="phone_under_your_name" value="yes" 
                    	<?php if ( $i == 'yes' ){ echo 'checked="checked"'; } ?> /> Yes 
                        
                    <input type="radio" name="phone_under_your_name" value="no" 
                    	<?php if ( $i == 'no' ){ echo 'checked="checked"'; } ?> /> No
                        
                	<?php unset($i); ?>
                </td>
                
            </tr>
            
            <tr>
            
                <td>
                    <label>Email Address</label>
                </td>
            
                <td>
                    <input type="text" name="email" id="email" value="<?php echo $email_address ? $email_address : ''; ?>" />
                </td>
                
            </tr>
            
            <tr>
            
                <td>
                    <label>Other Phone</label>
                </td>
                
                 <td>
                 
                 	<?php
					$other_home_phone = explode("-",$applicant_meta['other_home_phone']);
					?>
                    
                    <input type="text" name="other_home_phone_1" value="<?php echo $other_home_phone[0] ? $other_home_phone[0] : ''; ?>" />
                    
                    <input type="text" name="other_home_phone_2" value="<?php echo $other_home_phone[1] ? $other_home_phone[1] : ''; ?>" />
                    
                    <input type="text" name="other_home_phone_3" value="<?php echo $other_home_phone[2] ? $other_home_phone[2] : ''; ?>" />
                    
                </td>
                
            </tr>
            
             <tr>
     
                <td>
                    <label>Is this Home Phone under you name?</label>
                </td>
                
                <td>
                
                	<?php $i = $applicant_meta['other_phone_under_your_name']; ?>
                    
                    <input type="radio" name="other_phone_under_your_name" value="yes" 
                    	<?php if ( $i == 'yes' ){ echo 'checked="checked"'; } ?> /> Yes
                         
                    <input type="radio" name="other_phone_under_your_name" value="no" 
                    	<?php if ( $i == 'no' ){ echo 'checked="checked"'; } ?> /> No
                    
                    <?php unset($i); ?>
                </td>
                
            </tr>
            
            <tr>
            
                <td>
                    <label>Time at Present Address</label>
                </td>
                
                <td>
                
                    <input type="text" name="time_at_present_address_year" value="<?php echo $applicant_meta['time_at_present_address_year'] ? $applicant_meta['time_at_present_address_year'] : ''; ?>" /> Year 
                    
                    <input type="text" name="time_at_present_address_month" value="<?php echo $applicant_meta['time_at_present_address_month'] ? $applicant_meta['time_at_present_address_month'] : ''; ?>"  /> Month 
                    
                </td>
                
            </tr>
            
            <tr>
            
                <td>
                    <label>Residence Type</label>
                </td>
                
                <td>
                
                	<?php $i = $applicant_meta['residence_type']; ?>
                    
                    <input type="radio" name="residence_type" value="renting" 
                    	<?php if ( $i == 'renting' ) { echo 'checked="checked"'; }?> /> Renting 
                        
                    <input type="radio" name="residence_type" value="own_buying" 
                    	<?php if ( $i == 'own_buying' ) { echo 'checked="checked"'; }?> /> Own/Buying
                        
                    <input type="radio" name="residence_type" value="living_with_family" 
                    <?php if ( $i == 'living_with_family' ) { echo 'checked="checked"'; }?> /> Living with Family
                    
                    <?php unset($i); ?>
                    
                </td>
                
            </tr>
            
            <tr>
            
                <td>
                    <label>Street Address</label>
                </td>
                
                <td>
                    <input type="text" name="street_address" value="<?php echo $applicant_meta['street_address'] ? $applicant_meta['street_address'] : ''; ?>"  /> 
                </td>
                
            </tr>
            
            <tr>
            
                <td>
                    <label>City</label>
                </td>
                
                <td>
                    <input type="text" name="city" value="<?php echo $applicant_meta['city'] ? $applicant_meta['city'] : ''; ?>" />
                </td>
                
            </tr>
            
            <tr>
            
                <td>
                    <label>State/Province</label>
                </td>
                
                <td>
                
                	<?php $provinces = unserialize( get_option('clm_provinces') ); ?>
                
                    <input type="text" name="state_province" value="<?php echo $applicant_meta['state_province'] ? $applicant_meta['state_province'] : ''; ?>"/> 
                    
                    <?php $i = $applicant_meta['state_province_radio']; ?>
                    
                    
                    <select name="state_province_radio">
                    
                        <?php for ($x=0; $x < count($provinces); $x++ ) { ?>
                        
                        <option <?php if($i == $provinces[$x]){ echo 'selected="selected"'; } ?> value="<?php echo $provinces[$x]; ?>"> <?php echo ucwords($provinces[$x]); ?> </option>
                        
                        <?php } unset($x); ?>
                        
                    </select>
                        
                </td>
                
            </tr>
            
            <tr>
            
                <td>
                    <label>Zip/Postal Code</label>
                </td>
                
                <td>
                    <input type="text" name="zip_postal_code" value="<?php echo $applicant_meta['zip_postal_code'] ? $applicant_meta['zip_postal_code'] : ''; ?>"/>
                </td>
                
            </tr>
            
            <tr>
            
                <td>
                    <label>Housing Payment</label>
                </td>
                
                <td>
                    <input type="text" name="housing_payment" value="<?php echo $applicant_meta['housing_payment'] ? $applicant_meta['housing_payment'] : ''; ?>"/>.00 Per Month
                </td>
                
            </tr>
            
            <tr>
            
                <td>
                    <label>Time at Previous Address</label>
                </td>
                
                <td>
                
                    <input type="text" name="time_at_prev_add_year" value="<?php echo $applicant_meta['time_at_prev_add_year'] ? $applicant_meta['time_at_prev_add_year'] : ''; ?>" /> Year  
                    
                    <input type="text" name="time_at_prev_add_month" value="<?php echo $applicant_meta['time_at_prev_add_month'] ? $applicant_meta['time_at_prev_add_month'] : ''; ?>" /> Month
                    
                </td>
                
            </tr>
            
            <tr>
                
                <td>
                    <label>Previous Address</label>
                </td>
                
                <td>
                    <input type="text" name="previous_add" value="<?php echo $applicant_meta['previous_add'] ? $applicant_meta['previous_add'] : ''; ?>"/>
                </td>
                
            </tr>
            
            <tr>
            
                <td>
                    <label>Previous City</label>
                </td>
                
                <td>
                    <input type="text" name="prev_city" value="<?php echo $applicant_meta['prev_city'] ? $applicant_meta['prev_city'] : ''; ?>"/>
                </td>
                
            </tr>
            
            <tr>
            
                <td>
                    <label>Previous Zip/Postal Code</label>
                </td>
                
                <td>
                    <input type="text" name="prev_zip_postal_code" value="<?php echo $applicant_meta['prev_zip_postal_code'] ? $applicant_meta['prev_zip_postal_code'] : ''; ?>" />
                </td>
                
            </tr>
            
            
            
            
            <tr>
            
                <th colspan="2">
                        <h5>Employment / Income Information</h5>
                </th> 
            
            </tr>
            
            <tr>
            
                <td>
                    <label>Employment Type</label>
                </td>
                
                <td>
                
                	<?php $i = $applicant_meta['employment_type']; ?>
                    
                    <input type="radio" name="employment_type" value="w2_employee" 
                    	<?php if( $i == 'w2_employee' ) { echo 'checked="checked"'; } ?> /> W2 Employee
                        
                    <input type="radio" name="employment_type" value="self_employed" 
                    	<?php if( $i == 'self_employed' ) { echo 'checked="checked"'; } ?> /> 1099 / Self Employed
                    
                    <input type="radio" name="employment_type" value="fixed_income" 
                    	<?php if( $i == 'fixed_income' ) { echo 'checked="checked"'; } ?> /> Fixed Income
                        
                	<?php unset($i); ?>
                    
                </td>
                
            </tr>
            
            <tr>
            
                <td>
                    <label>Time with Employment</label>
                </td>
                
                <td>
                
                    <input type="text" name="time_with_employment_year" value="<?php echo $applicant_meta['time_with_employment_year'] ? $applicant_meta['time_with_employment_year'] : ''; ?>" /> Year
                    
                    <input type="text" name="time_with_employment_month" value="<?php echo $applicant_meta['time_with_employment_month'] ? $applicant_meta['time_with_employment_month'] : ''; ?>" /> Month
                    
                </td>
                
            </tr>
            
            <tr>
            
                <td>
                    <label>Employer Phone</label>
                </td>
                
                <td>
                
                	<?php $i = explode("-", $applicant_meta['employment_phone']); ?>
                    
                    <input type="text" name="employment_phone_1" value="<?php echo $i[0] ? $i[0] : ''; ?>" /> - 
                    <input type="text" name="employment_phone_2" value="<?php echo $i[1] ? $i[1] : ''; ?>" /> - 
                    <input type="text" name="employment_phone_3" value="<?php echo $i[2] ? $i[2] : ''; ?>" />
                    
                    <?php unset($i); ?>
                    
                </td>
                
            </tr>
            
            <tr>
                
                <td>
                    <label>Employer Zip / Postal Code</label>
                </td>
                
                <td>
                    <input type="text" name="employer_zip_postal_code" value="<?php echo $applicant_meta['employer_zip_postal_code'] ? $applicant_meta['employer_zip_postal_code'] : ''; ?>" />
                </td>
                
            </tr>
            
            <tr>
                
                <td>
                    <label>Name of Employer</label>
                </td>
                
                <td>
                
                	<?php $i = $applicant_meta['name_of_employer']; ?>
                    
                    <input type="text" name="name_of_employer" value="<?php echo $i ? $i : ''; ?>"/>
                    
                    <?php unset($i); ?>
                    
                </td>
                
            </tr>
            
            <tr>
            
                <td>
                    <label>Occupation Title</label>
                </td>
                
                <td>
                
                	<?php $i = $applicant_meta['occupation_title']; ?>
                    
                    <input type="text" name="occupation_title" value="<?php echo $i ? $i : ''; ?>" />
                    
                    <?php unset($i); ?>
                    
                </td>
                
            </tr>
            
            <tr>
            
                <td>
                    <label>Employment Income</label>
                </td>
                
                <td>
                
                	<?php $i = $applicant_meta['employment_income']; ?>
                    
                    <input type="text" name="employment_income" value="<?php echo $i ? $i : ''; ?>" />.00 <small>(Monthly pre-tax / gross amount)</small>
                    
                    <?php unset($i); ?>
                     
                </td>
                
            </tr>
            
            <tr>
            
                <td>
                    <label>Other Income</label>
                </td>
                
                <td>
                
                	<?php $i = $applicant_meta['other_income']; ?>
                    
                    <input type="text" name="other_income" value="<?php echo $i ? $i : ''; ?>" />.00
                    
                    <?php unset($i); ?>
                     
                </td>
                
            </tr>
            
            <tr>
            
                <td>
                    <label>Source of other Income</label>
                </td>
                
                <td>
                
                	<?php $i = $applicant_meta['source_of_other_income']; ?>
                    
                    <input type="text" name="source_of_other_income" value="<?php echo $i ? $i : ''; ?>" />
                    
                    <?php unset($i); ?>
                    
                </td>
                
            </tr>
            
            <tr>
            
                <td>
                    <label>Time with Previous Employer</label>
                </td>
                
                <td>
                
                	<?php $i[0] = $applicant_meta['time_with_prev_employer_year']; ?>
                    <?php $i[1] = $applicant_meta['time_with_prev_employer_month']; ?>
                
                    <input type="text" name="time_with_prev_employer_year" value="<?php echo $i[0] ? $i[0] : ''; ?>"/> Years 
                    <input type="text" name="time_with_prev_employer_month" value="<?php echo $i[1] ? $i[1] : ''; ?>" /> Month
                    
                    <?php unset($i); ?>
                    
                </td>
                
            </tr>
            
            <tr>
            
                <td>
                    <label>Name of Previous Employer</label>
                </td>
                
                <td>
                
                	<?php $i = $applicant_meta['name_of_prev_employer']; ?>
                    
                    <input type="text" name="name_of_prev_employer" value="<?php echo $i ? $i : ''; ?>" />
                    
                    <?php unset($i); ?>
                    
                </td>
                
            </tr>
            
            <tr>
            
                <td>
                    <label>Previous Employer Phone Number</label>
                </td>
                
                <td>
                
                	<?php
					$x = explode("-", $applicant_meta['previous_employer_number']);
					?>
                    
                    <input type="text" name="previous_employer_number_1" value="<?php echo $x[0] ? $x[0] : ''; ?>" /> - 
                    <input type="text" name="previous_employer_number_2" value="<?php echo $x[1] ? $x[1] : ''; ?>" /> - 
                    <input type="text" name="previous_employer_number_3" value="<?php echo $x[2] ? $x[2] : ''; ?>" />
                    <?php unset($x); ?>
                    
                </td>
                
            </tr>
            
            
            
            
            <tr>
            
                <th colspan="2">
                        <h5>Other Information</h5>
                </th> 
            
            </tr>
            
            <tr>
            
                <td>
                    <label>Checking Account</label>
                </td>
                
                <td>
                
                	<?php $i = $applicant_meta['checking_account']; ?>
                    
                    <input type="radio" name="checking_account" value="yes"
                    	<?php if( $i == 'yes' ) { echo 'checked="checked"'; } ?> /> Yes 
                    <input type="radio" name="checking_account" value="no" 
                    	<?php if( $i == 'no' ) { echo 'checked="checked"'; } ?> /> No
                    
                    <?php unset($i); ?>
                    
                </td>
                
            </tr>
            
            <tr>
            
                <td>
                    <label>Savings Account</label>
                </td>
                
                <td>
                
                	<?php $i = $applicant_meta['savings_account']; ?>
                
                    <input type="radio" name="savings_account" value="yes"
                    	<?php if( $i == 'yes' ) { echo 'checked="checked"'; } ?> /> Yes
                        
                    <input type="radio" name="savings_account" value="no"
                    	<?php if( $i == 'no' ) { echo 'checked="checked"'; } ?> /> No
                    
                    <?php unset($i); ?>
                    
                </td>
                
            </tr>
            
            <tr>
            
                <td>
                    <label>Bank Name</label>
                </td>
                
                <td>
                
                	<?php $i = $applicant_meta['bank_name']; ?>
                    
                    <input type="text" name="bank_name" value="<?php echo $i ? $i : ''; ?>" />
                    
                    <?php unset($i); ?>
                    
                </td>
                
            </tr>
            
            <tr>
            
                <td>
                    <label>Down Payment</label>
                </td>
                
                <td>
                
                	<?php $i = $applicant_meta['downpayment']; ?>
                    
                    <input type="text" name="downpayment" placeholder="$" value="<?php echo $i ? $i : ''; ?>"  />.00
                    
                    <?php unset($i); ?>
                    
                </td>
                
            </tr>
            
            <tr>
            
                <td>
                    <label>Vehicle Preference:</label>
                </td>
                
                <td>
                
                	<?php $i = $applicant_meta['vehicle_preference']; ?>
                    
                    <?php $vehicles = unserialize( get_option('clm_vehicles') ); ?>
                    
                    <select name="vehicle_preference">
                    
                        <?php for ($x=0; $x < count($vehicles); $x++ ) { ?>
                        
                        <option <?php if($i == $vehicles[$x]){ echo 'selected="selected"'; } ?> value="<?php echo $vehicles[$x]; ?>"> <?php echo ucwords($vehicles[$x]); ?> </option>
                        
                        <?php } ?>
                        
                    </select>
                    
                     <?php unset($i); ?>
                    
                </td>
                
            </tr>
            
            
            
            
            <tr>
            
                <th colspan="2">
                        <h5>Trade-In Information</h5>
                </th> 
            
            </tr>
            
            <tr>
            
                <td>
                    <label>Model Year:</label>
                </td>
                
                <td>
                
                	<?php $i = $applicant_meta['model_year']; ?>
                    
                    <input type="text" name="model_year" value="<?php echo $i ? $i : ''; ?>" />
                    
                    <?php unset($i); ?>
                    
                </td>
                
            </tr>
            
            <tr>
            
                <td>
                    <label>Make:</label>
                </td>
                
                <td>
                
                	<?php $i = $applicant_meta['make']; ?>
                    
                    <input type="text" name="make" value="<?php echo $i ? $i : ''; ?>" />
                    
                    <?php unset($i); ?>
                    
                </td>
                
            </tr>
            
            <tr>
            
                <td>
                    <label>Model:</label>
                </td>
                
                <td>
                
                	<?php $i = $applicant_meta['model']; ?>
                    
                    <input type="text" name="model" value="<?php echo $i ? $i : ''; ?>" />
                    
                    <?php unset($i); ?>
                    
                </td>
                
            </tr>
            
            <tr>
            
                <td>
                    <label>Mileage:</label>
                </td>
                
                <td>
                
                	<?php $i = $applicant_meta['mileage']; ?>
                    
                    <input type="text" name="mileage" value="<?php echo $i ? $i : ''; ?>" />
                    
                    <?php unset($i); ?>
                    	
                </td>
                
            </tr>
            
            <tr>
            
                <td>
                    <label>Current Monthly Payment:</label>
                </td>
                
                <td>
                
                	<?php $i = $applicant_meta['current_monthly_payment']; ?>
                    
                    <input type="text" name="current_monthly_payment" placeholder="$" value="<?php echo $i ? $i : ''; ?>"  />.00
                    
                    <?php unset($i); ?>
                    
                </td>
                
            </tr>
            
            <tr>
            
                <td>
                    <label>Lien Holder:</label>
                </td>
                
                <td>
                
                	<?php $i = $applicant_meta['lien_holder']; ?>
                    
                    <input type="text" name="lien_holder" value="<?php echo $i ? $i : ''; ?>" />
                    
                    <?php unset($i); ?>
                    
                </td>
                
            </tr>
            
            
            
            
            
            
			<?php if( $applicant_meta['co_buyer_bool'] == 'yes' ) { ?>
            
            <tr>
            
            <!--co buyer table-->
            
            <table id="co_buyer_form">
            
                <tr>
            
                    <th colspan="2">
                            <h5>Co-Buyer's Information</h5>
                    </th>
                
                </tr>
            
                <tr>
        
                    <td>
                        <label>Name (First, MI, Last)</label>
                    </td>
                    
                    <td>
                        
                        <input type="text" name="co_first_name" value="<?php echo $co_first_name ? $co_first_name :''; ?>" />
                        <input type="text" name="co_middle_name" value="<?php echo $co_initial_name ? $co_initial_name :''; ?>" />
                        <input type="text" name="co_last_name" value="<?php echo $co_last_name ? $co_last_name :''; ?>" />
                        
                    </td>
                    
                </tr>
                
                
                <tr>
         
                    <td>
                        <label>Social Secureity Number</label>
                    </td>
                    
                    <td>
                    	
                        <?php $i = explode("-",$co_applicant_meta['sss']); ?>
                        
                        <input type="text" name="co_sss_1" value="<?php echo $i[0] ? $i[0] : ''; ?>" /> - 
                        <input type="text" name="co_sss_2" value="<?php echo $i[1] ? $i[1] : ''; ?>" /> - 
                        <input type="text" name="co_sss_3" value="<?php echo $i[2] ? $i[2] : ''; ?>" />
                        
                        <?php unset($i); ?>
                        
                    </td>
                    
                </tr>
                
                <tr>
         
                    <td>
                        <label>Date of Birth</label>
                    </td>
                    
                    <td>
                    
                    	<?php $i = $co_applicant_meta['bdate']; ?>
                        
                        <input type="text" name="co_birth_date" placeholder="yy/mm/dd" value="<?php echo $i ? $i : ''; ?>" />
                        
                        <?php unset($i); ?>
                        
                    </td>
                    
                </tr>
                
                <tr>
         
                    <td>
                        <label>Home Phone</label>
                    </td>
                    
                    <td>
                    
                    	<?php $i = explode("-",$co_applicant_meta['home_phone']); ?>
                        
                        <input type="text" name="co_home_phone_1" value="<?php echo $i[0] ? $i[0] : ''; ?>" />
                        <input type="text" name="co_home_phone_2" value="<?php echo $i[1] ? $i[1] : ''; ?>" />
                        <input type="text" name="co_home_phone_3" value="<?php echo $i[2] ? $i[2] : ''; ?>" />
                        
                        <?php unset($i); ?>
                        
                    </td>
                    
                </tr>
                
                <tr>
         
                    <td>
                        <label>Is the Home Phone under you name?</label>
                    </td>
                    
                    <td>
                    	
                        <?php $i = $co_applicant_meta['phone_under_your_name']; ?>
                        
                        <input type="radio" name="co_phone_under_your_name" value="yes" 
                        	<?php if($i == 'yes'){ echo 'checked="checked"'; } ?> /> Yes 
                            
                        <input type="radio" name="co_phone_under_your_name" value="no"
                        	<?php if($i == 'no'){ echo 'checked="checked"'; } ?> /> No
                        
                        <?php unset($i); ?>
                        
                    </td>
                    
                </tr>
                
                <tr>
                
                    <td>
                        <label>Email Address</label>
                    </td>
                
                    <td>
                    
                    	<?php $i = $co_applicant_meta['email']; ?>
                        
                        <input type="text" name="co_email" value="<?php echo $i ? $i : ''; ?>" />
                        
                        <?php unset($i); ?>
                        
                    </td>
                    
                </tr>
                
                <tr>
                
                    <td>
                        <label>Other Phone</label>
                    </td>
                    
                     <td>
                     
                     	<?php $i = explode("-",$co_applicant_meta['other_home_phone']); ?>
                        
                        <input type="text" name="co_other_home_phone_1" value="<?php echo $i[0] ? $i[0] : ''; ?>"/>
                        <input type="text" name="co_other_home_phone_2" value="<?php echo $i[1] ? $i[1] : ''; ?>"/>
                        <input type="text" name="co_other_home_phone_3" value="<?php echo $i[2] ? $i[2] : ''; ?>"/>
                        
                        <?php unset($i); ?>
                        
                    </td>
                    
                </tr>
                
                 <tr>
         
                    <td>
                        <label>Is the Home Phone under you name?</label>
                    </td>
                    
                    <td>
                    
                    	<?php $i = $co_applicant_meta['other_phone_under_your_name']; ?>
                        
                        <input type="radio" name="co_other_phone_under_your_name" value="yes" 
                        	<?php if($i == 'yes'){ echo 'checked="checked"'; } ?> /> Yes 
                            
                        <input type="radio" name="co_other_phone_under_your_name" value="no"
                        	<?php if($i == 'no'){ echo 'checked="checked"'; } ?> /> No
                        
                        <?php unset($i); ?>
                        
                    </td>
                    
                </tr>
                
                <tr>
                
                    <td>
                        <label>Time at Present Address</label>
                    </td>
                    
                    <td>
                    
                    	<?php $i[0] = $co_applicant_meta['time_at_present_address_year']; ?>
                        <?php $i[1] = $co_applicant_meta['time_at_present_address_month']; ?>
                        
                        <input type="text" name="co_time_at_present_address_year" value="<?php echo $i[0] ? $i[0] : ''; ?>" /> Year 
                        <input type="text" name="co_time_at_present_address_month" value="<?php echo $i[1] ? $i[1] : ''; ?>"  /> Month 
                        
                        <?php unset($i); ?>
                        
                    </td>
                    
                </tr>
                
                <tr>
                
                    <td>
                        <label>Residence Type</label>
                    </td>
                    
                    <td>
                    
                    	<?php $i = $co_applicant_meta['residence_type']; ?>
                        
                        <input type="radio" name="co_residence_type" value="renting" 
                        	<?php if($i=='renting'){ echo 'checked="checked"';} ?> /> Renting 
                            
                        <input type="radio" name="co_residence_type" value="own_buying" 
                        	<?php if($i=='own_buying'){ echo 'checked="checked"';} ?> /> Own/Buying
                            
                        <input type="radio" name="co_residence_type" value="living_with_family" 
                        	<?php if($i=='living_with_family'){ echo 'checked="checked"';} ?> /> Living with Family
                            
                        <?php unset($i); ?>
                        
                    </td>
                    
                </tr>
                
                <tr>
                
                    <td>
                        <label>Street Address</label>
                    </td>
                    
                    <td>
                    
                    	<?php $i = $co_applicant_meta['street_address']; ?>
                        
                        <input type="text" name="co_street_address" value="<?php echo $i ? $i : ''; ?>" />
                        
                        <?php unset($i); ?>
                         
                    </td>
                    
                </tr>
                
                <tr>
                
                    <td>
                        <label>City</label>
                    </td>
                    
                    <td>
                    
                    	<?php $i = $co_applicant_meta['city']; ?>
                        
                        <input type="text" name="co_city" value="<?php echo $i ? $i : ''; ?>" />
                        
                        <?php unset($i); ?>
                        
                    </td>
                    
                </tr>
                
                <tr>
                
                    <td>
                        <label>State/Province</label>
                    </td>
                    
                    <td>
                    	
                        <?php $provinces = unserialize( get_option('clm_provinces') ); ?>
                        
                    	<?php $i = $co_applicant_meta['state_province_radio']; ?>
                        
                        <input type="text" name="co_state_province" value="<?php echo $co_applicant_meta['state_province'] ? $co_applicant_meta['state_province'] : ''; ?>" /> 
                        
                        <select name="co_state_province_radio">
                    
							<?php for ($x=0; $x < count($provinces); $x++ ) { ?>
                            
                            <option <?php if($i == $provinces[$x]){ echo 'selected="selected"'; } ?> value="<?php echo $provinces[$x]; ?>"> <?php echo ucwords($provinces[$x]); ?> </option>
                            
                            <?php } unset($x); ?>
                            
                        </select>
                        
                    </td>
                    
                </tr>
                
                <tr>
                
                    <td>
                        <label>Zip/Postal Code</label>
                    </td>
                    
                    <td>
                    
                    	<?php $i = $co_applicant_meta['zip_postal_code']; ?>
                        
                        <input type="text" name="co_zip_postal_code" value="<?php echo $i ? $i : ''; ?>" />
                        
                        <?php unset($i); ?>
                        
                    </td>
                    
                </tr>
                
                <tr>
                
                    <td>
                        <label>Housing Payment</label>
                    </td>
                    
                    <td>
                    
                    	<?php $i = $co_applicant_meta['housing_payment']; ?>
                        
                        <input type="text" name="co_housing_payment" value="<?php echo $i ? $i : ''; ?>"/>.00 Per Month
                        
                        <?php unset($i); ?>
                        
                    </td>
                    
                </tr>
                
                <tr>
                
                    <td>
                        <label>Time at Previous Address</label>
                    </td>
                    
                    <td>
                    
                        <input type="text" name="co_time_at_prev_add_year" value="<?php echo $co_applicant_meta['time_at_prev_add_year'] ? $co_applicant_meta['time_at_prev_add_year'] : ''; ?>" /> Year 
                         
                        <input type="text" name="co_time_at_prev_add_month" value="<?php echo $co_applicant_meta['time_at_prev_add_month'] ? $co_applicant_meta['time_at_prev_add_month'] : ''; ?>"  /> Month
                        
                    </td>
                    
                </tr>
                
                <tr>
                    
                    <td>
                        <label>Previous Address</label>
                    </td>
                    
                    <td>
                    
                    	<?php $i = $co_applicant_meta['previous_add']; ?>
                        
                        <input type="text" name="co_previous_add" value="<?php echo $i ? $i : ''; ?>" />
                        
                        <?php unset($i); ?>
                        
                    </td>
                    
                </tr>
                
                <tr>
                
                    <td>
                        <label>Previous City</label>
                    </td>
                    
                    <td>
                    
                    	<?php $i = $co_applicant_meta['prev_city']; ?>
                        
                        <input type="text" name="co_prev_city" value="<?php echo $i ? $i : ''; ?>"  />
                        
                        <?php unset($i); ?>
                        
                    </td>
                    
                </tr>
                
                <tr>
                
                    <td>
                        <label>Previous Zip/Postal Code</label>
                    </td>
                    
                    <td>
                    
                    	<?php $i = $co_applicant_meta['prev_zip_postal_code']; ?>
                        
                        <input type="text" name="co_prev_zip_postal_code" value="<?php echo $i ? $i : ''; ?>" />
                        
                        <?php unset($i); ?>
                        
                    </td>
                    
                </tr>
                
                
                
                
                <tr>
                
                    <th colspan="2">
                            <h5>Co-Buyer's Employment / Income Information</h5>
                    </th> 
                
                </tr>
                
                <tr>
                
                    <td>
                        <label>Employment Type</label>
                    </td>
                    
                    <td>
                    	<?php $i = $co_applicant_meta['employment_type']; ?>
                        
                        <input type="radio" name="co_employment_type" value="w2_employee" 
							<?php if($i == 'w2_employee'){ echo 'checked="checked"'; } ?> /> W2 Employee
                            
                        <input type="radio" name="co_employment_type" value="self_employed" 
                        	<?php if($i == 'self_employed'){ echo 'checked="checked"'; } ?> /> 1099 / Self Employed
                            
                        <input type="radio" name="co_employment_type" value="fixed_income" 
                        	<?php if($i == 'fixed_income'){ echo 'checked="checked"'; } ?> /> Fixed Income
                        
                        <?php unset($i); ?>
                        
                    </td>
                    
                </tr>
                
                <tr>
                
                    <td>
                        <label>Time with Employment</label>
                    </td>
                    
                    <td>
                    
                        <input type="text" name="co_time_with_employment_year" value="<?php echo $co_applicant_meta['time_with_employment_year'] ? $co_applicant_meta['time_with_employment_year'] : ''; ?>" /> Year
                        
                        <input type="text" name="co_time_with_employment_month" value="<?php echo $co_applicant_meta['time_with_employment_month'] ? $co_applicant_meta['time_with_employment_month'] : ''; ?>" /> Month
                        
                    </td>
                    
                </tr>
                
                <tr>
                
                    <td>
                        <label>Employer Phone</label>
                    </td>
                    
                    <td>
                    
                    	<?php $i = explode("-",$co_applicant_meta['employment_phone']); ?>
                        
                        <input type="text" name="co_employment_phone_1" value="<?php echo $i[0] ? $i[0] : ''; ?>"  /> - 
                        <input type="text" name="co_employment_phone_2" value="<?php echo $i[1] ? $i[1] : ''; ?>"  /> - 
                        <input type="text" name="co_employment_phone_3" value="<?php echo $i[2] ? $i[2] : ''; ?>"  />
                        
                        <?php unset($i); ?>
                        
                    </td>
                    
                </tr>
                
                <tr>
                    
                    <td>
                        <label>Employer Zip / Postal Code</label>
                    </td>
                    
                    <td>
                    
                    	<?php $i = $co_applicant_meta['employer_zip_postal_code']; ?>
                        
                        <input type="text" name="co_employer_zip_postal_code" value="<?php echo $i ? $i : ''; ?>" />
                        
                        <?php unset($i); ?>
                        
                    </td>
                    
                </tr>
                
                <tr>
                    
                    <td>
                        <label>Name of Employer</label>
                    </td>
                    
                    <td>
                    
                    	<?php $i = $co_applicant_meta['name_of_employer']; ?>
                        
                        <input type="text" name="co_name_of_employer" value="<?php echo $i ? $i : ''; ?>" />
                        
                        <?php unset($i); ?>
                        
                    </td>
                    
                </tr>
                
                <tr>
                
                    <td>
                        <label>Occupation Title</label>
                    </td>
                    
                    <td>
                    
                    	<?php
						if( isset($co_applicant_meta['occupation_title']) ) 
						{ 
							$i = $co_applicant_meta['occupation_title'];
						} else {
							$i = '';
						}
						?>
                        
                        <input type="text" name="co_occupation_title" value="<?php echo $i; ?>" />
                        
                        <?php unset($i); ?>
                        
                    </td>
                    
                </tr>
                
                <tr>
                
                    <td>
                        <label>Employment Income</label>
                    </td>
                    
                    <td>
                    
                    	<?php $i = $co_applicant_meta['employment_income']; ?>
                        
                        <input type="text" name="co_employment_income" value="<?php echo $i ? $i : ''; ?>" />.00 <small>(Monthly pre-tax / gross amount)</small>
                        
                        <?php unset($i); ?>
                        
                    </td>
                    
                </tr>
                
                <tr>
                
                    <td>
                        <label>Other Income</label>
                    </td>
                    
                    <td>
                    
                    	<?php $i = $co_applicant_meta['other_income']; ?>
                        
                        <input type="text" name="co_other_income" value="<?php echo $i ? $i : ''; ?>" />.00
                        
                        <?php unset($i); ?>
                        
                    </td>
                    
                </tr>
                
                <tr>
                
                    <td>
                        <label>Source of other Income</label>
                    </td>
                    
                    <td>
                    
                    	<?php $i = $co_applicant_meta['source_of_other_income']; ?>
                        
                        <input type="text" name="co_source_of_other_income" value="<?php echo $i ? $i : ''; ?>" />
                        
                        <?php unset($i); ?>
                        
                    </td>
                    
                </tr>
                
                <tr>
                
                    <td>
                        <label>Time with Previous Employer</label>
                    </td>
                    
                    <td>
                    
                        <input type="text" name="co_time_with_prev_employer_year" value="<?php echo $co_applicant_meta['time_with_prev_employer_year'] ? $co_applicant_meta['time_with_prev_employer_year'] : ''; ?>" /> Years 
                        
                        <input type="text" name="co_time_with_prev_employer_month" value="<?php echo $co_applicant_meta['time_with_prev_employer_month'] ? $co_applicant_meta['time_with_prev_employer_month'] : ''; ?>" /> Month
                        
                    </td>
                    
                </tr>
                
                <tr>
                
                    <td>
                        <label>Name of Previous Employer</label>
                    </td>
                    
                    <td>
                    	
                        <?php $i = $co_applicant_meta['name_of_prev_employer']; ?>
                        
                        <input type="text" name="co_name_of_prev_employer" value="<?php echo $i ? $i : ''; ?>" />
                        
                         <?php unset($i); ?>
                         
                    </td>
                    
                </tr>
                
                <tr>
                
                    <td>
                        <label>Previous Employer Phone Number</label>
                    </td>
                    
                    <td>
                    
                    	<?php $i = explode("-",$co_applicant_meta['previous_employer_number']); ?>
                        
                        <input type="text" name="co_previous_employer_number_1" value="<?php echo $i[0] ? $i[0] : ''; ?>" /> - 
                        <input type="text" name="co_previous_employer_number_2" value="<?php echo $i[1] ? $i[1] : ''; ?>" /> - 
                        <input type="text" name="co_previous_employer_number_3" value="<?php echo $i[2] ? $i[2] : ''; ?>" />
                        
                        <?php unset($i); ?>
                        
                    </td>
                    
                </tr>
                
                </table>
    
            <!--/co buyer table-->
            
            </tr>
            
            <?php } ?>
            
            
            
            
            
            
            <tr>
            
                <th colspan="2">
                        <h5>Credit Profile</h5> 
                </th>
                
            </tr>
            
            <tr>
            
            	<td>
                	<h4>Select a Credit Profile</h4>
                </td>
                
            </tr>
            
            <tr>
            
                    <table>
                    
                    	<?php $i = $applicant_meta['credit_profile']; ?>
                    
                        <tr>
                            
                            <td>
                                <input type="radio" name="credit_profile" value="excellent" <?php if($i == 'excellent'){ echo 'checked="checked"'; } ?>/>
                            </td>
                            
                            <td>
                                <b>Excellent Credit</b> <br  />
                                <label>On the bureau minimum of 5 years. Demonstrated paid as agreed on several installment loans. (ex:mortgage, auto). No slow pays, charge offs or collection items. Credit card balances are no more than 30% of credit limit.</label>
                            </td>
                            
                        </tr>
                        
                        <tr>
                        
                            <td>
                                <input type="radio" name="credit_profile" value="good" <?php if($i == 'good'){ echo 'checked="checked"'; } ?> />
                            </td>
                            
                            <td>
                                <b>Good Credit</b> <br  />
                                <label>On the bureau minimum of 3 years. Demonstrated paid as agreed on several installment loans. Slow pays are at least 12 months old No charge offs or collection items. Credit card balances are no more than 60% of credit limit.</label>
                            </td>
                            
                        </tr>
                        
                        <tr>
                        
                            <td>
                                <input type="radio" name="credit_profile" value="average" <?php if($i == 'average'){ echo 'checked="checked"'; } ?> />
                            </td>
                            
                            <td>
                                <b>Average Credit</b> <br  />
                                <label>On the bureau minimum of 2 years. Demonstrated paid as agreed on at least one (1) installment loan of at least $5000.00 Has bought at least one automobile. Slow pays, charge offs and/or collection items at least 12 months old Have some credit card balances and demonstrated paid as agreed. No more than 1 Bankruptcy, repo, or foreclosure and is at least 12 months old.</label>
                            </td>
                            
                        </tr>
                        
                        <tr>
                        
                            <td>
                                <input type="radio" name="credit_profile" value="below" <?php if($i == 'below'){ echo 'checked="checked"'; } ?> />
                            </td>
                            
                            <td>
                                <b>Below Average Credit</b> <br  />
                                <label>On the bureau minimum of 2 years. Has installment loans but with very poor payment history. Bankruptcy, report, or foreclosure last than 12 months old and possible muliple as well. Credit card balances are max out with very poor payment history. Several slow pays, charge offs and/or collection items less than 12 months old.</label>
                            </td>
                            
                        </tr>
                        
                        <?php unset($i); ?>
                    
                    </table>
                    
            </tr>
            
            <input type="hidden" name="clm_update_nonce" value="<?php echo wp_create_nonce('clm_update_nonce'); ?>" />
            <input type="hidden" name="action" value="clm_update_entry" />
            
            <input type="hidden" name="co_buyer_bool" value="<?php echo $applicant_meta['co_buyer_bool']; ?>" />
            
            <input type="hidden" name="applicant_id" value="<?php echo $applicant_id; ?>" />
            
            </table>
            
        
        </form>
        
        <button onclick="updateEntry();" class="clm-gradient">Update</button>
        
        <div id="admin_edit_ajax_loader">
        	<img src="<?php echo CLM_URI_img.'ajax-loader.gif'; ?>" />
        </div>
        
        <?php
		
		
		
}