<?php
include('config.php');

$action = $_GET['action'];
// If form submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$lname = $_POST['colastname'];
	$fname = $_POST['cofirstname'];
	$phone = $_POST['cophone'];
	$email = $_POST['coemail'];
	
	if($action == 'add') {
		// Insert contact information
		$sql = file_get_contents('sql/insertContact.sql');
		$params = array(
			'lname' => $lname,
			'fname' => $fname,
			'phone' => $phone,
			'email' => $email
		);
	
		$statement = $database->prepare($sql);
		$statement->execute($params);
	}
}
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	
  	<title>Add/Edit contact</title>
	<meta name="description" content="The HTML5 Herald">
	<meta name="author" content="SitePoint">

	<link rel="stylesheet" href="css/style.css">

	<!--[if lt IE 9]>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
  	<![endif]-->
</head>
<body>
	<div class="page">
		<h1>Add/Edit Contacts</h1>

<form action="" method="POST">
    
      
    
	<label>Last Name</label>
	<input type="text" name="colastname" />
	<label>First Name</label>
    <input type="text" name="cofirstname" />
	<label>Phone</label>
    <input type="text" name="cophone" />
	<label>Email</label>
    <input type="text" name="coemail" /><br />
    <br />
    
    <input type="submit" value="Add" />  <input type="submit" value="Edit" />
	<br />
	<br />
	<input type="submit" value="Done" /> 

</form>
</div>
</body>
</html>