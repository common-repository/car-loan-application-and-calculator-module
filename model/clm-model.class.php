<?php

/*
*
* @version 1.0
*
***************/

class CLM_MODEL {
	
	
	
	
	public $co_buyer = false;
	
	
	
	/*
	* 
	* @usage: use to filter request arguments
	* 
	* @param: request arguments
	*
	* @return: returns the argument already escaped
	*
	*/
	function escapeThis( $arg )
	{
		return mysql_real_escape_string( $arg );
	}
	
	
	
	
	
	/*
	* 
	* @usage: use to check if the applicant has a Co buyer
	* 
	* @param: the applicant ID
	*
	* @return: returns true if the applicant has a co-buyer
	*
	*/
	function has_co_buyer( $applicant_id )
	{
		
		//check if the applicant has co-buyer
		
		global $clmdb;
		
		$clmdb->initiateConnection();
	
		$clmdb->query("SELECT co_buyer_id FROM ".$clmdb->co_buyers()." WHERE applicant_id = :applicant_id");
			
		$clmdb->prepare();
		
		$clmdb->bindValue(':applicant_id', $applicant_id);
		
		$clmdb->execute();
	
		$res = $clmdb->fetchAssoc();
		
		$clmdb->resetData();
		
		$clmdb->destroyConnection();
		
		if ($res) {
			
			return true;
			
		} else {
			
			return false;
			
		}
		
	}
	
	
	
	
	
	
	/*
	*
	* @usage: use to get the cobuyer informations (full)
	*
	* @param: the applicant ID
	*
	* @return: return the co-buyer object (Note: the 3rd result is a serialize data)
	*
	* when fails, return null;
	*
	*/
	function get_co_buyer_data_by_id( $applicant_id )
	{
		
		global $clmdb;
		
		$clmdb->initiateConnection();
	
		$clmdb->query("SELECT * FROM ".$clmdb->co_buyers()." WHERE applicant_id = :applicant_id");
			
		$clmdb->prepare();
		
		$clmdb->bindValue(':applicant_id', $applicant_id);
		
		$clmdb->execute();
	
		$res = $clmdb->fetchAssoc();
		
		$clmdb->resetData();
		
		$clmdb->destroyConnection();
		
		if ($res) {
			
			return $res;
			
		} else {
			
			return null;
			
		}
		
	}
	
	
	
	/*
	*
	* @usage: use to get all information of applicant by ID
	*
	* @param: the applicant ID
	*
	* @return: return the applicant object (Note: the 3rd result is a serialize data)
	*
	* when fails, return null;
	*
	*/
	function get_applicant_data_by_id( $applicant_id )
	{
		
		global $clmdb;
		
		$clmdb->initiateConnection();
	
		$clmdb->query("SELECT * FROM ".$clmdb->applicants()." WHERE applicant_id = :applicant_id");
			
		$clmdb->prepare();
		
		$clmdb->bindValue(':applicant_id', $applicant_id);
		
		$clmdb->execute();
	
		$res = $clmdb->fetchAssoc();
		
		$clmdb->resetData();
		
		$clmdb->destroyConnection();
		
		if ($res) {
			
			return $res;
			
		} else {
			
			return null;
			
		}
		
		
	}
	
	
	
	/*
	*
	* @usage: use to delete an applicant entry by applicant ID
	*
	* @param: the applicant ID
	*
	* @return: (bool) return true if deleted successful, false if fails
	*
	*/
	function delete_applicant_by_id( $applicant_id )
	{
		
		if( $applicant_id == '')
		{
			
			return;
			
		}
		
		global $clmdb;
		
		$clmdb->initiateConnection();

		$clmdb->query("DELETE FROM ".$clmdb->applicants()." WHERE applicant_id = :applicant_id ");
			
		$clmdb->prepare();
		
		$clmdb->bindValue(':applicant_id', $applicant_id);
		
		$clmdb->execute();
		
		$clmdb->resetData();
		
		if( $clmdb->isSuccess )
		{
			
			return true;
			
		} else {
			
			return false;
			
		}
		
		$clmdb->destroyConnection();
		
		exit;
		
	}
	
	
	
