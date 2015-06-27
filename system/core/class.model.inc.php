<?php

/**
*Creates a set of generic database interaction methods
*
* @author Nemanja Mandic
*
**/

abstract class Model {

	public static $db;

	/**
	* Creates a PDO connection to MySQL
	*
	* @return boolean Returns TRUE on success (die on failure)
	*/

	public function __construct(){
		$dsn = 'mysql:dbname=' . DB_NAME . ';host=' . DB_HOST;

		try{
			self::$db = new PDO($dsn, DB_USER, DB_PASS);
		}catch(PDOException $e){
			die("Couldn't connect to the database");
		}

		return TRUE;
	}
}