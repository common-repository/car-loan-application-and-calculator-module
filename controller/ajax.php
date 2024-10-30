<?php


/*
* -------------------------------
*
* @version 1.0
*
* @usage: 
*
* called by ajax request for
* a new application entry
*
* -------------------------------
*/
function new_application()
{
	
	if ( !wp_verify_nonce( $_REQUEST['clm_nonce'], "clm_nonce")) {
      exit("Request Forbidden!");
   	}
	
	//clm api class
	$clm_model	= new CLM_MODEL();
	
	
	foreach($_POST as $k => $v)
	{
		$data[$k] = $clm_model->escapeThis( $v );
	}
	
	if ( !isset($data['agreement']) )
	{
		echo "<div id='clm_message_error'>AGREEMENT ERROR!</div>";
		exit;
	}
	
	
	//check the captcha
	//session_start();
	
	if (md5($data['captcha_code']) != $_SESSION['randomnr2'])
	{ 
	
		$captcha_result = array( 'captcha' => 'error' );
	  	echo 0;
		exit;
		
	}
	
	
	//process the insert query
	$applicant_id = $clm_model->insert_new_applicant( $data );
	
	
	//if it has cobuyer insert it
	if( $clm_model->co_buyer )
	{
		
		$clm_model->insert_new_co_buyer( $applicant_id, $data );
		
	}
	
	//process emails
	
	$emails 		= get_option('clm_emails');
	
	$admin_email 	= get_option('admin_email');
	
	$emails 		= unserialize( $emails );
	
	$buyer 			= $clm_model->segregate_buyer_info( $data );
	
	foreach( $emails as $email)
	{
		
		$to = $email;
		$subject = 'New Car Loan Application Submitted';
		$message = "A new car loan applicant has submitted an application\n
		Name: ".ucwords($buyer['first_name']).ucwords($buyer['last_name'])."\n
		Email: ".$buyer['email']."\n
		--------------------------------\n
		Car Loan Application";
		$headers = 'From: '. $admin_email;
		
		$mail = wp_mail( $to, $subject, $message, $headers );
	
	}
	
	
	
	echo "<div id='clm_message_success'>Form Submitted Successfully! Thank You..</div>";
	
	unset( $clm_model );
	exit;

}
add_action("wp_ajax_nopriv_new_application", "new_application");
add_action("wp_ajax_new_application", "new_application");







/*
* -------------------------------
*
* @version 1.0
*
* @usage: 
*
* called by ajax request to get all
* application data in database
*
* -------------------------------
*/
function clm_get_data()
{
	//clm api class
	$clm_model	= new CLM_MODEL();
	
	//clm databse class
	global $clmdb;
	
	//wp database class
	global $wpdb;
	

	if( isset($_POST['pn']) )
	{
		
		$pn = $clm_model->escapeThis( preg_replace('#[^0-9?!%]#i','',$_POST['pn']) );
		
	} else {
		
		$pn = 0;
		
	}
	
	$items_per_page = 6;
	
	
	//get total entries of applicants in database
	$numrows = $clm_model->get_total_applicants();
	
	$paginated_page = ceil($numrows/$items_per_page);
	
	
	//perform paginated query
	
	$clmdb->initiateConnection();
	
	$clmdb->query("SELECT * FROM ".$clmdb->applicants()." ORDER BY applicant_id DESC LIMIT $items_per_page OFFSET $pn");
	
	$clmdb->prepare();
	
	$clmdb->execute();
	
	$res = $clmdb->fetchAssoc();
	
	$clmdb->resetData();
	
	$clmdb->destroyConnection();

	
	//load view
	clm_admin_listing($res, $paginated_page, $pn, $items_per_page);

	unset( $clm_model );

	exit;
	
}
add_action("wp_ajax_clm_get_data", "clm_get_data");







/*
* -------------------------------
*
* @version 1.0
*
* @usage: 
*
* called by ajax request for
* deleting an entry
*
* -------------------------------
*/
function clm_del_entry()
{
	
	if ( !wp_verify_nonce( $_REQUEST['clm_nonce'], "clm_get_data_nonce")) {
      exit("Request Forbidden!");
   	}
	
	$clm_model	= new CLM_MODEL();
	
	$applicant_id = $clm_model->escapeThis( preg_replace('#[^0-9?!%]#i','',$_POST['applicant_id']) );
	
	
	//process delete query
	$clm_model->delete_applicant_by_id( $applicant_id );
	
	unset( $clm_model );
	
	exit;
		
}
add_action("wp_ajax_clm_del_entry", "clm_del_entry");







