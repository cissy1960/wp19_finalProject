<?php

function searchContacts($term, $database) {
	// Return a list of contacts based upon the search term from the database
		
	
	$sql = file_get_contents('sql/searchContacts.sql');
	$params = array(
		'term' => $term		
		);
	$statement = $database->prepare($sql);
	$statement->execute($params);
	$contacts = $statement->fetchAll(PDO::FETCH_ASSOC);
	return $contacts;
	}

	
function get($key){
	if(isset($_Get[$key])) 
	return $_GET[$key];
	else return '';
	}
	
?>