	/*
	*
	* @usage: use to get all total number of applicants in database
	*
	* @param: N/A
	*
	* @return: (int) total numbers of applicant in database
	*
	*/
	function get_total_applicants()
	{
		
		global $clmdb;
		
		$clmdb->initiateConnection();
		
		
		
		$clmdb->query("SELECT * FROM ".$clmdb->applicants()." ORDER BY applicant_id DESC");
		
		$clmdb->prepare();
		
		$clmdb->execute();
		
		$numrows = $clmdb->rowCount();
		
		$clmdb->resetData();
		
		return $numrows;
		
	}
	
	
	
	/*
	* @version 1.0
	*
	* @usage: use to get applicants data full version
	* @param: N/A
	* @return: (array) containing all applicants data
	*
	* @version 1.1
	*
	* @param 1: limit (int)
	*
	*/
	function get_all_applicants_data( $limit = false )
	{
		
		global $clmdb;
		
		$clmdb->initiateConnection();
		
		if( !$limit )
		{
		
			$clmdb->query("SELECT * FROM ".$clmdb->applicants()." ORDER BY applicant_id DESC");
		
		}
		
		if( $limit )
		{
		
			$clmdb->query("SELECT * FROM ".$clmdb->applicants()." ORDER BY applicant_id DESC LIMIT $limit");
		
		} 
		
		$clmdb->prepare();
		
		$clmdb->execute();
		
		$res = $clmdb->fetchAssoc();
		
		$clmdb->resetData();
		
		$clmdb->destroyConnection();
		
		return $res;
		
	}
	
	
	
	
	/*
	*
	* @usage: use to insert new applicant data
	*
	* @param: $data = array()
	*
	* @return: return true when inserted successfully and false otherwise
	*
	*/
	function insert_new_applicant( $data = array() )
	{
		
		if( !is_array($data) )
		{
			return;
		}
		
		global $clmdb;
		
		//segregate data
	
		$buyer = $this->segregate_buyer_info( $data );
		
		
		if( $buyer['co_buyer_bool'] == 'yes' )
		{
			
			$this->co_buyer = true;
			
		}
		
		//serialize for meta
		
		$serializeBuyerData = serialize( $buyer );
		
		
		
		//process
		
		$clmdb->initiateConnection();
		
		$clmdb->query("INSERT INTO ".$clmdb->applicants()." (first_name, initial_name, last_name, email_address, home_phone, applicant_meta) VALUES (:first_name, :middle_name, :last_name, :email_address, :home_phone, :applicant_meta) ");
		
		$clmdb->prepare();
		
		$clmdb->bindValue(':first_name',		$this->setProper($buyer['first_name']) );
		
		$clmdb->bindValue(':middle_name',		$this->setProper($buyer['middle_name']) );
		
		$clmdb->bindValue(':last_name',			$this->setProper($buyer['last_name']) );
		
		$clmdb->bindValue(':email_address',		$this->setProper($buyer['email']) );
		
		$clmdb->bindValue(':home_phone',		$this->setProper($buyer['home_phone']) );
		
		$clmdb->bindValue(':applicant_meta',	$this->setProper($serializeBuyerData) );
		
		$clmdb->execute();
		
		$clmdb->resetData();
		
		$ID = $clmdb->lastInsertedID();
		
		$clmdb->destroyConnection();
		
		return $ID;
		
	}
	
	
	
