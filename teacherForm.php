<?php
include('config.php');

$action = $_GET['action'];
// If form submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$lname = $_POST['tlastname'];
	$fname = $_POST['tfirstname'];
	$classroom = $_POST['classroom'];
	$salary = $_POST['salary'];
	
	if($action == 'add') {
		// Insert contact information
		$sql = file_get_contents('sql/insertTeacher.sql');
		$params = array(
			'lname' => $lname,
			'fname' => $fname,
			'classroom' => $classroom,
			'salary' => $salary
		);
	
		$statement = $database->prepare($sql);
		$statement->execute($params);
	}
	elseif($action == 'edit') {
		// Update contact information
		$sql = file_get_contents('sql/updateTeacher.sql');
		$params = array(
			'teacherID => $teacherID
			'lname' => $lname,
			'fname' => $fname,
			'classroom' => $classroom,
			'salary' => $salary
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
		<h1>Add/Edit Teacher</h1>


      <form action="" method="POST">
    
	<label>Last Name</label>
	<input type="text" name="tlastname" />
	<label>First Name</label>
    <input type="text" name="tfirstname" />
	<label>Classroom</label>
    <input type="text" name="classroom" />
	<label>Salary</label>
    <input type="text" name="salary" /><br />
    <br />
    
    <input type="submit" value="Add" />  <input type="submit" value="Edit" /> 
	<br />
	<a href="./template/template/menu.php">Home<br />
</form>
</div>
</body>
<h2 style = color:blue >
	<p>Welcome 	<?php echo $fname ?> <?php echo $lname ?> to Adelaide Beginners Center! </p>
</h2>	
</html>