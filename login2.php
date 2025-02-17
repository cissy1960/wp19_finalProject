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
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	
	// Query records that have usernames and passwords that match those in the customers table
	$sql = file_get_contents('sql/attemptLogin.sql');
        $params = array( 
			'username' => $username ,
			'password' => $password
                    );
        
        $statement = $database->prepare($sql);
        $statement->execute($params);
		$users = $statement->fetchAll(PDO::FETCH_ASSOC);
	// If $users is not empty
	if(!empty($users)) {
		// Set $user equal to the first result of $users
		$user = $users[0];
	if($user['roleID'] = 1) {
			$_SESSION['user']=$user['teacherID'];
			$_SESSION['roleID']= 'Teacher';
			header('location: childForm.php');
		}
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
		<h1>Login</h1>
		<form method="POST">
			<input type="text" name="username" placeholder="Username" />
			<input type="password" name="password" placeholder="Password" />
			<br />
			<input type="submit" value="Log In" />
			
			<li class="nav-item">
              <a class="nav-link" href="contactForm.php">Add Contact</a>
			  
            </li>
			<li class="nav-item">
              <a class="nav-link" href="logout.php">Logout</a>
            </li>
		</form>
	</div>
</body>
	<p> You have successfully logged in as: <?php echo $_SESSION['roleID'] ?>.
</html>