/*
* -------------------------------
*
* @version 1.0
*
* @usage: 
*
* called by ajax request for
* edit display
*
* -------------------------------
*/
function clm_edit_entry()
{
	//declare clm api class
	$clm_model	= new CLM_MODEL();
	
	$applicant_id = $clm_model->escapeThis( preg_replace('#[^0-9?!%]#i','',$_POST['applicant_id']) );
	
	
	$buyer = $clm_model->get_applicant_data_by_id( $applicant_id );
	
	
	//check if co buyer exists, if it does, get its object
	if ( $clm_model->has_co_buyer( $applicant_id ) )
	{
		
		$co_buyer = $clm_model->get_co_buyer_data_by_id( $applicant_id );
		
		//load view
		clm_admin_edit_form( $buyer, $co_buyer );
		
	} else {
		
		//load view
		clm_admin_edit_form( $buyer );
		
	}

	
	
	unset( $clm_model );
	
	exit;
	
}
add_action("wp_ajax_clm_edit_entry", "clm_edit_entry");







/*
* -------------------------------
*
* @version 1.0
*
* @usage: 
*
* called by ajax request for
* updating an entry
*
* -------------------------------
*/
function clm_update_entry()
{
	
	if ( !wp_verify_nonce( $_REQUEST['clm_update_nonce'], "clm_update_nonce")) {
      exit("Request Forbidden!");
   	}
	
	
	//clm api class
	$clm_model	= new CLM_MODEL();
	
	foreach($_POST as $k => $v)
	{
		$data[$k] = $clm_model->escapeThis( $v );
	}
	
	$applicant_id = $data['applicant_id'];
	
	//do the applicant update
	$clm_model->update_applicant( $applicant_id, $data );
	
	//update co_buyer if there is
	if( $clm_model->has_co_buyer( $applicant_id ) )
	{
		
		$clm_model->update_co_buyer( $applicant_id, $data );
		
	}
	
	echo '<div id="clm_updt_success">Entry Updated..</div>';
	
	unset( $clm_model );
	
	exit;
	
}
add_action("wp_ajax_clm_update_entry", "clm_update_entry");








/*
* -------------------------------
*
* @version 1.0
*
* @usage: 
*
* called by ajax request when
* veiwing an entry
*
* -------------------------------
*/
function clm_view_entry()
{
	
	$clm_model	= new CLM_MODEL();
	
	$applicant_id 	= $clm_model->escapeThis( $_POST['applicant_id'] );
	
	$buyer 			= $clm_model->get_applicant_data_by_id( $applicant_id );
	
	//get the buyers ID for co-buyer checking
	foreach($buyer as $k)
	{
		$applicant_id	= $k['applicant_id'];
	}
	
	//check if co buyer exists, if it does, get its object
	if ( $clm_model->has_co_buyer( $applicant_id ) )
	{
		
		$co_buyer = $clm_model->get_co_buyer_data_by_id( $applicant_id );
		
		//load view
		clm_admin_view_entry( $buyer, $co_buyer );
		
	} else {
		
		//load view
		clm_admin_view_entry( $buyer );
		
	}

	
	
	unset( $clm_model );
	
	exit;
	
}
add_action("wp_ajax_clm_view_entry", "clm_view_entry");








