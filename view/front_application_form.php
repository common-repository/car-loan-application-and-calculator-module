<?php

function clm_display_form()
{
	$clm_model = new CLM_MODEL();
	
	$clm_model->check_js();
	
	?>

    <div id="clm_result">
    
    <form id="loan_app_form">
    
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
                <input type="text" name="first_name" />
                <input type="text" name="middle_name" />
                <input type="text" name="last_name" />
            </td>
            
        </tr>
        
        
        <tr>
 
        	<td>
            	<label>Social Secureity Number</label>
            </td>
            
            <td>
                <input type="text" name="sss_1" size="4" maxlength="3" class="input_num_only" /> - 
                <input type="text" name="sss_2" size="4" maxlength="2" class="input_num_only" /> - 
                <input type="text" name="sss_3" size="4" maxlength="4" class="input_num_only" />
            </td>
            
        </tr>
        
        <tr>
 
        	<td>
            	<label>Date of Birth</label>
            </td>
            
            <td>
                <input type="text" name="birth_date" placeholder="yy/mm/dd" />
            </td>
            
        </tr>
        
        <tr>
 
        	<td>
            	<label>Home Phone</label>
            </td>
            
            <td>
                <input type="text" name="home_phone_1" class="input_num_only" maxlength="3" size="4" /> - 
                <input type="text" name="home_phone_2" class="input_num_only" maxlength="3" size="4" /> - 
                <input type="text" name="home_phone_3" class="input_num_only" maxlength="4" size="4" />
            </td>
            
        </tr>
        
        <tr>
 
        	<td>
            	<label>Is the Home Phone under you name?</label>
            </td>
            
            <td>
                <input type="radio" name="phone_under_your_name" value="yes" checked="checked" /> Yes 
                <input type="radio" name="phone_under_your_name" value="no"  /> No
            </td>
            
        </tr>
        
        <tr>
        
        	<td>
            	<label>Email Address</label>
            </td>
        
        	<td>
            	<input type="text" name="email"  />
            </td>
            
        </tr>
        
        <tr>
        
        	<td>
            	<label>Other Phone</label>
            </td>
            
             <td>
                <input type="text" name="other_home_phone_1" class="input_num_only" maxlength="3" size="4" />
                <input type="text" name="other_home_phone_2" class="input_num_only" maxlength="3" size="4" />
                <input type="text" name="other_home_phone_3" class="input_num_only" maxlength="4" size="4" />
            </td>
            
        </tr>
        
         <tr>
 
        	<td>
            	<label>Is this Home Phone under you name?</label>
            </td>
            
            <td>
                <input type="radio" name="other_phone_under_your_name" value="yes" checked="checked" /> Yes 
                <input type="radio" name="other_phone_under_your_name" value="no"  /> No
            </td>
            
        </tr>
        
        <tr>
        
        	<td>
            	<label>Time at Present Address</label>
            </td>
            
            <td>
            	<input type="text" name="time_at_present_address_year" class="input_num_only" maxlength="2" /> Year 
                <input type="text" name="time_at_present_address_month" class="input_num_only" maxlength="2" /> Month 
            </td>
            
        </tr>
        
        <tr>
        
        	<td>
            	<label>Residence Type</label>
            </td>
            
            <td>
            	<input type="radio" name="residence_type" value="renting" checked="checked" /> Renting 
                <input type="radio" name="residence_type" value="own_buying"  /> Own/Buying
                <input type="radio" name="residence_type" value="living_with_family"  /> Living with Family
            </td>
            
        </tr>
        
        <tr>
        
        	<td>
            	<label>Street Address</label>
            </td>
            
            <td>
            	<input type="text" name="street_address"  /> 
            </td>
            
        </tr>
        
        <tr>
        
        	<td>
            	<label>City</label>
            </td>
            
            <td>
            	<input type="text" name="city" />
            </td>
            
        </tr>
        
        <tr>
        
        	<td>
            	<label>State/Province</label>
            </td>
            
            <td>
           		<?php
            	$province = get_option('clm_provinces');
				$province = unserialize( $province );
				?>
            	<input type="text" name="state_province" />
                <select name="state_province_radio">
                
                	<?php for( $x=0; $x<count($province); $x++ ) {?>
                    
                		<option value="<?php echo $province[$x]; ?>"><?php echo ucwords($province[$x]); ?></option>
                    
					<?php } unset($x); ?>
                    
                </select>
            </td>
            
        </tr>
        
        <tr>
        
        	<td>
            	<label>Zip/Postal Code</label>
            </td>
            
            <td>
            	<input type="text" name="zip_postal_code" class="input_num_only" maxlength="6" />
            </td>
            
        </tr>
        
        <tr>
        
        	<td>
            	<label>Housing Payment</label>
            </td>
            
            <td>
            	<input type="text" name="housing_payment" class="input_num_only" maxlength="16" placeholder="$" />.00 Per Month
            </td>
            
        </tr>
        
        <tr>
        
        	<td>
            	<label>Time at Previous Address</label>
            </td>
            
            <td>
            	<input type="text" name="time_at_prev_add_year" class="input_num_only" maxlength="2" size="3" /> Year  
                <input type="text" name="time_at_prev_add_month" class="input_num_only" maxlength="2" size="3" /> Month
            </td>
            
        </tr>
        
        <tr>
        	
            <td>
            	<label>Previous Address</label>
            </td>
            
            <td>
            	<input type="text" name="previous_add" />
            </td>
            
        </tr>
        
        <tr>
        
        	<td>
            	<label>Previous City</label>
            </td>
            
            <td>
            	<input type="text" name="prev_city"  />
            </td>
            
        </tr>
        
        <tr>
        
        	<td>
            	<label>Previous Zip/Postal Code</label>
            </td>
            
            <td>
            	<input type="text" name="prev_zip_postal_code" class="input_num_only" maxlength="6" />
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
            	<input type="radio" name="employment_type" value="w2_employee" checked="checked" /> W2 Employee
                <input type="radio" name="employment_type" value="self_employed" /> 1099 / Self Employed
                <input type="radio" name="employment_type" value="fixed_income" /> Fixed Income
            </td>
            
        </tr>
        
        <tr>
        
        	<td>
            	<label>Time with Employment</label>
            </td>
            
            <td>
            	<input type="text" name="time_with_employment_year" class="input_num_only" maxlength="2" size="3" /> Year
                <input type="text" name="time_with_employment_month" class="input_num_only" maxlength="2" size="3" /> Month
            </td>
            
        </tr>
        
        <tr>
        
        	<td>
            	<label>Employer Phone</label>
            </td>
            
            <td>
            	<input type="text" name="employment_phone_1" class="input_num_only" maxlength="3" size="3"  /> - 
                <input type="text" name="employment_phone_2" class="input_num_only" maxlength="3" size="3" /> - 
                <input type="text" name="employment_phone_3" class="input_num_only" maxlength="4" size="3" />
            </td>
            
        </tr>
        
        <tr>
        	
            <td>
            	<label>Employer Zip / Postal Code</label>
            </td>
            
            <td>
            	<input type="text" name="employer_zip_postal_code" class="input_num_only" maxlength="6" />
            </td>
            
        </tr>
        
        <tr>
        	
            <td>
            	<label>Name of Employer</label>
            </td>
            
            <td>
            	<input type="text" name="name_of_employer" />
            </td>
            
        </tr>
        
        <tr>
        
        	<td>
            	<label>Occupation Title</label>
            </td>
            
            <td>
            	<input type="text" name="occupation_title" />
            </td>
            
        </tr>
        
        <tr>
        
        	<td>
            	<label>Employment Income</label>
            </td>
            
            <td>
            	<input type="text" name="employment_income" class="input_num_only" maxlength="16" placeholder="$" />.00 <small>(Monthly pre-tax / gross amount)</small>
            </td>
            
        </tr>
        
        <tr>
        
        	<td>
            	<label>Other Income</label>
            </td>
            
            <td>
            	<input type="text" name="other_income" class="input_num_only" maxlength="16" placeholder="$" />.00
            </td>
            
        </tr>
        
        <tr>
        
        	<td>
            	<label>Source of other Income</label>
            </td>
            
            <td>
            	<input type="text" name="source_of_other_income" />
            </td>
            
        </tr>
        
        <tr>
        
        	<td>
            	<label>Time with Previous Employer</label>
            </td>
            
            <td>
            	<input type="text" name="time_with_prev_employer_year" class="input_num_only" maxlength="2" size="3" /> Years 
                <input type="text" name="time_with_prev_employer_month" class="input_num_only" maxlength="2" size="3" /> Month
            </td>
            
        </tr>
        
        <tr>
        
        	<td>
            	<label>Name of Previous Employer</label>
            </td>
            
            <td>
            	<input type="text" name="name_of_prev_employer" />
            </td>
            
        </tr>
        
        <tr>
        
        	<td>
            	<label>Previous Employer Phone Number</label>
            </td>
            
            <td>
            	<input type="text" name="previous_employer_number_1" class="input_num_only" maxlength="3" size="3" /> - 
                <input type="text" name="previous_employer_number_2" class="input_num_only" maxlength="3" size="3" /> - 
                <input type="text" name="previous_employer_number_3" class="input_num_only" maxlength="4" size="3" />
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
            	<input type="radio" name="checking_account" value="yes" checked="checked" /> Yes 
                <input type="radio" name="checking_account" value="no" /> No
            </td>
            
        </tr>
        
        <tr>
        
        	<td>
            	<label>Savings Account</label>
            </td>
            
            <td>
            	<input type="radio" name="savings_account" value="yes" checked="checked" /> Yes
                <input type="radio" name="savings_account" value="no" /> No
            </td>
            
        </tr>
        
        <tr>
        
        	<td>
            	<label>Bank Name</label>
            </td>
            
            <td>
            	<input type="text" name="bank_name"  />
            </td>
            
        </tr>
        
        <tr>
        
        	<td>
            	<label>Down Payment</label>
            </td>
            
            <td>
            	<input type="text" name="downpayment" placeholder="$" class="input_num_only" maxlength="16"  />.00
            </td>
            
        </tr>
        
        <tr>
        
        	<td>
            	<label>Vehicle Preference:</label>
            </td>
            
            <td>
            
            	<?php 
				
				$vehicles = get_option('clm_vehicles');
				$vehicles = unserialize( $vehicles );
				
				?>
                
            	<select name="vehicle_preference">
                
                	<?php for ($x=0; $x < count($vehicles); $x++ ) { ?>
                    
                	<option value="<?php echo $vehicles[$x]; ?>"> <?php echo ucwords($vehicles[$x]); ?> </option>
                    
                    <?php } ?>
                    
                </select>
                
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
            	<input type="text" name="model_year" />
            </td>
            
        </tr>
        
        <tr>
        
        	<td>
            	<label>Make:</label>
            </td>
            
            <td>
            	<input type="text" name="make" />
            </td>
            
        </tr>
        
        <tr>
        
        	<td>
            	<label>Model:</label>
            </td>
            
            <td>
            	<input type="text" name="model" />
            </td>
            
        </tr>
        
        <tr>
        
        	<td>
            	<label>Mileage:</label>
            </td>
            
            <td>
            	<input type="text" name="mileage" />
            </td>
            
        </tr>
        
        <tr>
        
        	<td>
            	<label>Current Monthly Payment:</label>
            </td>
            
            <td>
            	<input type="text" name="current_monthly_payment" placeholder="$" class="input_num_only" maxlength="16" />.00
            </td>
            
        </tr>
        
        <tr>
        
        	<td>
            	<label>Lien Holder:</label>
            </td>
            
            <td>
            	<input type="text" name="lien_holder"  />
            </td>
            
        </tr>
        
        <tr>
        
        	<td>
            	<label>Will there be a CO-BUYER?</label>
            </td>
            
            <td>
                <select id="co_buyer_bool" name="co_buyer_bool" onchange="coBuyer();">
                	<option value="no" selected="selected"> No </option>
                    <option value="yes"> Yes </option>
                </select>
            </td>
            
        </tr>
        
        
        
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
                    <input type="text" name="co_first_name" />
                    <input type="text" name="co_middle_name" />
                    <input type="text" name="co_last_name" />
                </td>
                
            </tr>
            
            
            <tr>
     
                <td>
                    <label>Social Secureity Number</label>
                </td>
                
                <td>
                    <input type="text" name="co_sss_1" class="input_num_only" maxlength="3" size="4" /> - 
                    <input type="text" name="co_sss_2" class="input_num_only" maxlength="2" size="4" /> - 
                    <input type="text" name="co_sss_3" class="input_num_only" maxlength="4" size="4" />
                </td>
                
            </tr>
            
            <tr>
     
                <td>
                    <label>Date of Birth</label>
                </td>
                
                <td>
                    <input type="text" name="co_birth_date" placeholder="yy/mm/dd" maxlength="16" />
                </td>
                
            </tr>
            
            <tr>
     
                <td>
                    <label>Home Phone</label>
                </td>
                
                <td>
                    <input type="text" name="co_home_phone_1" class="input_num_only" maxlength="3" size="4" />
                    <input type="text" name="co_home_phone_2" class="input_num_only" maxlength="3" size="4" />
                    <input type="text" name="co_home_phone_3" class="input_num_only" maxlength="4" size="4" />
                </td>
                
            </tr>
            
            <tr>
     
                <td>
                    <label>Is the Home Phone under you name?</label>
                </td>
                
                <td>
                    <input type="radio" name="co_phone_under_your_name" value="yes" checked="checked" /> Yes 
                    <input type="radio" name="co_phone_under_your_name" value="no"  /> No
                </td>
                
            </tr>
            
            <tr>
            
                <td>
                    <label>Email Address</label>
                </td>
            
                <td>
                    <input type="text" name="co_email"  />
                </td>
                
            </tr>
            
            <tr>
            
                <td>
                    <label>Other Phone</label>
                </td>
                
                 <td>
                    <input type="text" name="co_other_home_phone_1" class="input_num_only" maxlength="3" size="4" /> - 
                    <input type="text" name="co_other_home_phone_2" class="input_num_only" maxlength="3" size="4" /> - 
                    <input type="text" name="co_other_home_phone_3" class="input_num_only" maxlength="4" size="4" />
                </td>
                
            </tr>
            
             <tr>
     
                <td>
                    <label>Is the Home Phone under you name?</label>
                </td>
                
                <td>
                    <input type="radio" name="co_other_phone_under_your_name" value="yes" checked="checked" /> Yes 
                    <input type="radio" name="co_other_phone_under_your_name" value="no"  /> No
                </td>
                
            </tr>
            
            <tr>
            
                <td>
                    <label>Time at Present Address</label>
                </td>
                
                <td>
                    <input type="text" name="co_time_at_present_address_year" class="input_num_only" maxlength="2" size="3" /> Year 
                    <input type="text" name="co_time_at_present_address_month" class="input_num_only" maxlength="2" size="3" /> Month 
                </td>
                
            </tr>
            
            <tr>
            
                <td>
                    <label>Residence Type</label>
                </td>
                
                <td>
                    <input type="radio" name="co_residence_type" value="renting" checked="checked" /> Renting 
                    <input type="radio" name="co_residence_type" value="own_buying"  /> Own/Buying
                    <input type="radio" name="co_residence_type" value="living_with_family"  /> Living with Family
                </td>
                
            </tr>
            
            <tr>
            
                <td>
                    <label>Street Address</label>
                </td>
                
                <td>
                    <input type="text" name="co_street_address"  /> 
                </td>
                
            </tr>
            
            <tr>
            
                <td>
                    <label>City</label>
                </td>
                
                <td>
                    <input type="text" name="co_city" />
                </td>
                
            </tr>
            
            <tr>
            
                <td>
                    <label>State/Province</label>
                </td>
                
                <td>
                	<?php
					$province = get_option('clm_provinces');
					$province = unserialize( $province );
					?>
                    <input type="text" name="co_state_province" />
                    <select name="co_state_province_radio">
                    
                    	<?php for( $x=0; $x<count($province); $x++ ) { ?>
                        
                    		<option value="<?php echo $province[$x]; ?>"><?php echo ucwords($province[$x]); ?></option>
                        
                        <?php } unset($x); ?>
                        
                    </select>
                </td>
                
            </tr>
            
            <tr>
            
                <td>
                    <label>Zip/Postal Code</label>
                </td>
                
                <td>
                    <input type="text" name="co_zip_postal_code" class="input_num_only" maxlength="6" />
                </td>
                
            </tr>
            
            <tr>
            
                <td>
                    <label>Housing Payment</label>
                </td>
                
                <td>
                    <input type="text" name="co_housing_payment" class="input_num_only" maxlength="16" placeholder="$" />.00 Per Month
                </td>
                
            </tr>
            
            <tr>
            
                <td>
                    <label>Time at Previous Address</label>
                </td>
                
                <td>
                    <input type="text" name="co_time_at_prev_add_year" class="input_num_only" maxlength="2" size="3" /> Year  
                    <input type="text" name="co_time_at_prev_add_month" class="input_num_only" maxlength="2" size="3" /> Month
                </td>
                
            </tr>
            
            <tr>
                
                <td>
                    <label>Previous Address</label>
                </td>
                
                <td>
                    <input type="text" name="co_previous_add" />
                </td>
                
            </tr>
            
            <tr>
            
                <td>
                    <label>Previous City</label>
                </td>
                
                <td>
                    <input type="text" name="co_prev_city"  />
                </td>
                
            </tr>
            
            <tr>
            
                <td>
                    <label>Previous Zip/Postal Code</label>
                </td>
                
                <td>
                    <input type="text" name="co_prev_zip_postal_code" class="input_num_only" maxlength="6" />
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
                    <input type="radio" name="co_employment_type" value="w2_employee" checked="checked" /> W2 Employee
                    <input type="radio" name="co_employment_type" value="self_employed" /> 1099 / Self Employed
                    <input type="radio" name="co_employment_type" value="fixed_income" /> Fixed Income
                </td>
                
            </tr>
            
            <tr>
            
                <td>
                    <label>Time with Employment</label>
                </td>
                
                <td>
                    <input type="text" name="co_time_with_employment_year" class="input_num_only" maxlength="2" size="3" /> Year
                    <input type="text" name="co_time_with_employment_month" class="input_num_only" maxlength="2" size="3" /> Month
                </td>
                
            </tr>
            
            <tr>
            
                <td>
                    <label>Employer Phone</label>
                </td>
                
                <td>
                    <input type="text" name="co_employment_phone_1" class="input_num_only" maxlength="3" size="4" /> - 
                    <input type="text" name="co_employment_phone_2" class="input_num_only" maxlength="3" size="4" /> - 
                    <input type="text" name="co_employment_phone_3" class="input_num_only" maxlength="4" size="4" />
                </td>
                
            </tr>
            
            <tr>
                
                <td>
                    <label>Employer Zip / Postal Code</label>
                </td>
                
                <td>
                    <input type="text" name="co_employer_zip_postal_code" class="input_num_only" maxlength="6" />
                </td>
                
            </tr>
            
            <tr>
                
                <td>
                    <label>Name of Employer</label>
                </td>
                
                <td>
                    <input type="text" name="co_name_of_employer" />
                </td>
                
            </tr>
            
            <tr>
            
                <td>
                    <label>Occupation Title</label>
                </td>
                
                <td>
                    <input type="text" name="co_occupation_title" />
                </td>
                
            </tr>
            
            <tr>
            
                <td>
                    <label>Employment Income</label>
                </td>
                
                <td>
                    <input type="text" name="co_employment_income" class="input_num_only" maxlength="16" placeholder="$" />.00 <small>(Monthly pre-tax / gross amount)</small>
                </td>
                
            </tr>
            
            <tr>
            
                <td>
                    <label>Other Income</label>
                </td>
                
                <td>
                    <input type="text" name="co_other_income" class="input_num_only" maxlength="16" placeholder="$" />.00
                </td>
                
            </tr>
            
            <tr>
            
                <td>
                    <label>Source of other Income</label>
                </td>
                
                <td>
                    <input type="text" name="co_source_of_other_income" />
                </td>
                
            </tr>
            
            <tr>
            
                <td>
                    <label>Time with Previous Employer</label>
                </td>
                
                <td>
                    <input type="text" name="co_time_with_prev_employer_year" class="input_num_only" maxlength="2" size="3" /> Years 
                    <input type="text" name="co_time_with_prev_employer_month" class="input_num_only" maxlength="2" size="3" /> Month
                </td>
                
            </tr>
            
            <tr>
            
                <td>
                    <label>Name of Previous Employer</label>
                </td>
                
                <td>
                    <input type="text" name="co_name_of_prev_employer" />
                </td>
                
            </tr>
            
            <tr>
            
                <td>
                    <label>Previous Employer Phone Number</label>
                </td>
                
                <td>
                    <input type="text" name="co_previous_employer_number_1" class="input_num_only" maxlength="3" size="4" /> - 
                    <input type="text" name="co_previous_employer_number_2" class="input_num_only" maxlength="3" size="4" /> - 
                    <input type="text" name="co_previous_employer_number_3" class="input_num_only" maxlength="4" size="4" />
                </td>
                
            </tr>
            
            </table>

        <!--/co buyer table-->
        
        </tr>
        
        <tr>
        
        	<th colspan="2">
                    <h5>Credit Profile</h5>
                    <p>Select a Credit Profile</p>
            </th>
            
        </tr>
        
        <tr>
        
                <table>
                
                    <tr>
                    
                        <td>
                            <input type="radio" name="credit_profile" value="excellent" checked="checked"/>
                        </td>
                        
                        <td>
                            <b>Excellent Credit</b> <br  />
                            <label>On the bureau minimum of 5 years. Demonstrated paid as agreed on several installment loans. (ex:mortgage, auto). No slow pays, charge offs or collection items. Credit card balances are no more than 30% of credit limit.</label>
                        </td>
                        
                    </tr>
                    
                    <tr>
                    
                        <td>
                            <input type="radio" name="credit_profile" value="good" />
                        </td>
                        
                        <td>
                            <b>Good Credit</b> <br  />
                            <label>On the bureau minimum of 3 years. Demonstrated paid as agreed on several installment loans. Slow pays are at least 12 months old No charge offs or collection items. Credit card balances are no more than 60% of credit limit.</label>
                        </td>
                        
                    </tr>
                    
                    <tr>
                    
                        <td>
                            <input type="radio" name="credit_profile" value="average" />
                        </td>
                        
                        <td>
                            <b>Average Credit</b> <br  />
                            <label>On the bureau minimum of 2 years. Demonstrated paid as agreed on at least one (1) installment loan of at least $5000.00 Has bought at least one automobile. Slow pays, charge offs and/or collection items at least 12 months old Have some credit card balances and demonstrated paid as agreed. No more than 1 Bankruptcy, repo, or foreclosure and is at least 12 months old.</label>
                        </td>
                        
                    </tr>
                    
                    <tr>
                    
                        <td>
                            <input type="radio" name="credit_profile" value="below" />
                        </td>
                        
                        <td>
                            <b>Below Average Credit</b> <br  />
                            <label>On the bureau minimum of 2 years. Has installment loans but with very poor payment history. Bankruptcy, report, or foreclosure last than 12 months old and possible muliple as well. Credit card balances are max out with very poor payment history. Several slow pays, charge offs and/or collection items less than 12 months old.</label>
                        </td>
                        
                    </tr>
                
                </table>
                
        </tr>
        
        <tr>
        
        	<th colspan="2">
                    <h5>Certification and Authorization</h5>
            </th>
            
        </tr>
        
        <tr>
        
        	<td>
            	<p>By submitting this application, I certify that all information herein is true and complete. I authorize lending institutions and participating auto dealer to retain this application, to rely on the foregoing, to check and verify my credit, employment and salary history. 

By using our website, you authorize us to provide reports on the status of your application, including information concerning whether you pre-qualify for a loan, which lender's loan offer (if any) you choose to accept, whether your application for credit is denied, and whether you accept a loan from that lender. 

Click Here to read the agreement and state-specific notices.</p>
            </td>
            
        </tr>
        
        <tr>
        
        	<td>
            	<input type="checkbox" name="agreement" value="agreement" id="clm_agreement" />
                <label><b>   I have read the agreement and state-specific notices.	</b></label><br /><br />
            </td>
            
        </tr>
        
        <tr>
        
        	<td>
            	<img src="<?php echo CLM_URI_libs.'clm-captcha/captcha.php' ?>" id="captcha" />
            </td>
            
            <td>
            	<div>
            	<input type="text" name="captcha_code" id="captcha_code" size="10" maxlength="6" />
				<label>Enter the code above.</label>
                </div><br />
            </td>
            
        </tr>        
        
        <tr>
        
        	<td>
            	<button id="loan_app_submit">Submit</button>
                <span id="ajax_loader"><img src="<?php echo CLM_URI_img.'ajax-loader.gif'; ?>" /></span>
                <input type="hidden" name="action" value="new_application" />
                <input type="hidden" name="clm_nonce" value="<?php echo wp_create_nonce("clm_nonce"); ?>"  />
            </td>
            
        </tr>
        
    </table>
    
    </form>
    
    </div>
    
    <?php
	
	unset( $clm_model );
}
add_shortcode('deploy_form','clm_display_form');