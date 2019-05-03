<?php
include('config.php');

$action = $_GET['action'];
// If form submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$lname = $_POST['colastname'];
	$fname = $_POST['cofirstname'];
	$phone = $_POST['cophone'];
	$email = $_POST['coemail'];
	
	$sql = file_get_contents('sql/getContacts.sql');
	$params();
	$statement = $database->prepare($sql);
	$statement->execute();
	$contacts = $statement->fetchAll(PDO::FETCH_ASSOC);
	
	if($action == 'edit') {
		// Insert contact information
		$sql = file_get_contents('sql/updateContacts.sql');
		$params = array(
			'contactID' => $contactID,
			'lname' => $lname,
			'fname' => $fname,
			'phone' => $phone,
			'email' => $email
		);
	
		$statement = $database->prepare($sql);
		$statement->execute($params);
		$contacts = $statement->fetchAll(PDO::FETCH_ASSOC);
	
		$contact = $contacts[0];
	}
}
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	
  	<title>Edit contact</title>
	<meta name="description" content="The HTML5 Herald">
	<meta name="author" content="SitePoint">

	<link rel="stylesheet" href="css/style.css">

	<!--[if lt IE 9]>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
  	<![endif]-->
</head>
<body>
	<div class="page">
		<h1>Edit Contacts</h1>

<form action="" method="POST">
    
      
    
	<label>Last Name</label>
	<input readonly type="text" name="colastname" value="<?php echo $contact['lname'] ?>" /> />
	<label>First Name</label>
    <input readonlt type="text" name="cofirstname" value="<?php echo $contact['fname'] ?>" />/>
	<label>Phone</label>
    <input readonly type="text" name="cophone" value="<?php echo $contact['phone'] ?>" />/>
	<label>Email</label>
    <input readonly type="text" name="coemail" value="<?php echo $contact['email'] ?>" />/><br />
    <br />
    
      <input type="submit" value="Edit" />
	<br />
	<br />
	<input type="submit" value="Done" /> 

</form>
</div>
</body>
</html>