/*
* -------------------------------
*
* @version 1.0
*
* @usage: 
*
* called by ajax request for
* CSV export transactions
*
* -------------------------------
*/
function clm_get_xml()
{
	
	if ( !wp_verify_nonce( $_REQUEST['csv_nonce'], "csv_nonce")) {
      exit("Request Forbidden!");
   	}
	
	$clm_model	= new CLM_MODEL();
	
	$applicant_id = $clm_model->escapeThis( $_POST['applicant_id'] );
	
	
	$buyer_info 	= array();
	$co_buyer_info 	= array();
	
	
	
	//get applicant full info
	$buyer = $clm_model->get_applicant_data_by_id( $applicant_id );
	
	
	//check if the applicant has cobuyer
	if ( $clm_model->has_co_buyer( $applicant_id ) )
	{
		
		$co_buyer = $clm_model->get_co_buyer_data_by_id( $applicant_id );
		
	} else {
		
		$co_buyer = '';
		
	}
	
	
	
	//get the serialize info of the buyer
	//we use the serialize info of the buyer because it is complete
	foreach($buyer as $k)
	{
		$applicant_info =  $k['applicant_meta'];
	}
	unset($k);

	$buyer_info = unserialize( $applicant_info );
	
	unset( $buyer_info['agreement'] );
	

	//if it has a cobuyer we will need to get it and send both array
	if( is_array($co_buyer) )
	{
		
		foreach($co_buyer as $k)
		{
			
			$co_buyer =  $k['co_buyer_meta'];
			
		}
		unset($k);
		
		$co_buyer_info = unserialize( $co_buyer );
		
	}
	
	echo json_encode( array($buyer_info,$co_buyer_info) );
	
	unset( $clm_model );
	
	exit;
	
}
add_action("wp_ajax_clm_get_xml", "clm_get_xml");







/*
* -------------------------------
*
* @version 1.0
*
* @usage: 
*
* called by ajax request for
* when deleting multiple data
*
* -------------------------------
*/
function clm_del_bulk()
{
	
	if ( !wp_verify_nonce( $_REQUEST['clm_del_bulk_nonce'], "clm_del_bulk_nonce")) {
      exit("Request Forbidden!");
   	}
	
	$clm_model	= new CLM_MODEL();
	
	$json_data 	= stripslashes( $_POST['data'] );
	
	$data		= json_decode( $json_data );
	
	if( empty($data) )
	{
		return;
	}
	
	foreach($data as $k)
	{
		//call delete api
		$clm_model->delete_applicant_by_id( $k );
		
	}
	
	unset( $clm_model );
	
	exit;
	
}
add_action("wp_ajax_clm_del_bulk", "clm_del_bulk");







/*
* -------------------------------
*
* @version 1.0
*
* @usage: 
*
* called by ajax request for
* for displaying the setings page
*
* -------------------------------
*/
function clm_show_settings()
{
	//call settings view
	clm_settings_page();
	
	exit;
	
}
add_action("wp_ajax_clm_show_settings", "clm_show_settings");







/*
* -------------------------------
*
* @version 1.0
*
* @usage: 
*
* called by ajax request for
* saving the settings
*
* -------------------------------
*/
function clm_save_settings()
{
	
	if ( !wp_verify_nonce( $_REQUEST['clm_save_settings_nonce'], "clm_save_settings_nonce")) {
      exit("Request Forbidden!");
   	}
	
	$clm_model	= new CLM_MODEL();
	
	$vehicles 		= $clm_model->escapeThis( trim( str_replace(' ','',$_POST['vehicles']) ) );
	$provinces 		= $clm_model->escapeThis( trim( str_replace(' ','',$_POST['provinces']) ) );
	$emails			= $clm_model->escapeThis( trim( str_replace(' ','',$_POST['emails']) ) );
	$clm_clean_db	= $clm_model->escapeThis( trim( str_replace(' ','',$_POST['clm_clean_db']) ) );
	
	$vehicles	= explode(",",$vehicles);
	$provinces	= explode(",",$provinces);
	$emails		= explode(",",$emails);
	
	
	
	$vehicles	= serialize( $vehicles );
	$provinces	= serialize( $provinces );
	$emails		= serialize( $emails );
	
	update_option( 'clm_vehicles', 	$vehicles);
	update_option( 'clm_provinces', $provinces);
	update_option( 'clm_emails', 	$emails);
	update_option( 'clm_clean_db', 	$clm_clean_db);
	
	unset( $clm_model );
	
	exit;
	
}
add_action("wp_ajax_clm_save_settings", "clm_save_settings");



/*
* -------------------------------
*
* @version 1.2
*
* @usage: 
*
* called by ajax request for
* for displaying the Form manager page
*
* -------------------------------
*/
function clm_show_form_manager()
{
	//call settings view
	clm_form_manager_view();
	
	exit;
	
}
add_action("wp_ajax_clm_show_form_manager", "clm_show_form_manager");

