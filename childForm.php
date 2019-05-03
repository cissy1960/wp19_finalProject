<?php
include('config.php');

$action = $_GET['action'];
// If form submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$lname = $_POST['childlname'];
	$fname = $_POST['childfname'];
	
	$street = $_POST['street'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$zip = $_POST['zipcode'];
	
	if($action == 'add') {
		// Insert child information
		$sql = file_get_contents('sql/insertChild.sql');
		$params = array(
			'lname' => $lname,
			'fname' => $fname,
			
			'street' => $street,
			'city' => $city,
			'state' => $state,
			'zip' => $zip
		);
	
		$statement = $database->prepare($sql);
		$statement->execute($params);
	}
	header('location: pcontactForm.php');
}
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	
  	<title>Add/Edit child</title>
	<meta name="description" content="The HTML5 Herald">
	<meta name="author" content="SitePoint">

	<link rel="stylesheet" href="css/style.css">

	<!--[if lt IE 9]>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
  	<![endif]-->
</head>
<body>
	<div class="page">
		<h1>Add/Edit Child</h1>

<form action="" method="POST">
    
    <label>Last Name</label>
    <input type="text" name="childlname" />
	<label>First Name</label>
    <input type="text" name="childfname" /><br />
	<br />
	
    
    
    
   
	
	<label>Address</label> <br />
	<br />
    <label>Street</label>
    <input type="text" name="street" /><br />
	<label>City</label>
    <input type="text" name="city" />
	<label>State</label>
    <input type="text" name="state" />
	<label>Zipcode</label>
    <input type="text" name="zipcode" />
	<br />
    
        
    <input type="submit" value="Add" />  <input type="submit" value="Edit" />
	
	

</form>
</div>
</body>
</html>