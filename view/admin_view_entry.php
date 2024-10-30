<?php

function clm_admin_view_entry( $buyer, $co_buyer = '' )
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
    <button onclick="getCsv('<?php echo $applicant_id; ?>');" class="clm-gradient">Export CSV →</button>

        <table id="tbl_view_entry">
        
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
                    <label><?php echo $first_name ? $first_name : ''; ?></label>
                    <label><?php echo $middle_name ? $middle_name : ''; ?></label>
                    <label><?php echo $last_name ? $last_name : ''; ?></label>
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
                    <label><?php echo $sss[0] ? $sss[0] : ''; ?> - </label>
                    <label><?php echo $sss[1] ? $sss[1] : ''; ?> - </label>
                    <label><?php echo $sss[2] ? $sss[2] : ''; ?></label>
                </td>
                
            </tr>
            
            <tr>
     
                <td>
                    <label>Date of Birth</label>
                </td>
                
                <td>
                    <label><?php echo $applicant_meta['bdate'] ? $applicant_meta['bdate'] : ''; ?></label>
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
                    <label><?php echo $home_phone[0] ? $home_phone[0] : ''; ?> - </label>
                    <label><?php echo $home_phone[1] ? $home_phone[1] : ''; ?> - </label> 
                    <label><?php echo $home_phone[2] ? $home_phone[2] : ''; ?></label>
                </td>
                
            </tr>
            
            <tr>
     
                <td>
                    <label>Is the Home Phone under you name?</label>
                </td>
                
                <td>
                	<?php $i = $applicant_meta['phone_under_your_name']; ?>
                    
                    <label><?php echo $i ? $i : ''; ?></label>
                        
                	<?php unset($i); ?>
                </td>
                
            </tr>
            
            <tr>
            
                <td>
                    <label>Email Address</label>
                </td>
            
                <td>
                    <label><?php echo $email_address ? $email_address : ''; ?></label>
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
                    
                    <label><?php echo $other_home_phone[0] ? $other_home_phone[0] : ''; ?> - </label>
                    
                    <label><?php echo $other_home_phone[1] ? $other_home_phone[1] : ''; ?> - </label>
                    
                    <label><?php echo $other_home_phone[2] ? $other_home_phone[2] : ''; ?></label>
                    
                </td>
                
            </tr>
            
             <tr>
     
                <td>
                    <label>Is this Home Phone under you name?</label>
                </td>
                
                <td>
                
                	<?php $i = $applicant_meta['other_phone_under_your_name']; ?>
                    
                    <label><?php echo $i ? $i : ''; ?></label>
                    
                    <?php unset($i); ?>
                    
                </td>
                
            </tr>
            
            <tr>
            
                <td>
                    <label>Time at Present Address</label>
                </td>
                
                <td>
                
                    <label><?php echo $applicant_meta['time_at_present_address_year'] ? $applicant_meta['time_at_present_address_year'] : ''; ?></label> Year 
                    
                    <label><?php echo $applicant_meta['time_at_present_address_month'] ? $applicant_meta['time_at_present_address_month'] : ''; ?></label> Month 
                    
                </td>
                
            </tr>
            
            <tr>
            
                <td>
                    <label>Residence Type</label>
                </td>
                
                <td>
                
                	<?php $i = $applicant_meta['residence_type']; ?>
                    
                    <label><?php echo $i ? $i : ''; ?></label>
                    
                    <?php unset($i); ?>
                    
                </td>
                
            </tr>
            
            <tr>
            
                <td>
                    <label>Street Address</label>
                </td>
                
                <td>
                    <label><?php echo $applicant_meta['street_address'] ? $applicant_meta['street_address'] : ''; ?></label>
                </td>
                
            </tr>
            
            <tr>
            
                <td>
                    <label>City</label>
                </td>
                
                <td>
                    <label><?php echo $applicant_meta['city'] ? $applicant_meta['city'] : ''; ?><label>
                </td>
                
            </tr>
            
            <tr>
            
                <td>
                    <label>State/Province</label>
                </td>
                
                <td>
                
                    <label><?php echo $applicant_meta['state_province'] ? $applicant_meta['state_province'] : ''; ?></label>
                    
                    <?php $i = $applicant_meta['state_province_radio']; ?>
                    
                    <label><?php echo $i ? $i : ''; ?></label>
                    
                    <?php unset($i); ?>
                        
                </td>
                
            </tr>
            
            <tr>
            
                <td>
                    <label>Zip/Postal Code</label>
                </td>
                
                <td>
                    <label><?php echo $applicant_meta['zip_postal_code'] ? $applicant_meta['zip_postal_code'] : ''; ?></label>
                </td>
                
            </tr>
            
            <tr>
            
                <td>
                    <label>Housing Payment</label>
                </td>
                
                <td>
                    <label><?php echo $applicant_meta['housing_payment'] ? $applicant_meta['housing_payment'] : ''; ?><label>.00 Per Month
                </td>
                
            </tr>
            
            <tr>
            
                <td>
                    <label>Time at Previous Address</label>
                </td>
                
                <td>
                
                    <label><?php echo $applicant_meta['time_at_prev_add_year'] ? $applicant_meta['time_at_prev_add_year'] : ''; ?></label> Year  
                    
                    <label><?php echo $applicant_meta['time_at_prev_add_month'] ? $applicant_meta['time_at_prev_add_month'] : ''; ?></label> Month
                    
                </td>
                
            </tr>
            
            <tr>
                
                <td>
                    <label>Previous Address</label>
                </td>
                
                <td>
                    <label><?php echo $applicant_meta['previous_add'] ? $applicant_meta['previous_add'] : ''; ?></label>
                </td>
                
            </tr>
            
            <tr>
            
                <td>
                    <label>Previous City</label>
                </td>
                
                <td>
                    <label><?php echo $applicant_meta['prev_city'] ? $applicant_meta['prev_city'] : ''; ?></label>
                </td>
                
            </tr>
            
            <tr>
            
                <td>
                    <label>Previous Zip/Postal Code</label>
                </td>
                
                <td>
                    <label><?php echo $applicant_meta['prev_zip_postal_code'] ? $applicant_meta['prev_zip_postal_code'] : ''; ?></label>
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
                    
                    <label><?php 
					
					if($i == 'w2_employee') { echo 'W2 Employee'; } 
					
					if($i == 'self_employed') { echo '1099 / Self Employed'; }
					
					if($i == 'fixed_income') { echo 'Fixed Income'; }
					
					?></label>
                        
                	<?php unset($i); ?>
                    
                </td>
                
            </tr>
            
            <tr>
            
                <td>
                    <label>Time with Employment</label>
                </td>
                
                <td>
                
                    <label><?php echo $applicant_meta['time_with_employment_year'] ? $applicant_meta['time_with_employment_year'] : ''; ?></label> Year
                    
                    <label><?php echo $applicant_meta['time_with_employment_month'] ? $applicant_meta['time_with_employment_month'] : ''; ?></label> Month
                    
                </td>
                
            </tr>
            
            <tr>
            
                <td>
                    <label>Employer Phone</label>
                </td>
                
                <td>
                
                	<?php $i = explode("-", $applicant_meta['employment_phone']); ?>
                    
                    <label><?php echo $i[0] ? $i[0] : ''; ?> - </label>
                    <label><?php echo $i[1] ? $i[1] : ''; ?> - </label> 
                    <label><?php echo $i[2] ? $i[2] : ''; ?></label>
                    
                    <?php unset($i); ?>
                    
                </td>
                
            </tr>
            
            <tr>
                
                <td>
                    <label>Employer Zip / Postal Code</label>
                </td>
                
                <td>
                    <label><?php echo $applicant_meta['employer_zip_postal_code'] ? $applicant_meta['employer_zip_postal_code'] : ''; ?></label>
                </td>
                
            </tr>
            
            <tr>
                
                <td>
                    <label>Name of Employer</label>
                </td>
                
                <td>
                
                	<?php $i = $applicant_meta['name_of_employer']; ?>
                    
                    <label><?php echo $i ? $i : ''; ?></label>
                    
                    <?php unset($i); ?>
                    
                </td>
                
            </tr>
            
            <tr>
            
                <td>
                    <label>Occupation Title</label>
                </td>
                
                <td>
                
                	<?php $i = $applicant_meta['occupation_title']; ?>
                    
                    <label><?php echo $i ? $i : ''; ?></label>
                    
                    <?php unset($i); ?>
                    
                </td>
                
            </tr>
            
            <tr>
            
                <td>
                    <label>Employment Income</label>
                </td>
                
                <td>
                
                	<?php $i = $applicant_meta['employment_income']; ?>
                    
                    <label><?php echo $i ? $i : ''; ?></label>.00 <small>(Monthly pre-tax / gross amount)</small>
                    
                    <?php unset($i); ?>
                     
                </td>
                
            </tr>
            
            <tr>
            
                <td>
                    <label>Other Income</label>
                </td>
                
                <td>
                
                	<?php $i = $applicant_meta['other_income']; ?>
                    
                    <label><?php echo $i ? $i : ''; ?>.00<label>
                    
                    <?php unset($i); ?>
                     
                </td>
                
            </tr>
            
            <tr>
            
                <td>
                    <label>Source of other Income</label>
                </td>
                
                <td>
                
                	<?php $i = $applicant_meta['source_of_other_income']; ?>
                    
                    <label><?php echo $i ? $i : ''; ?></label>
                    
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
                
                    <label><?php echo $i[0] ? $i[0] : ''; ?></label> Years 
                    <label><?php echo $i[1] ? $i[1] : ''; ?></label> Month
                    
                    <?php unset($i); ?>
                    
                </td>
                
            </tr>
            
            <tr>
            
                <td>
                    <label>Name of Previous Employer</label>
                </td>
                
                <td>
                
                	<?php $i = $applicant_meta['name_of_prev_employer']; ?>
                    
                    <label><?php echo $i ? $i : ''; ?></label>
                    
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
                    
                    <label><?php echo $x[0] ? $x[0] : ''; ?> - </label>
                    <label><?php echo $x[1] ? $x[1] : ''; ?> - </label>
                    <label><?php echo $x[2] ? $x[2] : ''; ?> - </label>
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
                    
                    <label><?php echo $i ? $i : ''; ?></label>
                    
                    <?php unset($i); ?>
                    
                </td>
                
            </tr>
            
            <tr>
            
                <td>
                    <label>Savings Account</label>
                </td>
                
                <td>
                
                	<?php $i = $applicant_meta['savings_account']; ?>
                
                    <label><?php echo $i ? $i : ''; ?></label>
                    
                    <?php unset($i); ?>
                    
                </td>
                
            </tr>
            
            <tr>
            
                <td>
                    <label>Bank Name</label>
                </td>
                
                <td>
                
                	<?php $i = $applicant_meta['bank_name']; ?>
                    
                    <label><?php echo $i ? $i : ''; ?></label>
                    
                    <?php unset($i); ?>
                    
                </td>
                
            </tr>
            
            <tr>
            
                <td>
                    <label>Down Payment</label>
                </td>
                
                <td>
                
                	<?php $i = $applicant_meta['downpayment']; ?>
                    
                    <label><?php echo $i ? $i : ''; ?>.00</label>
                    
                    <?php unset($i); ?>
                    
                </td>
                
            </tr>
            
            <tr>
            
                <td>
                    <label>Vehicle Preference:</label>
                </td>
                
                <td>
                
                	<?php $i = $applicant_meta['vehicle_preference']; ?>
                    
                    <label><?php echo $i ? $i : ''; ?></label>
                    
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
                    
                    <label><?php echo $i ? $i : ''; ?></label>
                    
                    <?php unset($i); ?>
                    
                </td>
                
            </tr>
            
            <tr>
            
                <td>
                    <label>Make:</label>
                </td>
                
                <td>
                
                	<?php $i = $applicant_meta['make']; ?>
                    
                    <label><?php echo $i ? $i : ''; ?></label>
                    
                    <?php unset($i); ?>
                    
                </td>
                
            </tr>
            
            <tr>
            
                <td>
                    <label>Model:</label>
                </td>
                
                <td>
                
                	<?php $i = $applicant_meta['model']; ?>
                    
                    <label><?php echo $i ? $i : ''; ?></label>
                    
                    <?php unset($i); ?>
                    
                </td>
                
            </tr>
            
            <tr>
            
                <td>
                    <label>Mileage:</label>
                </td>
                
                <td>
                
                	<?php $i = $applicant_meta['mileage']; ?>
                    
                    <label><?php echo $i ? $i : ''; ?></label>
                    
                    <?php unset($i); ?>
                    	
                </td>
                
            </tr>
            
            <tr>
            
                <td>
                    <label>Current Monthly Payment:</label>
                </td>
                
                <td>
                
                	<?php $i = $applicant_meta['current_monthly_payment']; ?>
                    
                    <label><?php echo $i ? $i : ''; ?>.00</label>
                    
                    <?php unset($i); ?>
                    
                </td>
                
            </tr>
            
            <tr>
            
                <td>
                    <label>Lien Holder:</label>
                </td>
                
                <td>
                
                	<?php $i = $applicant_meta['lien_holder']; ?>
                    
                    <label><?php echo $i ? $i : ''; ?></label>
                    
                    <?php unset($i); ?>
                    
                </td>
                
            </tr>
            
            <tr>
            
                <td>
                        <label>Credit Profile</label>
                </td>
                
                <td>
                        <label><?php echo $applicant_meta['credit_profile']; ?></label>
                </td>
                
            </tr>
            
            
            
            
			<?php if( $applicant_meta['co_buyer_bool'] == 'yes' ) { ?>
            
            <tr>

            <!--co buyer table-->
            
            <table id="tbl_co_buyer">
            
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
                        
                        <label><?php echo $co_first_name ? $co_first_name :''; ?> <label>
                        <label><?php echo $co_initial_name ? $co_initial_name :''; ?> </label>
                        <label><?php echo $co_last_name ? $co_last_name :''; ?> </label>
                        
                    </td>
                    
                </tr>
                
                
                <tr>
         
                    <td>
                        <label>Social Secureity Number</label>
                    </td>
                    
                    <td>
                    	
                        <?php $i = explode("-",$co_applicant_meta['sss']); ?>
                        
                        <label><?php echo $i[0] ? $i[0] : ''; ?> - </label>
                        <label><?php echo $i[1] ? $i[1] : ''; ?> - </label>
                        <label><?php echo $i[2] ? $i[2] : ''; ?></label>
                        
                        <?php unset($i); ?>
                        
                    </td>
                    
                </tr>
                
                <tr>
         
                    <td>
                        <label>Date of Birth</label>
                    </td>
                    
                    <td>
                    
                    	<?php $i = $co_applicant_meta['bdate']; ?>
                        
                        <label><?php echo $i ? $i : ''; ?></label>
                        
                        <?php unset($i); ?>
                        
                    </td>
                    
                </tr>
                
                <tr>
         
                    <td>
                        <label>Home Phone</label>
                    </td>
                    
                    <td>
                    
                    	<?php $i = explode("-",$co_applicant_meta['home_phone']); ?>
                        
                        <label><?php echo $i[0] ? $i[0] : ''; ?> - </label>
                        <label><?php echo $i[1] ? $i[1] : ''; ?> - </label>
                        <label><?php echo $i[2] ? $i[2] : ''; ?></label>
                        
                        <?php unset($i); ?>
                        
                    </td>
                    
                </tr>
                
                <tr>
         
                    <td>
                        <label>Is the Home Phone under you name?</label>
                    </td>
                    
                    <td>
                    	
                        <?php $i = $co_applicant_meta['phone_under_your_name']; ?>
                        
                        <label><?php echo $i ? $i : ''; ?></label>
                        
                        <?php unset($i); ?>
                        
                    </td>
                    
                </tr>
                
                <tr>
                
                    <td>
                        <label>Email Address</label>
                    </td>
                
                    <td>
                    
                    	<?php $i = $co_applicant_meta['email']; ?>
                        
                        <label><?php echo $i ? $i : ''; ?></label>
                        
                        <?php unset($i); ?>
                        
                    </td>
                    
                </tr>
                
                <tr>
                
                    <td>
                        <label>Other Phone</label>
                    </td>
                    
                     <td>
                     
                     	<?php $i = explode("-",$co_applicant_meta['other_home_phone']); ?>
                        
                        <label><?php echo $i[0] ? $i[0] : ''; ?>- </label>
                        <label><?php echo $i[1] ? $i[1] : ''; ?>- </label>
                        <label><?php echo $i[2] ? $i[2] : ''; ?></label>
                        
                        <?php unset($i); ?>
                        
                    </td>
                    
                </tr>
                
                 <tr>
         
                    <td>
                        <label>Is the Home Phone under you name?</label>
                    </td>
                    
                    <td>
                    
                    	<?php $i = $co_applicant_meta['other_phone_under_your_name']; ?>
                        
                        <label><?php echo $i ? $i : ''; ?></label>
                        
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
                        
                        <label><?php echo $i[0] ? $i[0] : ''; ?></label> Year 
                        <label><?php echo $i[1] ? $i[1] : ''; ?></label> Month 
                        
                        <?php unset($i); ?>
                        
                    </td>
                    
                </tr>
                
                <tr>
                
                    <td>
                        <label>Residence Type</label>
                    </td>
                    
                    <td>
                    
                    	<?php $i = $co_applicant_meta['residence_type']; ?>
                        
                        <label><?php echo $i ? $i : ''; ?></label>
                            
                        <?php unset($i); ?>
                        
                    </td>
                    
                </tr>
                
                <tr>
                
                    <td>
                        <label>Street Address</label>
                    </td>
                    
                    <td>
                    
                    	<?php $i = $co_applicant_meta['street_address']; ?>
                        
                        <label><?php echo $i ? $i : ''; ?></label>
                        
                        <?php unset($i); ?>
                         
                    </td>
                    
                </tr>
                
                <tr>
                
                    <td>
                        <label>City</label>
                    </td>
                    
                    <td>
                    
                    	<?php $i = $co_applicant_meta['city']; ?>
                        
                        <label><?php echo $i ? $i : ''; ?></label>
                        
                        <?php unset($i); ?>
                        
                    </td>
                    
                </tr>
                
                <tr>
                
                    <td>
                        <label>State/Province</label>
                    </td>
                    
                    <td>
                    
                    	<?php $i = $co_applicant_meta['state_province_radio']; ?>
                        
                        <label><?php echo $co_applicant_meta['state_province'] ? $co_applicant_meta['state_province'] : ''; ?> </label>
                        
                        <label><?php echo $i ? $i : ''; ?></label>
                        
                        <?php unset($i); ?>
                        
                    </td>
                    
                </tr>
                
                <tr>
                
                    <td>
                        <label>Zip/Postal Code</label>
                    </td>
                    
                    <td>
                    
                    	<?php $i = $co_applicant_meta['zip_postal_code']; ?>
                        
                        <label><?php echo $i ? $i : ''; ?></label>
                        
                        <?php unset($i); ?>
                        
                    </td>
                    
                </tr>
                
                <tr>
                
                    <td>
                        <label>Housing Payment</label>
                    </td>
                    
                    <td>
                    
                    	<?php $i = $co_applicant_meta['housing_payment']; ?>
                        
                        <label><?php echo $i ? $i : ''; ?>.00</label>
                        
                        <?php unset($i); ?>
                        
                    </td>
                    
                </tr>
                
                <tr>
                
                    <td>
                        <label>Time at Previous Address</label>
                    </td>
                    
                    <td>
                    
                        <label><?php echo $co_applicant_meta['time_at_prev_add_year'] ? $co_applicant_meta['time_at_prev_add_year'] : ''; ?></label> Year 
                         
                        <label><?php echo $co_applicant_meta['time_at_prev_add_month'] ? $co_applicant_meta['time_at_prev_add_month'] : ''; ?></label> Month
                        
                    </td>
                    
                </tr>
                
                <tr>
                    
                    <td>
                        <label>Previous Address</label>
                    </td>
                    
                    <td>
                    
                    	<?php $i = $co_applicant_meta['previous_add']; ?>
                        
                        <label><?php echo $i ? $i : ''; ?></label>
                        
                        <?php unset($i); ?>
                        
                    </td>
                    
                </tr>
                
                <tr>
                
                    <td>
                        <label>Previous City</label>
                    </td>
                    
                    <td>
                    
                    	<?php $i = $co_applicant_meta['prev_city']; ?>
                        
                        <label><?php echo $i ? $i : ''; ?></label>
                        
                        <?php unset($i); ?>
                        
                    </td>
                    
                </tr>
                
                <tr>
                
                    <td>
                        <label>Previous Zip/Postal Code</label>
                    </td>
                    
                    <td>
                    
                    	<?php $i = $co_applicant_meta['prev_zip_postal_code']; ?>
                        
                        <label><?php echo $i ? $i : ''; ?></label>
                        
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
                        
                        <label><?php 
						
						if($i == 'w2_employee'){ echo 'W2 Employee'; }
						
						if($i == 'self_employed'){ echo '1099 / Self Employed'; }
						
						if($i == 'fixed_income'){ echo 'Fixed Income'; }
						
						?></label>
                        
                        <?php unset($i); ?>
                        
                    </td>
                    
                </tr>
                
                <tr>
                
                    <td>
                        <label>Time with Employment</label>
                    </td>
                    
                    <td>
                    
                        <label><?php echo $co_applicant_meta['time_with_employment_year'] ? $co_applicant_meta['time_with_employment_year'] : ''; ?></label> Year
                        
                        <label><?php echo $co_applicant_meta['time_with_employment_month'] ? $co_applicant_meta['time_with_employment_month'] : ''; ?></label> Month
                        
                    </td>
                    
                </tr>
                
                <tr>
                
                    <td>
                        <label>Employer Phone</label>
                    </td>
                    
                    <td>
                    
                    	<?php $i = explode("-",$co_applicant_meta['employment_phone']); ?>
                        
                        <label><?php echo $i[0] ? $i[0] : ''; ?> - </label>
                        <label><?php echo $i[1] ? $i[1] : ''; ?> - </label>
                        <label><?php echo $i[2] ? $i[2] : ''; ?></label>
                        
                        <?php unset($i); ?>
                        
                    </td>
                    
                </tr>
                
                <tr>
                    
                    <td>
                        <label>Employer Zip / Postal Code</label>
                    </td>
                    
                    <td>
                    
                    	<?php $i = $co_applicant_meta['employer_zip_postal_code']; ?>
                        
                        <label><?php echo $i ? $i : ''; ?></label>
                        
                        <?php unset($i); ?>
                        
                    </td>
                    
                </tr>
                
                <tr>
                    
                    <td>
                        <label>Name of Employer</label>
                    </td>
                    
                    <td>
                    
                    	<?php $i = $co_applicant_meta['name_of_employer']; ?>
                        
                        <label><?php echo $i ? $i : ''; ?></label>
                        
                        <?php unset($i); ?>
                        
                    </td>
                    
                </tr>
                
                <tr>
                
                    <td>
                        <label>Occupation Title</label>
                    </td>
                    
                    <td>
                    
                    	<?php $i = $co_applicant_meta['occupation_title']; ?>
                        
                        <label><?php echo $i ? $i : ''; ?></label>
                        
                        <?php unset($i); ?>
                        
                    </td>
                    
                </tr>
                
                <tr>
                
                    <td>
                        <label>Employment Income</label>
                    </td>
                    
                    <td>
                    
                    	<?php $i = $co_applicant_meta['employment_income']; ?>
                        
                        <label><?php echo $i ? $i : ''; ?>.00</label><small> (Monthly pre-tax / gross amount)</small>
                        
                        <?php unset($i); ?>
                        
                    </td>
                    
                </tr>
                
                <tr>
                
                    <td>
                        <label>Other Income</label>
                    </td>
                    
                    <td>
                    
                    	<?php $i = $co_applicant_meta['other_income']; ?>
                        
                        <label><?php echo $i ? $i : ''; ?>.00</label>
                        
                        <?php unset($i); ?>
                        
                    </td>
                    
                </tr>
                
                <tr>
                
                    <td>
                        <label>Source of other Income</label>
                    </td>
                    
                    <td>
                    
                    	<?php $i = $co_applicant_meta['source_of_other_income']; ?>
                        
                        <label><?php echo $i ? $i : ''; ?></label>
                        
                        <?php unset($i); ?>
                        
                    </td>
                    
                </tr>
                
                <tr>
                
                    <td>
                        <label>Time with Previous Employer</label>
                    </td>
                    
                    <td>
                    
                        <label><?php echo $co_applicant_meta['time_with_prev_employer_year'] ? $co_applicant_meta['time_with_prev_employer_year'] : ''; ?></label> Years 
                        
                        <label><?php echo $co_applicant_meta['time_with_prev_employer_month'] ? $co_applicant_meta['time_with_prev_employer_month'] : ''; ?></label> Month
                        
                    </td>
                    
                </tr>
                
                <tr>
                
                    <td>
                        <label>Name of Previous Employer</label>
                    </td>
                    
                    <td>
                    	
                        <?php $i = $co_applicant_meta['name_of_prev_employer']; ?>
                        
                        <label><?php echo $i ? $i : ''; ?></label>
                        
                         <?php unset($i); ?>
                         
                    </td>
                    
                </tr>
                
                <tr>
                
                    <td>
                        <label>Previous Employer Phone Number</label>
                    </td>
                    
                    <td>
                    
                    	<?php $i = explode("-",$co_applicant_meta['previous_employer_number']); ?>
                        
                        <label><?php echo $i[0] ? $i[0] : ''; ?> - </label>
                        <label><?php echo $i[1] ? $i[1] : ''; ?> - </label>
                        <label><?php echo $i[2] ? $i[2] : ''; ?></label>
                        
                        <?php unset($i); ?>
                        
                    </td>
                    
                </tr>
                
                </table>
                
             </tr>
    
            <!--/co buyer table-->
            
            
            <?php } ?>
            
            <input type="hidden" id="csv_nonce" value="<?php echo wp_create_nonce('csv_nonce'); ?>" />
            
            <input type="hidden" id="csv_url" value="<?php echo CLM_URI_ . "controller/download-csv.php"?>"  />

         </table>

        
        <?php
		
		
		
}

function CLM_check( $arg )
{
	return $arg ? $arg : null;
}