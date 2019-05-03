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
	$params()
	$statement = $database->prepare($sql);
	$statement->execute();
	$contacts = $statement->fetchAll(PDO::FETCH_ASSOC);
	
	
	}
}
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	
  	<title>List of contact</title>
	<meta name="description" content="The HTML5 Herald">
	<meta name="author" content="SitePoint">

	<link rel="stylesheet" href="css/style.css">

	<!--[if lt IE 9]>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
  	<![endif]-->
</head>
<body>
	<div class="page">
		

<form action="" method="POST">
    
      
    <?php foreach($contacts as $contact) : ?>
			<p>
				<?php echo $contact['lname']; ?><br />
				<?php echo $contact['fname']; ?> <br />
				<?php echo $contact['phone']; ?> <br />
				<a href="contactEditForm.php?action=edit ?>">Edit Contact</a><br />
				
			</p>
		<?php endforeach; ?>		    
      
	<br />
	<input type="submit" value="Done" /> 

</form>
</div>
</body>
</html>