	/*
	*
	* @usage: use to insert new co-buyer
	*
	* @param1: applicant ID
	*
	* @param2: $data = array()
	*
	* @return: return true when inserted successfully and false otherwise
	*
	*/
	function insert_new_co_buyer( $applicant_id, $data = array() )
	{
		
		if( $applicant_id == '')
		{
			return;
		}
		
		if( !is_array($data) )
		{
			return;
		}
		
		global $clmdb;
		
		$co_buyer 				= $this->segregate_co_buyer_info( $data );
		
		
		$serializeCoBuyerData 	= serialize( $co_buyer );
		
		$clmdb->initiateConnection();

		$clmdb->query("INSERT INTO ".$clmdb->co_buyers()." (applicant_id, first_name, initial_name, last_name, co_buyer_meta) VALUES (:applicant_id, :first_name, :middle_name, :last_name, :co_buyer_meta) ");
		
		$clmdb->prepare();
		
		$clmdb->bindValue(':applicant_id',		$applicant_id);
		
		$clmdb->bindValue(':first_name',		$this->setProper($co_buyer['first_name']) );
		
		$clmdb->bindValue(':middle_name',		$this->setProper($co_buyer['middle_name']) );
		
		$clmdb->bindValue(':last_name',			$this->setProper($co_buyer['last_name']) );
		
		$clmdb->bindValue(':co_buyer_meta',		$this->setProper($serializeCoBuyerData) );
		
		$clmdb->execute();
		
		$clmdb->resetData();
		
		$ID = $clmdb->lastInsertedID();
		
		$clmdb->destroyConnection();
		
		return $ID;

		
	}
	
	
	
	/*
	*
	* @usage: use to update applicant data
	*
	* @param1: applicant ID
	*
	* @param2: $data = array()
	*
	* @return: return applicant ID
	*
	*/
	function update_applicant( $applicant_id, $data = array() )
	{
		
		if( $applicant_id == '')
		{
			return;
		}
		
		if( !is_array($data) )
		{
			return;
		}
		
		//segregate data to only return buyer infos
		$buyer = $this->segregate_buyer_info( $data );
			
		$serializeBuyerData = serialize( $buyer );
		
		
		
		global $clmdb;
		
		$clmdb->initiateConnection();
		
		$clmdb->query("UPDATE ".$clmdb->applicants()." SET first_name=:first_name, initial_name=:middle_name, last_name=:last_name, email_address=:email_address, home_phone=:home_phone, applicant_meta=:applicant_meta WHERE applicant_id=:applicant_id");
		
		$clmdb->prepare();
		
		$clmdb->bindValue(':applicant_id',		$applicant_id);
		
		$clmdb->bindValue(':first_name',		$this->setProper($buyer['first_name']) );
		
		$clmdb->bindValue(':middle_name',		$this->setProper($buyer['middle_name']) );
		
		$clmdb->bindValue(':last_name',			$this->setProper($buyer['last_name']) );
		
		$clmdb->bindValue(':email_address',		$this->setProper($buyer['email']) );
		
		$clmdb->bindValue(':home_phone',		$this->setProper($buyer['home_phone']) );
		
		$clmdb->bindValue(':applicant_meta',	$this->setProper($serializeBuyerData) );
		
		$clmdb->execute();
		
		$clmdb->resetData();
		
		$clmdb->destroyConnection();
		
		return $applicant_id;
	
	}
	
	
	
	/*
	*
	* @usage: use to update co buyer data
	*
	* @param1: applicant ID
	*
	* @param2: $data = array()
	*
	* @return: void
	*
	*/
	function update_co_buyer( $applicant_id, $data = array() )
	{
		
		if( $applicant_id == '')
		{
			return;
		}
		
		if( !is_array($data) )
		{
			return;
		}
		
		//segregate data to only return buyer infos
		$co_buyer = $this->segregate_co_buyer_info( $data );
			
		$serializeCoBuyerData = serialize( $co_buyer );
		
		
		
		global $clmdb;
		
		$clmdb->initiateConnection();
		
		$clmdb->query("UPDATE ".$clmdb->co_buyers()." SET first_name=:first_name, initial_name=:middle_name, last_name=:last_name, co_buyer_meta=:co_buyer_meta WHERE applicant_id=:applicant_id");
		
		$clmdb->prepare();
		
		$clmdb->bindValue(':applicant_id',		$applicant_id);
		
		$clmdb->bindValue(':first_name',		$this->setProper($co_buyer['first_name']) );
		
		$clmdb->bindValue(':middle_name',		$this->setProper($co_buyer['middle_name']) );
		
		$clmdb->bindValue(':last_name',			$this->setProper($co_buyer['last_name']) );
		
		$clmdb->bindValue(':co_buyer_meta',		$this->setProper($serializeCoBuyerData) );
		
		$clmdb->execute();
		
		$clmdb->resetData();
		
		$clmdb->destroyConnection();
		
		return;
		
	}
	
	
	
