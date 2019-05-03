<?php

// Create and include a configuration file with the database connection
include('config.php');

// Include functions for application
//include('functions.php');
//include menu
//include('./template/template/menu.php');

// If form submitted:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	// Get username and password from the form as variables
	$lname = $_POST['lname'];
	$fname = $_POST['fname'];
	
	
	// Query records that have usernames and passwords that match those in the pcontacts table
	$sql = file_get_contents('sql/attemptLogin.sql');
        $params = array( 
			'username' => $lname ,
			'password' => $fname
                    );
        
        $statement = $database->prepare($sql);
        $statement->execute($params);
		$users = $statement->fetchAll(PDO::FETCH_ASSOC);
	// If $users is not empty
	if(!empty($users)) {
		// Set $user equal to the first result of $users
		$user = $users[0];
		if($role == 'Admin') {
			header('location: adminForm.php');
		}
		if($role == 'Teacher') {
			header('location: adminForm.php');
		}
		if($role == 'PrimaryContact') {
			header('location: contact.php');
		}
		header('location: index.php');
		
	
}
}

?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	
  	<title>Login</title>
	<meta name="description" content="The HTML5 Herald">
	<meta name="author" content="SitePoint">

	<link rel="stylesheet" href="css/style.css">

	<!--[if lt IE 9]>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
  	<![endif]-->
</head>
<body>
	<div class="page">
		<h1>Identify User</h1>
		<form method="POST">
			<label>Last Name:</label>
			<input type="text" name="lname"  />
			<label>First Name:</label>
			<input type="text" name="fname"  />
			<br />
			<input type="submit" value="Submit" />
			
			
		</form>
	</div>
</body>
</html>