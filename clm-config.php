<?php

/*
* ----------------------------------
*
* Car Loan Module core settings
*
* @version 1.0
*
* --------------------
*/
		
$dbhost 	= DB_HOST;

$dbname 	= DB_NAME;

$username	= DB_USER;

$password	= DB_PASSWORD;



global $wpdb;

$prefix = $wpdb->base_prefix;


//set globals for calls in plugin core

$clmdb 	= new SKY_WPDB ( $dbhost, $dbname, $username, $password, $prefix );


