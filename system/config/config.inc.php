<?php

// Set up an array for constants

$_C = array();

//------------------------------------------
// General configuration options
//------------------------------------------

$_C['APP_TIMEZONE'] = 'US/Pacific';

//-----------------------------------------
//Database credentials
//-----------------------------------------

$_C['DB_HOST'] = 'localhost';
$_C['DB_NAME'] = 'rtabaza';
$_C['DB_USER'] = 'root';
$_C['DB_PASS'] = '';

//-------------------------------------------
//Enable debug mode (strict error reporting)
//-------------------------------------------

$_C['DEBUG'] = TRUE:

//-----------------------------------------------------
//Convert the constants array into actual constants
//-----------------------------------------------------

foreach ($_C as $constant => $value) {
	define($constant, $value);
}

?>