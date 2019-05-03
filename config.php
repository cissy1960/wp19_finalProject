<?php




	$username = 'nicholss3';
	$password = 'bUDA8rav';
	
	$database = new PDO('mysql:host=csweb.hh.nku.edu;dbname=db_spring19_nicholss3',$username, $password);

error_reporting(E_ALL);
ini_set('display_errors',1);

	
include('functions.php');

function abc_autoloader($class) {
    include "class." . $class . ".php";
}

spl_autoload_register('abc_autoloader');

	?>
	