	/*
	*
	* @usage: use to set correct value
	*
	* @param: value
	*
	* @return: returns the proper data
	*
	*/
	function setProper( $value )
	{
		
		if( isset($value) )
		{
			
			return $value;
			
		} else {
			
			$value = '';
			
			return $value;
			
		}
		
	}
	
	
	/*
	*
	* @usage: use to detect if browser's JS is enabled
	*
	* @param: N/A
	*
	* @return: throws a notice and redirects to homepage
	*
	*/
	function check_js()
	{
		?>
		<noscript>
		
			<style>
			#clm_calc_app_wrapper,
			#clm_result {
				display:none;
				visibility:hidden;
			}
			</style>
			
			<h6 style="color:maroon;">Turn on your javascript to use the application. You will be redirected to home within 3 seconds.</h6>
			
			<meta HTTP-EQUIV="REFRESH" content="3; url=<?php echo site_url(); ?>">
			
		</noscript>
		<?php
	}
	
	
	
	/*
	*
	*
	*	Segregate Buyer's Information
	* -----------------------------------------------------------------------------------------------
	* @usage: use to segregate the buyer infos
	*
	* @param: data = array
	*
	* @return: return the buyers information in array format
	*
	*
	****************************/
	function segregate_buyer_info( $data )
	{
		
		$data = $data;
	
		
		$buyer = array();
		
		//Name (First, MI, Last)
		$buyer['first_name'] 	= $data['first_name'];
		$buyer['middle_name'] 	= $data['middle_name'];
		$buyer['last_name']		= $data['last_name'];
		
		//Social Secureity Number
		$buyer['sss']			= $data['sss_1'].' - '.$data['sss_2'].' - '.$data['sss_3'];
		
		//Date of Birth
		$buyer['bdate']			= $data['birth_date'];
		
		//Home Phone
		$buyer['home_phone']	= $data['home_phone_1'].' - '.$data['home_phone_2'].' - '.$data['home_phone_3'];
		
		//Is the Home Phone under you name?
		$buyer['phone_under_your_name']	= $data['phone_under_your_name'];
		
		//Email Address
		$buyer['email']			= $data['email'];
		
		//Other Phone
		$buyer['other_home_phone'] = $data['other_home_phone_1'].' - '.$data['other_home_phone_2'].' - '.$data['other_home_phone_1'];
		
		//Is this Home Phone under you name?
		$buyer['other_phone_under_your_name']	= $data['other_phone_under_your_name'];
		
		//Time at Present Address
		$buyer['time_at_present_address_year']	= $data['time_at_present_address_year'];
		$buyer['time_at_present_address_month']	= $data['time_at_present_address_month'];
		
		//Residence Type
		$buyer['residence_type']	= $data['residence_type'];
		
		//Street Address
		$buyer['street_address']	= $data['street_address'];
		
		//city
		$buyer['city']	= $data['city'];
		
		//State/Province
		$buyer['state_province']		= $data['state_province'];
		$buyer['state_province_radio']	= $data['state_province_radio'];
		
		//Zip/Postal Code
		$buyer['zip_postal_code']		= $data['zip_postal_code'];
		
		//Housing Payment
		$buyer['housing_payment']		= $data['housing_payment'];
		
		//Time at Previous Address
		$buyer['time_at_prev_add_year']	= $data['time_at_prev_add_year'];
		$buyer['time_at_prev_add_month']= $data['time_at_prev_add_month'];
		
		//Previous Address
		$buyer['previous_add']			= $data['previous_add'];
		
		//Previous City
		$buyer['prev_city']				= $data['prev_city'];
		
		//Previous Zip/Postal Code
		$buyer['prev_zip_postal_code']	= $data['prev_zip_postal_code'];
		
		
		
		
		/*
		* Employment / Income Information
		************************************/
		
		//Employment Type
		$buyer['employment_type']		= $data['employment_type'];
		
		//Time with Employment
		$buyer['time_with_employment_year']	= $data['time_with_employment_year'];
		$buyer['time_with_employment_month']= $data['time_with_employment_month'];
		
		//Employer Phone
		$buyer['employment_phone']			= $data['employment_phone_1'].' - '.$data['employment_phone_2'].' - '.$data['employment_phone_3'];
		
		//Employer Zip / Postal Code
		$buyer['employer_zip_postal_code']	= $data['employer_zip_postal_code'];
		
		//Name of Employer
		$buyer['name_of_employer']			= $data['name_of_employer'];
		
		//Occupation Title
		$buyer['occupation_title']			= $data['occupation_title'];
		
		//Employment Income
		$buyer['employment_income']			= $data['employment_income'];
		
		//Other Income
		$buyer['other_income']				= $data['other_income'];
		
		//Source of other Income
		$buyer['source_of_other_income']		= $data['source_of_other_income'];
		
		//Time with Previous Employer
		$buyer['time_with_prev_employer_year']	= $data['time_with_prev_employer_year'];
		$buyer['time_with_prev_employer_month']	= $data['time_with_prev_employer_month'];
		
		//Name of Previous Employer
		$buyer['name_of_prev_employer']		= $data['name_of_prev_employer'];
		
		
		//Previous Employer Phone Number
		$buyer['previous_employer_number']	= $data['previous_employer_number_1'].' - '.$data['previous_employer_number_2'].' - '.$data['previous_employer_number_3'];
		
		/*
		* Other Information
		**********************/
		
		//Checking Account
		$buyer['checking_account']		= $data['checking_account'];
		
		//Savings Account
		$buyer['savings_account']		= $data['savings_account'];
		
		//Bank Name
		$buyer['bank_name']				= $data['bank_name'];
		
		//Down Payment
		$buyer['downpayment']		= $data['downpayment'];
		
		//Vehicle Preference
		$buyer['vehicle_preference']		= $data['vehicle_preference'];
		
		
		
		/*
		* Trade-In Information
		************************/
		
		//Model Year
		$buyer['model_year']			= $data['model_year'];
		
		//Make
		$buyer['make']					= $data['make'];
		
		//Model
		$buyer['model']				= $data['model'];
		
		//Mileage
		$buyer['mileage']			= $data['mileage'];
		
		//Current Monthly Payment
		$buyer['current_monthly_payment']	= $data['current_monthly_payment'];
		
		//Lien Holder
		$buyer['lien_holder']		= $data['lien_holder'];
		
		//Will there will be a CO-BUYER?
		$buyer['co_buyer_bool']		= $data['co_buyer_bool'];
		
		/*
		* Credit Profile
		************************/
		
		//Select a Credit Profile
		$buyer['credit_profile']	= $data['credit_profile'];
		
		//I have read the agreement and state-specific notices.
		$buyer['agreement']			= clm_checkIfSet( isset($data['agreement']) );
		
		return $buyer;
	
	}
	
	
	
	
	/*
	*
	*
	*	Segregate CO-Buyer's Information
	* -----------------------------------------------------------------------------------------------
	*
	* @usage: use to segregate co-buyers info
	*
	* @param: data = array
	*
	* @return: return the co-buyers information in array format
	*
	****************************/
	function segregate_co_buyer_info( $data )
	{
		
			$co_buyer = array();
			
			//Name (First, MI, Last)
			$co_buyer['first_name'] 	= $data['co_first_name'];
			$co_buyer['middle_name'] 	= $data['co_middle_name'];
			$co_buyer['last_name']		= $data['co_last_name'];
			
			//Social Secureity Number
			$co_buyer['sss']			= $data['co_sss_1'].' - '.$data['co_sss_2'].' - '.$data['co_sss_3'];
			
			//Date of Birth
			$co_buyer['bdate']			= $data['co_birth_date'];
			
			//Home Phone
			$co_buyer['home_phone']	= $data['co_home_phone_1'].' - '.$data['co_home_phone_2'].' - '.$data['co_home_phone_3'];
			
			//Is the Home Phone under you name?
			$co_buyer['phone_under_your_name']	= $data['co_phone_under_your_name'];
			
			//Email Address
			$co_buyer['email']			= $data['co_email'];
			
			//Other Phone
			$co_buyer['other_home_phone']	= $data['co_other_home_phone_1'].' - '.$data['co_other_home_phone_2'].' - '.$data['co_other_home_phone_3'];
			
			//Is this Home Phone under you name?
			$co_buyer['other_phone_under_your_name']	= $data['co_other_phone_under_your_name'];
			
			//Time at Present Address
			$co_buyer['time_at_present_address_year']	= $data['co_time_at_present_address_year'];
			$co_buyer['time_at_present_address_month']	= $data['co_time_at_present_address_month'];
			
			//Residence Type
			$co_buyer['residence_type']	= $data['co_residence_type'];
			
			//Street Address
			$co_buyer['street_address']	= $data['co_street_address'];
			
			//city
			$co_buyer['city']	= $data['co_city'];
			
			//State/Province
			$co_buyer['state_province']			= $data['co_state_province'];
			$co_buyer['state_province_radio']	= $data['co_state_province_radio'];
			
			//Zip/Postal Code
			$co_buyer['zip_postal_code']		= $data['co_zip_postal_code'];
			
			//Housing Payment
			$co_buyer['housing_payment']		= $data['co_housing_payment'];
			
			//Time at Previous Address
			$co_buyer['time_at_prev_add_year']	= $data['co_time_at_prev_add_year'];
			$co_buyer['time_at_prev_add_month']	= $data['co_time_at_prev_add_month'];
			
			//Previous Address
			$co_buyer['previous_add']		= $data['co_previous_add'];
			
			//Previous City
			$co_buyer['prev_city']				= $data['co_prev_city'];
			
			//Previous Zip/Postal Code
			$co_buyer['prev_zip_postal_code']	= $data['co_prev_zip_postal_code'];
			
		
			
			/*
			* Employment / Income Information
			************************************/
			
			//Employment Type
			$co_buyer['employment_type']			= $data['co_employment_type'];
			
			//Time with Employment
			$co_buyer['time_with_employment_year']	= $data['co_time_with_employment_year'];
			$co_buyer['time_with_employment_month']	= $data['co_time_with_employment_month'];
			
			//Employer Phone
			$co_buyer['employment_phone']			= $data['co_employment_phone_1'].' - '.$data['co_employment_phone_2'].' - '.$data['co_employment_phone_3'];
			
			//Employer Zip / Postal Code
			$co_buyer['employer_zip_postal_code']	= $data['co_employer_zip_postal_code'];
			
			//Name of Employer
			$co_buyer['name_of_employer']			= $data['co_name_of_employer'];
			
			//Occupation Title
			$co_buyer['occupation_title']			= $data['co_occupation_title'];
			
			//Employment Income
			$co_buyer['employment_income']			= $data['co_employment_income'];
			
			//Other Income
			$co_buyer['other_income']				= $data['co_other_income'];
			
			//Source of other Income
			$co_buyer['source_of_other_income']		= $data['co_source_of_other_income'];
			
			//Time with Previous Employer
			$co_buyer['time_with_prev_employer_year']	= $data['co_time_with_prev_employer_year'];
			$co_buyer['time_with_prev_employer_month']	= $data['co_time_with_prev_employer_month'];
			
			//Name of Previous Employer
			$co_buyer['name_of_prev_employer']		= $data['co_name_of_prev_employer'];
			
			
			//Previous Employer Phone Number
			$co_buyer['previous_employer_number']	= $data['co_previous_employer_number_1'].' - '.$data['co_previous_employer_number_2'].' - '.$data['co_previous_employer_number_3'];
			
			return $co_buyer;
		
	}




}