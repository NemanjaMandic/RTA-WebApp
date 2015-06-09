<?php 

//------------------------------------
// Initializes enviroment variables
//------------------------------------

// server path to this app (i.e /var/www/vhost/realtime/httpdocs/realtime)

define('APP_PATH', dirname(__FILE__));


//App folder, relative from web root (i.e /realtime)

define('APP_FOLDER', dirname($_SERVER['SCRIPT_NAME']));

//URI path to the app (i.e http://example.org/realtime/)

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

//Register class_loader() as the autoload function

spl_autoload_register('class_autoloader');

//------------------------------------------------
//Loads and proxesses view data
//------------------------------------------------

------------------------------  175 strana -------------------------------------
//Parses the URI

 $uri_array  = parse_uri();
 $class_name = get_controller_classname($uri_array);
 $options = $uri_array;

 //Sets a default view if nothing is passed in the URI (i.e on the home page)

 if(empty($class_name)){
 	$class_name = 'Home';
 }

 //Tries to initialize the requested view, or else throws a 404 error

 try{
 	$controller = new $class_name($options);
 }catch(Exception $e){
 	$options[1] = $e->getMessage();
 	$controller = new Error($options);
 }

//------------------------------------
 //Outputs the view
 //-----------------------------------

 //Includes the header, requested view, and footer markup

 require_once SYS_PATH . '/inc/header.inc.php';

 $controller->output_view();

 require_once SYS_PATH . '/inc/footer.inc.php';

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

 /**  
 * Autoloads classes as they are instantiated 
  *  
  * @param $class_name string    The name of the class to be loaded 
   * @return bool                 Returns TRUE on success (Exception on failure)  
   */

 function class_autoloader($class_name){
 	$fname = strtolower($class_name);

 	//Defines all of the valid places a class file could be stored

 	$possible_locations = array(
         SYS_PATH . '/models/class.' . $fname . '.inc.php',
         SYS_PATH . '/controllers/class.' . $fname . '.inc.php',
         SYS_PATH . '/core/class.' .$fname . '.inc.php',
 		);

 	//Loops through the location array and checks for a file to load
 	foreach ($possible_locations as $loc) {
 		if(file_exists($loc)){
 			require_once $loc;
 			return TRUE;
 		}
 	}
 	//Fails because a valid class wasn't found
 	throw new Exception("Class $class_name wasnt found");
 	
 }