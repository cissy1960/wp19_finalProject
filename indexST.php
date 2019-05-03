<?php
session_start();
if(!isset($_SESSION['user']) || empty($_SESSION['user'])) {
	header('location: login2.php');
}
//Include the
include('config.php');

// Include the file containing functions (functions.php)

// Get search term if provided otherwise use an empty string to return all results

if ($_SERVER['REQUEST_METHOD'] == 'POST') {


if(isset($_POST['search-term'])) {
	$term = $_POST['%.search-term'];
}
else {
	$term = "";
};


// If form submitted set term

//$term = $_POST['%.search-term'];

}

//Call the searchBooks function passing the search term to the function and set the results to a variable called $books
$contacts = searchContacts($term, $database);
$contact = $contacts[0);

?>

<!DOCTYPE HTML>
<html lang="en">
<head>
	<meta charset="utf-8">
  	<title>Search Contacts</title>
	<meta name="description" content="The HTML5 Herald">
	<meta name="author" content="SitePoint">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="page">
		<h1>Contacts</h1>
		<form  action="" method="POST">
			<input type="text" name="search-term" placeholder="Last Name..." />
			
			<input type="submit" />
		</form>

		<?php // - Loop over the results of $contacts and print the title and price. ?>
			<?php foreach($contacts as $contact) : ?>
			<ul>
			<li> Last Name:<?php echo $contact['contactlname'] ?> First Name: <?php echo $contact['contactfname'] ?> </li>
			<li> Phone:<?php echo $contact['contactphone'] ?> Email: <?php echo $contact['contactemail'] ?> </li>
			</ul>
			<?php endforeach; ?>
	</div>
</body>
</html>