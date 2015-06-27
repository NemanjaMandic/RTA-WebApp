<?php

/**
* An abstract class that lays the groundwork for all controllers
*/

abstract class Controller{
	
	public $actions = array(),
	$model;

	protected static $nonce = NULL;

	/**
	* Initalizes the view
	* @param $options array  Options for the view
	* @return void
	*/

	public function __construct( $options ){
              
              if(!is_array($options)){
              	throw new Exception("No options were supplied for the room");
              }
	}
	/**
	* Generates a nonce that helps prevent XSS and duplicate submissions
	* @return string  The generated nonce
	*/

	protected function generate_nonce(){

		//Checks for an existing nonce before creating a new one

		if(empty(self::$nonce)){
			self::$nonce = base64_encode(uniqid(NULL, TRUE));
			$_SESSION['nonce'] = self::$nonce;
		}
		//TODO: Add the actual nonce generation script
		return self::$nonce;
	}

	/**      
	* Performs basic input sanitization on a given string      
	*      
	* @param $dirty    string  The string to be sanitized      
	* @return          string  The sanitized string      
	*/

	protected function sanitize($dirty){
		return htmlentities(strip_tags($dirty), ENT_QUOTES);
	}

	/**      
	* Sets the title for the view      
	*      
	* @return string   The text to be used in the <title> tag     
	 */

	abstract public function get_title( );

	/**
	 *Loads and outputs the view's markup      
	 *      
	 * @return void      
	 */

	abstract public function output_view( );
}

?>