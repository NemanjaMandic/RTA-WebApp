<?php 

//------------------------------------
// Initializes enviroment variables
//------------------------------------

// server path to this app (i.e /var/www/vhost/realtime/httpdocs/realtime)

define('APP_PATH', dirname(__FILE__));

//App folder, relative from web root (i.e http://example.org/realtime/)

define(
	'APP_URI', 
     remove_unwanted_slashes('http://' . $_SERVER['SERVER_NAME'] . APP_FOLDER . '/')
	);

// server path to the system folder (for includes)

define('SYS_PATH', APP_PATH . '/system');

//Relative path to the form processing script (i.e /realtime/process.php)

define('FORM_ACTION', remove_unwanted_slashes(APP_FOLDER . '/process.php'));

//---------------------------------------------------------------
// Initializes the app
//------------------------------------------------------------

//starts the session
if(!isset($_SESSION)){
	session_start();
}

//Loads the configuration variables

require_once SYS_PATH . '/config/config.inc.php';

//Turns on error reporting if in debug mode

if(DEBUG === TRUE){
	init_set('display_errors', 1);
	error_reporting(E_ALL^E_STRICT);
}else{
	init_set('display_errors', 0);
	error_reporting(0);
}

//sets the timezone to avoid a notice

date_default_timezone_set(APP_TIMEZONE);

//------------------------------------
//Function declarations
//------------------------------------

function parse_uri(){
	// Removes any subfolders in which the app is installed

	$real_uri = preg_replace(
         '~^' . APP_FOLDER . '~',
         '',
         $_SERVER['REQUEST_URI'],
         1
		);

	$uri_array = explode('/', $real_uri);

	// If the first element is empty, get rid of it

	if(empty($uri_array[0])){
		array_shift($uri_array);
	}

	//If the last element is empty, get rid of it

	if(empty($uri_array[count($uri_array)-1])){
		array_pop($uri_array);
	}

	return $uri_array;
}

/**
*Determines the controller name using the first element of the URI array
*
*/

function get_controller_classname( &$uri_array){
	$controller = array_shift($uri_array);
	return ucfirst($controller);
}

/** 
 * Removes unwanted double slashes (except in the protocol) 
 *  
 * @param $dirty_path string    The path to check for unwanted slashes  
 * @return string               The cleaned path  
 */

 function remove_unwanted_slashes($dirty_path){
 	return preg_replace('~(?<!:)//~', '/', $dirty_path);
 }