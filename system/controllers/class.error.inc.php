<?php

/**
* Processes output for the Room view
*/


class Error extends Controller
{
	private $_message = NULL;

	/**
	* Initializes the view
	* @return void
	*/

	
	function __construct($options)
	{
		if(isset($options[1])){
			$this->_message = $options[1];
		}
	}

	/**
	* Generates the title of the page
	*
	* @return string The title of the page
	*/

	public function get_title(){
		return 'Something went wrong';
	}

	/**
	* Loads and outputs the views markup
	*
	* @return void
	*/

	public function output_view(){
		$view = new View('error');
		$view->message = $this->message;
		$view->home_link = APP_URI;

		$view->render();
	}
}