<?php

/****************************************************************

	WordPress Database Class
	
	@version: 1.0

	@author: Darryl Fernandez (skylancer)

	@usage:


		
		
		
		//setup
		
		global $wpdb;
		
		$dbhost 	= DB_HOST;

		$dbname 	= DB_NAME;
		
		$username	= DB_USER;
		
		$password	= DB_PASSWORD;
		
		$prefix		= $wpdb->base_prefix;
		
		$clmdb 		= new CLM_DB ( $dbhost, $dbname, $username, $password, $prefix );
		
		
		
		
		
		//Start the dance
		
		$clmdb->initiateConnection();
		
		$clmdb->query("Some query here");
		
		$clmdb->prepare();
		
		$clmdb->bindValue('some binding process here') or $clmdb->bindParam('some binding process here');

		$clmdb->execute();
		
		$clmdb->resetData(); //unsets the query variable and stmt handle
		
		
		
		
		
		
		//conditionals
		
		$clmdb->beginTransaction();
		
		$clmdb->commit();
		
		$clmdb->rollBack();
		
		$clmdb->isSuccess();
		
		
		
		
		
		//retrieving
		
		$lastID 		= $clmdb->lastInsertedID(); //get last inserted ID
		
		$rowcount 		= $clmdb->rowCount(); 		//get total row count
		
		$assoc_value	= $clmdb->fetchAssoc();
		
		$num_value		= $clmdb->fetchNum();
		
		$obj_value		= $clmdb->fetchObj();



*************************************************************/

class SKY_WPDB {
	
	
	
	//setup
	
	private $host;
	
	private $dbname;
	
	private $username;
	
	private $password;
	
	var $dbhandler = null;
	
	
	
	//prefix
	
	private $prefix;
	
	private $query;
	
	private $stmt;
	
	var $isSuccess;
	
	
	
	public function __construct( $dbhost, $dbname, $username, $password, $prefix = '' )
	{
		
		$this->host 	= $dbhost;
		
		$this->dbname	= $dbname;
		
		$this->username	= $username;
		
		$this->password	= $password;
		
		$this->prefix 	= $prefix;
	
	}

	
	function initiateConnection()
	{
		
		$host 		= $this->host;
		
		$dbname 	= $this->dbname;
		
		$username 	= $this->username;
		
		$password 	= $this->password;
		
		$this->dbhandler = new PDO('mysql:host='.$host.';dbname='.$dbname, $username, $password);
		
		$this->dbhandler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
	}
	
	
	function query( $query )
	{
		
		$this->query = $query;
		
	}
	
	
	function prepare()
	{
		
		$query = $this->query;
		
		$this->stmt = $this->dbhandler->prepare( $query );
		
	}
	
	
	function bindValue( $key , $value )
	{
		
		$this->stmt->bindValue( $key ,	$value );
		
	}
	
	
	function bindParam( $key , $value )
	{
		
		$this->stmt->bindParam( $key ,	$value );
		
	}
	
	
	function execute()
	{
		
		$this->isSuccess = $this->stmt->execute();
		
	}
	
	
	function rowCount()
	{
		
		return $this->stmt->rowCount();
		
	}
	
	
	function fetchAssoc()
	{
		
		return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
		
	}
	
	
	function fetchNum()
	{
		
		return $this->stmt->fetchAll(PDO::FETCH_NUM);
		
	}
	
	
	function fetchObj()
	{
		
		return $this->stmt->fetchAll(PDO::FETCH_OBJ);
		
	}
	
	
	function beginTransaction()
	{
		
		$this->dbhandler->beginTransaction();
		
	}
	
	
	function commit()
	{
		
		$this->dbhandler->commit();
		
	}
	
	
	function rollBack()
	{
		
		$this->dbhandler->rollBack();
		
	}
	
	
	function lastInsertedID()
	{
		
		return $this->dbhandler->lastInsertId();
		
	}
	
	
	function resetData()
	{
		
		unset( $this->query );
		
		unset( $this->stmt );
		
	}

	
	function destroyConnection()
	{
		
		unset( $this->dbhandler );
		
	}
	
	
	
	/*
	*
	* specific for  Tables
	* define your tables here
	* to access during query
	*
	***************************/
	
	function applicants()
	{
		
		return $this->prefix . 'clm_applicants';
		
	}
	
	
	function co_buyers( $tbl_prefix = '' )
	{
		
		return $this->prefix . 'clm_co_buyers';
		
	}
	
	
	function records( $tbl_prefix = '' )
	{
		
		return $this->prefix . 'records';
		
	}
	
}