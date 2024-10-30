<?php

if( !session_id())
    session_start();

if( isset($_GET['clm_csv_data'])){
	
	$data = json_decode( stripslashes($_GET['clm_csv_data']) );
	
	if( !is_array( $data ) )
	{
		return;
	}
	
	//process Buyer CSV
	$content = 'Applicant Information'."\n\n";
	
	foreach( $data[0] as $k => $v )
	{

		$content 	.= ucwords( str_replace('_',' ',$k) ) .','. $v . "\n";
		
	}
	unset($k);
	unset($v);
	
	
	//process Co-Buyer CSV
	$content .= "\n\n".'Co-Buyer Information'."\n\n";
	
	foreach( $data[1] as $k => $v )
	{

		$content 	.= ucwords( str_replace('_',' ',$k) ) .','. $v . "\n";
		
	}
	unset($k);
	unset($v);
	
	
	//Process data to CSV file
	header("Content-Type: text/csv");
	header("Content-Disposition: attachment; filename=CarLoanApplication".date('d-m-Y').".csv");
	print $content;
    exit;
	
	
}